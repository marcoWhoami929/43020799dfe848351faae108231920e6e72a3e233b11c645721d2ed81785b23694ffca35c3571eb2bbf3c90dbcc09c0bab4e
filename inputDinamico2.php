<div id="recuadros">
<?php
 
                      $url = $_SERVER['REQUEST_URI'];
                      
                      $longitud = strlen($url);

                      
                     
                      if ($longitud == 37) {

                      	$rest = substr($url, -6, 2);
                      	
                      	$fo = str_replace('=','',$rest);
                      	$folio = $fo;
                      	
                      }else if ($longitud == 38) {

                      	$rest = substr($url, -7, 3);
                      	
                      	$fo = str_replace('=','',$rest);
                      	$folio = $fo;
                      	
                      }else if ($longitud == 39) {

                                $rest = substr($url, -8, 4);
                              
                                $fo = str_replace('=','',$rest);
                                $folio = $fo;
                                
                      }
                      else if ($longitud == 40) {

                      	$rest = substr($url, -9, 4);
                      
                      	$fo = str_replace('=','',$rest);
                      	$folio = $fo;
                      	
                      	
                      }
                      
                      require_once("db_connect.php");
                      $query = "SELECT * FROM cotizaciones WHERE folio = '".$folio."'"; 
                      
                      $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 
                      while ($valor = mysqli_fetch_array($result)) {

                  	echo '<div class="lista-producto float-clear" id="unidad">
 <ul class="list-group">
   <li class="list-group-item" style="border: hidden;clear:left;"  >
			<div class="col-lg-1 col-sm-1"><input type="checkbox" name="item_index[]"  style="margin-left: 0px;" /></div>
			<div class="float-left" id="listaProd">
				<select class="listaProductos" 
					
					placeholder="Código"
					
					
					onchange="mostrarInputsProductos(this);" onclick="return validar(this.value);" onkeypress="return pulsar(event)">
					<option>'.$valor["codigoProducto"].'</option>
				</select>
				<br>
				<br>
				<br>
				<input name="codigo[]" id="codigo[]" type="hidden" value="'.$valor["codigoProducto"].'" required >
			</div>
			<div class="float-left" id="cuadroName">
				<input class="form-control" type="text" name="nombre[]" id="nombre[]" value="'.utf8_encode($valor["nombreProducto"]).'" onkeypress="return pulsar(event)" />
			</div>
			<div class="float-left" id="cuadroCantidad">
				<input class="form-control" type="number" name="cantidad[]" id="cantidad[]" step="0.001" value="'.number_format($valor["cantidad"],2,'.', '').'" onkeypress="return pulsar(event)" />
			</div>
			<div class="float-left" id="cuadroUnidad">
				<select class="listaUnidades" 
					
					placeholder="Código"
					
					
					onchange="mostrarInputsUnidades(this);"   onkeypress="return pulsar(event)" style="width: 80px" onblur="false">
					<option>'.$valor["unidad"].'</option>
					</select>
					<input name="unidadMedida[]" id="unidadMedida[]" type="hidden" required style="margin-left: 100px;margin-top:-200px" value="'.$valor["unidad"].'">
					<input name="valorMedida[]" id="valorMedida[]" type="hidden" required style="margin-top:-200px" value="'.$valor["valorMedida"].'">
					<input name="precioVar[]" id="precioVar[]" type="hidden" required style="margin-top:-100px;margin-left: 200px" value="'.number_format($valor["precio"],2,'.', '').'">
				
			</div>
			<div class="float-left" id="cuadroPrecio">
					<select class="listaPrecios" 
					
					placeholder="Código"
					
					
					onchange="mostrarInputsPrecios(this);"   onkeypress="return pulsar(event)" style="width: 90px;margin-left: 10px" onblur="false">
					<option>'.number_format($valor["precio"],2,'.', '').'</option>
					</select>
					<input name="precio[]" id="precio[]" type="hidden" required style="margin-top:30px;margin-left: 200px" value="'.number_format($valor["precio"],2,'.', '').'">
					<input name="precioVar2[]" id="precioVar2[]" type="hidden" required style="margin-top:-50px;margin-left: 200px" value="'.number_format($valor["precio"],2,'.', '').'">
			</div>
			<div class="float-left" id="cuadroNeto">
				<input class="form-control" type="text" name="neto[]" id="neto[]" value="'.number_format($valor["neto"],2,'.', '').'" onkeypress="return pulsar(event)"/>
			</div>
			<div class="float-left" id="cuadroPorcentajeDescuento">
				<input class="form-control" type="text" name="porcentajeDescuento[]" id="porcentajeDescuento[]" value="'.number_format($valor["porcentajeDescuento"],2,'.', '').'" onkeypress="return pulsar(event)"/>
				<input class="form-control" type="hidden" name="porcentajeDesc[]" id="porcentajeDesc[]" style="margin-left: 200px" value="'.number_format($valor["porcentajeDescuento"],2,'.', '').'" />
			</div>
			<div class="float-left" id="cuadroDescuento">
				<input class="form-control" type="text" name="descuento[]" id="descuento[]" value="'.number_format($valor["descuento"],2,'.', '').'" onkeypress="return pulsar(event)"/>
			</div>
			<div class="float-left" id="cuadroPorcentajeDescuento2">
				<input class="form-control" type="text" name="porcentajeDescuento2[]" id="porcentajeDescuento2[]" value="'.number_format($valor["porcentajeDescuento2"],2,'.', '').'"/>
				<input class="form-control" type="hidden" name="porcentajeDesc2[]" id="porcentajeDesc2[]" style="margin-left: 200px" value="'.number_format($valor["porcentajeDescuento"],2,'.', '').'" />
			</div>
			<div class="float-left" id="cuadroDescuento2">
				<input class="form-control" type="text" name="descuento2[]" id="descuento2[]" value="'.number_format($valor["descuento2"],2,'.', '').'" onkeypress="return pulsar(event)"/>
			</div>
			<div class="float-left" id="cuadroPorcentajeIva">
				<input class="form-control" type="text" name="porcentajeIva[]" id="porcentajeIva[]" value="'.number_format($valor["porcentajeIva"],2,'.', '').'" onkeypress="return pulsar(event)"/>
			</div>
			<div class="float-left" id="cuadroDescuentoIva">
				<input class="form-control" type="text" name="descuentoIva[]" id="descuentoIva[]" value="'.number_format($valor["iva"],2,'.', '').'" onkeypress="return pulsar(event)"/>
			</div>
			<div class="float-left" id="cuadroTotal">
				<input class="form-control" type="text" name="total[]" id="total[]" value="'.number_format($valor["total"],2,'.', '').'" onkeypress="return pulsar(event)"/>
			</div>
			<div class="float-left" id="cuadroReferencias">
					<input class="form-control" type="text" name="referencias[]" id="referencias[]" placeholder="Referencias" value="'.utf8_encode($valor["referenciasProd"]).'" onkeypress="return pulsar(event)"/>
			</div>
			<div class="float-left" id="cuadroObservaciones">
					<input class="form-control" type="text" name="observaciones[]" id="observaciones[]" placeholder="Observaciones" value="'.utf8_encode($valor["observacionesProd"]).'" onkeypress="return pulsar(event)"/>
			</div>
				</li>
 </ul>
</div>';

                            
                      }
?>
</div>