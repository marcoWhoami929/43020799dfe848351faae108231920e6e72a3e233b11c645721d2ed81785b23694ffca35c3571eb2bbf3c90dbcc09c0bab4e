<?php
class ControladorFlujo{
	
	static public function ctrDiasMes($item, $valor){

			$tabla = "banco6278";

			$respuesta = ModeloFlujo::mdlDiasMes($tabla, $item, $valor);

			return $respuesta;
	}


}

?>