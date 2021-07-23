<?php
session_start();
require_once "../controladores/banco7338.controlador.php";
require_once "../modelos/banco7338.modelo.php";

class AjaxBanco7338
{

    /*=============================================
    EDITAR BANCO
    =============================================*/

    public $idBancoEditar;

    public function ajaxEditarBanco()
    {

        $item = "id";
        $valor = $this->idBancoEditar;

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

    /*=============================================
        EDITAR MOVIMIENTO
    =============================================*/
    public $idBanco;
    public $departamento;
    public $grupo;
    public $subgrupo;
    public $mes;
    public $fecha;
    public $descripcion;
    public $cargo;
    public $abono;
    public $saldo;
    public $serie;
    public $folio;
    public $parciales;
    public $parcial;
    public $departamentoParcial1;
    public $parcial2;
    public $departamentoParcial2;
    public $parcial3;
    public $departamentoParcial3;
    public $parcial4;
    public $departamentoParcial4;
    public $parcial5;
    public $departamentoParcial5;
    public $parcial6;
    public $departamentoParcial6;
    public $parcial7;
    public $departamentoParcial7;
    public $parcial8;
    public $departamentoParcial8;
    public $parcial9;
    public $departamentoParcial9;
    public $parcial10;
    public $departamentoParcial10;
    public $parcial11;
    public $departamentoParcial11;
    public $parcial12;
    public $departamentoParcial12;
    public $acreedor;
    public $concepto;
    public $numeroDocumento;
    public $tieneIva;
    public $tieneRetenciones;
    public $tipoRetencion;
    public $importeRetenciones;
    public function ajaxEditarMovimientoBanco7338()
    {
        $tabla = "banco7338";

        $datos = array(
            "id" => $this->idBanco,
            "departamento" => $this->departamento,
            "grupo" => $this->grupo,
            "subgrupo" => $this->subgrupo,
            "mes" => $this->mes,
            "fecha" => $this->fecha,
            "descripcion" => $this->descripcion,
            "cargo" => $this->cargo,
            "abono" => $this->abono,
            "saldo" => $this->saldo,
            "serie" => $this->serie,
            "folio" => $this->folio,
            "parciales" => $this->parciales,
            "parcial" => $this->parcial,
            "departamentoParcial1" => $this->departamentoParcial1,
            "parcial2" => $this->parcial2,
            "departamentoParcial2" => $this->departamentoParcial2,
            "parcial3" => $this->parcial3,
            "departamentoParcial3" => $this->departamentoParcial3,
            "parcial4" => $this->parcial4,
            "departamentoParcial4" => $this->departamentoParcial4,
            "parcial5" => $this->parcial5,
            "departamentoParcial5" => $this->departamentoParcial5,
            "parcial6" => $this->parcial6,
            "departamentoParcial6" => $this->departamentoParcial6,
            "parcial7" => $this->parcial7,
            "departamentoParcial7" => $this->departamentoParcial7,
            "parcial8" => $this->parcial8,
            "departamentoParcial8" => $this->departamentoParcial8,
            "parcial9" => $this->parcial9,
            "departamentoParcial9" => $this->departamentoParcial9,
            "parcial10" => $this->parcial10,
            "departamentoParcial10" => $this->departamentoParcial10,
            "parcial11" => $this->parcial11,
            "departamentoParcial11" => $this->departamentoParcial11,
            "parcial12" => $this->parcial12,
            "departamentoParcial12" => $this->departamentoParcial12,
            "acreedor" => $this->acreedor,
            "concepto" => $this->concepto,
            "numeroDocumento" => $this->numeroDocumento,
            "tieneIva" => $this->tieneIva,
            "tieneRetenciones" => $this->tieneRetenciones,
            "tipoRetencion" => $this->tipoRetencion,
            "importeRetenciones" => $this->importeRetenciones
        );

        $respuesta = ControladorBanco7338::ctrEditarDatos7338($tabla, $datos);


        $datosBitacora = array(
            "usuario" => $_SESSION['nombre'],
            "perfil" => $_SESSION['perfil'],
            "accion" => 'Edición Banco 7338',
            "folio" => $this->idBanco
        );

        $respuesta = ModeloBanco7338::mdlRegistroBitacora("bitacora", $datosBitacora);

        $idBanco = $this->idBanco;
        $respuesta = ControladorBanco7338::ctrActualizarValoresMovimiento($idBanco);


        echo json_encode($respuesta);
    }
}


/*=============================================
EDITAR BANCO
=============================================*/
if (isset($_POST["idBancoEditar"])) {

    $editar = new AjaxBanco7338();
    $editar->idBancoEditar = $_POST["idBancoEditar"];
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
if (isset($_POST["editarIdBanco"])) {

    $editar = new AjaxBanco7338();
    $editar->idBanco = $_POST["idBanco"];
    $editar->departamento = $_POST["editarDepartamento"];
    $editar->grupo = $_POST["editarGrupo"];
    $editar->subgrupo = $_POST["editarSubgrupo"];
    $editar->mes = $_POST["editarMes"];
    $editar->fecha = $_POST["editarFecha"];
    $editar->descripcion = $_POST["editarDescripcion"];
    $editar->cargo = $_POST["editarCargo"];
    $editar->abono = $_POST["editarAbono"];
    $editar->saldo = $_POST["editarSaldo"];
    $editar->serie = $_POST["editarSerie"];
    $editar->folio = $_POST["editarFolio"];
    $editar->parciales = $_POST["editarParciales"];
    $editar->parcial = $_POST["editarParcial"];
    $editar->departamentoParcial1 = $_POST["editarDepartamentoParcial1"];
    $editar->parcial2 = $_POST["editarParcial2"];
    $editar->departamentoParcial2 = $_POST["editarDepartamentoParcial2"];
    $editar->parcial3 = $_POST["editarParcial3"];
    $editar->departamentoParcial3 = $_POST["editarDepartamentoParcial3"];
    $editar->parcial4 = $_POST["editarParcial4"];
    $editar->departamentoParcial4 = $_POST["editarDepartamentoParcial4"];
    $editar->parcial5 = $_POST["editarParcial5"];
    $editar->departamentoParcial5 = $_POST["editarDepartamentoParcial5"];
    $editar->parcial6 = $_POST["editarParcial6"];
    $editar->departamentoParcial6 = $_POST["editarDepartamentoParcial6"];
    $editar->parcial7 = $_POST["editarParcial7"];
    $editar->departamentoParcial7 = $_POST["editarDepartamentoParcial7"];
    $editar->parcial8 = $_POST["editarParcial8"];
    $editar->departamentoParcial8 = $_POST["editarDepartamentoParcial8"];
    $editar->parcial9 = $_POST["editarParcial9"];
    $editar->departamentoParcial9 = $_POST["editarDepartamentoParcial9"];
    $editar->parcial10 = $_POST["editarParcial10"];
    $editar->departamentoParcial10 = $_POST["editarDepartamentoParcial10"];
    $editar->parcial11 = $_POST["editarParcial11"];
    $editar->departamentoParcial11 = $_POST["editarDepartamentoParcial11"];
    $editar->parcial12 = $_POST["editarParcial12"];
    $editar->departamentoParcial12 = $_POST["editarDepartamentoParcial12"];
    $editar->acreedor = $_POST["editarAcreedor"];
    $editar->concepto = $_POST["editarConcepto"];
    $editar->numeroDocumento = $_POST["editarNumeroDocumento"];
    $editar->tieneIva = $_POST["editarTieneIva"];
    $editar->tieneRetenciones = $_POST["editarTieneRetenciones"];
    $editar->tipoRetencion = $_POST["editarTipoRetencion"];
    $editar->importeRetenciones = $_POST["editarImporteRetenciones"];
    $editar->ajaxEditarMovimientoBanco7338();
}
