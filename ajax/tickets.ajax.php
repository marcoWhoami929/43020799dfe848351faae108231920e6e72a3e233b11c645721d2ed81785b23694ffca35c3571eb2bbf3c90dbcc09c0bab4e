<?php
session_start();
require_once "../controladores/tickets.controlador.php";
require_once "../modelos/tickets.modelo.php";

class AjaxTickets{


	/*=============================================
	VER TICKETS
	=============================================*/	

	public $idTicket;

	public function ajaxVerTickets(){

		$item = "idTicket";
		$valor = $this->idTicket;

		$respuesta = ControladorTickets::ctrMostrarDetallesTicket($item, $valor);

		echo json_encode($respuesta);
		

	}

	/*=============================================
	VER TICKETS GENERALES
	=============================================*/	

	public $idTicket2;

	public function ajaxVerTicketsGeneral(){

		$item = "idTicket";
		$valor = $this->idTicket2;

		$respuesta = ControladorTickets::ctrMostrarDetallesTicket($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VER TICKETS CREADOS
	=============================================*/	

	public $idTicket3;

	public function ajaxVerTicketsCreados(){

		$item = "idTicket";
		$valor = $this->idTicket3;

		$respuesta = ControladorTickets::ctrMostrarDetallesTicket($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VISTO DE SOLICITUD
	=============================================*/	

	public $statusVisto;
	public $activarIdVisto;

	public function ajaxVisto(){

		$tabla = "estatustickets";
		$tabla2 = "notificacionestickets";

		$item1 = "estatus";
		$valor1 = $this->statusVisto;

		$item2 = "id";
		$valor2 = $this->activarIdVisto;

		$folioTicket = $this->folioTicket;
		$autorTicket = $this->autorTicket;
		$autorComentario = $_SESSION["id"];
		$nombreAutorComentario = $_SESSION["nombre"];
		$tituloNotificacion = "El ticket  #000".$folioTicket." ha sido visto por ".$nombreAutorComentario."";
		$datos = array("titulo" => $tituloNotificacion,
						"folioTicket" => $folioTicket,
						"autorTicket" => $autorTicket,
						"autorComentario" => $autorComentario);



		$respuesta = ModeloTickets::mdlActualizarVisto($tabla, $item1, $valor1, $item2, $valor2);
		$respuesta = ModeloTickets::mdlGuardarNotificacion($tabla2,$datos);

		echo $respuesta;

	}
	/*=============================================
	AGENTES CON TICKETS PENDIENTES
	=============================================*/	

	public $idDepartamentoTicket;

	public function ajaxVerTicketsPendientes(){

		$item = "idDepartamento";
		$valor = $this->idDepartamentoTicket;

		$respuesta = ControladorTickets::ctrMostrarTicketsPendientesPorDepartamento($item, $valor);
	
		echo json_encode($respuesta);

	}



}
/*=============================================
VER TICKETS
=============================================*/
if(isset($_POST["idTicket"])){

	$verTicket = new AjaxTickets();
	$verTicket -> idTicket = $_POST["idTicket"];
	$verTicket -> ajaxVerTickets();

}
/*=============================================
VER TICKETS GENERALES
=============================================*/
if(isset($_POST["idTicket2"])){

	$verTicketGeneral = new AjaxTickets();
	$verTicketGeneral -> idTicket2 = $_POST["idTicket2"];
	$verTicketGeneral -> ajaxVerTicketsGeneral();

}
/*=============================================
VER TICKETS CREADOS
=============================================*/
if(isset($_POST["idTicket3"])){

	$verTicketCreado = new AjaxTickets();
	$verTicketCreado -> idTicket3 = $_POST["idTicket3"];
	$verTicketCreado -> ajaxVerTicketsCreados();

}
/*=============================================
VISTO DE TICKET
=============================================*/	

if(isset($_POST["statusVisto"])){

	$status1 = new AjaxTickets();
	$status1 -> statusVisto = $_POST["statusVisto"];
	$status1 -> activarIdVisto = $_POST["activarIdVisto"];
	$status1 -> folioTicket = $_POST["folioTicket"];
	$status1 -> autorTicket = $_POST["autorTicket"];
	$status1 -> ajaxVisto();
}
/*=============================================
VER TICKETS PENDIENTES
=============================================*/
if (isset($_POST["idDepartamentoTicket"])) {
	
	$ticketPendiente = new AjaxTickets();
	$ticketPendiente -> idDepartamentoTicket = $_POST["idDepartamentoTicket"];
	$ticketPendiente -> ajaxVerTicketsPendientes();
}




