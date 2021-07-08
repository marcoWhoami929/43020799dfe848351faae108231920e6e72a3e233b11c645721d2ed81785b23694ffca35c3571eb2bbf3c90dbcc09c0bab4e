<?php
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";
class AjaxListadoProductos{

		public $empresaProductos;
		public function ajaxObtenerProductosComercial(){

				if ($this->empresaProductos != "FLEX") {
					include("../modelos/conexion-api-server-pinturas.modelo.php");
				}else{
					include("../modelos/conexion-api-server-flex.modelo.php");
				}
			
			
				$mostrarProductos =  "SELECT apro.CIDPRODUCTO as IDCOMERCIAL
		  ,apro.CTIPOPRODUCTO as TIPOPRODUCTO
	      ,apro.CCODIGOPRODUCTO as CODIGO
	      ,apro.CNOMBREPRODUCTO as DESCRIPCION
		  ,acla.CVALORCLASIFICACION as CATALOGO
		  ,apro.CPRECIO1 as BASE
		  ,apro.CPRECIO2 as CUBETA
		  ,apro.CPRECIO3 as GALON
		  ,apro.CPRECIO4 as LITRO
		  ,apro.CPRECIO5 as QUIML
		  ,apro.CPRECIO6 as DOSML
		  ,apro.CPRECIO7 as UNOML
		  ,apro.CPRECIO8 as DISTRIBUIDOR
		  ,apro.CSTATUSPRODUCTO as ESTATUS
		  ,apro.CCLAVESAT as CLAVESAT
		  ,aunid.CABREVIATURA as UNIDADMEDIDA
		  ,CASE cast(aunid.CNOMBREUNIDAD AS VARCHAR(100))
			WHEN ' ' THEN 
			'1'
			WHEN '(Ninguno)' THEN 
			'1'
			WHEN 'PZ' THEN 
			'1'
			WHEN 'SERVICIO' THEN 
			'0'
			ELSE
			substring(aunid.CNOMBREUNIDAD, charindex('', aunid.CNOMBREUNIDAD) - 2, len(aunid.CNOMBREUNIDAD))
			END
			as VALORMEDIDA
		  ,substring(aunid.CNOMBREUNIDAD, charindex(' ', aunid.CNOMBREUNIDAD) + 1, len(aunid.CNOMBREUNIDAD)) AS GRAMAJE
		  ,aunid.CNOMBREUNIDAD as NOMBRE
		  
	      
	  FROM dbo.admProductos as apro INNER JOIN dbo.admClasificacionesValores as acla ON apro.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION INNER JOIN dbo.admUnidadesMedidaPeso as aunid ON apro.CIDUNIDADBASE = aunid.CIDUNIDAD";


            $ejecutar = sqlsrv_query($conne,$mostrarProductos);
            $i = 0;
           		
           	if (sqlsrv_has_rows($ejecutar) === false) {
           		echo null;
           	}else{
           		 while ($value = sqlsrv_fetch_array($ejecutar)) {
            	
            	$facturas[$i] = array(
            		 				 "IDCOMERCIAL"=>$value["IDCOMERCIAL"],
            						 "TIPOPRODUCTO" => $value["TIPOPRODUCTO"],
            						 "CODIGO" => $value["CODIGO"],
            						 "DESCRIPCION" => $value["DESCRIPCION"],
            						 "CATALOGO" => $value["CATALOGO"],
            						 "BASE" => $value["BASE"],
            						 "CUBETA"=>$value["CUBETA"],
            						 "GALON" => $value["GALON"],
            						 "LITRO" => $value["LITRO"],
            						 "QUIML" => $value["QUIML"],
            						 "DOSML" => $value["DOSML"],
            						 "UNOML" => $value["UNOML"],
            						 "DISTRIBUIDOR"=> $value["DISTRIBUIDOR"],
            						 "ESTATUS" => $value["ESTATUS"],
            						 "CLAVESAT" => $value["CLAVESAT"],
            						 "UNIDADMEDIDA" => $value["UNIDADMEDIDA"],
            						 "VALORMEDIDA" => $value["VALORMEDIDA"],
            						 "GRAMAJE" => $value["GRAMAJE"],
            						 "NOMBRE" => $value["NOMBRE"]);
            	$i++;
            }
            echo json_encode($facturas);
           	}
         
           
           
           

	}
	public $listadoFacturasComercial;
	
	public function ajaxActualizarProductos(){

			include("../db_connect.php");
			
			
			$lista = $this->listadoActualizacionProductos;

			$arregloProductos = json_decode($lista,true);

			foreach ($arregloProductos as  $value) {

				$consulta1 = "SELECT * FROM productos WHERE idComercial = '".$value["IDCOMERCIAL"]."'";

				$ejecutar = mysqli_query($conn, $consulta1) or die("database error:". mysqli_error($conn));
				
				$row_count = mysqli_num_rows($ejecutar);

				if ($row_count != 0) {

						
					
						$actualizarProductos = "UPDATE productos set  base = '".$value["BASE"]."', cubeta = '".$value["CUBETA"]."', galon = '".$value["GALON"]."', litro = '".$value["LITRO"]."', quiml = '".$value["QUIML"]."', dosml = '".$value["DOSML"]."',unoml = '".$value["UNOML"]."', distribuidor = '".$value["DISTRIBUIDOR"]."', estatus = '".$value["ESTATUS"]."' WHERE idComercial = '".$value["IDCOMERCIAL"]."'";
						mysqli_query($conn, $actualizarProductos) or die("database error:". mysqli_error($conn));


				}else{	


						$insertarProductos = "INSERT INTO productos(idComercial,tipoProducto,codigo,descripcion,catalogo,base,cubeta,galon,litro,quiml,dosml,unoml,distribuidor,estatus,claveSat,unidadMedida,valorMedida,gramaje,nombre) VALUES('".$value["IDCOMERCIAL"]."','".$value["TIPOPRODUCTO"]."','".$value["CODIGO"]."','".$value["DESCRIPCION"]."','".$value["CATALOGO"]."','".$value["BASE"]."','".$value["CUBETA"]."','".$value["GALON"]."','".$value["LITRO"]."','".$value["QUIML"]."','".$value["DOSML"]."','".$value["UNOML"]."','".$value["DISTRIBUIDOR"]."','".$value["ESTATUS"]."','".$value["CLAVESAT"]."','".$value["UNIDADMEDIDA"]."','".$value["VALORMEDIDA"]."','".$value["GRAMAJE"]."','".$value["NOMBRE"]."')";
							mysqli_query($conn, $insertarProductos) or die("database error:". mysqli_error($conn));


				}
				
			}

			echo  json_encode("finalizado");

	}

}
/*=============================================
OBTENER PRODUCTOS
=============================================*/
if (isset($_POST["empresaProductos"])) {
	
	$obtenerProductos = new AjaxListadoProductos();
	$obtenerProductos -> empresaProductos = $_POST["empresaProductos"];
	$obtenerProductos -> ajaxObtenerProductosComercial();
}
/*=============================================
ACTUALIZAR PRODUCTOS
=============================================*/
if (isset($_POST["listadoActualizacionProductos"])) {
	
	$actualizarProductos = new AjaxListadoProductos();
	$actualizarProductos -> listadoActualizacionProductos = $_POST["listadoActualizacionProductos"];
	$actualizarProductos -> ajaxActualizarProductos();
}

?>