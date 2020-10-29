<?php
session_start();

require_once "../controladores/cotizaciones.controlador.php";
require_once "../modelos/cotizaciones.modelo.php";

class TablaCotizaciones{

	public function mostrarTablas(){	
    /*=============================================
    MOSTRAR LA TABLA DE cotizaciones
    =============================================*/ 
    $sesion = $_SESSION["nombre"];
		$item = 'usuarioVendedor';
 		$valor = $sesion;

 		$cotizaciones = ControladorCotizaciones::ctrMostrarCotizaciones($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($cotizaciones); $i++){

        $fecha = $cotizaciones[$i]["fechaCotizacion"];
        $fechaNueva = date("d/m/Y", strtotime($fecha));

         $pdf = "<a class='btnDescargarCotizacion' idCotizacion3='".$cotizaciones[$i]["folio"]."'><i class='fa fa-file-pdf-o fa-2x' aria-hidden='true'></i></a>";

          if ($cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] == 0 && $cotizaciones[$i]["descargada"] == 0 && $cotizaciones[$i]["aprobada"] == 0) {

            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button>";
                     
          }else if($cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] ==0  && $cotizaciones[$i]["descargada"] == 1 && $cotizaciones[$i]["aprobada"] == 0) {

            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-warning btn-xs'>Descargada</button>";

          }else if($cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] ==1  && $cotizaciones[$i]["descargada"] == 0 && $cotizaciones[$i]["aprobada"] == 0) {

            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-info btn-xs'>Enviada</button>";

          }else if($cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] ==0  && $cotizaciones[$i]["descargada"] == 1 && $cotizaciones[$i]["aprobada"] == 0) {

            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-warning btn-xs'>Descargada</button><button class='btn btn-danger btn-xs'>Esperando Aprobación</button>";

         }else if($cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] ==1  && $cotizaciones[$i]["descargada"] == 1 && $cotizaciones[$i]["aprobada"] == 0) {

            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-warning btn-xs'>Descargada</button><button class='btn btn-info btn-xs'>Enviada</button><button class='btn btn-danger btn-xs'>Esperando Aprobación</button>";

         }else if($cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] == 0  && $cotizaciones[$i]["descargada"] == 1 && $cotizaciones[$i]["aprobada"] == 1) {

            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-warning btn-xs'>Descargada</button><button class='btn btn-danger btn-xs'>Aprobada</button>";

          }
         else if($cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] ==1  && $cotizaciones[$i]["descargada"] == 1 && $cotizaciones[$i]["aprobada"] == 1) {

            $statusCotizacion = "<button class='btn btn-success btn-xs'>Activa</button><button class='btn btn-warning btn-xs'>Descargada</button><button class='btn btn-info btn-xs'>Enviada</button><button class='btn btn-danger btn-xs'>Aprobada</button>";

          }
         else if($cotizaciones[$i]["cancelada"] == 1) {

            $statusCotizacion = "<button class='btn btn-danger btn-xs Cancelado' idCotizacion2='".$cotizaciones[$i]["folio"]."' data-toggle='modal' data-target='#modalMotivo' data-toggle='tooltip' data-placement='top' title='Ver motivos de cancelación'>Cancelada</button>";

         }

          if ($cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["descargada"] == 1) {

               if($cotizaciones[$i]["aprobada"] != 0){
                /*
                $cotizacionAprobada =  "<button class='btn btn-success btn-xs btnAprobada' idPerAprobada='".$cotizaciones[$i]["id"]."' estadoAprobada='0'><i class='fa fa-power-off fa-3x' aria-hidden='true'></i></button>";
                */
                 $cotizacionAprobada =  "<label class='switch'><input type='checkbox' disabled checked><span class='slider round' idPerAprobada='".$cotizaciones[$i]["folio"]."' estadoAprobada='0'></span></label>";

                 }else{
                    /*
                    $cotizacionAprobada =  "<button class='btn btn-danger btn-xs btnAprobada' idPerAprobada='".$cotizaciones[$i]["id"]."' estadoAprobada='1'><i class='fa fa-power-off fa-3x' aria-hidden='true'></i></button>";
                    */
                   $cotizacionAprobada =  "<label class='switch'><input type='checkbox'><span class='slider round btnAprobada' idPerAprobada='".$cotizaciones[$i]["folio"]."' estadoAprobada='1'></span></label>";
            } 

            
          }else if ($cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] == 1) {

               if($cotizaciones[$i]["aprobada"] != 0){
                /*
                $cotizacionAprobada =  "<button class='btn btn-success btn-xs btnAprobada' idPerAprobada='".$cotizaciones[$i]["id"]."' estadoAprobada='0'><i class='fa fa-power-off fa-3x' aria-hidden='true'></i></button>";
                */
                 $cotizacionAprobada =  "<label class='switch'><input type='checkbox' disabled checked><span class='slider round' idPerAprobada='".$cotizaciones[$i]["folio"]."' estadoAprobada='0'></span></label>";

                 }else{
                    /*
                    $cotizacionAprobada =  "<button class='btn btn-danger btn-xs btnAprobada' idPerAprobada='".$cotizaciones[$i]["id"]."' estadoAprobada='1'><i class='fa fa-power-off fa-3x' aria-hidden='true'></i></button>";
                    */
                   $cotizacionAprobada =  "<label class='switch'><input type='checkbox'><span class='slider round btnAprobada' idPerAprobada='".$cotizaciones[$i]["folio"]."' estadoAprobada='1'></span></label>";
            } 

            
          }else {

               if($cotizaciones[$i]["aprobada"] != 0){
                /*
                $cotizacionAprobada =  "<button class='btn btn-success btn-xs btnAprobada' idPerAprobada='".$cotizaciones[$i]["id"]."' estadoAprobada='0'><i class='fa fa-power-off fa-3x' aria-hidden='true'></i></button>";
                */
                 $cotizacionAprobada =  "<label class='switch'><input type='checkbox' disabled checked><span class='slider round' idPerAprobada='".$cotizaciones[$i]["folio"]."' estadoAprobada='0'></span></label>";

                 }else{
                    /*
                    $cotizacionAprobada =  "<button class='btn btn-danger btn-xs btnAprobada' idPerAprobada='".$cotizaciones[$i]["id"]."' estadoAprobada='1'><i class='fa fa-power-off fa-3x' aria-hidden='true'></i></button>";
                    */
                   $cotizacionAprobada =  "<label class='switch'><input type='checkbox' disabled><span class='slider round' idPerAprobada='".$cotizaciones[$i]["folio"]."' estadoAprobada='1'></span></label>";
            } 

          }
        
          /*
             function listarArchivos($carpeta, $cotizacion){

            if (is_dir($carpeta)) {
                if ($dir = opendir($carpeta)) {
                  while ($archivo = readdir($dir) !== false) {
                      
                      if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {

                        $comparacion = substr($archivo,0 ,9);
                        if ($cotizacion == $comparacion) {
                            
                            $statusCotizacion = "<button class='btn btn-warning btn-xs'>Enviada</button>";

                        }
                        
                      }
                  }
                  closedir($dir);
                }
            }
          }

          $cotizacion = 'cotizacion-'.$cotizaciones[$i]["folio"];
          listarArchivos('vistas/modulos/cotizacionesEnviadas/', $cotizacion);
          */


         if ($_SESSION["perfil"]=="Administrador General" && $cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] == 0 && $cotizaciones[$i]["descargada"] == 0) {

             $acciones = "<div class='btn-group'><a href='editarCotizacion?idCotizacion=".$cotizaciones[$i]["folio"]."&n=".$cotizaciones[$i]["cantidadProductos"]."'><button class='btn btn-warning btnEditarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' numeroProductos='".$cotizaciones[$i]["cantidad_productos"]."' data-toggle='modal' data-target='#modalEditarCotizacion'><i class='fa fa-pencil'></i>Editar</button></a><br><br><button class='btn btn-danger btnCancelarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' folio='".$cotizaciones[$i]["folio"]."'><i class='fa fa-times'></i>Cancelar</button></div>"; 

         }else if ($_SESSION["perfil"] !="Administrador General" && $cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] == 0 && $cotizaciones[$i]["descargada"] == 0) {

             $acciones = "<div class='btn-group'><a href='editarCotizacion?idCotizacion=".$cotizaciones[$i]["folio"]."&n=".$cotizaciones[$i]["cantidadProductos"]."'><button class='btn btn-warning btnEditarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' numeroProductos='".$cotizaciones[$i]["cantidad_productos"]."' data-toggle='modal' data-target='#modalEditarCotizacion' ><i class='fa fa-pencil'></i>Editar</button></a><br><br><button class='btn btn-danger btnCancelarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' folio='".$cotizaciones[$i]["folio"]."'><i class='fa fa-times'></i>Cancelar</button></div>"; 
         }
         else if($_SESSION["perfil"] !="Administrador General" && $cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] == 1){ 

             $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarCotizacion' disabled><i class='fa fa-pencil'></i>Editar</button><br><br><button class='btn btn-danger btnCancelarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' folio='".$cotizaciones[$i]["folio"]."'><i class='fa fa-times'></i>Cancelar</button></div>"; 

         }else if($_SESSION["perfil"] =="Administrador General" && $cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] == 1){ 

             $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarCotizacion' disabled><i class='fa fa-pencil'></i>Editar</button><br><br><button class='btn btn-danger btnCancelarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' folio='".$cotizaciones[$i]["folio"]."'><i class='fa fa-times'></i>Cancelar</button></div>"; 

         }
         else if($_SESSION["perfil"] !="Administrador General" && $cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["descargada"] == 1){ 

             $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarCotizacion' disabled><i class='fa fa-pencil'></i>Editar</button><br><br><button class='btn btn-danger btnCancelarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' folio='".$cotizaciones[$i]["folio"]."'><i class='fa fa-times'></i>Cancelar</button></div>"; 

         }else if($_SESSION["perfil"] =="Administrador General" && $cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["descargada"] == 1){ 

             $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarCotizacion' disabled><i class='fa fa-pencil'></i>Editar</button><br><br><button class='btn btn-danger btnCancelarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' folio='".$cotizaciones[$i]["folio"]."'><i class='fa fa-times'></i>Cancelar</button></div>"; 

         }
         else if($_SESSION["perfil"] !="Administrador General" && $cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] == 1 && $cotizaciones[$i]["descargada"] == 1){ 

             $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarCotizacion' disabled><i class='fa fa-pencil'></i>Editar</button><br><br><button class='btn btn-danger btnCancelarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' folio='".$cotizaciones[$i]["folio"]."'><i class='fa fa-times'></i>Cancelar</button></div>"; 

         }else if($_SESSION["perfil"] =="Administrador General" && $cotizaciones[$i]["cancelada"] == 0 && $cotizaciones[$i]["enviada"] == 1 && $cotizaciones[$i]["descargada"] == 1){ 

             $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarCotizacion' disabled><i class='fa fa-pencil'></i>Editar</button><br><br><button class='btn btn-danger btnCancelarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' folio='".$cotizaciones[$i]["folio"]."'><i class='fa fa-times'></i>Cancelar</button></div>"; 

         }
         else if ($_SESSION["perfil"]== "Administrador General" && $cotizaciones[$i]["cancelada"] == 1) {
           
           $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarCotizacion' disabled><i class='fa fa-pencil'></i>Editar</button><br><br><button class='btn btn-danger btnCancelarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' folio='".$cotizaciones[$i]["folio"]."' disabled><i class='fa fa-times'></i>Cancelar</button></div>"; 

         }else if ($_SESSION["perfil"] !="Administrador General" && $cotizaciones[$i]["cancelada"]) {
           
            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' data-toggle='modal' data-target='#modalEditarCotizacion' disabled><i class='fa fa-pencil'></i>Editar</button><br><br><button class='btn btn-danger btnCancelarCotizacion' idCotizacion='".$cotizaciones[$i]["folio"]."' folio='".$cotizaciones[$i]["folio"]."' disabled><i class='fa fa-times'></i>Cancelar</button></div>"; 
         }

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			
			$datosJson	 .= '[
              "'.$cotizaciones[$i]["serie"].'",
				      "'.$cotizaciones[$i]["folio"].'",
				      "'.$fechaNueva.'",
				      "'.$cotizaciones[$i]["fechaVencimiento"].'",
              "'.$cotizaciones[$i]["fechaEntrega"].'",
              "'.$cotizaciones[$i]["cantidadProductos"].'",
              "'.$cotizaciones[$i]["cantidad_productos"].'",
              "'.$cotizaciones[$i]["nombreCliente"].'",
              "'.$cotizaciones[$i]["agenteVenta"].'",
				      "$ '.number_format($cotizaciones[$i]["total_cotizacion"],2).'",
              "'.$pdf.'",
              "'.$statusCotizacion.'",
              "'.$cotizacionAprobada.'",
              "'.$cotizaciones[$i]["referencia"].'",
              "'.$cotizaciones[$i]["observaciones"].'",
              "'.$acciones.'"],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE cotizaciones
=============================================*/ 
$activar = new TablaCotizaciones();
$activar -> mostrarTablas();
