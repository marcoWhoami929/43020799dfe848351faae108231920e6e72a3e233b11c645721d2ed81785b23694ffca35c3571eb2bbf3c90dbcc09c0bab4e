<?php
session_start();
if (isset($_SESSION["nombre"])) {

/*****************BANCOS **********/
require_once "controladores/banco0198.controlador.php";
require_once "modelos/banco0198.modelo.php";
require_once "controladores/banco3450.controlador.php";
require_once "modelos/banco3450.modelo.php";
require_once "controladores/banco6278.controlador.php";
require_once "modelos/banco6278.modelo.php";
require_once "controladores/caja.controlador.php";
require_once "modelos/caja.modelo.php";
require_once "controladores/banco1286.controlador.php";
require_once "modelos/banco1286.modelo.php";
require_once "controladores/banco1219.controlador.php";
require_once "modelos/banco1219.modelo.php";
require_once "controladores/banco0840.controlador.php";
require_once "modelos/banco0840.modelo.php";
require_once "controladores/banco1340.controlador.php";
require_once "modelos/banco1340.modelo.php";
/*****************BANCOS **********/
/*****************ATENCION A CLIENTES **********/
require_once "controladores/atencion.controlador.php";
require_once "modelos/atencion.modelo.php";
/*****************ATENCION A CLIENTES **********/
/*****************ALMACÉN **********/
require_once "controladores/almacen.controlador.php";
require_once "modelos/almacen.modelo.php";
/*****************ALMACÉN **********/
/*****************LABORATORIO DE COLOR**********/
require_once "controladores/laboratorio.controlador.php";
require_once "modelos/laboratorio.modelo.php";
/*****************LABORATORIO DE COLOR**********/
/*****************FACTURACIÓN**********/
require_once "controladores/facturacion.controlador.php";
require_once "modelos/facturacion.modelo.php";
/*****************FACTURACIÓN**********/
/*****************COMPRAS**********/
require_once "controladores/compras.controlador.php";
require_once "modelos/compras.modelo.php";
/*****************COMPRAS**********/
/*****************LOGISTICA**********/  
require_once "controladores/logistica.controlador.php";
require_once "modelos/logistica.modelo.php";
/*****************LOGISTICA**********/
/*****************LISTA DE CLIENTES**********/
require_once "controladores/clientes.controlador.php";
require_once "modelos/clientes.modelo.php";
/*****************LISTA DE CLIENTES**********/
/*****************LISTA DE PROVEEDORES**********/
require_once "controladores/proveedores.controlador.php";
require_once "modelos/proveedores.modelo.php";
/*****************LISTA DE CLIENTES**********/
/*****************ADMINISTRACION DE USUARIOS**********/
require_once "controladores/administradores.controlador.php";
require_once "modelos/administradores.modelo.php";
/*****************ADMINISTRACION DE USUARIOS**********/
/*****************ADMINISTRACION DE USUARIOS**********/
require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";
/*****************ADMINISTRACION DE USUARIOS**********/
/*****************ULTIMOS SALDOS BANCOS**********/
require_once "controladores/ultimoSaldoBancos.controlador.php";
require_once "modelos/ultimoSaldoBancos.modelo.php";
/*****************ULTIMOS SALDOS BANCOS**********/
/*****************ORDENES DE TRABAJO **********/
require_once "controladores/ordenTrabajo.controlador.php";
require_once "modelos/ordenTrabajo.modelo.php";
/*****************ORDENES DE TRABAJO**********/
/*****************ALMCEN RUTA**********/
require_once "controladores/almacenRuta.controlador.php";
require_once "modelos/almacenRuta.modelo.php";
/*****************ALMACEN RUTA**********/
/*****************FACTURACION DE RUTA**********/
require_once "controladores/facturacionRuta.controlador.php";
require_once "modelos/facturacionRuta.modelo.php";
/*****************FACTURACION RUTA**********/
/*****************CORTE DE CAJA ************/
require_once "controladores/facturacionTiendas.controlador.php";
require_once "modelos/facturacionTiendas.modelo.php";
/*****************CORTE DE CAJA ************/

//Comprobamos que el valor no venga vacío
if(isset($_GET['funcion']) && !empty($_GET['funcion'])) {
    $funcion = $_GET['funcion'];

    //En función del parámetro que nos llegue ejecutamos una función u otra
    switch($funcion) {
        case 'funcion1': 
            $registroBitacora =  new ControladorBanco0198();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion2': 
            $registroBitacora = new ControladorBanco0198();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion3':
            $registroBitacora =  new ControladorBanco3450();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion4':
            $registroBitacora = new ControladorBanco3450();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion5':
            $registroBitacora = new ControladorBanco6278();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion6':
            $registroBitacora = new ControladorBanco6278();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion7':
            $registroBitacora = new ControladorCaja();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion8':
            $registroBitacora = new ControladorAtencion();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion9':
            $registroBitacora = new ControladorAlmacen();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion10':
            $registroBitacora = new ControladorLaboratorio();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion11':
            $registroBitacora = new ControladorFacturacion();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion12':
            $registroBitacora = new ControladorCompras();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion13':
            $registroBitacora = new ControladorLogistica();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion14':
            $registroBitacora = new ControladorClientes();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion15':
            $registroBitacora = new ControladorClientes();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion16':
            $registroBitacora = new ControladorAdministradores();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion17':
            $registroBitacora =  new ControladorUsuarios();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion18':
            $registroBitacora = new ControladorProveedores();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion19':
            $registroBitacora = new ControladorProveedores();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion20':
            $registroBitacora = new ControladorAtencion();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion21':
            $registroBitacora = new ControladorAtencion();
            $registroBitacora -> ctrRegistroBitacoraReporteEstatus();
            break;
        case 'funcion22':
            $registroBitacora = new ControladorFacturacion();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion23': 
            $registroBitacora =  new ControladorBanco1286();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion24': 
            $registroBitacora = new ControladorBanco1286();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion25':
            $registroBitacora =  new ControladorBanco1219();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion26':
            $registroBitacora = new ControladorBanco1219();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion27':
            $registroBitacora = new ControladorBanco0840();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion28':
            $registroBitacora = new ControladorBanco0840();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion29':
            $registroBitacora = new ControladorBanco1340();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion30':
            $registroBitacora = new ControladorBanco1340();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion31':
            $registroBitacora = new ControladorOrdenes();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion32':
            $registroBitacora = new ControladorAlmacenRuta();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion33':
            $registroBitacora = new ControladorFacturacionRuta();
            $registroBitacora -> ctrRegistroBitacoraReporte();
            break;
        case 'funcion34':
            $registroBitacora = new ControladorFacturacionRuta();
            $registroBitacora -> ctrRegistroBitacoraAgregar();
            break;
        case 'funcion35':
            $registroBitacora = new ControladorOrdenes();
            $registroBitacora -> ctrRegistroBitacoraReporteEstatus();
            break;
        case 'funcion36':
            $registroBitacora = new ControladorFacturasTiendas();
            $registroBitacora -> ctrRegistroBitacoraAgregarFacturas();
            break;
    }
}
    
}

?>