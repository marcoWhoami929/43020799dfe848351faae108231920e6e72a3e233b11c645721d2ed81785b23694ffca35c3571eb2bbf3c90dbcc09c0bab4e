<?php
error_reporting(0);
require_once "../controladores/atencion.controlador.php";
require_once "../modelos/atencion.modelo.php";

class TablaEstatusPedidos{

 	/*=============================================
  	MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

	public function mostrarTablas(){	

		function seg_a_dhms($seg) {
                $dias = floor($seg / 86400);
                $horas = floor(($seg - ($dias * 86400)) / 3600);
                $minutos = floor(($seg - ($dias * 86400) - ($horas * 3600)) / 60);
                $segundos = $seg % 60;
                return "$dias dias, $horas horas, $minutos minutos, $segundos segundos";
                }


            $item = null;
            $valor = null;

            $atencionClientes = ControladorAtencion::ctrMostrarAtencionEstatus($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($atencionClientes); $i++){

			/*=============================================
  			REVISAR ESTADO
  			=============================================*/


	  		               if ($atencionClientes[$i]["estado"] == 0 && $atencionClientes[$i]["statusCompras"] == 5 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusPedido =  "<td style='height:120px;'><h4><span class='label label-danger'>PEDIDO CANCELADO POR CLIENTE</span></h4></td>";
                      
                        }else{

                          if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 0 && $atencionClientes[$i]["statusAlmacen"] == 0 && $atencionClientes[$i]["estadoCompras"] == 0 && $atencionClientes[$i]["statusCompras"] == 0 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='active'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class=''>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class=''>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                      
                        }else  if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 0 && $atencionClientes[$i]["statusAlmacen"] == 0 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='active'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class=''>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class=''>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                      
                        }
                         if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoCompras"] == 0 && $atencionClientes[$i]["statusCompras"] == 0 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='active'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class=''>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                      
                        }
                        /*
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] < 3 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] <= 4 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0  && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0){
                          $estatusPedido =  '<td style='height:120px;'>
                                    <div class='checkout-wrap'>
                                        <ul class='checkout-bar'>

                                          <li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li>
                                          
                                          <li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li>
                                          
                                           <li class=''>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li>

                                           <li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li>

                                          <li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';
                        }
                        */
                        if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4  && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0  && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='previous visited'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='active'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                      
                        }

                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] == 6  && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 1  && $atencionClientes[$i]["statusLogistica"] == 2) {
                               $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='previous visited'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='paused'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                      
                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] == 4  && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 1  && $atencionClientes[$i]["statusLogistica"] == 2) {
                               $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='previous visited'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='active'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='paused'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                      
                        }
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 0 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] == 1 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0  && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='paused'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                      
                        }
                        
                        if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1  && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='previous visited'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='previous visited'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='active'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                      
                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] <= 3  && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] <= 4 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] < 1 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0){
                          $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='previous visited'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='previous visited'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='paused'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                        }
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3  && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] < 1 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0){
                          $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='previous visited'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='previous visited'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='paused'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                        }
                        
                        if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoLogistica"] == 1 && $atencionClientes[$i]["statusLogistica"] == 2) {
                               $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='previous visited'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='previous visited'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='previous visited'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class='actives'>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";
                      
                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoLogistica"] == 1 && $atencionClientes[$i]["statusLogistica"] < 2){

                           $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='previous visited'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='previous visited'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='previous visited'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class='paused'>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";

                        }
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] < 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4){

                           $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='active'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='previous visited'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";

                        }else  if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] < 3 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4){

                           $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='active'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class=''>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";

                        }else  if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] < 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] < 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4){

                           $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='active'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='paused'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";

                        }
                        /*
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 ){

                           $estatusPedido =  '<td style='height:120px;'>
                                    <div class='checkout-wrap'>
                                        <ul class='checkout-bar'>

                                          <li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li>
                                          
                                          <li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li>

                                          <li class='active'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li>

                                          <li class='paused'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li>

                                          <li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li>
                                             
                                        </ul>
                                      </div>
                                       
                                </td>';

                        } 
                        */
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 0 && $atencionClientes[$i]["statusAlmacen"] == 0 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 ){

                           $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='active'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='previous visited'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class=''>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";

                        }
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] < 4 && $atencionClientes[$i]["estadoLogistica"] == 1  && $atencionClientes[$i]["statusLogistica"] == 2 ){

                           $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='previous visited'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='paused'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='previous visited'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class='actives'>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";

                        }
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] < 4){

                           $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='previous visited'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='paused'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='previous visited'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class='actives'>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";

                        }
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 0 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] < 4){

                           $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='paused'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='paused'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='previous visited'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class='actives'>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";

                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] > 4 && $atencionClientes[$i]["estadoLogistica"] == 1  && $atencionClientes[$i]["statusLogistica"] == 2){

                           $estatusPedido =  "<td style='height:120px;'><div class='checkout-wrap'><ul class='checkout-bar'><li class='visited first'>Atención<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoProceso']."</span></li><li class='visited first'>Almacén<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoAlmacen']."</span></li><li class='visited first'>Compras<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoCompras']."</span></li><li class='previous visited'>Facturación<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoFacturacion']."</span></li><li class='actives'>Logística<br><span style='font-weight: lighter;color: black;font-size: 10px'>".$atencionClientes[$i]['tiempoLogistica']."</span></li></ul></div></td>";

                        }

                        }
                        
                        

                        /* ESTATUS DEL PEDIDO   */

                      if ($atencionClientes[$i]["formatoPedido"] == 1) {

                           $estatusFinal = "<br><br><br><br><span class='label label-danger'>ENTREGA CON PEDIDO</span></td>";
                          
                      }else if ($atencionClientes[$i]["estado"] == 0 && $atencionClientes[$i]["estadoAlmacen"] == 0 && $atencionClientes[$i]["statusAlmacen"] == 0 && $atencionClientes[$i]["estadoCompras"] == 0 && $atencionClientes[$i]["statusCompras"] == 5 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {

                               $estatusFinal = "<br><br><br><br><span class='label label-danger'>Cancelado</span></td>";
                      
                        }
                       
                       if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 0 && $atencionClientes[$i]["statusAlmacen"] == 0 &&  $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoCompras"] == 0 && $atencionClientes[$i]["statusCompras"] == 0 &&  $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusFinal = "<br><br><br><br><span class='label label-warning'>Pendiente</span></td>";
                      
                        }
                        if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoCompras"] == 0 && $atencionClientes[$i]["statusCompras"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusFinal = "<br><br><br><br><span class='label label-danger'>Pendiente</span></td>";
                      
                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 0 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] == 1 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0  && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusFinal = "<br><br><br><br><span class='label label-danger'>Pendiente</span></td>";
                      
                        }
                        else   if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] < 3 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoCompras"] == 0 && $atencionClientes[$i]["statusCompras"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0){

                            $estatusFinal = "<br><br><br><br><span class='label label-warning'>Por concluir</span></td>";


                        }
                        if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 0 && $atencionClientes[$i]["statusCompras"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusFinal = "<br><br><br><br><span class='label label-info'>En proceso</span></td>";
                      
                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3  && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] < 1 && $atencionClientes[$i]["estadoCompras"] == 0 && $atencionClientes[$i]["statusCompras"] == 0  && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {

                            $estatusFinal = "<br><br><br><br><span class='label label-warning'>Por concluir</span></td>";

                        }
                        if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 &&  $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0) {
                               $estatusFinal = "<br><br><br><br><span class='label label-info'>En proceso</span></td>";
                      
                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] <= 3 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] < 4 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0  && $atencionClientes[$i]["statusLogistica"] == 0) {
                                
                                 $estatusFinal = "<br><br><br><br><span class='label label-warning'>Pendiente</span></td>";

                        }
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] <= 3 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoLogistica"] == 0  && $atencionClientes[$i]["statusLogistica"] == 0) {
                                
                                 $estatusFinal = "<br><br><br><br><span class='label label-warning'>Pendiente</span></td>";

                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] <= 3 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] > 4 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoLogistica"] == 0  && $atencionClientes[$i]["statusLogistica"] == 0) {

                          $estatusFinal = "<br><br><br><br><span class='label label-warning'>Pendiente</span></td>";
                          
                        }
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3&& $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] < 4  &&  $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0){
                            $estatusFinal = "<br><br><br><br><span class='label label-warning'>Por concluir</span></td>";
                        }

                        if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 && $atencionClientes[$i]["estadoLogistica"] == 1 && $atencionClientes[$i]["statusLogistica"] == 2) {
                               $estatusFinal = "<br><br><br><br><span class='label label-success'>Concluido</span><br><span>Tiempo Proceso</span> <span>".$datos = seg_a_dhms($atencionClientes[$i]['tiempoFinal'])."</span><br><button class='btn btn-success btnCrearTicket' serie='".$atencionClientes[$i]["serie"]."' folio='".$atencionClientes[$i]["folio"]."' serieFactura = '".$atencionClientes[$i]["serieFactura"]."' folioFactura='".$atencionClientes[$i]["folioFactura"]."'><i class='fa fa-ticket'></i></button></td>";
                      
                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] < 4 && $atencionClientes[$i]["estadoLogistica"] == 1 && $atencionClientes[$i]["statusLogistica"] == 2) {
                               $estatusFinal = "<br><br><br><br><span class='label label-success'>Concluido</span><br><span>Tiempo Proceso</span> <span>".$datos = seg_a_dhms($atencionClientes[$i]['tiempoFinal'])."</span><br><button class='btn btn-success btnCrearTicket' serie='".$atencionClientes[$i]["serie"]."' folio='".$atencionClientes[$i]["folio"]."' serieFactura = '".$atencionClientes[$i]["serieFactura"]."' folioFactura='".$atencionClientes[$i]["folioFactura"]."'><i class='fa fa-ticket'></i></button></td>";
                      
                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 && $atencionClientes[$i]["estadoLogistica"] == 1 && $atencionClientes[$i]["statusLogistica"] < 2){

                            $estatusFinal = "<br><br><br><br><span class='label label-warning'>Por concluir</span></td>";

                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] < 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4) {
                            
                          


                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] < 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] < 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4) {
                          
                          $estatusFinal = "<br><br><br><br><span class='label label-warning'>Por concluir</span></td>";

                        }
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] < 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4) {
                          
                            $estatusFinal = "<br><br><br><br><span class='label label-warning'>Por concluir</span></td>";

                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4){

                              

                        } else  if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 0 && $atencionClientes[$i]["statusAlmacen"] == 0 && $atencionClientes[$i]["estadoFacturacion"] == 0 && $atencionClientes[$i]["statusFacturacion"] == 0 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 && $atencionClientes[$i]["estadoLogistica"] == 0 && $atencionClientes[$i]["statusLogistica"] == 0){

                               $estatusFinal = "<br><br><br><br><span class='label label-warning'>Pendiente</span></td>";
                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 0 && $atencionClientes[$i]["statusAlmacen"] == 0 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 ){

                              $estatusFinal = "<br><br><br><br><span class='label label-warning'>Pendiente</span></td>";
                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] >= 4 ){

                      

                        }else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 3 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] < 4 && $atencionClientes[$i]["estadoLogistica"] == 1  && $atencionClientes[$i]["statusLogistica"] == 2 ) {
                          
                          $estatusFinal = "<br><br><br><br><span class='label label-warning'>Pendiente</span></td>";
                        }
                        else if ($atencionClientes[$i]["estado"] == 1 && $atencionClientes[$i]["estadoAlmacen"] == 1 && $atencionClientes[$i]["statusAlmacen"] == 0 && $atencionClientes[$i]["estadoFacturacion"] == 1 && $atencionClientes[$i]["statusFacturacion"] == 1 && $atencionClientes[$i]["estadoCompras"] == 1 && $atencionClientes[$i]["statusCompras"] < 4) {
                          
                          $estatusFinal = "<br><br><br><br><span class='label label-warning'>Pendiente</span></td>";
                        }

                        
                      
                           

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$atencionClientes[$i]["fechaPedido"].'",
				      "'.$atencionClientes[$i]["serie"].'",
				      "'.$atencionClientes[$i]["folio"].'",
				      "'.$atencionClientes[$i]["serieFactura"].'",
				      "'.$atencionClientes[$i]["folioFactura"].'",
				      "'.trim($atencionClientes[$i]["nombreCliente"]).'",
				      "'.$estatusPedido.'",
				      "'.$estatusFinal.'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE ESTATUS DE PEDIDOS
=============================================*/ 
$activar = new TablaEstatusPedidos();
$activar -> mostrarTablas();



