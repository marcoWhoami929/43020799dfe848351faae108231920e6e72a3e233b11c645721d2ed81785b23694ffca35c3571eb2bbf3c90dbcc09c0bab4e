<?php
error_reporting(E_ALL);
session_start();
require_once "../controladores/facturacionTiendas.controlador.php";
require_once "../modelos/facturacionTiendas.modelo.php";

class TablaDepositosTiendas{

	public function mostrarTablas(){	

      if ($_GET["numeroMovimientoBanco"] != "") {
          
          $item = 'descripcion';
          $numero = $_GET["numeroMovimientoBanco"];
          $valor = $numero;
      }else{

          $item = null;
          $valor = null;

      }
     
      if ($_SESSION["perfil"] == "Administrador General") {

          $item2 = null; 
          $valor2 = null;

      }else{

          $item2 = 'sucursal';
          $usuario = $_SESSION["id"];
          $valor2 = $usuario;

      }


 		$depositosTiendas = ControladorFacturasTiendas::ctrMostrarDepositosTiendas($item, $valor,$item2,$valor2);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($depositosTiendas); $i++){
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
      if ($depositosTiendas[$i]["saldoPendiente"] ==  $depositosTiendas[$i]["abono"] ) {
          
          $estatus = "<div class='btn-group'><button class='btn btn-info'>Sin Registro</button></div>"; 

      }else if ($depositosTiendas[$i]["saldoPendiente"] < $depositosTiendas[$i]["abono"] and $depositosTiendas[$i]["saldoPendiente"] != 0) {
          
          $estatus = "<div class='btn-group'><button class='btn btn-warning'>Saldo Pendiente</button></div>"; 

      }else if ($depositosTiendas[$i]["saldoPendiente"] == "0") {
          
          $estatus = "<div class='btn-group'><button class='btn btn-success'>Completado</button></div>"; 

      }

      if ($depositosTiendas[$i]["reciboGenerado"] == 0) {

           $pdf = "<button class='btn btn-success btnEmitirReciboCaja' idMovimientoBanco = '".$depositosTiendas[$i]["id"]."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button>";

      }else{
            if ($_SESSION["perfil"] == "Administrador General") {

              $pdf = "<button class='btn btn-success btnEmitirReciboCaja' idMovimientoBanco = '".$depositosTiendas[$i]["id"]."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button>";

            }else{

              $pdf = "<button class='btn btn-success btnEmitirReciboCaja' idMovimientoBanco = '".$depositosTiendas[$i]["id"]."' disabled><i class='fa fa-file-pdf-o' aria-hidden='true'></i></button>";

            }
           

      }
     
      if ($depositosTiendas[$i]["saldoPendiente"] == "0") {

          $identificarDeposito = "<button class='btn btn-info btnVerDesgloseAbonos' idMovimientoBanco = '".$depositosTiendas[$i]["id"]."'  data-toggle='modal' data-target='#modalVerDesglosAbonos'><i class='fa fa-eye' aria-hidden='true'></i></button>&nbsp;&nbsp;".$pdf.""; 


        }else if($depositosTiendas[$i]["saldoPendiente"] < $depositosTiendas[$i]["abono"] and $depositosTiendas[$i]["saldoPendiente"] != 0){

            if ($_SESSION["perfil"] == "Administrador General") {

              $identificarDeposito = "";

            }else{

               $identificarDeposito = "<div class='btn-group'><button class='btn btn-warning btnEditarDeposito' idMovimientoBanco = '".$depositosTiendas[$i]["id"]."' abono = '".$depositosTiendas[$i]["abono"]."'  fechaAbono = '".$depositosTiendas[$i]["fecha"]."' abonadoFacturas = '".$depositosTiendas[$i]["abonadoDeposito"]."' arregloClientes = '".$depositosTiendas[$i]["clientesFacturas"]."' arregloDocumento = '".$depositosTiendas[$i]["conceptoFacturas"]."' arregloFacturas = '".$depositosTiendas[$i]["montoFacturas"]."' arregloValorDocumentos = '".$depositosTiendas[$i]["totalDocumentos"]."' parciales = '".$depositosTiendas[$i]["parciales"]."' span = '".$depositosTiendas[$i]["span"]."' data-toggle='modal' data-target='#modalIdentificarDeposito'><i class='fa fa-edit' aria-hidden='true'></i></button></div>"; 

            }

            

      }else{

          if ($_SESSION["perfil"] == "Administrador General") {
              
              $identificarDeposito = "";

          }else{

             $identificarDeposito = "<div class='btn-group'><button class='btn btn-success btnIdentificarDeposito' idMovimientoBanco = '".$depositosTiendas[$i]["id"]."' abono = '".$depositosTiendas[$i]["abono"]."' fechaAbono = '".$depositosTiendas[$i]["fecha"]."' data-toggle='modal' data-target='#modalIdentificarDeposito'><i class='fa fa-chain-broken' aria-hidden='true'></i></button></div>"; 

          }

         

      }
      

			$datosJson	 .= '[
				           "'.($i+1).'",
                  "'.$depositosTiendas[$i]["fecha"].'",
                  "'.$depositosTiendas[$i]["descripcion"].'",
                  "$ '.number_format($depositosTiendas[$i]["abono"],2).'",
                  "'.$estatus.'",
                  "$ '.number_format($depositosTiendas[$i]["saldoPendiente"],2).'",
                  "'.$identificarDeposito.'"],';

	     	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE facturacion
=============================================*/ 
$activar = new TablaDepositosTiendas();
$activar -> mostrarTablas();



