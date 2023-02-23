<?php 
	
	$cod = $_GET['_num1'];

	if (!empty($cod)) {
		 comprobar($cod);
	}

	function comprobar($cod){
		include("modelos/conexion-api-server-pinturas.modelo.php");


	$mostrarClientes =  "  SELECT  clien.CCODIGOCLIENTE
	,clien.CIDCLIENTEPROVEEDOR
	,clien.CRFC
	,clien.CRAZONSOCIAL
	  ,CONCAT(dom.CNOMBRECALLE,',',dom.CNUMEROINTERIOR,',',dom.CNUMEROEXTERIOR,',',dom.CCOLONIA,',',dom.CMUNICIPIO,',',dom.CESTADO,',',dom.CCIUDAD,',',dom.CPAIS) AS CDOMICILIOFISCAL
	,CASE agen.CIDAGENTE
	WHEN 0
	THEN
	   ''
	ELSE
	   agen.CNOMBREAGENTE
	END as CNOMBREAGENTE

	,clien.CDIASCREDITOCLIENTE
	,clien.CDESCUENTOMOVTO
   , CASE agen.CIDAGENTE
	WHEN 0
	THEN
	   ''
	ELSE
	   agen.CCODIGOAGENTE
	END as CCODIGOAGENTE
  
FROM [adDEKKERLAB].[dbo].[admClientes] as clien LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen on clien.CIDAGENTEVENTA = agen.CIDAGENTE LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDomicilios] as dom on clien.CIDCLIENTEPROVEEDOR = dom.CIDCATALOGO WHERE clien.CIDCLIENTEPROVEEDOR != 0 and clien.CCODIGOCLIENTE = '" . $cod . "' and dom.CTIPOCATALOGO = 1 and dom.CTIPODIRECCION = 0";


	$ejecutar = sqlsrv_query($conne, $mostrarClientes);
	$i = 0;

	if (sqlsrv_has_rows($ejecutar) === false) {
		echo null;
	} else {
		while ($value = sqlsrv_fetch_array($ejecutar)) {

			$clientes[$i] = array(
				"nombreCliente" => $value["CRAZONSOCIAL"],
				"rfc" => $value["CRFC"],
				"domicilioFiscal" => $value["CDOMICILIOFISCAL"],
				"agenteVentas" => $value["CNOMBREAGENTE"],
				"diasCredito" => $value["CDIASCREDITOCLIENTE"],
				"descuentoMovimiento" => $value["CDESCUENTOMOVTO"],
				"codigoAgente" => $value["CCODIGOAGENTE"],
				"resultado" => 1
			);
			$i++;
		}
		echo json_encode($clientes);
	}
	}

?>