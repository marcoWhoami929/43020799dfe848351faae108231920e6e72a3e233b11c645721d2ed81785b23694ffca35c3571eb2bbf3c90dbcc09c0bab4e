<?php
include("../modelos/conexion.php");
class data extends Conexion
{
    public $mysqli;
    public $counter;

    function __construct()
    {
        $this->mysqli = $this->conectarDekkerlab();
    }
    public function countAll($sql)
    {
        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return count($query);
    }
    function getListaProductosBackorder($search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];

        $orden = $search['orden'];
        $campoOrden = $search['campoOrden'];

        $clientes = json_decode($search['cliente'], true);
        $cliente = "";

        for ($i = 0; $i < count($clientes); $i++) {
            $cliente .= "'" . $clientes[$i] . "', ";
        }
        $cliente = substr($cliente, 0, -2);


        $sWhere = " amov.CUNIDADESPENDIENTES != 0 and amov.CIDDOCUMENTODE = 2 and adoc.CIDCONCEPTODOCUMENTO IN(3016,3017,3018,3079) and adoc.CTOTALUNIDADES >= adoc.CUNIDADESPENDIENTES and adoc.CCANCELADO = 0";
        $sWhere1 = " amov.CUNIDADESPENDIENTES != 0 and amov.CIDDOCUMENTODE = 2 and adoc.CIDCONCEPTODOCUMENTO IN(3051) and adoc.CTOTALUNIDADES >= adoc.CUNIDADESPENDIENTES and adoc.CCANCELADO = 0";

        $sWhere2 = "WHERE CIDPRODUCTO != 0 and CRAZONSOCIAL NOT IN('FLEX FINISHES MEXICO','PINTURAS Y COMPLEMENTOS DE PUEBLA')";
        if ($search["marca"] != "") {
            $sWhere2 .= " and MARCA = '" . $search["marca"] . "'";
        }
        if ($search["empresa"] != "") {
            $sWhere2 .= " and EMPRESA = '" . $search["empresa"] . "'";
        }
        if ($search["canal"] != "") {
            $sWhere2 .= " and CANAL = '" . $search["canal"] . "'";
        }
        if ($search["clasificacion"] != "") {
            $sWhere2 .= " and CLASIFICACION = '" . $search["clasificacion"] . "'";
        }
        if ($search["estatus"] != "") {
            if($search["estatus"] == 'BACKORDER' ){

                $sWhere2 .= " and backorder IS NOT NULL";
            }else if($search["estatus"] == 'MULTIPLE' ){

                $sWhere2 .= " and surtido IS NOT NULL and backorder IS NOT NULL";
            }
            else if($search["estatus"] == 'FALTANTE' ){

                $sWhere2 .= " and surtido IS NULL and backorder IS NULL";
            }else if($search["estatus"] == 'SURTIDOS' ){

                $sWhere2 .= " and surtido IS NOT NULL and backorder IS NULL";
            }
            //$sWhere2 .= " and ESTATUS = '" . $search["estatus"] . "'";
        }



        if ($search["cliente"] != "[]") {

            $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
            $sWhere1 .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
        }

        if ($search["fechaInicio"] != "" and $search["fechaFinal"] != "") {
            $sWhere .= " and adoc.CFECHA >= '" . $search["fechaInicio"] . "' and adoc.CFECHA <= '" . $search["fechaFinal"] . "' ";
            $sWhere1 .= " and adoc.CFECHA >= '" . $search["fechaInicio"] . "' and  adoc.CFECHA <= '" . $search["fechaFinal"] . "' ";
        } else {
            $sWhere .= " and adoc.CFECHA > '2022-01-01'";
            $sWhere1 .= " and adoc.CFECHA > '2022-01-01'";
        }
        $almacen1 = 1;
        $almacen2 = 1;
        $ejercicio = 9;
        $periodo = $search['periodo'];

        $sql = "WITH backorder as(SELECT 
                aprod.CIDPRODUCTO
                ,CASE adoc.CSERIEDOCUMENTO
                WHEN 'PDIN' THEN 'industrial'
                WHEN 'PEND' THEN 'industrial'
                  WHEN 'PDMY' THEN 'mayoreo'
                  WHEN 'PECD' THEN 'mayoreo'
                  WHEN 'PDEC' THEN 'ecommerce'
                  WHEN 'PEEC' THEN 'ecommerce'
                  WHEN 'PDPR' THEN 'prueba'
                  WHEN 'PEBB' THEN 'prueba'
                  ELSE 'OTRO'
               END AS 'CANAL'
               ,CASE 
          WHEN CAST(dbo.rotacionBackorder(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacionBackorder(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacionBackorder(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacionBackorder(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacionBackorder(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END  as 'CLASIFICACION'
                ,adoc.CSERIEDOCUMENTO
               ,adoc.CFOLIO
               ,adoc.CRAZONSOCIAL
               ,adoc.CFECHA
               ,aprod.CCODIGOPRODUCTO
               ,aprod.CNOMBREPRODUCTO
               ,CASE amed.CABREVIATURA
               WHEN '(N)'
               THEN
               'KIT'
               ELSE
               amed.CABREVIATURA
               END AS 'UNIDAD'
               ,dbo.existencias(aprod.CCODIGOPRODUCTO,1,'" . $periodo . "') as EXISTENCIA
               ,acla.CVALORCLASIFICACION as  'MARCA'
               ,aalm.CNOMBREALMACEN
               ,amov.CPRECIO
               ,amov.CNETO
               ,amov.CDESCUENTO1
               ,amov.CDESCUENTO2
               ,amov.CPORCENTAJEDESCUENTO1
               ,amov.CUNIDADES
               ,amov.CUNIDADESCAPTURADAS
               ,amov.CPRECIOCAPTURADO
               ,amov.CTOTAL
               ,amov.CUNIDADESPENDIENTES
               ,amov.CUNIDADESPENDIENTES * amov.CPRECIO AS 'TOTALPENDIENTE'
               ,'DEKKERLAB' as 'EMPRESA'
               ,dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'backorder'
               ,dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'surtido'
               ,CASE
               WHEN dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL and dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL
               THEN
                   'FALTANTE'
                WHEN  dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL and dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL and dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) != amov.CUNIDADESPENDIENTES
               THEN
                   'FALTANTE'
                WHEN  dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) = amov.CUNIDADESPENDIENTES and dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL 
               THEN
                   'SURTIDO'
                
                WHEN dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL AND dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL
                THEN
                    'TODOS'
               ELSE
                   'BACKORDER'
               END as 'ESTATUS'
             
          FROM [adDEKKERLAB].[dbo].[admMovimientos] as amov INNER JOIN [adDEKKERLAB].[dbo].[admProductos] as aprod ON amov.CIDPRODUCTO = aprod.CIDPRODUCTO INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON amov.CIDUNIDAD = amed.CIDUNIDAD INNER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aprod.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admAlmacenes] as aalm ON amov.CIDALMACEN = aalm.CIDALMACEN WHERE $sWhere
          UNION
          SELECT 
                aprod.CIDPRODUCTO
                ,CASE adoc.CSERIEDOCUMENTO
                WHEN 'PEPB'
               THEN
               'flex'
               ELSE
               'OTRO'
               END AS 'CANAL'
               ,CASE 
          WHEN CAST(dbo.rotacionFlex(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacionFlex(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacionFlex(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacionFlex(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacionFlex(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END  as 'CLASIFICACION'
                ,adoc.CSERIEDOCUMENTO
               ,adoc.CFOLIO
               ,adoc.CRAZONSOCIAL
               ,adoc.CFECHA
               ,aprod.CCODIGOPRODUCTO
               ,aprod.CNOMBREPRODUCTO
               ,CASE amed.CABREVIATURA
               WHEN '(N)'
               THEN
               'KIT'
               ELSE
               amed.CABREVIATURA
               END AS 'UNIDAD'
              , dbo.existenciasFlex(aprod.CCODIGOPRODUCTO,1,'" . $periodo . "') as EXISTENCIA
               ,acla.CVALORCLASIFICACION as  'MARCA'
               ,aalm.CNOMBREALMACEN
               ,amov.CPRECIO
               ,amov.CNETO
               ,amov.CDESCUENTO1
               ,amov.CDESCUENTO2
               ,amov.CPORCENTAJEDESCUENTO1
               ,amov.CUNIDADES
               ,amov.CUNIDADESCAPTURADAS
               ,amov.CPRECIOCAPTURADO
               ,amov.CTOTAL
               ,amov.CUNIDADESPENDIENTES
               ,amov.CUNIDADESPENDIENTES * amov.CPRECIO AS 'TOTALPENDIENTE'
               ,'FLEX' as 'EMPRESA'
               ,dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'backorder'
                ,dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'surtido'
               ,CASE
               WHEN dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL and dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL
               THEN
                   'FALTANTE'
                WHEN  dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL and dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL and dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) != amov.CUNIDADESPENDIENTES
               THEN
                   'FALTANTE'
                WHEN  dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) = amov.CUNIDADESPENDIENTES and dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL 
               THEN
                   'SURTIDO'
               
                WHEN dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL AND dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL
                THEN
                    'TODOS'
               ELSE
                   'BACKORDER'
               END as 'ESTATUS'
             
          FROM [adFLEX2020SADEC].[dbo].[admMovimientos] as amov INNER JOIN [adFLEX2020SADEC].[dbo].[admProductos] as aprod ON amov.CIDPRODUCTO = aprod.CIDPRODUCTO INNER JOIN [adFLEX2020SADEC].[dbo].[admUnidadesMedidaPeso] as amed ON amov.CIDUNIDAD = amed.CIDUNIDAD INNER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aprod.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION INNER JOIN [adFLEX2020SADEC].[dbo].[admAlmacenes] as aalm ON amov.CIDALMACEN = aalm.CIDALMACEN WHERE $sWhere1)
          SELECT * FROM backorder $sWhere2 order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

        $query = $this->mysqli->query($sql);


        $sql1 = "WITH backorder as(SELECT 
                aprod.CIDPRODUCTO
                ,CASE adoc.CSERIEDOCUMENTO
                WHEN 'PDIN'
               THEN
               'industrial'
               WHEN 'PDMY'
               THEN
               'mayoreo'
               ELSE
               'OTRO'
               END AS 'CANAL'
               ,CASE 
                WHEN CAST(dbo.rotacionBackorder(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 74.99
                THEN
                'A'
                WHEN CAST(dbo.rotacionBackorder(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacionBackorder(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) < 75
                THEN
                'B'
                WHEN CAST(dbo.rotacionBackorder(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacionBackorder(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) < 50
                THEN
                'C'
                ELSE
                'D'
                END  as 'CLASIFICACION'
                ,adoc.CSERIEDOCUMENTO
               ,adoc.CFOLIO
               ,adoc.CRAZONSOCIAL
               ,adoc.CFECHA
               ,aprod.CCODIGOPRODUCTO
               ,aprod.CNOMBREPRODUCTO
               ,CASE amed.CABREVIATURA
               WHEN '(N)'
               THEN
               'KIT'
               ELSE
               amed.CABREVIATURA
               END AS 'UNIDAD'
               ,dbo.existencias(aprod.CCODIGOPRODUCTO,1,'" . $periodo . "') as EXISTENCIA
               ,acla.CVALORCLASIFICACION as  'MARCA'
               ,aalm.CNOMBREALMACEN
               ,amov.CPRECIO
               ,amov.CNETO
               ,amov.CDESCUENTO1
               ,amov.CDESCUENTO2
               ,amov.CPORCENTAJEDESCUENTO1
               ,amov.CUNIDADES
                ,amov.CUNIDADESCAPTURADAS
               ,amov.CPRECIOCAPTURADO
               ,amov.CTOTAL
               ,amov.CUNIDADESPENDIENTES
               ,amov.CUNIDADESPENDIENTES * amov.CPRECIO AS 'TOTALPENDIENTE'
               ,'DEKKERLAB' as 'EMPRESA'
               ,dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'backorder'
                ,dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'surtido'
               ,CASE
               WHEN dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL and dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL
               THEN
                   'FALTANTE'
               WHEN  dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL and dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL and dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) != amov.CUNIDADESPENDIENTES
               THEN
                   'FALTANTE'
                 WHEN  dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) = amov.CUNIDADESPENDIENTES and dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL 
               THEN
                   'SURTIDO'
               
                WHEN dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL AND dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL
                THEN
                    'TODOS'
               ELSE
                   'BACKORDER'
               END as 'ESTATUS'
             
          FROM [adDEKKERLAB].[dbo].[admMovimientos] as amov INNER JOIN [adDEKKERLAB].[dbo].[admProductos] as aprod ON amov.CIDPRODUCTO = aprod.CIDPRODUCTO INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON amov.CIDUNIDAD = amed.CIDUNIDAD INNER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aprod.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admAlmacenes] as aalm ON amov.CIDALMACEN = aalm.CIDALMACEN WHERE $sWhere
          UNION
          SELECT 
                aprod.CIDPRODUCTO
                ,CASE adoc.CSERIEDOCUMENTO
                WHEN 'PEPB'
               THEN
               'flex'
               ELSE
               'OTRO'
               END AS 'CANAL'
               ,CASE 
          WHEN CAST(dbo.rotacionFlex(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacionFlex(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacionFlex(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacionFlex(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacionFlex(aprod.CCODIGOPRODUCTO,1) AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END  as 'CLASIFICACION'
                ,adoc.CSERIEDOCUMENTO
               ,adoc.CFOLIO
               ,adoc.CRAZONSOCIAL
               ,adoc.CFECHA
               ,aprod.CCODIGOPRODUCTO
               ,aprod.CNOMBREPRODUCTO
               ,CASE amed.CABREVIATURA
               WHEN '(N)'
               THEN
               'KIT'
               ELSE
               amed.CABREVIATURA
               END AS 'UNIDAD'
               ,dbo.existenciasFlex(aprod.CCODIGOPRODUCTO,1,'" . $periodo . "') as EXISTENCIA
               ,acla.CVALORCLASIFICACION as  'MARCA'
               ,aalm.CNOMBREALMACEN
               ,amov.CPRECIO
               ,amov.CNETO
               ,amov.CDESCUENTO1
               ,amov.CDESCUENTO2
               ,amov.CPORCENTAJEDESCUENTO1
               ,amov.CUNIDADES
                ,amov.CUNIDADESCAPTURADAS
               ,amov.CPRECIOCAPTURADO
               ,amov.CTOTAL
               ,amov.CUNIDADESPENDIENTES
               ,amov.CUNIDADESPENDIENTES * amov.CPRECIO AS 'TOTALPENDIENTE'
               ,'FLEX' as 'EMPRESA'
               ,dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'backorder'
               ,dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'surtido'
               ,CASE
               WHEN dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL and dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL
               THEN
                   'FALTANTE'
               WHEN  dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL and dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL and dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) != amov.CUNIDADESPENDIENTES
               THEN
                   'FALTANTE'
                WHEN  dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) = amov.CUNIDADESPENDIENTES and dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL 
               THEN
                   'SURTIDO'
                
                WHEN dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL AND dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NOT NULL
                THEN
                    'TODOS'
               ELSE
                   'BACKORDER'
               END as 'ESTATUS'
             
          FROM [adFLEX2020SADEC].[dbo].[admMovimientos] as amov INNER JOIN [adFLEX2020SADEC].[dbo].[admProductos] as aprod ON amov.CIDPRODUCTO = aprod.CIDPRODUCTO INNER JOIN [adFLEX2020SADEC].[dbo].[admUnidadesMedidaPeso] as amed ON amov.CIDUNIDAD = amed.CIDUNIDAD INNER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aprod.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION INNER JOIN [adFLEX2020SADEC].[dbo].[admAlmacenes] as aalm ON amov.CIDALMACEN = aalm.CIDALMACEN WHERE $sWhere1)
          SELECT * FROM backorder $sWhere2  ORDER BY CNOMBREPRODUCTO asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function listadoMarcas()
    {
        $sql = "WITH Marcas As(SELECT 
        CVALORCLASIFICACION As Marca
      
   FROM [adDEKKERLAB].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 25),
   marcasOrdenadas As(
     SELECT
         *
     FROM Marcas)
     SELECT * FROM marcasOrdenadas ORDER BY Marca ASC";

        $query = $this->mysqli->query($sql);

        $nums_row = $this->countAll($sql);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getClientes($search, $aColumns)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        if ($search["cliente"] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $search["cliente"] . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        } else {
            $sWhere = "";
        }

        $sql = "WITH listaClientes AS(
          SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
          
              
          FROM [adFLEX2020SADEC].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
          
          UNION 
          SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
              
              
          FROM [adDEKKERLAB].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1),
          listadoClientes AS(
                SELECT * FROM listaClientes AS lc  $sWhere 
          
          )
          select * from listadoClientes ORDER BY CCODIGOCLIENTE ASC OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH listaClientes AS(
            SELECT CCODIGOCLIENTE
                ,CRFC
                ,CRAZONSOCIAL
                ,CFECHAALTA
            
                
            FROM [adFLEX2020SADEC].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
            
            UNION 
            SELECT CCODIGOCLIENTE
                ,CRFC
                ,CRAZONSOCIAL
                ,CFECHAALTA
                
                
            FROM [adDEKKERLAB].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1),
            listadoClientes AS(
                  SELECT * FROM listaClientes AS lc  $sWhere 
            
            )
    select * from listadoClientes ORDER BY CCODIGOCLIENTE ASC";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getDetalleProductosPedido($tabla, $search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $idDocumento = $search['idDocumento'];

        $sql = "WITH productos as(SELECT  
        amov.CNUMEROMOVIMIENTO
        ,adoc.CSERIEDOCUMENTO
        ,adoc.CFOLIO
        ,aprod.CCODIGOPRODUCTO
        ,aprod.CNOMBREPRODUCTO
        ,amov.CUNIDADESPENDIENTES
        ,dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'backorder'
        ,dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'surtido'
        , CASE 
            WHEN amov.CUNIDADESPENDIENTES = 0
            THEN
            'SURTIDO'
            
            WHEN  amov.CUNIDADESPENDIENTES > dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO)
            THEN
            'SURTIDO PARCIAL'
            WHEN  amov.CUNIDADESPENDIENTES = dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO)
            THEN
            'SURTIDO'
            WHEN  dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL AND dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL
            THEN
            'FALTANTE'
           WHEN  amov.CUNIDADESPENDIENTES > dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) AND dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL
            THEN
            'FALTANTE'
            WHEN  amov.CUNIDADESPENDIENTES = dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO)
            THEN
            'BACKORDER'
            END as 'ESTATUS'

  FROM [$tabla].[dbo].[admMovimientos] as amov INNER JOIN [$tabla].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO  INNER JOIN [$tabla].[dbo].[admProductos] as aprod ON amov.CIDPRODUCTO = aprod.CIDPRODUCTO where adoc.CIDDOCUMENTO = '" . $idDocumento . "')
  SELECT * FROM productos order by CNUMEROMOVIMIENTO ASC OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);
           
        $sql1 = "WITH productos as(SELECT  
        amov.CNUMEROMOVIMIENTO
        ,adoc.CSERIEDOCUMENTO
        ,adoc.CFOLIO
        ,aprod.CCODIGOPRODUCTO
        ,aprod.CNOMBREPRODUCTO
        ,amov.CUNIDADESPENDIENTES
        ,dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'backorder'
        ,dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) as 'surtido'
        ,  CASE 
            WHEN amov.CUNIDADESPENDIENTES = 0
            THEN
            'SURTIDO'
            
            WHEN  amov.CUNIDADESPENDIENTES > dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO)
            THEN
            'SURTIDO PARCIAL'
            WHEN  amov.CUNIDADESPENDIENTES = dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO)
            THEN
            'SURTIDO'
            WHEN  dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL AND dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL
            THEN
            'FALTANTE'
           WHEN  amov.CUNIDADESPENDIENTES > dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) AND dbo.surtido(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO) IS NULL
            THEN
            'FALTANTE'
            WHEN  amov.CUNIDADESPENDIENTES = dbo.backorder(aprod.CCODIGOPRODUCTO,adoc.CSERIEDOCUMENTO,adoc.CFOLIO)
            THEN
            'BACKORDER'
            END as 'ESTATUS'
           
  FROM [$tabla].[dbo].[admMovimientos] as amov INNER JOIN [$tabla].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO  INNER JOIN [$tabla].[dbo].[admProductos] as aprod ON amov.CIDPRODUCTO = aprod.CIDPRODUCTO where adoc.CIDDOCUMENTO = '" . $idDocumento . "')
  SELECT * FROM productos order by CNUMEROMOVIMIENTO ASC";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function setProductosBackorder($datos)
    {


        $sql = "INSERT INTO [parametrosVentas].[dbo].[BACKORDER] (serie,folio,codigoProducto,unidades,unidadesPendientes,fecha) VALUES('" . $datos["serie"] . "','" . $datos["folio"] . "','" . $datos["codigoProducto"] . "','" . $datos["unidades"] . "','" . $datos["unidadesPendientes"] . "',getdate())";

        $query = $this->mysqli->query($sql);

        if ($query) {
            return "ok";
        } else {
            return "error";
        }
    }
    public function setProductosSurtidos($datos)
    {
        $negativas = -abs($datos["unidadesPendientes"]);
        /*
        if($datos["backorder"] == NULL){

        }else{
            $sql1 = "INSERT INTO [parametrosVentas].[dbo].[BACKORDER] (serie,folio,codigoProducto,unidades,unidadesPendientes,fecha) VALUES('" . $datos["serie"] . "','" . $datos["folio"] . "','" . $datos["codigoProducto"] . "','" . $datos["unidades"] . "','" . $negativas . "',getdate())";

            $query1= $this->mysqli->query($sql1);
        }
        */
         $sql = "INSERT INTO [parametrosVentas].[dbo].[SURTIDOS] (serie,folio,codigoProducto,unidades,unidadesSurtidas,fecha) VALUES('" . $datos["serie"] . "','" . $datos["folio"] . "','" . $datos["codigoProducto"] . "','" . $datos["unidades"] . "','" . $datos["unidadesPendientes"] . "',getdate())";

        $query = $this->mysqli->query($sql);

        if ($query) {
            return "ok";
        } else {
            return "error";
        }
    }
     public function setELiminarBackorder($datos)
    {
      
         $sql = "DELETE FROM [parametrosVentas].[dbo].[BACKORDER] WHERE serie = '".$datos["serie"]."' and folio = '".$datos["folio"]."' and codigoProducto = '".$datos["codigoProducto"]."' and unidadesPendientes = '".$datos["unidades"]."'";

        $query = $this->mysqli->query($sql);

        if ($query) {
            return "ok";
        } else {
            return "error";
        }
    }
    function setCounter($counter)
    {
        $this->counter = $counter;
    }
    function getCounter()
    {
        return $this->counter;
    }
}
