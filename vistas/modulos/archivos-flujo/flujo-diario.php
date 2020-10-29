                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $saldoInicial0198 = ControladorBanco0198Diario::ctrMostrarSaldo($item,$valor);
                                        $saldoInicial6278 = ControladorBanco6278Diario::ctrMostrarSaldo($item,$valor);
                                        $saldoInicial3450 = ControladorBanco3450Diario::ctrMostrarSaldo($item,$valor);
                                        $saldoInicialCaja = ControladorCajaDiario::ctrMostrarSaldo($item,$valor);

                                        /*======FEBRERO=========*/
                                        $saldoInicial0198F = ControladorBanco0198Diario::ctrMostrarSaldoF($item, $valor);
                                        $saldoInicial6278F = ControladorBanco6278Diario::ctrMostrarSaldoF($item, $valor);
                                        $saldoInicial3450F = ControladorBanco3450Diario::ctrMostrarSaldoF($item, $valor);
                                        $saldoInicialCajaF = ControladorCajaDiario::ctrMostrarSaldoF($item, $valor);
                                        $saldoInicial1286 = ControladorBanco1286Diario::ctrMostrarSaldo($item, $valor);
                                        $saldoInicial1219 = ControladorBanco1219Diario::ctrMostrarSaldo($item, $valor);
                                        $saldoInicial0840 = ControladorBanco0840Diario::ctrMostrarSaldo($item, $valor);
                                        $saldoInicial1340 = ControladorBanco1340Diario::ctrMostrarSaldo($item, $valor);

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
                                                                                                
                                                                                    
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                  
                                                                                }
                                                                              
                                                                            }
                                                                          
                                                                         }

                                                            
                                                                     }

                                                                   }

                                                                }
                                                            }
                                                          
                                                        }
                                                      
                                                    }
                                                  /*SALDOS INICIALES BANCOS*/
                                                  $importes0198 = $banco0198 + $banco0198F;
                                                  $importes6278 = $banco6278 + $banco6278F;
                                                  $importes3450 = $banco3450 + $banco3450F;
                                                  $importesCaja = $caja+$cajaF;

                                        
                                        ?>                                  

                                  
                                 

                                 
                                                  
                                                      
                                  
                                   
                               
                                   
                                