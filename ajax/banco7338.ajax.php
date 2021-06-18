<?php

require_once "../controladores/banco7338.controlador.php";
require_once "../modelos/banco7338.modelo.php";

class AjaxBanco7338
{

    /*=============================================
	EDITAR BANCO
	=============================================*/

    public $idBanco;

    public function ajaxEditarBanco()
    {

        $item = "id";
        $valor = $this->idBanco;

        $respuesta = ControladorBanco7338::ctrMostrarBanco($item, $valor);

        echo json_encode($respuesta);
    }
    /*=============================================
	VER PARCIALES
	=============================================*/

    public $idPar;

    public function ajaxVerParciales()
    {

        $item = "id";
        $valor = $this->idPar;

        $respuesta = ControladorBanco7338::ctrMostrarParciales($item, $valor);

        echo json_encode($respuesta);
    }
}


/*=============================================
EDITAR BANCO
=============================================*/
if (isset($_POST["idBanco"])) {

    $editar = new AjaxBanco7338();
    $editar->idBanco = $_POST["idBanco"];
    $editar->ajaxEditarBanco();
}
/*=============================================
VER PARCIALES
=============================================*/
if (isset($_POST["idPar"])) {
    $verParciales = new AjaxBanco7338();
    $verParciales->idPar = $_POST["idPar"];
    $verParciales->ajaxVerParciales();
}
