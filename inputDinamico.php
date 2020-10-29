<div id="recuadros">
	<div class="lista-producto float-clear" id="unidad">
	 <ul class="list-group">
	   <li class="list-group-item" style="border: none;clear:left;"  >
				<div class="col-lg-1 col-sm-1"><input type="checkbox" name="item_index[]"  style="margin-left: 0px;" /></div>
				<div class="float-left"  id="listaProd">
				<select class="listaProductos" 
					
					placeholder="Código"
					
					
					onchange="mostrarInputsProductos(this);" onclick="return validar(this.value);" onkeypress="return pulsar(event)">
					<option></option>
				</select>
				<br>
				<br>
				<br>

				<input name="codigo[]" id="codigo[]" type="hidden" required>
			</div>
				<div class="float-left" id="cuadroName">
					<input class="form-control" type="text" name="nombre[]" id="nombre[]" onkeypress="return pulsar(event)" />
				</div>
				<div class="float-left" id="cuadroCantidad">
					<input class="form-control" type="number" name="cantidad[]" id="cantidad[]" step="0.001" onkeypress="return pulsar(event)" />
				</div>
				<div class="float-left" id="cuadroUnidad">
					<select class="listaUnidades" 
					
					placeholder="Código"
					
					
					onchange="mostrarInputsUnidades(this);"   onkeypress="return pulsar(event)" style="width: 80px">
					<option></option>
					</select>
					<input name="unidadMedida[]" id="unidadMedida[]" type="hidden" required style="margin-left: 100px;margin-top: -100px">
					<input name="valorMedida[]" id="valorMedida[]" type="hidden" required style="margin-top:-100px">
					<input name="precioVar[]" id="precioVar[]" type="hidden" required style="margin-top:-50px;margin-left: 200px">
					
				</div>
				<div class="float-left" id="cuadroPrecio">
					<!--<input class="form-control" type="text" name="precio[]" id="precio[]" onkeypress="return pulsar(event)"/>-->
					<select class="listaPrecios" 
					
					placeholder="Código"
					
					
					onchange="mostrarInputsPrecios(this);"   onkeypress="return pulsar(event)" style="width: 90px;margin-left: 10px">
					<option></option>
					</select>
					<input name="precio[]" id="precio[]" type="hidden" required style="margin-top:30px;margin-left: 200px">
					<input name="precioVar2[]" id="precioVar2[]" type="hidden" required style="margin-top:-50px;margin-left: 200px">
				</div>
				<div class="float-left" id="cuadroNeto">
					<input class="form-control" type="text" name="neto[]" id="neto[]"  onkeypress="return pulsar(event)" />
				</div>
				<div class="float-left" id="cuadroPorcentajeDescuento">
					<input class="form-control" type="text" name="porcentajeDescuento[]" id="porcentajeDescuento[]"  onkeypress="return pulsar(event)"/>
						<input class="form-control" type="hidden" name="porcentajeDesc[]" id="porcentajeDesc[]" style="margin-left: 200px" />
				</div>
				<div class="float-left" id="cuadroDescuento">
					<input class="form-control" type="text" name="descuento[]" id="descuento[]" onkeypress="return pulsar(event)" />
				</div>
				<div class="float-left" id="cuadroPorcentajeDescuento2">
					<input class="form-control" type="text" name="porcentajeDescuento2[]" id="porcentajeDescuento2[]" style="width:80px;" onkeypress="return pulsar(event)"/>
					<input class="form-control" type="hidden" name="porcentajeDesc2[]" id="porcentajeDesc2[]" style="margin-left: 200px" />
				</div>
				<div class="float-left" id="cuadroDescuento2">
					<input class="form-control" type="text" name="descuento2[]" id="descuento2[]"  onkeypress="return pulsar(event)" />
				</div>
				<div class="float-left" id="cuadroPorcentajeIva">
					<input class="form-control" type="text" name="porcentajeIva[]" id="porcentajeIva[]"  onkeypress="return pulsar(event)"/>
				</div>
				<div class="float-left" id="cuadroDescuentoIva">
					<input class="form-control" type="text" name="descuentoIva[]" id="descuentoIva[]"  onkeypress="return pulsar(event)"/>
				</div>
				<div class="float-left" id="cuadroTotal">
					<input class="form-control" type="text" name="total[]" id="total[]"  onkeypress="return pulsar(event)"/>
				</div>
				<div class="float-left" id="cuadroReferencias">
					<input class="form-control" type="text" name="referencias[]" id="referencias[]" placeholder="Referencias" onkeypress="return pulsar(event)"/>
				</div>
				<div class="float-left" id="cuadroObservaciones">
					<input class="form-control" type="text" name="observaciones[]" id="observaciones[]" placeholder="Observaciones"  onkeypress="return pulsar(event)"/>
				</div>
					</li>
	 </ul>
	</div>
</div>