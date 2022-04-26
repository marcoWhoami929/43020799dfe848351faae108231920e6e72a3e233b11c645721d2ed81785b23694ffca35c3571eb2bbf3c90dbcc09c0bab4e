<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/reporte.controlador.php";
require_once "controladores/reportes.controlador.php";
require_once "controladores/reporteador.controlador.php";


/*CONTROLADORES DE CONTROL MATRIZ*/
require_once "controladores/atencion.controlador.php";
require_once "controladores/almacen.controlador.php";
require_once "controladores/laboratorio.controlador.php";
require_once "controladores/compras.controlador.php";
require_once "controladores/facturacion.controlador.php";
require_once "controladores/logistica.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/banco0198.controlador.php";
require_once "controladores/banco6278.controlador.php";
require_once "controladores/banco3450.controlador.php";
require_once "controladores/caja.controlador.php";
require_once "controladores/banco1286.controlador.php";
require_once "controladores/banco1219.controlador.php";
require_once "controladores/banco0840.controlador.php";
require_once "controladores/banco1340.controlador.php";
require_once "controladores/flujo.controlador.php";
require_once "controladores/banco0198.controladorDiario.php";
require_once "controladores/banco6278.controladorDiario.php";
require_once "controladores/banco3450.controladorDiario.php";
require_once "controladores/caja.controladorDiario.php";
require_once "controladores/banco1286.controladorDiario.php";
require_once "controladores/banco1219.controladorDiario.php";
require_once "controladores/banco0840.controladorDiario.php";
require_once "controladores/banco1340.controladorDiario.php";
require_once "controladores/acumulado.controlador.php";
require_once "controladores/acumuladoMensual.controlador.php";
/*********COTIZACIONES**********************************/
require_once "controladores/cotizaciones.controlador.php";
require_once "controladores/notificaciones.controlador.php";
require_once "controladores/prospectos.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/tickets.controlador.php";
require_once "controladores/ultimoSaldoBancos.controlador.php";
require_once "controladores/ordenTrabajo.controlador.php";
require_once "controladores/almacenRuta.controlador.php";
require_once "controladores/facturacionRuta.controlador.php";
require_once "controladores/facturacionTiendas.controlador.php";
require_once "controladores/entregas.controlador.php";
/*CONTROLADOR NUEVO BANCO*/
require_once "controladores/banco7338.controlador.php";
/*CONTROLADORES DE CONTROL MATRIZ*/


require_once "modelos/plantilla.modelo.php";
require_once "modelos/reportes.modelo.php";
require_once "modelos/reporteador.modelo.php";


require_once "modelos/rutas.php";

/*MODELOS DE CONTROL MATRIZ*/
require_once "modelos/atencion.modelo.php";
require_once "modelos/almacen.modelo.php";
require_once "modelos/laboratorio.modelo.php";
require_once "modelos/compras.modelo.php";
require_once "modelos/facturacion.modelo.php";
require_once "modelos/logistica.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/administradores.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/banco0198.modelo.php";
require_once "modelos/banco6278.modelo.php";
require_once "modelos/banco3450.modelo.php";
require_once "modelos/caja.modelo.php";
require_once "modelos/banco1286.modelo.php";
require_once "modelos/banco1219.modelo.php";
require_once "modelos/banco0840.modelo.php";
require_once "modelos/banco1340.modelo.php";
require_once "modelos/flujo.modelo.php";
require_once "modelos/banco0198.modeloDiario.php";
require_once "modelos/banco6278.modeloDiario.php";
require_once "modelos/banco3450.modeloDiario.php";
require_once "modelos/caja.modeloDiario.php";
require_once "modelos/banco1286.modeloDiario.php";
require_once "modelos/banco1219.modeloDiario.php";
require_once "modelos/banco0840.modeloDiario.php";
require_once "modelos/banco1340.modeloDiario.php";
require_once "modelos/acumulado.modelo.php";
require_once "modelos/acumuladoMensual.modelo.php";
/*********COTIZACIONES**********************************/
require_once "modelos/cotizaciones.modelo.php";
require_once "modelos/notificaciones.modelo.php";
require_once "modelos/prospectos.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/tickets.modelo.php";
require_once "modelos/ultimoSaldoBancos.modelo.php";
require_once "modelos/ordenTrabajo.modelo.php";
require_once "modelos/almacenRuta.modelo.php";
require_once "modelos/facturacionRuta.modelo.php";
require_once "modelos/facturacionTiendas.modelo.php";
require_once "modelos/entregas.modelo.php";
/*MODELOS DE CONTROL MATRIZ*/
require_once "extensiones/PHPMailer/PHPMailerAutoload.php";
require_once "extensiones/vendor/autoload.php";
/*MODELOS NUEVO BANCO*/
require_once "modelos/banco7338.modelo.php";
require_once "clases/data.php";

/**
 * CONEXION SERVER 
 */
//require_once "modelos/conexion-api-server-pinturas.modelo.php";
//require_once "modelos/conexion-api-server-flex.modelo.php";
$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();