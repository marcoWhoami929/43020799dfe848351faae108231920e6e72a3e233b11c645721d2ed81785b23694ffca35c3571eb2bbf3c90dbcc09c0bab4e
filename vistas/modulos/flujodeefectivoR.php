<?php
session_start();
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos"){

    if (isset($_SESSION["user_id"]) == true && $_SESSION['googleVerifyCode'] == true) {
      
      
    }else{

      echo "<script> window.location = 'acceso0198'; </script>";

    }



}else {
  echo '<script>
          window.location = "inicio"
          </script>'; 

}


?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      FLUJO DE EFECTIVO
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">FLUJO DE EFECTIVO</li>
    
    </ol>

  </section>

  <section class="content">

      <div class="box">

      <div class="box-header with-border">
        
         <?php 


         $dia = date("l");
         $mes = date("l"); 
         $dianumero = date("d");
         $año = date("Y");

         setlocale(LC_ALL, "es_MX.UTF-8");
         $fecha = strftime('%B', strtotime($mes));
         $diaLetra = strftime('%A', strtotime($dia));

         echo "<h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3>";

         ?>

         <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
        

      </div>

      <div class="box-body">
        <div class="box-tools">

          

        </div> 
        <br>
       
        <br>

        <br />
        <table id="example" class="table table-bordered table-striped dt-responsive" style="width:100%;">
                    <thead style="background: #f39c12;color: white;">
                        <tr>
                            <th style="border: none;">Entradas de Efectivo</th>
                            <th style="border: none;">Enero</th>
                            <th style="border: none;">Febrero</th>
                            <th style="border: none;">Importes</th>
                        </tr>
                    </thead>

                    <tbody>
                                    <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                        <td>Saldo inicial</td>
                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $saldoInicial0198 = ControladorBanco0198::ctrMostrarSaldo($item,$valor);
                                        $saldoInicial6278 = ControladorBanco6278::ctrMostrarSaldo($item,$valor);
                                        $saldoInicial3450 = ControladorBanco3450::ctrMostrarSaldo($item,$valor);
                                        $saldoInicialCaja = ControladorCaja::ctrMostrarSaldo($item,$valor);

                                        /*======FEBRERO=========*/
                                        $saldoInicial0198F = ControladorBanco0198::ctrMostrarSaldoF($item, $valor);
                                        $saldoInicial6278F = ControladorBanco6278::ctrMostrarSaldoF($item, $valor);
                                        $saldoInicial3450F = ControladorBanco3450::ctrMostrarSaldoF($item, $valor);
                                        $saldoInicialCajaF = ControladorCaja::ctrMostrarSaldoF($item, $valor);
                                        $saldoInicial1286 = ControladorBanco1286::ctrMostrarSaldo($item, $valor);
                                        $saldoInicial1219 = ControladorBanco1219::ctrMostrarSaldo($item, $valor);
                                        $saldoInicial0840 = ControladorBanco0840::ctrMostrarSaldo($item, $valor);
                                        $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item, $valor);

                                        foreach ($saldoInicial0198 as $value) {
                                         
                                              foreach ($saldoInicial6278 as $value2) {

                                                foreach ($saldoInicial3450 as $value3) {

                                                  foreach ($saldoInicialCaja as $value4) {

                                                      foreach ($saldoInicial0198F as $value5) {

                                                          foreach ($saldoInicial6278F as $value6) {

                                                              foreach ($saldoInicial3450F as $value7) {

                                                                  foreach ($saldoInicialCajaF as $value8) {

                                                                      foreach ($saldoInicial1286 as $value9) {

                                                                          foreach ($saldoInicial1219 as $value10) {
                                                                              
                                                                              foreach ($saldoInicial0840 as $value11) {
                                                                                  
                                                                                  foreach ($saldoInicial1340 as $value12) {


                                                                                                $banco0198  = $value["saldo"]-$value["abono"];
                                                                                                $banco6278  = $value2["saldo"]-$value2["abono"];
                                                                                                $banco3450  = $value3["saldo"]+$value3["cargo"];
                                                                                                $caja = $value4["saldo"];
                                                                                                $banco0198F = $value5["saldo"]-$value5["abono"];
                                                                                                $banco6278F = $value6["saldo"]-$value6["abono"];
                                                                                                $banco3450F = $value7["saldo"]+$value7["cargo"];
                                                                                                $cajaF = $value8["saldo"]+$value8["cargo"];
                                                                                                $banco1286  = $value9["saldo"]-$value9["abono"];
                                                                                                $banco1219  = $value10["saldo"]+$value10["cargo"];
                                                                                                $banco0840  = $value11["saldo"]+$value11["cargo"];
                                                                                                $banco1340  = $value12["saldo"]-$value12["abono"];


                                                                                                $sumaSaldos = $banco0198+$banco6278+$banco3450+$caja;
                                                                                                $sumaSaldosF = $banco0198F + $banco6278F + $banco3450F + $cajaF + $banco1286 + $banco1219 + $banco0840 + $banco1340;
                                                                                                  
                                                                                                  echo '<td style="text-align:right">$ '.number_format($sumaSaldos,2).'</td>';
                                                                                                  echo '<td style="text-align:right">$ '.number_format($sumaSaldosF,2).'</td>';
                                                                                                  echo '<td style="text-align:right">$ '.number_format($sumaSaldos,2).'</td>';
                                                                                    
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                  
                                                                                }
                                                                              
                                                                            }
                                                                          
                                                                         }

                                                            
                                                                     }

                                                                   }

                                                                }
                                                            }
                                                          
                                                        }
                                                      
                                                    }

                                        
                                        ?>
                                       
                                    </tr>
                                 
                                   <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                      <td style="border: none;">Cuentas Bancarias</td>
                                      <td style="border: none;"></td>
                                      <td style="border: none;"></td>
                                      <td style="border: none;"></td>
                                   </tr>
                                   <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco0198</td>
                                    <?php
                                                          $importes0198 = $banco0198 + $banco0198F;
                                                          echo '<td>$'.number_format($banco0198,2).'</td>';
                                                          echo '<td>$'.number_format($banco0198F,2).'</td>';
                                                          echo '<td>$'.number_format($importes0198,2).'</td>';
                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco6278</td>
                                    <?php

                                                    $importes6278 = $banco6278 + $banco6278F;
                                                    echo '<td>$'.number_format($banco6278,2).'</td>';
                                                    echo '<td>$'.number_format($banco6278F,2).'</td>';
                                                    echo '<td>$'.number_format($importes6278,2).'</td>';

                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco3450</td>
                                    <?php
                                                        $importes3450 = $banco3450 + $banco3450F;
                                                        echo '<td>$'.number_format($banco3450,2).'</td>';
                                                        echo '<td>$'.number_format($banco3450F,2).'</td>';
                                                        echo '<td>$'.number_format($importes3450,2).'</td>';
                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Caja</td>
                                    <?php
                                                      $importesCaja = $caja+$cajaF;
                                                      echo '<td>$'.number_format($caja,2).'</td>';
                                                      echo '<td>$'.number_format($cajaF,2).'</td>';
                                                      echo '<td>$'.number_format($importesCaja,2).'</td>';
                                    ?>
                                   
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco1286</td>
                                    <?php
                                                  echo '<td>$'.number_format('0',2).'</td>';
                                                  echo '<td>$'.number_format($banco1286,2).'</td>';
                                                  echo '<td>$'.number_format($banco1286,2).'</td>';
                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco1219</td>
                                    <?php
                                                  echo '<td>$'.number_format('0',2).'</td>';
                                                  echo '<td>$'.number_format($banco1219,2).'</td>';
                                                  echo '<td>$'.number_format($banco1219,2).'</td>';
                    
                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco0840</td>
                                    <?php
                                                  echo '<td>$'.number_format('0',2).'</td>';
                                                  echo '<td>$ '.number_format($banco0840,2).'</td>';
                                                  echo '<td>$ '.number_format($banco0840,2).'</td>';
                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco1340</td>
                                    <?php
                                                  echo '<td>$'.number_format('0',2).'</td>';
                                                  echo '<td>$'.number_format($banco1340,2).'</td>';
                                                  echo '<td>$'.number_format($banco1340,2).'</td>';
                                    ?>
                               
                                </tr>
                                 <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                  <?php

                                        $item = null;
                                        $valor = null;
                                        $ingresosIndustrial = ControladorBanco6278::ctrIngresosIndustrial($item,$valor);
                                        $ingresosIndustrialF = ControladorBanco6278::ctrIngresosIndustrialF($item, $valor);
                                        $ingresosIndustrialCaja = ControladorCaja::ctrIngresosIndustrial($item, $valor);
                                        $ingresosIndustrialCajaF = ControladorCaja::ctrIngresosIndustrialF($item, $valor);
                                        $ingresosMayoreoCaja = ControladorCaja::ctrIngresosMayoreo($item, $valor);
                                        $ingresosMayoreoCajaF = ControladorCaja::ctrIngresosMayoreoF($item, $valor);
                                        $ingresosMayoreo = ControladorBanco6278::ctrIngresosMayoreo($item,$valor);
                                        $ingresosMayoreoF = ControladorBanco6278::ctrIngresosMayoreoF($item, $valor);
                                        $ingresosMayoreo3450 = ControladorBanco3450::ctrIngresosMayoreo($item, $valor);
                                        $ingresosMayoreo3450F = ControladorBanco3450::ctrIngresosMayoreoF($item, $valor);
                                        $ingresosNoIdentificados = ControladorBanco6278::ctrIngresosNoIdentificados($item,$valor);
                                        $ingresosNoIdentificadosF = ControladorBanco6278::ctrIngresosNoIdentificadosF($item, $valor);
                                        $ingresosNoIdentificados3450 = ControladorBanco3450::ctrIngresosNoIdentificados($item,$valor);
                                        $ingresosNoIdentificados3450F = ControladorBanco3450::ctrIngresosNoIdentificadosF($item, $valor);
                                        $reembolsosClientes = ControladorBanco6278::ctrReembolsosClientes($item, $valor);
                                        $reembolsosClientesF = ControladorBanco6278::ctrReembolsosClientesF($item, $valor);
                                        $ingresosMayoreoParcialesF = ControladorBanco6278::ctrIngresosMayoreoParcialesF($item, $valor);
                                        $ingresosNoIdentificadosVacios = ControladorBanco6278::ctrIngresosNoIdentificadosVacios($item, $valor);
                                        $ingresosNoIdentificadosVaciosF = ControladorBanco6278::ctrIngresosNoIdentificadosVaciosF($item, $valor);
                                        $ingresosNoIdentificados3450Vacios = ControladorBanco3450::ctrIngresosNoIdentificadosVacios($item, $valor);
                                        $ingresosNoIdentificados3450VaciosF = ControladorBanco3450::ctrIngresosNoIdentificadosVaciosF($item , $valor);


                                        foreach ($ingresosIndustrial  as $value) {
                                            foreach ($ingresosMayoreo as $value2) {
                                              foreach ($ingresosNoIdentificados as $value3) {
                                                foreach ($reembolsosClientes as $value4) {
                                                  foreach ($ingresosIndustrialF as $value5) {
                                                    foreach ($ingresosMayoreoF as $value6) {
                                                      foreach ($ingresosMayoreo3450 as $value7) {
                                                        foreach ($ingresosMayoreo3450F as $value8) {
                                                          foreach ($ingresosNoIdentificadosF as $value9) {
                                                            foreach ($ingresosNoIdentificados3450 as $value10) {
                                                              foreach ($ingresosNoIdentificados3450F as $value11) {
                                                                foreach ($reembolsosClientesF as $value12) {
                                                                  foreach ($ingresosIndustrialCaja as $value13) {
                                                                    foreach ($ingresosIndustrialCajaF as $value14) {
                                                                      foreach ($ingresosMayoreoCaja as $value15) {
                                                                        foreach ($ingresosMayoreoCajaF as $value16) {
                                                                          foreach ($ingresosMayoreoParcialesF as $value17) {
                                                                            foreach ($ingresosNoIdentificadosVacios as $value18) {
                                                                              foreach ($ingresosNoIdentificadosVaciosF as $value19) {
                                                                                foreach ($ingresosNoIdentificados3450Vacios as $value20) {
                                                                                  foreach ($ingresosNoIdentificados3450VaciosF as $value21) {

                                                                                        $ingresosIndustrial = $value["ingresos"]-$value4["reembolsos"];
                                                                                        $ingresosIndustrialF = $value5["ingresos"]-$value12["reembolsos"];
                                                                                        $ingresosIndustrialCaja = $value13["ingresos"];
                                                                                        $ingresosIndustrialCajaF = $value14["ingresos"];
                                                                                        $ingresosMayoreo = $value2["ingresos"];
                                                                                        $ingresosMayoreoF = $value6["ingresos"];
                                                                                        $ingresosMayoreo3450 = $value7["ingresos"];
                                                                                        $ingresosMayoreo3450F = $value8["ingresos"];
                                                                                        $ingresosMayoreoCaja = $value15["ingresos"];
                                                                                        $ingresosMayoreoCajaF = $value16["ingresos"];
                                                                                        $ingresosNoIdentificados = $value3["ingresos"] + $value18["ingresos"];
                                                                                        $ingresosNoIdentificadosF = $value9["ingresos"] + $value19["ingresos"];
                                                                                        $ingresosNoIdentificados3450 = $value10["ingresos"] + $value20["ingresos"];
                                                                                        $ingresosNoIdentificados3450F = $value11["ingresos"] + $value21["ingresos"];
                                                                                        $reembolsosClientes = $value4["reembolsos"];
                                                                                        $reembolsosClientesF = $value12["reembolsos"];
                                                                                        $ingresosMayoreoParcialesF = $value17["ingresos"];

                                                                                        $ingresosCedis = $ingresosIndustrial+$ingresosIndustrialCaja+$ingresosMayoreo+$ingresosMayoreo3450+$ingresosMayoreoCaja+$ingresosNoIdentificados+$ingresosNoIdentificados3450;
                                                                                        $ingresosCedisF = $ingresosIndustrialF+$ingresosIndustrialCaja+$ingresosMayoreoF+$ingresosMayoreo3450F+$ingresosMayoreoCajaF+$ingresosNoIdentificadosF+$ingresosNoIdentificados3450F + $ingresosMayoreoParcialesF;
                                                                                          $totalIngresosCedis = $ingresosCedis;
                                                                                          $totalIngresosCedisF = $ingresosCedisF;
                                                                                          $importesCedis =  $totalIngresosCedis + $totalIngresosCedisF;
                                                                                          echo '<td style="border: none;">Ingreso Cedis</td>';
                                                                                          echo '<td style="border: none;text-align:right;">$'.number_format($totalIngresosCedis,2).'</td>';
                                                                                          echo '<td style="border: none;text-align:right;">$'.number_format($totalIngresosCedisF,2).'</td>';
                                                                                          echo '<td style="border: none;text-align:right;">$'.number_format($importesCedis,2).'</td>';
                                                                                    
                                                                                  }
                                                                                  
                                                                                }
                                                                                
                                                                              }

                                                                              
                                                                            }
                                                                            
                                                                          }

                                                                        }
                                                                        
                                                                      }
                                                                      
                                                                    }
                                                                    
                                                                  }

                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }

                                              }
                                              
                                            }
                                          
                                        }

                                  ?>

                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Cuentas Industrial</td>
                                    <?php

                                              $ingresosIndustrialTotal = $ingresosIndustrial + $ingresosIndustrialCaja;
                                              $ingresosIndustrialTotalF = $ingresosIndustrialF + $ingresosIndustrialCajaF;
                                              $importesIndustrial= $ingresosIndustrialTotal + $ingresosIndustrialTotalF;
                                              echo '<td>$'.number_format($ingresosIndustrialTotal,2).'</td>';
                                              echo '<td>$'.number_format($ingresosIndustrialTotalF,2).'</td>';
                                              echo '<td>$'.number_format($importesIndustrial,2).'</td>';
                                                            
                                           
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Mayoreo</td>
                                    <?php

                                            $ingresosMayoreoTotal = $ingresosMayoreo + $ingresosMayoreo3450 + $ingresosMayoreoCaja;
                                            $ingresosMayoreoTotalF = $ingresosMayoreoF + $ingresosMayoreo3450F + $ingresosMayoreoCajaF + $ingresosMayoreoParcialesF;
                                            $importesMayoreo = $ingresosMayoreoTotal + $ingresosMayoreoTotalF;
                                            echo '<td>$'.number_format($ingresosMayoreoTotal,2).'</td>';
                                            echo '<td>$'.number_format($ingresosMayoreoTotalF,2).'</td>';
                                            echo '<td>$'.number_format( $importesMayoreo,2).'</td>';               

                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso no Identificado</td>
                                    <?php
                                          
                                          $ingresosNoIdentificadosTotal = $ingresosNoIdentificados + $ingresosNoIdentificados3450;
                                          $ingresosNoIdentificadosTotalF = $ingresosNoIdentificadosF + $ingresosNoIdentificados3450F;
                                          $importesNoIdentificados = $ingresosNoIdentificadosTotal + $ingresosNoIdentificadosTotalF;
                                          echo '<td>$'.number_format($ingresosNoIdentificadosTotal,2).'</td>';
                                          echo '<td>$'.number_format($ingresosNoIdentificadosTotalF,2).'</td>';
                                          echo '<td>$'.number_format($importesNoIdentificados,2).'</td>';
                                                            
                                    ?>
                           
                                </tr>
                                <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                  <td style="border: none;">Ingreso Tiendas</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $ingresosSanManuel = ControladorBanco6278::ctrIngresosSanManuel($item, $valor);
                                    $ingresosSanManuelF = ControladorBanco6278::ctrIngresosSanManuelF($item, $valor);
                                    $ingresosSanManuel0198 = ControladorBanco0198::ctrIngresosSanManuel($item, $valor);
                                    $ingresosSanManuel0198F = ControladorBanco0198::ctrIngresosSanManuelF($item, $valor);
                                    $ingresosMayorazgo = ControladorBanco6278::ctrIngresosMayorazgo($item, $valor);
                                    $ingresosMayorazgoF = ControladorBanco6278::ctrIngresosMayorazgoF($item, $valor);
                                    $ingresosMayorazgo0198 = ControladorBanco0198::ctrIngresosMayorazgo($item, $valor);
                                    $ingresosMayorazgo0198F = ControladorBanco0198::ctrIngresosMayorazgoF($item, $valor);
                                    $ingresosReforma = ControladorBanco6278::ctrIngresosReforma($item, $valor);
                                    $ingresosReformaF = ControladorBanco6278::ctrIngresosReformaF($item, $valor);
                                    $ingresosReforma0198 = ControladorBanco0198::ctrIngresosReforma($item, $valor);
                                    $ingresosReforma0198F = ControladorBanco0198::ctrIngresosReformaF($item, $valor);
                                    $ingresosXonaca = ControladorBanco6278::ctrIngresosXonaca($item, $valor);
                                    $ingresosXonacaF = ControladorBanco6278::ctrIngresosXonacaF($item, $valor);
                                    $ingresosXonaca0198 = ControladorBanco0198::ctrIngresosXonaca($item, $valor);
                                    $ingresosXonaca0198F = ControladorBanco0198::ctrIngresosXonacaF($item, $valor);
                                    $ingresosVergel0198 = ControladorBanco0198::ctrIngresosVergel($item, $valor);
                                    $ingresosVergel0198F = ControladorBanco0198::ctrIngresosVergelF($item, $valor);
                                    $ingresosSantiago6278 = ControladorBanco6278::ctrIngresosSantiago($item, $valor);
                                    $ingresosSantiago6278F = ControladorBanco6278::ctrIngresosSantiagoF($item, $valor);
                                    $ingresosCapu0198 = ControladorBanco0198::ctrIngresosCapu($item, $valor);
                                    $ingresosCapu0198F = ControladorBanco0198::ctrIngresosCapuF($item, $valor);
                                    $ingresosLasTorres0198 = ControladorBanco0198::ctrIngresosLasTorres($item, $valor);
                                    $ingresosLasTorres0198F = ControladorBanco0198::ctrIngresosLasTorresF($item, $valor);
                                    $ingresosNoIdentificados0198 = ControladorBanco0198::ctrIngresosNoIdentificados($item, $valor);
                                    $ingresosNoIdentificados0198F = ControladorBanco0198::ctrIngresosNoIdentificadosF($item, $valor);
                                    $ingresosNoIdentificados0198Vacios = ControladorBanco0198::ctrIngresosNoIdentificadosVacios($item,$valor);
                                    $ingresosNoIdentificados0198VaciosF = ControladorBanco0198::ctrIngresosNoIdentificadosVaciosF($item, $valor);
                                    $reembolsosClientesTiendas = ControladorBanco6278::ctrReembolsosClientesTiendas($item, $valor);
                                    $reembolsosClientesTiendasF = ControladorBanco6278::ctrReembolsosClientesTiendasF($item, $valor);

                                    foreach ($ingresosSanManuel as $value) {
                                      foreach ($ingresosSanManuelF as $value2) {
                                        foreach ($ingresosSanManuel0198 as $value3) {
                                          foreach ($ingresosSanManuel0198F as $value4) {
                                            foreach ($ingresosMayorazgo as $value5) {
                                              foreach ($ingresosMayorazgoF as $value6) {
                                                foreach ($ingresosMayorazgo0198 as $value7) {
                                                  foreach ($ingresosMayorazgo0198F as $value8) {
                                                    foreach ($ingresosReforma as $value9) {
                                                      foreach ($ingresosReformaF as $value10) {
                                                        foreach ($ingresosReforma0198 as $value11) {
                                                          foreach ($ingresosReforma0198F as $value12) {
                                                            foreach ($ingresosXonaca as $value13) {
                                                              foreach ($ingresosXonacaF as $value14) {
                                                                foreach ($ingresosXonaca0198 as $value15) {
                                                                  foreach ($ingresosXonaca0198F as $value16) {
                                                                    foreach ($ingresosVergel0198 as $value17) {
                                                                      foreach ($ingresosVergel0198F as $value18) {
                                                                        foreach ($ingresosSantiago6278 as $value19) {
                                                                          foreach ($ingresosSantiago6278F as $value20) {
                                                                            foreach ($ingresosCapu0198 as $value21) {
                                                                              foreach ($ingresosCapu0198F as $value22) {
                                                                                foreach ($ingresosLasTorres0198 as $value23) {
                                                                                  foreach ($ingresosLasTorres0198F as $value24) {
                                                                                    foreach ($ingresosNoIdentificados0198 as $value25) {
                                                                                      foreach ($ingresosNoIdentificados0198F as $value26) {
                                                                                        foreach ($ingresosNoIdentificados0198Vacios as $value27) {
                                                                                          foreach ($ingresosNoIdentificados0198VaciosF as $value28) {
                                                                                            foreach ($reembolsosClientesTiendas as $value29) {
                                                                                              foreach ($reembolsosClientesTiendasF as $value30) {
                                                                                                   
                                                                                                   $sanManuel = $value["ingresos"] + $value3["ingresos"];
                                                                                                   $sanManuelF = $value2["ingresos"] + $value4["ingresos"];
                                                                                                   $mayorazgo = $value5["ingresos"] + $value7["ingresos"];
                                                                                                   $mayorazgoF = $value6["ingresos"] + $value8["ingresos"];
                                                                                                   $reforma = $value9["ingresos"] + $value11["ingresos"];
                                                                                                   $reformaF = $value10["ingresos"] + $value12["ingresos"];
                                                                                                   $xonaca = $value13["ingresos"] + $value15["ingresos"];
                                                                                                   $xonacaF = $value14["ingresos"] + $value16["ingresos"];
                                                                                                   $vergel = $value17["ingresos"];
                                                                                                   $vergelF = $value18["ingresos"];
                                                                                                   $santiago = $value19["ingresos"];
                                                                                                   $santiagoF = $value20["ingresos"];
                                                                                                   $capu = $value21["ingresos"];
                                                                                                   $capuF = $value22["ingresos"];
                                                                                                   $lasTorres = $value23["ingresos"];
                                                                                                   $lasTorresF = $value24["ingresos"];
                                                                                                   $noIdentificados = $value25["ingresos"] + $value27["ingresos"];
                                                                                                   $noIdentificadosF = $value26["ingresos"] + $value28["ingresos"];
                                                                                                   $reembolsosTiendas = $value29["reembolsos"];
                                                                                                   $reembolsosTiendasF = $value30["reembolsos"];



                                                                                                   $ingresosTiendas = $sanManuel + $mayorazgo + $reforma + $xonaca + $vergel + $santiago + $capu + $lasTorres + $noIdentificados;
                                                                                                   $ingresosTiendasF = $sanManuelF + $mayorazgoF + $reformaF + $xonacaF + $vergelF + $santiagoF + $capuF + $lasTorresF + $noIdentificadosF;

                                                                                                   $ingresosTiendasTotal = $ingresosTiendas;
                                                                                                   $ingresosTiendasTotalF = $ingresosTiendasF;
                                                                                                   $importesTiendas = $ingresosTiendasTotal + $ingresosTiendasTotalF;
                                                                                                  echo '<td style="border:none;text-align:right;">$'.number_format($ingresosTiendasTotal,2).'</td>';
                                                                                                  echo '<td style="border: none;text-align:right;">$'.number_format($ingresosTiendasTotalF,2).'</td>';
                                                                                                  echo '<td style="border: none;text-align:right;">$'.number_format($importesTiendas,2).'</td>';
                                                                                              }
                                                                                              
                                                                                            }
     
                                                                                          }
                                                                                          
                                                                                        }
                                                                                        
                                                                                      }
                                                                                      
                                                                                    }
                                                                                    
                                                                                  }
                                                                                  
                                                                                }
                                                                                
                                                                              }
                                                                              
                                                                            }
                                                                            
                                                                          }
                                                                          
                                                                        }
                                                                        
                                                                      }
                                                                      
                                                                    }
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }

                                          }
                                          
                                        }
                                        
                                      }
                                      
                                    }

                                    ?>
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso San Manuel</td>
                                    <?php

                                                  $importesSanManuel = $sanManuel + $sanManuelF;
                                                  echo '<td>$'.number_format($sanManuel,2).'</td>';
                                                  echo '<td>$'.number_format($sanManuelF,2).'</td>';
                                                  echo '<td>$'.number_format($importesSanManuel,2).'</td>';
                                       
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Mayorazgo</td>
                                   <?php
                                                  $importesMayorazgo = $mayorazgo + $mayorazgoF;
                                                  echo '<td>$'.number_format($mayorazgo,2).'</td>';
                                                  echo '<td>$'.number_format($mayorazgoF,2).'</td>';
                                                  echo '<td>$'.number_format($importesMayorazgo,2).'</td>';
                                           
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Reforma</td>
                                    <?php
                                                  $importesReforma = $reforma + $reformaF;
                                                  echo '<td>$'.number_format($reforma,2).'</td>';
                                                  echo '<td>$'.number_format($reformaF,2).'</td>';
                                                  echo '<td>$'.number_format($importesReforma,2).'</td>';

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Xonaca</td>
                                    <?php
                                                  $importesXonaca = $xonaca + $xonacaF;
                                                  echo '<td>$'.number_format($xonaca,2).'</td>';
                                                  echo '<td>$'.number_format($xonacaF,2).'</td>';
                                                  echo '<td>$'.number_format($importesXonaca,2).'</td>';
                                       
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Vergel</td>
                                     <?php
                                                    $importesVergel = $vergel + $vergelF;
                                                    echo '<td>$'.number_format($vergel,2).'</td>';
                                                    echo '<td>$'.number_format($vergelF,2).'</td>';
                                                    echo '<td>$'.number_format($importesVergel,2).'</td>';
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Santiago</td>
                                     <?php
                                                    $importesSantiago = $santiago + $santiagoF;
                                                    echo '<td>$'.number_format($santiago,2).'</td>';
                                                    echo '<td>$'.number_format($santiagoF,2).'</td>';
                                                    echo '<td>$'.number_format($importesSantiago,2).'</td>';
                                          
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Capu</td>
                                    <?php
                                                    $importesCapu = $capu + $capuF;
                                                    echo '<td>$'.number_format($capu,2).'</td>';
                                                    echo '<td>$'.number_format($capuF,2).'</td>';
                                                    echo '<td>$'.number_format($importesCapu,2).'</td>';
                                           
                                    ?>
                           
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Las Torres</td>
                                     <?php
                                                    $importesLasTorres = $lasTorres + $lasTorresF;
                                                    echo '<td>$'.number_format($lasTorres,2).'</td>';
                                                    echo '<td>$'.number_format($lasTorresF,2).'</td>';
                                                    echo '<td>$'.number_format($importesLasTorres,2).'</td>';
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso no Identificado</td>
                                    <?php
                                                     $importesNoIdentificadosTiendas = $noIdentificados + $noIdentificadosF;
                                                     echo '<td>$'.number_format($noIdentificados,2).'</td>';
                                                     echo '<td>$'.number_format($noIdentificadosF,2).'</td>';
                                                     echo '<td>$'.number_format($importesNoIdentificadosTiendas,2).'</td>';       
                                                     
                                    ?>
                           
                                </tr>
                                <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                    <td style="border: none;">Subtotal Otros Ingresos</td>

                                    <?php 

                                    $item = null;
                                    $valor = null;

                                    $otroIngresosBanco6278 = ControladorBanco6278::ctrOtrosIngresos6278($item, $valor);
                                    $otrosIngresosBanco6278F = ControladorBanco6278::ctrOtrosIngresos6278F($item, $valor);
                                    $otroIngresosCaja = ControladorCaja::ctrOtrosIngresosCaja($item, $valor);
                                    $otrosIngresosCajaF = ControladorCaja::ctrOtrosIngresosCajaF($item, $valor);

                                    foreach ($otroIngresosBanco6278 as $value) {
                                      foreach ($otrosIngresosBanco6278F as $value2) {
                                        foreach ($otroIngresosCaja as $value3) {
                                          foreach ($otrosIngresosCajaF as $value4) {

                                              $otrosIngresosEnero = $value["otrosIngresos"] + $value3["otrosIngresos"];
                                              $otrosIngresosFebrero = $value2["otrosIngresos"] + $value4["otrosIngresos"];
                                              $importesOtrosIngresos = $otrosIngresosEnero + $otrosIngresosFebrero;
                                              echo '<td style="border: none;text-align:right;">$'.number_format($otrosIngresosEnero,2).'</td>';
                                              echo '<td style="border: none;text-align:right;">$'.number_format($otrosIngresosFebrero,2).'</td>';
                                              echo '<td style="border: none;text-align:right;">$'.number_format($importesOtrosIngresos,2).'</td>';
                                            
                                          }
                                          
                                        }
                                        
                                      }
                                      
                                    }

                                    ?>
                                    
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Otros Ingresos</td>
                                    <?php
                                    

                                                  echo '<td>$'.number_format($otrosIngresosEnero,2).'</td>';
                                                  echo '<td>$'.number_format($otrosIngresosFebrero,2).'</td>';
                                                  echo '<td>$'.number_format($importesOtrosIngresos,2).'</td>';
                  
                                                

                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Prestamos Bancarios</td>
                                    <?php
                                   

                                                  echo '<td>$'.number_format('0',2).'</td>';
                                                  echo '<td>$'.number_format('0',2).'</td>';
                                                  echo '<td>$'.number_format('0',2).'</td>';
                  
                                                

                                    ?>
                           
                                </tr>
                                <tr style="background: #fbca05;color:#ffffff;font-weight: bold;">
                                    <td style="border: none;">Subtotal Entradas del mes</td>
                                    <?php
                                        $entradasMesEnero = $totalIngresosCedis + $ingresosTiendasTotal + $otrosIngresosEnero;
                                        $entradasMesFebrero = $totalIngresosCedisF + $ingresosTiendasTotalF + $otrosIngresosFebrero;
                                        $importeEntradas = $entradasMesEnero + $entradasMesFebrero;
                                        echo '<td style="border: none;text-align:right;">$'.number_format($entradasMesEnero,2).'</td>';
                                        echo '<td style="border: none;text-align:right;">$'.number_format($entradasMesFebrero,2).'</td>';
                                        echo '<td style="border: none;text-align:right;">$'.number_format($importeEntradas,2).'</td>';
                                    ?>
                                    
                                </tr>
                                 <tr style="background: #f39c12;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">Total Ingreso Bruto Mensual</td>
                                    <?php
                                          $ingresoBrutoMensualEnero = $sumaSaldos + $entradasMesEnero;
                                          $ingresoBrutoMensualFebrero = $sumaSaldosF + $entradasMesFebrero;
                                          $importeIngresos = $ingresoBrutoMensualEnero + $ingresoBrutoMensualFebrero;
                                          echo '<td style="border: none;text-align:right;">$'.number_format($ingresoBrutoMensualEnero,2).'</td>';
                                          echo '<td style="border: none;text-align:right;">$'.number_format($ingresoBrutoMensualFebrero,2).'</td>';
                                          echo '<td style="border: none;text-align:right;">$'.number_format($importeIngresos,2).'</td>';
                                    ?>
                                   
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr style="background: #f39c12;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">Salidas de Efectivo</td>
                                    <td style="border: none;">Enero</td>
                                    <td style="border: none;">Febrero</td>
                                    <td style="border: none;">Importes</td>
                                </tr>
                                <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                    <td style="border: none;">Pagos a Proveedores</td>
                                    <?php 

                                      $item = null;
                                      $valor = null;
                                      $pagoProveedores0198 =  ControladorBanco0198::ctrPagoAProveedores($item, $valor);
                                      $pagoProveedores0198F = ControladorBanco0198::ctrPagoAProveedoresF($item, $valor);
                                      $pagoProveedores6278 = ControladorBanco6278::ctrPagoAProveedores($item, $valor);
                                      $pagoProveedores6278F = ControladorBanco6278::ctrPagoAProveedoresF($item, $valor);
                                      $pagoProveedoresCaja = ControladorCaja::ctrPagoAProveedores($item, $valor);
                                      $pagoProveedoresCajaF = ControladorCaja::ctrPagoAProveedoresF($item, $valor);

                                      foreach ($pagoProveedores0198 as $value) {
                                        foreach ($pagoProveedores0198F as $value2) {
                                          foreach ($pagoProveedores6278 as $value3) {
                                            foreach ($pagoProveedores6278F as $value4) {
                                              foreach ($pagoProveedoresCaja as $value5) {
                                                foreach ($pagoProveedoresCajaF as $value6) {

                                                       $pagoProveedor0198 = $value["egresos"];
                                                       $pagoProveedor0198F = $value2["egresos"];
                                                       $pagoProveedor6278 = $value3["egresos"];
                                                       $pagoProveedor6278F = $value4["egresos"];
                                                       $pagoProveedorCaja = $value5["egresos"];
                                                       $pagoProveedorCajaF = $value6["egresos"];
                                                       $pagoProveedoresTotal = $pagoProveedor0198 + $pagoProveedor6278 + $pagoProveedorCaja;
                                                       $pagoProveedoresTotalF = $pagoProveedor0198F + $pagoProveedor6278F + $pagoProveedorCajaF;

                                                       $importesPagoProveedores = $pagoProveedoresTotal + $pagoProveedoresTotalF;

                                                        echo '<td style="border: none;text-align:right;">$'.number_format($pagoProveedoresTotal,2).'</td>';
                                                        echo '<td style="border: none;text-align:right;">$'.number_format($pagoProveedoresTotalF,2).'</td>';
                                                        echo '<td style="border: none;text-align:right;">$'.number_format($importesPagoProveedores,2).'</td>';
                                              
                                                }
                                                
                                              }

                                            }
                                            
                                          }
                                          
                                        }
                                      }
                                     ?>
                                </tr>

                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Acreedores Bancarios</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $acreedoresBancarios6278 = ControladorBanco6278::ctrAcreedoresBancarios($item, $valor);
                                    $acreedoresBancarios6278F = ControladorBanco6278::ctrAcreedoresBancariosF($item, $valor);
                                    $acreedoresBancarios3450 = ControladorBanco3450::ctrAcreedoresBancarios($item, $valor);
                                    $acreedoresBancarios3450F = ControladorBanco3450::ctrAcreedoresBancariosF($item, $valor);
                                    $acreedoresBancarios0198 = ControladorBanco0198::ctrAcreedoresBancarios($item, $valor);
                                    $acreedoresBancarios0198F = ControladorBanco0198::ctrAcreedoresBancariosF($item, $valor);
                                    $acreedoresBancariosCaja = ControladorCaja::ctrAcreedoresBancarios($item, $valor);
                                    $acreedoresBancariosCajaF = ControladorCaja::ctrAcreedoresBancariosF($item, $valor);
                                    $acreedoresBancarios1286 = ControladorBanco1286::ctrAcreedoresBancarios($item, $valor);
                                    $acreedoresBancarios1286F = ControladorBanco1286::ctrAcreedoresBancariosF($item, $valor);
                                    $acreedoresBancarios1219 = ControladorBanco1219::ctrAcreedoresBancarios($item, $valor);
                                    $acreedoresBancarios1219F = ControladorBanco1219::ctrAcreedoresBancariosF($item, $valor);
                                    $acreedoresBancarios0840 = ControladorBanco0840::ctrAcreedoresBancarios($item, $valor);
                                    $acreedoresBancarios0840F = ControladorBanco0840::ctrAcreedoresBancariosF($item, $valor);
                                    $acreedoresBancarios1340 = ControladorBanco1340::ctrAcreedoresBancarios($item, $valor);
                                    $acreedoresBancarios1340F = ControladorBanco1340::ctrAcreedoresBancariosF($item, $valor);

                                    foreach ($acreedoresBancarios6278 as $value) {
                                      foreach ($acreedoresBancarios6278F as $value2) {
                                        foreach ($acreedoresBancarios3450 as $value3) {
                                          foreach ($acreedoresBancarios1340F as $value4) {
                                            foreach ($acreedoresBancarios0198 as $value5) {
                                              foreach ($acreedoresBancarios0198F as $value6) {
                                                foreach ($acreedoresBancariosCaja as $value7) {
                                                  foreach ($acreedoresBancariosCajaF as $value8) {
                                                    foreach ($acreedoresBancarios1286 as $value9) {
                                                      foreach ($acreedoresBancarios1286F as $value10) {
                                                        foreach ($acreedoresBancarios1219 as $value11) {
                                                          foreach ($acreedoresBancarios1219F as $value12) {
                                                            foreach ($acreedoresBancarios0840 as $value13) {
                                                              foreach ($acreedoresBancarios0840F as $value14) {
                                                                foreach ($acreedoresBancarios1340 as $value15) {
                                                                  foreach ($acreedoresBancarios1340F as $value16) {

                                                                    $acreedor6278 = $value["egresos"];
                                                                    $acreedor6278F = $value2["egresos"];
                                                                    $acreedor3450 = $value3["egresos"];
                                                                    $acreedor3450F = $value4["egresos"];
                                                                    $acreedor0198 = $value5["egresos"];
                                                                    $acreedor0198F = $value6["egresos"];
                                                                    $acreedorCaja = $value7["egresos"];
                                                                    $acreedorCajaF = $value8["egresos"];
                                                                    $acreedor1286 = $value9["egresos"];
                                                                    $acreedor1286F = $value10["egresos"];
                                                                    $acreedor1219 = $value11["egresos"];
                                                                    $acreedor1219F = $value12["egresos"];
                                                                    $acreedor0840 = $value13["egresos"];
                                                                    $acreedor0840F = $value14["egresos"];
                                                                    $acreedor1340 = $value15["egresos"];
                                                                    $acreedor1340F = $value16["egresos"];

                                                                    $acreedoresBancariosTotal = $acreedor6278 + $acreedor3450 + $acreedor0198 + $acreedorCaja + $acreedor1286 + $acreedor1219 + $acreedor0840 + $acreedor1340;
                                                                    $acreedoresBancariosTotalF = $acreedor6278F + $acreedor3450F + $acreedor0198F + $acreedorCajaF + $acreedor1286F + $acreedor1219F + $acreedor0840F + $acreedor1340F;
                                                                    $importesAcreedoresBancarios = $acreedoresBancariosTotal + $acreedoresBancariosTotalF;
                                                                    echo '<td>$'.number_format($acreedoresBancariosTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($acreedoresBancariosTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesAcreedoresBancarios,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Prestamos Bancarios</td>
                                     <?php
                                    $item = null;
                                    $valor = null;

                                    $prestamosBancarios6278 = ControladorBanco6278::ctrPrestamosBancarios($item, $valor);
                                    $prestamosBancarios6278F = ControladorBanco6278::ctrPrestamosBancariosF($item, $valor);
                                    $prestamosBancarios3450 = ControladorBanco3450::ctrPrestamosBancarios($item, $valor);
                                    $prestamosBancarios3450F = ControladorBanco3450::ctrPrestamosBancariosF($item, $valor);
                                    $prestamosBancarios0198 = ControladorBanco0198::ctrPrestamosBancarios($item, $valor);
                                    $prestamosBancarios0198F = ControladorBanco0198::ctrPrestamosBancariosF($item, $valor);
                                    $prestamosBancariosCaja = ControladorCaja::ctrPrestamosBancarios($item, $valor);
                                    $prestamosBancariosCajaF = ControladorCaja::ctrPrestamosBancariosF($item, $valor);
                                    $prestamosBancarios1286 = ControladorBanco1286::ctrPrestamosBancarios($item, $valor);
                                    $prestamosBancarios1286F = ControladorBanco1286::ctrPrestamosBancariosF($item, $valor);
                                    $prestamosBancarios1219 = ControladorBanco1219::ctrPrestamosBancarios($item, $valor);
                                    $prestamosBancarios1219F = ControladorBanco1219::ctrPrestamosBancariosF($item, $valor);
                                    $prestamosBancarios0840 = ControladorBanco0840::ctrPrestamosBancarios($item, $valor);
                                    $prestamosBancarios0840F = ControladorBanco0840::ctrPrestamosBancariosF($item, $valor);
                                    $prestamosBancarios1340 = ControladorBanco1340::ctrPrestamosBancarios($item, $valor);
                                    $prestamosBancarios1340F = ControladorBanco1340::ctrPrestamosBancariosF($item, $valor);

                                    foreach ($prestamosBancarios6278 as $value) {
                                      foreach ($prestamosBancarios6278F as $value2) {
                                        foreach ($prestamosBancarios3450 as $value3) {
                                          foreach ($prestamosBancarios1340F as $value4) {
                                            foreach ($prestamosBancarios0198 as $value5) {
                                              foreach ($prestamosBancarios0198F as $value6) {
                                                foreach ($prestamosBancariosCaja as $value7) {
                                                  foreach ($prestamosBancariosCajaF as $value8) {
                                                    foreach ($prestamosBancarios1286 as $value9) {
                                                      foreach ($prestamosBancarios1286F as $value10) {
                                                        foreach ($prestamosBancarios1219 as $value11) {
                                                          foreach ($prestamosBancarios1219F as $value12) {
                                                            foreach ($prestamosBancarios0840 as $value13) {
                                                              foreach ($prestamosBancarios0840F as $value14) {
                                                                foreach ($prestamosBancarios1340 as $value15) {
                                                                  foreach ($prestamosBancarios1340F as $value16) {

                                                                    $prestamo6278 = $value["egresos"];
                                                                    $prestamo6278F = $value2["egresos"];
                                                                    $prestamo3450 = $value3["egresos"];
                                                                    $prestamo3450F = $value4["egresos"];
                                                                    $prestamo0198 = $value5["egresos"];
                                                                    $prestamo0198F = $value6["egresos"];
                                                                    $prestamoCaja = $value7["egresos"];
                                                                    $prestamoCajaF = $value8["egresos"];
                                                                    $prestamo1286 = $value9["egresos"];
                                                                    $prestamo1286F = $value10["egresos"];
                                                                    $prestamo1219 = $value11["egresos"];
                                                                    $prestamo1219F = $value12["egresos"];
                                                                    $prestamo0840 = $value13["egresos"];
                                                                    $prestamo0840F = $value14["egresos"];
                                                                    $prestamo1340 = $value15["egresos"];
                                                                    $prestamo1340F = $value16["egresos"];

                                                                    $prestamosBancariosTotal = $prestamo6278 + $prestamo3450 + $prestamo0198 + $prestamoCaja + $prestamo1286 + $prestamo1219 + $prestamo0840 + $prestamo1340;
                                                                    $prestamosBancariosTotalF = $prestamo6278F + $prestamo3450F + $prestamo0198F + $prestamoCajaF + $prestamo1286F + $prestamo1219F + $prestamo0840F + $prestamo1340F;
                                                                    $importesPrestamosBancarios = $prestamosBancariosTotal + $prestamosBancariosTotalF;
                                                                    echo '<td>$'.number_format($prestamosBancariosTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($prestamosBancariosTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesPrestamosBancarios,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>I.V.A Acreditable</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $ivaAcreditable6278 = ControladorBanco6278::ctrIVAAcreditable($item, $valor);
                                    $ivaAcreditable6278F = ControladorBanco6278::ctrIVAAcreditableF($item, $valor);
                                    $ivaAcreditable3450 = ControladorBanco3450::ctrIVAAcreditable($item, $valor);
                                    $ivaAcreditable3450F = ControladorBanco3450::ctrIVAAcreditableF($item, $valor);
                                    $ivaAcreditable0198 = ControladorBanco0198::ctrIVAAcreditable($item, $valor);
                                    $ivaAcreditable0198F = ControladorBanco0198::ctrIVAAcreditableF($item, $valor);
                                    $ivaAcreditableCaja = ControladorCaja::ctrIVAAcreditable($item, $valor);
                                    $ivaAcreditableCajaF = ControladorCaja::ctrIVAAcreditableF($item, $valor);
                                    $ivaAcreditable1286 = ControladorBanco1286::ctrIVAAcreditable($item, $valor);
                                    $ivaAcreditable1286F = ControladorBanco1286::ctrIVAAcreditableF($item, $valor);
                                    $ivaAcreditable1219 = ControladorBanco1219::ctrIVAAcreditable($item, $valor);
                                    $ivaAcreditable1219F = ControladorBanco1219::ctrIVAAcreditableF($item, $valor);
                                    $ivaAcreditable0840 = ControladorBanco0840::ctrIVAAcreditable($item, $valor);
                                    $ivaAcreditable0840F = ControladorBanco0840::ctrIVAAcreditableF($item, $valor);
                                    $ivaAcreditable1340 = ControladorBanco1340::ctrIVAAcreditable($item, $valor);
                                    $ivaAcreditable1340F = ControladorBanco1340::ctrIVAAcreditableF($item, $valor);

                                    foreach ($ivaAcreditable6278 as $value) {
                                      foreach ($ivaAcreditable6278F as $value2) {
                                        foreach ($ivaAcreditable3450 as $value3) {
                                          foreach ($ivaAcreditable1340F as $value4) {
                                            foreach ($ivaAcreditable0198 as $value5) {
                                              foreach ($ivaAcreditable0198F as $value6) {
                                                foreach ($ivaAcreditableCaja as $value7) {
                                                  foreach ($ivaAcreditableCajaF as $value8) {
                                                    foreach ($ivaAcreditable1286 as $value9) {
                                                      foreach ($ivaAcreditable1286F as $value10) {
                                                        foreach ($ivaAcreditable1219 as $value11) {
                                                          foreach ($ivaAcreditable1219F as $value12) {
                                                            foreach ($ivaAcreditable0840 as $value13) {
                                                              foreach ($ivaAcreditable0840F as $value14) {
                                                                foreach ($ivaAcreditable1340 as $value15) {
                                                                  foreach ($ivaAcreditable1340F as $value16) {

                                                                    $ivaAcredi6278 = $value["egresos"];
                                                                    $ivaAcredi6278F = $value2["egresos"];
                                                                    $ivaAcredi3450 = $value3["egresos"];
                                                                    $ivaAcredi3450F = $value4["egresos"];
                                                                    $ivaAcredi0198 = $value5["egresos"];
                                                                    $ivaAcredi0198F = $value6["egresos"];
                                                                    $ivaAcrediCaja = $value7["egresos"];
                                                                    $ivaAcrediCajaF = $value8["egresos"];
                                                                    $ivaAcredi1286 = $value9["egresos"];
                                                                    $ivaAcredi1286F = $value10["egresos"];
                                                                    $ivaAcredi1219 = $value11["egresos"];
                                                                    $ivaAcredi1219F = $value12["egresos"];
                                                                    $ivaAcredi0840 = $value13["egresos"];
                                                                    $ivaAcredi0840F = $value14["egresos"];
                                                                    $ivaAcredi1340 = $value15["egresos"];
                                                                    $ivaAcredi1340F = $value16["egresos"];

                                                                    $ivaAcreditableTotal = $ivaAcredi6278 + $ivaAcredi3450 + $ivaAcredi0198 + $ivaAcrediCaja + $ivaAcredi1286 + $ivaAcredi1219 + $ivaAcredi0840 + $ivaAcredi1340;
                                                                    $ivaAcreditableTotalF = $ivaAcredi6278F + $ivaAcredi3450F + $ivaAcredi0198F + $ivaAcrediCajaF + $ivaAcredi1286F + $ivaAcredi1219F + $ivaAcredi0840F + $ivaAcredi1340F;
                                                                    $importesIvaAcreditable = $ivaAcreditableTotal + $ivaAcreditableTotalF;
                                                                    echo '<td>$'.number_format($ivaAcreditableTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($ivaAcreditableTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesIvaAcreditable,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>02. Adquisición de Activos (Equipo Computo-Accesorio)</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $adquisiciondeActivos16278 = ControladorBanco6278::ctrAdquisiciondeActivos1($item, $valor);
                                    $adquisiciondeActivos16278F = ControladorBanco6278::ctrAdquisiciondeActivos1F($item, $valor);
                                    $adquisiciondeActivos13450 = ControladorBanco3450::ctrAdquisiciondeActivos1($item, $valor);
                                    $adquisiciondeActivos13450F = ControladorBanco3450::ctrAdquisiciondeActivos1F($item, $valor);
                                    $adquisiciondeActivos10198 = ControladorBanco0198::ctrAdquisiciondeActivos1($item, $valor);
                                    $adquisiciondeActivos10198F = ControladorBanco0198::ctrAdquisiciondeActivos1F($item, $valor);
                                    $adquisiciondeActivos1Caja = ControladorCaja::ctrAdquisiciondeActivos1($item, $valor);
                                    $adquisiciondeActivos1CajaF = ControladorCaja::ctrAdquisiciondeActivos1F($item, $valor);
                                    $adquisiciondeActivos11286 = ControladorBanco1286::ctrAdquisiciondeActivos1($item, $valor);
                                    $adquisiciondeActivos11286F = ControladorBanco1286::ctrAdquisiciondeActivos1F($item, $valor);
                                    $adquisiciondeActivos11219 = ControladorBanco1219::ctrAdquisiciondeActivos1($item, $valor);
                                    $adquisiciondeActivos11219F = ControladorBanco1219::ctrAdquisiciondeActivos1F($item, $valor);
                                    $adquisiciondeActivos10840 = ControladorBanco0840::ctrAdquisiciondeActivos1($item, $valor);
                                    $adquisiciondeActivos10840F = ControladorBanco0840::ctrAdquisiciondeActivos1F($item, $valor);
                                    $adquisiciondeActivos11340 = ControladorBanco1340::ctrAdquisiciondeActivos1($item, $valor);
                                    $adquisiciondeActivos11340F = ControladorBanco1340::ctrAdquisiciondeActivos1F($item, $valor);

                                    foreach ($adquisiciondeActivos16278 as $value) {
                                      foreach ($adquisiciondeActivos16278F as $value2) {
                                        foreach ($adquisiciondeActivos13450 as $value3) {
                                          foreach ($adquisiciondeActivos11340F as $value4) {
                                            foreach ($adquisiciondeActivos10198 as $value5) {
                                              foreach ($adquisiciondeActivos10198F as $value6) {
                                                foreach ($adquisiciondeActivos1Caja as $value7) {
                                                  foreach ($adquisiciondeActivos1CajaF as $value8) {
                                                    foreach ($adquisiciondeActivos11286 as $value9) {
                                                      foreach ($adquisiciondeActivos11286F as $value10) {
                                                        foreach ($adquisiciondeActivos11219 as $value11) {
                                                          foreach ($adquisiciondeActivos11219F as $value12) {
                                                            foreach ($adquisiciondeActivos10840 as $value13) {
                                                              foreach ($adquisiciondeActivos10840F as $value14) {
                                                                foreach ($adquisiciondeActivos11340 as $value15) {
                                                                  foreach ($adquisiciondeActivos11340F as $value16) {

                                                                    $adquisiciondeActivos1N6278 = $value["egresos"];
                                                                    $adquisiciondeActivos1N6278F = $value2["egresos"];
                                                                    $adquisiciondeActivos1N3450 = $value3["egresos"];
                                                                    $adquisiciondeActivos1N3450F = $value4["egresos"];
                                                                    $adquisiciondeActivos1N0198 = $value5["egresos"];
                                                                    $adquisiciondeActivos1N0198F = $value6["egresos"];
                                                                    $adquisiciondeActivos1NCaja = $value7["egresos"];
                                                                    $adquisiciondeActivos1NCajaF = $value8["egresos"];
                                                                    $adquisiciondeActivos1N1286 = $value9["egresos"];
                                                                    $adquisiciondeActivos1N1286F = $value10["egresos"];
                                                                    $adquisiciondeActivos1N1219 = $value11["egresos"];
                                                                    $adquisiciondeActivos1N1219F = $value12["egresos"];
                                                                    $adquisiciondeActivos1N0840 = $value13["egresos"];
                                                                    $adquisiciondeActivos1N0840F = $value14["egresos"];
                                                                    $adquisiciondeActivos1N1340 = $value15["egresos"];
                                                                    $adquisiciondeActivos1N1340F = $value16["egresos"];

                                                                    $adquisiciondeActivos1Total = $adquisiciondeActivos1N6278 + $adquisiciondeActivos1N3450 + $adquisiciondeActivos1N0198 + $adquisiciondeActivos1NCaja + $adquisiciondeActivos1N1286 + $adquisiciondeActivos1N1219 + $adquisiciondeActivos1N0840 + $adquisiciondeActivos1N1340;
                                                                    $adquisiciondeActivos1TotalF = $adquisiciondeActivos1N6278F + $adquisiciondeActivos1N3450F + $adquisiciondeActivos1N0198F + $adquisiciondeActivos1NCajaF + $adquisiciondeActivos1N1286F + $adquisiciondeActivos1N1219F + $adquisiciondeActivos1N0840F + $adquisiciondeActivos1N1340F;
                                                                    $importesAdquisiciondeActivos1 = $adquisiciondeActivos1Total + $adquisiciondeActivos1TotalF;
                                                                    echo '<td>$'.number_format($adquisiciondeActivos1Total,2).'</td>';
                                                                    echo '<td>$'.number_format($adquisiciondeActivos1TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesAdquisiciondeActivos1,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>02. Adquisición de Activos (Equipo Transporte)</td>
                                       <?php
                                      $item = null;
                                      $valor = null;

                                      $adquisiciondeActivos26278 = ControladorBanco6278::ctrAdquisiciondeActivos2($item, $valor);
                                      $adquisiciondeActivos26278F = ControladorBanco6278::ctrAdquisiciondeActivos2F($item, $valor);
                                      $adquisiciondeActivos23450 = ControladorBanco3450::ctrAdquisiciondeActivos2($item, $valor);
                                      $adquisiciondeActivos23450F = ControladorBanco3450::ctrAdquisiciondeActivos2F($item, $valor);
                                      $adquisiciondeActivos20198 = ControladorBanco0198::ctrAdquisiciondeActivos2($item, $valor);
                                      $adquisiciondeActivos20198F = ControladorBanco0198::ctrAdquisiciondeActivos2F($item, $valor);
                                      $adquisiciondeActivos2Caja = ControladorCaja::ctrAdquisiciondeActivos2($item, $valor);
                                      $adquisiciondeActivos2CajaF = ControladorCaja::ctrAdquisiciondeActivos2F($item, $valor);
                                      $adquisiciondeActivos21286 = ControladorBanco1286::ctrAdquisiciondeActivos2($item, $valor);
                                      $adquisiciondeActivos21286F = ControladorBanco1286::ctrAdquisiciondeActivos2F($item, $valor);
                                      $adquisiciondeActivos21219 = ControladorBanco1219::ctrAdquisiciondeActivos2($item, $valor);
                                      $adquisiciondeActivos21219F = ControladorBanco1219::ctrAdquisiciondeActivos2F($item, $valor);
                                      $adquisiciondeActivos20840 = ControladorBanco0840::ctrAdquisiciondeActivos2($item, $valor);
                                      $adquisiciondeActivos20840F = ControladorBanco0840::ctrAdquisiciondeActivos2F($item, $valor);
                                      $adquisiciondeActivos21340 = ControladorBanco1340::ctrAdquisiciondeActivos2($item, $valor);
                                      $adquisiciondeActivos21340F = ControladorBanco1340::ctrAdquisiciondeActivos2F($item, $valor);

                                      foreach ($adquisiciondeActivos26278 as $value) {
                                        foreach ($adquisiciondeActivos26278F as $value2) {
                                          foreach ($adquisiciondeActivos23450 as $value3) {
                                            foreach ($adquisiciondeActivos21340F as $value4) {
                                              foreach ($adquisiciondeActivos20198 as $value5) {
                                                foreach ($adquisiciondeActivos20198F as $value6) {
                                                  foreach ($adquisiciondeActivos2Caja as $value7) {
                                                    foreach ($adquisiciondeActivos2CajaF as $value8) {
                                                      foreach ($adquisiciondeActivos21286 as $value9) {
                                                        foreach ($adquisiciondeActivos21286F as $value10) {
                                                          foreach ($adquisiciondeActivos21219 as $value11) {
                                                            foreach ($adquisiciondeActivos21219F as $value12) {
                                                              foreach ($adquisiciondeActivos20840 as $value13) {
                                                                foreach ($adquisiciondeActivos20840F as $value14) {
                                                                  foreach ($adquisiciondeActivos21340 as $value15) {
                                                                    foreach ($adquisiciondeActivos21340F as $value16) {

                                                                      $adquisiciondeActivos2N6278 = $value["egresos"];
                                                                      $adquisiciondeActivos2N6278F = $value2["egresos"];
                                                                      $adquisiciondeActivos2N3450 = $value3["egresos"];
                                                                      $adquisiciondeActivos2N3450F = $value4["egresos"];
                                                                      $adquisiciondeActivos2N0198 = $value5["egresos"];
                                                                      $adquisiciondeActivos2N0198F = $value6["egresos"];
                                                                      $adquisiciondeActivos2NCaja = $value7["egresos"];
                                                                      $adquisiciondeActivos2NCajaF = $value8["egresos"];
                                                                      $adquisiciondeActivos2N1286 = $value9["egresos"];
                                                                      $adquisiciondeActivos2N1286F = $value10["egresos"];
                                                                      $adquisiciondeActivos2N1219 = $value11["egresos"];
                                                                      $adquisiciondeActivos2N1219F = $value12["egresos"];
                                                                      $adquisiciondeActivos2N0840 = $value13["egresos"];
                                                                      $adquisiciondeActivos2N0840F = $value14["egresos"];
                                                                      $adquisiciondeActivos2N1340 = $value15["egresos"];
                                                                      $adquisiciondeActivos2N1340F = $value16["egresos"];

                                                                      $adquisiciondeActivos2Total = $adquisiciondeActivos2N6278 + $adquisiciondeActivos2N3450 + $adquisiciondeActivos2N0198 + $adquisiciondeActivos2NCaja + $adquisiciondeActivos2N1286 + $adquisiciondeActivos2N1219 + $adquisiciondeActivos2N0840 + $adquisiciondeActivos2N1340;
                                                                      $adquisiciondeActivos2TotalF = $adquisiciondeActivos2N6278F + $adquisiciondeActivos2N3450F + $adquisiciondeActivos2N0198F + $adquisiciondeActivos2NCajaF + $adquisiciondeActivos2N1286F + $adquisiciondeActivos2N1219F + $adquisiciondeActivos2N0840F + $adquisiciondeActivos2N1340F;
                                                                      $importesAdquisiciondeActivos2 = $adquisiciondeActivos2Total + $adquisiciondeActivos2TotalF;
                                                                      echo '<td>$'.number_format($adquisiciondeActivos2Total,2).'</td>';
                                                                      echo '<td>$'.number_format($adquisiciondeActivos2TotalF,2).'</td>';
                                                                      echo '<td>$'.number_format($importesAdquisiciondeActivos2,2).'</td>';
                                                                      
                                                                    }
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
          
                                        }
                                        
                                      }
                                                  
                                      ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>02. Adquisición de Activos (Maquinaria y Equipo)</td>
                                     <?php
                                    $item = null;
                                    $valor = null;

                                    $adquisiciondeActivos36278 = ControladorBanco6278::ctrAdquisiciondeActivos3($item, $valor);
                                    $adquisiciondeActivos36278F = ControladorBanco6278::ctrAdquisiciondeActivos3F($item, $valor);
                                    $adquisiciondeActivos33450 = ControladorBanco3450::ctrAdquisiciondeActivos3($item, $valor);
                                    $adquisiciondeActivos33450F = ControladorBanco3450::ctrAdquisiciondeActivos3F($item, $valor);
                                    $adquisiciondeActivos30198 = ControladorBanco0198::ctrAdquisiciondeActivos3($item, $valor);
                                    $adquisiciondeActivos30198F = ControladorBanco0198::ctrAdquisiciondeActivos3F($item, $valor);
                                    $adquisiciondeActivos3Caja = ControladorCaja::ctrAdquisiciondeActivos3($item, $valor);
                                    $adquisiciondeActivos3CajaF = ControladorCaja::ctrAdquisiciondeActivos3F($item, $valor);
                                    $adquisiciondeActivos31286 = ControladorBanco1286::ctrAdquisiciondeActivos3($item, $valor);
                                    $adquisiciondeActivos31286F = ControladorBanco1286::ctrAdquisiciondeActivos3F($item, $valor);
                                    $adquisiciondeActivos31219 = ControladorBanco1219::ctrAdquisiciondeActivos3($item, $valor);
                                    $adquisiciondeActivos31219F = ControladorBanco1219::ctrAdquisiciondeActivos3F($item, $valor);
                                    $adquisiciondeActivos30840 = ControladorBanco0840::ctrAdquisiciondeActivos3($item, $valor);
                                    $adquisiciondeActivos30840F = ControladorBanco0840::ctrAdquisiciondeActivos3F($item, $valor);
                                    $adquisiciondeActivos31340 = ControladorBanco1340::ctrAdquisiciondeActivos3($item, $valor);
                                    $adquisiciondeActivos31340F = ControladorBanco1340::ctrAdquisiciondeActivos3F($item, $valor);

                                    foreach ($adquisiciondeActivos36278 as $value) {
                                      foreach ($adquisiciondeActivos36278F as $value2) {
                                        foreach ($adquisiciondeActivos33450 as $value3) {
                                          foreach ($adquisiciondeActivos31340F as $value4) {
                                            foreach ($adquisiciondeActivos30198 as $value5) {
                                              foreach ($adquisiciondeActivos30198F as $value6) {
                                                foreach ($adquisiciondeActivos3Caja as $value7) {
                                                  foreach ($adquisiciondeActivos3CajaF as $value8) {
                                                    foreach ($adquisiciondeActivos31286 as $value9) {
                                                      foreach ($adquisiciondeActivos31286F as $value10) {
                                                        foreach ($adquisiciondeActivos31219 as $value11) {
                                                          foreach ($adquisiciondeActivos31219F as $value12) {
                                                            foreach ($adquisiciondeActivos30840 as $value13) {
                                                              foreach ($adquisiciondeActivos30840F as $value14) {
                                                                foreach ($adquisiciondeActivos31340 as $value15) {
                                                                  foreach ($adquisiciondeActivos31340F as $value16) {

                                                                    $adquisiciondeActivos3N6278 = $value["egresos"];
                                                                    $adquisiciondeActivos3N6278F = $value2["egresos"];
                                                                    $adquisiciondeActivos3N3450 = $value3["egresos"];
                                                                    $adquisiciondeActivos3N3450F = $value4["egresos"];
                                                                    $adquisiciondeActivos3N0198 = $value5["egresos"];
                                                                    $adquisiciondeActivos3N0198F = $value6["egresos"];
                                                                    $adquisiciondeActivos3NCaja = $value7["egresos"];
                                                                    $adquisiciondeActivos3NCajaF = $value8["egresos"];
                                                                    $adquisiciondeActivos3N1286 = $value9["egresos"];
                                                                    $adquisiciondeActivos3N1286F = $value10["egresos"];
                                                                    $adquisiciondeActivos3N1219 = $value11["egresos"];
                                                                    $adquisiciondeActivos3N1219F = $value12["egresos"];
                                                                    $adquisiciondeActivos3N0840 = $value13["egresos"];
                                                                    $adquisiciondeActivos3N0840F = $value14["egresos"];
                                                                    $adquisiciondeActivos3N1340 = $value15["egresos"];
                                                                    $adquisiciondeActivos3N1340F = $value16["egresos"];

                                                                    $adquisiciondeActivos3Total = $adquisiciondeActivos3N6278 + $adquisiciondeActivos3N3450 + $adquisiciondeActivos3N0198 + $adquisiciondeActivos3NCaja + $adquisiciondeActivos3N1286 + $adquisiciondeActivos3N1219 + $adquisiciondeActivos3N0840 + $adquisiciondeActivos3N1340;
                                                                    $adquisiciondeActivos3TotalF = $adquisiciondeActivos3N6278F + $adquisiciondeActivos3N3450F + $adquisiciondeActivos3N0198F + $adquisiciondeActivos3NCajaF + $adquisiciondeActivos3N1286F + $adquisiciondeActivos3N1219F + $adquisiciondeActivos3N0840F + $adquisiciondeActivos3N1340F;
                                                                    $importesAdquisiciondeActivos3 = $adquisiciondeActivos3Total + $adquisiciondeActivos3TotalF;
                                                                    echo '<td>$'.number_format($adquisiciondeActivos3Total,2).'</td>';
                                                                    echo '<td>$'.number_format($adquisiciondeActivos3TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesAdquisiciondeActivos3,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>02. Adquisición de Activos (Mobiliario y Equipo Oficina)</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $adquisiciondeActivos46278 = ControladorBanco6278::ctrAdquisiciondeActivos4($item, $valor);
                                    $adquisiciondeActivos46278F = ControladorBanco6278::ctrAdquisiciondeActivos4F($item, $valor);
                                    $adquisiciondeActivos43450 = ControladorBanco3450::ctrAdquisiciondeActivos4($item, $valor);
                                    $adquisiciondeActivos43450F = ControladorBanco3450::ctrAdquisiciondeActivos4F($item, $valor);
                                    $adquisiciondeActivos40198 = ControladorBanco0198::ctrAdquisiciondeActivos4($item, $valor);
                                    $adquisiciondeActivos40198F = ControladorBanco0198::ctrAdquisiciondeActivos4F($item, $valor);
                                    $adquisiciondeActivos4Caja = ControladorCaja::ctrAdquisiciondeActivos4($item, $valor);
                                    $adquisiciondeActivos4CajaF = ControladorCaja::ctrAdquisiciondeActivos4F($item, $valor);
                                    $adquisiciondeActivos41286 = ControladorBanco1286::ctrAdquisiciondeActivos4($item, $valor);
                                    $adquisiciondeActivos41286F = ControladorBanco1286::ctrAdquisiciondeActivos4F($item, $valor);
                                    $adquisiciondeActivos41219 = ControladorBanco1219::ctrAdquisiciondeActivos4($item, $valor);
                                    $adquisiciondeActivos41219F = ControladorBanco1219::ctrAdquisiciondeActivos4F($item, $valor);
                                    $adquisiciondeActivos40840 = ControladorBanco0840::ctrAdquisiciondeActivos4($item, $valor);
                                    $adquisiciondeActivos40840F = ControladorBanco0840::ctrAdquisiciondeActivos4F($item, $valor);
                                    $adquisiciondeActivos41340 = ControladorBanco1340::ctrAdquisiciondeActivos4($item, $valor);
                                    $adquisiciondeActivos41340F = ControladorBanco1340::ctrAdquisiciondeActivos4F($item, $valor);

                                    foreach ($adquisiciondeActivos46278 as $value) {
                                      foreach ($adquisiciondeActivos46278F as $value2) {
                                        foreach ($adquisiciondeActivos43450 as $value3) {
                                          foreach ($adquisiciondeActivos41340F as $value4) {
                                            foreach ($adquisiciondeActivos40198 as $value5) {
                                              foreach ($adquisiciondeActivos40198F as $value6) {
                                                foreach ($adquisiciondeActivos4Caja as $value7) {
                                                  foreach ($adquisiciondeActivos4CajaF as $value8) {
                                                    foreach ($adquisiciondeActivos41286 as $value9) {
                                                      foreach ($adquisiciondeActivos41286F as $value10) {
                                                        foreach ($adquisiciondeActivos41219 as $value11) {
                                                          foreach ($adquisiciondeActivos41219F as $value12) {
                                                            foreach ($adquisiciondeActivos40840 as $value13) {
                                                              foreach ($adquisiciondeActivos40840F as $value14) {
                                                                foreach ($adquisiciondeActivos41340 as $value15) {
                                                                  foreach ($adquisiciondeActivos41340F as $value16) {

                                                                    $adquisiciondeActivos4N6278 = $value["egresos"];
                                                                    $adquisiciondeActivos4N6278F = $value2["egresos"];
                                                                    $adquisiciondeActivos4N3450 = $value3["egresos"];
                                                                    $adquisiciondeActivos4N3450F = $value4["egresos"];
                                                                    $adquisiciondeActivos4N0198 = $value5["egresos"];
                                                                    $adquisiciondeActivos4N0198F = $value6["egresos"];
                                                                    $adquisiciondeActivos4NCaja = $value7["egresos"];
                                                                    $adquisiciondeActivos4NCajaF = $value8["egresos"];
                                                                    $adquisiciondeActivos4N1286 = $value9["egresos"];
                                                                    $adquisiciondeActivos4N1286F = $value10["egresos"];
                                                                    $adquisiciondeActivos4N1219 = $value11["egresos"];
                                                                    $adquisiciondeActivos4N1219F = $value12["egresos"];
                                                                    $adquisiciondeActivos4N0840 = $value13["egresos"];
                                                                    $adquisiciondeActivos4N0840F = $value14["egresos"];
                                                                    $adquisiciondeActivos4N1340 = $value15["egresos"];
                                                                    $adquisiciondeActivos4N1340F = $value16["egresos"];

                                                                    $adquisiciondeActivos4Total = $adquisiciondeActivos4N6278 + $adquisiciondeActivos4N3450 + $adquisiciondeActivos4N0198 + $adquisiciondeActivos4NCaja + $adquisiciondeActivos4N1286 + $adquisiciondeActivos4N1219 + $adquisiciondeActivos4N0840 + $adquisiciondeActivos4N1340;
                                                                    $adquisiciondeActivos4TotalF = $adquisiciondeActivos4N6278F + $adquisiciondeActivos4N3450F + $adquisiciondeActivos4N0198F + $adquisiciondeActivos4NCajaF + $adquisiciondeActivos4N1286F + $adquisiciondeActivos4N1219F + $adquisiciondeActivos4N0840F + $adquisiciondeActivos4N1340F;
                                                                    $importesAdquisiciondeActivos4 = $adquisiciondeActivos4Total + $adquisiciondeActivos4TotalF;
                                                                    echo '<td>$'.number_format($adquisiciondeActivos4Total,2).'</td>';
                                                                    echo '<td>$'.number_format($adquisiciondeActivos4TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesAdquisiciondeActivos4,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>03. Gastos Operativos con Retenciones  Desperdicio Industrial</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosConRetenciones16278 = ControladorBanco6278::ctrGastosOperativosConRetenciones1($item, $valor);
                                    $gastosOperativosConRetenciones16278F = ControladorBanco6278::ctrGastosOperativosConRetenciones1F($item, $valor);
                                    $gastosOperativosConRetenciones13450 = ControladorBanco3450::ctrGastosOperativosConRetenciones1($item, $valor);
                                    $gastosOperativosConRetenciones13450F = ControladorBanco3450::ctrGastosOperativosConRetenciones1F($item, $valor);
                                    $gastosOperativosConRetenciones10198 = ControladorBanco0198::ctrGastosOperativosConRetenciones1($item, $valor);
                                    $gastosOperativosConRetenciones10198F = ControladorBanco0198::ctrGastosOperativosConRetenciones1F($item, $valor);
                                    $gastosOperativosConRetenciones1Caja = ControladorCaja::ctrGastosOperativosConRetenciones1($item, $valor);
                                    $gastosOperativosConRetenciones1CajaF = ControladorCaja::ctrGastosOperativosConRetenciones1F($item, $valor);
                                    $gastosOperativosConRetenciones11286 = ControladorBanco1286::ctrGastosOperativosConRetenciones1($item, $valor);
                                    $gastosOperativosConRetenciones11286F = ControladorBanco1286::ctrGastosOperativosConRetenciones1F($item, $valor);
                                    $gastosOperativosConRetenciones11219 = ControladorBanco1219::ctrGastosOperativosConRetenciones1($item, $valor);
                                    $gastosOperativosConRetenciones11219F = ControladorBanco1219::ctrGastosOperativosConRetenciones1F($item, $valor);
                                    $gastosOperativosConRetenciones10840 = ControladorBanco0840::ctrGastosOperativosConRetenciones1($item, $valor);
                                    $gastosOperativosConRetenciones10840F = ControladorBanco0840::ctrGastosOperativosConRetenciones1F($item, $valor);
                                    $gastosOperativosConRetenciones11340 = ControladorBanco1340::ctrGastosOperativosConRetenciones1($item, $valor);
                                    $gastosOperativosConRetenciones11340F = ControladorBanco1340::ctrGastosOperativosConRetenciones1F($item, $valor);

                                    foreach ($gastosOperativosConRetenciones16278 as $value) {
                                      foreach ($gastosOperativosConRetenciones16278F as $value2) {
                                        foreach ($gastosOperativosConRetenciones13450 as $value3) {
                                          foreach ($gastosOperativosConRetenciones11340F as $value4) {
                                            foreach ($gastosOperativosConRetenciones10198 as $value5) {
                                              foreach ($gastosOperativosConRetenciones10198F as $value6) {
                                                foreach ($gastosOperativosConRetenciones1Caja as $value7) {
                                                  foreach ($gastosOperativosConRetenciones1CajaF as $value8) {
                                                    foreach ($gastosOperativosConRetenciones11286 as $value9) {
                                                      foreach ($gastosOperativosConRetenciones11286F as $value10) {
                                                        foreach ($gastosOperativosConRetenciones11219 as $value11) {
                                                          foreach ($gastosOperativosConRetenciones11219F as $value12) {
                                                            foreach ($gastosOperativosConRetenciones10840 as $value13) {
                                                              foreach ($gastosOperativosConRetenciones10840F as $value14) {
                                                                foreach ($gastosOperativosConRetenciones11340 as $value15) {
                                                                  foreach ($gastosOperativosConRetenciones11340F as $value16) {

                                                                    $gastosOperativosConRetenciones1N6278 = $value["egresos"];
                                                                    $gastosOperativosConRetenciones1N6278F = $value2["egresos"];
                                                                    $gastosOperativosConRetenciones1N3450 = $value3["egresos"];
                                                                    $gastosOperativosConRetenciones1N3450F = $value4["egresos"];
                                                                    $gastosOperativosConRetenciones1N0198 = $value5["egresos"];
                                                                    $gastosOperativosConRetenciones1N0198F = $value6["egresos"];
                                                                    $gastosOperativosConRetenciones1NCaja = $value7["egresos"];
                                                                    $gastosOperativosConRetenciones1NCajaF = $value8["egresos"];
                                                                    $gastosOperativosConRetenciones1N1286 = $value9["egresos"];
                                                                    $gastosOperativosConRetenciones1N1286F = $value10["egresos"];
                                                                    $gastosOperativosConRetenciones1N1219 = $value11["egresos"];
                                                                    $gastosOperativosConRetenciones1N1219F = $value12["egresos"];
                                                                    $gastosOperativosConRetenciones1N0840 = $value13["egresos"];
                                                                    $gastosOperativosConRetenciones1N0840F = $value14["egresos"];
                                                                    $gastosOperativosConRetenciones1N1340 = $value15["egresos"];
                                                                    $gastosOperativosConRetenciones1N1340F = $value16["egresos"];

                                                                    $gastosOperativosConRetenciones1Total = $gastosOperativosConRetenciones1N6278 + $gastosOperativosConRetenciones1N3450 + $gastosOperativosConRetenciones1N0198 + $gastosOperativosConRetenciones1NCaja + $gastosOperativosConRetenciones1N1286 + $gastosOperativosConRetenciones1N1219 + $gastosOperativosConRetenciones1N0840 + $gastosOperativosConRetenciones1N1340;
                                                                    $gastosOperativosConRetenciones1TotalF = $gastosOperativosConRetenciones1N6278F + $gastosOperativosConRetenciones1N3450F + $gastosOperativosConRetenciones1N0198F + $gastosOperativosConRetenciones1NCajaF + $gastosOperativosConRetenciones1N1286F + $gastosOperativosConRetenciones1N1219F + $gastosOperativosConRetenciones1N0840F + $gastosOperativosConRetenciones1N1340F;
                                                                    $importesGastosOperativosConRetenciones1 = $gastosOperativosConRetenciones1Total + $gastosOperativosConRetenciones1TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosConRetenciones1Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosConRetenciones1TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosConRetenciones1,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>03. Gastos Operativos con Retenciones  Fletes y Acarreos</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosConRetenciones26278 = ControladorBanco6278::ctrGastosOperativosConRetenciones2($item, $valor);
                                    $gastosOperativosConRetenciones26278F = ControladorBanco6278::ctrGastosOperativosConRetenciones2F($item, $valor);
                                    $gastosOperativosConRetenciones23450 = ControladorBanco3450::ctrGastosOperativosConRetenciones2($item, $valor);
                                    $gastosOperativosConRetenciones23450F = ControladorBanco3450::ctrGastosOperativosConRetenciones2F($item, $valor);
                                    $gastosOperativosConRetenciones20198 = ControladorBanco0198::ctrGastosOperativosConRetenciones2($item, $valor);
                                    $gastosOperativosConRetenciones20198F = ControladorBanco0198::ctrGastosOperativosConRetenciones2F($item, $valor);
                                    $gastosOperativosConRetenciones2Caja = ControladorCaja::ctrGastosOperativosConRetenciones2($item, $valor);
                                    $gastosOperativosConRetenciones2CajaF = ControladorCaja::ctrGastosOperativosConRetenciones2F($item, $valor);
                                    $gastosOperativosConRetenciones21286 = ControladorBanco1286::ctrGastosOperativosConRetenciones2($item, $valor);
                                    $gastosOperativosConRetenciones21286F = ControladorBanco1286::ctrGastosOperativosConRetenciones2F($item, $valor);
                                    $gastosOperativosConRetenciones21219 = ControladorBanco1219::ctrGastosOperativosConRetenciones2($item, $valor);
                                    $gastosOperativosConRetenciones21219F = ControladorBanco1219::ctrGastosOperativosConRetenciones2F($item, $valor);
                                    $gastosOperativosConRetenciones20840 = ControladorBanco0840::ctrGastosOperativosConRetenciones2($item, $valor);
                                    $gastosOperativosConRetenciones20840F = ControladorBanco0840::ctrGastosOperativosConRetenciones2F($item, $valor);
                                    $gastosOperativosConRetenciones21340 = ControladorBanco1340::ctrGastosOperativosConRetenciones2($item, $valor);
                                    $gastosOperativosConRetenciones21340F = ControladorBanco1340::ctrGastosOperativosConRetenciones2F($item, $valor);

                                    foreach ($gastosOperativosConRetenciones26278 as $value) {
                                      foreach ($gastosOperativosConRetenciones26278F as $value2) {
                                        foreach ($gastosOperativosConRetenciones23450 as $value3) {
                                          foreach ($gastosOperativosConRetenciones21340F as $value4) {
                                            foreach ($gastosOperativosConRetenciones20198 as $value5) {
                                              foreach ($gastosOperativosConRetenciones20198F as $value6) {
                                                foreach ($gastosOperativosConRetenciones2Caja as $value7) {
                                                  foreach ($gastosOperativosConRetenciones2CajaF as $value8) {
                                                    foreach ($gastosOperativosConRetenciones21286 as $value9) {
                                                      foreach ($gastosOperativosConRetenciones21286F as $value10) {
                                                        foreach ($gastosOperativosConRetenciones21219 as $value11) {
                                                          foreach ($gastosOperativosConRetenciones21219F as $value12) {
                                                            foreach ($gastosOperativosConRetenciones20840 as $value13) {
                                                              foreach ($gastosOperativosConRetenciones20840F as $value14) {
                                                                foreach ($gastosOperativosConRetenciones21340 as $value15) {
                                                                  foreach ($gastosOperativosConRetenciones21340F as $value16) {

                                                                    $gastosOperativosConRetenciones2N6278 = $value["egresos"];
                                                                    $gastosOperativosConRetenciones2N6278F = $value2["egresos"];
                                                                    $gastosOperativosConRetenciones2N3450 = $value3["egresos"];
                                                                    $gastosOperativosConRetenciones2N3450F = $value4["egresos"];
                                                                    $gastosOperativosConRetenciones2N0198 = $value5["egresos"];
                                                                    $gastosOperativosConRetenciones2N0198F = $value6["egresos"];
                                                                    $gastosOperativosConRetenciones2NCaja = $value7["egresos"];
                                                                    $gastosOperativosConRetenciones2NCajaF = $value8["egresos"];
                                                                    $gastosOperativosConRetenciones2N1286 = $value9["egresos"];
                                                                    $gastosOperativosConRetenciones2N1286F = $value10["egresos"];
                                                                    $gastosOperativosConRetenciones2N1219 = $value11["egresos"];
                                                                    $gastosOperativosConRetenciones2N1219F = $value12["egresos"];
                                                                    $gastosOperativosConRetenciones2N0840 = $value13["egresos"];
                                                                    $gastosOperativosConRetenciones2N0840F = $value14["egresos"];
                                                                    $gastosOperativosConRetenciones2N1340 = $value15["egresos"];
                                                                    $gastosOperativosConRetenciones2N1340F = $value16["egresos"];

                                                                    $gastosOperativosConRetenciones2Total = $gastosOperativosConRetenciones2N6278 + $gastosOperativosConRetenciones2N3450 + $gastosOperativosConRetenciones2N0198 + $gastosOperativosConRetenciones2NCaja + $gastosOperativosConRetenciones2N1286 + $gastosOperativosConRetenciones2N1219 + $gastosOperativosConRetenciones2N0840 + $gastosOperativosConRetenciones2N1340;
                                                                    $gastosOperativosConRetenciones2TotalF = $gastosOperativosConRetenciones2N6278F + $gastosOperativosConRetenciones2N3450F + $gastosOperativosConRetenciones2N0198F + $gastosOperativosConRetenciones2NCajaF + $gastosOperativosConRetenciones2N1286F + $gastosOperativosConRetenciones2N1219F + $gastosOperativosConRetenciones2N0840F + $gastosOperativosConRetenciones2N1340F;
                                                                    $importesGastosOperativosConRetenciones2 = $gastosOperativosConRetenciones2Total + $gastosOperativosConRetenciones2TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosConRetenciones2Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosConRetenciones2TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosConRetenciones2,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>03. Gastos Operativos con Retenciones  Honorarios Personas Fisicas</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosConRetenciones36278 = ControladorBanco6278::ctrGastosOperativosConRetenciones3($item, $valor);
                                    $gastosOperativosConRetenciones36278F = ControladorBanco6278::ctrGastosOperativosConRetenciones3F($item, $valor);
                                    $gastosOperativosConRetenciones33450 = ControladorBanco3450::ctrGastosOperativosConRetenciones3($item, $valor);
                                    $gastosOperativosConRetenciones33450F = ControladorBanco3450::ctrGastosOperativosConRetenciones3F($item, $valor);
                                    $gastosOperativosConRetenciones30198 = ControladorBanco0198::ctrGastosOperativosConRetenciones3($item, $valor);
                                    $gastosOperativosConRetenciones30198F = ControladorBanco0198::ctrGastosOperativosConRetenciones3F($item, $valor);
                                    $gastosOperativosConRetenciones3Caja = ControladorCaja::ctrGastosOperativosConRetenciones3($item, $valor);
                                    $gastosOperativosConRetenciones3CajaF = ControladorCaja::ctrGastosOperativosConRetenciones3F($item, $valor);
                                    $gastosOperativosConRetenciones31286 = ControladorBanco1286::ctrGastosOperativosConRetenciones3($item, $valor);
                                    $gastosOperativosConRetenciones31286F = ControladorBanco1286::ctrGastosOperativosConRetenciones3F($item, $valor);
                                    $gastosOperativosConRetenciones31219 = ControladorBanco1219::ctrGastosOperativosConRetenciones3($item, $valor);
                                    $gastosOperativosConRetenciones31219F = ControladorBanco1219::ctrGastosOperativosConRetenciones3F($item, $valor);
                                    $gastosOperativosConRetenciones30840 = ControladorBanco0840::ctrGastosOperativosConRetenciones3($item, $valor);
                                    $gastosOperativosConRetenciones30840F = ControladorBanco0840::ctrGastosOperativosConRetenciones3F($item, $valor);
                                    $gastosOperativosConRetenciones31340 = ControladorBanco1340::ctrGastosOperativosConRetenciones3($item, $valor);
                                    $gastosOperativosConRetenciones31340F = ControladorBanco1340::ctrGastosOperativosConRetenciones3F($item, $valor);

                                    foreach ($gastosOperativosConRetenciones36278 as $value) {
                                      foreach ($gastosOperativosConRetenciones36278F as $value2) {
                                        foreach ($gastosOperativosConRetenciones33450 as $value3) {
                                          foreach ($gastosOperativosConRetenciones31340F as $value4) {
                                            foreach ($gastosOperativosConRetenciones30198 as $value5) {
                                              foreach ($gastosOperativosConRetenciones30198F as $value6) {
                                                foreach ($gastosOperativosConRetenciones3Caja as $value7) {
                                                  foreach ($gastosOperativosConRetenciones3CajaF as $value8) {
                                                    foreach ($gastosOperativosConRetenciones31286 as $value9) {
                                                      foreach ($gastosOperativosConRetenciones31286F as $value10) {
                                                        foreach ($gastosOperativosConRetenciones31219 as $value11) {
                                                          foreach ($gastosOperativosConRetenciones31219F as $value12) {
                                                            foreach ($gastosOperativosConRetenciones30840 as $value13) {
                                                              foreach ($gastosOperativosConRetenciones30840F as $value14) {
                                                                foreach ($gastosOperativosConRetenciones31340 as $value15) {
                                                                  foreach ($gastosOperativosConRetenciones31340F as $value16) {

                                                                    $gastosOperativosConRetenciones3N6278 = $value["egresos"];
                                                                    $gastosOperativosConRetenciones3N6278F = $value2["egresos"];
                                                                    $gastosOperativosConRetenciones3N3450 = $value3["egresos"];
                                                                    $gastosOperativosConRetenciones3N3450F = $value4["egresos"];
                                                                    $gastosOperativosConRetenciones3N0198 = $value5["egresos"];
                                                                    $gastosOperativosConRetenciones3N0198F = $value6["egresos"];
                                                                    $gastosOperativosConRetenciones3NCaja = $value7["egresos"];
                                                                    $gastosOperativosConRetenciones3NCajaF = $value8["egresos"];
                                                                    $gastosOperativosConRetenciones3N1286 = $value9["egresos"];
                                                                    $gastosOperativosConRetenciones3N1286F = $value10["egresos"];
                                                                    $gastosOperativosConRetenciones3N1219 = $value11["egresos"];
                                                                    $gastosOperativosConRetenciones3N1219F = $value12["egresos"];
                                                                    $gastosOperativosConRetenciones3N0840 = $value13["egresos"];
                                                                    $gastosOperativosConRetenciones3N0840F = $value14["egresos"];
                                                                    $gastosOperativosConRetenciones3N1340 = $value15["egresos"];
                                                                    $gastosOperativosConRetenciones3N1340F = $value16["egresos"];

                                                                    $gastosOperativosConRetenciones3Total = $gastosOperativosConRetenciones3N6278 + $gastosOperativosConRetenciones3N3450 + $gastosOperativosConRetenciones3N0198 + $gastosOperativosConRetenciones3NCaja + $gastosOperativosConRetenciones3N1286 + $gastosOperativosConRetenciones3N1219 + $gastosOperativosConRetenciones3N0840 + $gastosOperativosConRetenciones3N1340;
                                                                    $gastosOperativosConRetenciones3TotalF = $gastosOperativosConRetenciones3N6278F + $gastosOperativosConRetenciones3N3450F + $gastosOperativosConRetenciones3N0198F + $gastosOperativosConRetenciones3NCajaF + $gastosOperativosConRetenciones3N1286F + $gastosOperativosConRetenciones3N1219F + $gastosOperativosConRetenciones3N0840F + $gastosOperativosConRetenciones3N1340F;
                                                                    $importesGastosOperativosConRetenciones3 = $gastosOperativosConRetenciones3Total + $gastosOperativosConRetenciones3TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosConRetenciones3Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosConRetenciones3TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosConRetenciones3,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>03. Gastos Operativos con Retenciones  Renta Local Persona Fisica</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosConRetenciones46278 = ControladorBanco6278::ctrGastosOperativosConRetenciones4($item, $valor);
                                    $gastosOperativosConRetenciones46278F = ControladorBanco6278::ctrGastosOperativosConRetenciones4F($item, $valor);
                                    $gastosOperativosConRetenciones43450 = ControladorBanco3450::ctrGastosOperativosConRetenciones4($item, $valor);
                                    $gastosOperativosConRetenciones43450F = ControladorBanco3450::ctrGastosOperativosConRetenciones4F($item, $valor);
                                    $gastosOperativosConRetenciones40198 = ControladorBanco0198::ctrGastosOperativosConRetenciones4($item, $valor);
                                    $gastosOperativosConRetenciones40198F = ControladorBanco0198::ctrGastosOperativosConRetenciones4F($item, $valor);
                                    $gastosOperativosConRetenciones4Caja = ControladorCaja::ctrGastosOperativosConRetenciones4($item, $valor);
                                    $gastosOperativosConRetenciones4CajaF = ControladorCaja::ctrGastosOperativosConRetenciones4F($item, $valor);
                                    $gastosOperativosConRetenciones41286 = ControladorBanco1286::ctrGastosOperativosConRetenciones4($item, $valor);
                                    $gastosOperativosConRetenciones41286F = ControladorBanco1286::ctrGastosOperativosConRetenciones4F($item, $valor);
                                    $gastosOperativosConRetenciones41219 = ControladorBanco1219::ctrGastosOperativosConRetenciones4($item, $valor);
                                    $gastosOperativosConRetenciones41219F = ControladorBanco1219::ctrGastosOperativosConRetenciones4F($item, $valor);
                                    $gastosOperativosConRetenciones40840 = ControladorBanco0840::ctrGastosOperativosConRetenciones4($item, $valor);
                                    $gastosOperativosConRetenciones40840F = ControladorBanco0840::ctrGastosOperativosConRetenciones4F($item, $valor);
                                    $gastosOperativosConRetenciones41340 = ControladorBanco1340::ctrGastosOperativosConRetenciones4($item, $valor);
                                    $gastosOperativosConRetenciones41340F = ControladorBanco1340::ctrGastosOperativosConRetenciones4F($item, $valor);

                                    foreach ($gastosOperativosConRetenciones46278 as $value) {
                                      foreach ($gastosOperativosConRetenciones46278F as $value2) {
                                        foreach ($gastosOperativosConRetenciones43450 as $value3) {
                                          foreach ($gastosOperativosConRetenciones41340F as $value4) {
                                            foreach ($gastosOperativosConRetenciones40198 as $value5) {
                                              foreach ($gastosOperativosConRetenciones40198F as $value6) {
                                                foreach ($gastosOperativosConRetenciones4Caja as $value7) {
                                                  foreach ($gastosOperativosConRetenciones4CajaF as $value8) {
                                                    foreach ($gastosOperativosConRetenciones41286 as $value9) {
                                                      foreach ($gastosOperativosConRetenciones41286F as $value10) {
                                                        foreach ($gastosOperativosConRetenciones41219 as $value11) {
                                                          foreach ($gastosOperativosConRetenciones41219F as $value12) {
                                                            foreach ($gastosOperativosConRetenciones40840 as $value13) {
                                                              foreach ($gastosOperativosConRetenciones40840F as $value14) {
                                                                foreach ($gastosOperativosConRetenciones41340 as $value15) {
                                                                  foreach ($gastosOperativosConRetenciones41340F as $value16) {

                                                                    $gastosOperativosConRetenciones4N6278 = $value["egresos"];
                                                                    $gastosOperativosConRetenciones4N6278F = $value2["egresos"];
                                                                    $gastosOperativosConRetenciones4N3450 = $value3["egresos"];
                                                                    $gastosOperativosConRetenciones4N3450F = $value4["egresos"];
                                                                    $gastosOperativosConRetenciones4N0198 = $value5["egresos"];
                                                                    $gastosOperativosConRetenciones4N0198F = $value6["egresos"];
                                                                    $gastosOperativosConRetenciones4NCaja = $value7["egresos"];
                                                                    $gastosOperativosConRetenciones4NCajaF = $value8["egresos"];
                                                                    $gastosOperativosConRetenciones4N1286 = $value9["egresos"];
                                                                    $gastosOperativosConRetenciones4N1286F = $value10["egresos"];
                                                                    $gastosOperativosConRetenciones4N1219 = $value11["egresos"];
                                                                    $gastosOperativosConRetenciones4N1219F = $value12["egresos"];
                                                                    $gastosOperativosConRetenciones4N0840 = $value13["egresos"];
                                                                    $gastosOperativosConRetenciones4N0840F = $value14["egresos"];
                                                                    $gastosOperativosConRetenciones4N1340 = $value15["egresos"];
                                                                    $gastosOperativosConRetenciones4N1340F = $value16["egresos"];

                                                                    $gastosOperativosConRetenciones4Total = $gastosOperativosConRetenciones4N6278 + $gastosOperativosConRetenciones4N3450 + $gastosOperativosConRetenciones4N0198 + $gastosOperativosConRetenciones4NCaja + $gastosOperativosConRetenciones4N1286 + $gastosOperativosConRetenciones4N1219 + $gastosOperativosConRetenciones4N0840 + $gastosOperativosConRetenciones4N1340;
                                                                    $gastosOperativosConRetenciones4TotalF = $gastosOperativosConRetenciones4N6278F + $gastosOperativosConRetenciones4N3450F + $gastosOperativosConRetenciones4N0198F + $gastosOperativosConRetenciones4NCajaF + $gastosOperativosConRetenciones4N1286F + $gastosOperativosConRetenciones4N1219F + $gastosOperativosConRetenciones4N0840F + $gastosOperativosConRetenciones4N1340F;
                                                                    $importesGastosOperativosConRetenciones4 = $gastosOperativosConRetenciones4Total + $gastosOperativosConRetenciones4TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosConRetenciones4Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosConRetenciones4TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosConRetenciones4,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>03. Gastos Operativos con Retenciones  Renta Local Persona Moral</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosConRetenciones56278 = ControladorBanco6278::ctrGastosOperativosConRetenciones5($item, $valor);
                                    $gastosOperativosConRetenciones56278F = ControladorBanco6278::ctrGastosOperativosConRetenciones5F($item, $valor);
                                    $gastosOperativosConRetenciones53450 = ControladorBanco3450::ctrGastosOperativosConRetenciones5($item, $valor);
                                    $gastosOperativosConRetenciones53450F = ControladorBanco3450::ctrGastosOperativosConRetenciones5F($item, $valor);
                                    $gastosOperativosConRetenciones50198 = ControladorBanco0198::ctrGastosOperativosConRetenciones5($item, $valor);
                                    $gastosOperativosConRetenciones50198F = ControladorBanco0198::ctrGastosOperativosConRetenciones5F($item, $valor);
                                    $gastosOperativosConRetenciones5Caja = ControladorCaja::ctrGastosOperativosConRetenciones5($item, $valor);
                                    $gastosOperativosConRetenciones5CajaF = ControladorCaja::ctrGastosOperativosConRetenciones5F($item, $valor);
                                    $gastosOperativosConRetenciones51286 = ControladorBanco1286::ctrGastosOperativosConRetenciones5($item, $valor);
                                    $gastosOperativosConRetenciones51286F = ControladorBanco1286::ctrGastosOperativosConRetenciones5F($item, $valor);
                                    $gastosOperativosConRetenciones51219 = ControladorBanco1219::ctrGastosOperativosConRetenciones5($item, $valor);
                                    $gastosOperativosConRetenciones51219F = ControladorBanco1219::ctrGastosOperativosConRetenciones5F($item, $valor);
                                    $gastosOperativosConRetenciones50840 = ControladorBanco0840::ctrGastosOperativosConRetenciones5($item, $valor);
                                    $gastosOperativosConRetenciones50840F = ControladorBanco0840::ctrGastosOperativosConRetenciones5F($item, $valor);
                                    $gastosOperativosConRetenciones51340 = ControladorBanco1340::ctrGastosOperativosConRetenciones5($item, $valor);
                                    $gastosOperativosConRetenciones51340F = ControladorBanco1340::ctrGastosOperativosConRetenciones5F($item, $valor);

                                    foreach ($gastosOperativosConRetenciones56278 as $value) {
                                      foreach ($gastosOperativosConRetenciones56278F as $value2) {
                                        foreach ($gastosOperativosConRetenciones53450 as $value3) {
                                          foreach ($gastosOperativosConRetenciones51340F as $value4) {
                                            foreach ($gastosOperativosConRetenciones50198 as $value5) {
                                              foreach ($gastosOperativosConRetenciones50198F as $value6) {
                                                foreach ($gastosOperativosConRetenciones5Caja as $value7) {
                                                  foreach ($gastosOperativosConRetenciones5CajaF as $value8) {
                                                    foreach ($gastosOperativosConRetenciones51286 as $value9) {
                                                      foreach ($gastosOperativosConRetenciones51286F as $value10) {
                                                        foreach ($gastosOperativosConRetenciones51219 as $value11) {
                                                          foreach ($gastosOperativosConRetenciones51219F as $value12) {
                                                            foreach ($gastosOperativosConRetenciones50840 as $value13) {
                                                              foreach ($gastosOperativosConRetenciones50840F as $value14) {
                                                                foreach ($gastosOperativosConRetenciones51340 as $value15) {
                                                                  foreach ($gastosOperativosConRetenciones51340F as $value16) {

                                                                    $gastosOperativosConRetenciones5N6278 = $value["egresos"];
                                                                    $gastosOperativosConRetenciones5N6278F = $value2["egresos"];
                                                                    $gastosOperativosConRetenciones5N3450 = $value3["egresos"];
                                                                    $gastosOperativosConRetenciones5N3450F = $value4["egresos"];
                                                                    $gastosOperativosConRetenciones5N0198 = $value5["egresos"];
                                                                    $gastosOperativosConRetenciones5N0198F = $value6["egresos"];
                                                                    $gastosOperativosConRetenciones5NCaja = $value7["egresos"];
                                                                    $gastosOperativosConRetenciones5NCajaF = $value8["egresos"];
                                                                    $gastosOperativosConRetenciones5N1286 = $value9["egresos"];
                                                                    $gastosOperativosConRetenciones5N1286F = $value10["egresos"];
                                                                    $gastosOperativosConRetenciones5N1219 = $value11["egresos"];
                                                                    $gastosOperativosConRetenciones5N1219F = $value12["egresos"];
                                                                    $gastosOperativosConRetenciones5N0840 = $value13["egresos"];
                                                                    $gastosOperativosConRetenciones5N0840F = $value14["egresos"];
                                                                    $gastosOperativosConRetenciones5N1340 = $value15["egresos"];
                                                                    $gastosOperativosConRetenciones5N1340F = $value16["egresos"];

                                                                    $gastosOperativosConRetenciones5Total = $gastosOperativosConRetenciones5N6278 + $gastosOperativosConRetenciones5N3450 + $gastosOperativosConRetenciones5N0198 + $gastosOperativosConRetenciones5NCaja + $gastosOperativosConRetenciones5N1286 + $gastosOperativosConRetenciones5N1219 + $gastosOperativosConRetenciones5N0840 + $gastosOperativosConRetenciones5N1340;
                                                                    $gastosOperativosConRetenciones5TotalF = $gastosOperativosConRetenciones5N6278F + $gastosOperativosConRetenciones5N3450F + $gastosOperativosConRetenciones5N0198F + $gastosOperativosConRetenciones5NCajaF + $gastosOperativosConRetenciones5N1286F + $gastosOperativosConRetenciones5N1219F + $gastosOperativosConRetenciones5N0840F + $gastosOperativosConRetenciones5N1340F;
                                                                    $importesGastosOperativosConRetenciones5 = $gastosOperativosConRetenciones5Total + $gastosOperativosConRetenciones5TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosConRetenciones5Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosConRetenciones5TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosConRetenciones5,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Administ y Servicio Personal</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados16278 = ControladorBanco6278::ctrGastosOperativosGravados1($item, $valor);
                                    $gastosOperativosGravados16278F = ControladorBanco6278::ctrGastosOperativosGravados1F($item, $valor);
                                    $gastosOperativosGravados13450 = ControladorBanco3450::ctrGastosOperativosGravados1($item, $valor);
                                    $gastosOperativosGravados13450F = ControladorBanco3450::ctrGastosOperativosGravados1F($item, $valor);
                                    $gastosOperativosGravados10198 = ControladorBanco0198::ctrGastosOperativosGravados1($item, $valor);
                                    $gastosOperativosGravados10198F = ControladorBanco0198::ctrGastosOperativosGravados1F($item, $valor);
                                    $gastosOperativosGravados1Caja = ControladorCaja::ctrGastosOperativosGravados1($item, $valor);
                                    $gastosOperativosGravados1CajaF = ControladorCaja::ctrGastosOperativosGravados1F($item, $valor);
                                    $gastosOperativosGravados11286 = ControladorBanco1286::ctrGastosOperativosGravados1($item, $valor);
                                    $gastosOperativosGravados11286F = ControladorBanco1286::ctrGastosOperativosGravados1F($item, $valor);
                                    $gastosOperativosGravados11219 = ControladorBanco1219::ctrGastosOperativosGravados1($item, $valor);
                                    $gastosOperativosGravados11219F = ControladorBanco1219::ctrGastosOperativosGravados1F($item, $valor);
                                    $gastosOperativosGravados10840 = ControladorBanco0840::ctrGastosOperativosGravados1($item, $valor);
                                    $gastosOperativosGravados10840F = ControladorBanco0840::ctrGastosOperativosGravados1F($item, $valor);
                                    $gastosOperativosGravados11340 = ControladorBanco1340::ctrGastosOperativosGravados1($item, $valor);
                                    $gastosOperativosGravados11340F = ControladorBanco1340::ctrGastosOperativosGravados1F($item, $valor);

                                    foreach ($gastosOperativosGravados16278 as $value) {
                                      foreach ($gastosOperativosGravados16278F as $value2) {
                                        foreach ($gastosOperativosGravados13450 as $value3) {
                                          foreach ($gastosOperativosGravados11340F as $value4) {
                                            foreach ($gastosOperativosGravados10198 as $value5) {
                                              foreach ($gastosOperativosGravados10198F as $value6) {
                                                foreach ($gastosOperativosGravados1Caja as $value7) {
                                                  foreach ($gastosOperativosGravados1CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados11286 as $value9) {
                                                      foreach ($gastosOperativosGravados11286F as $value10) {
                                                        foreach ($gastosOperativosGravados11219 as $value11) {
                                                          foreach ($gastosOperativosGravados11219F as $value12) {
                                                            foreach ($gastosOperativosGravados10840 as $value13) {
                                                              foreach ($gastosOperativosGravados10840F as $value14) {
                                                                foreach ($gastosOperativosGravados11340 as $value15) {
                                                                  foreach ($gastosOperativosGravados11340F as $value16) {

                                                                    $gastosOperativosGravados1N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados1N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados1N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados1N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados1N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados1N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados1NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados1NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados1N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados1N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados1N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados1N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados1N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados1N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados1N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados1N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados1Total = $gastosOperativosGravados1N6278 + $gastosOperativosGravados1N3450 + $gastosOperativosGravados1N0198 + $gastosOperativosGravados1NCaja + $gastosOperativosGravados1N1286 + $gastosOperativosGravados1N1219 + $gastosOperativosGravados1N0840 + $gastosOperativosGravados1N1340;
                                                                    $gastosOperativosGravados1TotalF = $gastosOperativosGravados1N6278F + $gastosOperativosGravados1N3450F + $gastosOperativosGravados1N0198F + $gastosOperativosGravados1NCajaF + $gastosOperativosGravados1N1286F + $gastosOperativosGravados1N1219F + $gastosOperativosGravados1N0840F + $gastosOperativosGravados1N1340F;
                                                                    $importesGastosOperativosGravados1 = $gastosOperativosGravados1Total + $gastosOperativosGravados1TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados1Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados1TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados1,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Atencion Clientes-Proveedores</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados26278 = ControladorBanco6278::ctrGastosOperativosGravados2($item, $valor);
                                    $gastosOperativosGravados26278F = ControladorBanco6278::ctrGastosOperativosGravados2F($item, $valor);
                                    $gastosOperativosGravados23450 = ControladorBanco3450::ctrGastosOperativosGravados2($item, $valor);
                                    $gastosOperativosGravados23450F = ControladorBanco3450::ctrGastosOperativosGravados2F($item, $valor);
                                    $gastosOperativosGravados20198 = ControladorBanco0198::ctrGastosOperativosGravados2($item, $valor);
                                    $gastosOperativosGravados20198F = ControladorBanco0198::ctrGastosOperativosGravados2F($item, $valor);
                                    $gastosOperativosGravados2Caja = ControladorCaja::ctrGastosOperativosGravados2($item, $valor);
                                    $gastosOperativosGravados2CajaF = ControladorCaja::ctrGastosOperativosGravados2F($item, $valor);
                                    $gastosOperativosGravados21286 = ControladorBanco1286::ctrGastosOperativosGravados2($item, $valor);
                                    $gastosOperativosGravados21286F = ControladorBanco1286::ctrGastosOperativosGravados2F($item, $valor);
                                    $gastosOperativosGravados21219 = ControladorBanco1219::ctrGastosOperativosGravados2($item, $valor);
                                    $gastosOperativosGravados21219F = ControladorBanco1219::ctrGastosOperativosGravados2F($item, $valor);
                                    $gastosOperativosGravados20840 = ControladorBanco0840::ctrGastosOperativosGravados2($item, $valor);
                                    $gastosOperativosGravados20840F = ControladorBanco0840::ctrGastosOperativosGravados2F($item, $valor);
                                    $gastosOperativosGravados21340 = ControladorBanco1340::ctrGastosOperativosGravados2($item, $valor);
                                    $gastosOperativosGravados21340F = ControladorBanco1340::ctrGastosOperativosGravados2F($item, $valor);

                                    foreach ($gastosOperativosGravados26278 as $value) {
                                      foreach ($gastosOperativosGravados26278F as $value2) {
                                        foreach ($gastosOperativosGravados23450 as $value3) {
                                          foreach ($gastosOperativosGravados21340F as $value4) {
                                            foreach ($gastosOperativosGravados20198 as $value5) {
                                              foreach ($gastosOperativosGravados20198F as $value6) {
                                                foreach ($gastosOperativosGravados2Caja as $value7) {
                                                  foreach ($gastosOperativosGravados2CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados21286 as $value9) {
                                                      foreach ($gastosOperativosGravados21286F as $value10) {
                                                        foreach ($gastosOperativosGravados21219 as $value11) {
                                                          foreach ($gastosOperativosGravados21219F as $value12) {
                                                            foreach ($gastosOperativosGravados20840 as $value13) {
                                                              foreach ($gastosOperativosGravados20840F as $value14) {
                                                                foreach ($gastosOperativosGravados21340 as $value15) {
                                                                  foreach ($gastosOperativosGravados21340F as $value16) {

                                                                    $gastosOperativosGravados2N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados2N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados2N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados2N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados2N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados2N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados2NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados2NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados2N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados2N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados2N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados2N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados2N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados2N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados2N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados2N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados2Total = $gastosOperativosGravados2N6278 + $gastosOperativosGravados2N3450 + $gastosOperativosGravados2N0198 + $gastosOperativosGravados2NCaja + $gastosOperativosGravados2N1286 + $gastosOperativosGravados2N1219 + $gastosOperativosGravados2N0840 + $gastosOperativosGravados2N1340;
                                                                    $gastosOperativosGravados2TotalF = $gastosOperativosGravados2N6278F + $gastosOperativosGravados2N3450F + $gastosOperativosGravados2N0198F + $gastosOperativosGravados2NCajaF + $gastosOperativosGravados2N1286F + $gastosOperativosGravados2N1219F + $gastosOperativosGravados2N0840F + $gastosOperativosGravados2N1340F;
                                                                    $importesGastosOperativosGravados2 = $gastosOperativosGravados2Total + $gastosOperativosGravados2TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados2Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados2TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados2,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Capacitacion al Personal</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados36278 = ControladorBanco6278::ctrGastosOperativosGravados3($item, $valor);
                                    $gastosOperativosGravados36278F = ControladorBanco6278::ctrGastosOperativosGravados3F($item, $valor);
                                    $gastosOperativosGravados33450 = ControladorBanco3450::ctrGastosOperativosGravados3($item, $valor);
                                    $gastosOperativosGravados33450F = ControladorBanco3450::ctrGastosOperativosGravados3F($item, $valor);
                                    $gastosOperativosGravados30198 = ControladorBanco0198::ctrGastosOperativosGravados3($item, $valor);
                                    $gastosOperativosGravados30198F = ControladorBanco0198::ctrGastosOperativosGravados3F($item, $valor);
                                    $gastosOperativosGravados3Caja = ControladorCaja::ctrGastosOperativosGravados3($item, $valor);
                                    $gastosOperativosGravados3CajaF = ControladorCaja::ctrGastosOperativosGravados3F($item, $valor);
                                    $gastosOperativosGravados31286 = ControladorBanco1286::ctrGastosOperativosGravados3($item, $valor);
                                    $gastosOperativosGravados31286F = ControladorBanco1286::ctrGastosOperativosGravados3F($item, $valor);
                                    $gastosOperativosGravados31219 = ControladorBanco1219::ctrGastosOperativosGravados3($item, $valor);
                                    $gastosOperativosGravados31219F = ControladorBanco1219::ctrGastosOperativosGravados3F($item, $valor);
                                    $gastosOperativosGravados30840 = ControladorBanco0840::ctrGastosOperativosGravados3($item, $valor);
                                    $gastosOperativosGravados30840F = ControladorBanco0840::ctrGastosOperativosGravados3F($item, $valor);
                                    $gastosOperativosGravados31340 = ControladorBanco1340::ctrGastosOperativosGravados3($item, $valor);
                                    $gastosOperativosGravados31340F = ControladorBanco1340::ctrGastosOperativosGravados3F($item, $valor);

                                    foreach ($gastosOperativosGravados36278 as $value) {
                                      foreach ($gastosOperativosGravados36278F as $value2) {
                                        foreach ($gastosOperativosGravados33450 as $value3) {
                                          foreach ($gastosOperativosGravados31340F as $value4) {
                                            foreach ($gastosOperativosGravados30198 as $value5) {
                                              foreach ($gastosOperativosGravados30198F as $value6) {
                                                foreach ($gastosOperativosGravados3Caja as $value7) {
                                                  foreach ($gastosOperativosGravados3CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados31286 as $value9) {
                                                      foreach ($gastosOperativosGravados31286F as $value10) {
                                                        foreach ($gastosOperativosGravados31219 as $value11) {
                                                          foreach ($gastosOperativosGravados31219F as $value12) {
                                                            foreach ($gastosOperativosGravados30840 as $value13) {
                                                              foreach ($gastosOperativosGravados30840F as $value14) {
                                                                foreach ($gastosOperativosGravados31340 as $value15) {
                                                                  foreach ($gastosOperativosGravados31340F as $value16) {

                                                                    $gastosOperativosGravados3N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados3N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados3N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados3N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados3N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados3N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados3NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados3NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados3N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados3N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados3N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados3N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados3N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados3N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados3N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados3N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados3Total = $gastosOperativosGravados3N6278 + $gastosOperativosGravados3N3450 + $gastosOperativosGravados3N0198 + $gastosOperativosGravados3NCaja + $gastosOperativosGravados3N1286 + $gastosOperativosGravados3N1219 + $gastosOperativosGravados3N0840 + $gastosOperativosGravados3N1340;
                                                                    $gastosOperativosGravados3TotalF = $gastosOperativosGravados3N6278F + $gastosOperativosGravados3N3450F + $gastosOperativosGravados3N0198F + $gastosOperativosGravados3NCajaF + $gastosOperativosGravados3N1286F + $gastosOperativosGravados3N1219F + $gastosOperativosGravados3N0840F + $gastosOperativosGravados3N1340F;
                                                                    $importesGastosOperativosGravados3 = $gastosOperativosGravados3Total + $gastosOperativosGravados3TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados3Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados3TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados3,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Casetas Autopistas</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados46278 = ControladorBanco6278::ctrGastosOperativosGravados4($item, $valor);
                                    $gastosOperativosGravados46278F = ControladorBanco6278::ctrGastosOperativosGravados4F($item, $valor);
                                    $gastosOperativosGravados43450 = ControladorBanco3450::ctrGastosOperativosGravados4($item, $valor);
                                    $gastosOperativosGravados43450F = ControladorBanco3450::ctrGastosOperativosGravados4F($item, $valor);
                                    $gastosOperativosGravados40198 = ControladorBanco0198::ctrGastosOperativosGravados4($item, $valor);
                                    $gastosOperativosGravados40198F = ControladorBanco0198::ctrGastosOperativosGravados4F($item, $valor);
                                    $gastosOperativosGravados4Caja = ControladorCaja::ctrGastosOperativosGravados4($item, $valor);
                                    $gastosOperativosGravados4CajaF = ControladorCaja::ctrGastosOperativosGravados4F($item, $valor);
                                    $gastosOperativosGravados41286 = ControladorBanco1286::ctrGastosOperativosGravados4($item, $valor);
                                    $gastosOperativosGravados41286F = ControladorBanco1286::ctrGastosOperativosGravados4F($item, $valor);
                                    $gastosOperativosGravados41219 = ControladorBanco1219::ctrGastosOperativosGravados4($item, $valor);
                                    $gastosOperativosGravados41219F = ControladorBanco1219::ctrGastosOperativosGravados4F($item, $valor);
                                    $gastosOperativosGravados40840 = ControladorBanco0840::ctrGastosOperativosGravados4($item, $valor);
                                    $gastosOperativosGravados40840F = ControladorBanco0840::ctrGastosOperativosGravados4F($item, $valor);
                                    $gastosOperativosGravados41340 = ControladorBanco1340::ctrGastosOperativosGravados4($item, $valor);
                                    $gastosOperativosGravados41340F = ControladorBanco1340::ctrGastosOperativosGravados4F($item, $valor);

                                    foreach ($gastosOperativosGravados46278 as $value) {
                                      foreach ($gastosOperativosGravados46278F as $value2) {
                                        foreach ($gastosOperativosGravados43450 as $value3) {
                                          foreach ($gastosOperativosGravados41340F as $value4) {
                                            foreach ($gastosOperativosGravados40198 as $value5) {
                                              foreach ($gastosOperativosGravados40198F as $value6) {
                                                foreach ($gastosOperativosGravados4Caja as $value7) {
                                                  foreach ($gastosOperativosGravados4CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados41286 as $value9) {
                                                      foreach ($gastosOperativosGravados41286F as $value10) {
                                                        foreach ($gastosOperativosGravados41219 as $value11) {
                                                          foreach ($gastosOperativosGravados41219F as $value12) {
                                                            foreach ($gastosOperativosGravados40840 as $value13) {
                                                              foreach ($gastosOperativosGravados40840F as $value14) {
                                                                foreach ($gastosOperativosGravados41340 as $value15) {
                                                                  foreach ($gastosOperativosGravados41340F as $value16) {

                                                                    $gastosOperativosGravados4N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados4N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados4N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados4N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados4N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados4N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados4NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados4NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados4N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados4N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados4N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados4N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados4N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados4N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados4N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados4N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados4Total = $gastosOperativosGravados4N6278 + $gastosOperativosGravados4N3450 + $gastosOperativosGravados4N0198 + $gastosOperativosGravados4NCaja + $gastosOperativosGravados4N1286 + $gastosOperativosGravados4N1219 + $gastosOperativosGravados4N0840 + $gastosOperativosGravados4N1340;
                                                                    $gastosOperativosGravados4TotalF = $gastosOperativosGravados4N6278F + $gastosOperativosGravados4N3450F + $gastosOperativosGravados4N0198F + $gastosOperativosGravados4NCajaF + $gastosOperativosGravados4N1286F + $gastosOperativosGravados4N1219F + $gastosOperativosGravados4N0840F + $gastosOperativosGravados4N1340F;
                                                                    $importesGastosOperativosGravados4 = $gastosOperativosGravados4Total + $gastosOperativosGravados4TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados4Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados4TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados4,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Cerrajeria</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados56278 = ControladorBanco6278::ctrGastosOperativosGravados5($item, $valor);
                                    $gastosOperativosGravados56278F = ControladorBanco6278::ctrGastosOperativosGravados5F($item, $valor);
                                    $gastosOperativosGravados53450 = ControladorBanco3450::ctrGastosOperativosGravados5($item, $valor);
                                    $gastosOperativosGravados53450F = ControladorBanco3450::ctrGastosOperativosGravados5F($item, $valor);
                                    $gastosOperativosGravados50198 = ControladorBanco0198::ctrGastosOperativosGravados5($item, $valor);
                                    $gastosOperativosGravados50198F = ControladorBanco0198::ctrGastosOperativosGravados5F($item, $valor);
                                    $gastosOperativosGravados5Caja = ControladorCaja::ctrGastosOperativosGravados5($item, $valor);
                                    $gastosOperativosGravados5CajaF = ControladorCaja::ctrGastosOperativosGravados5F($item, $valor);
                                    $gastosOperativosGravados51286 = ControladorBanco1286::ctrGastosOperativosGravados5($item, $valor);
                                    $gastosOperativosGravados51286F = ControladorBanco1286::ctrGastosOperativosGravados5F($item, $valor);
                                    $gastosOperativosGravados51219 = ControladorBanco1219::ctrGastosOperativosGravados5($item, $valor);
                                    $gastosOperativosGravados51219F = ControladorBanco1219::ctrGastosOperativosGravados5F($item, $valor);
                                    $gastosOperativosGravados50840 = ControladorBanco0840::ctrGastosOperativosGravados5($item, $valor);
                                    $gastosOperativosGravados50840F = ControladorBanco0840::ctrGastosOperativosGravados5F($item, $valor);
                                    $gastosOperativosGravados51340 = ControladorBanco1340::ctrGastosOperativosGravados5($item, $valor);
                                    $gastosOperativosGravados51340F = ControladorBanco1340::ctrGastosOperativosGravados5F($item, $valor);

                                    foreach ($gastosOperativosGravados56278 as $value) {
                                      foreach ($gastosOperativosGravados56278F as $value2) {
                                        foreach ($gastosOperativosGravados53450 as $value3) {
                                          foreach ($gastosOperativosGravados51340F as $value4) {
                                            foreach ($gastosOperativosGravados50198 as $value5) {
                                              foreach ($gastosOperativosGravados50198F as $value6) {
                                                foreach ($gastosOperativosGravados5Caja as $value7) {
                                                  foreach ($gastosOperativosGravados5CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados51286 as $value9) {
                                                      foreach ($gastosOperativosGravados51286F as $value10) {
                                                        foreach ($gastosOperativosGravados51219 as $value11) {
                                                          foreach ($gastosOperativosGravados51219F as $value12) {
                                                            foreach ($gastosOperativosGravados50840 as $value13) {
                                                              foreach ($gastosOperativosGravados50840F as $value14) {
                                                                foreach ($gastosOperativosGravados51340 as $value15) {
                                                                  foreach ($gastosOperativosGravados51340F as $value16) {

                                                                    $gastosOperativosGravados5N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados5N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados5N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados5N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados5N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados5N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados5NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados5NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados5N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados5N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados5N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados5N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados5N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados5N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados5N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados5N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados5Total = $gastosOperativosGravados5N6278 + $gastosOperativosGravados5N3450 + $gastosOperativosGravados5N0198 + $gastosOperativosGravados5NCaja + $gastosOperativosGravados5N1286 + $gastosOperativosGravados5N1219 + $gastosOperativosGravados5N0840 + $gastosOperativosGravados5N1340;
                                                                    $gastosOperativosGravados5TotalF = $gastosOperativosGravados5N6278F + $gastosOperativosGravados5N3450F + $gastosOperativosGravados5N0198F + $gastosOperativosGravados5NCajaF + $gastosOperativosGravados5N1286F + $gastosOperativosGravados5N1219F + $gastosOperativosGravados5N0840F + $gastosOperativosGravados5N1340F;
                                                                    $importesGastosOperativosGravados5 = $gastosOperativosGravados5Total + $gastosOperativosGravados5TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados5Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados5TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados5,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Combustibles y Lubricantes</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados66278 = ControladorBanco6278::ctrGastosOperativosGravados6($item, $valor);
                                    $gastosOperativosGravados66278F = ControladorBanco6278::ctrGastosOperativosGravados6F($item, $valor);
                                    $gastosOperativosGravados63450 = ControladorBanco3450::ctrGastosOperativosGravados6($item, $valor);
                                    $gastosOperativosGravados63450F = ControladorBanco3450::ctrGastosOperativosGravados6F($item, $valor);
                                    $gastosOperativosGravados60198 = ControladorBanco0198::ctrGastosOperativosGravados6($item, $valor);
                                    $gastosOperativosGravados60198F = ControladorBanco0198::ctrGastosOperativosGravados6F($item, $valor);
                                    $gastosOperativosGravados6Caja = ControladorCaja::ctrGastosOperativosGravados6($item, $valor);
                                    $gastosOperativosGravados6CajaF = ControladorCaja::ctrGastosOperativosGravados6F($item, $valor);
                                    $gastosOperativosGravados61286 = ControladorBanco1286::ctrGastosOperativosGravados6($item, $valor);
                                    $gastosOperativosGravados61286F = ControladorBanco1286::ctrGastosOperativosGravados6F($item, $valor);
                                    $gastosOperativosGravados61219 = ControladorBanco1219::ctrGastosOperativosGravados6($item, $valor);
                                    $gastosOperativosGravados61219F = ControladorBanco1219::ctrGastosOperativosGravados6F($item, $valor);
                                    $gastosOperativosGravados60840 = ControladorBanco0840::ctrGastosOperativosGravados6($item, $valor);
                                    $gastosOperativosGravados60840F = ControladorBanco0840::ctrGastosOperativosGravados6F($item, $valor);
                                    $gastosOperativosGravados61340 = ControladorBanco1340::ctrGastosOperativosGravados6($item, $valor);
                                    $gastosOperativosGravados61340F = ControladorBanco1340::ctrGastosOperativosGravados6F($item, $valor);

                                    foreach ($gastosOperativosGravados66278 as $value) {
                                      foreach ($gastosOperativosGravados66278F as $value2) {
                                        foreach ($gastosOperativosGravados63450 as $value3) {
                                          foreach ($gastosOperativosGravados61340F as $value4) {
                                            foreach ($gastosOperativosGravados60198 as $value5) {
                                              foreach ($gastosOperativosGravados60198F as $value6) {
                                                foreach ($gastosOperativosGravados6Caja as $value7) {
                                                  foreach ($gastosOperativosGravados6CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados61286 as $value9) {
                                                      foreach ($gastosOperativosGravados61286F as $value10) {
                                                        foreach ($gastosOperativosGravados61219 as $value11) {
                                                          foreach ($gastosOperativosGravados61219F as $value12) {
                                                            foreach ($gastosOperativosGravados60840 as $value13) {
                                                              foreach ($gastosOperativosGravados60840F as $value14) {
                                                                foreach ($gastosOperativosGravados61340 as $value15) {
                                                                  foreach ($gastosOperativosGravados61340F as $value16) {

                                                                    $gastosOperativosGravados6N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados6N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados6N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados6N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados6N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados6N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados6NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados6NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados6N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados6N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados6N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados6N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados6N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados6N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados6N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados6N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados6Total = $gastosOperativosGravados6N6278 + $gastosOperativosGravados6N3450 + $gastosOperativosGravados6N0198 + $gastosOperativosGravados6NCaja + $gastosOperativosGravados6N1286 + $gastosOperativosGravados6N1219 + $gastosOperativosGravados6N0840 + $gastosOperativosGravados6N1340;
                                                                    $gastosOperativosGravados6TotalF = $gastosOperativosGravados6N6278F + $gastosOperativosGravados6N3450F + $gastosOperativosGravados6N0198F + $gastosOperativosGravados6NCajaF + $gastosOperativosGravados6N1286F + $gastosOperativosGravados6N1219F + $gastosOperativosGravados6N0840F + $gastosOperativosGravados6N1340F;
                                                                    $importesGastosOperativosGravados6 = $gastosOperativosGravados6Total + $gastosOperativosGravados6TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados6Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados6TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados6,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Convenciones</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados76278 = ControladorBanco6278::ctrGastosOperativosGravados7($item, $valor);
                                    $gastosOperativosGravados76278F = ControladorBanco6278::ctrGastosOperativosGravados7F($item, $valor);
                                    $gastosOperativosGravados73450 = ControladorBanco3450::ctrGastosOperativosGravados7($item, $valor);
                                    $gastosOperativosGravados73450F = ControladorBanco3450::ctrGastosOperativosGravados7F($item, $valor);
                                    $gastosOperativosGravados70198 = ControladorBanco0198::ctrGastosOperativosGravados7($item, $valor);
                                    $gastosOperativosGravados70198F = ControladorBanco0198::ctrGastosOperativosGravados7F($item, $valor);
                                    $gastosOperativosGravados7Caja = ControladorCaja::ctrGastosOperativosGravados7($item, $valor);
                                    $gastosOperativosGravados7CajaF = ControladorCaja::ctrGastosOperativosGravados7F($item, $valor);
                                    $gastosOperativosGravados71286 = ControladorBanco1286::ctrGastosOperativosGravados7($item, $valor);
                                    $gastosOperativosGravados71286F = ControladorBanco1286::ctrGastosOperativosGravados7F($item, $valor);
                                    $gastosOperativosGravados71219 = ControladorBanco1219::ctrGastosOperativosGravados7($item, $valor);
                                    $gastosOperativosGravados71219F = ControladorBanco1219::ctrGastosOperativosGravados7F($item, $valor);
                                    $gastosOperativosGravados70840 = ControladorBanco0840::ctrGastosOperativosGravados7($item, $valor);
                                    $gastosOperativosGravados70840F = ControladorBanco0840::ctrGastosOperativosGravados7F($item, $valor);
                                    $gastosOperativosGravados71340 = ControladorBanco1340::ctrGastosOperativosGravados7($item, $valor);
                                    $gastosOperativosGravados71340F = ControladorBanco1340::ctrGastosOperativosGravados7F($item, $valor);

                                    foreach ($gastosOperativosGravados76278 as $value) {
                                      foreach ($gastosOperativosGravados76278F as $value2) {
                                        foreach ($gastosOperativosGravados73450 as $value3) {
                                          foreach ($gastosOperativosGravados71340F as $value4) {
                                            foreach ($gastosOperativosGravados70198 as $value5) {
                                              foreach ($gastosOperativosGravados70198F as $value6) {
                                                foreach ($gastosOperativosGravados7Caja as $value7) {
                                                  foreach ($gastosOperativosGravados7CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados71286 as $value9) {
                                                      foreach ($gastosOperativosGravados71286F as $value10) {
                                                        foreach ($gastosOperativosGravados71219 as $value11) {
                                                          foreach ($gastosOperativosGravados71219F as $value12) {
                                                            foreach ($gastosOperativosGravados70840 as $value13) {
                                                              foreach ($gastosOperativosGravados70840F as $value14) {
                                                                foreach ($gastosOperativosGravados71340 as $value15) {
                                                                  foreach ($gastosOperativosGravados71340F as $value16) {

                                                                    $gastosOperativosGravados7N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados7N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados7N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados7N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados7N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados7N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados7NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados7NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados7N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados7N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados7N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados7N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados7N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados7N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados7N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados7N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados7Total = $gastosOperativosGravados7N6278 + $gastosOperativosGravados7N3450 + $gastosOperativosGravados7N0198 + $gastosOperativosGravados7NCaja + $gastosOperativosGravados7N1286 + $gastosOperativosGravados7N1219 + $gastosOperativosGravados7N0840 + $gastosOperativosGravados7N1340;
                                                                    $gastosOperativosGravados7TotalF = $gastosOperativosGravados7N6278F + $gastosOperativosGravados7N3450F + $gastosOperativosGravados7N0198F + $gastosOperativosGravados7NCajaF + $gastosOperativosGravados7N1286F + $gastosOperativosGravados7N1219F + $gastosOperativosGravados7N0840F + $gastosOperativosGravados7N1340F;
                                                                    $importesGastosOperativosGravados7 = $gastosOperativosGravados7Total + $gastosOperativosGravados7TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados7Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados7TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados7,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Demostracion de Productos</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados86278 = ControladorBanco6278::ctrGastosOperativosGravados8($item, $valor);
                                    $gastosOperativosGravados86278F = ControladorBanco6278::ctrGastosOperativosGravados8F($item, $valor);
                                    $gastosOperativosGravados83450 = ControladorBanco3450::ctrGastosOperativosGravados8($item, $valor);
                                    $gastosOperativosGravados83450F = ControladorBanco3450::ctrGastosOperativosGravados8F($item, $valor);
                                    $gastosOperativosGravados80198 = ControladorBanco0198::ctrGastosOperativosGravados8($item, $valor);
                                    $gastosOperativosGravados80198F = ControladorBanco0198::ctrGastosOperativosGravados8F($item, $valor);
                                    $gastosOperativosGravados8Caja = ControladorCaja::ctrGastosOperativosGravados8($item, $valor);
                                    $gastosOperativosGravados8CajaF = ControladorCaja::ctrGastosOperativosGravados8F($item, $valor);
                                    $gastosOperativosGravados81286 = ControladorBanco1286::ctrGastosOperativosGravados8($item, $valor);
                                    $gastosOperativosGravados81286F = ControladorBanco1286::ctrGastosOperativosGravados8F($item, $valor);
                                    $gastosOperativosGravados81219 = ControladorBanco1219::ctrGastosOperativosGravados8($item, $valor);
                                    $gastosOperativosGravados81219F = ControladorBanco1219::ctrGastosOperativosGravados8F($item, $valor);
                                    $gastosOperativosGravados80840 = ControladorBanco0840::ctrGastosOperativosGravados8($item, $valor);
                                    $gastosOperativosGravados80840F = ControladorBanco0840::ctrGastosOperativosGravados8F($item, $valor);
                                    $gastosOperativosGravados81340 = ControladorBanco1340::ctrGastosOperativosGravados8($item, $valor);
                                    $gastosOperativosGravados81340F = ControladorBanco1340::ctrGastosOperativosGravados8F($item, $valor);

                                    foreach ($gastosOperativosGravados86278 as $value) {
                                      foreach ($gastosOperativosGravados86278F as $value2) {
                                        foreach ($gastosOperativosGravados83450 as $value3) {
                                          foreach ($gastosOperativosGravados81340F as $value4) {
                                            foreach ($gastosOperativosGravados80198 as $value5) {
                                              foreach ($gastosOperativosGravados80198F as $value6) {
                                                foreach ($gastosOperativosGravados8Caja as $value7) {
                                                  foreach ($gastosOperativosGravados8CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados81286 as $value9) {
                                                      foreach ($gastosOperativosGravados81286F as $value10) {
                                                        foreach ($gastosOperativosGravados81219 as $value11) {
                                                          foreach ($gastosOperativosGravados81219F as $value12) {
                                                            foreach ($gastosOperativosGravados80840 as $value13) {
                                                              foreach ($gastosOperativosGravados80840F as $value14) {
                                                                foreach ($gastosOperativosGravados81340 as $value15) {
                                                                  foreach ($gastosOperativosGravados81340F as $value16) {

                                                                    $gastosOperativosGravados8N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados8N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados8N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados8N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados8N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados8N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados8NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados8NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados8N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados8N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados8N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados8N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados8N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados8N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados8N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados8N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados8Total = $gastosOperativosGravados8N6278 + $gastosOperativosGravados8N3450 + $gastosOperativosGravados8N0198 + $gastosOperativosGravados8NCaja + $gastosOperativosGravados8N1286 + $gastosOperativosGravados8N1219 + $gastosOperativosGravados8N0840 + $gastosOperativosGravados8N1340;
                                                                    $gastosOperativosGravados8TotalF = $gastosOperativosGravados8N6278F + $gastosOperativosGravados8N3450F + $gastosOperativosGravados8N0198F + $gastosOperativosGravados8NCajaF + $gastosOperativosGravados8N1286F + $gastosOperativosGravados8N1219F + $gastosOperativosGravados8N0840F + $gastosOperativosGravados8N1340F;
                                                                    $importesGastosOperativosGravados8 = $gastosOperativosGravados8Total + $gastosOperativosGravados8TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados8Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados8TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados8,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Energia Electrica</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados96278 = ControladorBanco6278::ctrGastosOperativosGravados9($item, $valor);
                                    $gastosOperativosGravados96278F = ControladorBanco6278::ctrGastosOperativosGravados9F($item, $valor);
                                    $gastosOperativosGravados93450 = ControladorBanco3450::ctrGastosOperativosGravados9($item, $valor);
                                    $gastosOperativosGravados93450F = ControladorBanco3450::ctrGastosOperativosGravados9F($item, $valor);
                                    $gastosOperativosGravados90198 = ControladorBanco0198::ctrGastosOperativosGravados9($item, $valor);
                                    $gastosOperativosGravados90198F = ControladorBanco0198::ctrGastosOperativosGravados9F($item, $valor);
                                    $gastosOperativosGravados9Caja = ControladorCaja::ctrGastosOperativosGravados9($item, $valor);
                                    $gastosOperativosGravados9CajaF = ControladorCaja::ctrGastosOperativosGravados9F($item, $valor);
                                    $gastosOperativosGravados91286 = ControladorBanco1286::ctrGastosOperativosGravados9($item, $valor);
                                    $gastosOperativosGravados91286F = ControladorBanco1286::ctrGastosOperativosGravados9F($item, $valor);
                                    $gastosOperativosGravados91219 = ControladorBanco1219::ctrGastosOperativosGravados9($item, $valor);
                                    $gastosOperativosGravados91219F = ControladorBanco1219::ctrGastosOperativosGravados9F($item, $valor);
                                    $gastosOperativosGravados90840 = ControladorBanco0840::ctrGastosOperativosGravados9($item, $valor);
                                    $gastosOperativosGravados90840F = ControladorBanco0840::ctrGastosOperativosGravados9F($item, $valor);
                                    $gastosOperativosGravados91340 = ControladorBanco1340::ctrGastosOperativosGravados9($item, $valor);
                                    $gastosOperativosGravados91340F = ControladorBanco1340::ctrGastosOperativosGravados9F($item, $valor);

                                    foreach ($gastosOperativosGravados96278 as $value) {
                                      foreach ($gastosOperativosGravados96278F as $value2) {
                                        foreach ($gastosOperativosGravados93450 as $value3) {
                                          foreach ($gastosOperativosGravados91340F as $value4) {
                                            foreach ($gastosOperativosGravados90198 as $value5) {
                                              foreach ($gastosOperativosGravados90198F as $value6) {
                                                foreach ($gastosOperativosGravados9Caja as $value7) {
                                                  foreach ($gastosOperativosGravados9CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados91286 as $value9) {
                                                      foreach ($gastosOperativosGravados91286F as $value10) {
                                                        foreach ($gastosOperativosGravados91219 as $value11) {
                                                          foreach ($gastosOperativosGravados91219F as $value12) {
                                                            foreach ($gastosOperativosGravados90840 as $value13) {
                                                              foreach ($gastosOperativosGravados90840F as $value14) {
                                                                foreach ($gastosOperativosGravados91340 as $value15) {
                                                                  foreach ($gastosOperativosGravados91340F as $value16) {

                                                                    $gastosOperativosGravados9N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados9N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados9N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados9N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados9N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados9N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados9NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados9NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados9N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados9N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados9N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados9N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados9N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados9N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados9N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados9N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados9Total = $gastosOperativosGravados9N6278 + $gastosOperativosGravados9N3450 + $gastosOperativosGravados9N0198 + $gastosOperativosGravados9NCaja + $gastosOperativosGravados9N1286 + $gastosOperativosGravados9N1219 + $gastosOperativosGravados9N0840 + $gastosOperativosGravados9N1340;
                                                                    $gastosOperativosGravados9TotalF = $gastosOperativosGravados9N6278F + $gastosOperativosGravados9N3450F + $gastosOperativosGravados9N0198F + $gastosOperativosGravados9NCajaF + $gastosOperativosGravados9N1286F + $gastosOperativosGravados9N1219F + $gastosOperativosGravados9N0840F + $gastosOperativosGravados9N1340F;
                                                                    $importesGastosOperativosGravados9 = $gastosOperativosGravados9Total + $gastosOperativosGravados9TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados9Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados9TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados9,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Equipos y Accesorios Uso Almacen</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados106278 = ControladorBanco6278::ctrGastosOperativosGravados10($item, $valor);
                                    $gastosOperativosGravados106278F = ControladorBanco6278::ctrGastosOperativosGravados10F($item, $valor);
                                    $gastosOperativosGravados103450 = ControladorBanco3450::ctrGastosOperativosGravados10($item, $valor);
                                    $gastosOperativosGravados103450F = ControladorBanco3450::ctrGastosOperativosGravados10F($item, $valor);
                                    $gastosOperativosGravados100198 = ControladorBanco0198::ctrGastosOperativosGravados10($item, $valor);
                                    $gastosOperativosGravados100198F = ControladorBanco0198::ctrGastosOperativosGravados10F($item, $valor);
                                    $gastosOperativosGravados10Caja = ControladorCaja::ctrGastosOperativosGravados10($item, $valor);
                                    $gastosOperativosGravados10CajaF = ControladorCaja::ctrGastosOperativosGravados10F($item, $valor);
                                    $gastosOperativosGravados101286 = ControladorBanco1286::ctrGastosOperativosGravados10($item, $valor);
                                    $gastosOperativosGravados101286F = ControladorBanco1286::ctrGastosOperativosGravados10F($item, $valor);
                                    $gastosOperativosGravados101219 = ControladorBanco1219::ctrGastosOperativosGravados10($item, $valor);
                                    $gastosOperativosGravados101219F = ControladorBanco1219::ctrGastosOperativosGravados10F($item, $valor);
                                    $gastosOperativosGravados100840 = ControladorBanco0840::ctrGastosOperativosGravados10($item, $valor);
                                    $gastosOperativosGravados100840F = ControladorBanco0840::ctrGastosOperativosGravados10F($item, $valor);
                                    $gastosOperativosGravados101340 = ControladorBanco1340::ctrGastosOperativosGravados10($item, $valor);
                                    $gastosOperativosGravados101340F = ControladorBanco1340::ctrGastosOperativosGravados10F($item, $valor);

                                    foreach ($gastosOperativosGravados106278 as $value) {
                                      foreach ($gastosOperativosGravados106278F as $value2) {
                                        foreach ($gastosOperativosGravados103450 as $value3) {
                                          foreach ($gastosOperativosGravados101340F as $value4) {
                                            foreach ($gastosOperativosGravados100198 as $value5) {
                                              foreach ($gastosOperativosGravados100198F as $value6) {
                                                foreach ($gastosOperativosGravados10Caja as $value7) {
                                                  foreach ($gastosOperativosGravados10CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados101286 as $value9) {
                                                      foreach ($gastosOperativosGravados101286F as $value10) {
                                                        foreach ($gastosOperativosGravados101219 as $value11) {
                                                          foreach ($gastosOperativosGravados101219F as $value12) {
                                                            foreach ($gastosOperativosGravados100840 as $value13) {
                                                              foreach ($gastosOperativosGravados100840F as $value14) {
                                                                foreach ($gastosOperativosGravados101340 as $value15) {
                                                                  foreach ($gastosOperativosGravados101340F as $value16) {

                                                                    $gastosOperativosGravados10N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados10N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados10N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados10N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados10N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados10N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados10NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados10NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados10N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados10N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados10N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados10N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados10N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados10N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados10N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados10N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados10Total = $gastosOperativosGravados10N6278 + $gastosOperativosGravados10N3450 + $gastosOperativosGravados10N0198 + $gastosOperativosGravados10NCaja + $gastosOperativosGravados10N1286 + $gastosOperativosGravados10N1219 + $gastosOperativosGravados10N0840 + $gastosOperativosGravados10N1340;
                                                                    $gastosOperativosGravados10TotalF = $gastosOperativosGravados10N6278F + $gastosOperativosGravados10N3450F + $gastosOperativosGravados10N0198F + $gastosOperativosGravados10NCajaF + $gastosOperativosGravados10N1286F + $gastosOperativosGravados10N1219F + $gastosOperativosGravados10N0840F + $gastosOperativosGravados10N1340F;
                                                                    $importesGastosOperativosGravados10 = $gastosOperativosGravados10Total + $gastosOperativosGravados10TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados10Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados10TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados10,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Farmaceuticas Laboral</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados116278 = ControladorBanco6278::ctrGastosOperativosGravados11($item, $valor);
                                    $gastosOperativosGravados116278F = ControladorBanco6278::ctrGastosOperativosGravados11F($item, $valor);
                                    $gastosOperativosGravados113450 = ControladorBanco3450::ctrGastosOperativosGravados11($item, $valor);
                                    $gastosOperativosGravados113450F = ControladorBanco3450::ctrGastosOperativosGravados11F($item, $valor);
                                    $gastosOperativosGravados110198 = ControladorBanco0198::ctrGastosOperativosGravados11($item, $valor);
                                    $gastosOperativosGravados110198F = ControladorBanco0198::ctrGastosOperativosGravados11F($item, $valor);
                                    $gastosOperativosGravados11Caja = ControladorCaja::ctrGastosOperativosGravados11($item, $valor);
                                    $gastosOperativosGravados11CajaF = ControladorCaja::ctrGastosOperativosGravados11F($item, $valor);
                                    $gastosOperativosGravados111286 = ControladorBanco1286::ctrGastosOperativosGravados11($item, $valor);
                                    $gastosOperativosGravados111286F = ControladorBanco1286::ctrGastosOperativosGravados11F($item, $valor);
                                    $gastosOperativosGravados111219 = ControladorBanco1219::ctrGastosOperativosGravados11($item, $valor);
                                    $gastosOperativosGravados111219F = ControladorBanco1219::ctrGastosOperativosGravados11F($item, $valor);
                                    $gastosOperativosGravados110840 = ControladorBanco0840::ctrGastosOperativosGravados11($item, $valor);
                                    $gastosOperativosGravados110840F = ControladorBanco0840::ctrGastosOperativosGravados11F($item, $valor);
                                    $gastosOperativosGravados111340 = ControladorBanco1340::ctrGastosOperativosGravados11($item, $valor);
                                    $gastosOperativosGravados111340F = ControladorBanco1340::ctrGastosOperativosGravados11F($item, $valor);

                                    foreach ($gastosOperativosGravados116278 as $value) {
                                      foreach ($gastosOperativosGravados116278F as $value2) {
                                        foreach ($gastosOperativosGravados113450 as $value3) {
                                          foreach ($gastosOperativosGravados111340F as $value4) {
                                            foreach ($gastosOperativosGravados110198 as $value5) {
                                              foreach ($gastosOperativosGravados110198F as $value6) {
                                                foreach ($gastosOperativosGravados11Caja as $value7) {
                                                  foreach ($gastosOperativosGravados11CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados111286 as $value9) {
                                                      foreach ($gastosOperativosGravados111286F as $value10) {
                                                        foreach ($gastosOperativosGravados111219 as $value11) {
                                                          foreach ($gastosOperativosGravados111219F as $value12) {
                                                            foreach ($gastosOperativosGravados110840 as $value13) {
                                                              foreach ($gastosOperativosGravados110840F as $value14) {
                                                                foreach ($gastosOperativosGravados111340 as $value15) {
                                                                  foreach ($gastosOperativosGravados111340F as $value16) {

                                                                    $gastosOperativosGravados11N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados11N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados11N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados11N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados11N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados11N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados11NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados11NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados11N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados11N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados11N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados11N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados11N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados11N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados11N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados11N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados11Total = $gastosOperativosGravados11N6278 + $gastosOperativosGravados11N3450 + $gastosOperativosGravados11N0198 + $gastosOperativosGravados11NCaja + $gastosOperativosGravados11N1286 + $gastosOperativosGravados11N1219 + $gastosOperativosGravados11N0840 + $gastosOperativosGravados11N1340;
                                                                    $gastosOperativosGravados11TotalF = $gastosOperativosGravados11N6278F + $gastosOperativosGravados11N3450F + $gastosOperativosGravados11N0198F + $gastosOperativosGravados11NCajaF + $gastosOperativosGravados11N1286F + $gastosOperativosGravados11N1219F + $gastosOperativosGravados11N0840F + $gastosOperativosGravados11N1340F;
                                                                    $importesGastosOperativosGravados11 = $gastosOperativosGravados11Total + $gastosOperativosGravados11TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados11Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados11TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados11,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Ferreteria y Herramientas</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados126278 = ControladorBanco6278::ctrGastosOperativosGravados12($item, $valor);
                                    $gastosOperativosGravados126278F = ControladorBanco6278::ctrGastosOperativosGravados12F($item, $valor);
                                    $gastosOperativosGravados123450 = ControladorBanco3450::ctrGastosOperativosGravados12($item, $valor);
                                    $gastosOperativosGravados123450F = ControladorBanco3450::ctrGastosOperativosGravados12F($item, $valor);
                                    $gastosOperativosGravados120198 = ControladorBanco0198::ctrGastosOperativosGravados12($item, $valor);
                                    $gastosOperativosGravados120198F = ControladorBanco0198::ctrGastosOperativosGravados12F($item, $valor);
                                    $gastosOperativosGravados12Caja = ControladorCaja::ctrGastosOperativosGravados12($item, $valor);
                                    $gastosOperativosGravados12CajaF = ControladorCaja::ctrGastosOperativosGravados12F($item, $valor);
                                    $gastosOperativosGravados121286 = ControladorBanco1286::ctrGastosOperativosGravados12($item, $valor);
                                    $gastosOperativosGravados121286F = ControladorBanco1286::ctrGastosOperativosGravados12F($item, $valor);
                                    $gastosOperativosGravados121219 = ControladorBanco1219::ctrGastosOperativosGravados12($item, $valor);
                                    $gastosOperativosGravados121219F = ControladorBanco1219::ctrGastosOperativosGravados12F($item, $valor);
                                    $gastosOperativosGravados120840 = ControladorBanco0840::ctrGastosOperativosGravados12($item, $valor);
                                    $gastosOperativosGravados120840F = ControladorBanco0840::ctrGastosOperativosGravados12F($item, $valor);
                                    $gastosOperativosGravados121340 = ControladorBanco1340::ctrGastosOperativosGravados12($item, $valor);
                                    $gastosOperativosGravados121340F = ControladorBanco1340::ctrGastosOperativosGravados12F($item, $valor);

                                    foreach ($gastosOperativosGravados126278 as $value) {
                                      foreach ($gastosOperativosGravados126278F as $value2) {
                                        foreach ($gastosOperativosGravados123450 as $value3) {
                                          foreach ($gastosOperativosGravados121340F as $value4) {
                                            foreach ($gastosOperativosGravados120198 as $value5) {
                                              foreach ($gastosOperativosGravados120198F as $value6) {
                                                foreach ($gastosOperativosGravados12Caja as $value7) {
                                                  foreach ($gastosOperativosGravados12CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados121286 as $value9) {
                                                      foreach ($gastosOperativosGravados121286F as $value10) {
                                                        foreach ($gastosOperativosGravados121219 as $value11) {
                                                          foreach ($gastosOperativosGravados121219F as $value12) {
                                                            foreach ($gastosOperativosGravados120840 as $value13) {
                                                              foreach ($gastosOperativosGravados120840F as $value14) {
                                                                foreach ($gastosOperativosGravados121340 as $value15) {
                                                                  foreach ($gastosOperativosGravados121340F as $value16) {

                                                                    $gastosOperativosGravados12N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados12N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados12N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados12N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados12N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados12N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados12NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados12NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados12N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados12N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados12N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados12N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados12N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados12N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados12N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados12N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados12Total = $gastosOperativosGravados12N6278 + $gastosOperativosGravados12N3450 + $gastosOperativosGravados12N0198 + $gastosOperativosGravados12NCaja + $gastosOperativosGravados12N1286 + $gastosOperativosGravados12N1219 + $gastosOperativosGravados12N0840 + $gastosOperativosGravados12N1340;
                                                                    $gastosOperativosGravados12TotalF = $gastosOperativosGravados12N6278F + $gastosOperativosGravados12N3450F + $gastosOperativosGravados12N0198F + $gastosOperativosGravados12NCajaF + $gastosOperativosGravados12N1286F + $gastosOperativosGravados12N1219F + $gastosOperativosGravados12N0840F + $gastosOperativosGravados12N1340F;
                                                                    $importesGastosOperativosGravados12 = $gastosOperativosGravados12Total + $gastosOperativosGravados12TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados12Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados12TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados12,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Gastos Diversos (CON IVA)</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados136278 = ControladorBanco6278::ctrGastosOperativosGravados13($item, $valor);
                                    $gastosOperativosGravados136278F = ControladorBanco6278::ctrGastosOperativosGravados13F($item, $valor);
                                    $gastosOperativosGravados133450 = ControladorBanco3450::ctrGastosOperativosGravados13($item, $valor);
                                    $gastosOperativosGravados133450F = ControladorBanco3450::ctrGastosOperativosGravados13F($item, $valor);
                                    $gastosOperativosGravados130198 = ControladorBanco0198::ctrGastosOperativosGravados13($item, $valor);
                                    $gastosOperativosGravados130198F = ControladorBanco0198::ctrGastosOperativosGravados13F($item, $valor);
                                    $gastosOperativosGravados13Caja = ControladorCaja::ctrGastosOperativosGravados13($item, $valor);
                                    $gastosOperativosGravados13CajaF = ControladorCaja::ctrGastosOperativosGravados13F($item, $valor);
                                    $gastosOperativosGravados131286 = ControladorBanco1286::ctrGastosOperativosGravados13($item, $valor);
                                    $gastosOperativosGravados131286F = ControladorBanco1286::ctrGastosOperativosGravados13F($item, $valor);
                                    $gastosOperativosGravados131219 = ControladorBanco1219::ctrGastosOperativosGravados13($item, $valor);
                                    $gastosOperativosGravados131219F = ControladorBanco1219::ctrGastosOperativosGravados13F($item, $valor);
                                    $gastosOperativosGravados130840 = ControladorBanco0840::ctrGastosOperativosGravados13($item, $valor);
                                    $gastosOperativosGravados130840F = ControladorBanco0840::ctrGastosOperativosGravados13F($item, $valor);
                                    $gastosOperativosGravados131340 = ControladorBanco1340::ctrGastosOperativosGravados13($item, $valor);
                                    $gastosOperativosGravados131340F = ControladorBanco1340::ctrGastosOperativosGravados13F($item, $valor);

                                    foreach ($gastosOperativosGravados136278 as $value) {
                                      foreach ($gastosOperativosGravados136278F as $value2) {
                                        foreach ($gastosOperativosGravados133450 as $value3) {
                                          foreach ($gastosOperativosGravados131340F as $value4) {
                                            foreach ($gastosOperativosGravados130198 as $value5) {
                                              foreach ($gastosOperativosGravados130198F as $value6) {
                                                foreach ($gastosOperativosGravados13Caja as $value7) {
                                                  foreach ($gastosOperativosGravados13CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados131286 as $value9) {
                                                      foreach ($gastosOperativosGravados131286F as $value10) {
                                                        foreach ($gastosOperativosGravados131219 as $value11) {
                                                          foreach ($gastosOperativosGravados131219F as $value12) {
                                                            foreach ($gastosOperativosGravados130840 as $value13) {
                                                              foreach ($gastosOperativosGravados130840F as $value14) {
                                                                foreach ($gastosOperativosGravados131340 as $value15) {
                                                                  foreach ($gastosOperativosGravados131340F as $value16) {

                                                                    $gastosOperativosGravados13N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados13N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados13N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados13N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados13N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados13N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados13NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados13NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados13N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados13N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados13N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados13N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados13N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados13N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados13N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados13N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados13Total = $gastosOperativosGravados13N6278 + $gastosOperativosGravados13N3450 + $gastosOperativosGravados13N0198 + $gastosOperativosGravados13NCaja + $gastosOperativosGravados13N1286 + $gastosOperativosGravados13N1219 + $gastosOperativosGravados13N0840 + $gastosOperativosGravados13N1340;
                                                                    $gastosOperativosGravados13TotalF = $gastosOperativosGravados13N6278F + $gastosOperativosGravados13N3450F + $gastosOperativosGravados13N0198F + $gastosOperativosGravados13NCajaF + $gastosOperativosGravados13N1286F + $gastosOperativosGravados13N1219F + $gastosOperativosGravados13N0840F + $gastosOperativosGravados13N1340F;
                                                                    $importesGastosOperativosGravados13 = $gastosOperativosGravados13Total + $gastosOperativosGravados13TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados13Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados13TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados13,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Gestoria Recuperacion Cartera</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados146278 = ControladorBanco6278::ctrGastosOperativosGravados14($item, $valor);
                                    $gastosOperativosGravados146278F = ControladorBanco6278::ctrGastosOperativosGravados14F($item, $valor);
                                    $gastosOperativosGravados143450 = ControladorBanco3450::ctrGastosOperativosGravados14($item, $valor);
                                    $gastosOperativosGravados143450F = ControladorBanco3450::ctrGastosOperativosGravados14F($item, $valor);
                                    $gastosOperativosGravados140198 = ControladorBanco0198::ctrGastosOperativosGravados14($item, $valor);
                                    $gastosOperativosGravados140198F = ControladorBanco0198::ctrGastosOperativosGravados14F($item, $valor);
                                    $gastosOperativosGravados14Caja = ControladorCaja::ctrGastosOperativosGravados14($item, $valor);
                                    $gastosOperativosGravados14CajaF = ControladorCaja::ctrGastosOperativosGravados14F($item, $valor);
                                    $gastosOperativosGravados141286 = ControladorBanco1286::ctrGastosOperativosGravados14($item, $valor);
                                    $gastosOperativosGravados141286F = ControladorBanco1286::ctrGastosOperativosGravados14F($item, $valor);
                                    $gastosOperativosGravados141219 = ControladorBanco1219::ctrGastosOperativosGravados14($item, $valor);
                                    $gastosOperativosGravados141219F = ControladorBanco1219::ctrGastosOperativosGravados14F($item, $valor);
                                    $gastosOperativosGravados140840 = ControladorBanco0840::ctrGastosOperativosGravados14($item, $valor);
                                    $gastosOperativosGravados140840F = ControladorBanco0840::ctrGastosOperativosGravados14F($item, $valor);
                                    $gastosOperativosGravados141340 = ControladorBanco1340::ctrGastosOperativosGravados14($item, $valor);
                                    $gastosOperativosGravados141340F = ControladorBanco1340::ctrGastosOperativosGravados14F($item, $valor);

                                    foreach ($gastosOperativosGravados146278 as $value) {
                                      foreach ($gastosOperativosGravados146278F as $value2) {
                                        foreach ($gastosOperativosGravados143450 as $value3) {
                                          foreach ($gastosOperativosGravados141340F as $value4) {
                                            foreach ($gastosOperativosGravados140198 as $value5) {
                                              foreach ($gastosOperativosGravados140198F as $value6) {
                                                foreach ($gastosOperativosGravados14Caja as $value7) {
                                                  foreach ($gastosOperativosGravados14CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados141286 as $value9) {
                                                      foreach ($gastosOperativosGravados141286F as $value10) {
                                                        foreach ($gastosOperativosGravados141219 as $value11) {
                                                          foreach ($gastosOperativosGravados141219F as $value12) {
                                                            foreach ($gastosOperativosGravados140840 as $value13) {
                                                              foreach ($gastosOperativosGravados140840F as $value14) {
                                                                foreach ($gastosOperativosGravados141340 as $value15) {
                                                                  foreach ($gastosOperativosGravados141340F as $value16) {

                                                                    $gastosOperativosGravados14N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados14N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados14N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados14N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados14N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados14N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados14NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados14NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados14N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados14N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados14N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados14N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados14N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados14N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados14N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados14N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados14Total = $gastosOperativosGravados14N6278 + $gastosOperativosGravados14N3450 + $gastosOperativosGravados14N0198 + $gastosOperativosGravados14NCaja + $gastosOperativosGravados14N1286 + $gastosOperativosGravados14N1219 + $gastosOperativosGravados14N0840 + $gastosOperativosGravados14N1340;
                                                                    $gastosOperativosGravados14TotalF = $gastosOperativosGravados14N6278F + $gastosOperativosGravados14N3450F + $gastosOperativosGravados14N0198F + $gastosOperativosGravados14NCajaF + $gastosOperativosGravados14N1286F + $gastosOperativosGravados14N1219F + $gastosOperativosGravados14N0840F + $gastosOperativosGravados14N1340F;
                                                                    $importesGastosOperativosGravados14 = $gastosOperativosGravados14Total + $gastosOperativosGravados14TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados14Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados14TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados14,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Limpieza y Accesorios</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados156278 = ControladorBanco6278::ctrGastosOperativosGravados15($item, $valor);
                                    $gastosOperativosGravados156278F = ControladorBanco6278::ctrGastosOperativosGravados15F($item, $valor);
                                    $gastosOperativosGravados153450 = ControladorBanco3450::ctrGastosOperativosGravados15($item, $valor);
                                    $gastosOperativosGravados153450F = ControladorBanco3450::ctrGastosOperativosGravados15F($item, $valor);
                                    $gastosOperativosGravados150198 = ControladorBanco0198::ctrGastosOperativosGravados15($item, $valor);
                                    $gastosOperativosGravados150198F = ControladorBanco0198::ctrGastosOperativosGravados15F($item, $valor);
                                    $gastosOperativosGravados15Caja = ControladorCaja::ctrGastosOperativosGravados15($item, $valor);
                                    $gastosOperativosGravados15CajaF = ControladorCaja::ctrGastosOperativosGravados15F($item, $valor);
                                    $gastosOperativosGravados151286 = ControladorBanco1286::ctrGastosOperativosGravados15($item, $valor);
                                    $gastosOperativosGravados151286F = ControladorBanco1286::ctrGastosOperativosGravados15F($item, $valor);
                                    $gastosOperativosGravados151219 = ControladorBanco1219::ctrGastosOperativosGravados15($item, $valor);
                                    $gastosOperativosGravados151219F = ControladorBanco1219::ctrGastosOperativosGravados15F($item, $valor);
                                    $gastosOperativosGravados150840 = ControladorBanco0840::ctrGastosOperativosGravados15($item, $valor);
                                    $gastosOperativosGravados150840F = ControladorBanco0840::ctrGastosOperativosGravados15F($item, $valor);
                                    $gastosOperativosGravados151340 = ControladorBanco1340::ctrGastosOperativosGravados15($item, $valor);
                                    $gastosOperativosGravados151340F = ControladorBanco1340::ctrGastosOperativosGravados15F($item, $valor);

                                    foreach ($gastosOperativosGravados156278 as $value) {
                                      foreach ($gastosOperativosGravados156278F as $value2) {
                                        foreach ($gastosOperativosGravados153450 as $value3) {
                                          foreach ($gastosOperativosGravados151340F as $value4) {
                                            foreach ($gastosOperativosGravados150198 as $value5) {
                                              foreach ($gastosOperativosGravados150198F as $value6) {
                                                foreach ($gastosOperativosGravados15Caja as $value7) {
                                                  foreach ($gastosOperativosGravados15CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados151286 as $value9) {
                                                      foreach ($gastosOperativosGravados151286F as $value10) {
                                                        foreach ($gastosOperativosGravados151219 as $value11) {
                                                          foreach ($gastosOperativosGravados151219F as $value12) {
                                                            foreach ($gastosOperativosGravados150840 as $value13) {
                                                              foreach ($gastosOperativosGravados150840F as $value14) {
                                                                foreach ($gastosOperativosGravados151340 as $value15) {
                                                                  foreach ($gastosOperativosGravados151340F as $value16) {

                                                                    $gastosOperativosGravados15N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados15N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados15N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados15N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados15N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados15N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados15NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados15NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados15N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados15N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados15N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados15N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados15N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados15N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados15N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados15N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados15Total = $gastosOperativosGravados15N6278 + $gastosOperativosGravados15N3450 + $gastosOperativosGravados15N0198 + $gastosOperativosGravados15NCaja + $gastosOperativosGravados15N1286 + $gastosOperativosGravados15N1219 + $gastosOperativosGravados15N0840 + $gastosOperativosGravados15N1340;
                                                                    $gastosOperativosGravados15TotalF = $gastosOperativosGravados15N6278F + $gastosOperativosGravados15N3450F + $gastosOperativosGravados15N0198F + $gastosOperativosGravados15NCajaF + $gastosOperativosGravados15N1286F + $gastosOperativosGravados15N1219F + $gastosOperativosGravados15N0840F + $gastosOperativosGravados15N1340F;
                                                                    $importesGastosOperativosGravados15 = $gastosOperativosGravados15Total + $gastosOperativosGravados15TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados15Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados15TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados15,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Mantto Computo</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados166278 = ControladorBanco6278::ctrGastosOperativosGravados16($item, $valor);
                                    $gastosOperativosGravados166278F = ControladorBanco6278::ctrGastosOperativosGravados16F($item, $valor);
                                    $gastosOperativosGravados163450 = ControladorBanco3450::ctrGastosOperativosGravados16($item, $valor);
                                    $gastosOperativosGravados163450F = ControladorBanco3450::ctrGastosOperativosGravados16F($item, $valor);
                                    $gastosOperativosGravados160198 = ControladorBanco0198::ctrGastosOperativosGravados16($item, $valor);
                                    $gastosOperativosGravados160198F = ControladorBanco0198::ctrGastosOperativosGravados16F($item, $valor);
                                    $gastosOperativosGravados16Caja = ControladorCaja::ctrGastosOperativosGravados16($item, $valor);
                                    $gastosOperativosGravados16CajaF = ControladorCaja::ctrGastosOperativosGravados16F($item, $valor);
                                    $gastosOperativosGravados161286 = ControladorBanco1286::ctrGastosOperativosGravados16($item, $valor);
                                    $gastosOperativosGravados161286F = ControladorBanco1286::ctrGastosOperativosGravados16F($item, $valor);
                                    $gastosOperativosGravados161219 = ControladorBanco1219::ctrGastosOperativosGravados16($item, $valor);
                                    $gastosOperativosGravados161219F = ControladorBanco1219::ctrGastosOperativosGravados16F($item, $valor);
                                    $gastosOperativosGravados160840 = ControladorBanco0840::ctrGastosOperativosGravados16($item, $valor);
                                    $gastosOperativosGravados160840F = ControladorBanco0840::ctrGastosOperativosGravados16F($item, $valor);
                                    $gastosOperativosGravados161340 = ControladorBanco1340::ctrGastosOperativosGravados16($item, $valor);
                                    $gastosOperativosGravados161340F = ControladorBanco1340::ctrGastosOperativosGravados16F($item, $valor);

                                    foreach ($gastosOperativosGravados166278 as $value) {
                                      foreach ($gastosOperativosGravados166278F as $value2) {
                                        foreach ($gastosOperativosGravados163450 as $value3) {
                                          foreach ($gastosOperativosGravados161340F as $value4) {
                                            foreach ($gastosOperativosGravados160198 as $value5) {
                                              foreach ($gastosOperativosGravados160198F as $value6) {
                                                foreach ($gastosOperativosGravados16Caja as $value7) {
                                                  foreach ($gastosOperativosGravados16CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados161286 as $value9) {
                                                      foreach ($gastosOperativosGravados161286F as $value10) {
                                                        foreach ($gastosOperativosGravados161219 as $value11) {
                                                          foreach ($gastosOperativosGravados161219F as $value12) {
                                                            foreach ($gastosOperativosGravados160840 as $value13) {
                                                              foreach ($gastosOperativosGravados160840F as $value14) {
                                                                foreach ($gastosOperativosGravados161340 as $value15) {
                                                                  foreach ($gastosOperativosGravados161340F as $value16) {

                                                                    $gastosOperativosGravados16N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados16N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados16N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados16N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados16N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados16N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados16NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados16NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados16N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados16N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados16N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados16N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados16N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados16N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados16N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados16N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados16Total = $gastosOperativosGravados16N6278 + $gastosOperativosGravados16N3450 + $gastosOperativosGravados16N0198 + $gastosOperativosGravados16NCaja + $gastosOperativosGravados16N1286 + $gastosOperativosGravados16N1219 + $gastosOperativosGravados16N0840 + $gastosOperativosGravados16N1340;
                                                                    $gastosOperativosGravados16TotalF = $gastosOperativosGravados16N6278F + $gastosOperativosGravados16N3450F + $gastosOperativosGravados16N0198F + $gastosOperativosGravados16NCajaF + $gastosOperativosGravados16N1286F + $gastosOperativosGravados16N1219F + $gastosOperativosGravados16N0840F + $gastosOperativosGravados16N1340F;
                                                                    $importesGastosOperativosGravados16 = $gastosOperativosGravados16Total + $gastosOperativosGravados16TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados16Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados16TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados16,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Mantto Instalacion Electrica</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados176278 = ControladorBanco6278::ctrGastosOperativosGravados17($item, $valor);
                                    $gastosOperativosGravados176278F = ControladorBanco6278::ctrGastosOperativosGravados17F($item, $valor);
                                    $gastosOperativosGravados173450 = ControladorBanco3450::ctrGastosOperativosGravados17($item, $valor);
                                    $gastosOperativosGravados173450F = ControladorBanco3450::ctrGastosOperativosGravados17F($item, $valor);
                                    $gastosOperativosGravados170198 = ControladorBanco0198::ctrGastosOperativosGravados17($item, $valor);
                                    $gastosOperativosGravados170198F = ControladorBanco0198::ctrGastosOperativosGravados17F($item, $valor);
                                    $gastosOperativosGravados17Caja = ControladorCaja::ctrGastosOperativosGravados17($item, $valor);
                                    $gastosOperativosGravados17CajaF = ControladorCaja::ctrGastosOperativosGravados17F($item, $valor);
                                    $gastosOperativosGravados171286 = ControladorBanco1286::ctrGastosOperativosGravados17($item, $valor);
                                    $gastosOperativosGravados171286F = ControladorBanco1286::ctrGastosOperativosGravados17F($item, $valor);
                                    $gastosOperativosGravados171219 = ControladorBanco1219::ctrGastosOperativosGravados17($item, $valor);
                                    $gastosOperativosGravados171219F = ControladorBanco1219::ctrGastosOperativosGravados17F($item, $valor);
                                    $gastosOperativosGravados170840 = ControladorBanco0840::ctrGastosOperativosGravados17($item, $valor);
                                    $gastosOperativosGravados170840F = ControladorBanco0840::ctrGastosOperativosGravados17F($item, $valor);
                                    $gastosOperativosGravados171340 = ControladorBanco1340::ctrGastosOperativosGravados17($item, $valor);
                                    $gastosOperativosGravados171340F = ControladorBanco1340::ctrGastosOperativosGravados17F($item, $valor);

                                    foreach ($gastosOperativosGravados176278 as $value) {
                                      foreach ($gastosOperativosGravados176278F as $value2) {
                                        foreach ($gastosOperativosGravados173450 as $value3) {
                                          foreach ($gastosOperativosGravados171340F as $value4) {
                                            foreach ($gastosOperativosGravados170198 as $value5) {
                                              foreach ($gastosOperativosGravados170198F as $value6) {
                                                foreach ($gastosOperativosGravados17Caja as $value7) {
                                                  foreach ($gastosOperativosGravados17CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados171286 as $value9) {
                                                      foreach ($gastosOperativosGravados171286F as $value10) {
                                                        foreach ($gastosOperativosGravados171219 as $value11) {
                                                          foreach ($gastosOperativosGravados171219F as $value12) {
                                                            foreach ($gastosOperativosGravados170840 as $value13) {
                                                              foreach ($gastosOperativosGravados170840F as $value14) {
                                                                foreach ($gastosOperativosGravados171340 as $value15) {
                                                                  foreach ($gastosOperativosGravados171340F as $value16) {

                                                                    $gastosOperativosGravados17N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados17N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados17N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados17N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados17N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados17N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados17NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados17NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados17N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados17N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados17N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados17N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados17N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados17N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados17N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados17N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados17Total = $gastosOperativosGravados17N6278 + $gastosOperativosGravados17N3450 + $gastosOperativosGravados17N0198 + $gastosOperativosGravados17NCaja + $gastosOperativosGravados17N1286 + $gastosOperativosGravados17N1219 + $gastosOperativosGravados17N0840 + $gastosOperativosGravados17N1340;
                                                                    $gastosOperativosGravados17TotalF = $gastosOperativosGravados17N6278F + $gastosOperativosGravados17N3450F + $gastosOperativosGravados17N0198F + $gastosOperativosGravados17NCajaF + $gastosOperativosGravados17N1286F + $gastosOperativosGravados17N1219F + $gastosOperativosGravados17N0840F + $gastosOperativosGravados17N1340F;
                                                                    $importesGastosOperativosGravados17 = $gastosOperativosGravados17Total + $gastosOperativosGravados17TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados17Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados17TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados17,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Mantto Local y Mejoras</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados186278 = ControladorBanco6278::ctrGastosOperativosGravados18($item, $valor);
                                    $gastosOperativosGravados186278F = ControladorBanco6278::ctrGastosOperativosGravados18F($item, $valor);
                                    $gastosOperativosGravados183450 = ControladorBanco3450::ctrGastosOperativosGravados18($item, $valor);
                                    $gastosOperativosGravados183450F = ControladorBanco3450::ctrGastosOperativosGravados18F($item, $valor);
                                    $gastosOperativosGravados180198 = ControladorBanco0198::ctrGastosOperativosGravados18($item, $valor);
                                    $gastosOperativosGravados180198F = ControladorBanco0198::ctrGastosOperativosGravados18F($item, $valor);
                                    $gastosOperativosGravados18Caja = ControladorCaja::ctrGastosOperativosGravados18($item, $valor);
                                    $gastosOperativosGravados18CajaF = ControladorCaja::ctrGastosOperativosGravados18F($item, $valor);
                                    $gastosOperativosGravados181286 = ControladorBanco1286::ctrGastosOperativosGravados18($item, $valor);
                                    $gastosOperativosGravados181286F = ControladorBanco1286::ctrGastosOperativosGravados18F($item, $valor);
                                    $gastosOperativosGravados181219 = ControladorBanco1219::ctrGastosOperativosGravados18($item, $valor);
                                    $gastosOperativosGravados181219F = ControladorBanco1219::ctrGastosOperativosGravados18F($item, $valor);
                                    $gastosOperativosGravados180840 = ControladorBanco0840::ctrGastosOperativosGravados18($item, $valor);
                                    $gastosOperativosGravados180840F = ControladorBanco0840::ctrGastosOperativosGravados18F($item, $valor);
                                    $gastosOperativosGravados181340 = ControladorBanco1340::ctrGastosOperativosGravados18($item, $valor);
                                    $gastosOperativosGravados181340F = ControladorBanco1340::ctrGastosOperativosGravados18F($item, $valor);

                                    foreach ($gastosOperativosGravados186278 as $value) {
                                      foreach ($gastosOperativosGravados186278F as $value2) {
                                        foreach ($gastosOperativosGravados183450 as $value3) {
                                          foreach ($gastosOperativosGravados181340F as $value4) {
                                            foreach ($gastosOperativosGravados180198 as $value5) {
                                              foreach ($gastosOperativosGravados180198F as $value6) {
                                                foreach ($gastosOperativosGravados18Caja as $value7) {
                                                  foreach ($gastosOperativosGravados18CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados181286 as $value9) {
                                                      foreach ($gastosOperativosGravados181286F as $value10) {
                                                        foreach ($gastosOperativosGravados181219 as $value11) {
                                                          foreach ($gastosOperativosGravados181219F as $value12) {
                                                            foreach ($gastosOperativosGravados180840 as $value13) {
                                                              foreach ($gastosOperativosGravados180840F as $value14) {
                                                                foreach ($gastosOperativosGravados181340 as $value15) {
                                                                  foreach ($gastosOperativosGravados181340F as $value16) {

                                                                    $gastosOperativosGravados18N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados18N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados18N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados18N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados18N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados18N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados18NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados18NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados18N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados18N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados18N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados18N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados18N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados18N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados18N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados18N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados18Total = $gastosOperativosGravados18N6278 + $gastosOperativosGravados18N3450 + $gastosOperativosGravados18N0198 + $gastosOperativosGravados18NCaja + $gastosOperativosGravados18N1286 + $gastosOperativosGravados18N1219 + $gastosOperativosGravados18N0840 + $gastosOperativosGravados18N1340;
                                                                    $gastosOperativosGravados18TotalF = $gastosOperativosGravados18N6278F + $gastosOperativosGravados18N3450F + $gastosOperativosGravados18N0198F + $gastosOperativosGravados18NCajaF + $gastosOperativosGravados18N1286F + $gastosOperativosGravados18N1219F + $gastosOperativosGravados18N0840F + $gastosOperativosGravados18N1340F;
                                                                    $importesGastosOperativosGravados18 = $gastosOperativosGravados18Total + $gastosOperativosGravados18TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados18Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados18TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados18,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Mantto Maquinaria y Equipos</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados196278 = ControladorBanco6278::ctrGastosOperativosGravados19($item, $valor);
                                    $gastosOperativosGravados196278F = ControladorBanco6278::ctrGastosOperativosGravados19F($item, $valor);
                                    $gastosOperativosGravados193450 = ControladorBanco3450::ctrGastosOperativosGravados19($item, $valor);
                                    $gastosOperativosGravados193450F = ControladorBanco3450::ctrGastosOperativosGravados19F($item, $valor);
                                    $gastosOperativosGravados190198 = ControladorBanco0198::ctrGastosOperativosGravados19($item, $valor);
                                    $gastosOperativosGravados190198F = ControladorBanco0198::ctrGastosOperativosGravados19F($item, $valor);
                                    $gastosOperativosGravados19Caja = ControladorCaja::ctrGastosOperativosGravados19($item, $valor);
                                    $gastosOperativosGravados19CajaF = ControladorCaja::ctrGastosOperativosGravados19F($item, $valor);
                                    $gastosOperativosGravados191286 = ControladorBanco1286::ctrGastosOperativosGravados19($item, $valor);
                                    $gastosOperativosGravados191286F = ControladorBanco1286::ctrGastosOperativosGravados19F($item, $valor);
                                    $gastosOperativosGravados191219 = ControladorBanco1219::ctrGastosOperativosGravados19($item, $valor);
                                    $gastosOperativosGravados191219F = ControladorBanco1219::ctrGastosOperativosGravados19F($item, $valor);
                                    $gastosOperativosGravados190840 = ControladorBanco0840::ctrGastosOperativosGravados19($item, $valor);
                                    $gastosOperativosGravados190840F = ControladorBanco0840::ctrGastosOperativosGravados19F($item, $valor);
                                    $gastosOperativosGravados191340 = ControladorBanco1340::ctrGastosOperativosGravados19($item, $valor);
                                    $gastosOperativosGravados191340F = ControladorBanco1340::ctrGastosOperativosGravados19F($item, $valor);

                                    foreach ($gastosOperativosGravados196278 as $value) {
                                      foreach ($gastosOperativosGravados196278F as $value2) {
                                        foreach ($gastosOperativosGravados193450 as $value3) {
                                          foreach ($gastosOperativosGravados191340F as $value4) {
                                            foreach ($gastosOperativosGravados190198 as $value5) {
                                              foreach ($gastosOperativosGravados190198F as $value6) {
                                                foreach ($gastosOperativosGravados19Caja as $value7) {
                                                  foreach ($gastosOperativosGravados19CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados191286 as $value9) {
                                                      foreach ($gastosOperativosGravados191286F as $value10) {
                                                        foreach ($gastosOperativosGravados191219 as $value11) {
                                                          foreach ($gastosOperativosGravados191219F as $value12) {
                                                            foreach ($gastosOperativosGravados190840 as $value13) {
                                                              foreach ($gastosOperativosGravados190840F as $value14) {
                                                                foreach ($gastosOperativosGravados191340 as $value15) {
                                                                  foreach ($gastosOperativosGravados191340F as $value16) {

                                                                    $gastosOperativosGravados19N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados19N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados19N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados19N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados19N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados19N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados19NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados19NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados19N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados19N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados19N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados19N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados19N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados19N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados19N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados19N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados19Total = $gastosOperativosGravados19N6278 + $gastosOperativosGravados19N3450 + $gastosOperativosGravados19N0198 + $gastosOperativosGravados19NCaja + $gastosOperativosGravados19N1286 + $gastosOperativosGravados19N1219 + $gastosOperativosGravados19N0840 + $gastosOperativosGravados19N1340;
                                                                    $gastosOperativosGravados19TotalF = $gastosOperativosGravados19N6278F + $gastosOperativosGravados19N3450F + $gastosOperativosGravados19N0198F + $gastosOperativosGravados19NCajaF + $gastosOperativosGravados19N1286F + $gastosOperativosGravados19N1219F + $gastosOperativosGravados19N0840F + $gastosOperativosGravados19N1340F;
                                                                    $importesGastosOperativosGravados19 = $gastosOperativosGravados19Total + $gastosOperativosGravados19TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados19Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados19TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados19,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Mantto Mobiliario y Equipo Oficina</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados206278 = ControladorBanco6278::ctrGastosOperativosGravados20($item, $valor);
                                    $gastosOperativosGravados206278F = ControladorBanco6278::ctrGastosOperativosGravados20F($item, $valor);
                                    $gastosOperativosGravados203450 = ControladorBanco3450::ctrGastosOperativosGravados20($item, $valor);
                                    $gastosOperativosGravados203450F = ControladorBanco3450::ctrGastosOperativosGravados20F($item, $valor);
                                    $gastosOperativosGravados200198 = ControladorBanco0198::ctrGastosOperativosGravados20($item, $valor);
                                    $gastosOperativosGravados200198F = ControladorBanco0198::ctrGastosOperativosGravados20F($item, $valor);
                                    $gastosOperativosGravados20Caja = ControladorCaja::ctrGastosOperativosGravados20($item, $valor);
                                    $gastosOperativosGravados20CajaF = ControladorCaja::ctrGastosOperativosGravados20F($item, $valor);
                                    $gastosOperativosGravados201286 = ControladorBanco1286::ctrGastosOperativosGravados20($item, $valor);
                                    $gastosOperativosGravados201286F = ControladorBanco1286::ctrGastosOperativosGravados20F($item, $valor);
                                    $gastosOperativosGravados201219 = ControladorBanco1219::ctrGastosOperativosGravados20($item, $valor);
                                    $gastosOperativosGravados201219F = ControladorBanco1219::ctrGastosOperativosGravados20F($item, $valor);
                                    $gastosOperativosGravados200840 = ControladorBanco0840::ctrGastosOperativosGravados20($item, $valor);
                                    $gastosOperativosGravados200840F = ControladorBanco0840::ctrGastosOperativosGravados20F($item, $valor);
                                    $gastosOperativosGravados201340 = ControladorBanco1340::ctrGastosOperativosGravados20($item, $valor);
                                    $gastosOperativosGravados201340F = ControladorBanco1340::ctrGastosOperativosGravados20F($item, $valor);

                                    foreach ($gastosOperativosGravados206278 as $value) {
                                      foreach ($gastosOperativosGravados206278F as $value2) {
                                        foreach ($gastosOperativosGravados203450 as $value3) {
                                          foreach ($gastosOperativosGravados201340F as $value4) {
                                            foreach ($gastosOperativosGravados200198 as $value5) {
                                              foreach ($gastosOperativosGravados200198F as $value6) {
                                                foreach ($gastosOperativosGravados20Caja as $value7) {
                                                  foreach ($gastosOperativosGravados20CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados201286 as $value9) {
                                                      foreach ($gastosOperativosGravados201286F as $value10) {
                                                        foreach ($gastosOperativosGravados201219 as $value11) {
                                                          foreach ($gastosOperativosGravados201219F as $value12) {
                                                            foreach ($gastosOperativosGravados200840 as $value13) {
                                                              foreach ($gastosOperativosGravados200840F as $value14) {
                                                                foreach ($gastosOperativosGravados201340 as $value15) {
                                                                  foreach ($gastosOperativosGravados201340F as $value16) {

                                                                    $gastosOperativosGravados20N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados20N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados20N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados20N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados20N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados20N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados20NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados20NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados20N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados20N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados20N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados20N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados20N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados20N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados20N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados20N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados20Total = $gastosOperativosGravados20N6278 + $gastosOperativosGravados20N3450 + $gastosOperativosGravados20N0198 + $gastosOperativosGravados20NCaja + $gastosOperativosGravados20N1286 + $gastosOperativosGravados20N1219 + $gastosOperativosGravados20N0840 + $gastosOperativosGravados20N1340;
                                                                    $gastosOperativosGravados20TotalF = $gastosOperativosGravados20N6278F + $gastosOperativosGravados20N3450F + $gastosOperativosGravados20N0198F + $gastosOperativosGravados20NCajaF + $gastosOperativosGravados20N1286F + $gastosOperativosGravados20N1219F + $gastosOperativosGravados20N0840F + $gastosOperativosGravados20N1340F;
                                                                    $importesGastosOperativosGravados20 = $gastosOperativosGravados20Total + $gastosOperativosGravados20TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados20Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados20TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados20,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Mantto Transporte</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados216278 = ControladorBanco6278::ctrGastosOperativosGravados21($item, $valor);
                                    $gastosOperativosGravados216278F = ControladorBanco6278::ctrGastosOperativosGravados21F($item, $valor);
                                    $gastosOperativosGravados213450 = ControladorBanco3450::ctrGastosOperativosGravados21($item, $valor);
                                    $gastosOperativosGravados213450F = ControladorBanco3450::ctrGastosOperativosGravados21F($item, $valor);
                                    $gastosOperativosGravados210198 = ControladorBanco0198::ctrGastosOperativosGravados21($item, $valor);
                                    $gastosOperativosGravados210198F = ControladorBanco0198::ctrGastosOperativosGravados21F($item, $valor);
                                    $gastosOperativosGravados21Caja = ControladorCaja::ctrGastosOperativosGravados21($item, $valor);
                                    $gastosOperativosGravados21CajaF = ControladorCaja::ctrGastosOperativosGravados21F($item, $valor);
                                    $gastosOperativosGravados211286 = ControladorBanco1286::ctrGastosOperativosGravados21($item, $valor);
                                    $gastosOperativosGravados211286F = ControladorBanco1286::ctrGastosOperativosGravados21F($item, $valor);
                                    $gastosOperativosGravados211219 = ControladorBanco1219::ctrGastosOperativosGravados21($item, $valor);
                                    $gastosOperativosGravados211219F = ControladorBanco1219::ctrGastosOperativosGravados21F($item, $valor);
                                    $gastosOperativosGravados210840 = ControladorBanco0840::ctrGastosOperativosGravados21($item, $valor);
                                    $gastosOperativosGravados210840F = ControladorBanco0840::ctrGastosOperativosGravados21F($item, $valor);
                                    $gastosOperativosGravados211340 = ControladorBanco1340::ctrGastosOperativosGravados21($item, $valor);
                                    $gastosOperativosGravados211340F = ControladorBanco1340::ctrGastosOperativosGravados21F($item, $valor);

                                    foreach ($gastosOperativosGravados216278 as $value) {
                                      foreach ($gastosOperativosGravados216278F as $value2) {
                                        foreach ($gastosOperativosGravados213450 as $value3) {
                                          foreach ($gastosOperativosGravados211340F as $value4) {
                                            foreach ($gastosOperativosGravados210198 as $value5) {
                                              foreach ($gastosOperativosGravados210198F as $value6) {
                                                foreach ($gastosOperativosGravados21Caja as $value7) {
                                                  foreach ($gastosOperativosGravados21CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados211286 as $value9) {
                                                      foreach ($gastosOperativosGravados211286F as $value10) {
                                                        foreach ($gastosOperativosGravados211219 as $value11) {
                                                          foreach ($gastosOperativosGravados211219F as $value12) {
                                                            foreach ($gastosOperativosGravados210840 as $value13) {
                                                              foreach ($gastosOperativosGravados210840F as $value14) {
                                                                foreach ($gastosOperativosGravados211340 as $value15) {
                                                                  foreach ($gastosOperativosGravados211340F as $value16) {

                                                                    $gastosOperativosGravados21N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados21N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados21N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados21N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados21N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados21N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados21NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados21NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados21N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados21N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados21N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados21N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados21N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados21N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados21N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados21N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados21Total = $gastosOperativosGravados21N6278 + $gastosOperativosGravados21N3450 + $gastosOperativosGravados21N0198 + $gastosOperativosGravados21NCaja + $gastosOperativosGravados21N1286 + $gastosOperativosGravados21N1219 + $gastosOperativosGravados21N0840 + $gastosOperativosGravados21N1340;
                                                                    $gastosOperativosGravados21TotalF = $gastosOperativosGravados21N6278F + $gastosOperativosGravados21N3450F + $gastosOperativosGravados21N0198F + $gastosOperativosGravados21NCajaF + $gastosOperativosGravados21N1286F + $gastosOperativosGravados21N1219F + $gastosOperativosGravados21N0840F + $gastosOperativosGravados21N1340F;
                                                                    $importesGastosOperativosGravados21 = $gastosOperativosGravados21Total + $gastosOperativosGravados21TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados21Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados21TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados21,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Material y Accesorio Electrico</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados226278 = ControladorBanco6278::ctrGastosOperativosGravados22($item, $valor);
                                    $gastosOperativosGravados226278F = ControladorBanco6278::ctrGastosOperativosGravados22F($item, $valor);
                                    $gastosOperativosGravados223450 = ControladorBanco3450::ctrGastosOperativosGravados22($item, $valor);
                                    $gastosOperativosGravados223450F = ControladorBanco3450::ctrGastosOperativosGravados22F($item, $valor);
                                    $gastosOperativosGravados220198 = ControladorBanco0198::ctrGastosOperativosGravados22($item, $valor);
                                    $gastosOperativosGravados220198F = ControladorBanco0198::ctrGastosOperativosGravados22F($item, $valor);
                                    $gastosOperativosGravados22Caja = ControladorCaja::ctrGastosOperativosGravados22($item, $valor);
                                    $gastosOperativosGravados22CajaF = ControladorCaja::ctrGastosOperativosGravados22F($item, $valor);
                                    $gastosOperativosGravados221286 = ControladorBanco1286::ctrGastosOperativosGravados22($item, $valor);
                                    $gastosOperativosGravados221286F = ControladorBanco1286::ctrGastosOperativosGravados22F($item, $valor);
                                    $gastosOperativosGravados221219 = ControladorBanco1219::ctrGastosOperativosGravados22($item, $valor);
                                    $gastosOperativosGravados221219F = ControladorBanco1219::ctrGastosOperativosGravados22F($item, $valor);
                                    $gastosOperativosGravados220840 = ControladorBanco0840::ctrGastosOperativosGravados22($item, $valor);
                                    $gastosOperativosGravados220840F = ControladorBanco0840::ctrGastosOperativosGravados22F($item, $valor);
                                    $gastosOperativosGravados221340 = ControladorBanco1340::ctrGastosOperativosGravados22($item, $valor);
                                    $gastosOperativosGravados221340F = ControladorBanco1340::ctrGastosOperativosGravados22F($item, $valor);

                                    foreach ($gastosOperativosGravados226278 as $value) {
                                      foreach ($gastosOperativosGravados226278F as $value2) {
                                        foreach ($gastosOperativosGravados223450 as $value3) {
                                          foreach ($gastosOperativosGravados221340F as $value4) {
                                            foreach ($gastosOperativosGravados220198 as $value5) {
                                              foreach ($gastosOperativosGravados220198F as $value6) {
                                                foreach ($gastosOperativosGravados22Caja as $value7) {
                                                  foreach ($gastosOperativosGravados22CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados221286 as $value9) {
                                                      foreach ($gastosOperativosGravados221286F as $value10) {
                                                        foreach ($gastosOperativosGravados221219 as $value11) {
                                                          foreach ($gastosOperativosGravados221219F as $value12) {
                                                            foreach ($gastosOperativosGravados220840 as $value13) {
                                                              foreach ($gastosOperativosGravados220840F as $value14) {
                                                                foreach ($gastosOperativosGravados221340 as $value15) {
                                                                  foreach ($gastosOperativosGravados221340F as $value16) {

                                                                    $gastosOperativosGravados22N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados22N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados22N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados22N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados22N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados22N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados22NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados22NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados22N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados22N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados22N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados22N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados22N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados22N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados22N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados22N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados22Total = $gastosOperativosGravados22N6278 + $gastosOperativosGravados22N3450 + $gastosOperativosGravados22N0198 + $gastosOperativosGravados22NCaja + $gastosOperativosGravados22N1286 + $gastosOperativosGravados22N1219 + $gastosOperativosGravados22N0840 + $gastosOperativosGravados22N1340;
                                                                    $gastosOperativosGravados22TotalF = $gastosOperativosGravados22N6278F + $gastosOperativosGravados22N3450F + $gastosOperativosGravados22N0198F + $gastosOperativosGravados22NCajaF + $gastosOperativosGravados22N1286F + $gastosOperativosGravados22N1219F + $gastosOperativosGravados22N0840F + $gastosOperativosGravados22N1340F;
                                                                    $importesGastosOperativosGravados22 = $gastosOperativosGravados22Total + $gastosOperativosGravados22TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados22Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados22TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados22,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Material y Accesorio para Computo</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados236278 = ControladorBanco6278::ctrGastosOperativosGravados23($item, $valor);
                                    $gastosOperativosGravados236278F = ControladorBanco6278::ctrGastosOperativosGravados23F($item, $valor);
                                    $gastosOperativosGravados233450 = ControladorBanco3450::ctrGastosOperativosGravados23($item, $valor);
                                    $gastosOperativosGravados233450F = ControladorBanco3450::ctrGastosOperativosGravados23F($item, $valor);
                                    $gastosOperativosGravados230198 = ControladorBanco0198::ctrGastosOperativosGravados23($item, $valor);
                                    $gastosOperativosGravados230198F = ControladorBanco0198::ctrGastosOperativosGravados23F($item, $valor);
                                    $gastosOperativosGravados23Caja = ControladorCaja::ctrGastosOperativosGravados23($item, $valor);
                                    $gastosOperativosGravados23CajaF = ControladorCaja::ctrGastosOperativosGravados23F($item, $valor);
                                    $gastosOperativosGravados231286 = ControladorBanco1286::ctrGastosOperativosGravados23($item, $valor);
                                    $gastosOperativosGravados231286F = ControladorBanco1286::ctrGastosOperativosGravados23F($item, $valor);
                                    $gastosOperativosGravados231219 = ControladorBanco1219::ctrGastosOperativosGravados23($item, $valor);
                                    $gastosOperativosGravados231219F = ControladorBanco1219::ctrGastosOperativosGravados23F($item, $valor);
                                    $gastosOperativosGravados230840 = ControladorBanco0840::ctrGastosOperativosGravados23($item, $valor);
                                    $gastosOperativosGravados230840F = ControladorBanco0840::ctrGastosOperativosGravados23F($item, $valor);
                                    $gastosOperativosGravados231340 = ControladorBanco1340::ctrGastosOperativosGravados23($item, $valor);
                                    $gastosOperativosGravados231340F = ControladorBanco1340::ctrGastosOperativosGravados23F($item, $valor);

                                    foreach ($gastosOperativosGravados236278 as $value) {
                                      foreach ($gastosOperativosGravados236278F as $value2) {
                                        foreach ($gastosOperativosGravados233450 as $value3) {
                                          foreach ($gastosOperativosGravados231340F as $value4) {
                                            foreach ($gastosOperativosGravados230198 as $value5) {
                                              foreach ($gastosOperativosGravados230198F as $value6) {
                                                foreach ($gastosOperativosGravados23Caja as $value7) {
                                                  foreach ($gastosOperativosGravados23CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados231286 as $value9) {
                                                      foreach ($gastosOperativosGravados231286F as $value10) {
                                                        foreach ($gastosOperativosGravados231219 as $value11) {
                                                          foreach ($gastosOperativosGravados231219F as $value12) {
                                                            foreach ($gastosOperativosGravados230840 as $value13) {
                                                              foreach ($gastosOperativosGravados230840F as $value14) {
                                                                foreach ($gastosOperativosGravados231340 as $value15) {
                                                                  foreach ($gastosOperativosGravados231340F as $value16) {

                                                                    $gastosOperativosGravados23N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados23N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados23N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados23N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados23N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados23N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados23NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados23NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados23N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados23N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados23N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados23N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados23N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados23N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados23N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados23N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados23Total = $gastosOperativosGravados23N6278 + $gastosOperativosGravados23N3450 + $gastosOperativosGravados23N0198 + $gastosOperativosGravados23NCaja + $gastosOperativosGravados23N1286 + $gastosOperativosGravados23N1219 + $gastosOperativosGravados23N0840 + $gastosOperativosGravados23N1340;
                                                                    $gastosOperativosGravados23TotalF = $gastosOperativosGravados23N6278F + $gastosOperativosGravados23N3450F + $gastosOperativosGravados23N0198F + $gastosOperativosGravados23NCajaF + $gastosOperativosGravados23N1286F + $gastosOperativosGravados23N1219F + $gastosOperativosGravados23N0840F + $gastosOperativosGravados23N1340F;
                                                                    $importesGastosOperativosGravados23 = $gastosOperativosGravados23Total + $gastosOperativosGravados23TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados23Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados23TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados23,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Mercadotecnia</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados246278 = ControladorBanco6278::ctrGastosOperativosGravados24($item, $valor);
                                    $gastosOperativosGravados246278F = ControladorBanco6278::ctrGastosOperativosGravados24F($item, $valor);
                                    $gastosOperativosGravados243450 = ControladorBanco3450::ctrGastosOperativosGravados24($item, $valor);
                                    $gastosOperativosGravados243450F = ControladorBanco3450::ctrGastosOperativosGravados24F($item, $valor);
                                    $gastosOperativosGravados240198 = ControladorBanco0198::ctrGastosOperativosGravados24($item, $valor);
                                    $gastosOperativosGravados240198F = ControladorBanco0198::ctrGastosOperativosGravados24F($item, $valor);
                                    $gastosOperativosGravados24Caja = ControladorCaja::ctrGastosOperativosGravados24($item, $valor);
                                    $gastosOperativosGravados24CajaF = ControladorCaja::ctrGastosOperativosGravados24F($item, $valor);
                                    $gastosOperativosGravados241286 = ControladorBanco1286::ctrGastosOperativosGravados24($item, $valor);
                                    $gastosOperativosGravados241286F = ControladorBanco1286::ctrGastosOperativosGravados24F($item, $valor);
                                    $gastosOperativosGravados241219 = ControladorBanco1219::ctrGastosOperativosGravados24($item, $valor);
                                    $gastosOperativosGravados241219F = ControladorBanco1219::ctrGastosOperativosGravados24F($item, $valor);
                                    $gastosOperativosGravados240840 = ControladorBanco0840::ctrGastosOperativosGravados24($item, $valor);
                                    $gastosOperativosGravados240840F = ControladorBanco0840::ctrGastosOperativosGravados24F($item, $valor);
                                    $gastosOperativosGravados241340 = ControladorBanco1340::ctrGastosOperativosGravados24($item, $valor);
                                    $gastosOperativosGravados241340F = ControladorBanco1340::ctrGastosOperativosGravados24F($item, $valor);

                                    foreach ($gastosOperativosGravados246278 as $value) {
                                      foreach ($gastosOperativosGravados246278F as $value2) {
                                        foreach ($gastosOperativosGravados243450 as $value3) {
                                          foreach ($gastosOperativosGravados241340F as $value4) {
                                            foreach ($gastosOperativosGravados240198 as $value5) {
                                              foreach ($gastosOperativosGravados240198F as $value6) {
                                                foreach ($gastosOperativosGravados24Caja as $value7) {
                                                  foreach ($gastosOperativosGravados24CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados241286 as $value9) {
                                                      foreach ($gastosOperativosGravados241286F as $value10) {
                                                        foreach ($gastosOperativosGravados241219 as $value11) {
                                                          foreach ($gastosOperativosGravados241219F as $value12) {
                                                            foreach ($gastosOperativosGravados240840 as $value13) {
                                                              foreach ($gastosOperativosGravados240840F as $value14) {
                                                                foreach ($gastosOperativosGravados241340 as $value15) {
                                                                  foreach ($gastosOperativosGravados241340F as $value16) {

                                                                    $gastosOperativosGravados24N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados24N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados24N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados24N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados24N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados24N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados24NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados24NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados24N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados24N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados24N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados24N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados24N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados24N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados24N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados24N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados24Total = $gastosOperativosGravados24N6278 + $gastosOperativosGravados24N3450 + $gastosOperativosGravados24N0198 + $gastosOperativosGravados24NCaja + $gastosOperativosGravados24N1286 + $gastosOperativosGravados24N1219 + $gastosOperativosGravados24N0840 + $gastosOperativosGravados24N1340;
                                                                    $gastosOperativosGravados24TotalF = $gastosOperativosGravados24N6278F + $gastosOperativosGravados24N3450F + $gastosOperativosGravados24N0198F + $gastosOperativosGravados24NCajaF + $gastosOperativosGravados24N1286F + $gastosOperativosGravados24N1219F + $gastosOperativosGravados24N0840F + $gastosOperativosGravados24N1340F;
                                                                    $importesGastosOperativosGravados24 = $gastosOperativosGravados24Total + $gastosOperativosGravados24TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados24Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados24TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados24,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Papeleria y Articulos Oficina</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados256278 = ControladorBanco6278::ctrGastosOperativosGravados25($item, $valor);
                                    $gastosOperativosGravados256278F = ControladorBanco6278::ctrGastosOperativosGravados25F($item, $valor);
                                    $gastosOperativosGravados253450 = ControladorBanco3450::ctrGastosOperativosGravados25($item, $valor);
                                    $gastosOperativosGravados253450F = ControladorBanco3450::ctrGastosOperativosGravados25F($item, $valor);
                                    $gastosOperativosGravados250198 = ControladorBanco0198::ctrGastosOperativosGravados25($item, $valor);
                                    $gastosOperativosGravados250198F = ControladorBanco0198::ctrGastosOperativosGravados25F($item, $valor);
                                    $gastosOperativosGravados25Caja = ControladorCaja::ctrGastosOperativosGravados25($item, $valor);
                                    $gastosOperativosGravados25CajaF = ControladorCaja::ctrGastosOperativosGravados25F($item, $valor);
                                    $gastosOperativosGravados251286 = ControladorBanco1286::ctrGastosOperativosGravados25($item, $valor);
                                    $gastosOperativosGravados251286F = ControladorBanco1286::ctrGastosOperativosGravados25F($item, $valor);
                                    $gastosOperativosGravados251219 = ControladorBanco1219::ctrGastosOperativosGravados25($item, $valor);
                                    $gastosOperativosGravados251219F = ControladorBanco1219::ctrGastosOperativosGravados25F($item, $valor);
                                    $gastosOperativosGravados250840 = ControladorBanco0840::ctrGastosOperativosGravados25($item, $valor);
                                    $gastosOperativosGravados250840F = ControladorBanco0840::ctrGastosOperativosGravados25F($item, $valor);
                                    $gastosOperativosGravados251340 = ControladorBanco1340::ctrGastosOperativosGravados25($item, $valor);
                                    $gastosOperativosGravados251340F = ControladorBanco1340::ctrGastosOperativosGravados25F($item, $valor);

                                    foreach ($gastosOperativosGravados256278 as $value) {
                                      foreach ($gastosOperativosGravados256278F as $value2) {
                                        foreach ($gastosOperativosGravados253450 as $value3) {
                                          foreach ($gastosOperativosGravados251340F as $value4) {
                                            foreach ($gastosOperativosGravados250198 as $value5) {
                                              foreach ($gastosOperativosGravados250198F as $value6) {
                                                foreach ($gastosOperativosGravados25Caja as $value7) {
                                                  foreach ($gastosOperativosGravados25CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados251286 as $value9) {
                                                      foreach ($gastosOperativosGravados251286F as $value10) {
                                                        foreach ($gastosOperativosGravados251219 as $value11) {
                                                          foreach ($gastosOperativosGravados251219F as $value12) {
                                                            foreach ($gastosOperativosGravados250840 as $value13) {
                                                              foreach ($gastosOperativosGravados250840F as $value14) {
                                                                foreach ($gastosOperativosGravados251340 as $value15) {
                                                                  foreach ($gastosOperativosGravados251340F as $value16) {

                                                                    $gastosOperativosGravados25N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados25N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados25N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados25N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados25N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados25N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados25NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados25NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados25N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados25N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados25N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados25N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados25N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados25N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados25N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados25N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados25Total = $gastosOperativosGravados25N6278 + $gastosOperativosGravados25N3450 + $gastosOperativosGravados25N0198 + $gastosOperativosGravados25NCaja + $gastosOperativosGravados25N1286 + $gastosOperativosGravados25N1219 + $gastosOperativosGravados25N0840 + $gastosOperativosGravados25N1340;
                                                                    $gastosOperativosGravados25TotalF = $gastosOperativosGravados25N6278F + $gastosOperativosGravados25N3450F + $gastosOperativosGravados25N0198F + $gastosOperativosGravados25NCajaF + $gastosOperativosGravados25N1286F + $gastosOperativosGravados25N1219F + $gastosOperativosGravados25N0840F + $gastosOperativosGravados25N1340F;
                                                                    $importesGastosOperativosGravados25 = $gastosOperativosGravados25Total + $gastosOperativosGravados25TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados25Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados25TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados25,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Propaganda y Publicidad</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados266278 = ControladorBanco6278::ctrGastosOperativosGravados26($item, $valor);
                                    $gastosOperativosGravados266278F = ControladorBanco6278::ctrGastosOperativosGravados26F($item, $valor);
                                    $gastosOperativosGravados263450 = ControladorBanco3450::ctrGastosOperativosGravados26($item, $valor);
                                    $gastosOperativosGravados263450F = ControladorBanco3450::ctrGastosOperativosGravados26F($item, $valor);
                                    $gastosOperativosGravados260198 = ControladorBanco0198::ctrGastosOperativosGravados26($item, $valor);
                                    $gastosOperativosGravados260198F = ControladorBanco0198::ctrGastosOperativosGravados26F($item, $valor);
                                    $gastosOperativosGravados26Caja = ControladorCaja::ctrGastosOperativosGravados26($item, $valor);
                                    $gastosOperativosGravados26CajaF = ControladorCaja::ctrGastosOperativosGravados26F($item, $valor);
                                    $gastosOperativosGravados261286 = ControladorBanco1286::ctrGastosOperativosGravados26($item, $valor);
                                    $gastosOperativosGravados261286F = ControladorBanco1286::ctrGastosOperativosGravados26F($item, $valor);
                                    $gastosOperativosGravados261219 = ControladorBanco1219::ctrGastosOperativosGravados26($item, $valor);
                                    $gastosOperativosGravados261219F = ControladorBanco1219::ctrGastosOperativosGravados26F($item, $valor);
                                    $gastosOperativosGravados260840 = ControladorBanco0840::ctrGastosOperativosGravados26($item, $valor);
                                    $gastosOperativosGravados260840F = ControladorBanco0840::ctrGastosOperativosGravados26F($item, $valor);
                                    $gastosOperativosGravados261340 = ControladorBanco1340::ctrGastosOperativosGravados26($item, $valor);
                                    $gastosOperativosGravados261340F = ControladorBanco1340::ctrGastosOperativosGravados26F($item, $valor);

                                    foreach ($gastosOperativosGravados266278 as $value) {
                                      foreach ($gastosOperativosGravados266278F as $value2) {
                                        foreach ($gastosOperativosGravados263450 as $value3) {
                                          foreach ($gastosOperativosGravados261340F as $value4) {
                                            foreach ($gastosOperativosGravados260198 as $value5) {
                                              foreach ($gastosOperativosGravados260198F as $value6) {
                                                foreach ($gastosOperativosGravados26Caja as $value7) {
                                                  foreach ($gastosOperativosGravados26CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados261286 as $value9) {
                                                      foreach ($gastosOperativosGravados261286F as $value10) {
                                                        foreach ($gastosOperativosGravados261219 as $value11) {
                                                          foreach ($gastosOperativosGravados261219F as $value12) {
                                                            foreach ($gastosOperativosGravados260840 as $value13) {
                                                              foreach ($gastosOperativosGravados260840F as $value14) {
                                                                foreach ($gastosOperativosGravados261340 as $value15) {
                                                                  foreach ($gastosOperativosGravados261340F as $value16) {

                                                                    $gastosOperativosGravados26N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados26N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados26N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados26N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados26N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados26N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados26NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados26NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados26N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados26N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados26N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados26N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados26N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados26N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados26N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados26N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados26Total = $gastosOperativosGravados26N6278 + $gastosOperativosGravados26N3450 + $gastosOperativosGravados26N0198 + $gastosOperativosGravados26NCaja + $gastosOperativosGravados26N1286 + $gastosOperativosGravados26N1219 + $gastosOperativosGravados26N0840 + $gastosOperativosGravados26N1340;
                                                                    $gastosOperativosGravados26TotalF = $gastosOperativosGravados26N6278F + $gastosOperativosGravados26N3450F + $gastosOperativosGravados26N0198F + $gastosOperativosGravados26NCajaF + $gastosOperativosGravados26N1286F + $gastosOperativosGravados26N1219F + $gastosOperativosGravados26N0840F + $gastosOperativosGravados26N1340F;
                                                                    $importesGastosOperativosGravados26 = $gastosOperativosGravados26Total + $gastosOperativosGravados26TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados26Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados26TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados26,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Reclutamiento Personal</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados276278 = ControladorBanco6278::ctrGastosOperativosGravados27($item, $valor);
                                    $gastosOperativosGravados276278F = ControladorBanco6278::ctrGastosOperativosGravados27F($item, $valor);
                                    $gastosOperativosGravados273450 = ControladorBanco3450::ctrGastosOperativosGravados27($item, $valor);
                                    $gastosOperativosGravados273450F = ControladorBanco3450::ctrGastosOperativosGravados27F($item, $valor);
                                    $gastosOperativosGravados270198 = ControladorBanco0198::ctrGastosOperativosGravados27($item, $valor);
                                    $gastosOperativosGravados270198F = ControladorBanco0198::ctrGastosOperativosGravados27F($item, $valor);
                                    $gastosOperativosGravados27Caja = ControladorCaja::ctrGastosOperativosGravados27($item, $valor);
                                    $gastosOperativosGravados27CajaF = ControladorCaja::ctrGastosOperativosGravados27F($item, $valor);
                                    $gastosOperativosGravados271286 = ControladorBanco1286::ctrGastosOperativosGravados27($item, $valor);
                                    $gastosOperativosGravados271286F = ControladorBanco1286::ctrGastosOperativosGravados27F($item, $valor);
                                    $gastosOperativosGravados271219 = ControladorBanco1219::ctrGastosOperativosGravados27($item, $valor);
                                    $gastosOperativosGravados271219F = ControladorBanco1219::ctrGastosOperativosGravados27F($item, $valor);
                                    $gastosOperativosGravados270840 = ControladorBanco0840::ctrGastosOperativosGravados27($item, $valor);
                                    $gastosOperativosGravados270840F = ControladorBanco0840::ctrGastosOperativosGravados27F($item, $valor);
                                    $gastosOperativosGravados271340 = ControladorBanco1340::ctrGastosOperativosGravados27($item, $valor);
                                    $gastosOperativosGravados271340F = ControladorBanco1340::ctrGastosOperativosGravados27F($item, $valor);

                                    foreach ($gastosOperativosGravados276278 as $value) {
                                      foreach ($gastosOperativosGravados276278F as $value2) {
                                        foreach ($gastosOperativosGravados273450 as $value3) {
                                          foreach ($gastosOperativosGravados271340F as $value4) {
                                            foreach ($gastosOperativosGravados270198 as $value5) {
                                              foreach ($gastosOperativosGravados270198F as $value6) {
                                                foreach ($gastosOperativosGravados27Caja as $value7) {
                                                  foreach ($gastosOperativosGravados27CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados271286 as $value9) {
                                                      foreach ($gastosOperativosGravados271286F as $value10) {
                                                        foreach ($gastosOperativosGravados271219 as $value11) {
                                                          foreach ($gastosOperativosGravados271219F as $value12) {
                                                            foreach ($gastosOperativosGravados270840 as $value13) {
                                                              foreach ($gastosOperativosGravados270840F as $value14) {
                                                                foreach ($gastosOperativosGravados271340 as $value15) {
                                                                  foreach ($gastosOperativosGravados271340F as $value16) {

                                                                    $gastosOperativosGravados27N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados27N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados27N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados27N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados27N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados27N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados27NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados27NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados27N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados27N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados27N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados27N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados27N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados27N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados27N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados27N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados27Total = $gastosOperativosGravados27N6278 + $gastosOperativosGravados27N3450 + $gastosOperativosGravados27N0198 + $gastosOperativosGravados27NCaja + $gastosOperativosGravados27N1286 + $gastosOperativosGravados27N1219 + $gastosOperativosGravados27N0840 + $gastosOperativosGravados27N1340;
                                                                    $gastosOperativosGravados27TotalF = $gastosOperativosGravados27N6278F + $gastosOperativosGravados27N3450F + $gastosOperativosGravados27N0198F + $gastosOperativosGravados27NCajaF + $gastosOperativosGravados27N1286F + $gastosOperativosGravados27N1219F + $gastosOperativosGravados27N0840F + $gastosOperativosGravados27N1340F;
                                                                    $importesGastosOperativosGravados27 = $gastosOperativosGravados27Total + $gastosOperativosGravados27TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados27Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados27TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados27,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Renta Auto-Carga</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados286278 = ControladorBanco6278::ctrGastosOperativosGravados28($item, $valor);
                                    $gastosOperativosGravados286278F = ControladorBanco6278::ctrGastosOperativosGravados28F($item, $valor);
                                    $gastosOperativosGravados283450 = ControladorBanco3450::ctrGastosOperativosGravados28($item, $valor);
                                    $gastosOperativosGravados283450F = ControladorBanco3450::ctrGastosOperativosGravados28F($item, $valor);
                                    $gastosOperativosGravados280198 = ControladorBanco0198::ctrGastosOperativosGravados28($item, $valor);
                                    $gastosOperativosGravados280198F = ControladorBanco0198::ctrGastosOperativosGravados28F($item, $valor);
                                    $gastosOperativosGravados28Caja = ControladorCaja::ctrGastosOperativosGravados28($item, $valor);
                                    $gastosOperativosGravados28CajaF = ControladorCaja::ctrGastosOperativosGravados28F($item, $valor);
                                    $gastosOperativosGravados281286 = ControladorBanco1286::ctrGastosOperativosGravados28($item, $valor);
                                    $gastosOperativosGravados281286F = ControladorBanco1286::ctrGastosOperativosGravados28F($item, $valor);
                                    $gastosOperativosGravados281219 = ControladorBanco1219::ctrGastosOperativosGravados28($item, $valor);
                                    $gastosOperativosGravados281219F = ControladorBanco1219::ctrGastosOperativosGravados28F($item, $valor);
                                    $gastosOperativosGravados280840 = ControladorBanco0840::ctrGastosOperativosGravados28($item, $valor);
                                    $gastosOperativosGravados280840F = ControladorBanco0840::ctrGastosOperativosGravados28F($item, $valor);
                                    $gastosOperativosGravados281340 = ControladorBanco1340::ctrGastosOperativosGravados28($item, $valor);
                                    $gastosOperativosGravados281340F = ControladorBanco1340::ctrGastosOperativosGravados28F($item, $valor);

                                    foreach ($gastosOperativosGravados286278 as $value) {
                                      foreach ($gastosOperativosGravados286278F as $value2) {
                                        foreach ($gastosOperativosGravados283450 as $value3) {
                                          foreach ($gastosOperativosGravados281340F as $value4) {
                                            foreach ($gastosOperativosGravados280198 as $value5) {
                                              foreach ($gastosOperativosGravados280198F as $value6) {
                                                foreach ($gastosOperativosGravados28Caja as $value7) {
                                                  foreach ($gastosOperativosGravados28CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados281286 as $value9) {
                                                      foreach ($gastosOperativosGravados281286F as $value10) {
                                                        foreach ($gastosOperativosGravados281219 as $value11) {
                                                          foreach ($gastosOperativosGravados281219F as $value12) {
                                                            foreach ($gastosOperativosGravados280840 as $value13) {
                                                              foreach ($gastosOperativosGravados280840F as $value14) {
                                                                foreach ($gastosOperativosGravados281340 as $value15) {
                                                                  foreach ($gastosOperativosGravados281340F as $value16) {

                                                                    $gastosOperativosGravados28N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados28N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados28N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados28N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados28N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados28N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados28NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados28NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados28N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados28N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados28N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados28N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados28N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados28N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados28N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados28N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados28Total = $gastosOperativosGravados28N6278 + $gastosOperativosGravados28N3450 + $gastosOperativosGravados28N0198 + $gastosOperativosGravados28NCaja + $gastosOperativosGravados28N1286 + $gastosOperativosGravados28N1219 + $gastosOperativosGravados28N0840 + $gastosOperativosGravados28N1340;
                                                                    $gastosOperativosGravados28TotalF = $gastosOperativosGravados28N6278F + $gastosOperativosGravados28N3450F + $gastosOperativosGravados28N0198F + $gastosOperativosGravados28NCajaF + $gastosOperativosGravados28N1286F + $gastosOperativosGravados28N1219F + $gastosOperativosGravados28N0840F + $gastosOperativosGravados28N1340F;
                                                                    $importesGastosOperativosGravados28 = $gastosOperativosGravados28Total + $gastosOperativosGravados28TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados28Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados28TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados28,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Seguridad Industrial y Salud</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados296278 = ControladorBanco6278::ctrGastosOperativosGravados29($item, $valor);
                                    $gastosOperativosGravados296278F = ControladorBanco6278::ctrGastosOperativosGravados29F($item, $valor);
                                    $gastosOperativosGravados293450 = ControladorBanco3450::ctrGastosOperativosGravados29($item, $valor);
                                    $gastosOperativosGravados293450F = ControladorBanco3450::ctrGastosOperativosGravados29F($item, $valor);
                                    $gastosOperativosGravados290198 = ControladorBanco0198::ctrGastosOperativosGravados29($item, $valor);
                                    $gastosOperativosGravados290198F = ControladorBanco0198::ctrGastosOperativosGravados29F($item, $valor);
                                    $gastosOperativosGravados29Caja = ControladorCaja::ctrGastosOperativosGravados29($item, $valor);
                                    $gastosOperativosGravados29CajaF = ControladorCaja::ctrGastosOperativosGravados29F($item, $valor);
                                    $gastosOperativosGravados291286 = ControladorBanco1286::ctrGastosOperativosGravados29($item, $valor);
                                    $gastosOperativosGravados291286F = ControladorBanco1286::ctrGastosOperativosGravados29F($item, $valor);
                                    $gastosOperativosGravados291219 = ControladorBanco1219::ctrGastosOperativosGravados29($item, $valor);
                                    $gastosOperativosGravados291219F = ControladorBanco1219::ctrGastosOperativosGravados29F($item, $valor);
                                    $gastosOperativosGravados290840 = ControladorBanco0840::ctrGastosOperativosGravados29($item, $valor);
                                    $gastosOperativosGravados290840F = ControladorBanco0840::ctrGastosOperativosGravados29F($item, $valor);
                                    $gastosOperativosGravados291340 = ControladorBanco1340::ctrGastosOperativosGravados29($item, $valor);
                                    $gastosOperativosGravados291340F = ControladorBanco1340::ctrGastosOperativosGravados29F($item, $valor);

                                    foreach ($gastosOperativosGravados296278 as $value) {
                                      foreach ($gastosOperativosGravados296278F as $value2) {
                                        foreach ($gastosOperativosGravados293450 as $value3) {
                                          foreach ($gastosOperativosGravados291340F as $value4) {
                                            foreach ($gastosOperativosGravados290198 as $value5) {
                                              foreach ($gastosOperativosGravados290198F as $value6) {
                                                foreach ($gastosOperativosGravados29Caja as $value7) {
                                                  foreach ($gastosOperativosGravados29CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados291286 as $value9) {
                                                      foreach ($gastosOperativosGravados291286F as $value10) {
                                                        foreach ($gastosOperativosGravados291219 as $value11) {
                                                          foreach ($gastosOperativosGravados291219F as $value12) {
                                                            foreach ($gastosOperativosGravados290840 as $value13) {
                                                              foreach ($gastosOperativosGravados290840F as $value14) {
                                                                foreach ($gastosOperativosGravados291340 as $value15) {
                                                                  foreach ($gastosOperativosGravados291340F as $value16) {

                                                                    $gastosOperativosGravados29N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados29N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados29N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados29N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados29N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados29N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados29NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados29NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados29N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados29N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados29N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados29N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados29N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados29N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados29N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados29N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados29Total = $gastosOperativosGravados29N6278 + $gastosOperativosGravados29N3450 + $gastosOperativosGravados29N0198 + $gastosOperativosGravados29NCaja + $gastosOperativosGravados29N1286 + $gastosOperativosGravados29N1219 + $gastosOperativosGravados29N0840 + $gastosOperativosGravados29N1340;
                                                                    $gastosOperativosGravados29TotalF = $gastosOperativosGravados29N6278F + $gastosOperativosGravados29N3450F + $gastosOperativosGravados29N0198F + $gastosOperativosGravados29NCajaF + $gastosOperativosGravados29N1286F + $gastosOperativosGravados29N1219F + $gastosOperativosGravados29N0840F + $gastosOperativosGravados29N1340F;
                                                                    $importesGastosOperativosGravados29 = $gastosOperativosGravados29Total + $gastosOperativosGravados29TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados29Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados29TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados29,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Seguros y Fianza</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados306278 = ControladorBanco6278::ctrGastosOperativosGravados30($item, $valor);
                                    $gastosOperativosGravados306278F = ControladorBanco6278::ctrGastosOperativosGravados30F($item, $valor);
                                    $gastosOperativosGravados303450 = ControladorBanco3450::ctrGastosOperativosGravados30($item, $valor);
                                    $gastosOperativosGravados303450F = ControladorBanco3450::ctrGastosOperativosGravados30F($item, $valor);
                                    $gastosOperativosGravados300198 = ControladorBanco0198::ctrGastosOperativosGravados30($item, $valor);
                                    $gastosOperativosGravados300198F = ControladorBanco0198::ctrGastosOperativosGravados30F($item, $valor);
                                    $gastosOperativosGravados30Caja = ControladorCaja::ctrGastosOperativosGravados30($item, $valor);
                                    $gastosOperativosGravados30CajaF = ControladorCaja::ctrGastosOperativosGravados30F($item, $valor);
                                    $gastosOperativosGravados301286 = ControladorBanco1286::ctrGastosOperativosGravados30($item, $valor);
                                    $gastosOperativosGravados301286F = ControladorBanco1286::ctrGastosOperativosGravados30F($item, $valor);
                                    $gastosOperativosGravados301219 = ControladorBanco1219::ctrGastosOperativosGravados30($item, $valor);
                                    $gastosOperativosGravados301219F = ControladorBanco1219::ctrGastosOperativosGravados30F($item, $valor);
                                    $gastosOperativosGravados300840 = ControladorBanco0840::ctrGastosOperativosGravados30($item, $valor);
                                    $gastosOperativosGravados300840F = ControladorBanco0840::ctrGastosOperativosGravados30F($item, $valor);
                                    $gastosOperativosGravados301340 = ControladorBanco1340::ctrGastosOperativosGravados30($item, $valor);
                                    $gastosOperativosGravados301340F = ControladorBanco1340::ctrGastosOperativosGravados30F($item, $valor);

                                    foreach ($gastosOperativosGravados306278 as $value) {
                                      foreach ($gastosOperativosGravados306278F as $value2) {
                                        foreach ($gastosOperativosGravados303450 as $value3) {
                                          foreach ($gastosOperativosGravados301340F as $value4) {
                                            foreach ($gastosOperativosGravados300198 as $value5) {
                                              foreach ($gastosOperativosGravados300198F as $value6) {
                                                foreach ($gastosOperativosGravados30Caja as $value7) {
                                                  foreach ($gastosOperativosGravados30CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados301286 as $value9) {
                                                      foreach ($gastosOperativosGravados301286F as $value10) {
                                                        foreach ($gastosOperativosGravados301219 as $value11) {
                                                          foreach ($gastosOperativosGravados301219F as $value12) {
                                                            foreach ($gastosOperativosGravados300840 as $value13) {
                                                              foreach ($gastosOperativosGravados300840F as $value14) {
                                                                foreach ($gastosOperativosGravados301340 as $value15) {
                                                                  foreach ($gastosOperativosGravados301340F as $value16) {

                                                                    $gastosOperativosGravados30N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados30N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados30N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados30N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados30N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados30N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados30NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados30NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados30N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados30N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados30N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados30N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados30N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados30N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados30N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados30N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados30Total = $gastosOperativosGravados30N6278 + $gastosOperativosGravados30N3450 + $gastosOperativosGravados30N0198 + $gastosOperativosGravados30NCaja + $gastosOperativosGravados30N1286 + $gastosOperativosGravados30N1219 + $gastosOperativosGravados30N0840 + $gastosOperativosGravados30N1340;
                                                                    $gastosOperativosGravados30TotalF = $gastosOperativosGravados30N6278F + $gastosOperativosGravados30N3450F + $gastosOperativosGravados30N0198F + $gastosOperativosGravados30NCajaF + $gastosOperativosGravados30N1286F + $gastosOperativosGravados30N1219F + $gastosOperativosGravados30N0840F + $gastosOperativosGravados30N1340F;
                                                                    $importesGastosOperativosGravados30 = $gastosOperativosGravados30Total + $gastosOperativosGravados30TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados30Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados30TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados30,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Sistema Software/Datos</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados316278 = ControladorBanco6278::ctrGastosOperativosGravados31($item, $valor);
                                    $gastosOperativosGravados316278F = ControladorBanco6278::ctrGastosOperativosGravados31F($item, $valor);
                                    $gastosOperativosGravados313450 = ControladorBanco3450::ctrGastosOperativosGravados31($item, $valor);
                                    $gastosOperativosGravados313450F = ControladorBanco3450::ctrGastosOperativosGravados31F($item, $valor);
                                    $gastosOperativosGravados310198 = ControladorBanco0198::ctrGastosOperativosGravados31($item, $valor);
                                    $gastosOperativosGravados310198F = ControladorBanco0198::ctrGastosOperativosGravados31F($item, $valor);
                                    $gastosOperativosGravados31Caja = ControladorCaja::ctrGastosOperativosGravados31($item, $valor);
                                    $gastosOperativosGravados31CajaF = ControladorCaja::ctrGastosOperativosGravados31F($item, $valor);
                                    $gastosOperativosGravados311286 = ControladorBanco1286::ctrGastosOperativosGravados31($item, $valor);
                                    $gastosOperativosGravados311286F = ControladorBanco1286::ctrGastosOperativosGravados31F($item, $valor);
                                    $gastosOperativosGravados311219 = ControladorBanco1219::ctrGastosOperativosGravados31($item, $valor);
                                    $gastosOperativosGravados311219F = ControladorBanco1219::ctrGastosOperativosGravados31F($item, $valor);
                                    $gastosOperativosGravados310840 = ControladorBanco0840::ctrGastosOperativosGravados31($item, $valor);
                                    $gastosOperativosGravados310840F = ControladorBanco0840::ctrGastosOperativosGravados31F($item, $valor);
                                    $gastosOperativosGravados311340 = ControladorBanco1340::ctrGastosOperativosGravados31($item, $valor);
                                    $gastosOperativosGravados311340F = ControladorBanco1340::ctrGastosOperativosGravados31F($item, $valor);

                                    foreach ($gastosOperativosGravados316278 as $value) {
                                      foreach ($gastosOperativosGravados316278F as $value2) {
                                        foreach ($gastosOperativosGravados313450 as $value3) {
                                          foreach ($gastosOperativosGravados311340F as $value4) {
                                            foreach ($gastosOperativosGravados310198 as $value5) {
                                              foreach ($gastosOperativosGravados310198F as $value6) {
                                                foreach ($gastosOperativosGravados31Caja as $value7) {
                                                  foreach ($gastosOperativosGravados31CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados311286 as $value9) {
                                                      foreach ($gastosOperativosGravados311286F as $value10) {
                                                        foreach ($gastosOperativosGravados311219 as $value11) {
                                                          foreach ($gastosOperativosGravados311219F as $value12) {
                                                            foreach ($gastosOperativosGravados310840 as $value13) {
                                                              foreach ($gastosOperativosGravados310840F as $value14) {
                                                                foreach ($gastosOperativosGravados311340 as $value15) {
                                                                  foreach ($gastosOperativosGravados311340F as $value16) {

                                                                    $gastosOperativosGravados31N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados31N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados31N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados31N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados31N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados31N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados31NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados31NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados31N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados31N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados31N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados31N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados31N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados31N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados31N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados31N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados31Total = $gastosOperativosGravados31N6278 + $gastosOperativosGravados31N3450 + $gastosOperativosGravados31N0198 + $gastosOperativosGravados31NCaja + $gastosOperativosGravados31N1286 + $gastosOperativosGravados31N1219 + $gastosOperativosGravados31N0840 + $gastosOperativosGravados31N1340;
                                                                    $gastosOperativosGravados31TotalF = $gastosOperativosGravados31N6278F + $gastosOperativosGravados31N3450F + $gastosOperativosGravados31N0198F + $gastosOperativosGravados31NCajaF + $gastosOperativosGravados31N1286F + $gastosOperativosGravados31N1219F + $gastosOperativosGravados31N0840F + $gastosOperativosGravados31N1340F;
                                                                    $importesGastosOperativosGravados31 = $gastosOperativosGravados31Total + $gastosOperativosGravados31TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados31Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados31TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados31,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Telefonia</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados326278 = ControladorBanco6278::ctrGastosOperativosGravados32($item, $valor);
                                    $gastosOperativosGravados326278F = ControladorBanco6278::ctrGastosOperativosGravados32F($item, $valor);
                                    $gastosOperativosGravados323450 = ControladorBanco3450::ctrGastosOperativosGravados32($item, $valor);
                                    $gastosOperativosGravados323450F = ControladorBanco3450::ctrGastosOperativosGravados32F($item, $valor);
                                    $gastosOperativosGravados320198 = ControladorBanco0198::ctrGastosOperativosGravados32($item, $valor);
                                    $gastosOperativosGravados320198F = ControladorBanco0198::ctrGastosOperativosGravados32F($item, $valor);
                                    $gastosOperativosGravados32Caja = ControladorCaja::ctrGastosOperativosGravados32($item, $valor);
                                    $gastosOperativosGravados32CajaF = ControladorCaja::ctrGastosOperativosGravados32F($item, $valor);
                                    $gastosOperativosGravados321286 = ControladorBanco1286::ctrGastosOperativosGravados32($item, $valor);
                                    $gastosOperativosGravados321286F = ControladorBanco1286::ctrGastosOperativosGravados32F($item, $valor);
                                    $gastosOperativosGravados321219 = ControladorBanco1219::ctrGastosOperativosGravados32($item, $valor);
                                    $gastosOperativosGravados321219F = ControladorBanco1219::ctrGastosOperativosGravados32F($item, $valor);
                                    $gastosOperativosGravados320840 = ControladorBanco0840::ctrGastosOperativosGravados32($item, $valor);
                                    $gastosOperativosGravados320840F = ControladorBanco0840::ctrGastosOperativosGravados32F($item, $valor);
                                    $gastosOperativosGravados321340 = ControladorBanco1340::ctrGastosOperativosGravados32($item, $valor);
                                    $gastosOperativosGravados321340F = ControladorBanco1340::ctrGastosOperativosGravados32F($item, $valor);

                                    foreach ($gastosOperativosGravados326278 as $value) {
                                      foreach ($gastosOperativosGravados326278F as $value2) {
                                        foreach ($gastosOperativosGravados323450 as $value3) {
                                          foreach ($gastosOperativosGravados321340F as $value4) {
                                            foreach ($gastosOperativosGravados320198 as $value5) {
                                              foreach ($gastosOperativosGravados320198F as $value6) {
                                                foreach ($gastosOperativosGravados32Caja as $value7) {
                                                  foreach ($gastosOperativosGravados32CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados321286 as $value9) {
                                                      foreach ($gastosOperativosGravados321286F as $value10) {
                                                        foreach ($gastosOperativosGravados321219 as $value11) {
                                                          foreach ($gastosOperativosGravados321219F as $value12) {
                                                            foreach ($gastosOperativosGravados320840 as $value13) {
                                                              foreach ($gastosOperativosGravados320840F as $value14) {
                                                                foreach ($gastosOperativosGravados321340 as $value15) {
                                                                  foreach ($gastosOperativosGravados321340F as $value16) {

                                                                    $gastosOperativosGravados32N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados32N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados32N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados32N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados32N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados32N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados32NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados32NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados32N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados32N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados32N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados32N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados32N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados32N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados32N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados32N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados32Total = $gastosOperativosGravados32N6278 + $gastosOperativosGravados32N3450 + $gastosOperativosGravados32N0198 + $gastosOperativosGravados32NCaja + $gastosOperativosGravados32N1286 + $gastosOperativosGravados32N1219 + $gastosOperativosGravados32N0840 + $gastosOperativosGravados32N1340;
                                                                    $gastosOperativosGravados32TotalF = $gastosOperativosGravados32N6278F + $gastosOperativosGravados32N3450F + $gastosOperativosGravados32N0198F + $gastosOperativosGravados32NCajaF + $gastosOperativosGravados32N1286F + $gastosOperativosGravados32N1219F + $gastosOperativosGravados32N0840F + $gastosOperativosGravados32N1340F;
                                                                    $importesGastosOperativosGravados32 = $gastosOperativosGravados32Total + $gastosOperativosGravados32TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados32Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados32TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados32,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Uniformes</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados336278 = ControladorBanco6278::ctrGastosOperativosGravados33($item, $valor);
                                    $gastosOperativosGravados336278F = ControladorBanco6278::ctrGastosOperativosGravados33F($item, $valor);
                                    $gastosOperativosGravados333450 = ControladorBanco3450::ctrGastosOperativosGravados33($item, $valor);
                                    $gastosOperativosGravados333450F = ControladorBanco3450::ctrGastosOperativosGravados33F($item, $valor);
                                    $gastosOperativosGravados330198 = ControladorBanco0198::ctrGastosOperativosGravados33($item, $valor);
                                    $gastosOperativosGravados330198F = ControladorBanco0198::ctrGastosOperativosGravados33F($item, $valor);
                                    $gastosOperativosGravados33Caja = ControladorCaja::ctrGastosOperativosGravados33($item, $valor);
                                    $gastosOperativosGravados33CajaF = ControladorCaja::ctrGastosOperativosGravados33F($item, $valor);
                                    $gastosOperativosGravados331286 = ControladorBanco1286::ctrGastosOperativosGravados33($item, $valor);
                                    $gastosOperativosGravados331286F = ControladorBanco1286::ctrGastosOperativosGravados33F($item, $valor);
                                    $gastosOperativosGravados331219 = ControladorBanco1219::ctrGastosOperativosGravados33($item, $valor);
                                    $gastosOperativosGravados331219F = ControladorBanco1219::ctrGastosOperativosGravados33F($item, $valor);
                                    $gastosOperativosGravados330840 = ControladorBanco0840::ctrGastosOperativosGravados33($item, $valor);
                                    $gastosOperativosGravados330840F = ControladorBanco0840::ctrGastosOperativosGravados33F($item, $valor);
                                    $gastosOperativosGravados331340 = ControladorBanco1340::ctrGastosOperativosGravados33($item, $valor);
                                    $gastosOperativosGravados331340F = ControladorBanco1340::ctrGastosOperativosGravados33F($item, $valor);

                                    foreach ($gastosOperativosGravados336278 as $value) {
                                      foreach ($gastosOperativosGravados336278F as $value2) {
                                        foreach ($gastosOperativosGravados333450 as $value3) {
                                          foreach ($gastosOperativosGravados331340F as $value4) {
                                            foreach ($gastosOperativosGravados330198 as $value5) {
                                              foreach ($gastosOperativosGravados330198F as $value6) {
                                                foreach ($gastosOperativosGravados33Caja as $value7) {
                                                  foreach ($gastosOperativosGravados33CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados331286 as $value9) {
                                                      foreach ($gastosOperativosGravados331286F as $value10) {
                                                        foreach ($gastosOperativosGravados331219 as $value11) {
                                                          foreach ($gastosOperativosGravados331219F as $value12) {
                                                            foreach ($gastosOperativosGravados330840 as $value13) {
                                                              foreach ($gastosOperativosGravados330840F as $value14) {
                                                                foreach ($gastosOperativosGravados331340 as $value15) {
                                                                  foreach ($gastosOperativosGravados331340F as $value16) {

                                                                    $gastosOperativosGravados33N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados33N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados33N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados33N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados33N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados33N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados33NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados33NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados33N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados33N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados33N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados33N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados33N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados33N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados33N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados33N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados33Total = $gastosOperativosGravados33N6278 + $gastosOperativosGravados33N3450 + $gastosOperativosGravados33N0198 + $gastosOperativosGravados33NCaja + $gastosOperativosGravados33N1286 + $gastosOperativosGravados33N1219 + $gastosOperativosGravados33N0840 + $gastosOperativosGravados33N1340;
                                                                    $gastosOperativosGravados33TotalF = $gastosOperativosGravados33N6278F + $gastosOperativosGravados33N3450F + $gastosOperativosGravados33N0198F + $gastosOperativosGravados33NCajaF + $gastosOperativosGravados33N1286F + $gastosOperativosGravados33N1219F + $gastosOperativosGravados33N0840F + $gastosOperativosGravados33N1340F;
                                                                    $importesGastosOperativosGravados33 = $gastosOperativosGravados33Total + $gastosOperativosGravados33TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados33Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados33TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados33,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Viaticos (Cosumo-Hospedaje-Pasaje-Vias)</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados346278 = ControladorBanco6278::ctrGastosOperativosGravados34($item, $valor);
                                    $gastosOperativosGravados346278F = ControladorBanco6278::ctrGastosOperativosGravados34F($item, $valor);
                                    $gastosOperativosGravados343450 = ControladorBanco3450::ctrGastosOperativosGravados34($item, $valor);
                                    $gastosOperativosGravados343450F = ControladorBanco3450::ctrGastosOperativosGravados34F($item, $valor);
                                    $gastosOperativosGravados340198 = ControladorBanco0198::ctrGastosOperativosGravados34($item, $valor);
                                    $gastosOperativosGravados340198F = ControladorBanco0198::ctrGastosOperativosGravados34F($item, $valor);
                                    $gastosOperativosGravados34Caja = ControladorCaja::ctrGastosOperativosGravados34($item, $valor);
                                    $gastosOperativosGravados34CajaF = ControladorCaja::ctrGastosOperativosGravados34F($item, $valor);
                                    $gastosOperativosGravados341286 = ControladorBanco1286::ctrGastosOperativosGravados34($item, $valor);
                                    $gastosOperativosGravados341286F = ControladorBanco1286::ctrGastosOperativosGravados34F($item, $valor);
                                    $gastosOperativosGravados341219 = ControladorBanco1219::ctrGastosOperativosGravados34($item, $valor);
                                    $gastosOperativosGravados341219F = ControladorBanco1219::ctrGastosOperativosGravados34F($item, $valor);
                                    $gastosOperativosGravados340840 = ControladorBanco0840::ctrGastosOperativosGravados34($item, $valor);
                                    $gastosOperativosGravados340840F = ControladorBanco0840::ctrGastosOperativosGravados34F($item, $valor);
                                    $gastosOperativosGravados341340 = ControladorBanco1340::ctrGastosOperativosGravados34($item, $valor);
                                    $gastosOperativosGravados341340F = ControladorBanco1340::ctrGastosOperativosGravados34F($item, $valor);

                                    foreach ($gastosOperativosGravados346278 as $value) {
                                      foreach ($gastosOperativosGravados346278F as $value2) {
                                        foreach ($gastosOperativosGravados343450 as $value3) {
                                          foreach ($gastosOperativosGravados341340F as $value4) {
                                            foreach ($gastosOperativosGravados340198 as $value5) {
                                              foreach ($gastosOperativosGravados340198F as $value6) {
                                                foreach ($gastosOperativosGravados34Caja as $value7) {
                                                  foreach ($gastosOperativosGravados34CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados341286 as $value9) {
                                                      foreach ($gastosOperativosGravados341286F as $value10) {
                                                        foreach ($gastosOperativosGravados341219 as $value11) {
                                                          foreach ($gastosOperativosGravados341219F as $value12) {
                                                            foreach ($gastosOperativosGravados340840 as $value13) {
                                                              foreach ($gastosOperativosGravados340840F as $value14) {
                                                                foreach ($gastosOperativosGravados341340 as $value15) {
                                                                  foreach ($gastosOperativosGravados341340F as $value16) {

                                                                    $gastosOperativosGravados34N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados34N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados34N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados34N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados34N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados34N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados34NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados34NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados34N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados34N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados34N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados34N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados34N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados34N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados34N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados34N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados34Total = $gastosOperativosGravados34N6278 + $gastosOperativosGravados34N3450 + $gastosOperativosGravados34N0198 + $gastosOperativosGravados34NCaja + $gastosOperativosGravados34N1286 + $gastosOperativosGravados34N1219 + $gastosOperativosGravados34N0840 + $gastosOperativosGravados34N1340;
                                                                    $gastosOperativosGravados34TotalF = $gastosOperativosGravados34N6278F + $gastosOperativosGravados34N3450F + $gastosOperativosGravados34N0198F + $gastosOperativosGravados34NCajaF + $gastosOperativosGravados34N1286F + $gastosOperativosGravados34N1219F + $gastosOperativosGravados34N0840F + $gastosOperativosGravados34N1340F;
                                                                    $importesGastosOperativosGravados34 = $gastosOperativosGravados34Total + $gastosOperativosGravados34TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados34Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados34TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados34,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>04. Gastos Operativos Gravados  Vigilancia y Seguridad</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosGravados356278 = ControladorBanco6278::ctrGastosOperativosGravados35($item, $valor);
                                    $gastosOperativosGravados356278F = ControladorBanco6278::ctrGastosOperativosGravados35F($item, $valor);
                                    $gastosOperativosGravados353450 = ControladorBanco3450::ctrGastosOperativosGravados35($item, $valor);
                                    $gastosOperativosGravados353450F = ControladorBanco3450::ctrGastosOperativosGravados35F($item, $valor);
                                    $gastosOperativosGravados350198 = ControladorBanco0198::ctrGastosOperativosGravados35($item, $valor);
                                    $gastosOperativosGravados350198F = ControladorBanco0198::ctrGastosOperativosGravados35F($item, $valor);
                                    $gastosOperativosGravados35Caja = ControladorCaja::ctrGastosOperativosGravados35($item, $valor);
                                    $gastosOperativosGravados35CajaF = ControladorCaja::ctrGastosOperativosGravados35F($item, $valor);
                                    $gastosOperativosGravados351286 = ControladorBanco1286::ctrGastosOperativosGravados35($item, $valor);
                                    $gastosOperativosGravados351286F = ControladorBanco1286::ctrGastosOperativosGravados35F($item, $valor);
                                    $gastosOperativosGravados351219 = ControladorBanco1219::ctrGastosOperativosGravados35($item, $valor);
                                    $gastosOperativosGravados351219F = ControladorBanco1219::ctrGastosOperativosGravados35F($item, $valor);
                                    $gastosOperativosGravados350840 = ControladorBanco0840::ctrGastosOperativosGravados35($item, $valor);
                                    $gastosOperativosGravados350840F = ControladorBanco0840::ctrGastosOperativosGravados35F($item, $valor);
                                    $gastosOperativosGravados351340 = ControladorBanco1340::ctrGastosOperativosGravados35($item, $valor);
                                    $gastosOperativosGravados351340F = ControladorBanco1340::ctrGastosOperativosGravados35F($item, $valor);

                                    foreach ($gastosOperativosGravados356278 as $value) {
                                      foreach ($gastosOperativosGravados356278F as $value2) {
                                        foreach ($gastosOperativosGravados353450 as $value3) {
                                          foreach ($gastosOperativosGravados351340F as $value4) {
                                            foreach ($gastosOperativosGravados350198 as $value5) {
                                              foreach ($gastosOperativosGravados350198F as $value6) {
                                                foreach ($gastosOperativosGravados35Caja as $value7) {
                                                  foreach ($gastosOperativosGravados35CajaF as $value8) {
                                                    foreach ($gastosOperativosGravados351286 as $value9) {
                                                      foreach ($gastosOperativosGravados351286F as $value10) {
                                                        foreach ($gastosOperativosGravados351219 as $value11) {
                                                          foreach ($gastosOperativosGravados351219F as $value12) {
                                                            foreach ($gastosOperativosGravados350840 as $value13) {
                                                              foreach ($gastosOperativosGravados350840F as $value14) {
                                                                foreach ($gastosOperativosGravados351340 as $value15) {
                                                                  foreach ($gastosOperativosGravados351340F as $value16) {

                                                                    $gastosOperativosGravados35N6278 = $value["egresos"];
                                                                    $gastosOperativosGravados35N6278F = $value2["egresos"];
                                                                    $gastosOperativosGravados35N3450 = $value3["egresos"];
                                                                    $gastosOperativosGravados35N3450F = $value4["egresos"];
                                                                    $gastosOperativosGravados35N0198 = $value5["egresos"];
                                                                    $gastosOperativosGravados35N0198F = $value6["egresos"];
                                                                    $gastosOperativosGravados35NCaja = $value7["egresos"];
                                                                    $gastosOperativosGravados35NCajaF = $value8["egresos"];
                                                                    $gastosOperativosGravados35N1286 = $value9["egresos"];
                                                                    $gastosOperativosGravados35N1286F = $value10["egresos"];
                                                                    $gastosOperativosGravados35N1219 = $value11["egresos"];
                                                                    $gastosOperativosGravados35N1219F = $value12["egresos"];
                                                                    $gastosOperativosGravados35N0840 = $value13["egresos"];
                                                                    $gastosOperativosGravados35N0840F = $value14["egresos"];
                                                                    $gastosOperativosGravados35N1340 = $value15["egresos"];
                                                                    $gastosOperativosGravados35N1340F = $value16["egresos"];

                                                                    $gastosOperativosGravados35Total = $gastosOperativosGravados35N6278 + $gastosOperativosGravados35N3450 + $gastosOperativosGravados35N0198 + $gastosOperativosGravados35NCaja + $gastosOperativosGravados35N1286 + $gastosOperativosGravados35N1219 + $gastosOperativosGravados35N0840 + $gastosOperativosGravados35N1340;
                                                                    $gastosOperativosGravados35TotalF = $gastosOperativosGravados35N6278F + $gastosOperativosGravados35N3450F + $gastosOperativosGravados35N0198F + $gastosOperativosGravados35NCajaF + $gastosOperativosGravados35N1286F + $gastosOperativosGravados35N1219F + $gastosOperativosGravados35N0840F + $gastosOperativosGravados35N1340F;
                                                                    $importesGastosOperativosGravados35 = $gastosOperativosGravados35Total + $gastosOperativosGravados35TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosGravados35Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosGravados35TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosGravados35,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>05. Gastos Operativos Exentos  Agua</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosExentos16278 = ControladorBanco6278::ctrGastosOperativosExentos1($item, $valor);
                                    $gastosOperativosExentos16278F = ControladorBanco6278::ctrGastosOperativosExentos1F($item, $valor);
                                    $gastosOperativosExentos13450 = ControladorBanco3450::ctrGastosOperativosExentos1($item, $valor);
                                    $gastosOperativosExentos13450F = ControladorBanco3450::ctrGastosOperativosExentos1F($item, $valor);
                                    $gastosOperativosExentos10198 = ControladorBanco0198::ctrGastosOperativosExentos1($item, $valor);
                                    $gastosOperativosExentos10198F = ControladorBanco0198::ctrGastosOperativosExentos1F($item, $valor);
                                    $gastosOperativosExentos1Caja = ControladorCaja::ctrGastosOperativosExentos1($item, $valor);
                                    $gastosOperativosExentos1CajaF = ControladorCaja::ctrGastosOperativosExentos1F($item, $valor);
                                    $gastosOperativosExentos11286 = ControladorBanco1286::ctrGastosOperativosExentos1($item, $valor);
                                    $gastosOperativosExentos11286F = ControladorBanco1286::ctrGastosOperativosExentos1F($item, $valor);
                                    $gastosOperativosExentos11219 = ControladorBanco1219::ctrGastosOperativosExentos1($item, $valor);
                                    $gastosOperativosExentos11219F = ControladorBanco1219::ctrGastosOperativosExentos1F($item, $valor);
                                    $gastosOperativosExentos10840 = ControladorBanco0840::ctrGastosOperativosExentos1($item, $valor);
                                    $gastosOperativosExentos10840F = ControladorBanco0840::ctrGastosOperativosExentos1F($item, $valor);
                                    $gastosOperativosExentos11340 = ControladorBanco1340::ctrGastosOperativosExentos1($item, $valor);
                                    $gastosOperativosExentos11340F = ControladorBanco1340::ctrGastosOperativosExentos1F($item, $valor);

                                    foreach ($gastosOperativosExentos16278 as $value) {
                                      foreach ($gastosOperativosExentos16278F as $value2) {
                                        foreach ($gastosOperativosExentos13450 as $value3) {
                                          foreach ($gastosOperativosExentos11340F as $value4) {
                                            foreach ($gastosOperativosExentos10198 as $value5) {
                                              foreach ($gastosOperativosExentos10198F as $value6) {
                                                foreach ($gastosOperativosExentos1Caja as $value7) {
                                                  foreach ($gastosOperativosExentos1CajaF as $value8) {
                                                    foreach ($gastosOperativosExentos11286 as $value9) {
                                                      foreach ($gastosOperativosExentos11286F as $value10) {
                                                        foreach ($gastosOperativosExentos11219 as $value11) {
                                                          foreach ($gastosOperativosExentos11219F as $value12) {
                                                            foreach ($gastosOperativosExentos10840 as $value13) {
                                                              foreach ($gastosOperativosExentos10840F as $value14) {
                                                                foreach ($gastosOperativosExentos11340 as $value15) {
                                                                  foreach ($gastosOperativosExentos11340F as $value16) {

                                                                    $gastosOperativosExentos1N6278 = $value["egresos"];
                                                                    $gastosOperativosExentos1N6278F = $value2["egresos"];
                                                                    $gastosOperativosExentos1N3450 = $value3["egresos"];
                                                                    $gastosOperativosExentos1N3450F = $value4["egresos"];
                                                                    $gastosOperativosExentos1N0198 = $value5["egresos"];
                                                                    $gastosOperativosExentos1N0198F = $value6["egresos"];
                                                                    $gastosOperativosExentos1NCaja = $value7["egresos"];
                                                                    $gastosOperativosExentos1NCajaF = $value8["egresos"];
                                                                    $gastosOperativosExentos1N1286 = $value9["egresos"];
                                                                    $gastosOperativosExentos1N1286F = $value10["egresos"];
                                                                    $gastosOperativosExentos1N1219 = $value11["egresos"];
                                                                    $gastosOperativosExentos1N1219F = $value12["egresos"];
                                                                    $gastosOperativosExentos1N0840 = $value13["egresos"];
                                                                    $gastosOperativosExentos1N0840F = $value14["egresos"];
                                                                    $gastosOperativosExentos1N1340 = $value15["egresos"];
                                                                    $gastosOperativosExentos1N1340F = $value16["egresos"];

                                                                    $gastosOperativosExentos1Total = $gastosOperativosExentos1N6278 + $gastosOperativosExentos1N3450 + $gastosOperativosExentos1N0198 + $gastosOperativosExentos1NCaja + $gastosOperativosExentos1N1286 + $gastosOperativosExentos1N1219 + $gastosOperativosExentos1N0840 + $gastosOperativosExentos1N1340;
                                                                    $gastosOperativosExentos1TotalF = $gastosOperativosExentos1N6278F + $gastosOperativosExentos1N3450F + $gastosOperativosExentos1N0198F + $gastosOperativosExentos1NCajaF + $gastosOperativosExentos1N1286F + $gastosOperativosExentos1N1219F + $gastosOperativosExentos1N0840F + $gastosOperativosExentos1N1340F;
                                                                    $importesGastosOperativosExentos1 = $gastosOperativosExentos1Total + $gastosOperativosExentos1TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosExentos1Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosExentos1TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosExentos1,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>05. Gastos Operativos Exentos  Control y Verificacion Vehicular</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosExentos26278 = ControladorBanco6278::ctrGastosOperativosExentos2($item, $valor);
                                    $gastosOperativosExentos26278F = ControladorBanco6278::ctrGastosOperativosExentos2F($item, $valor);
                                    $gastosOperativosExentos23450 = ControladorBanco3450::ctrGastosOperativosExentos2($item, $valor);
                                    $gastosOperativosExentos23450F = ControladorBanco3450::ctrGastosOperativosExentos2F($item, $valor);
                                    $gastosOperativosExentos20198 = ControladorBanco0198::ctrGastosOperativosExentos2($item, $valor);
                                    $gastosOperativosExentos20198F = ControladorBanco0198::ctrGastosOperativosExentos2F($item, $valor);
                                    $gastosOperativosExentos2Caja = ControladorCaja::ctrGastosOperativosExentos2($item, $valor);
                                    $gastosOperativosExentos2CajaF = ControladorCaja::ctrGastosOperativosExentos2F($item, $valor);
                                    $gastosOperativosExentos21286 = ControladorBanco1286::ctrGastosOperativosExentos2($item, $valor);
                                    $gastosOperativosExentos21286F = ControladorBanco1286::ctrGastosOperativosExentos2F($item, $valor);
                                    $gastosOperativosExentos21219 = ControladorBanco1219::ctrGastosOperativosExentos2($item, $valor);
                                    $gastosOperativosExentos21219F = ControladorBanco1219::ctrGastosOperativosExentos2F($item, $valor);
                                    $gastosOperativosExentos20840 = ControladorBanco0840::ctrGastosOperativosExentos2($item, $valor);
                                    $gastosOperativosExentos20840F = ControladorBanco0840::ctrGastosOperativosExentos2F($item, $valor);
                                    $gastosOperativosExentos21340 = ControladorBanco1340::ctrGastosOperativosExentos2($item, $valor);
                                    $gastosOperativosExentos21340F = ControladorBanco1340::ctrGastosOperativosExentos2F($item, $valor);

                                    foreach ($gastosOperativosExentos26278 as $value) {
                                      foreach ($gastosOperativosExentos26278F as $value2) {
                                        foreach ($gastosOperativosExentos23450 as $value3) {
                                          foreach ($gastosOperativosExentos21340F as $value4) {
                                            foreach ($gastosOperativosExentos20198 as $value5) {
                                              foreach ($gastosOperativosExentos20198F as $value6) {
                                                foreach ($gastosOperativosExentos2Caja as $value7) {
                                                  foreach ($gastosOperativosExentos2CajaF as $value8) {
                                                    foreach ($gastosOperativosExentos21286 as $value9) {
                                                      foreach ($gastosOperativosExentos21286F as $value10) {
                                                        foreach ($gastosOperativosExentos21219 as $value11) {
                                                          foreach ($gastosOperativosExentos21219F as $value12) {
                                                            foreach ($gastosOperativosExentos20840 as $value13) {
                                                              foreach ($gastosOperativosExentos20840F as $value14) {
                                                                foreach ($gastosOperativosExentos21340 as $value15) {
                                                                  foreach ($gastosOperativosExentos21340F as $value16) {

                                                                    $gastosOperativosExentos2N6278 = $value["egresos"];
                                                                    $gastosOperativosExentos2N6278F = $value2["egresos"];
                                                                    $gastosOperativosExentos2N3450 = $value3["egresos"];
                                                                    $gastosOperativosExentos2N3450F = $value4["egresos"];
                                                                    $gastosOperativosExentos2N0198 = $value5["egresos"];
                                                                    $gastosOperativosExentos2N0198F = $value6["egresos"];
                                                                    $gastosOperativosExentos2NCaja = $value7["egresos"];
                                                                    $gastosOperativosExentos2NCajaF = $value8["egresos"];
                                                                    $gastosOperativosExentos2N1286 = $value9["egresos"];
                                                                    $gastosOperativosExentos2N1286F = $value10["egresos"];
                                                                    $gastosOperativosExentos2N1219 = $value11["egresos"];
                                                                    $gastosOperativosExentos2N1219F = $value12["egresos"];
                                                                    $gastosOperativosExentos2N0840 = $value13["egresos"];
                                                                    $gastosOperativosExentos2N0840F = $value14["egresos"];
                                                                    $gastosOperativosExentos2N1340 = $value15["egresos"];
                                                                    $gastosOperativosExentos2N1340F = $value16["egresos"];

                                                                    $gastosOperativosExentos2Total = $gastosOperativosExentos2N6278 + $gastosOperativosExentos2N3450 + $gastosOperativosExentos2N0198 + $gastosOperativosExentos2NCaja + $gastosOperativosExentos2N1286 + $gastosOperativosExentos2N1219 + $gastosOperativosExentos2N0840 + $gastosOperativosExentos2N1340;
                                                                    $gastosOperativosExentos2TotalF = $gastosOperativosExentos2N6278F + $gastosOperativosExentos2N3450F + $gastosOperativosExentos2N0198F + $gastosOperativosExentos2NCajaF + $gastosOperativosExentos2N1286F + $gastosOperativosExentos2N1219F + $gastosOperativosExentos2N0840F + $gastosOperativosExentos2N1340F;
                                                                    $importesGastosOperativosExentos2 = $gastosOperativosExentos2Total + $gastosOperativosExentos2TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosExentos2Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosExentos2TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosExentos2,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>05. Gastos Operativos Exentos  Gastos Diversos (SIN IVA)</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativosExentos36278 = ControladorBanco6278::ctrGastosOperativosExentos3($item, $valor);
                                    $gastosOperativosExentos36278F = ControladorBanco6278::ctrGastosOperativosExentos3F($item, $valor);
                                    $gastosOperativosExentos33450 = ControladorBanco3450::ctrGastosOperativosExentos3($item, $valor);
                                    $gastosOperativosExentos33450F = ControladorBanco3450::ctrGastosOperativosExentos3F($item, $valor);
                                    $gastosOperativosExentos30198 = ControladorBanco0198::ctrGastosOperativosExentos3($item, $valor);
                                    $gastosOperativosExentos30198F = ControladorBanco0198::ctrGastosOperativosExentos3F($item, $valor);
                                    $gastosOperativosExentos3Caja = ControladorCaja::ctrGastosOperativosExentos3($item, $valor);
                                    $gastosOperativosExentos3CajaF = ControladorCaja::ctrGastosOperativosExentos3F($item, $valor);
                                    $gastosOperativosExentos31286 = ControladorBanco1286::ctrGastosOperativosExentos3($item, $valor);
                                    $gastosOperativosExentos31286F = ControladorBanco1286::ctrGastosOperativosExentos3F($item, $valor);
                                    $gastosOperativosExentos31219 = ControladorBanco1219::ctrGastosOperativosExentos3($item, $valor);
                                    $gastosOperativosExentos31219F = ControladorBanco1219::ctrGastosOperativosExentos3F($item, $valor);
                                    $gastosOperativosExentos30840 = ControladorBanco0840::ctrGastosOperativosExentos3($item, $valor);
                                    $gastosOperativosExentos30840F = ControladorBanco0840::ctrGastosOperativosExentos3F($item, $valor);
                                    $gastosOperativosExentos31340 = ControladorBanco1340::ctrGastosOperativosExentos3($item, $valor);
                                    $gastosOperativosExentos31340F = ControladorBanco1340::ctrGastosOperativosExentos3F($item, $valor);

                                    foreach ($gastosOperativosExentos36278 as $value) {
                                      foreach ($gastosOperativosExentos36278F as $value2) {
                                        foreach ($gastosOperativosExentos33450 as $value3) {
                                          foreach ($gastosOperativosExentos31340F as $value4) {
                                            foreach ($gastosOperativosExentos30198 as $value5) {
                                              foreach ($gastosOperativosExentos30198F as $value6) {
                                                foreach ($gastosOperativosExentos3Caja as $value7) {
                                                  foreach ($gastosOperativosExentos3CajaF as $value8) {
                                                    foreach ($gastosOperativosExentos31286 as $value9) {
                                                      foreach ($gastosOperativosExentos31286F as $value10) {
                                                        foreach ($gastosOperativosExentos31219 as $value11) {
                                                          foreach ($gastosOperativosExentos31219F as $value12) {
                                                            foreach ($gastosOperativosExentos30840 as $value13) {
                                                              foreach ($gastosOperativosExentos30840F as $value14) {
                                                                foreach ($gastosOperativosExentos31340 as $value15) {
                                                                  foreach ($gastosOperativosExentos31340F as $value16) {

                                                                    $gastosOperativosExentos3N6278 = $value["egresos"];
                                                                    $gastosOperativosExentos3N6278F = $value2["egresos"];
                                                                    $gastosOperativosExentos3N3450 = $value3["egresos"];
                                                                    $gastosOperativosExentos3N3450F = $value4["egresos"];
                                                                    $gastosOperativosExentos3N0198 = $value5["egresos"];
                                                                    $gastosOperativosExentos3N0198F = $value6["egresos"];
                                                                    $gastosOperativosExentos3NCaja = $value7["egresos"];
                                                                    $gastosOperativosExentos3NCajaF = $value8["egresos"];
                                                                    $gastosOperativosExentos3N1286 = $value9["egresos"];
                                                                    $gastosOperativosExentos3N1286F = $value10["egresos"];
                                                                    $gastosOperativosExentos3N1219 = $value11["egresos"];
                                                                    $gastosOperativosExentos3N1219F = $value12["egresos"];
                                                                    $gastosOperativosExentos3N0840 = $value13["egresos"];
                                                                    $gastosOperativosExentos3N0840F = $value14["egresos"];
                                                                    $gastosOperativosExentos3N1340 = $value15["egresos"];
                                                                    $gastosOperativosExentos3N1340F = $value16["egresos"];

                                                                    $gastosOperativosExentos3Total = $gastosOperativosExentos3N6278 + $gastosOperativosExentos3N3450 + $gastosOperativosExentos3N0198 + $gastosOperativosExentos3NCaja + $gastosOperativosExentos3N1286 + $gastosOperativosExentos3N1219 + $gastosOperativosExentos3N0840 + $gastosOperativosExentos3N1340;
                                                                    $gastosOperativosExentos3TotalF = $gastosOperativosExentos3N6278F + $gastosOperativosExentos3N3450F + $gastosOperativosExentos3N0198F + $gastosOperativosExentos3NCajaF + $gastosOperativosExentos3N1286F + $gastosOperativosExentos3N1219F + $gastosOperativosExentos3N0840F + $gastosOperativosExentos3N1340F;
                                                                    $importesGastosOperativosExentos3 = $gastosOperativosExentos3Total + $gastosOperativosExentos3TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativosExentos3Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativosExentos3TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativosExentos3,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>06. Gastos Impuestos Locales  Cuotas SIEM Empresarial</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosImpuestosLocales16278 = ControladorBanco6278::ctrGastosImpuestosLocales1($item, $valor);
                                    $gastosImpuestosLocales16278F = ControladorBanco6278::ctrGastosImpuestosLocales1F($item, $valor);
                                    $gastosImpuestosLocales13450 = ControladorBanco3450::ctrGastosImpuestosLocales1($item, $valor);
                                    $gastosImpuestosLocales13450F = ControladorBanco3450::ctrGastosImpuestosLocales1F($item, $valor);
                                    $gastosImpuestosLocales10198 = ControladorBanco0198::ctrGastosImpuestosLocales1($item, $valor);
                                    $gastosImpuestosLocales10198F = ControladorBanco0198::ctrGastosImpuestosLocales1F($item, $valor);
                                    $gastosImpuestosLocales1Caja = ControladorCaja::ctrGastosImpuestosLocales1($item, $valor);
                                    $gastosImpuestosLocales1CajaF = ControladorCaja::ctrGastosImpuestosLocales1F($item, $valor);
                                    $gastosImpuestosLocales11286 = ControladorBanco1286::ctrGastosImpuestosLocales1($item, $valor);
                                    $gastosImpuestosLocales11286F = ControladorBanco1286::ctrGastosImpuestosLocales1F($item, $valor);
                                    $gastosImpuestosLocales11219 = ControladorBanco1219::ctrGastosImpuestosLocales1($item, $valor);
                                    $gastosImpuestosLocales11219F = ControladorBanco1219::ctrGastosImpuestosLocales1F($item, $valor);
                                    $gastosImpuestosLocales10840 = ControladorBanco0840::ctrGastosImpuestosLocales1($item, $valor);
                                    $gastosImpuestosLocales10840F = ControladorBanco0840::ctrGastosImpuestosLocales1F($item, $valor);
                                    $gastosImpuestosLocales11340 = ControladorBanco1340::ctrGastosImpuestosLocales1($item, $valor);
                                    $gastosImpuestosLocales11340F = ControladorBanco1340::ctrGastosImpuestosLocales1F($item, $valor);

                                    foreach ($gastosImpuestosLocales16278 as $value) {
                                      foreach ($gastosImpuestosLocales16278F as $value2) {
                                        foreach ($gastosImpuestosLocales13450 as $value3) {
                                          foreach ($gastosImpuestosLocales11340F as $value4) {
                                            foreach ($gastosImpuestosLocales10198 as $value5) {
                                              foreach ($gastosImpuestosLocales10198F as $value6) {
                                                foreach ($gastosImpuestosLocales1Caja as $value7) {
                                                  foreach ($gastosImpuestosLocales1CajaF as $value8) {
                                                    foreach ($gastosImpuestosLocales11286 as $value9) {
                                                      foreach ($gastosImpuestosLocales11286F as $value10) {
                                                        foreach ($gastosImpuestosLocales11219 as $value11) {
                                                          foreach ($gastosImpuestosLocales11219F as $value12) {
                                                            foreach ($gastosImpuestosLocales10840 as $value13) {
                                                              foreach ($gastosImpuestosLocales10840F as $value14) {
                                                                foreach ($gastosImpuestosLocales11340 as $value15) {
                                                                  foreach ($gastosImpuestosLocales11340F as $value16) {

                                                                    $gastosImpuestosLocales1N6278 = $value["egresos"];
                                                                    $gastosImpuestosLocales1N6278F = $value2["egresos"];
                                                                    $gastosImpuestosLocales1N3450 = $value3["egresos"];
                                                                    $gastosImpuestosLocales1N3450F = $value4["egresos"];
                                                                    $gastosImpuestosLocales1N0198 = $value5["egresos"];
                                                                    $gastosImpuestosLocales1N0198F = $value6["egresos"];
                                                                    $gastosImpuestosLocales1NCaja = $value7["egresos"];
                                                                    $gastosImpuestosLocales1NCajaF = $value8["egresos"];
                                                                    $gastosImpuestosLocales1N1286 = $value9["egresos"];
                                                                    $gastosImpuestosLocales1N1286F = $value10["egresos"];
                                                                    $gastosImpuestosLocales1N1219 = $value11["egresos"];
                                                                    $gastosImpuestosLocales1N1219F = $value12["egresos"];
                                                                    $gastosImpuestosLocales1N0840 = $value13["egresos"];
                                                                    $gastosImpuestosLocales1N0840F = $value14["egresos"];
                                                                    $gastosImpuestosLocales1N1340 = $value15["egresos"];
                                                                    $gastosImpuestosLocales1N1340F = $value16["egresos"];

                                                                    $gastosImpuestosLocales1Total = $gastosImpuestosLocales1N6278 + $gastosImpuestosLocales1N3450 + $gastosImpuestosLocales1N0198 + $gastosImpuestosLocales1NCaja + $gastosImpuestosLocales1N1286 + $gastosImpuestosLocales1N1219 + $gastosImpuestosLocales1N0840 + $gastosImpuestosLocales1N1340;
                                                                    $gastosImpuestosLocales1TotalF = $gastosImpuestosLocales1N6278F + $gastosImpuestosLocales1N3450F + $gastosImpuestosLocales1N0198F + $gastosImpuestosLocales1NCajaF + $gastosImpuestosLocales1N1286F + $gastosImpuestosLocales1N1219F + $gastosImpuestosLocales1N0840F + $gastosImpuestosLocales1N1340F;
                                                                    $importesGastosImpuestosLocales1 = $gastosImpuestosLocales1Total + $gastosImpuestosLocales1TotalF;
                                                                    echo '<td>$'.number_format($gastosImpuestosLocales1Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosImpuestosLocales1TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosImpuestosLocales1,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>06. Gastos Impuestos Locales  Impuesto Servicios Limpia</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosImpuestosLocales26278 = ControladorBanco6278::ctrGastosImpuestosLocales2($item, $valor);
                                    $gastosImpuestosLocales26278F = ControladorBanco6278::ctrGastosImpuestosLocales2F($item, $valor);
                                    $gastosImpuestosLocales23450 = ControladorBanco3450::ctrGastosImpuestosLocales2($item, $valor);
                                    $gastosImpuestosLocales23450F = ControladorBanco3450::ctrGastosImpuestosLocales2F($item, $valor);
                                    $gastosImpuestosLocales20198 = ControladorBanco0198::ctrGastosImpuestosLocales2($item, $valor);
                                    $gastosImpuestosLocales20198F = ControladorBanco0198::ctrGastosImpuestosLocales2F($item, $valor);
                                    $gastosImpuestosLocales2Caja = ControladorCaja::ctrGastosImpuestosLocales2($item, $valor);
                                    $gastosImpuestosLocales2CajaF = ControladorCaja::ctrGastosImpuestosLocales2F($item, $valor);
                                    $gastosImpuestosLocales21286 = ControladorBanco1286::ctrGastosImpuestosLocales2($item, $valor);
                                    $gastosImpuestosLocales21286F = ControladorBanco1286::ctrGastosImpuestosLocales2F($item, $valor);
                                    $gastosImpuestosLocales21219 = ControladorBanco1219::ctrGastosImpuestosLocales2($item, $valor);
                                    $gastosImpuestosLocales21219F = ControladorBanco1219::ctrGastosImpuestosLocales2F($item, $valor);
                                    $gastosImpuestosLocales20840 = ControladorBanco0840::ctrGastosImpuestosLocales2($item, $valor);
                                    $gastosImpuestosLocales20840F = ControladorBanco0840::ctrGastosImpuestosLocales2F($item, $valor);
                                    $gastosImpuestosLocales21340 = ControladorBanco1340::ctrGastosImpuestosLocales2($item, $valor);
                                    $gastosImpuestosLocales21340F = ControladorBanco1340::ctrGastosImpuestosLocales2F($item, $valor);

                                    foreach ($gastosImpuestosLocales26278 as $value) {
                                      foreach ($gastosImpuestosLocales26278F as $value2) {
                                        foreach ($gastosImpuestosLocales23450 as $value3) {
                                          foreach ($gastosImpuestosLocales21340F as $value4) {
                                            foreach ($gastosImpuestosLocales20198 as $value5) {
                                              foreach ($gastosImpuestosLocales20198F as $value6) {
                                                foreach ($gastosImpuestosLocales2Caja as $value7) {
                                                  foreach ($gastosImpuestosLocales2CajaF as $value8) {
                                                    foreach ($gastosImpuestosLocales21286 as $value9) {
                                                      foreach ($gastosImpuestosLocales21286F as $value10) {
                                                        foreach ($gastosImpuestosLocales21219 as $value11) {
                                                          foreach ($gastosImpuestosLocales21219F as $value12) {
                                                            foreach ($gastosImpuestosLocales20840 as $value13) {
                                                              foreach ($gastosImpuestosLocales20840F as $value14) {
                                                                foreach ($gastosImpuestosLocales21340 as $value15) {
                                                                  foreach ($gastosImpuestosLocales21340F as $value16) {

                                                                    $gastosImpuestosLocales2N6278 = $value["egresos"];
                                                                    $gastosImpuestosLocales2N6278F = $value2["egresos"];
                                                                    $gastosImpuestosLocales2N3450 = $value3["egresos"];
                                                                    $gastosImpuestosLocales2N3450F = $value4["egresos"];
                                                                    $gastosImpuestosLocales2N0198 = $value5["egresos"];
                                                                    $gastosImpuestosLocales2N0198F = $value6["egresos"];
                                                                    $gastosImpuestosLocales2NCaja = $value7["egresos"];
                                                                    $gastosImpuestosLocales2NCajaF = $value8["egresos"];
                                                                    $gastosImpuestosLocales2N1286 = $value9["egresos"];
                                                                    $gastosImpuestosLocales2N1286F = $value10["egresos"];
                                                                    $gastosImpuestosLocales2N1219 = $value11["egresos"];
                                                                    $gastosImpuestosLocales2N1219F = $value12["egresos"];
                                                                    $gastosImpuestosLocales2N0840 = $value13["egresos"];
                                                                    $gastosImpuestosLocales2N0840F = $value14["egresos"];
                                                                    $gastosImpuestosLocales2N1340 = $value15["egresos"];
                                                                    $gastosImpuestosLocales2N1340F = $value16["egresos"];

                                                                    $gastosImpuestosLocales2Total = $gastosImpuestosLocales2N6278 + $gastosImpuestosLocales2N3450 + $gastosImpuestosLocales2N0198 + $gastosImpuestosLocales2NCaja + $gastosImpuestosLocales2N1286 + $gastosImpuestosLocales2N1219 + $gastosImpuestosLocales2N0840 + $gastosImpuestosLocales2N1340;
                                                                    $gastosImpuestosLocales2TotalF = $gastosImpuestosLocales2N6278F + $gastosImpuestosLocales2N3450F + $gastosImpuestosLocales2N0198F + $gastosImpuestosLocales2NCajaF + $gastosImpuestosLocales2N1286F + $gastosImpuestosLocales2N1219F + $gastosImpuestosLocales2N0840F + $gastosImpuestosLocales2N1340F;
                                                                    $importesGastosImpuestosLocales2 = $gastosImpuestosLocales2Total + $gastosImpuestosLocales2TotalF;
                                                                    echo '<td>$'.number_format($gastosImpuestosLocales2Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosImpuestosLocales2TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosImpuestosLocales2,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>06. Gastos Impuestos Locales  Impuesto Vehicular Tenencia/Control</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosImpuestosLocales36278 = ControladorBanco6278::ctrGastosImpuestosLocales3($item, $valor);
                                    $gastosImpuestosLocales36278F = ControladorBanco6278::ctrGastosImpuestosLocales3F($item, $valor);
                                    $gastosImpuestosLocales33450 = ControladorBanco3450::ctrGastosImpuestosLocales3($item, $valor);
                                    $gastosImpuestosLocales33450F = ControladorBanco3450::ctrGastosImpuestosLocales3F($item, $valor);
                                    $gastosImpuestosLocales30198 = ControladorBanco0198::ctrGastosImpuestosLocales3($item, $valor);
                                    $gastosImpuestosLocales30198F = ControladorBanco0198::ctrGastosImpuestosLocales3F($item, $valor);
                                    $gastosImpuestosLocales3Caja = ControladorCaja::ctrGastosImpuestosLocales3($item, $valor);
                                    $gastosImpuestosLocales3CajaF = ControladorCaja::ctrGastosImpuestosLocales3F($item, $valor);
                                    $gastosImpuestosLocales31286 = ControladorBanco1286::ctrGastosImpuestosLocales3($item, $valor);
                                    $gastosImpuestosLocales31286F = ControladorBanco1286::ctrGastosImpuestosLocales3F($item, $valor);
                                    $gastosImpuestosLocales31219 = ControladorBanco1219::ctrGastosImpuestosLocales3($item, $valor);
                                    $gastosImpuestosLocales31219F = ControladorBanco1219::ctrGastosImpuestosLocales3F($item, $valor);
                                    $gastosImpuestosLocales30840 = ControladorBanco0840::ctrGastosImpuestosLocales3($item, $valor);
                                    $gastosImpuestosLocales30840F = ControladorBanco0840::ctrGastosImpuestosLocales3F($item, $valor);
                                    $gastosImpuestosLocales31340 = ControladorBanco1340::ctrGastosImpuestosLocales3($item, $valor);
                                    $gastosImpuestosLocales31340F = ControladorBanco1340::ctrGastosImpuestosLocales3F($item, $valor);

                                    foreach ($gastosImpuestosLocales36278 as $value) {
                                      foreach ($gastosImpuestosLocales36278F as $value2) {
                                        foreach ($gastosImpuestosLocales33450 as $value3) {
                                          foreach ($gastosImpuestosLocales31340F as $value4) {
                                            foreach ($gastosImpuestosLocales30198 as $value5) {
                                              foreach ($gastosImpuestosLocales30198F as $value6) {
                                                foreach ($gastosImpuestosLocales3Caja as $value7) {
                                                  foreach ($gastosImpuestosLocales3CajaF as $value8) {
                                                    foreach ($gastosImpuestosLocales31286 as $value9) {
                                                      foreach ($gastosImpuestosLocales31286F as $value10) {
                                                        foreach ($gastosImpuestosLocales31219 as $value11) {
                                                          foreach ($gastosImpuestosLocales31219F as $value12) {
                                                            foreach ($gastosImpuestosLocales30840 as $value13) {
                                                              foreach ($gastosImpuestosLocales30840F as $value14) {
                                                                foreach ($gastosImpuestosLocales31340 as $value15) {
                                                                  foreach ($gastosImpuestosLocales31340F as $value16) {

                                                                    $gastosImpuestosLocales3N6278 = $value["egresos"];
                                                                    $gastosImpuestosLocales3N6278F = $value2["egresos"];
                                                                    $gastosImpuestosLocales3N3450 = $value3["egresos"];
                                                                    $gastosImpuestosLocales3N3450F = $value4["egresos"];
                                                                    $gastosImpuestosLocales3N0198 = $value5["egresos"];
                                                                    $gastosImpuestosLocales3N0198F = $value6["egresos"];
                                                                    $gastosImpuestosLocales3NCaja = $value7["egresos"];
                                                                    $gastosImpuestosLocales3NCajaF = $value8["egresos"];
                                                                    $gastosImpuestosLocales3N1286 = $value9["egresos"];
                                                                    $gastosImpuestosLocales3N1286F = $value10["egresos"];
                                                                    $gastosImpuestosLocales3N1219 = $value11["egresos"];
                                                                    $gastosImpuestosLocales3N1219F = $value12["egresos"];
                                                                    $gastosImpuestosLocales3N0840 = $value13["egresos"];
                                                                    $gastosImpuestosLocales3N0840F = $value14["egresos"];
                                                                    $gastosImpuestosLocales3N1340 = $value15["egresos"];
                                                                    $gastosImpuestosLocales3N1340F = $value16["egresos"];

                                                                    $gastosImpuestosLocales3Total = $gastosImpuestosLocales3N6278 + $gastosImpuestosLocales3N3450 + $gastosImpuestosLocales3N0198 + $gastosImpuestosLocales3NCaja + $gastosImpuestosLocales3N1286 + $gastosImpuestosLocales3N1219 + $gastosImpuestosLocales3N0840 + $gastosImpuestosLocales3N1340;
                                                                    $gastosImpuestosLocales3TotalF = $gastosImpuestosLocales3N6278F + $gastosImpuestosLocales3N3450F + $gastosImpuestosLocales3N0198F + $gastosImpuestosLocales3NCajaF + $gastosImpuestosLocales3N1286F + $gastosImpuestosLocales3N1219F + $gastosImpuestosLocales3N0840F + $gastosImpuestosLocales3N1340F;
                                                                    $importesGastosImpuestosLocales3 = $gastosImpuestosLocales3Total + $gastosImpuestosLocales3TotalF;
                                                                    echo '<td>$'.number_format($gastosImpuestosLocales3Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosImpuestosLocales3TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosImpuestosLocales3,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>06. Gastos Impuestos Locales  Impuesto y Derechos</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosImpuestosLocales46278 = ControladorBanco6278::ctrGastosImpuestosLocales4($item, $valor);
                                    $gastosImpuestosLocales46278F = ControladorBanco6278::ctrGastosImpuestosLocales4F($item, $valor);
                                    $gastosImpuestosLocales43450 = ControladorBanco3450::ctrGastosImpuestosLocales4($item, $valor);
                                    $gastosImpuestosLocales43450F = ControladorBanco3450::ctrGastosImpuestosLocales4F($item, $valor);
                                    $gastosImpuestosLocales40198 = ControladorBanco0198::ctrGastosImpuestosLocales4($item, $valor);
                                    $gastosImpuestosLocales40198F = ControladorBanco0198::ctrGastosImpuestosLocales4F($item, $valor);
                                    $gastosImpuestosLocales4Caja = ControladorCaja::ctrGastosImpuestosLocales4($item, $valor);
                                    $gastosImpuestosLocales4CajaF = ControladorCaja::ctrGastosImpuestosLocales4F($item, $valor);
                                    $gastosImpuestosLocales41286 = ControladorBanco1286::ctrGastosImpuestosLocales4($item, $valor);
                                    $gastosImpuestosLocales41286F = ControladorBanco1286::ctrGastosImpuestosLocales4F($item, $valor);
                                    $gastosImpuestosLocales41219 = ControladorBanco1219::ctrGastosImpuestosLocales4($item, $valor);
                                    $gastosImpuestosLocales41219F = ControladorBanco1219::ctrGastosImpuestosLocales4F($item, $valor);
                                    $gastosImpuestosLocales40840 = ControladorBanco0840::ctrGastosImpuestosLocales4($item, $valor);
                                    $gastosImpuestosLocales40840F = ControladorBanco0840::ctrGastosImpuestosLocales4F($item, $valor);
                                    $gastosImpuestosLocales41340 = ControladorBanco1340::ctrGastosImpuestosLocales4($item, $valor);
                                    $gastosImpuestosLocales41340F = ControladorBanco1340::ctrGastosImpuestosLocales4F($item, $valor);

                                    foreach ($gastosImpuestosLocales46278 as $value) {
                                      foreach ($gastosImpuestosLocales46278F as $value2) {
                                        foreach ($gastosImpuestosLocales43450 as $value3) {
                                          foreach ($gastosImpuestosLocales41340F as $value4) {
                                            foreach ($gastosImpuestosLocales40198 as $value5) {
                                              foreach ($gastosImpuestosLocales40198F as $value6) {
                                                foreach ($gastosImpuestosLocales4Caja as $value7) {
                                                  foreach ($gastosImpuestosLocales4CajaF as $value8) {
                                                    foreach ($gastosImpuestosLocales41286 as $value9) {
                                                      foreach ($gastosImpuestosLocales41286F as $value10) {
                                                        foreach ($gastosImpuestosLocales41219 as $value11) {
                                                          foreach ($gastosImpuestosLocales41219F as $value12) {
                                                            foreach ($gastosImpuestosLocales40840 as $value13) {
                                                              foreach ($gastosImpuestosLocales40840F as $value14) {
                                                                foreach ($gastosImpuestosLocales41340 as $value15) {
                                                                  foreach ($gastosImpuestosLocales41340F as $value16) {

                                                                    $gastosImpuestosLocales4N6278 = $value["egresos"];
                                                                    $gastosImpuestosLocales4N6278F = $value2["egresos"];
                                                                    $gastosImpuestosLocales4N3450 = $value3["egresos"];
                                                                    $gastosImpuestosLocales4N3450F = $value4["egresos"];
                                                                    $gastosImpuestosLocales4N0198 = $value5["egresos"];
                                                                    $gastosImpuestosLocales4N0198F = $value6["egresos"];
                                                                    $gastosImpuestosLocales4NCaja = $value7["egresos"];
                                                                    $gastosImpuestosLocales4NCajaF = $value8["egresos"];
                                                                    $gastosImpuestosLocales4N1286 = $value9["egresos"];
                                                                    $gastosImpuestosLocales4N1286F = $value10["egresos"];
                                                                    $gastosImpuestosLocales4N1219 = $value11["egresos"];
                                                                    $gastosImpuestosLocales4N1219F = $value12["egresos"];
                                                                    $gastosImpuestosLocales4N0840 = $value13["egresos"];
                                                                    $gastosImpuestosLocales4N0840F = $value14["egresos"];
                                                                    $gastosImpuestosLocales4N1340 = $value15["egresos"];
                                                                    $gastosImpuestosLocales4N1340F = $value16["egresos"];

                                                                    $gastosImpuestosLocales4Total = $gastosImpuestosLocales4N6278 + $gastosImpuestosLocales4N3450 + $gastosImpuestosLocales4N0198 + $gastosImpuestosLocales4NCaja + $gastosImpuestosLocales4N1286 + $gastosImpuestosLocales4N1219 + $gastosImpuestosLocales4N0840 + $gastosImpuestosLocales4N1340;
                                                                    $gastosImpuestosLocales4TotalF = $gastosImpuestosLocales4N6278F + $gastosImpuestosLocales4N3450F + $gastosImpuestosLocales4N0198F + $gastosImpuestosLocales4NCajaF + $gastosImpuestosLocales4N1286F + $gastosImpuestosLocales4N1219F + $gastosImpuestosLocales4N0840F + $gastosImpuestosLocales4N1340F;
                                                                    $importesGastosImpuestosLocales4 = $gastosImpuestosLocales4Total + $gastosImpuestosLocales4TotalF;
                                                                    echo '<td>$'.number_format($gastosImpuestosLocales4Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosImpuestosLocales4TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosImpuestosLocales4,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>07. Gastos Financieros  Comisiones Bancarias</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosFinancieros16278 = ControladorBanco6278::ctrGastosFinancieros1($item, $valor);
                                    $gastosFinancieros16278F = ControladorBanco6278::ctrGastosFinancieros1F($item, $valor);
                                    $gastosFinancieros13450 = ControladorBanco3450::ctrGastosFinancieros1($item, $valor);
                                    $gastosFinancieros13450F = ControladorBanco3450::ctrGastosFinancieros1F($item, $valor);
                                    $gastosFinancieros10198 = ControladorBanco0198::ctrGastosFinancieros1($item, $valor);
                                    $gastosFinancieros10198F = ControladorBanco0198::ctrGastosFinancieros1F($item, $valor);
                                    $gastosFinancieros1Caja = ControladorCaja::ctrGastosFinancieros1($item, $valor);
                                    $gastosFinancieros1CajaF = ControladorCaja::ctrGastosFinancieros1F($item, $valor);
                                    $gastosFinancieros11286 = ControladorBanco1286::ctrGastosFinancieros1($item, $valor);
                                    $gastosFinancieros11286F = ControladorBanco1286::ctrGastosFinancieros1F($item, $valor);
                                    $gastosFinancieros11219 = ControladorBanco1219::ctrGastosFinancieros1($item, $valor);
                                    $gastosFinancieros11219F = ControladorBanco1219::ctrGastosFinancieros1F($item, $valor);
                                    $gastosFinancieros10840 = ControladorBanco0840::ctrGastosFinancieros1($item, $valor);
                                    $gastosFinancieros10840F = ControladorBanco0840::ctrGastosFinancieros1F($item, $valor);
                                    $gastosFinancieros11340 = ControladorBanco1340::ctrGastosFinancieros1($item, $valor);
                                    $gastosFinancieros11340F = ControladorBanco1340::ctrGastosFinancieros1F($item, $valor);

                                    foreach ($gastosFinancieros16278 as $value) {
                                      foreach ($gastosFinancieros16278F as $value2) {
                                        foreach ($gastosFinancieros13450 as $value3) {
                                          foreach ($gastosFinancieros11340F as $value4) {
                                            foreach ($gastosFinancieros10198 as $value5) {
                                              foreach ($gastosFinancieros10198F as $value6) {
                                                foreach ($gastosFinancieros1Caja as $value7) {
                                                  foreach ($gastosFinancieros1CajaF as $value8) {
                                                    foreach ($gastosFinancieros11286 as $value9) {
                                                      foreach ($gastosFinancieros11286F as $value10) {
                                                        foreach ($gastosFinancieros11219 as $value11) {
                                                          foreach ($gastosFinancieros11219F as $value12) {
                                                            foreach ($gastosFinancieros10840 as $value13) {
                                                              foreach ($gastosFinancieros10840F as $value14) {
                                                                foreach ($gastosFinancieros11340 as $value15) {
                                                                  foreach ($gastosFinancieros11340F as $value16) {

                                                                    $gastosFinancieros1N6278 = $value["egresos"];
                                                                    $gastosFinancieros1N6278F = $value2["egresos"];
                                                                    $gastosFinancieros1N3450 = $value3["egresos"];
                                                                    $gastosFinancieros1N3450F = $value4["egresos"];
                                                                    $gastosFinancieros1N0198 = $value5["egresos"];
                                                                    $gastosFinancieros1N0198F = $value6["egresos"];
                                                                    $gastosFinancieros1NCaja = $value7["egresos"];
                                                                    $gastosFinancieros1NCajaF = $value8["egresos"];
                                                                    $gastosFinancieros1N1286 = $value9["egresos"];
                                                                    $gastosFinancieros1N1286F = $value10["egresos"];
                                                                    $gastosFinancieros1N1219 = $value11["egresos"];
                                                                    $gastosFinancieros1N1219F = $value12["egresos"];
                                                                    $gastosFinancieros1N0840 = $value13["egresos"];
                                                                    $gastosFinancieros1N0840F = $value14["egresos"];
                                                                    $gastosFinancieros1N1340 = $value15["egresos"];
                                                                    $gastosFinancieros1N1340F = $value16["egresos"];

                                                                    $gastosFinancieros1Total = $gastosFinancieros1N6278 + $gastosFinancieros1N3450 + $gastosFinancieros1N0198 + $gastosFinancieros1NCaja + $gastosFinancieros1N1286 + $gastosFinancieros1N1219 + $gastosFinancieros1N0840 + $gastosFinancieros1N1340;
                                                                    $gastosFinancieros1TotalF = $gastosFinancieros1N6278F + $gastosFinancieros1N3450F + $gastosFinancieros1N0198F + $gastosFinancieros1NCajaF + $gastosFinancieros1N1286F + $gastosFinancieros1N1219F + $gastosFinancieros1N0840F + $gastosFinancieros1N1340F;
                                                                    $importesGastosFinancieros1 = $gastosFinancieros1Total + $gastosFinancieros1TotalF;
                                                                    echo '<td>$'.number_format($gastosFinancieros1Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosFinancieros1TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosFinancieros1,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>07. Gastos Financieros  Comisiones NO Bancarias</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosFinancieros26278 = ControladorBanco6278::ctrGastosFinancieros2($item, $valor);
                                    $gastosFinancieros26278F = ControladorBanco6278::ctrGastosFinancieros2F($item, $valor);
                                    $gastosFinancieros23450 = ControladorBanco3450::ctrGastosFinancieros2($item, $valor);
                                    $gastosFinancieros23450F = ControladorBanco3450::ctrGastosFinancieros2F($item, $valor);
                                    $gastosFinancieros20198 = ControladorBanco0198::ctrGastosFinancieros2($item, $valor);
                                    $gastosFinancieros20198F = ControladorBanco0198::ctrGastosFinancieros2F($item, $valor);
                                    $gastosFinancieros2Caja = ControladorCaja::ctrGastosFinancieros2($item, $valor);
                                    $gastosFinancieros2CajaF = ControladorCaja::ctrGastosFinancieros2F($item, $valor);
                                    $gastosFinancieros21286 = ControladorBanco1286::ctrGastosFinancieros2($item, $valor);
                                    $gastosFinancieros21286F = ControladorBanco1286::ctrGastosFinancieros2F($item, $valor);
                                    $gastosFinancieros21219 = ControladorBanco1219::ctrGastosFinancieros2($item, $valor);
                                    $gastosFinancieros21219F = ControladorBanco1219::ctrGastosFinancieros2F($item, $valor);
                                    $gastosFinancieros20840 = ControladorBanco0840::ctrGastosFinancieros2($item, $valor);
                                    $gastosFinancieros20840F = ControladorBanco0840::ctrGastosFinancieros2F($item, $valor);
                                    $gastosFinancieros21340 = ControladorBanco1340::ctrGastosFinancieros2($item, $valor);
                                    $gastosFinancieros21340F = ControladorBanco1340::ctrGastosFinancieros2F($item, $valor);

                                    foreach ($gastosFinancieros26278 as $value) {
                                      foreach ($gastosFinancieros26278F as $value2) {
                                        foreach ($gastosFinancieros23450 as $value3) {
                                          foreach ($gastosFinancieros21340F as $value4) {
                                            foreach ($gastosFinancieros20198 as $value5) {
                                              foreach ($gastosFinancieros20198F as $value6) {
                                                foreach ($gastosFinancieros2Caja as $value7) {
                                                  foreach ($gastosFinancieros2CajaF as $value8) {
                                                    foreach ($gastosFinancieros21286 as $value9) {
                                                      foreach ($gastosFinancieros21286F as $value10) {
                                                        foreach ($gastosFinancieros21219 as $value11) {
                                                          foreach ($gastosFinancieros21219F as $value12) {
                                                            foreach ($gastosFinancieros20840 as $value13) {
                                                              foreach ($gastosFinancieros20840F as $value14) {
                                                                foreach ($gastosFinancieros21340 as $value15) {
                                                                  foreach ($gastosFinancieros21340F as $value16) {

                                                                    $gastosFinancieros2N6278 = $value["egresos"];
                                                                    $gastosFinancieros2N6278F = $value2["egresos"];
                                                                    $gastosFinancieros2N3450 = $value3["egresos"];
                                                                    $gastosFinancieros2N3450F = $value4["egresos"];
                                                                    $gastosFinancieros2N0198 = $value5["egresos"];
                                                                    $gastosFinancieros2N0198F = $value6["egresos"];
                                                                    $gastosFinancieros2NCaja = $value7["egresos"];
                                                                    $gastosFinancieros2NCajaF = $value8["egresos"];
                                                                    $gastosFinancieros2N1286 = $value9["egresos"];
                                                                    $gastosFinancieros2N1286F = $value10["egresos"];
                                                                    $gastosFinancieros2N1219 = $value11["egresos"];
                                                                    $gastosFinancieros2N1219F = $value12["egresos"];
                                                                    $gastosFinancieros2N0840 = $value13["egresos"];
                                                                    $gastosFinancieros2N0840F = $value14["egresos"];
                                                                    $gastosFinancieros2N1340 = $value15["egresos"];
                                                                    $gastosFinancieros2N1340F = $value16["egresos"];

                                                                    $gastosFinancieros2Total = $gastosFinancieros2N6278 + $gastosFinancieros2N3450 + $gastosFinancieros2N0198 + $gastosFinancieros2NCaja + $gastosFinancieros2N1286 + $gastosFinancieros2N1219 + $gastosFinancieros2N0840 + $gastosFinancieros2N1340;
                                                                    $gastosFinancieros2TotalF = $gastosFinancieros2N6278F + $gastosFinancieros2N3450F + $gastosFinancieros2N0198F + $gastosFinancieros2NCajaF + $gastosFinancieros2N1286F + $gastosFinancieros2N1219F + $gastosFinancieros2N0840F + $gastosFinancieros2N1340F;
                                                                    $importesGastosFinancieros2 = $gastosFinancieros2Total + $gastosFinancieros2TotalF;
                                                                    echo '<td>$'.number_format($gastosFinancieros2Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosFinancieros2TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosFinancieros2,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>07. Gastos Financieros  Intereses a Cargo Bancarios</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosFinancieros36278 = ControladorBanco6278::ctrGastosFinancieros3($item, $valor);
                                    $gastosFinancieros36278F = ControladorBanco6278::ctrGastosFinancieros3F($item, $valor);
                                    $gastosFinancieros33450 = ControladorBanco3450::ctrGastosFinancieros3($item, $valor);
                                    $gastosFinancieros33450F = ControladorBanco3450::ctrGastosFinancieros3F($item, $valor);
                                    $gastosFinancieros30198 = ControladorBanco0198::ctrGastosFinancieros3($item, $valor);
                                    $gastosFinancieros30198F = ControladorBanco0198::ctrGastosFinancieros3F($item, $valor);
                                    $gastosFinancieros3Caja = ControladorCaja::ctrGastosFinancieros3($item, $valor);
                                    $gastosFinancieros3CajaF = ControladorCaja::ctrGastosFinancieros3F($item, $valor);
                                    $gastosFinancieros31286 = ControladorBanco1286::ctrGastosFinancieros3($item, $valor);
                                    $gastosFinancieros31286F = ControladorBanco1286::ctrGastosFinancieros3F($item, $valor);
                                    $gastosFinancieros31219 = ControladorBanco1219::ctrGastosFinancieros3($item, $valor);
                                    $gastosFinancieros31219F = ControladorBanco1219::ctrGastosFinancieros3F($item, $valor);
                                    $gastosFinancieros30840 = ControladorBanco0840::ctrGastosFinancieros3($item, $valor);
                                    $gastosFinancieros30840F = ControladorBanco0840::ctrGastosFinancieros3F($item, $valor);
                                    $gastosFinancieros31340 = ControladorBanco1340::ctrGastosFinancieros3($item, $valor);
                                    $gastosFinancieros31340F = ControladorBanco1340::ctrGastosFinancieros3F($item, $valor);

                                    foreach ($gastosFinancieros36278 as $value) {
                                      foreach ($gastosFinancieros36278F as $value2) {
                                        foreach ($gastosFinancieros33450 as $value3) {
                                          foreach ($gastosFinancieros31340F as $value4) {
                                            foreach ($gastosFinancieros30198 as $value5) {
                                              foreach ($gastosFinancieros30198F as $value6) {
                                                foreach ($gastosFinancieros3Caja as $value7) {
                                                  foreach ($gastosFinancieros3CajaF as $value8) {
                                                    foreach ($gastosFinancieros31286 as $value9) {
                                                      foreach ($gastosFinancieros31286F as $value10) {
                                                        foreach ($gastosFinancieros31219 as $value11) {
                                                          foreach ($gastosFinancieros31219F as $value12) {
                                                            foreach ($gastosFinancieros30840 as $value13) {
                                                              foreach ($gastosFinancieros30840F as $value14) {
                                                                foreach ($gastosFinancieros31340 as $value15) {
                                                                  foreach ($gastosFinancieros31340F as $value16) {

                                                                    $gastosFinancieros3N6278 = $value["egresos"];
                                                                    $gastosFinancieros3N6278F = $value2["egresos"];
                                                                    $gastosFinancieros3N3450 = $value3["egresos"];
                                                                    $gastosFinancieros3N3450F = $value4["egresos"];
                                                                    $gastosFinancieros3N0198 = $value5["egresos"];
                                                                    $gastosFinancieros3N0198F = $value6["egresos"];
                                                                    $gastosFinancieros3NCaja = $value7["egresos"];
                                                                    $gastosFinancieros3NCajaF = $value8["egresos"];
                                                                    $gastosFinancieros3N1286 = $value9["egresos"];
                                                                    $gastosFinancieros3N1286F = $value10["egresos"];
                                                                    $gastosFinancieros3N1219 = $value11["egresos"];
                                                                    $gastosFinancieros3N1219F = $value12["egresos"];
                                                                    $gastosFinancieros3N0840 = $value13["egresos"];
                                                                    $gastosFinancieros3N0840F = $value14["egresos"];
                                                                    $gastosFinancieros3N1340 = $value15["egresos"];
                                                                    $gastosFinancieros3N1340F = $value16["egresos"];

                                                                    $gastosFinancieros3Total = $gastosFinancieros3N6278 + $gastosFinancieros3N3450 + $gastosFinancieros3N0198 + $gastosFinancieros3NCaja + $gastosFinancieros3N1286 + $gastosFinancieros3N1219 + $gastosFinancieros3N0840 + $gastosFinancieros3N1340;
                                                                    $gastosFinancieros3TotalF = $gastosFinancieros3N6278F + $gastosFinancieros3N3450F + $gastosFinancieros3N0198F + $gastosFinancieros3NCajaF + $gastosFinancieros3N1286F + $gastosFinancieros3N1219F + $gastosFinancieros3N0840F + $gastosFinancieros3N1340F;
                                                                    $importesGastosFinancieros3 = $gastosFinancieros3Total + $gastosFinancieros3TotalF;
                                                                    echo '<td>$'.number_format($gastosFinancieros3Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosFinancieros3TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosFinancieros3,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>99. Gastos Operativos NO Deducibles  Multas</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativos16278 = ControladorBanco6278::ctrGastosOperativos1($item, $valor);
                                    $gastosOperativos16278F = ControladorBanco6278::ctrGastosOperativos1F($item, $valor);
                                    $gastosOperativos13450 = ControladorBanco3450::ctrGastosOperativos1($item, $valor);
                                    $gastosOperativos13450F = ControladorBanco3450::ctrGastosOperativos1F($item, $valor);
                                    $gastosOperativos10198 = ControladorBanco0198::ctrGastosOperativos1($item, $valor);
                                    $gastosOperativos10198F = ControladorBanco0198::ctrGastosOperativos1F($item, $valor);
                                    $gastosOperativos1Caja = ControladorCaja::ctrGastosOperativos1($item, $valor);
                                    $gastosOperativos1CajaF = ControladorCaja::ctrGastosOperativos1F($item, $valor);
                                    $gastosOperativos11286 = ControladorBanco1286::ctrGastosOperativos1($item, $valor);
                                    $gastosOperativos11286F = ControladorBanco1286::ctrGastosOperativos1F($item, $valor);
                                    $gastosOperativos11219 = ControladorBanco1219::ctrGastosOperativos1($item, $valor);
                                    $gastosOperativos11219F = ControladorBanco1219::ctrGastosOperativos1F($item, $valor);
                                    $gastosOperativos10840 = ControladorBanco0840::ctrGastosOperativos1($item, $valor);
                                    $gastosOperativos10840F = ControladorBanco0840::ctrGastosOperativos1F($item, $valor);
                                    $gastosOperativos11340 = ControladorBanco1340::ctrGastosOperativos1($item, $valor);
                                    $gastosOperativos11340F = ControladorBanco1340::ctrGastosOperativos1F($item, $valor);

                                    foreach ($gastosOperativos16278 as $value) {
                                      foreach ($gastosOperativos16278F as $value2) {
                                        foreach ($gastosOperativos13450 as $value3) {
                                          foreach ($gastosOperativos11340F as $value4) {
                                            foreach ($gastosOperativos10198 as $value5) {
                                              foreach ($gastosOperativos10198F as $value6) {
                                                foreach ($gastosOperativos1Caja as $value7) {
                                                  foreach ($gastosOperativos1CajaF as $value8) {
                                                    foreach ($gastosOperativos11286 as $value9) {
                                                      foreach ($gastosOperativos11286F as $value10) {
                                                        foreach ($gastosOperativos11219 as $value11) {
                                                          foreach ($gastosOperativos11219F as $value12) {
                                                            foreach ($gastosOperativos10840 as $value13) {
                                                              foreach ($gastosOperativos10840F as $value14) {
                                                                foreach ($gastosOperativos11340 as $value15) {
                                                                  foreach ($gastosOperativos11340F as $value16) {

                                                                    $gastosOperativos1N6278 = $value["egresos"];
                                                                    $gastosOperativos1N6278F = $value2["egresos"];
                                                                    $gastosOperativos1N3450 = $value3["egresos"];
                                                                    $gastosOperativos1N3450F = $value4["egresos"];
                                                                    $gastosOperativos1N0198 = $value5["egresos"];
                                                                    $gastosOperativos1N0198F = $value6["egresos"];
                                                                    $gastosOperativos1NCaja = $value7["egresos"];
                                                                    $gastosOperativos1NCajaF = $value8["egresos"];
                                                                    $gastosOperativos1N1286 = $value9["egresos"];
                                                                    $gastosOperativos1N1286F = $value10["egresos"];
                                                                    $gastosOperativos1N1219 = $value11["egresos"];
                                                                    $gastosOperativos1N1219F = $value12["egresos"];
                                                                    $gastosOperativos1N0840 = $value13["egresos"];
                                                                    $gastosOperativos1N0840F = $value14["egresos"];
                                                                    $gastosOperativos1N1340 = $value15["egresos"];
                                                                    $gastosOperativos1N1340F = $value16["egresos"];

                                                                    $gastosOperativos1Total = $gastosOperativos1N6278 + $gastosOperativos1N3450 + $gastosOperativos1N0198 + $gastosOperativos1NCaja + $gastosOperativos1N1286 + $gastosOperativos1N1219 + $gastosOperativos1N0840 + $gastosOperativos1N1340;
                                                                    $gastosOperativos1TotalF = $gastosOperativos1N6278F + $gastosOperativos1N3450F + $gastosOperativos1N0198F + $gastosOperativos1NCajaF + $gastosOperativos1N1286F + $gastosOperativos1N1219F + $gastosOperativos1N0840F + $gastosOperativos1N1340F;
                                                                    $importesGastosOperativos1 = $gastosOperativos1Total + $gastosOperativos1TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativos1Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativos1TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativos1,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $gastosOperativos26278 = ControladorBanco6278::ctrGastosOperativos2($item, $valor);
                                    $gastosOperativos26278F = ControladorBanco6278::ctrGastosOperativos2F($item, $valor);
                                    $gastosOperativos23450 = ControladorBanco3450::ctrGastosOperativos2($item, $valor);
                                    $gastosOperativos23450F = ControladorBanco3450::ctrGastosOperativos2F($item, $valor);
                                    $gastosOperativos20198 = ControladorBanco0198::ctrGastosOperativos2($item, $valor);
                                    $gastosOperativos20198F = ControladorBanco0198::ctrGastosOperativos2F($item, $valor);
                                    $gastosOperativos2Caja = ControladorCaja::ctrGastosOperativos2($item, $valor);
                                    $gastosOperativos2CajaF = ControladorCaja::ctrGastosOperativos2F($item, $valor);
                                    $gastosOperativos21286 = ControladorBanco1286::ctrGastosOperativos2($item, $valor);
                                    $gastosOperativos21286F = ControladorBanco1286::ctrGastosOperativos2F($item, $valor);
                                    $gastosOperativos21219 = ControladorBanco1219::ctrGastosOperativos2($item, $valor);
                                    $gastosOperativos21219F = ControladorBanco1219::ctrGastosOperativos2F($item, $valor);
                                    $gastosOperativos20840 = ControladorBanco0840::ctrGastosOperativos2($item, $valor);
                                    $gastosOperativos20840F = ControladorBanco0840::ctrGastosOperativos2F($item, $valor);
                                    $gastosOperativos21340 = ControladorBanco1340::ctrGastosOperativos2($item, $valor);
                                    $gastosOperativos21340F = ControladorBanco1340::ctrGastosOperativos2F($item, $valor);

                                    foreach ($gastosOperativos26278 as $value) {
                                      foreach ($gastosOperativos26278F as $value2) {
                                        foreach ($gastosOperativos23450 as $value3) {
                                          foreach ($gastosOperativos21340F as $value4) {
                                            foreach ($gastosOperativos20198 as $value5) {
                                              foreach ($gastosOperativos20198F as $value6) {
                                                foreach ($gastosOperativos2Caja as $value7) {
                                                  foreach ($gastosOperativos2CajaF as $value8) {
                                                    foreach ($gastosOperativos21286 as $value9) {
                                                      foreach ($gastosOperativos21286F as $value10) {
                                                        foreach ($gastosOperativos21219 as $value11) {
                                                          foreach ($gastosOperativos21219F as $value12) {
                                                            foreach ($gastosOperativos20840 as $value13) {
                                                              foreach ($gastosOperativos20840F as $value14) {
                                                                foreach ($gastosOperativos21340 as $value15) {
                                                                  foreach ($gastosOperativos21340F as $value16) {

                                                                    $gastosOperativos2N6278 = $value["egresos"];
                                                                    $gastosOperativos2N6278F = $value2["egresos"];
                                                                    $gastosOperativos2N3450 = $value3["egresos"];
                                                                    $gastosOperativos2N3450F = $value4["egresos"];
                                                                    $gastosOperativos2N0198 = $value5["egresos"];
                                                                    $gastosOperativos2N0198F = $value6["egresos"];
                                                                    $gastosOperativos2NCaja = $value7["egresos"];
                                                                    $gastosOperativos2NCajaF = $value8["egresos"];
                                                                    $gastosOperativos2N1286 = $value9["egresos"];
                                                                    $gastosOperativos2N1286F = $value10["egresos"];
                                                                    $gastosOperativos2N1219 = $value11["egresos"];
                                                                    $gastosOperativos2N1219F = $value12["egresos"];
                                                                    $gastosOperativos2N0840 = $value13["egresos"];
                                                                    $gastosOperativos2N0840F = $value14["egresos"];
                                                                    $gastosOperativos2N1340 = $value15["egresos"];
                                                                    $gastosOperativos2N1340F = $value16["egresos"];

                                                                    $gastosOperativos2Total = $gastosOperativos2N6278 + $gastosOperativos2N3450 + $gastosOperativos2N0198 + $gastosOperativos2NCaja + $gastosOperativos2N1286 + $gastosOperativos2N1219 + $gastosOperativos2N0840 + $gastosOperativos2N1340;
                                                                    $gastosOperativos2TotalF = $gastosOperativos2N6278F + $gastosOperativos2N3450F + $gastosOperativos2N0198F + $gastosOperativos2NCajaF + $gastosOperativos2N1286F + $gastosOperativos2N1219F + $gastosOperativos2N0840F + $gastosOperativos2N1340F;
                                                                    $importesGastosOperativos2 = $gastosOperativos2Total + $gastosOperativos2TotalF;
                                                                    echo '<td>$'.number_format($gastosOperativos2Total,2).'</td>';
                                                                    echo '<td>$'.number_format($gastosOperativos2TotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesGastosOperativos2,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Sueldos y Salarios</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $sueldosySalarios6278 = ControladorBanco6278::ctrSueldosySalarios($item, $valor);
                                    $sueldosySalarios6278F = ControladorBanco6278::ctrSueldosySalariosF($item, $valor);
                                    $sueldosySalarios3450 = ControladorBanco3450::ctrSueldosySalarios($item, $valor);
                                    $sueldosySalarios3450F = ControladorBanco3450::ctrSueldosySalariosF($item, $valor);
                                    $sueldosySalarios0198 = ControladorBanco0198::ctrSueldosySalarios($item, $valor);
                                    $sueldosySalarios0198F = ControladorBanco0198::ctrSueldosySalariosF($item, $valor);
                                    $sueldosySalariosCaja = ControladorCaja::ctrSueldosySalarios($item, $valor);
                                    $sueldosySalariosCajaF = ControladorCaja::ctrSueldosySalariosF($item, $valor);
                                    $sueldosySalarios1286 = ControladorBanco1286::ctrSueldosySalarios($item, $valor);
                                    $sueldosySalarios1286F = ControladorBanco1286::ctrSueldosySalariosF($item, $valor);
                                    $sueldosySalarios1219 = ControladorBanco1219::ctrSueldosySalarios($item, $valor);
                                    $sueldosySalarios1219F = ControladorBanco1219::ctrSueldosySalariosF($item, $valor);
                                    $sueldosySalarios0840 = ControladorBanco0840::ctrSueldosySalarios($item, $valor);
                                    $sueldosySalarios0840F = ControladorBanco0840::ctrSueldosySalariosF($item, $valor);
                                    $sueldosySalarios1340 = ControladorBanco1340::ctrSueldosySalarios($item, $valor);
                                    $sueldosySalarios1340F = ControladorBanco1340::ctrSueldosySalariosF($item, $valor);

                                    foreach ($sueldosySalarios6278 as $value) {
                                      foreach ($sueldosySalarios6278F as $value2) {
                                        foreach ($sueldosySalarios3450 as $value3) {
                                          foreach ($sueldosySalarios1340F as $value4) {
                                            foreach ($sueldosySalarios0198 as $value5) {
                                              foreach ($sueldosySalarios0198F as $value6) {
                                                foreach ($sueldosySalariosCaja as $value7) {
                                                  foreach ($sueldosySalariosCajaF as $value8) {
                                                    foreach ($sueldosySalarios1286 as $value9) {
                                                      foreach ($sueldosySalarios1286F as $value10) {
                                                        foreach ($sueldosySalarios1219 as $value11) {
                                                          foreach ($sueldosySalarios1219F as $value12) {
                                                            foreach ($sueldosySalarios0840 as $value13) {
                                                              foreach ($sueldosySalarios0840F as $value14) {
                                                                foreach ($sueldosySalarios1340 as $value15) {
                                                                  foreach ($sueldosySalarios1340F as $value16) {

                                                                    $sueldosySalariosN6278 = $value["egresos"];
                                                                    $sueldosySalariosN6278F = $value2["egresos"];
                                                                    $sueldosySalariosN3450 = $value3["egresos"];
                                                                    $sueldosySalariosN3450F = $value4["egresos"];
                                                                    $sueldosySalariosN0198 = $value5["egresos"];
                                                                    $sueldosySalariosN0198F = $value6["egresos"];
                                                                    $sueldosySalariosNCaja = $value7["egresos"];
                                                                    $sueldosySalariosNCajaF = $value8["egresos"];
                                                                    $sueldosySalariosN1286 = $value9["egresos"];
                                                                    $sueldosySalariosN1286F = $value10["egresos"];
                                                                    $sueldosySalariosN1219 = $value11["egresos"];
                                                                    $sueldosySalariosN1219F = $value12["egresos"];
                                                                    $sueldosySalariosN0840 = $value13["egresos"];
                                                                    $sueldosySalariosN0840F = $value14["egresos"];
                                                                    $sueldosySalariosN1340 = $value15["egresos"];
                                                                    $sueldosySalariosN1340F = $value16["egresos"];

                                                                    $sueldosySalariosTotal = $sueldosySalariosN6278 + $sueldosySalariosN3450 + $sueldosySalariosN0198 + $sueldosySalariosNCaja + $sueldosySalariosN1286 + $sueldosySalariosN1219 + $sueldosySalariosN0840 + $sueldosySalariosN1340;
                                                                    $sueldosySalariosTotalF = $sueldosySalariosN6278F + $sueldosySalariosN3450F + $sueldosySalariosN0198F + $sueldosySalariosNCajaF + $sueldosySalariosN1286F + $sueldosySalariosN1219F + $sueldosySalariosN0840F + $sueldosySalariosN1340F;
                                                                    $importesSueldosySalarios = $sueldosySalariosTotal + $sueldosySalariosTotalF;
                                                                    echo '<td>$'.number_format($sueldosySalariosTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($sueldosySalariosTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesSueldosySalarios,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Impuestos Federales SAT</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $impuestosFederalesSAT6278 = ControladorBanco6278::ctrImpuestosFederalesSAT($item, $valor);
                                    $impuestosFederalesSAT6278F = ControladorBanco6278::ctrImpuestosFederalesSATF($item, $valor);
                                    $impuestosFederalesSAT3450 = ControladorBanco3450::ctrImpuestosFederalesSAT($item, $valor);
                                    $impuestosFederalesSAT3450F = ControladorBanco3450::ctrImpuestosFederalesSATF($item, $valor);
                                    $impuestosFederalesSAT0198 = ControladorBanco0198::ctrImpuestosFederalesSAT($item, $valor);
                                    $impuestosFederalesSAT0198F = ControladorBanco0198::ctrImpuestosFederalesSATF($item, $valor);
                                    $impuestosFederalesSATCaja = ControladorCaja::ctrImpuestosFederalesSAT($item, $valor);
                                    $impuestosFederalesSATCajaF = ControladorCaja::ctrImpuestosFederalesSATF($item, $valor);
                                    $impuestosFederalesSAT1286 = ControladorBanco1286::ctrImpuestosFederalesSAT($item, $valor);
                                    $impuestosFederalesSAT1286F = ControladorBanco1286::ctrImpuestosFederalesSATF($item, $valor);
                                    $impuestosFederalesSAT1219 = ControladorBanco1219::ctrImpuestosFederalesSAT($item, $valor);
                                    $impuestosFederalesSAT1219F = ControladorBanco1219::ctrImpuestosFederalesSATF($item, $valor);
                                    $impuestosFederalesSAT0840 = ControladorBanco0840::ctrImpuestosFederalesSAT($item, $valor);
                                    $impuestosFederalesSAT0840F = ControladorBanco0840::ctrImpuestosFederalesSATF($item, $valor);
                                    $impuestosFederalesSAT1340 = ControladorBanco1340::ctrImpuestosFederalesSAT($item, $valor);
                                    $impuestosFederalesSAT1340F = ControladorBanco1340::ctrImpuestosFederalesSATF($item, $valor);

                                    foreach ($impuestosFederalesSAT6278 as $value) {
                                      foreach ($impuestosFederalesSAT6278F as $value2) {
                                        foreach ($impuestosFederalesSAT3450 as $value3) {
                                          foreach ($impuestosFederalesSAT1340F as $value4) {
                                            foreach ($impuestosFederalesSAT0198 as $value5) {
                                              foreach ($impuestosFederalesSAT0198F as $value6) {
                                                foreach ($impuestosFederalesSATCaja as $value7) {
                                                  foreach ($impuestosFederalesSATCajaF as $value8) {
                                                    foreach ($impuestosFederalesSAT1286 as $value9) {
                                                      foreach ($impuestosFederalesSAT1286F as $value10) {
                                                        foreach ($impuestosFederalesSAT1219 as $value11) {
                                                          foreach ($impuestosFederalesSAT1219F as $value12) {
                                                            foreach ($impuestosFederalesSAT0840 as $value13) {
                                                              foreach ($impuestosFederalesSAT0840F as $value14) {
                                                                foreach ($impuestosFederalesSAT1340 as $value15) {
                                                                  foreach ($impuestosFederalesSAT1340F as $value16) {

                                                                    $impuestosFederalesSATN6278 = $value["egresos"];
                                                                    $impuestosFederalesSATN6278F = $value2["egresos"];
                                                                    $impuestosFederalesSATN3450 = $value3["egresos"];
                                                                    $impuestosFederalesSATN3450F = $value4["egresos"];
                                                                    $impuestosFederalesSATN0198 = $value5["egresos"];
                                                                    $impuestosFederalesSATN0198F = $value6["egresos"];
                                                                    $impuestosFederalesSATNCaja = $value7["egresos"];
                                                                    $impuestosFederalesSATNCajaF = $value8["egresos"];
                                                                    $impuestosFederalesSATN1286 = $value9["egresos"];
                                                                    $impuestosFederalesSATN1286F = $value10["egresos"];
                                                                    $impuestosFederalesSATN1219 = $value11["egresos"];
                                                                    $impuestosFederalesSATN1219F = $value12["egresos"];
                                                                    $impuestosFederalesSATN0840 = $value13["egresos"];
                                                                    $impuestosFederalesSATN0840F = $value14["egresos"];
                                                                    $impuestosFederalesSATN1340 = $value15["egresos"];
                                                                    $impuestosFederalesSATN1340F = $value16["egresos"];

                                                                    $impuestosFederalesSATTotal = $impuestosFederalesSATN6278 + $impuestosFederalesSATN3450 + $impuestosFederalesSATN0198 + $impuestosFederalesSATNCaja + $impuestosFederalesSATN1286 + $impuestosFederalesSATN1219 + $impuestosFederalesSATN0840 + $impuestosFederalesSATN1340;
                                                                    $impuestosFederalesSATTotalF = $impuestosFederalesSATN6278F + $impuestosFederalesSATN3450F + $impuestosFederalesSATN0198F + $impuestosFederalesSATNCajaF + $impuestosFederalesSATN1286F + $impuestosFederalesSATN1219F + $impuestosFederalesSATN0840F + $impuestosFederalesSATN1340F;
                                                                    $importesImpuestosFederalesSAT = $impuestosFederalesSATTotal + $impuestosFederalesSATTotalF;
                                                                    echo '<td>$'.number_format($impuestosFederalesSATTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($impuestosFederalesSATTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesImpuestosFederalesSAT,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Impuestos Federales SUA</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $impuestosFederalesSUA6278 = ControladorBanco6278::ctrImpuestosFederalesSUA($item, $valor);
                                    $impuestosFederalesSUA6278F = ControladorBanco6278::ctrImpuestosFederalesSUAF($item, $valor);
                                    $impuestosFederalesSUA3450 = ControladorBanco3450::ctrImpuestosFederalesSUA($item, $valor);
                                    $impuestosFederalesSUA3450F = ControladorBanco3450::ctrImpuestosFederalesSUAF($item, $valor);
                                    $impuestosFederalesSUA0198 = ControladorBanco0198::ctrImpuestosFederalesSUA($item, $valor);
                                    $impuestosFederalesSUA0198F = ControladorBanco0198::ctrImpuestosFederalesSUAF($item, $valor);
                                    $impuestosFederalesSUACaja = ControladorCaja::ctrImpuestosFederalesSUA($item, $valor);
                                    $impuestosFederalesSUACajaF = ControladorCaja::ctrImpuestosFederalesSUAF($item, $valor);
                                    $impuestosFederalesSUA1286 = ControladorBanco1286::ctrImpuestosFederalesSUA($item, $valor);
                                    $impuestosFederalesSUA1286F = ControladorBanco1286::ctrImpuestosFederalesSUAF($item, $valor);
                                    $impuestosFederalesSUA1219 = ControladorBanco1219::ctrImpuestosFederalesSUA($item, $valor);
                                    $impuestosFederalesSUA1219F = ControladorBanco1219::ctrImpuestosFederalesSUAF($item, $valor);
                                    $impuestosFederalesSUA0840 = ControladorBanco0840::ctrImpuestosFederalesSUA($item, $valor);
                                    $impuestosFederalesSUA0840F = ControladorBanco0840::ctrImpuestosFederalesSUAF($item, $valor);
                                    $impuestosFederalesSUA1340 = ControladorBanco1340::ctrImpuestosFederalesSUA($item, $valor);
                                    $impuestosFederalesSUA1340F = ControladorBanco1340::ctrImpuestosFederalesSUAF($item, $valor);

                                    foreach ($impuestosFederalesSUA6278 as $value) {
                                      foreach ($impuestosFederalesSUA6278F as $value2) {
                                        foreach ($impuestosFederalesSUA3450 as $value3) {
                                          foreach ($impuestosFederalesSUA1340F as $value4) {
                                            foreach ($impuestosFederalesSUA0198 as $value5) {
                                              foreach ($impuestosFederalesSUA0198F as $value6) {
                                                foreach ($impuestosFederalesSUACaja as $value7) {
                                                  foreach ($impuestosFederalesSUACajaF as $value8) {
                                                    foreach ($impuestosFederalesSUA1286 as $value9) {
                                                      foreach ($impuestosFederalesSUA1286F as $value10) {
                                                        foreach ($impuestosFederalesSUA1219 as $value11) {
                                                          foreach ($impuestosFederalesSUA1219F as $value12) {
                                                            foreach ($impuestosFederalesSUA0840 as $value13) {
                                                              foreach ($impuestosFederalesSUA0840F as $value14) {
                                                                foreach ($impuestosFederalesSUA1340 as $value15) {
                                                                  foreach ($impuestosFederalesSUA1340F as $value16) {

                                                                    $impuestosFederalesSUAN6278 = $value["egresos"];
                                                                    $impuestosFederalesSUAN6278F = $value2["egresos"];
                                                                    $impuestosFederalesSUAN3450 = $value3["egresos"];
                                                                    $impuestosFederalesSUAN3450F = $value4["egresos"];
                                                                    $impuestosFederalesSUAN0198 = $value5["egresos"];
                                                                    $impuestosFederalesSUAN0198F = $value6["egresos"];
                                                                    $impuestosFederalesSUANCaja = $value7["egresos"];
                                                                    $impuestosFederalesSUANCajaF = $value8["egresos"];
                                                                    $impuestosFederalesSUAN1286 = $value9["egresos"];
                                                                    $impuestosFederalesSUAN1286F = $value10["egresos"];
                                                                    $impuestosFederalesSUAN1219 = $value11["egresos"];
                                                                    $impuestosFederalesSUAN1219F = $value12["egresos"];
                                                                    $impuestosFederalesSUAN0840 = $value13["egresos"];
                                                                    $impuestosFederalesSUAN0840F = $value14["egresos"];
                                                                    $impuestosFederalesSUAN1340 = $value15["egresos"];
                                                                    $impuestosFederalesSUAN1340F = $value16["egresos"];

                                                                    $impuestosFederalesSUATotal = $impuestosFederalesSUAN6278 + $impuestosFederalesSUAN3450 + $impuestosFederalesSUAN0198 + $impuestosFederalesSUANCaja + $impuestosFederalesSUAN1286 + $impuestosFederalesSUAN1219 + $impuestosFederalesSUAN0840 + $impuestosFederalesSUAN1340;
                                                                    $impuestosFederalesSUATotalF = $impuestosFederalesSUAN6278F + $impuestosFederalesSUAN3450F + $impuestosFederalesSUAN0198F + $impuestosFederalesSUANCajaF + $impuestosFederalesSUAN1286F + $impuestosFederalesSUAN1219F + $impuestosFederalesSUAN0840F + $impuestosFederalesSUAN1340F;
                                                                    $importesImpuestosFederalesSUA = $impuestosFederalesSUATotal + $impuestosFederalesSUATotalF;
                                                                    echo '<td>$'.number_format($impuestosFederalesSUATotal,2).'</td>';
                                                                    echo '<td>$'.number_format($impuestosFederalesSUATotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesImpuestosFederalesSUA,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Aguinaldo</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $aguinaldo6278 = ControladorBanco6278::ctrAguinaldo($item, $valor);
                                    $aguinaldo6278F = ControladorBanco6278::ctrAguinaldoF($item, $valor);
                                    $aguinaldo3450 = ControladorBanco3450::ctrAguinaldo($item, $valor);
                                    $aguinaldo3450F = ControladorBanco3450::ctrAguinaldoF($item, $valor);
                                    $aguinaldo0198 = ControladorBanco0198::ctrAguinaldo($item, $valor);
                                    $aguinaldo0198F = ControladorBanco0198::ctrAguinaldoF($item, $valor);
                                    $aguinaldoCaja = ControladorCaja::ctrAguinaldo($item, $valor);
                                    $aguinaldoCajaF = ControladorCaja::ctrAguinaldoF($item, $valor);
                                    $aguinaldo1286 = ControladorBanco1286::ctrAguinaldo($item, $valor);
                                    $aguinaldo1286F = ControladorBanco1286::ctrAguinaldoF($item, $valor);
                                    $aguinaldo1219 = ControladorBanco1219::ctrAguinaldo($item, $valor);
                                    $aguinaldo1219F = ControladorBanco1219::ctrAguinaldoF($item, $valor);
                                    $aguinaldo0840 = ControladorBanco0840::ctrAguinaldo($item, $valor);
                                    $aguinaldo0840F = ControladorBanco0840::ctrAguinaldoF($item, $valor);
                                    $aguinaldo1340 = ControladorBanco1340::ctrAguinaldo($item, $valor);
                                    $aguinaldo1340F = ControladorBanco1340::ctrAguinaldoF($item, $valor);

                                    foreach ($aguinaldo6278 as $value) {
                                      foreach ($aguinaldo6278F as $value2) {
                                        foreach ($aguinaldo3450 as $value3) {
                                          foreach ($aguinaldo1340F as $value4) {
                                            foreach ($aguinaldo0198 as $value5) {
                                              foreach ($aguinaldo0198F as $value6) {
                                                foreach ($aguinaldoCaja as $value7) {
                                                  foreach ($aguinaldoCajaF as $value8) {
                                                    foreach ($aguinaldo1286 as $value9) {
                                                      foreach ($aguinaldo1286F as $value10) {
                                                        foreach ($aguinaldo1219 as $value11) {
                                                          foreach ($aguinaldo1219F as $value12) {
                                                            foreach ($aguinaldo0840 as $value13) {
                                                              foreach ($aguinaldo0840F as $value14) {
                                                                foreach ($aguinaldo1340 as $value15) {
                                                                  foreach ($aguinaldo1340F as $value16) {

                                                                    $aguinaldoN6278 = $value["egresos"];
                                                                    $aguinaldoN6278F = $value2["egresos"];
                                                                    $aguinaldoN3450 = $value3["egresos"];
                                                                    $aguinaldoN3450F = $value4["egresos"];
                                                                    $aguinaldoN0198 = $value5["egresos"];
                                                                    $aguinaldoN0198F = $value6["egresos"];
                                                                    $aguinaldoNCaja = $value7["egresos"];
                                                                    $aguinaldoNCajaF = $value8["egresos"];
                                                                    $aguinaldoN1286 = $value9["egresos"];
                                                                    $aguinaldoN1286F = $value10["egresos"];
                                                                    $aguinaldoN1219 = $value11["egresos"];
                                                                    $aguinaldoN1219F = $value12["egresos"];
                                                                    $aguinaldoN0840 = $value13["egresos"];
                                                                    $aguinaldoN0840F = $value14["egresos"];
                                                                    $aguinaldoN1340 = $value15["egresos"];
                                                                    $aguinaldoN1340F = $value16["egresos"];

                                                                    $aguinaldoTotal = $aguinaldoN6278 + $aguinaldoN3450 + $aguinaldoN0198 + $aguinaldoNCaja + $aguinaldoN1286 + $aguinaldoN1219 + $aguinaldoN0840 + $aguinaldoN1340;
                                                                    $aguinaldoTotalF = $aguinaldoN6278F + $aguinaldoN3450F + $aguinaldoN0198F + $aguinaldoNCajaF + $aguinaldoN1286F + $aguinaldoN1219F + $aguinaldoN0840F + $aguinaldoN1340F;
                                                                    $importesAguinaldo = $aguinaldoTotal + $aguinaldoTotalF;
                                                                    echo '<td>$'.number_format($aguinaldoTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($aguinaldoTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesAguinaldo,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Despensa</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $despensa6278 = ControladorBanco6278::ctrDespensa($item, $valor);
                                    $despensa6278F = ControladorBanco6278::ctrDespensaF($item, $valor);
                                    $despensa3450 = ControladorBanco3450::ctrDespensa($item, $valor);
                                    $despensa3450F = ControladorBanco3450::ctrDespensaF($item, $valor);
                                    $despensa0198 = ControladorBanco0198::ctrDespensa($item, $valor);
                                    $despensa0198F = ControladorBanco0198::ctrDespensaF($item, $valor);
                                    $despensaCaja = ControladorCaja::ctrDespensa($item, $valor);
                                    $despensaCajaF = ControladorCaja::ctrDespensaF($item, $valor);
                                    $despensa1286 = ControladorBanco1286::ctrDespensa($item, $valor);
                                    $despensa1286F = ControladorBanco1286::ctrDespensaF($item, $valor);
                                    $despensa1219 = ControladorBanco1219::ctrDespensa($item, $valor);
                                    $despensa1219F = ControladorBanco1219::ctrDespensaF($item, $valor);
                                    $despensa0840 = ControladorBanco0840::ctrDespensa($item, $valor);
                                    $despensa0840F = ControladorBanco0840::ctrDespensaF($item, $valor);
                                    $despensa1340 = ControladorBanco1340::ctrDespensa($item, $valor);
                                    $despensa1340F = ControladorBanco1340::ctrDespensaF($item, $valor);

                                    foreach ($despensa6278 as $value) {
                                      foreach ($despensa6278F as $value2) {
                                        foreach ($despensa3450 as $value3) {
                                          foreach ($despensa1340F as $value4) {
                                            foreach ($despensa0198 as $value5) {
                                              foreach ($despensa0198F as $value6) {
                                                foreach ($despensaCaja as $value7) {
                                                  foreach ($despensaCajaF as $value8) {
                                                    foreach ($despensa1286 as $value9) {
                                                      foreach ($despensa1286F as $value10) {
                                                        foreach ($despensa1219 as $value11) {
                                                          foreach ($despensa1219F as $value12) {
                                                            foreach ($despensa0840 as $value13) {
                                                              foreach ($despensa0840F as $value14) {
                                                                foreach ($despensa1340 as $value15) {
                                                                  foreach ($despensa1340F as $value16) {

                                                                    $despensaN6278 = $value["egresos"];
                                                                    $despensaN6278F = $value2["egresos"];
                                                                    $despensaN3450 = $value3["egresos"];
                                                                    $despensaN3450F = $value4["egresos"];
                                                                    $despensaN0198 = $value5["egresos"];
                                                                    $despensaN0198F = $value6["egresos"];
                                                                    $despensaNCaja = $value7["egresos"];
                                                                    $despensaNCajaF = $value8["egresos"];
                                                                    $despensaN1286 = $value9["egresos"];
                                                                    $despensaN1286F = $value10["egresos"];
                                                                    $despensaN1219 = $value11["egresos"];
                                                                    $despensaN1219F = $value12["egresos"];
                                                                    $despensaN0840 = $value13["egresos"];
                                                                    $despensaN0840F = $value14["egresos"];
                                                                    $despensaN1340 = $value15["egresos"];
                                                                    $despensaN1340F = $value16["egresos"];

                                                                    $despensaTotal = $despensaN6278 + $despensaN3450 + $despensaN0198 + $despensaNCaja + $despensaN1286 + $despensaN1219 + $despensaN0840 + $despensaN1340;
                                                                    $despensaTotalF = $despensaN6278F + $despensaN3450F + $despensaN0198F + $despensaNCajaF + $despensaN1286F + $despensaN1219F + $despensaN0840F + $despensaN1340F;
                                                                    $importesDespensa = $despensaTotal + $despensaTotalF;
                                                                    echo '<td>$'.number_format($despensaTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($despensaTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesDespensa,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Vacaciones</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $vacaciones6278 = ControladorBanco6278::ctrVacaciones($item, $valor);
                                    $vacaciones6278F = ControladorBanco6278::ctrVacacionesF($item, $valor);
                                    $vacaciones3450 = ControladorBanco3450::ctrVacaciones($item, $valor);
                                    $vacaciones3450F = ControladorBanco3450::ctrVacacionesF($item, $valor);
                                    $vacaciones0198 = ControladorBanco0198::ctrVacaciones($item, $valor);
                                    $vacaciones0198F = ControladorBanco0198::ctrVacacionesF($item, $valor);
                                    $vacacionesCaja = ControladorCaja::ctrVacaciones($item, $valor);
                                    $vacacionesCajaF = ControladorCaja::ctrVacacionesF($item, $valor);
                                    $vacaciones1286 = ControladorBanco1286::ctrVacaciones($item, $valor);
                                    $vacaciones1286F = ControladorBanco1286::ctrVacacionesF($item, $valor);
                                    $vacaciones1219 = ControladorBanco1219::ctrVacaciones($item, $valor);
                                    $vacaciones1219F = ControladorBanco1219::ctrVacacionesF($item, $valor);
                                    $vacaciones0840 = ControladorBanco0840::ctrVacaciones($item, $valor);
                                    $vacaciones0840F = ControladorBanco0840::ctrVacacionesF($item, $valor);
                                    $vacaciones1340 = ControladorBanco1340::ctrVacaciones($item, $valor);
                                    $vacaciones1340F = ControladorBanco1340::ctrVacacionesF($item, $valor);

                                    foreach ($vacaciones6278 as $value) {
                                      foreach ($vacaciones6278F as $value2) {
                                        foreach ($vacaciones3450 as $value3) {
                                          foreach ($vacaciones1340F as $value4) {
                                            foreach ($vacaciones0198 as $value5) {
                                              foreach ($vacaciones0198F as $value6) {
                                                foreach ($vacacionesCaja as $value7) {
                                                  foreach ($vacacionesCajaF as $value8) {
                                                    foreach ($vacaciones1286 as $value9) {
                                                      foreach ($vacaciones1286F as $value10) {
                                                        foreach ($vacaciones1219 as $value11) {
                                                          foreach ($vacaciones1219F as $value12) {
                                                            foreach ($vacaciones0840 as $value13) {
                                                              foreach ($vacaciones0840F as $value14) {
                                                                foreach ($vacaciones1340 as $value15) {
                                                                  foreach ($vacaciones1340F as $value16) {

                                                                    $vacacionesN6278 = $value["egresos"];
                                                                    $vacacionesN6278F = $value2["egresos"];
                                                                    $vacacionesN3450 = $value3["egresos"];
                                                                    $vacacionesN3450F = $value4["egresos"];
                                                                    $vacacionesN0198 = $value5["egresos"];
                                                                    $vacacionesN0198F = $value6["egresos"];
                                                                    $vacacionesNCaja = $value7["egresos"];
                                                                    $vacacionesNCajaF = $value8["egresos"];
                                                                    $vacacionesN1286 = $value9["egresos"];
                                                                    $vacacionesN1286F = $value10["egresos"];
                                                                    $vacacionesN1219 = $value11["egresos"];
                                                                    $vacacionesN1219F = $value12["egresos"];
                                                                    $vacacionesN0840 = $value13["egresos"];
                                                                    $vacacionesN0840F = $value14["egresos"];
                                                                    $vacacionesN1340 = $value15["egresos"];
                                                                    $vacacionesN1340F = $value16["egresos"];

                                                                    $vacacionesTotal = $vacacionesN6278 + $vacacionesN3450 + $vacacionesN0198 + $vacacionesNCaja + $vacacionesN1286 + $vacacionesN1219 + $vacacionesN0840 + $vacacionesN1340;
                                                                    $vacacionesTotalF = $vacacionesN6278F + $vacacionesN3450F + $vacacionesN0198F + $vacacionesNCajaF + $vacacionesN1286F + $vacacionesN1219F + $vacacionesN0840F + $vacacionesN1340F;
                                                                    $importesVacaciones = $vacacionesTotal + $vacacionesTotalF;
                                                                    echo '<td>$'.number_format($vacacionesTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($vacacionesTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesVacaciones,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Prima Vacacional</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $primaVacacional6278 = ControladorBanco6278::ctrPrimaVacacional($item, $valor);
                                    $primaVacacional6278F = ControladorBanco6278::ctrPrimaVacacionalF($item, $valor);
                                    $primaVacacional3450 = ControladorBanco3450::ctrPrimaVacacional($item, $valor);
                                    $primaVacacional3450F = ControladorBanco3450::ctrPrimaVacacionalF($item, $valor);
                                    $primaVacacional0198 = ControladorBanco0198::ctrPrimaVacacional($item, $valor);
                                    $primaVacacional0198F = ControladorBanco0198::ctrPrimaVacacionalF($item, $valor);
                                    $primaVacacionalCaja = ControladorCaja::ctrPrimaVacacional($item, $valor);
                                    $primaVacacionalCajaF = ControladorCaja::ctrPrimaVacacionalF($item, $valor);
                                    $primaVacacional1286 = ControladorBanco1286::ctrPrimaVacacional($item, $valor);
                                    $primaVacacional1286F = ControladorBanco1286::ctrPrimaVacacionalF($item, $valor);
                                    $primaVacacional1219 = ControladorBanco1219::ctrPrimaVacacional($item, $valor);
                                    $primaVacacional1219F = ControladorBanco1219::ctrPrimaVacacionalF($item, $valor);
                                    $primaVacacional0840 = ControladorBanco0840::ctrPrimaVacacional($item, $valor);
                                    $primaVacacional0840F = ControladorBanco0840::ctrPrimaVacacionalF($item, $valor);
                                    $primaVacacional1340 = ControladorBanco1340::ctrPrimaVacacional($item, $valor);
                                    $primaVacacional1340F = ControladorBanco1340::ctrPrimaVacacionalF($item, $valor);

                                    foreach ($primaVacacional6278 as $value) {
                                      foreach ($primaVacacional6278F as $value2) {
                                        foreach ($primaVacacional3450 as $value3) {
                                          foreach ($primaVacacional1340F as $value4) {
                                            foreach ($primaVacacional0198 as $value5) {
                                              foreach ($primaVacacional0198F as $value6) {
                                                foreach ($primaVacacionalCaja as $value7) {
                                                  foreach ($primaVacacionalCajaF as $value8) {
                                                    foreach ($primaVacacional1286 as $value9) {
                                                      foreach ($primaVacacional1286F as $value10) {
                                                        foreach ($primaVacacional1219 as $value11) {
                                                          foreach ($primaVacacional1219F as $value12) {
                                                            foreach ($primaVacacional0840 as $value13) {
                                                              foreach ($primaVacacional0840F as $value14) {
                                                                foreach ($primaVacacional1340 as $value15) {
                                                                  foreach ($primaVacacional1340F as $value16) {

                                                                    $primaVacacionalN6278 = $value["egresos"];
                                                                    $primaVacacionalN6278F = $value2["egresos"];
                                                                    $primaVacacionalN3450 = $value3["egresos"];
                                                                    $primaVacacionalN3450F = $value4["egresos"];
                                                                    $primaVacacionalN0198 = $value5["egresos"];
                                                                    $primaVacacionalN0198F = $value6["egresos"];
                                                                    $primaVacacionalNCaja = $value7["egresos"];
                                                                    $primaVacacionalNCajaF = $value8["egresos"];
                                                                    $primaVacacionalN1286 = $value9["egresos"];
                                                                    $primaVacacionalN1286F = $value10["egresos"];
                                                                    $primaVacacionalN1219 = $value11["egresos"];
                                                                    $primaVacacionalN1219F = $value12["egresos"];
                                                                    $primaVacacionalN0840 = $value13["egresos"];
                                                                    $primaVacacionalN0840F = $value14["egresos"];
                                                                    $primaVacacionalN1340 = $value15["egresos"];
                                                                    $primaVacacionalN1340F = $value16["egresos"];

                                                                    $primaVacacionalTotal = $primaVacacionalN6278 + $primaVacacionalN3450 + $primaVacacionalN0198 + $primaVacacionalNCaja + $primaVacacionalN1286 + $primaVacacionalN1219 + $primaVacacionalN0840 + $primaVacacionalN1340;
                                                                    $primaVacacionalTotalF = $primaVacacionalN6278F + $primaVacacionalN3450F + $primaVacacionalN0198F + $primaVacacionalNCajaF + $primaVacacionalN1286F + $primaVacacionalN1219F + $primaVacacionalN0840F + $primaVacacionalN1340F;
                                                                    $importesPrimaVacacional = $primaVacacionalTotal + $primaVacacionalTotalF;
                                                                    echo '<td>$'.number_format($primaVacacionalTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($primaVacacionalTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesPrimaVacacional,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Prima Antigüedad</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $primaAntiguedad6278 = ControladorBanco6278::ctrPrimaAntiguedad($item, $valor);
                                    $primaAntiguedad6278F = ControladorBanco6278::ctrPrimaAntiguedadF($item, $valor);
                                    $primaAntiguedad3450 = ControladorBanco3450::ctrPrimaAntiguedad($item, $valor);
                                    $primaAntiguedad3450F = ControladorBanco3450::ctrPrimaAntiguedadF($item, $valor);
                                    $primaAntiguedad0198 = ControladorBanco0198::ctrPrimaAntiguedad($item, $valor);
                                    $primaAntiguedad0198F = ControladorBanco0198::ctrPrimaAntiguedadF($item, $valor);
                                    $primaAntiguedadCaja = ControladorCaja::ctrPrimaAntiguedad($item, $valor);
                                    $primaAntiguedadCajaF = ControladorCaja::ctrPrimaAntiguedadF($item, $valor);
                                    $primaAntiguedad1286 = ControladorBanco1286::ctrPrimaAntiguedad($item, $valor);
                                    $primaAntiguedad1286F = ControladorBanco1286::ctrPrimaAntiguedadF($item, $valor);
                                    $primaAntiguedad1219 = ControladorBanco1219::ctrPrimaAntiguedad($item, $valor);
                                    $primaAntiguedad1219F = ControladorBanco1219::ctrPrimaAntiguedadF($item, $valor);
                                    $primaAntiguedad0840 = ControladorBanco0840::ctrPrimaAntiguedad($item, $valor);
                                    $primaAntiguedad0840F = ControladorBanco0840::ctrPrimaAntiguedadF($item, $valor);
                                    $primaAntiguedad1340 = ControladorBanco1340::ctrPrimaAntiguedad($item, $valor);
                                    $primaAntiguedad1340F = ControladorBanco1340::ctrPrimaAntiguedadF($item, $valor);

                                    foreach ($primaAntiguedad6278 as $value) {
                                      foreach ($primaAntiguedad6278F as $value2) {
                                        foreach ($primaAntiguedad3450 as $value3) {
                                          foreach ($primaAntiguedad1340F as $value4) {
                                            foreach ($primaAntiguedad0198 as $value5) {
                                              foreach ($primaAntiguedad0198F as $value6) {
                                                foreach ($primaAntiguedadCaja as $value7) {
                                                  foreach ($primaAntiguedadCajaF as $value8) {
                                                    foreach ($primaAntiguedad1286 as $value9) {
                                                      foreach ($primaAntiguedad1286F as $value10) {
                                                        foreach ($primaAntiguedad1219 as $value11) {
                                                          foreach ($primaAntiguedad1219F as $value12) {
                                                            foreach ($primaAntiguedad0840 as $value13) {
                                                              foreach ($primaAntiguedad0840F as $value14) {
                                                                foreach ($primaAntiguedad1340 as $value15) {
                                                                  foreach ($primaAntiguedad1340F as $value16) {

                                                                    $primaAntiguedadN6278 = $value["egresos"];
                                                                    $primaAntiguedadN6278F = $value2["egresos"];
                                                                    $primaAntiguedadN3450 = $value3["egresos"];
                                                                    $primaAntiguedadN3450F = $value4["egresos"];
                                                                    $primaAntiguedadN0198 = $value5["egresos"];
                                                                    $primaAntiguedadN0198F = $value6["egresos"];
                                                                    $primaAntiguedadNCaja = $value7["egresos"];
                                                                    $primaAntiguedadNCajaF = $value8["egresos"];
                                                                    $primaAntiguedadN1286 = $value9["egresos"];
                                                                    $primaAntiguedadN1286F = $value10["egresos"];
                                                                    $primaAntiguedadN1219 = $value11["egresos"];
                                                                    $primaAntiguedadN1219F = $value12["egresos"];
                                                                    $primaAntiguedadN0840 = $value13["egresos"];
                                                                    $primaAntiguedadN0840F = $value14["egresos"];
                                                                    $primaAntiguedadN1340 = $value15["egresos"];
                                                                    $primaAntiguedadN1340F = $value16["egresos"];

                                                                    $primaAntiguedadTotal = $primaAntiguedadN6278 + $primaAntiguedadN3450 + $primaAntiguedadN0198 + $primaAntiguedadNCaja + $primaAntiguedadN1286 + $primaAntiguedadN1219 + $primaAntiguedadN0840 + $primaAntiguedadN1340;
                                                                    $primaAntiguedadTotalF = $primaAntiguedadN6278F + $primaAntiguedadN3450F + $primaAntiguedadN0198F + $primaAntiguedadNCajaF + $primaAntiguedadN1286F + $primaAntiguedadN1219F + $primaAntiguedadN0840F + $primaAntiguedadN1340F;
                                                                    $importesPrimaAntiguedad = $primaAntiguedadTotal + $primaAntiguedadTotalF;
                                                                    echo '<td>$'.number_format($primaAntiguedadTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($primaAntiguedadTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesPrimaAntiguedad,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Septimo Día</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $septimoDia6278 = ControladorBanco6278::ctrSeptimoDia($item, $valor);
                                    $septimoDia6278F = ControladorBanco6278::ctrSeptimoDiaF($item, $valor);
                                    $septimoDia3450 = ControladorBanco3450::ctrSeptimoDia($item, $valor);
                                    $septimoDia3450F = ControladorBanco3450::ctrSeptimoDiaF($item, $valor);
                                    $septimoDia0198 = ControladorBanco0198::ctrSeptimoDia($item, $valor);
                                    $septimoDia0198F = ControladorBanco0198::ctrSeptimoDiaF($item, $valor);
                                    $septimoDiaCaja = ControladorCaja::ctrSeptimoDia($item, $valor);
                                    $septimoDiaCajaF = ControladorCaja::ctrSeptimoDiaF($item, $valor);
                                    $septimoDia1286 = ControladorBanco1286::ctrSeptimoDia($item, $valor);
                                    $septimoDia1286F = ControladorBanco1286::ctrSeptimoDiaF($item, $valor);
                                    $septimoDia1219 = ControladorBanco1219::ctrSeptimoDia($item, $valor);
                                    $septimoDia1219F = ControladorBanco1219::ctrSeptimoDiaF($item, $valor);
                                    $septimoDia0840 = ControladorBanco0840::ctrSeptimoDia($item, $valor);
                                    $septimoDia0840F = ControladorBanco0840::ctrSeptimoDiaF($item, $valor);
                                    $septimoDia1340 = ControladorBanco1340::ctrSeptimoDia($item, $valor);
                                    $septimoDia1340F = ControladorBanco1340::ctrSeptimoDiaF($item, $valor);

                                    foreach ($septimoDia6278 as $value) {
                                      foreach ($septimoDia6278F as $value2) {
                                        foreach ($septimoDia3450 as $value3) {
                                          foreach ($septimoDia1340F as $value4) {
                                            foreach ($septimoDia0198 as $value5) {
                                              foreach ($septimoDia0198F as $value6) {
                                                foreach ($septimoDiaCaja as $value7) {
                                                  foreach ($septimoDiaCajaF as $value8) {
                                                    foreach ($septimoDia1286 as $value9) {
                                                      foreach ($septimoDia1286F as $value10) {
                                                        foreach ($septimoDia1219 as $value11) {
                                                          foreach ($septimoDia1219F as $value12) {
                                                            foreach ($septimoDia0840 as $value13) {
                                                              foreach ($septimoDia0840F as $value14) {
                                                                foreach ($septimoDia1340 as $value15) {
                                                                  foreach ($septimoDia1340F as $value16) {

                                                                    $septimoDiaN6278 = $value["egresos"];
                                                                    $septimoDiaN6278F = $value2["egresos"];
                                                                    $septimoDiaN3450 = $value3["egresos"];
                                                                    $septimoDiaN3450F = $value4["egresos"];
                                                                    $septimoDiaN0198 = $value5["egresos"];
                                                                    $septimoDiaN0198F = $value6["egresos"];
                                                                    $septimoDiaNCaja = $value7["egresos"];
                                                                    $septimoDiaNCajaF = $value8["egresos"];
                                                                    $septimoDiaN1286 = $value9["egresos"];
                                                                    $septimoDiaN1286F = $value10["egresos"];
                                                                    $septimoDiaN1219 = $value11["egresos"];
                                                                    $septimoDiaN1219F = $value12["egresos"];
                                                                    $septimoDiaN0840 = $value13["egresos"];
                                                                    $septimoDiaN0840F = $value14["egresos"];
                                                                    $septimoDiaN1340 = $value15["egresos"];
                                                                    $septimoDiaN1340F = $value16["egresos"];

                                                                    $septimoDiaTotal = $septimoDiaN6278 + $septimoDiaN3450 + $septimoDiaN0198 + $septimoDiaNCaja + $septimoDiaN1286 + $septimoDiaN1219 + $septimoDiaN0840 + $septimoDiaN1340;
                                                                    $septimoDiaTotalF = $septimoDiaN6278F + $septimoDiaN3450F + $septimoDiaN0198F + $septimoDiaNCajaF + $septimoDiaN1286F + $septimoDiaN1219F + $septimoDiaN0840F + $septimoDiaN1340F;
                                                                    $importesSeptimoDia = $septimoDiaTotal + $septimoDiaTotalF;
                                                                    echo '<td>$'.number_format($septimoDiaTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($septimoDiaTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesSeptimoDia,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Separacion</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $separacion6278 = ControladorBanco6278::ctrSeparacion($item, $valor);
                                    $separacion6278F = ControladorBanco6278::ctrSeparacionF($item, $valor);
                                    $separacion3450 = ControladorBanco3450::ctrSeparacion($item, $valor);
                                    $separacion3450F = ControladorBanco3450::ctrSeparacionF($item, $valor);
                                    $separacion0198 = ControladorBanco0198::ctrSeparacion($item, $valor);
                                    $separacion0198F = ControladorBanco0198::ctrSeparacionF($item, $valor);
                                    $separacionCaja = ControladorCaja::ctrSeparacion($item, $valor);
                                    $separacionCajaF = ControladorCaja::ctrSeparacionF($item, $valor);
                                    $separacion1286 = ControladorBanco1286::ctrSeparacion($item, $valor);
                                    $separacion1286F = ControladorBanco1286::ctrSeparacionF($item, $valor);
                                    $separacion1219 = ControladorBanco1219::ctrSeparacion($item, $valor);
                                    $separacion1219F = ControladorBanco1219::ctrSeparacionF($item, $valor);
                                    $separacion0840 = ControladorBanco0840::ctrSeparacion($item, $valor);
                                    $separacion0840F = ControladorBanco0840::ctrSeparacionF($item, $valor);
                                    $separacion1340 = ControladorBanco1340::ctrSeparacion($item, $valor);
                                    $separacion1340F = ControladorBanco1340::ctrSeparacionF($item, $valor);

                                    foreach ($separacion6278 as $value) {
                                      foreach ($separacion6278F as $value2) {
                                        foreach ($separacion3450 as $value3) {
                                          foreach ($separacion1340F as $value4) {
                                            foreach ($separacion0198 as $value5) {
                                              foreach ($separacion0198F as $value6) {
                                                foreach ($separacionCaja as $value7) {
                                                  foreach ($separacionCajaF as $value8) {
                                                    foreach ($separacion1286 as $value9) {
                                                      foreach ($separacion1286F as $value10) {
                                                        foreach ($separacion1219 as $value11) {
                                                          foreach ($separacion1219F as $value12) {
                                                            foreach ($separacion0840 as $value13) {
                                                              foreach ($separacion0840F as $value14) {
                                                                foreach ($separacion1340 as $value15) {
                                                                  foreach ($separacion1340F as $value16) {

                                                                    $separacionN6278 = $value["egresos"];
                                                                    $separacionN6278F = $value2["egresos"];
                                                                    $separacionN3450 = $value3["egresos"];
                                                                    $separacionN3450F = $value4["egresos"];
                                                                    $separacionN0198 = $value5["egresos"];
                                                                    $separacionN0198F = $value6["egresos"];
                                                                    $separacionNCaja = $value7["egresos"];
                                                                    $separacionNCajaF = $value8["egresos"];
                                                                    $separacionN1286 = $value9["egresos"];
                                                                    $separacionN1286F = $value10["egresos"];
                                                                    $separacionN1219 = $value11["egresos"];
                                                                    $separacionN1219F = $value12["egresos"];
                                                                    $separacionN0840 = $value13["egresos"];
                                                                    $separacionN0840F = $value14["egresos"];
                                                                    $separacionN1340 = $value15["egresos"];
                                                                    $separacionN1340F = $value16["egresos"];

                                                                    $separacionTotal = $separacionN6278 + $separacionN3450 + $separacionN0198 + $separacionNCaja + $separacionN1286 + $separacionN1219 + $separacionN0840 + $separacionN1340;
                                                                    $separacionTotalF = $separacionN6278F + $separacionN3450F + $separacionN0198F + $separacionNCajaF + $separacionN1286F + $separacionN1219F + $separacionN0840F + $separacionN1340F;
                                                                    $importesSeparacion = $separacionTotal + $separacionTotalF;
                                                                    echo '<td>$'.number_format($separacionTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($separacionTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesSeparacion,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Indemnizacion</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $indemnizacion6278 = ControladorBanco6278::ctrIndemnizacion($item, $valor);
                                    $indemnizacion6278F = ControladorBanco6278::ctrIndemnizacionF($item, $valor);
                                    $indemnizacion3450 = ControladorBanco3450::ctrIndemnizacion($item, $valor);
                                    $indemnizacion3450F = ControladorBanco3450::ctrIndemnizacionF($item, $valor);
                                    $indemnizacion0198 = ControladorBanco0198::ctrIndemnizacion($item, $valor);
                                    $indemnizacion0198F = ControladorBanco0198::ctrIndemnizacionF($item, $valor);
                                    $indemnizacionCaja = ControladorCaja::ctrIndemnizacion($item, $valor);
                                    $indemnizacionCajaF = ControladorCaja::ctrIndemnizacionF($item, $valor);
                                    $indemnizacion1286 = ControladorBanco1286::ctrIndemnizacion($item, $valor);
                                    $indemnizacion1286F = ControladorBanco1286::ctrIndemnizacionF($item, $valor);
                                    $indemnizacion1219 = ControladorBanco1219::ctrIndemnizacion($item, $valor);
                                    $indemnizacion1219F = ControladorBanco1219::ctrIndemnizacionF($item, $valor);
                                    $indemnizacion0840 = ControladorBanco0840::ctrIndemnizacion($item, $valor);
                                    $indemnizacion0840F = ControladorBanco0840::ctrIndemnizacionF($item, $valor);
                                    $indemnizacion1340 = ControladorBanco1340::ctrIndemnizacion($item, $valor);
                                    $indemnizacion1340F = ControladorBanco1340::ctrIndemnizacionF($item, $valor);

                                    foreach ($indemnizacion6278 as $value) {
                                      foreach ($indemnizacion6278F as $value2) {
                                        foreach ($indemnizacion3450 as $value3) {
                                          foreach ($indemnizacion1340F as $value4) {
                                            foreach ($indemnizacion0198 as $value5) {
                                              foreach ($indemnizacion0198F as $value6) {
                                                foreach ($indemnizacionCaja as $value7) {
                                                  foreach ($indemnizacionCajaF as $value8) {
                                                    foreach ($indemnizacion1286 as $value9) {
                                                      foreach ($indemnizacion1286F as $value10) {
                                                        foreach ($indemnizacion1219 as $value11) {
                                                          foreach ($indemnizacion1219F as $value12) {
                                                            foreach ($indemnizacion0840 as $value13) {
                                                              foreach ($indemnizacion0840F as $value14) {
                                                                foreach ($indemnizacion1340 as $value15) {
                                                                  foreach ($indemnizacion1340F as $value16) {

                                                                    $indemnizacionN6278 = $value["egresos"];
                                                                    $indemnizacionN6278F = $value2["egresos"];
                                                                    $indemnizacionN3450 = $value3["egresos"];
                                                                    $indemnizacionN3450F = $value4["egresos"];
                                                                    $indemnizacionN0198 = $value5["egresos"];
                                                                    $indemnizacionN0198F = $value6["egresos"];
                                                                    $indemnizacionNCaja = $value7["egresos"];
                                                                    $indemnizacionNCajaF = $value8["egresos"];
                                                                    $indemnizacionN1286 = $value9["egresos"];
                                                                    $indemnizacionN1286F = $value10["egresos"];
                                                                    $indemnizacionN1219 = $value11["egresos"];
                                                                    $indemnizacionN1219F = $value12["egresos"];
                                                                    $indemnizacionN0840 = $value13["egresos"];
                                                                    $indemnizacionN0840F = $value14["egresos"];
                                                                    $indemnizacionN1340 = $value15["egresos"];
                                                                    $indemnizacionN1340F = $value16["egresos"];

                                                                    $indemnizacionTotal = $indemnizacionN6278 + $indemnizacionN3450 + $indemnizacionN0198 + $indemnizacionNCaja + $indemnizacionN1286 + $indemnizacionN1219 + $indemnizacionN0840 + $indemnizacionN1340;
                                                                    $indemnizacionTotalF = $indemnizacionN6278F + $indemnizacionN3450F + $indemnizacionN0198F + $indemnizacionNCajaF + $indemnizacionN1286F + $indemnizacionN1219F + $indemnizacionN0840F + $indemnizacionN1340F;
                                                                    $importesIndemnizacion = $IndemnizacionTotal + $IndemnizacionTotalF;
                                                                    echo '<td>$'.number_format($indemnizacionTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($indemnizacionTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesIndemnizacion,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Subsidio Empleo (SP)</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $subsidioEmpleo6278 = ControladorBanco6278::ctrSubsidioEmpleo($item, $valor);
                                    $subsidioEmpleo6278F = ControladorBanco6278::ctrSubsidioEmpleoF($item, $valor);
                                    $subsidioEmpleo3450 = ControladorBanco3450::ctrSubsidioEmpleo($item, $valor);
                                    $subsidioEmpleo3450F = ControladorBanco3450::ctrSubsidioEmpleoF($item, $valor);
                                    $subsidioEmpleo0198 = ControladorBanco0198::ctrSubsidioEmpleo($item, $valor);
                                    $subsidioEmpleo0198F = ControladorBanco0198::ctrSubsidioEmpleoF($item, $valor);
                                    $subsidioEmpleoCaja = ControladorCaja::ctrSubsidioEmpleo($item, $valor);
                                    $subsidioEmpleoCajaF = ControladorCaja::ctrSubsidioEmpleoF($item, $valor);
                                    $subsidioEmpleo1286 = ControladorBanco1286::ctrSubsidioEmpleo($item, $valor);
                                    $subsidioEmpleo1286F = ControladorBanco1286::ctrSubsidioEmpleoF($item, $valor);
                                    $subsidioEmpleo1219 = ControladorBanco1219::ctrSubsidioEmpleo($item, $valor);
                                    $subsidioEmpleo1219F = ControladorBanco1219::ctrSubsidioEmpleoF($item, $valor);
                                    $subsidioEmpleo0840 = ControladorBanco0840::ctrSubsidioEmpleo($item, $valor);
                                    $subsidioEmpleo0840F = ControladorBanco0840::ctrSubsidioEmpleoF($item, $valor);
                                    $subsidioEmpleo1340 = ControladorBanco1340::ctrSubsidioEmpleo($item, $valor);
                                    $subsidioEmpleo1340F = ControladorBanco1340::ctrSubsidioEmpleoF($item, $valor);

                                    foreach ($subsidioEmpleo6278 as $value) {
                                      foreach ($subsidioEmpleo6278F as $value2) {
                                        foreach ($subsidioEmpleo3450 as $value3) {
                                          foreach ($subsidioEmpleo1340F as $value4) {
                                            foreach ($subsidioEmpleo0198 as $value5) {
                                              foreach ($subsidioEmpleo0198F as $value6) {
                                                foreach ($subsidioEmpleoCaja as $value7) {
                                                  foreach ($subsidioEmpleoCajaF as $value8) {
                                                    foreach ($subsidioEmpleo1286 as $value9) {
                                                      foreach ($subsidioEmpleo1286F as $value10) {
                                                        foreach ($subsidioEmpleo1219 as $value11) {
                                                          foreach ($subsidioEmpleo1219F as $value12) {
                                                            foreach ($subsidioEmpleo0840 as $value13) {
                                                              foreach ($subsidioEmpleo0840F as $value14) {
                                                                foreach ($subsidioEmpleo1340 as $value15) {
                                                                  foreach ($subsidioEmpleo1340F as $value16) {

                                                                    $subsidioEmpleoN6278 = $value["egresos"];
                                                                    $subsidioEmpleoN6278F = $value2["egresos"];
                                                                    $subsidioEmpleoN3450 = $value3["egresos"];
                                                                    $subsidioEmpleoN3450F = $value4["egresos"];
                                                                    $subsidioEmpleoN0198 = $value5["egresos"];
                                                                    $subsidioEmpleoN0198F = $value6["egresos"];
                                                                    $subsidioEmpleoNCaja = $value7["egresos"];
                                                                    $subsidioEmpleoNCajaF = $value8["egresos"];
                                                                    $subsidioEmpleoN1286 = $value9["egresos"];
                                                                    $subsidioEmpleoN1286F = $value10["egresos"];
                                                                    $subsidioEmpleoN1219 = $value11["egresos"];
                                                                    $subsidioEmpleoN1219F = $value12["egresos"];
                                                                    $subsidioEmpleoN0840 = $value13["egresos"];
                                                                    $subsidioEmpleoN0840F = $value14["egresos"];
                                                                    $subsidioEmpleoN1340 = $value15["egresos"];
                                                                    $subsidioEmpleoN1340F = $value16["egresos"];

                                                                    $subsidioEmpleoTotal = $subsidioEmpleoN6278 + $subsidioEmpleoN3450 + $subsidioEmpleoN0198 + $subsidioEmpleoNCaja + $subsidioEmpleoN1286 + $subsidioEmpleoN1219 + $subsidioEmpleoN0840 + $subsidioEmpleoN1340;
                                                                    $subsidioEmpleoTotalF = $subsidioEmpleoN6278F + $subsidioEmpleoN3450F + $subsidioEmpleoN0198F + $subsidioEmpleoNCajaF + $subsidioEmpleoN1286F + $subsidioEmpleoN1219F + $subsidioEmpleoN0840F + $subsidioEmpleoN1340F;
                                                                    $importesSubsidioEmpleo = $subsidioEmpleoTotal + $subsidioEmpleoTotalF;
                                                                    echo '<td>$'.number_format($subsidioEmpleoTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($subsidioEmpleoTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesSubsidioEmpleo,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>PTU</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $ptu6278 = ControladorBanco6278::ctrPTU($item, $valor);
                                    $ptu6278F = ControladorBanco6278::ctrPTUF($item, $valor);
                                    $ptu3450 = ControladorBanco3450::ctrPTU($item, $valor);
                                    $ptu3450F = ControladorBanco3450::ctrPTUF($item, $valor);
                                    $ptu0198 = ControladorBanco0198::ctrPTU($item, $valor);
                                    $ptu0198F = ControladorBanco0198::ctrPTUF($item, $valor);
                                    $ptuCaja = ControladorCaja::ctrPTU($item, $valor);
                                    $ptuCajaF = ControladorCaja::ctrPTUF($item, $valor);
                                    $ptu1286 = ControladorBanco1286::ctrPTU($item, $valor);
                                    $ptu1286F = ControladorBanco1286::ctrPTUF($item, $valor);
                                    $ptu1219 = ControladorBanco1219::ctrPTU($item, $valor);
                                    $ptu1219F = ControladorBanco1219::ctrPTUF($item, $valor);
                                    $ptu0840 = ControladorBanco0840::ctrPTU($item, $valor);
                                    $ptu0840F = ControladorBanco0840::ctrPTUF($item, $valor);
                                    $ptu1340 = ControladorBanco1340::ctrPTU($item, $valor);
                                    $ptu1340F = ControladorBanco1340::ctrPTUF($item, $valor);

                                    foreach ($ptu6278 as $value) {
                                      foreach ($ptu6278F as $value2) {
                                        foreach ($ptu3450 as $value3) {
                                          foreach ($ptu1340F as $value4) {
                                            foreach ($ptu0198 as $value5) {
                                              foreach ($ptu0198F as $value6) {
                                                foreach ($ptuCaja as $value7) {
                                                  foreach ($ptuCajaF as $value8) {
                                                    foreach ($ptu1286 as $value9) {
                                                      foreach ($ptu1286F as $value10) {
                                                        foreach ($ptu1219 as $value11) {
                                                          foreach ($ptu1219F as $value12) {
                                                            foreach ($ptu0840 as $value13) {
                                                              foreach ($ptu0840F as $value14) {
                                                                foreach ($ptu1340 as $value15) {
                                                                  foreach ($ptu1340F as $value16) {

                                                                    $ptuN6278 = $value["egresos"];
                                                                    $ptuN6278F = $value2["egresos"];
                                                                    $ptuN3450 = $value3["egresos"];
                                                                    $ptuN3450F = $value4["egresos"];
                                                                    $ptuN0198 = $value5["egresos"];
                                                                    $ptuN0198F = $value6["egresos"];
                                                                    $ptuNCaja = $value7["egresos"];
                                                                    $ptuNCajaF = $value8["egresos"];
                                                                    $ptuN1286 = $value9["egresos"];
                                                                    $ptuN1286F = $value10["egresos"];
                                                                    $ptuN1219 = $value11["egresos"];
                                                                    $ptuN1219F = $value12["egresos"];
                                                                    $ptuN0840 = $value13["egresos"];
                                                                    $ptuN0840F = $value14["egresos"];
                                                                    $ptuN1340 = $value15["egresos"];
                                                                    $ptuN1340F = $value16["egresos"];

                                                                    $ptuTotal = $ptuN6278 + $ptuN3450 + $ptuN0198 + $ptuNCaja + $ptuN1286 + $ptuN1219 + $ptuN0840 + $ptuN1340;
                                                                    $ptuTotalF = $ptuN6278F + $ptuN3450F + $ptuN0198F + $ptuNCajaF + $ptuN1286F + $ptuN1219F + $ptuN0840F + $ptuN1340F;
                                                                    $importesPTU = $ptuTotal + $ptuTotalF;
                                                                    echo '<td>$'.number_format($ptuTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($ptuTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesPTU,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Pago Mga</td>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $mga6278 = ControladorBanco6278::ctrMGA($item, $valor);
                                    $mga6278F = ControladorBanco6278::ctrMGAF($item, $valor);
                                    $mga3450 = ControladorBanco3450::ctrMGA($item, $valor);
                                    $mga3450F = ControladorBanco3450::ctrMGAF($item, $valor);
                                    $mga0198 = ControladorBanco0198::ctrMGA($item, $valor);
                                    $mga0198F = ControladorBanco0198::ctrMGAF($item, $valor);
                                    $mgaCaja = ControladorCaja::ctrMGA($item, $valor);
                                    $mgaCajaF = ControladorCaja::ctrMGAF($item, $valor);
                                    $mga1286 = ControladorBanco1286::ctrMGA($item, $valor);
                                    $mga1286F = ControladorBanco1286::ctrMGAF($item, $valor);
                                    $mga1219 = ControladorBanco1219::ctrMGA($item, $valor);
                                    $mga1219F = ControladorBanco1219::ctrMGAF($item, $valor);
                                    $mga0840 = ControladorBanco0840::ctrMGA($item, $valor);
                                    $mga0840F = ControladorBanco0840::ctrMGAF($item, $valor);
                                    $mga1340 = ControladorBanco1340::ctrMGA($item, $valor);
                                    $mga1340F = ControladorBanco1340::ctrMGAF($item, $valor);

                                    foreach ($mga6278 as $value) {
                                      foreach ($mga6278F as $value2) {
                                        foreach ($mga3450 as $value3) {
                                          foreach ($mga1340F as $value4) {
                                            foreach ($mga0198 as $value5) {
                                              foreach ($mga0198F as $value6) {
                                                foreach ($mgaCaja as $value7) {
                                                  foreach ($mgaCajaF as $value8) {
                                                    foreach ($mga1286 as $value9) {
                                                      foreach ($mga1286F as $value10) {
                                                        foreach ($mga1219 as $value11) {
                                                          foreach ($mga1219F as $value12) {
                                                            foreach ($mga0840 as $value13) {
                                                              foreach ($mga0840F as $value14) {
                                                                foreach ($mga1340 as $value15) {
                                                                  foreach ($mga1340F as $value16) {

                                                                    $mgaN6278 = $value["egresos"];
                                                                    $mgaN6278F = $value2["egresos"];
                                                                    $mgaN3450 = $value3["egresos"];
                                                                    $mgaN3450F = $value4["egresos"];
                                                                    $mgaN0198 = $value5["egresos"];
                                                                    $mgaN0198F = $value6["egresos"];
                                                                    $mgaNCaja = $value7["egresos"];
                                                                    $mgaNCajaF = $value8["egresos"];
                                                                    $mgaN1286 = $value9["egresos"];
                                                                    $mgaN1286F = $value10["egresos"];
                                                                    $mgaN1219 = $value11["egresos"];
                                                                    $mgaN1219F = $value12["egresos"];
                                                                    $mgaN0840 = $value13["egresos"];
                                                                    $mgaN0840F = $value14["egresos"];
                                                                    $mgaN1340 = $value15["egresos"];
                                                                    $mgaN1340F = $value16["egresos"];

                                                                    $mgaTotal = $mgaN6278 + $mgaN3450 + $mgaN0198 + $mgaNCaja + $mgaN1286 + $mgaN1219 + $mgaN0840 + $mgaN1340;
                                                                    $mgaTotalF = $mgaN6278F + $mgaN3450F + $mgaN0198F + $mgaNCajaF + $mgaN1286F + $mgaN1219F + $mgaN0840F + $mgaN1340F;
                                                                    $importesMGA = $mgaTotal + $mgaTotalF;
                                                                    echo '<td>$'.number_format($mgaTotal,2).'</td>';
                                                                    echo '<td>$'.number_format($mgaTotalF,2).'</td>';
                                                                    echo '<td>$'.number_format($importesMGA,2).'</td>';
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }
                                                  
                                                }
                                                
                                              }
                                              
                                            }
                                            
                                          }
                                          
                                        }
        
                                      }
                                      
                                    }
                                                
                                    ?>
                           
                                </tr>
                                 <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                    <td style="border: none;">Subtotal Pagos Acreedores</td>
                                    <?php

                                          $sumaSubtotalPagoAcreedores = $acreedoresBancariosTotal + $prestamosBancariosTotal + $ivaAcreditableTotal + $adquisiciondeActivos1Total + $adquisiciondeActivos2Total +$adquisiciondeActivos3Total +$adquisiciondeActivos4Total +$gastosOperativosConRetenciones1Total +$gastosOperativosConRetenciones2Total +$gastosOperativosConRetenciones3Total +$gastosOperativosConRetenciones4Total +$gastosOperativosConRetenciones5Total +$gastosOperativosGravados1Total +$gastosOperativosGravados2Total +$gastosOperativosGravados3Total +$gastosOperativosGravados4Total +$gastosOperativosGravados5Total +$gastosOperativosGravados6Total +$gastosOperativosGravados7Total +$gastosOperativosGravados8Total +$gastosOperativosGravados9Total +$gastosOperativosGravados10Total +$gastosOperativosGravados11Total +$gastosOperativosGravados12Total +$gastosOperativosGravados13Total +$gastosOperativosGravados14Total +$gastosOperativosGravados15Total +$gastosOperativosGravados16Total +$gastosOperativosGravados17Total +$gastosOperativosGravados18Total +$gastosOperativosGravados19Total +$gastosOperativosGravados20Total +$gastosOperativosGravados21Total +$gastosOperativosGravados22Total +$gastosOperativosGravados23Total +$gastosOperativosGravados24Total +$gastosOperativosGravados25Total +$gastosOperativosGravados26Total +$gastosOperativosGravados27Total +$gastosOperativosGravados28Total +$gastosOperativosGravados29Total +$gastosOperativosGravados30Total +$gastosOperativosGravados31Total +$gastosOperativosGravados32Total +$gastosOperativosGravados33Total +$gastosOperativosGravados34Total +$gastosOperativosGravados35Total +$gastosOperativosExentos1Total +$gastosOperativosExentos2Total +$gastosOperativosExentos3Total +$gastosImpuestosLocales1Total +$gastosImpuestosLocales2Total +$gastosImpuestosLocales3Total +$gastosImpuestosLocales4Total +$gastosFinancieros1Total +$gastosFinancieros2Total +$gastosFinancieros3Total +$gastosOperativos1Total +$gastosOperativos2Total +$sueldosySalariosTotal +$impuestosFederalesSATTotal +$impuestosFederalesSUATotal +$aguinaldoTotal +$despensaTotal +$vacacionesTotal +$primaVacacionalTotal +$primaAntiguedadTotal +$septimoDiaTotal +$separacionTotal +$indemnizacionTotal +$subsidioEmpleoTotal +$ptuTotal;

                                          $sumaSubtotalPagoAcreedoresF = $acreedoresBancariosTotalF + $prestamosBancariosTotalF + $ivaAcreditableTotalF + $adquisiciondeActivos1TotalF + $adquisiciondeActivos2TotalF +$adquisiciondeActivos3TotalF +$adquisiciondeActivos4TotalF +$gastosOperativosConRetenciones1TotalF +$gastosOperativosConRetenciones2TotalF +$gastosOperativosConRetenciones3TotalF +$gastosOperativosConRetenciones4TotalF +$gastosOperativosConRetenciones5TotalF +$gastosOperativosGravados1TotalF +$gastosOperativosGravados2TotalF +$gastosOperativosGravados3TotalF +$gastosOperativosGravados4TotalF +$gastosOperativosGravados5TotalF +$gastosOperativosGravados6TotalF +$gastosOperativosGravados7TotalF +$gastosOperativosGravados8TotalF +$gastosOperativosGravados9TotalF +$gastosOperativosGravados10TotalF +$gastosOperativosGravados11TotalF +$gastosOperativosGravados12TotalF +$gastosOperativosGravados13TotalF +$gastosOperativosGravados14TotalF +$gastosOperativosGravados15TotalF +$gastosOperativosGravados16TotalF +$gastosOperativosGravados17TotalF +$gastosOperativosGravados18TotalF +$gastosOperativosGravados19TotalF +$gastosOperativosGravados20TotalF +$gastosOperativosGravados21TotalF +$gastosOperativosGravados22TotalF +$gastosOperativosGravados23TotalF +$gastosOperativosGravados24TotalF +$gastosOperativosGravados25TotalF +$gastosOperativosGravados26TotalF +$gastosOperativosGravados27TotalF +$gastosOperativosGravados28TotalF +$gastosOperativosGravados29TotalF +$gastosOperativosGravados30TotalF +$gastosOperativosGravados31TotalF +$gastosOperativosGravados32TotalF +$gastosOperativosGravados33TotalF +$gastosOperativosGravados34TotalF +$gastosOperativosGravados35TotalF +$gastosOperativosExentos1TotalF +$gastosOperativosExentos2TotalF +$gastosOperativosExentos3TotalF +$gastosImpuestosLocales1TotalF +$gastosImpuestosLocales2TotalF +$gastosImpuestosLocales3TotalF +$gastosImpuestosLocales4TotalF +$gastosFinancieros1TotalF +$gastosFinancieros2TotalF +$gastosFinancieros3TotalF +$gastosOperativos1TotalF +$gastosOperativos2TotalF +$sueldosySalariosTotalF +$impuestosFederalesSATTotalF +$impuestosFederalesSUATotalF +$aguinaldoTotalF +$despensaTotalF +$vacacionesTotalF +$primaVacacionalTotalF +$primaAntiguedadTotalF +$septimoDiaTotalF +$separacionTotalF +$indemnizacionTotalF +$subsidioEmpleoTotalF +$ptuTotalF;

                                          $subtotalPagoAcreedores = $sumaSubtotalPagoAcreedores + $mgaTotal;
                                          $subtotalPagoAcreedoresF = $sumaSubtotalPagoAcreedoresF + $mgaTotalF;
                                          $importessubtotalPagoAcreedores = $subtotalPagoAcreedores + $subtotalPagoAcreedoresF;
 
                                          echo '<td style="border: none;text-align:right;">$'.number_format($subtotalPagoAcreedores,2).'</td>';
                                          echo '<td style="border: none;text-align:right;">$'.number_format($subtotalPagoAcreedoresF,2).'</td>';
                                          echo '<td style="border: none;text-align:right;">$'.number_format($importessubtotalPagoAcreedores,2).'</td>';
                                    ?>
                                    
                                </tr>
                                 <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                    <td style="border: none;">Total Salidas de efectivo en el mes</td>
                                    <?php 

                                      $totalSalidasEfectivo = $pagoProveedoresTotal + $subtotalPagoAcreedores;
                                      $totalSalidasEfectivoF = $pagoProveedoresTotalF + $subtotalPagoAcreedoresF;
                                      $importesTotalSalidasEfectivo = $totalSalidasEfectivo + $totalSalidasEfectivoF;

                                      echo '<td style="border: none;text-align:right;">$'.number_format($totalSalidasEfectivo, 2).'</td>';
                                      echo '<td style="border: none;text-align:right;">$'.number_format($totalSalidasEfectivoF, 2).'</td>';
                                      echo '<td style="border: none;text-align:right;">$'.number_format($importesTotalSalidasEfectivo, 2).'</td>';
                                     ?>
                                    
                                </tr>
                                <tr style="background: #f39c12;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">Sobrante (o faltante) del mes</td>
                                    <?php

                                        $sobranteDelMes = $entradasMesEnero + $totalSalidasEfectivo;
                                        $sobranteDelMesF = $entradasMesFebrero + $totalSalidasEfectivoF;
                                        $importesSobranteDelMes = $importeEntradas + $importesTotalSalidasEfectivo;

                                        echo '<td style="border: none;text-align:right;">$'.number_format($sobranteDelMes,2).'</td>';
                                        echo '<td style="border: none;text-align:right;">$'.number_format($sobranteDelMesF,2).'</td>';
                                        echo '<td style="border: none;text-align:right;">$'.number_format($importesSobranteDelMes,2).'</td>';

                                     ?>
                                    
                                </tr>
                                <tr style="background: #f39c12;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">cuanto representa dicho sobrante (o faltante) con respecto al ingreso bruto del mes?</td>
                                    <?php

                                      $representacionFaltante = $entradasMesEnero / $sobranteDelMes;
                                      $representacionFaltanteF = $entradasMesFebrero / $sobranteDelMesF;
                                      $importesRepresentacionFaltante = $importeEntradas / $importesSobranteDelMes;

                                          echo '<td style="border: none;text-align:right;">'.number_format($representacionFaltante,2).'%</td>';
                                          echo '<td style="border: none;text-align:right;">'.number_format($representacionFaltanteF,2).'%</td>';
                                          echo '<td style="border: none;text-align:right;">'.number_format($importesRepresentacionFaltante,2).'%</td>';


                                    ?>
                                    
                                </tr>
                                <tr style="background: #f39c12;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">Dinero liquido disponible al final del mes(en las cuentas bancarias, o en cajas)</td>
                                    <?php
                                      $dineroLiquido = $ingresoBrutoMensualEnero + $totalSalidasEfectivo;
                                      $dineroLiquidoF = $ingresoBrutoMensualFebrero + $totalSalidasEfectivoF;
                                      $importesDineroLiquidoTotal = $importeIngresos + $importesTotalSalidasEfectivo;


                                         echo '<td style="border: none;text-align:right;">'.number_format($dineroLiquido,2).'</td>';
                                         echo '<td style="border: none;text-align:right;">'.number_format($dineroLiquidoF,2).'</td>';
                                         echo '<td style="border: none;text-align:right;">'.number_format($importesDineroLiquidoTotal,2).'</td>';

                                        

                                    ?>
                                   
                                </tr>
                                <tr style="background: #ee9d94;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">Comprobación</td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                </tr>
                                 

                        
                    </tbody>

                </table>

      </div>

    </div>

  
  </section>

</div>

<script type="text/javascript">
  $(document).ready(function() {
   $('#example').DataTable({

              "order": [[ 5, "desc" ]],
              "iDisplayLength": 100,
              "language": {

              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }

             }
           }

      );
} );
  
</script>


