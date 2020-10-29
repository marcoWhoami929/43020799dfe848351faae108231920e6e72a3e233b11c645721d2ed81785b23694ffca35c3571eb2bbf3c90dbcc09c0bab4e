<?php


require_once "../../controladores/reportes.controlador.php";
require_once "../../modelos/reportes.modelo.php";
require_once "../../controladores/atencion.controlador.php";
require_once "../../modelos/atencion.modelo.php";
require_once "../../controladores/almacen.controlador.php";
require_once "../../modelos/almacen.modelo.php";
require_once "../../controladores/laboratorio.controlador.php";
require_once "../../modelos/laboratorio.modelo.php";
require_once "../../controladores/compras.controlador.php";
require_once "../../modelos/compras.modelo.php";
require_once "../../controladores/facturacion.controlador.php";
require_once "../../modelos/facturacion.modelo.php";
require_once "../../controladores/logistica.controlador.php";
require_once "../../modelos/logistica.modelo.php";
require_once "../../controladores/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";
require_once "../../controladores/administradores.controlador.php";
require_once "../../modelos/administradores.modelo.php";
require_once "../../controladores/banco0198.controlador.php";
require_once "../../modelos/banco0198.modelo.php";
require_once "../../controladores/banco3450.controlador.php";
require_once "../../modelos/banco3450.modelo.php";
require_once "../../controladores/banco6278.controlador.php";
require_once "../../modelos/banco6278.modelo.php";
require_once "../../controladores/caja.controlador.php";
require_once "../../modelos/caja.modelo.php";
require_once "../../controladores/banco1286.controlador.php";
require_once "../../modelos/banco1286.modelo.php";
require_once "../../controladores/banco1219.controlador.php";
require_once "../../modelos/banco1219.modelo.php";
require_once "../../controladores/banco0840.controlador.php";
require_once "../../modelos/banco0840.modelo.php";
require_once "../../controladores/banco1340.controlador.php";
require_once "../../modelos/banco1340.modelo.php";
require_once "../../controladores/bitacora.controlador.php";
require_once "../../modelos/bitacora.modelo.php";
require_once "../../controladores/cotizaciones.controlador.php";
require_once "../../modelos/cotizaciones.modelo.php";
require_once "../../controladores/controlMuestras.controlador.php";
require_once "../../modelos/controlMuestras.modelo.php";
/**************CONTROLADORES Y MODELOS RUTAS*********************/
require_once "../../controladores/ordenTrabajo.controlador.php";
require_once "../../modelos/ordenTrabajo.modelo.php";
require_once "../../controladores/almacenRuta.controlador.php";
require_once "../../modelos/almacenRuta.modelo.php";
require_once "../../controladores/facturacionRuta.controlador.php";
require_once "../../modelos/facturacionRuta.modelo.php";
/**************CONTROLADORES Y MODELOS RUTAS*********************/
require_once "../../controladores/facturacionTiendas.controlador.php";
require_once "../../modelos/facturacionTiendas.modelo.php";
/**************CONTROLADORES Y MODELOS RUTAS*********************/
require_once "../../controladores/reporte.controlador.php";
/*=============================================
= CONTROLADORESY MODELOS REPORTES NUEVOS         =
=============================================*/
require_once "../../controladores/reporteador.controlador.php";
require_once "../../modelos/reporteador.modelo.php";



$reporte = new ControladorReportes();
$reporte -> ctrDescargarReporte();

$reportes = new ControladorReportes();
$reportes -> ctrDescargarReporteEstatusPedido();

$reporteCompras =  new ControladorReportes();
$reporteCompras -> ctrDescargarReporteCompras();

$reporteLaboratorio = new ControladorReportes();
$reporteLaboratorio ->ctrDescargarReporteLaboratorio();

$reporteBancos = new ControladorReportes();
$reporteBancos -> ctrDescargarReporteBancos();

$reporteBancosCredito = new ControladorReportes();
$reporteBancosCredito -> ctrDescargarReporteBancosCredito();

$reportesBancosEdicion = new ControladorReportes();
$reportesBancosEdicion -> ctrDescargarReporteBancosEdicion();

$reporteCotizaciones =  new ControladorReportes();
$reporteCotizaciones -> ctrDescargarReporteCotizaciones(); 

$reporteCotizacionesPlantilla = new ControladorReportes();
$reporteCotizacionesPlantilla -> ctrDescargarReporteCotizacionesPlantilla();

$reporteFacturacion = new ControladorReportes();
$reporteFacturacion -> ctrDescargarReporteFacturacion();

$reporteCotizacionesFiltro =  new ControladorReportes();
$reporteCotizacionesFiltro -> ctrDescargarReporteCotizacionesFiltro();

$reportesRutas = new ControladorReportes();
$reportesRutas -> ctrDescargarReporteRutas();

$reporteEstatusRutas = new ControladorReportes();
$reporteEstatusRutas -> ctrDescargarReporteEstatusRutas();

$reporteCortesCaja = new ControladorReportes();
$reporteCortesCaja -> ctrDescargarReportesCortes();

$reporteFacturasTiendas = new ControladorReportes();
$reporteFacturasTiendas -> ctrDescargarReportesFacturasTiendas();

$reporteFacturasTiendasCanceladas = new ControladorReportes();
$reporteFacturasTiendasCanceladas -> ctrDescargarReportesFacturasTiendasCanceladas();

$reporteVentasTiendas = new ControladorReportes();
$reporteVentasTiendas -> ctrDescargarReportesVentasTiendas();

$reporteCobrosTiendas = new ControladorReportes();
$reporteCobrosTiendas -> ctrDescargarReportesCobrosTiendas();

$reporteGastos = new ControladorReportes();
$reporteGastos -> ctrDescargarReporteGastos();

$reporteDepositosBancarios = new ControladorReportes();
$reporteDepositosBancarios -> ctrDescargarReporteDepositosBancarios();

$reporteAjusteSaldos = new ControladorReportes();
$reporteAjusteSaldos -> ctrDescargarReporteAjustesSaldos();

$reporteAbonosDocumentos = new ControladorReportes();
$reporteAbonosDocumentos -> ctrDescargarReporteAbonosDocumentos();

$reporteGastosReembolsos =  new ControladorReportes();
$reporteGastosReembolsos -> ctrDescargarReporteReembolsos();

$reporteGeneral0198 = new ControladorReportes();
$reporteGeneral0198 -> ctrDescargarReporteBancosGeneral();

$reporteRangoFechas = new ControladorReporteador();
$reporteRangoFechas -> ctrDescargarReporteRangoFechas();

$reporteRangoFechasCredito = new ControladorReporteador();
$reporteRangoFechasCredito -> ctrDescargarReporteRangoFechasCredito();
