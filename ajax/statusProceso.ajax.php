<?php
require_once "../controladores/controlMuestras.controlador.php";
require_once "../modelos/controlMuestras.modelo.php";
require_once "../controladores/notificaciones.controlador.php";
require_once "../modelos/notificaciones.modelo.php";

class AjaxMuestras{


	/*=============================================
	SOLICITUD ENVIADA
	=============================================*/	

	public $status1;
	public $activarId1;

	public function ajaxSolicitudEnviada(){

		$tabla = "solicitudes";

		$item1 = "solicitudEnviada";
		$valor1 = $this->status1;

		$item2 = "id";
		$valor2 = $this->activarId1;

		$respuesta = ModeloControlMuestras::mdlActualizarSolicitudEnviada($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	/*=============================================
	MOTO EN CAMINO
	=============================================*/	

	public $status3;
	public $activarId3;

	public function ajaxSolicitudMotoEnCamino(){

		$tabla = "solicitudes";

		$item1 = "motoEnCamino";
		$valor1 = $this->status3;

		$item2 = "id";
		$valor2 = $this->activarId3;

		$horaRealizada =date("y-m-d H:i:s");
        $item3 = "enCaminoFecha";
        $valor3 = $horaRealizada;

		$respuesta = ModeloControlMuestras::mdlActualizarMotoEnCamino($tabla, $item1, $valor1, $item2, $valor2);
		$respuesta2 = ModeloControlMuestras::mdlActualizarMotoEnCaminoFecha($tabla, $item2, $valor2, $item3, $valor3);

		echo $respuesta;

	}
	
	/*=============================================
	EN PROCESO
	=============================================*/	

	public $status5;
	public $activarId5;

	public function ajaxSolicitudEnProceso(){

		$tabla = "solicitudes";

		$item1 = "enProceso";
		$valor1 = $this->status5;

		$item2 = "id";
		$valor2 = $this->activarId5;

		$horaRealizada =date("y-m-d H:i:s");
        $item3 = "enProcesoFecha";
        $valor3 = $horaRealizada;

		$respuesta = ModeloControlMuestras::mdlActualizarEnProceso($tabla, $item1, $valor1, $item2, $valor2);
		$respuesta = ModeloControlMuestras::mdlActualizarEnProcesoFecha($tabla, $item2, $valor2, $item3, $valor3);

		echo $respuesta;

	}
	
	/*=============================================
	MOTO EN CAMINO REGRESO
	=============================================*/	

	public $status7;
	public $activarId7;

	public function ajaxSolicitudMotoEnCaminoRegreso(){

		$tabla = "solicitudes";

		$item1 = "motoEnCaminoRegreso";
		$valor1 = $this->status7;

		$item2 = "id";
		$valor2 = $this->activarId7;

		$horaRealizada =date("y-m-d H:i:s");
        $item3 = "regresoFecha";
        $valor3 = $horaRealizada;


		$respuesta = ModeloControlMuestras::mdlActualizarMotoEnCaminoRegreso($tabla, $item1, $valor1, $item2, $valor2);
		$respuesta = ModeloControlMuestras::mdlActualizarMotoEnCaminoRegresoFecha($tabla, $item2, $valor2, $item3, $valor3);

		echo $respuesta;

	}
	/*=============================================
	CONCLUIDO
	=============================================*/	

	public $status8;
	public $activarId8;

	public function ajaxSolicitudConcluido(){

		$tabla = "solicitudes";

		$item1 = "concluido";
		$valor1 = $this->status8;

		$item2 = "id";
		$valor2 = $this->activarId8;

		$respuesta = ModeloControlMuestras::mdlActualizarConcluido($tabla, $item1, $valor1, $item2, $valor2);
	    /*============================================= 
        ACTUALIZAR NOTIFICACIONES NUEVAS SOLICITUDES
        =============================================*/

        $traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificacionesApp();

        $concluida = $traerNotificaciones["concluidas"] +1;

        ModeloNotificaciones::mdlActualizarNotificaciones("notificacionesapp", "concluidas", $concluida);

        $item3 = "id";
        $valor3 = $this->activarId8;

        $fechaConcluido =date("y-m-d H:i:s");
        $item4 = "horaConcluido";
        $valor4 = $fechaConcluido;

        $respuesta2 = ModeloControlMuestras::mdlActualizarFechaConcluido($tabla, $item3, $valor3, $item4, $valor4);


		echo $respuesta;

	}
	/*=============================================
	VISTO DE SOLICITUD
	=============================================*/	

	public $statusVisto;
	public $activarIdVisto;

	public function ajaxVisto(){

		$tabla = "solicitudes";

		$item1 = "visto";
		$valor1 = $this->statusVisto;

		$item2 = "id";
		$valor2 = $this->activarIdVisto;

		$horaRealizada =date("y-m-d H:i:s");
        $item3 = "horaVisto";
        $valor3 = $horaRealizada;


		$respuesta = ModeloControlMuestras::mdlActualizarVisto($tabla, $item1, $valor1, $item2, $valor2);
		$respuesta = ModeloControlMuestras::mdlActualizarVistoFecha($tabla, $item2, $valor2, $item3, $valor3);

		/*============================================= 
        ACTUALIZAR NOTIFICACIONES QUITAR SOLICITUDES
        =============================================*/

        $traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificacionesApp();

        $solicitudes = $traerNotificaciones["nuevasSolicitudes"] - 1;

        ModeloNotificaciones::mdlActualizarNotificaciones("notificacionesapp", "nuevasSolicitudes", $solicitudes);


		echo $respuesta;

	}
	/*=============================================
	EDITAR PROMOCION
	=============================================*/	

	public $idPromocion;

	public function ajaxEditarPromocion(){

		$item = "id";
		$valor = $this->idPromocion;

		$respuesta = ControladorControlMuestras::ctrMostrarPromociones($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	AGREGAR RUTA DE ARCHIVO
	=============================================*/	

	public $folioSolicitud;

	public function ajaxAgregarRutaSolicitud(){

		$item = "id";
		$valor = $this->folioSolicitud;

		$respuesta = ControladorControlMuestras::ctrAgregarRutaSolicitud($item, $valor);

		echo json_encode($respuesta);

	}


}

/*=============================================
SOLICITUD ENVIADA
=============================================*/	

if(isset($_POST["status1"])){

	$status1 = new AjaxMuestras();
	$status1 -> status1 = $_POST["status1"];
	$status1 -> activarId1 = $_POST["activarId1"];
	$status1 -> ajaxSolicitudEnviada();
}

/*=============================================
MOTO EN CAMINO
=============================================*/	

if(isset($_POST["status3"])){

	$status1 = new AjaxMuestras();
	$status1 -> status3 = $_POST["status3"];
	$status1 -> activarId3 = $_POST["activarId3"];
	$status1 -> ajaxSolicitudMotoEnCamino();

}

/*=============================================
EN PROCESO
=============================================*/	

if(isset($_POST["status5"])){

	$status1 = new AjaxMuestras();
	$status1 -> status5 = $_POST["status5"];
	$status1 -> activarId5 = $_POST["activarId5"];
	$status1 -> ajaxSolicitudEnProceso();
}

/*=============================================
MOTO EN CAMINO DE REGRESO
=============================================*/	

if(isset($_POST["status7"])){

	$status1 = new AjaxMuestras();
	$status1 -> status7 = $_POST["status7"];
	$status1 -> activarId7 = $_POST["activarId7"];
	$status1 -> ajaxSolicitudMotoEnCaminoRegreso();
}
/*=============================================
CONCLUIDO
=============================================*/	

if(isset($_POST["status8"])){

	$status1 = new AjaxMuestras();
	$status1 -> status8 = $_POST["status8"];
	$status1 -> activarId8 = $_POST["activarId8"];
	$status1 -> ajaxSolicitudConcluido();
}
/*=============================================
VISTO DE SOLICITUD
=============================================*/	

if(isset($_POST["statusVisto"])){

	$status1 = new AjaxMuestras();
	$status1 -> statusVisto = $_POST["statusVisto"];
	$status1 -> activarIdVisto = $_POST["activarIdVisto"];
	$status1 -> ajaxVisto();
}
/*=============================================
EDITAR PROMOCION
=============================================*/
if(isset($_POST["idPromocion"])){

	$editar = new AjaxMuestras();
	$editar -> idPromocion = $_POST["idPromocion"];
	$editar -> ajaxEditarPromocion();

}
/*=============================================
AGREGAR RUTA DE ARCHIVO
=============================================*/
if(isset($_POST["folioSolicitud"])){

	$editar = new AjaxMuestras();
	$editar -> folioSolicitud = $_POST["folioSolicitud"];
	$editar -> ajaxAgregarRutaSolicitud();

}