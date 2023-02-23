<?php

require_once "../../controladores/reporteador.controlador.php";
require_once "../../modelos/conexion.php";

require_once "../../clases/data.php";
require_once "../../clases/PHPExcel.php";
class loadReports
{

    public $empresa;
    public $marca;
    public $canal;
    public $fechaInicio;
    public $fechaFinal;
    public $campoOrden;
    public $orden;
    public $vista;
    public $clasificacion;
    public $clientes;
    public $producto;
    public $per_page;
    public $page;
    public $estatus;
    public $periodo;
    public function reporteBackorder()
    {
        $empresa = $this->empresa;
        $marca = $this->marca;
        $canal = $this->canal;
        $fechaInicio = $this->fechaInicio;
        $fechaFinal  = $this->fechaFinal;
        $campoOrden = $this->campoOrden;
        $per_page = $this->per_page;
        $page = $this->page;
        $orden = $this->orden;
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $clasificacion = $this->clasificacion;
        $periodo = $this->periodo;
        $estatus = $this->estatus;
        $clientes = $this->clientes;
        $search = array("estatus" => $estatus, "empresa" => $empresa, "marca" => $marca, "canal" => $canal, "fechaInicio" => $fechaInicio, "fechaFinal" => $fechaFinal, "cliente" => $clientes, "clasificacion" => $clasificacion, "periodo" => $periodo, "campoOrden" => $campoOrden, "orden" => $orden, "per_page" => $per_page, "offset" => $offset);
        $obtenerReporte = new ControladorReporteador();
        $obtenerReporte->ctrDescargarReporteBackorder($search);
    }
     public function reporteListadoProductos()
    {
        
        $marca = $this->marca;
        $campoOrden = $this->campoOrden;
        $per_page = $this->per_page;
        $page = $this->page;
        $orden = $this->orden;
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $clasificacion = $this->clasificacion;
        $periodo = $this->periodo;
        $producto = $this->producto;
        $search = array("marca" => $marca, "producto" => $producto, "clasificacion" => $clasificacion, "periodo" => $periodo, "campoOrden" => $campoOrden, "orden" => $orden, "per_page" => $per_page, "offset" => $offset);
        $obtenerReporte = new ControladorReporteador();
        $obtenerReporte->ctrDescargarReporteListadoProductos($search);
    }
}

if (isset($_GET["reporteadorNew"])) {
    $reporte = new loadReports();
    $reporte->empresa = $_GET["empresa"];
    $reporte->marca = $_GET["marca"];
    $reporte->canal = $_GET["canal"];
    $reporte->fechaInicio = $_GET["fechaInicio"];
    $reporte->fechaFinal = $_GET["fechaFinal"];
    $reporte->campoOrden = $_GET["campoOrden"];
    $reporte->per_page = $_GET["per_page"];
    $reporte->page = $_GET["page"];
    $reporte->orden = $_GET["orden"];
    $reporte->page = $_GET["page"];
    $reporte->clasificacion = $_GET["clasificacion"];
    $reporte->periodo = $_GET["periodo"];
    $reporte->estatus = $_GET["estatus"];
    $reporte->clientes = $_GET["clientes"];
    $reporte->reporteBackorder();
}
if (isset($_GET["reporteadorListadoProductos"])) {
    $reporteListado = new loadReports();
    $reporteListado->marca = $_GET["marca"];
    $reporteListado->campoOrden = $_GET["campoOrden"];
    $reporteListado->per_page = $_GET["per_page"];
    $reporteListado->page = $_GET["page"];
    $reporteListado->orden = $_GET["orden"];
    $reporteListado->page = $_GET["page"];
    $reporteListado->clasificacion = $_GET["clasificacion"];
    $reporteListado->periodo = $_GET["periodo"];
    $reporteListado->producto = $_GET["producto"];
    $reporteListado->reporteListadoProductos();
}
