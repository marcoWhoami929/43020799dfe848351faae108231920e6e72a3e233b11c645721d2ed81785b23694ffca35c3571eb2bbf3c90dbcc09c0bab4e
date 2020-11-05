<?php

 class controladorEntregas{

 		public function ctrMostrarEntregas(){

 			$tabla = "entregas";

 			$respuesta = ModeloEntregas::mdlMostrarEntregas($tabla);

 			return $respuesta;

 		}
 		public function ctrMostrarListaOperadores(){

 			$tabla = "operadores";

 			$respuesta = ModeloEntregas::mdlMostrarListaOperadores($tabla);

 			return $respuesta;

 		}
 		public function ctrMostrarListaRutas(){

 			$tabla = "rutas";

 			$respuesta = ModeloEntregas::mdlMostrarListaRutas($tabla);

 			return $respuesta;

 		}
 		public function ctrMostrarListaFacturas(){

 			$tabla = "facturasgenerales";

 			$respuesta = ModeloEntregas::mdlMostrarListaFacturas($tabla);

 			return $respuesta;

 		}
 		public function ctrMostrarUnidadesRuta($item,$valor){

 			$tabla = "unidades";

 			$respuesta = ModeloEntregas::mdlMostrarUnidadesRuta($tabla,$item,$valor);

 			return $respuesta;

 		}
 		public function ctrActualizarEntregaFactura($item,$valor){

 			$tabla = "facturasgenerales";

 			$respuesta = ModeloEntregas::mdlActualizarEntregaFactura($tabla,$item,$valor);

 			return $respuesta;

 		}
 		public function ctrActualizarEntregaFacturaRemove($item,$valor){

 			$tabla = "facturasgenerales";

 			$respuesta = ModeloEntregas::mdlActualizarEntregaFacturaRemove($tabla,$item,$valor);

 			return $respuesta;

 		}
 		public function ctrObtenerMontoEntrega($item,$valor){

 			$tabla = "facturasgenerales";

 			$respuesta = ModeloEntregas::mdlObtenerMontoEntrega($tabla,$item,$valor);

 			return $respuesta;

 		}
 		public function ctrObtenerFolioEntrega(){

 			$tabla = "entregas";

 			$respuesta = ModeloEntregas::mdlObtenerFolioEntrega($tabla);

 			return $respuesta;

 		}
 		public function ctrGenerarNuevaEntrega($datosEntrega){

 			$tabla = "entregas";

 			$respuesta = ModeloEntregas::mdlGenerarNuevaEntrega($tabla,$datosEntrega);

 			return $respuesta;

 		}
 		public function ctrActualizarFacturaEntrega($item,$valor,$item2,$valor2){

 			$tabla = "facturasgenerales";

 			$respuesta = ModeloEntregas::mdlActualizarFacturaEntrega($tabla,$item,$valor,$item2,$valor2);

 			return $respuesta;

 		}
 		public function ctrMostrarDatosFactura($item,$valor){

 			$tabla = "facturasgenerales";

 			$respuesta = ModeloEntregas::mdlMostrarDatosFactura($tabla,$item,$valor);

 			return $respuesta;

 		}
 		public function ctrObtenerUtilidadCliente($cliente){

 			$tabla = "utilidadesclientes";

 			$respuesta = ModeloEntregas::mdlObtenerUtilidadCliente($tabla,$cliente);

 			return $respuesta;

 		}
 		public function ctrObtenerCostoHoraEntrega($nombreRuta,$unidad){

 			$tabla = "rutas";

 			$respuesta = ModeloEntregas::mdlObtenerCostoHoraEntrega($tabla,$nombreRuta,$unidad);

 			return $respuesta;

 		}
 		public function ctrInsertarFacturaEntrega($datosFactura){

 			$tabla = "facturasentregas";

 			$respuesta = ModeloEntregas::mdlInsertarFacturaEntrega($tabla,$datosFactura);

 			return $respuesta;

 		}
 		public function ctrMostrarFacturasEntrega($item,$valor){

 			$tabla = "facturasentregas";

 			$respuesta = ModeloEntregas::mdlMostrarFacturasEntrega($tabla,$item,$valor);

 			return $respuesta;

 		}
 		public function ctrDetalleEntrega($item,$valor){

 			$tabla = "entregas";

 			$respuesta = ModeloEntregas::mdlDetalleEntrega($tabla,$item,$valor);

 			return $respuesta;

 		}
 		public function ctrActualizarHorariosFactura($item,$valor,$inicio,$termino,$horas,$total){

 			$tabla = "facturasentregas";

 			$respuesta = ModeloEntregas::mdlActualizarHorariosFactura($tabla,$item,$valor,$inicio,$termino,$horas,$total);

 			return $respuesta;

 		}
 		public function ctrFinalizarEntrega($idEntrega){

 			$tabla = "entregas";

 			$respuesta = ModeloEntregas::mdlFinalizarEntrega($tabla,$idEntrega);

 			return $respuesta;

 		}
 		public function ctrPendientesFinalizar($idEntrega){

 			$tabla = "facturasentregas";

 			$respuesta = ModeloEntregas::mdlPendientesFinalizar($tabla,$idEntrega);

 			return $respuesta;

 		}
 		public function ctrObtenerTotalFactura($idFacturaEntrega){

 			$tabla = "facturasgenerales";

 			$respuesta = ModeloEntregas::mdlObtenerTotalFactura($tabla,$idFacturaEntrega);

 			return $respuesta;

 		}



 		

 } 



?>