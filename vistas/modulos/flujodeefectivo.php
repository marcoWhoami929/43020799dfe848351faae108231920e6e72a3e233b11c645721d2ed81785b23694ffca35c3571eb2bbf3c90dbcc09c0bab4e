<?php

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

                                        $item = null;
                                        $valor = null;
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
                                                                                                  
                                                                                                  echo '<td>$ '.number_format($sumaSaldos,2).'</td>';
                                                                                                  echo '<td>$ '.number_format($sumaSaldosF,2).'</td>';
                                                                                                  echo '<td>$ '.number_format($sumaSaldos,2).'</td>';
                                                                                    
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                  
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
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial0198 = ControladorBanco0198::ctrMostrarSaldo($item,$valor);
                                    $saldoInicial0198F = ControladorBanco0198::ctrMostrarSaldoF($item,$valor);


                                                foreach ($saldoInicial0198 as $value) {
                                                  foreach ($saldoInicial0198F as $value2) {
                                                        
                                                          $banco0198 = $value["saldo"]-$value["abono"];
                                                          $banco0198F = $value2["saldo"]-$value2["abono"];
                                                          $importes = $banco0198 + $banco0198F;
                                                          echo '<td>$'.number_format($banco0198,2).'</td>';
                                                          echo '<td>$'.number_format($banco0198F,2).'</td>';
                                                          echo '<td>$'.number_format($importes,2).'</td>';

                                                  }                                                  
                     
                                                }

                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco6278</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial6278 = ControladorBanco6278::ctrMostrarSaldo($item,$valor);
                                    $saldoInicial6278F = ControladorBanco6278::ctrMostrarSaldoF($item, $valor);
            
                                                foreach ($saldoInicial6278 as $value) {
                                                  foreach ($saldoInicial6278F as $value2) {

                                                    $banco6278 = $value["saldo"]-$value["abono"];
                                                    $banco6278F = $value2["saldo"]-$value2["abono"];
                                                    $importes = $banco6278 + $banco6278F;
                                                    echo '<td>$'.number_format($banco6278,2).'</td>';
                                                    echo '<td>$'.number_format($banco6278F,2).'</td>';
                                                    echo '<td>$'.number_format($importes,2).'</td>';
                                                    
                                                  }

                                                }
         
                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco3450</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial3450 = ControladorBanco3450::ctrMostrarSaldo($item,$valor);
                                    $saldoInicial3450F = ControladorBanco3450::ctrMostrarSaldoF($item,$valor);

                                                foreach ($saldoInicial3450 as $value) {

                                                    foreach ($saldoInicial3450F as $value2) {

                                                        $banco3450 = $value["saldo"]+$value["cargo"];
                                                        $banco3450F = $value2["saldo"]+$value2["cargo"];
                                                        $importes = $banco3450 + $banco3450F;
                                                        echo '<td>$'.number_format($banco3450,2).'</td>';
                                                        echo '<td>$'.number_format($banco3450F,2).'</td>';
                                                        echo '<td>$'.number_format($importes,2).'</td>';
                                                      
                                                    }
               
                                                }

                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Caja</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicialCaja = ControladorCaja::ctrMostrarSaldo($item,$valor);
                                    $saldoInicialCajaF =  ControladorCaja::ctrMostrarSaldoF($item, $valor);

                                                foreach ($saldoInicialCaja as $value) {

                                                  foreach ($saldoInicialCajaF as $value2) {

                                                      $cajaF = $value2["saldo"]+$value2["cargo"];
                                                      $importes = $value["saldo"]+$cajaF;
                                                      echo '<td>$'.number_format($value["saldo"],2).'</td>';
                                                      echo '<td>$'.number_format($cajaF,2).'</td>';
                                                      echo '<td>$'.number_format($importes,2).'</td>';
                                                    
                                                  }

                                                }

                                    ?>
                                   
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco1286</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1286 = ControladorBanco1286::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1286 as $value) {

                                                  $banco1286 = $value["saldo"]-$value["abono"];
                                                  echo '<td>$'.number_format('0',2).'</td>';
                                                  echo '<td>$'.number_format($banco1286,2).'</td>';
                                                  echo '<td>$'.number_format($banco1286,2).'</td>';
                 
                                                }

                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco1219</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1219 = ControladorBanco1219::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1219 as $value) {

                                                  $banco1219 = $value["saldo"]+$value["cargo"];
                                                  echo '<td>$'.number_format('0',2).'</td>';
                                                  echo '<td>$'.number_format($banco1219,2).'</td>';
                                                  echo '<td>$'.number_format($banco1219,2).'</td>';
                    
                                                }

                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco0840</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial0840 = ControladorBanco0840::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial0840 as $value) {

                                                  $banco0840 = $value["saldo"]+$value["cargo"];
                                                  echo '<td>$'.number_format('0',2).'</td>';
                                                  echo '<td>$ '.number_format($banco0840,2).'</td>';
                                                  echo '<td>$ '.number_format($banco0840,2).'</td>';
                   
                                                }

                                    ?>
                                   
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Banco1340</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1340 as $value) {

                                                  $banco1340 = $value["saldo"]-$value["abono"];
                                                  echo '<td>$'.number_format('0',2).'</td>';
                                                  echo '<td>$'.number_format($banco1340,2).'</td>';
                                                  echo '<td>$'.number_format($banco1340,2).'</td>';
                  
                                                }

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

                                                                            $ingresosIndustrial = $value["ingresos"];
                                                                            $ingresosIndustrialF = $value5["ingresos"];
                                                                            $ingresosIndustrialCaja = $value13["ingresos"];
                                                                            $ingresosIndustrialCajaF = $value14["ingresos"];
                                                                            $ingresosMayoreo = $value2["ingresos"];
                                                                            $ingresosMayoreoF = $value6["ingresos"];
                                                                            $ingresosMayoreo3450 = $value7["ingresos"];
                                                                            $ingresosMayoreo3450F = $value8["ingresos"];
                                                                            $ingresosMayoreoCaja = $value15["ingresos"];
                                                                            $ingresosMayoreoCajaF = $value16["ingresos"];
                                                                            $ingresosNoIdentificados = $value3["ingresos"];
                                                                            $ingresosNoIdentificadosF = $value9["ingresos"];
                                                                            $ingresosNoIdentificados3450 = $value10["ingresos"];
                                                                            $ingresosNoIdentificados3450F = $value11["ingresos"];
                                                                            $reembolsosClientes = $value4["reembolsos"];
                                                                            $reembolsosClientesF = $value12["reembolsos"];
                                                                            $ingresosMayoreoParcialesF = $value17["ingresos"];

                                                                            $ingresosCedis = $ingresosIndustrial+$ingresosIndustrialCaja+$ingresosMayoreo+$ingresosMayoreo3450+$ingresosMayoreoCaja+$ingresosNoIdentificados+$ingresosNoIdentificados3450;
                                                                            $ingresosCedisF = $ingresosIndustrialF+$ingresosIndustrialCaja+$ingresosMayoreoF+$ingresosMayoreo3450F+$ingresosMayoreoCajaF+$ingresosNoIdentificadosF+$ingresosNoIdentificados3450F + $ingresosMayoreoParcialesF;
                                                                              $total = $ingresosCedis;
                                                                              $totalF = $ingresosCedisF;
                                                                              $importes = $total + $totalF;
                                                                              echo '<td style="border: none;">Ingreso Cedis</td>';
                                                                              echo '<td style="border: none;">$'.number_format($total,2).'</td>';
                                                                              echo '<td style="border: none;">$'.number_format($totalF,2).'</td>';
                                                                              echo '<td style="border: none;">$'.number_format($importes,2).'</td>';
                                                                            
                                                                          }

                                                                        }
                                                                        
                                                                      }
                                                                      
                                                                    }
                                                                    
                                                                  }

                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
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
                                    $item = null;
                                    $valor = null;
                                    $ingresosIndustrial = ControladorBanco6278::ctrIngresosIndustrial($item,$valor);
                                    $ingresosIndustrialF = ControladorBanco6278::ctrIngresosIndustrialF($item, $valor);
                                    $ingresosIndustrialCaja = ControladorCaja::ctrIngresosIndustrial($item, $valor);
                                    $ingresosIndustrialCajaF = ControladorCaja::ctrIngresosIndustrialF($item, $valor);
                                    
                                                foreach ($ingresosIndustrial as $value) {
                                                  foreach ($ingresosIndustrialF as $value2) {
                                                    foreach ($ingresosIndustrialCaja as $value3) {
                                                      foreach ($ingresosIndustrialCajaF as $value4) {

                                                            $ingresosIndustrial = $value["ingresos"] + $value3["ingresos"];
                                                            $ingresosIndustrialF = $value2["ingresos"] + $value4["ingresos"];
                                                            $importes = $ingresosIndustrial + $ingresosIndustrialF;
                                                            echo '<td>$'.number_format($ingresosIndustrial,2).'</td>';
                                                            echo '<td>$'.number_format($ingresosIndustrialF,2).'</td>';
                                                            echo '<td>$'.number_format($importes,2).'</td>';
                                                        
                                                      }
                                                      
                                                    }
                                                    
                                                  }

                                                }

                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Mayoreo</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $ingresosMayoreo = ControladorBanco6278::ctrIngresosMayoreo($item,$valor);
                                    $ingresosMayoreoF = ControladorBanco6278::ctrIngresosMayoreoF($item, $valor);
                                    $ingresosMayoreo3450 = ControladorBanco3450::ctrIngresosMayoreo($item, $valor);
                                    $ingresosMayoreo3450F = ControladorBanco3450::ctrIngresosMayoreoF($item, $valor);
                                    $ingresosMayoreoCaja = ControladorCaja::ctrIngresosMayoreo($item, $valor);
                                    $ingresosMayoreoCajaF = ControladorCaja::ctrIngresosMayoreoF($item, $valor);
                                    $ingresosMayoreoParcialesF = ControladorBanco6278::ctrIngresosMayoreoParcialesF($item, $valor);


                                                foreach ($ingresosMayoreo as $value) {
                                                  foreach ($ingresosMayoreoF as $value2) {
                                                    foreach ($ingresosMayoreo3450 as $value3) {
                                                      foreach ($ingresosMayoreo3450F as $value4) {
                                                        foreach ($ingresosMayoreoCaja as $value5) {
                                                          foreach ($ingresosMayoreoCajaF as $value6) {
                                                            foreach ($ingresosMayoreoParcialesF as $value7) {


                                                            $totalMayoreo = $value["ingresos"] + $value3["ingresos"] + $value5["ingresos"];
                                                            $totalMayoreoF = $value2["ingresos"] + $value4["ingresos"] + $value6["ingresos"]+ $value7["ingresos"];
                                                            $importes = $totalMayoreo + $totalMayoreoF;
                                                            echo '<td>$'.number_format($totalMayoreo,2).'</td>';
                                                            echo '<td>$'.number_format($totalMayoreoF,2).'</td>';
                                                            echo '<td>$'.number_format($importes,2).'</td>';
                                                              
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
                                    <td>Ingreso no Identificado</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $ingresosNoIdentificados = ControladorBanco6278::ctrIngresosNoIdentificados($item,$valor);
                                    $ingresosNoIdentificadosF = ControladorBanco6278::ctrIngresosNoIdentificadosF($item, $valor);
                                    $ingresosNoIdentificados3450 = ControladorBanco3450::ctrIngresosNoIdentificados($item, $valor);
                                    $ingresosNoIdentificados3450F = ControladorBanco3450::ctrIngresosNoIdentificadosF($item, $valor);

                                                foreach ($ingresosNoIdentificados as $value) {
                                                  foreach ($ingresosNoIdentificadosF as $value2) {
                                                    foreach ($ingresosNoIdentificados3450 as $value3) {
                                                      foreach ($ingresosNoIdentificados3450F as $value4) {
                                                            
                                                            $totalNoIdentificados = $value["ingresos"] + $value3["ingresos"];
                                                            $totalNoIdentificadosF = $value2["ingresos"] + $value4["ingresos"];
                                                            $importes = $totalNoIdentificados + $totalNoIdentificadosF;
                                                            echo '<td>$'.number_format($totalNoIdentificados,2).'</td>';
                                                            echo '<td>$'.number_format($totalNoIdentificadosF,2).'</td>';
                                                            echo '<td>$'.number_format($importes,2).'</td>';
                                                      }
                                                      
                                                    }
                                                    
                                                  }

                                                }

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
                                    $ingresosNoIdentificados = ControladorBanco6278::ctrIngresosNoIdentificados($item,$valor);
                                    $ingresosNoIdentificadosF = ControladorBanco6278::ctrIngresosNoIdentificadosF($item, $valor);
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
                                                                                        foreach ($ingresosNoIdentificados as $value27) {
                                                                                          foreach ($ingresosNoIdentificadosF as $value28) {
                                                                                            foreach ($reembolsosClientesTiendas as $value29) {
                                                                                              foreach ($reembolsosClientesTiendasF as $value30) {
                                                                                                
                                                                                                   $ingresosTiendas = $value["ingresos"] + $value3["ingresos"] +$value5["ingresos"]+ $value7["ingresos"] + $value9["ingresos"] + $value11["ingresos"] + $value13["ingresos"] + $value15["ingresos"] + $value17["ingresos"] + $value19["ingresos"] + $value21["ingresos"] + $value23["ingresos"] + $value25["ingresos"] + $value27["ingresos"];
                                                                                                   $ingresosTiendasF = $value2["ingresos"] + $value4["ingresos"]+ $value6["ingresos"] + $value8["ingresos"] + $value10["ingresos"] + $value12["ingresos"] + $value14["ingresos"] + $value16["ingresos"] + $value18["ingresos"] + $value20["ingresos"] + $value22["ingresos"] + $value24["ingresos"] + $value26["ingresos"] + $value28["ingresos"];

                                                                                                   $totalIngresosTiendas = $ingresosTiendas - $value29["reembolsos"];
                                                                                                   $totalIngresosTiendasF = $ingresosTiendasF - $value30["reembolsos"];
                                                                                                   $importes = $totalIngresosTiendas + $totalIngresosTiendasF;
                                                                                                  echo '<td style="border: none;">$'.number_format($totalIngresosTiendas,2).'</td>';
                                                                                                  echo '<td style="border: none;">$'.number_format($totalIngresosTiendasF,2).'</td>';
                                                                                                  echo '<td style="border: none;">$'.number_format($importes,2).'</td>';
                                                                                              }
                                                                                              
                                                                                            }
     
                                                                                          }
                                                                                          
                                                                                        }
                                                                                        
                                                                                      }
                                                                                      
                                                                                    }
                                                                                    
                                                                                  }
                                                                                  
                                                                                }
                                                                                
                                                                              }
                                                                              
                                                                            }
                                                                            
                                                                          }
                                                                          
                                                                        }
                                                                        
                                                                      }
                                                                      
                                                                    }
                                                                    
                                                                  }
                                                                  
                                                                }
                                                                
                                                              }
                                                              
                                                            }
                                                            
                                                          }
                                                          
                                                        }
                                                        
                                                      }
                                                      
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
                                    $item = null;
                                    $valor = null;
                                    $ingresosSanManuel = ControladorBanco6278::ctrIngresosSanManuel($item, $valor);
                                    $ingresosSanManuelF = ControladorBanco6278::ctrIngresosSanManuelF($item, $valor);
                                    $ingresosSanManuel0198 = ControladorBanco0198::ctrIngresosSanManuel($item, $valor);
                                    $ingresosSanManuel0198F = ControladorBanco0198::ctrIngresosSanManuelF($item, $valor);

                                    foreach ($ingresosSanManuel as $value) {
                                      foreach ($ingresosSanManuelF as $value2) {
                                        foreach ($ingresosSanManuel0198 as $value3) {
                                          foreach ($ingresosSanManuel0198F as $value4) {

                                                  $ingresosSanManuel = $value["ingresos"] + $value3["ingresos"];
                                                  $ingresosSanManuelF = $value2["ingresos"] + $value4["ingresos"];
                                                  $importes = $ingresosSanManuel + $ingresosSanManuelF;
                                                  echo '<td>$'.number_format($ingresosSanManuel,2).'</td>';
                                                  echo '<td>$'.number_format($ingresosSanManuelF,2).'</td>';
                                                  echo '<td>$'.number_format($importes,2).'</td>';
                                            
                                          }
                                          
                                        }

                                      }
                                      
                                    }

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Mayorazgo</td>
                                   <?php
                                    $item = null;
                                    $valor = null;
                                    $ingresosMayorazgo = ControladorBanco6278::ctrIngresosMayorazgo($item, $valor);
                                    $ingresosMayorazgoF = ControladorBanco6278::ctrIngresosMayorazgoF($item, $valor);
                                    $ingresosMayorazgo0198 = ControladorBanco0198::ctrIngresosMayorazgo($item, $valor);
                                    $ingresosMayorazgo0198F = ControladorBanco0198::ctrIngresosMayorazgoF($item, $valor);

                                    foreach ($ingresosMayorazgo as $value) {
                                      foreach ($ingresosMayorazgoF as $value2) {
                                        foreach ($ingresosMayorazgo0198 as $value3) {
                                          foreach ($ingresosMayorazgo0198F as $value4) {

                                                  $ingresosMayorazgo = $value["ingresos"] + $value3["ingresos"];
                                                  $ingresosMayorazgoF = $value2["ingresos"] + $value4["ingresos"];
                                                  $importes = $ingresosMayorazgo + $ingresosMayorazgoF;
                                                  echo '<td>$'.number_format($ingresosMayorazgo,2).'</td>';
                                                  echo '<td>$'.number_format($ingresosMayorazgoF,2).'</td>';
                                                  echo '<td>$'.number_format($importes,2).'</td>';
                                            
                                          }
                                          
                                        }

                                      }
                                      
                                    }

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Reforma</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $ingresosReforma = ControladorBanco6278::ctrIngresosReforma($item, $valor);
                                    $ingresosReformaF = ControladorBanco6278::ctrIngresosReformaF($item, $valor);
                                    $ingresosReforma0198 = ControladorBanco0198::ctrIngresosReforma($item, $valor);
                                    $ingresosReforma0198F = ControladorBanco0198::ctrIngresosReformaF($item, $valor);

                                    foreach ($ingresosReforma as $value) {
                                      foreach ($ingresosReformaF as $value2) {
                                        foreach ($ingresosReforma0198 as $value3) {
                                          foreach ($ingresosReforma0198F as $value4) {

                                                  $ingresosReforma = $value["ingresos"] + $value3["ingresos"];
                                                  $ingresosReformaF = $value2["ingresos"] + $value4["ingresos"];
                                                  $importes = $ingresosReforma + $ingresosReformaF;
                                                  echo '<td>$'.number_format($ingresosReforma,2).'</td>';
                                                  echo '<td>$'.number_format($ingresosReformaF,2).'</td>';
                                                  echo '<td>$'.number_format($importes,2).'</td>';
                                            
                                          }
                                          
                                        }

                                      }
                                      
                                    }

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Xonaca</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $ingresosXonaca = ControladorBanco6278::ctrIngresosXonaca($item, $valor);
                                    $ingresosXonacaF = ControladorBanco6278::ctrIngresosXonacaF($item, $valor);
                                    $ingresosXonaca0198 = ControladorBanco0198::ctrIngresosXonaca($item, $valor);
                                    $ingresosXonaca0198F = ControladorBanco0198::ctrIngresosXonacaF($item, $valor);

                                    foreach ($ingresosXonaca as $value) {
                                      foreach ($ingresosXonacaF as $value2) {
                                        foreach ($ingresosXonaca0198 as $value3) {
                                          foreach ($ingresosXonaca0198F as $value4) {

                                                  $ingresosXonaca = $value["ingresos"] + $value3["ingresos"];
                                                  $ingresosXonacaF = $value2["ingresos"] + $value4["ingresos"];
                                                  $importes = $ingresosXonaca + $ingresosXonacaF;
                                                  echo '<td>$'.number_format($ingresosXonaca,2).'</td>';
                                                  echo '<td>$'.number_format($ingresosXonacaF,2).'</td>';
                                                  echo '<td>$'.number_format($importes,2).'</td>';
                                            
                                          }
                                          
                                        }

                                      }
                                      
                                    }

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Vergel</td>
                                     <?php
                                      $item = null;
                                      $valor = null;
                                      $ingresosVergel0198 = ControladorBanco0198::ctrIngresosVergel($item, $valor);
                                      $ingresosVergel0198F = ControladorBanco0198::ctrIngresosVergelF($item, $valor);

                                      
                                          foreach ($ingresosVergel0198 as $value) {
                                            foreach ($ingresosVergel0198F as $value2) {

                                                    $ingresosVergel = $value["ingresos"];
                                                    $ingresosVergelF = $value2["ingresos"];
                                                    $importes = $ingresosVergel + $ingresosVergelF;
                                                    echo '<td>$'.number_format($ingresosVergel,2).'</td>';
                                                    echo '<td>$'.number_format($ingresosVergelF,2).'</td>';
                                                    echo '<td>$'.number_format($importes,2).'</td>';
                                              
                                            }
                                            
                                          }


                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Santiago</td>
                                     <?php
                                      $item = null;
                                      $valor = null;
                                      $ingresosSantiago6278 = ControladorBanco6278::ctrIngresosSantiago($item, $valor);
                                      $ingresosSantiago6278F = ControladorBanco6278::ctrIngresosSantiagoF($item, $valor);

                                      
                                          foreach ($ingresosSantiago6278 as $value) {
                                            foreach ($ingresosSantiago6278F as $value2) {

                                                    $ingresosSantiago = $value["ingresos"];
                                                    $ingresosSantiagoF = $value2["ingresos"];
                                                    $importes = $ingresosSantiago + $ingresosSantiagoF;
                                                    echo '<td>$'.number_format($ingresosSantiago,2).'</td>';
                                                    echo '<td>$'.number_format($ingresosSantiagoF,2).'</td>';
                                                    echo '<td>$'.number_format($importes,2).'</td>';
                                              
                                            }
                                            
                                          }


                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Capu</td>
                                    <?php
                                      $item = null;
                                      $valor = null;
                                      $ingresosCapu0198 = ControladorBanco0198::ctrIngresosCapu($item, $valor);
                                      $ingresosCapu0198F = ControladorBanco0198::ctrIngresosCapuF($item, $valor);

                                      
                                          foreach ($ingresosCapu0198 as $value) {
                                            foreach ($ingresosCapu0198F as $value2) {

                                                    $ingresosCapu = $value["ingresos"];
                                                    $ingresosCapuF = $value2["ingresos"];
                                                    $importes = $ingresosCapu + $ingresosCapuF;
                                                    echo '<td>$'.number_format($ingresosCapu,2).'</td>';
                                                    echo '<td>$'.number_format($ingresosCapuF,2).'</td>';
                                                    echo '<td>$'.number_format($importes,2).'</td>';
                                              
                                            }
                                            
                                          }


                                    ?>
                           
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso Las Torres</td>
                                     <?php
                                      $item = null;
                                      $valor = null;
                                      $ingresosLasTorres0198 = ControladorBanco0198::ctrIngresosLasTorres($item, $valor);
                                      $ingresosLasTorres0198F = ControladorBanco0198::ctrIngresosLasTorresF($item, $valor);

                                      
                                          foreach ($ingresosLasTorres0198 as $value) {
                                            foreach ($ingresosLasTorres0198F as $value2) {

                                                    $ingresosLasTorres = $value["ingresos"];
                                                    $ingresosLasTorresF = $value2["ingresos"];
                                                    $importes = $ingresosLasTorres + $ingresosLasTorresF;
                                                    echo '<td>$'.number_format($ingresosLasTorres,2).'</td>';
                                                    echo '<td>$'.number_format($ingresosLasTorresF,2).'</td>';
                                                    echo '<td>$'.number_format($importes,2).'</td>';
                                              
                                            }
                                            
                                          }


                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Ingreso no Identificado</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $ingresosNoIdentificados = ControladorBanco6278::ctrIngresosNoIdentificados($item,$valor);
                                    $ingresosNoIdentificadosF = ControladorBanco6278::ctrIngresosNoIdentificadosF($item, $valor);
                                    $ingresosNoIdentificados0198 = ControladorBanco0198::ctrIngresosNoIdentificados($item, $valor);
                                    $ingresosNoIdentificados0198F = ControladorBanco0198::ctrIngresosNoIdentificadosF($item, $valor);

                                                foreach ($ingresosNoIdentificados as $value) {
                                                  foreach ($ingresosNoIdentificadosF as $value2) {
                                                    foreach ($ingresosNoIdentificados0198 as $value3) {
                                                      foreach ($ingresosNoIdentificados0198F as $value4) {
                                                            
                                                            $totalNoIdentificados = $value["ingresos"] + $value3["ingresos"];
                                                            $totalNoIdentificadosF = $value2["ingresos"] + $value4["ingresos"];
                                                            $importes = $totalNoIdentificados + $totalNoIdentificadosF;
                                                            echo '<td>$'.number_format($totalNoIdentificados,2).'</td>';
                                                            echo '<td>$'.number_format($totalNoIdentificadosF,2).'</td>';
                                                            echo '<td>$'.number_format($importes,2).'</td>';
                                                      }
                                                      
                                                    }
                                                    
                                                  }

                                                }

                                    ?>
                           
                                </tr>
                                <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                    <td style="border: none;">Subtotal Entradas del mes</td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Otros Ingresos</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1340 as $value5) {

                                                  echo '<td>'.number_format('0',2).'</td>';
                                                  echo '<td></td>';
                                                  echo '<td></td>';
                  
                                                }

                                    ?>
                           
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Prestamos Bancarios</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1340 as $value5) {

                                                  echo '<td>'.number_format('0',2).'</td>';
                                                  echo '<td></td>';
                                                  echo '<td></td>';
                  
                                                }

                                    ?>
                           
                                </tr>
                                
                                 <tr style="background: #f39c12;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">Total Ingreso Bruto Mensual</td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr style="background: #f39c12;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">Salidas de Efectivo</td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                    <td style="border: none;">Pagos a Proveedores</td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                    <td style="border: none;">Subtotal Pagos Acreedores</td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Pago de nómina</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1340 as $value5) {

                                                  echo '<td>'.number_format('0',2).'</td>';
                                                  echo '<td></td>';
                                                  echo '<td></td>';
                  
                                                }

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Pago de aportaciones IMSS-INFONAVIT</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1340 as $value5) {

                                                  echo '<td>'.number_format('0',2).'</td>';
                                                  echo '<td></td>';
                                                  echo '<td></td>';
                  
                                                }

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Pagos de arrendamientos de locales, maquinarias o vehículos</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1340 as $value5) {

                                                  echo '<td>'.number_format('0',2).'</td>';
                                                  echo '<td></td>';
                                                  echo '<td></td>';
                  
                                                }

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Pagos de obligaciones financieras con bancos, particulares o socios</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1340 as $value5) {

                                                  echo '<td>'.number_format('0',2).'</td>';
                                                  echo '<td></td>';
                                                  echo '<td></td>';
                  
                                                }

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Pagos de impuestos</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1340 as $value5) {

                                                  echo '<td>'.number_format('0',2).'</td>';
                                                  echo '<td></td>';
                                                  echo '<td></td>';
                  
                                                }

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Pagos de comerciales, administrativos y operativos</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1340 as $value5) {

                                                  echo '<td>'.number_format('0',2).'</td>';
                                                  echo '<td></td>';
                                                  echo '<td></td>';
                  
                                                }

                                    ?>
                           
                                </tr>
                                 <tr style="background: #e2e2e2;color: #000000;font-weight: bold;">
                                    <td>Pago mga</td>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $saldoInicial1340 = ControladorBanco1340::ctrMostrarSaldo($item,$valor);

                                                foreach ($saldoInicial1340 as $value5) {

                                                  echo '<td>'.number_format('0',2).'</td>';
                                                  echo '<td></td>';
                                                  echo '<td></td>';
                  
                                                }

                                    ?>
                           
                                </tr>
                                
                                 <tr style="background: #ffffbf;color: #c78e14;font-weight: bold;">
                                    <td style="border: none;">Total Salidas de efectivo en el solo mes</td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr style="background: #f39c12;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">Sobrante (o faltante) del solo mes</td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr style="background: #f39c12;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">cuanto representa dicho sobrante (o faltante) con respecto al ingrso bruto del mes?</td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                </tr>
                                <tr style="background: #f39c12;color: #ffffff;font-weight: bold;">
                                    <td style="border: none;">Dinero liquido disponible al final del mes(en las cuentas bancarias, o en cajas)</td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
                                    <td style="border: none;"></td>
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


