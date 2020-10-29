<?php
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Jesús Serrano" || $_SESSION["perfil"] == "Atencion a Clientes" && $_SESSION["cotizador"] == "1" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma" || $_SESSION["nombre"] == "Sucursal Capu" ){



}else {
  echo '<script>

              swal({

                type: "error",
                title: "¡No tiene los privilegios para realizar esta acción!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

              }).then(function(result){

                if(result.value){
                
                  window.location = "inicio";

                }

              });
            

            </script>'; 

}

?>
<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    REALIZAR COTIZACIÓN
    
    </h1>

    <ol class="breadcrumb">

      <li><a href="cotizador"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Nueva Cotización</li>

    </ol>
   

  </section>
  <!-- content-wrapper -->

  <!-- content -->
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

         echo "<div class='col-lg-6'><h3><strong style='text-transform:uppercase'>$diaLetra $dianumero  de </strong><strong style='text-transform:uppercase'>$fecha  del </strong><strong>$año</strong></h3></div>";


         ?>

         <div class="col-lg-12">
           <center><h2 style="font-weight: bold;color:tomato;">COTIZADOR</h2></center>
         </div>
         <div class="col-lg-6">
            <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
         </div>

      </div>
      
      <div class="box-body" style="background-color: #fff;background-image:linear-gradient(90deg, transparent 79px, #abced4 79px, #abced4 81px, transparent 81px),linear-gradient(#eee .1em, transparent .1em);background-size: 100% 2.8em;">
          <div class="container col-lg-12 col-sm-12">
            <div class="row">
              
              <div class="col-lg-12 col-sm-12" style="background:#ccf7ff;min-height: 250px;margin-left: 0px;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
                <div class="col-lg-6 col-sm-6">
                   <form class="form-horizontal" action=""  style="margin-top: 50px">
                    <div class="form-group">
                     <!--|||||||||||||||||||||||||||||||||| 
                          ||     MODIFICADO POR DIEGO-PC     ||
                         |||||||||||||||||||||||||||||||||||-->
                      <label class="control-label col-sm-2" style="text-align: left;">Fecha:</label>
                      <div class="col-lg-5 col-sm-5" id="fech2">
    
                         
                          <input style="margin-left: -30px;margin-top:-10px;background:transparent;outline: 0;border-width: 0 0 1px;border-color: black;text-transform: uppercase; text-align:center;" type="date" id="fecha" value="" class="form-control" readonly>

                      </div>
                      </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" style="text-align: left;">Elegir Empresa:</label>
                      <div class="col-lg-8 col-sm-8" id="divEmpresa">
                       <select class="form-control" id="empresa" name="empresa" style="margin-left: -30px;background: transparent;font-size: 14px;" autofocus>
                          <option value="PYC">PINTURAS Y COMPLEMENTOS DE PUEBLA  S.A DE C.V</option>
                          <option value="FLEX">FLEX FINISHES MÉXICO S.A DE C.V</option>
                       </select>
                       
                      </div>
                      </div>
                      <div class="form-group" style="margin-top: -5px" >
                       <label class="control-label col-sm-2" style="text-align: left;">Código:</label>
                      <div class="col-lg-5 col-sm-5" id="divCodigo">          
                
                        <input style="margin-left: -30px;margin-top:-10px;background:transparent;outline: 0;border-width: 0 0 1px;border-color: black;text-transform: uppercase;" type="hidden" class="form-control" id="codigoCliente" placeholder="Código" name="codigoCliente">
                    
                        <select class="listaClientes"  placeholder="Código" required="true" style="width: 220px;margin-left: -100px;" onchange="mostrarInputs(this.value);" onclick="return validar(this)" autofocus>

                          <option></option>
                                
                        </select>
                      </div>
                      </div>
                      <div class="form-group" style="margin-top: -5px">
                      <label class="control-label col-sm-2" style="text-align: left;">Nombre:</label>
                      <div class="col-lg-5 col-sm-5" id="divNombre">          
                        <input style="margin-left: -30px;margin-top:-10px;background:transparent;outline: 0;border-width: 0 0 1px;border-color: black;text-transform: uppercase;" type="text" class="form-control" id="nombreCliente" placeholder="Nombre cliente" name="nombreCliente">
                      </div>
                      <label class="control-label col-sm-2" style="text-align: left;">Rfc:</label>
                      <div class="col-lg-3 col-sm-3" id="divRfc">          
                        <input style="margin-left: -20px;margin-top:-10px;background:transparent;outline: 0;border-width: 0 0 1px;border-color: black;text-transform: uppercase;" type="text" class="form-control" id="rfc" placeholder="Rfc" name="rfc">
                      </div>

                    </div>
                   
                 
                  </form>
                </div>
                <div class="col-lg-5 col-sm-5" style="float: right;">
                  
                  <div class="col-lg-6" style="background:transparent;min-height: 80px;float:right;margin-top: 10px;">
                    <div class="col-lg-12 col-sm-12" style="background:#6e7075;min-height: 22px;margin-top:10px;-webkit-box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);-moz-box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);">
                      <center><small style="color: white;font-size: 15px;font-weight: bold">COTIZACIÓN</small></center>
                    </div>
                    <div class="col-lg-6 col-sm-6" style="min-height: 22px;background:#ffffff;-webkit-box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);-moz-box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);">
                      <small style="color: black;font-size: 15px;font-weight: bold;margin-left:-10px">COMA</small>
                    </div>
                    <div class="col-lg-6 col-sm-6" style="min-height: 22px;background:#ffffff;-webkit-box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);-moz-box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);">
                       <small style="color: black;font-size: 15px;font-weight: bold;margin-left:40px">
                            <?php
                                  echo '<input type="text" name="folioCotizacion" id="folioCotizacion" value="0" style="background:transparent;border: none;" readonly="true">';
                            ?>
                      </small>
                    </div>
                    <div class="col-lg-4 col-sm-4" style="background:#ccf7ff;min-height: 22px;-webkit-box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);-moz-box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);">
                      <small style="color: black;font-size: 12px;font-weight: lighter;margin-left:-10px">Serie</small>
                    </div>
                    <div class="col-lg-8 col-sm-8" style="background:#6e7075;min-height: 22px;margin-bottom: 10px;-webkit-box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);-moz-box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);box-shadow: 0px 0px 0px 3px rgba(255,255,255,1);">
                       <small style="color: white;font-size: 12px;font-weight: lighter;">Folio</small>
                    </div>
                    
                    <div class="col-lg-4 col-sm-4">
                        <div class="form-group two-fields" style="margin-left: -20px;">
                         
                          <div class="input-group">
                            <input  type="text" style="width: 120px;height: 25px;background:transparent;border:none;text-align: right;color: black;font-size: 12px;" value="Vencimiento: *" readonly>
                          </div>
                        </div>
                  </div>
                  <div class="col-lg-8 col-sm-8">
                    <div class="form-group two-fields" style="margin-left: 30px;">
                     
                      <div class="input-group">
                       <input type="hidden" name="diasCredito" id="diasCredito">
                        <input name="vencimiento" id="vencimiento" type="text" required style="width: 90px;height: 25px;text-align: right;background:transparent;outline: 0;border-width: 0 0 1px;border-color: black;"  readonly>
                         
                      </div>

                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                        <div class="form-group two-fields" style="margin-left: -20px;">
                         
                          <div class="input-group">
                            <input  type="text" style="width: 120px;height: 25px;background:transparent;border:none;text-align: right;color: black;font-size: 11px;" value="Fecha de Entrega:" readonly>
                          </div>
                        </div>
                  </div>
                  <div class="col-lg-8 col-sm-8">
                    <div class="form-group two-fields" style="margin-left: 30px;">
                     <div class="input-group datepick3" id="datepick3">
                          <input type="text" class="form-control input-lg datepick3" name="fechaEntrega" id="fechaEntrega" style="width: 100px;height: 25px;text-align: right;background:transparent;outline: 0;border-width: 0 0 1px;border-color: black;font-size: 13px;color: black" placeholder="DD/MM/AAAA" required>
                      </div>
                       
                     
                    </div>
                  </div>

                  </div>
                  
                  
                </div>

                <div class="col-lg-12 col-sm-12">
                   <div class="form-group">
                       <label class="control-label col-sm-1" style="text-align: left;">Domicilio Fiscal:</label>


                      <div class="col-sm-11">          
                        <input style="background:transparent;border-color: white;text-transform: uppercase;margin-left: 10px" type="text" class="form-control" id="domicilioFiscal" placeholder="Domicilio Fiscal" name="domicilioFiscal">
                        <label class="control-label col-sm-11" style="text-align: left;">Formato (Calle,Número Interior,Número Exterior ,Colonia,Municipio,Estado,Ciudad,País)</label>
                      </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12"  style="margin-bottom: 10px">
                   <div class="form-group">
                       <label class="control-label col-sm-1" style="text-align: left;">Referencia:</label>
                      <div class="col-sm-11">          
                        <input style="background:transparent;border-color: white;text-transform: uppercase;margin-left: 30px" type="text" class="form-control" id="referencia" placeholder="Referencia" name="referencia">
                      </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12"  style="margin-bottom: 10px">
                   <div class="form-group">
                       <label class="control-label col-sm-1" style="text-align: left;">Observaciones:</label>
                      <div class="col-sm-11">          
                        <input style="background:transparent;border-color: white;text-transform: uppercase;margin-left: 30px" type="text" class="form-control" id="observaciones" placeholder="Observaciones" name="observaciones">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6"  style="margin-bottom: 10px">
                   <div class="form-group">
                       <label class="control-label col-sm-4" style="text-align: left;">Método de Pago:</label>
                      <div class="col-sm-8">          
                        <select class="form-control" id="metodoPago" name="metodoPago" style="margin-left: -30px;background: transparent;" required>
                          <option value="0">Seleccionar método de pago</option>
                          <option value="Pago en una sola exhibicion">Pago en una sola exhibición</option>
                          <option value="Pago en parcialidades o diferido">Pago en parcialidades o diferido</option>
                       </select>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6"  style="margin-bottom: 10px">
                   <div class="form-group">
                       <label class="control-label col-sm-4" style="text-align: left;">Forma de Pago:</label>
                      <div class="col-sm-8">          
                       <select class="form-control" id="formaPago" name="formaPago" style="margin-left: -30px;background: transparent;" required>
                          <option value="0">Seleccionar forma de pago</option>

                        <option value="01">Efectivo</option>

                        <option value="02">Cheque nominativo</option>

                        <option value="03">Transferencia electrónica de fondos</option>

                        <option value="04">Tarjeta de crédito</option>

                        <option value="05">Monedero electrónico</option>

                        <option value="06">Dinero electrónico</option>

                        <option value="08">Vales de despensa</option>

                        <option value="12">Dación de pago</option>

                        <option value="13">Pago por subrogación</option>

                        <option value="14">Pago por consignación</option>

                        <option value="15">Condonación</option>

                        <option value="17">Compensación</option>

                        <option value="23">Novación</option>

                        <option value="24">Confusión</option>

                        <option value="25">Remisión de deuda</option>

                        <option value="26">Prescripción o caducidad</option>

                        <option value="27">A satisfacción del acreedor</option>

                        <option value="28">Tarjeta de débito</option>

                        <option value="29">Tarjeta de servicios</option>

                        <option value="30">Aplicación de anticipos</option>

                        <option value="31">Intermediario de pagos</option>

                        <option value="99">Por definir</option>
                       </select>
                      </div>
                    </div>
                </div>

              </div>
              
              <div class="col-lg-12 col-sm-12" style="background:white;min-height: 50px;margin-left: 0px;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
                    <form style="margin-top: 10px">

                      <div class="col-lg-3 col-sm-3">
                         <div class="form-group">
                          <input type="text" class="form-control" style="background:transparent;border: none;" readonly>
                          
                         </div>
                      </div>
                      <div class="col-lg-2 col-sm-2">
                         <div class="form-group">
                          <input type="text" class="form-control" id="moneda" name="moneda" style="background:#ccf7ff;outline: 0;border-width: 0 0 1px;border-color: black;" value="PESO MEXICANO" readonly>
                          <label>Moneda *</label>
                         </div>
                      </div>
                      <div class="col-lg-2 col-sm-2">
                          <div class="form-group">
                            <input type="text" class="form-control" id="tipoCambio" name="tipoCambio" style="background:#ccf7ff;outline: 0;border-width: 0 0 1px;border-color: black;" value="1.0000" readonly>
                            <label>Tipo de Cambio *</label>
                          </div>
                      </div>
                      <div class="col-lg-2 col-sm-2">
                          <div class="form-group">
                        <input type="hidden" class="form-control" id="codigoAgente" name="codigoAgente" style="background:#ccf7ff;outline: 0;border-width: 0 0 1px;border-color: black;" >
                    
                        <select class="listaAgentes"  placeholder="Codigo Agente" required="true" style="background:transparent;outline: 0;border-width: 0 0 1px;border-color: black;width: 190px;margin-left: -100px;" onchange="mostrarInputsAgente(this.value)">

                          <option></option>
                                
                        </select>
                            <label style="margin-top: 20px">Código (Agente)</label>
                          </div>
                      </div>
                      <div class="col-lg-3 col-sm-3">
                          <div class="form-group">
                             <input type="hidden" class="form-control" id="descuentoMovimiento" name="descuentoMovimiento" style="background:#ccf7ff;outline: 0;border-width: 0 0 1px;border-color: black;">
                             <input type="hidden" class="form-control" id="descuentoMovimiento2" name="descuentoMovimiento2" style="background:#ccf7ff;outline: 0;border-width: 0 0 1px;border-color: black;">
                            <input type="text" class="form-control" id="agenteVentas" name="agenteVentas" style="background:#ccf7ff;outline: 0;border-width: 0 0 1px;border-color: black;" readonly>
                            <input name="listas" id="listas" type="hidden">
                            <label>Agente de Venta *</label>
                          </div>
                      </div>

                    </form>
              </div>

             <div class="col-lg-11 col-md-11 col-sm-11">

              <div class="alert alert-warning" id="warning-alert" style="display: none;margin-left: 100px">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  <strong id="textAlert"></strong>
                  
              </div>
               
             </div>
             <div class="col-lg-11 col-md-11 col-sm-11" style="background: white">
              <span><strong>Escribir <strong style="color: red">01</strong> como código interno para productos que no existen.</strong></span>
               
             </div>
            <div class="col-lg-12 col-sm-12" style="background:white;min-height: 50px;margin-left: 0px;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
                

                <form name="frmProduct" id="frmProduct" method="post" action="crearCotizacion.php"  onsubmit="return validar(this);">
                    <div id="outer">
                      <div id="header">

                        <div  class="float-left col-heading6" style="font-weight: bold;">N°</div>
                        <div id="divCodigg" class="float-left col-heading4" > Código</div>
                        <div id="divName" class="float-left col-heading4" > Nombre</div>
                        <div id="divCanti" class="float-left col-heading4" > Cantidad</div>
                        <div  class="float-left col-heading4"> Unidad</div>
                        <div  class="float-left col-heading4" > Precio</div>
                        <div  class="float-left col-heading4" > Neto</div>
                        <div  class="float-left col-heading4" > %Desc</div>
                        <div  class="float-left col-heading4" > Desc</div>
                        <div id="porcDesc2" class="float-left col-heading4"> %Desc2</div>
                        <div  class="float-left col-heading4" > Desc2</div>
                        <div  class="float-left col-heading4" > %I.V.A</div>
                        <div  class="float-left col-heading4"> I.V.A</div>
                        <div  class="float-left col-heading4"> Total</div>

                        <!--
                        <div id="divN" class="float-left col-heading5" style="font-weight: bold;margin-left: 10px;" >N°</div>
                        <div id="divCod" class="float-left col-heading" style="margin-left: 15px;"> Código</div>
                        <div id="divNom" class="float-left col-heading3" style="margin-left: 10px;"> Nombre</div>
                        <div id="divCantidad" class="float-left col-heading2" style="margin-left: -30px;"> Cantidad</div>
                        <div id="divUnidad" class="float-left col-heading2" style="margin-left: -20px;"> Unidad</div>
                        <div id="divPrecio" class="float-left col-heading2" style="margin-left: -40px;"> Precio</div>
                        <div id="divNeto" class="float-left col-heading2" style="margin-left: -10px;"> Neto</div>
                        <div id="divDescPor1" class="float-left col-heading4" style="margin-left: -10px;"> %Desc</div>
                        <div id="divDesc" class="float-left col-heading4" style="margin-left: -10px;"> Desc</div>
                        <div id="divDescPor2" class="float-left col-heading4" style="margin-left:-0px;"> %Desc2</div>
                        <div id="divDesc2" class="float-left col-heading4" style="margin-left: -5px;"> Desc2</div>
                        <div id="divPorIVA" class="float-left col-heading4" style="margin-left: 0px;"> %I.V.A</div>
                        <div id="divIVA" class="float-left col-heading4"> I.V.A</div>
                        <div id="divTotal" class="float-left col-heading2"> Total</div>
                      -->

                      </div>
                    <div id="productos">
                    <input type="hidden" name="fechaCot" id="fechaCot">
                    <input type="hidden" name="serieCot" id="serieCot" value="COMA">
                    <input type="hidden" name="folioCot" id="folioCot">
                    <input type="hidden" name="empresaCot" id="empresaCot">
                    <input type="hidden" name="codigoClienteCot" id="codigoClienteCot">
                    <input type="hidden" name="nombreClienteCot" id="nombreClienteCot">
                    <input type="hidden" name="rfcCot" id="rfcCot">
                    <input type="hidden" name="vencimientoCot" id="vencimientoCot">
                    <input type="hidden" name="fechaEntregaCot" id="fechaEntregaCot">
                    <input type="hidden" name="domicilioFiscalCot" id="domicilioFiscalCot">
                    <input type="hidden" name="referenciaCot" id="referenciaCot">
                    <input type="hidden" name="observacionesCot" id="observacionesCot">
                    <input type="hidden" name="metodoPagoCot" id="metodoPagoCot">
                    <input type="hidden" name="formaPagoCot" id="formaPagoCot">
                    <input type="hidden" name="monedaCot" id="monedaCot">
                    <input type="hidden" name="tipoCambioCot" id="tipoCambioCot">
                    <input type="hidden" name="codigoAgenteCot" id="codigoAgenteCot">
                    <input type="hidden" name="agenteVentasCot" id="agenteVentasCot">
                    <input type="hidden" name="diasCreditoCot" id="diasCreditoCot">
                    <input type="hidden" name="listasCot" id="listasCot">

                    <?php require_once("inputDinamico.php") ?>
                    </div>
                    <div class="btn-action float-clear">
                      <div class="col-lg-1 col-sm-1">
                        <!-- 
                        <button class="btn btn-success" name="agregar_registros" id="agregar_registros" onClick="AgregarMas()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      -->
                         <input class="btn btn-success" type="button" name="agregar_registros" value="+" onClick="AgregarMas();" />
                      </div>
                      <div class="col-lg-1 col-sm-1">
                        <input class="btn btn-danger" type="button" id="borrar" name="borrar_registros" value="x" onClick="BorrarRegistro();" />
                      </div>
                      <div  class="col-lg-2 col-sm-2" id="buttonGuardar">
                        <input class="btn btn-primary" type="submit"  name="guardar" value="Guardar Ahora" />
                      </div>
                    </div>
                    <br>
                   
                    </div>
                </form>

              </div>
            <div class="col-lg-12 col-sm-12" style="background:white;min-height: 100px;margin-left: 0px;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75)">
               <div class="col-lg-12 col-sm-12">
                 <div class="col-lg-6 col-md-6" >
                    
                  </div>
                  <div class="col-lg-1 col-md-1" id="totalProductos1">
                    <div class="form-group two-fields" style="margin-left: -30px;">
                     
                      <div class="input-group">
                        <input  type="text" style="width: 150px;height: 25px" value="TOTAL de Productos" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2" id="totalProductosN">
                    <div class="form-group two-fields" style="margin-left: 20px;">
                     
                      <div class="input-group">
                        <input name="totalProductos"  id="totalProductos" type="text" required style="width: 120px;height: 25px;text-align: right;" value="0.00" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-1 col-md-1" id="subtotal1">
                    <div class="form-group two-fields" style="margin-left: 0px;">
                     
                      <div class="input-group">
                        <input  type="text" style="width: 130px;height: 25px" value="Subtotal" readonly >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2" id="subtotalN1">
                    <div class="form-group two-fields" style="margin-left: 30px;">
                     
                      <div class="input-group">
                        <input name="subtotal" id="subtotal" type="text" required style="width: 100px;height: 25px;text-align: right;" value="0.00" readonly>
                      </div>
                    </div>
                  </div>

               </div>
               <div class="col-lg-12 col-sm-12" style="margin-top: -20px;float: right;">
                  <div class="col-lg-6 col-md-6">
                    
                  </div>
                  <div class="col-lg-1 col-md-1" id="saldoclient1">
                    <div class="form-group two-fields" style="margin-left: -30px;">
                     
                      <div class="input-group">
                        <input  type="text" style="width: 150px;height: 25px" value="Saldo Cliente (Pesos)" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2" id="Saldoclient">
                    <div class="form-group two-fields" style="margin-left: 20px;">
                     
                      <div class="input-group">
                        <input name="saldoCliente" id="saldoCliente" type="text" required style="width: 120px;height: 25px;text-align: right;" value="0.00" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-1 col-md-1" id="totalDescuentos1">
                    <div class="form-group two-fields" style="margin-left: 0px;">
                     
                      <div class="input-group">
                        <input  type="text" style="width: 130px;height: 25px" value="Total Descuentos" readonly >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2" id="totalDescuentosN1">
                    <div class="form-group two-fields" style="margin-left: 30px;">
                     
                      <div class="input-group">
                        <input name="totalDescuentos" id="totalDescuentos" type="text" required style="width: 100px;height: 25px;text-align: right;" value="0.00" readonly>
                      </div>
                    </div>
                  </div>
                  
               </div>
               <div class="col-lg-12 col-sm-12" style="margin-top: -20px;float: right;">
                  <div class="col-lg-6 col-md-6">
                    
                  </div>
                  <div class="col-lg-1 col-md-1">
                    
                  </div>
                  <div class="col-lg-2 col-md-2">
                    
                  </div>
                  <div class="col-lg-1 col-md-1" id="totalImpuestos1">
                    <div class="form-group two-fields" style="margin-left: 0px;">
                     
                      <div class="input-group">
                        <input  type="text" style="width: 130px;height: 25px" value="Total Impuestos" readonly >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2" id="totalImpuestosN1">
                    <div class="form-group two-fields" style="margin-left: 30px;">
                     
                      <div class="input-group">
                        <input name="totalImpuestos" id="totalImpuestos" type="text" required style="width: 100px;height: 25px;text-align: right;" value="0.00" readonly>
                      </div>
                    </div>
                  </div>
                  
               </div>
               <div class="col-lg-12 col-sm-12" style="margin-top: -20px">
                  <div class="col-lg-6 col-md-6">
                    
                  </div>
                  <div class="col-lg-1 col-md-1">
                    
                  </div>
                  <div class="col-lg-2 col-md-2">
                    
                  </div>
                  <div class="col-lg-1 col-md-1" id="total1">
                    <div class="form-group two-fields" style="margin-left: 0px;">
                     
                      <div class="input-group">
                        <input  type="text" style="width: 130px;height: 25px;font-weight: bold;" value="TOTAL" readonly >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2" id="totalN1">
                    <div class="form-group two-fields" style="margin-left: 30px;">
                     
                      <div class="input-group">
                        <input name="totalCotizacion" id="totalCotizacion" type="text" required style="width: 100px;height: 25px;text-align: right;font-weight: bold" value="0.00" readonly>
                      </div>
                    </div>
                  </div>
                  
               </div>
              </div>
            
          </div>
                     <!--|||||||||||||||||||||||||||||||||||||| 
                         |||HASTA ESTA PARTE LO HE MODIFICADO||
                         ||||||||||||||||||||||||||||||||||||||-->
                     
      </div>

    </div>
      <!-- row -->
    
    <!-- row -->
 </section>
  <!-- content -->

</div>


<script type="text/javascript">
   $(document).ready(function(){

    $(document).click(function(){
      var lista = document.getElementsByClassName("listaProductos").length;
       $("#listas").val(lista);
    })
   $("#borrar").on('click', cargaValores);
  //
            function cargaValores(){

                        var totalUnidades = $('[name="cantidad[]"]');; 
                          var totalUnid = 0;

                            totalUnidades.each(function(){
                            totalUnid += parseFloat($(this).val());

                          });
                          $('#totalProductos').val(totalUnid.toFixed(2));

                          var totalNeto = $('[name="neto[]"]'); 
                          var totalNet = 0;

                            totalNeto.each(function(){
                            totalNet += parseFloat($(this).val());

                          });

                          $('#subtotal').val(totalNet.toFixed(2));

                          var totalDescuentos = $('[name="descuento[]"]');
                          var totalDesc = 0;
                          var totalDescuentos2 = $('[name="descuento2[]"]'); 
                          var totalDesc2 = 0;

                          totalDescuentos.each(function(){
                          totalDesc += parseFloat($(this).val());
                          });

                          totalDescuentos2.each(function(){
                            totalDesc2 += parseFloat($(this).val());
                          });

                          var totalFinalDesc = totalDesc + totalDesc2;
                          $('#totalDescuentos').val(totalFinalDesc.toFixed(2));

                          var totalImpuestos = $('[name="descuentoIva[]"]'); 
                          var totalImpues = 0;

                          totalImpuestos.each(function(){
                            totalImpues += parseFloat($(this).val())
                          });

                          $('#totalImpuestos').val(totalImpues.toFixed(2));

                          var totalCotizacion = $('[name="total[]"]'); 
                          var totalCot = 0;

                          totalCotizacion.each(function(){
                            totalCot += parseFloat($(this).val());
                          });

                          $('#totalCotizacion').val(totalCot.toFixed(2));
                        }
  })
</script>
<script type="text/javascript">
      $(document).ready(function(){
         $('.listaClientes').select2({
            placeholder: 'Seleccionar',
            allowClear: true,
            tags: true,
            ajax: {
              url: 'vistas/modulos/getClientesJson.php',
              dataType: 'json',
              delay: 1,
              selected: true,
              processResults: function (data) {
                return {
                  results: data

                };
              },
              cache: true
            }

          });
       
        $("#codigoCliente").focus();

        $("#codigoCliente").keyup(function(e){
          ;
          var url = "enter.php";
          $.getJSON(url, { _num1 : $("#codigoCliente").val() }, function(clientes){
            $.each(clientes, function(i, cliente){
              $("#nombreCliente").val(cliente.nombreCliente);
              $("#rfc").val(cliente.rfc);
              $("#domicilioFiscal").val(cliente.domicilioFiscal);
              $("#agenteVentas").val(cliente.agenteVentas);
              $("#diasCredito").val(cliente.diasCredito);
              $("#descuentoMovimiento").val(cliente.descuentoMovimiento);
              $("#codigoAgente").val(cliente.codigoAgente);

            

            });
          });
        });

        $('.listaProductos').select2({
          placeholder: 'Seleccionar',
          allowClear: true,
          open: true,
          tags: true,
          ajax: {
            url: 'vistas/modulos/getProductosJson.php',
            dataType: 'json',
            delay: 1,
            selected: true,
            processResults: function (data) {
              return {
                results: data

              };
            },
            cache: true
          }
        });
        $('.listaUnidades').select2({
          placeholder: 'Seleccionar',
          allowClear: true,
          open: true,
          tags: true,
          ajax: {
            url: 'vistas/modulos/getUnidadesJson.php',
            dataType: 'json',
            delay: 1,
            selected: true,
            processResults: function (data) {
              return {
                results: data

              };
            },
            cache: true
          }
        });
        $('.listaPrecios').select2({
          placeholder: 'Seleccionar',
          allowClear: true,
          open: true,
          tags: true,
          ajax: {
            url: 'vistas/modulos/getPreciosJson.php',
            dataType: 'json',
            delay: 1,
            selected: true,
            processResults: function (data) {
              return {
                results: data

              };
            },
            cache: true
          }
        });



 
    });
    /*******LISTAR LISTA DE PRODUCTOS*************/
      $(document).ready(function(){
        $('[name="codigo[]"]').focus();

        var url = "productosLista.php";

        $(document).on('keyup', 'input[name="codigo[]"]', function(e){
          var parent = $(this).parent().parent();

            /*********LISTAR LAS UNIDADES DE MEDIDA*******/

            var codigo =  parent.find('input[name="codigo[]"]').val();
            $('.listaUnidades').select2({
              placeholder: 'Seleccionar',
              allowClear: true,
              open: true,
              tags: true,
              ajax: {
                url: 'vistas/modulos/getUnidadesJson.php?term=W&_type=query&q='+codigo,
                dataType: 'json',
                delay: 1,
                selected: true,
                processResults: function (data) {
                  return {
                    results: data

                  };
                },
                cache: true
              }
            });
            /*********LISTAR LAS UNIDADES DE MEDIDA*******/
            /*********LISTAR PRECIOS*******/
            $('.listaPrecios').select2({
              placeholder: 'Seleccionar',
              allowClear: true,
              open: true,
              tags: true,
              ajax: {
                url: 'vistas/modulos/getPreciosJson.php?term=W&_type=query&q='+codigo,
                dataType: 'json',
                delay: 1,
                selected: true,
                processResults: function (data) {
                  return {
                    results: data

                  };
                },
                cache: true
              }
            });
            /*********LISTAR PRECIOS*******/
          

          $.getJSON(url, { _num1 : $(this).val() }, function(productos){

            $.each(productos, function(i, producto){
              if (parent.find('input[name="codigo[]"]').val() == "01") {
              
              parent.find('input[name="codigo[]"]').val("");
              parent.find('input[name="nombre[]"]').val(producto.descripcion);
              parent.find('input[name="unidadMedida[]"]').val(producto.unidadMedida);
              parent.find('input[name="precio[]"]').val(producto.precio);
              parent.find('input[name="valorMedida[]"]').val(producto.valorMedida);
              parent.find('input[name="precioVar[]"]').val(producto.precio);

              /************NUEVO ************/
              parent.find('input[name="cantidad[]"]').mask('0000.000', {reverse: true});
              parent.find('input[name="porcentajeDescuento[]"]').mask('00.00', {reverse: true});
              parent.find('input[name="porcentajeDescuento2[]"]').mask('00.00', {reverse: true});
              }else{

                parent.find('input[name="nombre[]"]').val(producto.descripcion);
                parent.find('input[name="unidadMedida[]"]').val(producto.unidadMedida);
                parent.find('input[name="precio[]"]').val(producto.precio);
                parent.find('input[name="valorMedida[]"]').val(producto.valorMedida);
                parent.find('input[name="precioVar[]"]').val(producto.precio);

                /************NUEVO ************/
                parent.find('input[name="cantidad[]"]').mask('0000.000', {reverse: true});
                parent.find('input[name="porcentajeDescuento[]"]').mask('00.00', {reverse: true});
                parent.find('input[name="porcentajeDescuento2[]"]').mask('00.00', {reverse: true});
              }
              
            
              parent.find('input[name="observaciones[]"]').on('keyup', function(e) {
                 
                 var keycode = (e.keyCode ? e.keyCode : e.which);
                 if (keycode == '9') {

                  AgregarMas();

                 }else{

                  
                 }

                
                });
               
               
              /************NUEVO*************/
              parent.find("input[name='cantidad[]']").val("1.00");
              parent.find("input[name='porcentajeIva[]']").val("16.00");

              parent.find('input[name="cantidad[]"]').keyup(function(e) {
                var cantidadProductos = parent.find('input[name="cantidad[]"]').val();
                
                var precio = parent.find('input[name="precio[]"]').val();
                var numb = precio * cantidadProductos;
                numb = (numb*1).toFixed(2);
                parent.find('input[name="neto[]"]').val(numb);
                /*
                if ($("#descuentoMovimiento").val() == "") {
                    var valor =  parent.find('input[name="porcentajeDescuento[]"]').val();
                    $("#descuentoMovimiento").val(valor);
                }else {
                  parent.find('input[name="porcentajeDescuento[]"]').val($("#descuentoMovimiento").val());
                }
                */
            
                 if ($("#descuentoMovimiento").val() == "") {
                    var valor =  parent.find('input[name="porcentajeDescuento[]"]').val();
                    $("#descuentoMovimiento").val("0");
                }else {
                  $("#descuentoMovimiento").val("0");
                  parent.find('input[name="porcentajeDescuento[]"]').val("0");
                }

                parent.find('input[name="porcentajeDescuento[]"]').val();
                var porcentajeDescuento =  $("#descuentoMovimiento").val();
                var porcentajeDescuentos = porcentajeDescuento;
                porcentajeDescuentos = (porcentajeDescuentos*1).toFixed(2);
                var descuento = ((numb * porcentajeDescuentos / 100));
                parent.find('input[name="descuento[]"]').val(descuento.toFixed(2));

                numb2 = (parent.find('input[name="neto[]"]').val()-descuento);
                parent.find('input[name="porcentajeDescuento2[]"]').val();
                var porcentajeDescuento2 =  $("#descuentoMovimiento2").val();
                var porcentajeDescuentos2 = porcentajeDescuento2;
                porcentajeDescuentos2 = (porcentajeDescuentos2*1).toFixed(2);
                var descuento2 = ((numb2 * porcentajeDescuentos2 / 100));
                parent.find('input[name="descuento2[]"]').val(descuento2.toFixed(2));


                var descuentoIva = (((numb - descuento - descuento2) * 16 /100));
                parent.find('input[name="descuentoIva[]"]').val(descuentoIva.toFixed(2));

                
                var total = ((numb - descuento - descuento2 + descuentoIva));
                parent.find('input[name="total[]"]').val(total.toFixed(2));
                
                var totalUnidades = $('[name="cantidad[]"]');; 
                var totalUnid = 0;

                  totalUnidades.each(function(){
                  totalUnid += parseFloat($(this).val());

                });
                $('#totalProductos').val(totalUnid.toFixed(2));

                var totalNeto = $('[name="neto[]"]'); 
                var totalNet = 0;

                  totalNeto.each(function(){
                  totalNet += parseFloat($(this).val());

                });

                $('#subtotal').val(totalNet.toFixed(2));

                var totalDescuentos = $('[name="descuento[]"]');
                var totalDesc = 0;
                var totalDescuentos2 = $('[name="descuento2[]"]'); 
                var totalDesc2 = 0;

                totalDescuentos.each(function(){
                totalDesc += parseFloat($(this).val());
                });

                totalDescuentos2.each(function(){
                  totalDesc2 += parseFloat($(this).val());
                });

                var totalFinalDesc = totalDesc + totalDesc2;
                $('#totalDescuentos').val(totalFinalDesc.toFixed(2));

                var totalImpuestos = $('[name="descuentoIva[]"]'); 
                var totalImpues = 0;

                totalImpuestos.each(function(){
                  totalImpues += parseFloat($(this).val())
                });

                $('#totalImpuestos').val(totalImpues.toFixed(2));

                var totalCotizacion = $('[name="total[]"]'); 
                var totalCot = 0;

                totalCotizacion.each(function(){
                  totalCot += parseFloat($(this).val());
                });

                $('#totalCotizacion').val(totalCot.toFixed(2));
          
                var nombreCliente = $("#codigoCliente").val();
                console.log(nombreCliente);
              });

              parent.find('input[name="porcentajeDescuento[]"]').keyup(function(e) {
                var cantidadProductos = parent.find('input[name="cantidad[]"]').val();
                
                var precio = parent.find('input[name="precio[]"]').val();
                var numb = precio * cantidadProductos;
                numb = (numb*1).toFixed(2);
                parent.find('input[name="neto[]"]').val(numb);
        
                if ($("#descuentoMovimiento").val() == "") {
                    
                    $("#descuentoMovimiento").val(parent.find('input[name="porcentajeDescuento[]"]').val());
                }else {
                    $("#descuentoMovimiento").val(parent.find('input[name="porcentajeDescuento[]"]').val());
                }
          

                parent.find('input[name="porcentajeDescuento[]"]').val();
                var porcentajeDescuento =  $("#descuentoMovimiento").val();
                var porcentajeDescuentos = porcentajeDescuento;
                porcentajeDescuentos = (porcentajeDescuentos*1).toFixed(2);
                var descuento = ((numb * porcentajeDescuentos / 100));
                parent.find('input[name="descuento[]"]').val(descuento.toFixed(2));
                numb2 = (parent.find('input[name="neto[]"]').val()-descuento);
                parent.find('input[name="porcentajeDescuento2[]"]').val();
                var porcentajeDescuento2 =  $("#descuentoMovimiento2").val();
                var porcentajeDescuentos2 = porcentajeDescuento2;
                porcentajeDescuentos2 = (porcentajeDescuentos2*1).toFixed(2);
                var descuento2 = ((numb2 * porcentajeDescuentos2 / 100));
                parent.find('input[name="descuento2[]"]').val(descuento2.toFixed(2));


                var descuentoIva = (((numb - descuento - descuento2) * 16 /100));
                parent.find('input[name="descuentoIva[]"]').val(descuentoIva.toFixed(2));

                
                var total = ((numb - descuento - descuento2 + descuentoIva));
                parent.find('input[name="total[]"]').val(total.toFixed(2));
                
               var totalUnidades = $('[name="cantidad[]"]');; 
                var totalUnid = 0;

                  totalUnidades.each(function(){
                  totalUnid += parseFloat($(this).val());

                });
                $('#totalProductos').val(totalUnid.toFixed(2));

                var totalNeto = $('[name="neto[]"]'); 
                var totalNet = 0;

                  totalNeto.each(function(){
                  totalNet += parseFloat($(this).val());

                });

                $('#subtotal').val(totalNet.toFixed(2));

                var totalDescuentos = $('[name="descuento[]"]');
                var totalDesc = 0;
                var totalDescuentos2 = $('[name="descuento2[]"]'); 
                var totalDesc2 = 0;

                totalDescuentos.each(function(){
                totalDesc += parseFloat($(this).val());
                });

                totalDescuentos2.each(function(){
                  totalDesc2 += parseFloat($(this).val());
                });

                var totalFinalDesc = totalDesc + totalDesc2;
                $('#totalDescuentos').val(totalFinalDesc.toFixed(2));

                var totalImpuestos = $('[name="descuentoIva[]"]'); 
                var totalImpues = 0;

                totalImpuestos.each(function(){
                  totalImpues += parseFloat($(this).val())
                });

                $('#totalImpuestos').val(totalImpues.toFixed(2));

                var totalCotizacion = $('[name="total[]"]'); 
                var totalCot = 0;

                totalCotizacion.each(function(){
                  totalCot += parseFloat($(this).val());
                });

                $('#totalCotizacion').val(totalCot.toFixed(2));
          
                var nombreCliente = $("#codigoCliente").val();
                console.log(nombreCliente);


              });

              /******LISTA DE UNIDADES***********/
              parent.find('input[name="unidadMedida[]"]').keyup(function(e) {

                 
                 var valor = parent.find('input[name="unidadMedida[]"]').val();

                 var precioVar = parent.find('input[name="precioVar[]"]').val();
                 
                 if (parent.find('input[name="valorMedida[]"]').val() != "") {
                   
                   var valorMedi = parent.find('input[name="valorMedida[]"]').val();

                 }else {

                     var valorMedi = parent.find('input[name="valorMedida[]"]').val("1");

                 }
                 


                 if (valor == "LT" || valor == "MT" || valor == "ML" || valor == "PZ" || valor == "KG" || valor == "GR") {
                  
                  var precioFinal = (precioVar/valorMedi);
                 
                  
                  
                  }else{

                  var precioFinal = precioVar;
                  

                  }      
                  

                  parent.find('input[name="precio[]"]').val(precioFinal);

                


              });
              /******LISTA DE UNIDADES***********/
              /******LISTA DE PRECIOS************/
               parent.find('input[name="precioVar2[]"]').keyup(function(e) {

                 
                 var valor = parent.find('input[name="unidadMedida[]"]').val();

                 var precioVar = parent.find('input[name="precioVar2[]"]').val();
                 
                 if (parent.find('input[name="valorMedida[]"]').val() != "") {
                   
                   var valorMedi = parent.find('input[name="valorMedida[]"]').val();

                 }else {

                     var valorMedi = parent.find('input[name="valorMedida[]"]').val("1");

                 }
                 

                 if (valor == "LT" || valor == "MT" || valor == "ML" || valor == "PZ" || valor == "KG" || valor == "GR") {
                  
                  var precioFinal = (precioVar/valorMedi);
                 
                  
                  
                  }else{

                  var precioFinal = precioVar;
                  

                  }      
                  

                  parent.find('input[name="precio[]"]').val(precioFinal);

                


              });

              /******LISTA DE PRECIOS************/
             parent.find('input[name="neto[]"]').keyup(function(e) {
                var cantidadProductos = parent.find('input[name="cantidad[]"]').val();
              
                var precio = parent.find('input[name="precio[]"]').val();
                var numb = precio * cantidadProductos;
                numb = (numb*1).toFixed(2);
                parent.find('input[name="neto[]"]').val(numb);
        
                if ($("#descuentoMovimiento2").val() == "") {
                    
                    $("#descuentoMovimiento2").val(parent.find('input[name="porcentajeDescuento2[]"]').val());
                }else {
                    $("#descuentoMovimiento2").val(parent.find('input[name="porcentajeDescuento2[]"]').val());
                }
          

                parent.find('input[name="porcentajeDescuento[]"]').val();
                var porcentajeDescuento =  $("#descuentoMovimiento").val();
                var porcentajeDescuentos = porcentajeDescuento;
                porcentajeDescuentos = (porcentajeDescuentos*1).toFixed(2);
                var descuento = ((numb * porcentajeDescuentos / 100));
                parent.find('input[name="descuento[]"]').val(descuento.toFixed(2));
                numb2 = (parent.find('input[name="neto[]"]').val()-descuento);
                parent.find('input[name="porcentajeDescuento2[]"]').val();
                var porcentajeDescuento2 =  $("#descuentoMovimiento2").val();
                var porcentajeDescuentos2 = porcentajeDescuento2;
                porcentajeDescuentos2 = (porcentajeDescuentos2*1).toFixed(2);
                var descuento2 = ((numb2 * porcentajeDescuentos2 / 100));
                parent.find('input[name="descuento2[]"]').val(descuento2.toFixed(2));


                var descuentoIva = (((numb - descuento - descuento2) * 16 /100));
                parent.find('[name="descuentoIva[]"]').val(descuentoIva.toFixed(2));

                
                var total = ((numb - descuento - descuento2 + descuentoIva));
                parent.find('[name="total[]"]').val(total.toFixed(2));
                
                var totalUnidades = $('[name="cantidad[]"]');; 
                var totalUnid = 0;

                  totalUnidades.each(function(){
                  totalUnid += parseFloat($(this).val());

                });
                $('#totalProductos').val(totalUnid.toFixed(2));

                var totalNeto = $('[name="neto[]"]'); 
                var totalNet = 0;

                  totalNeto.each(function(){
                  totalNet += parseFloat($(this).val());

                });

                $('#subtotal').val(totalNet.toFixed(2));

                var totalDescuentos = $('[name="descuento[]"]');
                var totalDesc = 0;
                var totalDescuentos2 = $('[name="descuento2[]"]'); 
                var totalDesc2 = 0;

                totalDescuentos.each(function(){
                totalDesc += parseFloat($(this).val());
                });

                totalDescuentos2.each(function(){
                  totalDesc2 += parseFloat($(this).val());
                });

                var totalFinalDesc = totalDesc + totalDesc2;
                $('#totalDescuentos').val(totalFinalDesc.toFixed(2));

                var totalImpuestos = $('[name="descuentoIva[]"]'); 
                var totalImpues = 0;

                totalImpuestos.each(function(){
                  totalImpues += parseFloat($(this).val())
                });

                $('#totalImpuestos').val(totalImpues.toFixed(2));

                var totalCotizacion = $('[name="total[]"]'); 
                var totalCot = 0;

                totalCotizacion.each(function(){
                  totalCot += parseFloat($(this).val());
                });

                $('#totalCotizacion').val(totalCot.toFixed(2));
          
                var nombreCliente = $("#codigoCliente").val();
                console.log(nombreCliente);



              });
             parent.find('input[name="porcentajeDescuento2[]"]').keyup(function(e) {
                var cantidadProductos = parent.find('input[name="cantidad[]"]').val();
              
                var precio = parent.find('input[name="precio[]"]').val();
                var numb = precio * cantidadProductos;
                numb = (numb*1).toFixed(2);
                parent.find('input[name="neto[]"]').val(numb);
        
                if ($("#descuentoMovimiento2").val() == "") {
                    
                    $("#descuentoMovimiento2").val(parent.find('input[name="porcentajeDescuento2[]"]').val());
                }else {
                    $("#descuentoMovimiento2").val(parent.find('input[name="porcentajeDescuento2[]"]').val());
                }
          

                parent.find('input[name="porcentajeDescuento[]"]').val();
                var porcentajeDescuento =  $("#descuentoMovimiento").val();
                var porcentajeDescuentos = porcentajeDescuento;
                porcentajeDescuentos = (porcentajeDescuentos*1).toFixed(2);
                var descuento = ((numb * porcentajeDescuentos / 100));
                parent.find('input[name="descuento[]"]').val(descuento.toFixed(2));
                numb2 = (parent.find('input[name="neto[]"]').val()-descuento);
                parent.find('input[name="porcentajeDescuento2[]"]').val();
                var porcentajeDescuento2 =  $("#descuentoMovimiento2").val();
                var porcentajeDescuentos2 = porcentajeDescuento2;
                porcentajeDescuentos2 = (porcentajeDescuentos2*1).toFixed(2);
                var descuento2 = ((numb2 * porcentajeDescuentos2 / 100));
                parent.find('input[name="descuento2[]"]').val(descuento2.toFixed(2));


                var descuentoIva = (((numb - descuento - descuento2) * 16 /100));
                parent.find('[name="descuentoIva[]"]').val(descuentoIva.toFixed(2));

                
                var total = ((numb - descuento - descuento2 + descuentoIva));
                parent.find('[name="total[]"]').val(total.toFixed(2));
                
                var totalUnidades = $('[name="cantidad[]"]');; 
                var totalUnid = 0;

                  totalUnidades.each(function(){
                  totalUnid += parseFloat($(this).val());

                });
                $('#totalProductos').val(totalUnid.toFixed(2));

                var totalNeto = $('[name="neto[]"]'); 
                var totalNet = 0;

                  totalNeto.each(function(){
                  totalNet += parseFloat($(this).val());

                });

                $('#subtotal').val(totalNet.toFixed(2));

                var totalDescuentos = $('[name="descuento[]"]');
                var totalDesc = 0;
                var totalDescuentos2 = $('[name="descuento2[]"]'); 
                var totalDesc2 = 0;

                totalDescuentos.each(function(){
                totalDesc += parseFloat($(this).val());
                });

                totalDescuentos2.each(function(){
                  totalDesc2 += parseFloat($(this).val());
                });

                var totalFinalDesc = totalDesc + totalDesc2;
                $('#totalDescuentos').val(totalFinalDesc.toFixed(2));

                var totalImpuestos = $('[name="descuentoIva[]"]'); 
                var totalImpues = 0;

                totalImpuestos.each(function(){
                  totalImpues += parseFloat($(this).val())
                });

                $('#totalImpuestos').val(totalImpues.toFixed(2));

                var totalCotizacion = $('[name="total[]"]'); 
                var totalCot = 0;

                totalCotizacion.each(function(){
                  totalCot += parseFloat($(this).val());
                });

                $('#totalCotizacion').val(totalCot.toFixed(2));
          
                var nombreCliente = $("#codigoCliente").val();
                console.log(nombreCliente);



              });
            });
          });
        });  
        /*******************************************************/

        $(document).on('keydown', 'input[name="cantidad[]"]', function(e){
          var parent = $(this).parent().parent();

            /*********LISTAR LAS UNIDADES DE MEDIDA*******/

            var codigoProducto = parent.find('input[name="codigo[]"]').val();
            $('.listaUnidades').select2({
                                          placeholder: 'Seleccionar',
                                          
                                          open: true,
                                          tags: true,
                                           ajax: {
                                              url: 'vistas/modulos/getUnidadesJson.php?term='+codigoProducto+'&_type=query&q='+codigoProducto,
                                              dataType: 'json',
                                              delay: 1,
                                              selected: true,
                                              processResults: function (data) {
                                              return {
                                                results: data

                                                 };
                                               },
                                              
                                              cache: true
                                              }
                                              
                                          });

                                      $('.listaPrecios').select2({
                                          placeholder: 'Seleccionar',
                                          
                                          open: true,
                                          tags: true,
                                          ajax: {
                                            url: 'vistas/modulos/getPreciosJson.php?term='+codigoProducto+'&_type=query&q='+codigoProducto,
                                            dataType: 'json',
                                            delay: 1,
                                            selected: true,
                                            processResults: function (data) {
                                              return {
                                                results: data

                                              };
                                            },
                                            cache: true
                                          }
                                        });
                                     
          

          $.getJSON(url, { _num1 : parent.find('input[name="cantidad[]"]').val() }, function(productos){

            $.each(productos, function(i, producto){
          
               
              /************NUEVO*************/
              
              
              parent.find('input[name="cantidad[]"]').keyup(function(e) {
                var cantidadProductos = parent.find('input[name="cantidad[]"]').val();
                
                var precio = parent.find('input[name="precio[]"]').val();
                var numb = precio * cantidadProductos;
                numb = (numb*1).toFixed(2);
                parent.find('input[name="neto[]"]').val(numb);
                /*
                if ($("#descuentoMovimiento").val() == "") {
                    var valor =  parent.find('input[name="porcentajeDescuento[]"]').val();
                    $("#descuentoMovimiento").val(valor);
                }else {
                  parent.find('input[name="porcentajeDescuento[]"]').val($("#descuentoMovimiento").val());
                }
            */
                if ($("#descuentoMovimiento").val() == "") {
                    var valor =  parent.find('input[name="porcentajeDescuento[]"]').val();
                    $("#descuentoMovimiento").val("0");
                }else {
                  $("#descuentoMovimiento").val("0");
                  parent.find('input[name="porcentajeDescuento[]"]').val("0");
                }
          

                parent.find('input[name="porcentajeDescuento[]"]').val();
                var porcentajeDescuento =  $("#descuentoMovimiento").val();
                var porcentajeDescuentos = porcentajeDescuento;
                porcentajeDescuentos = (porcentajeDescuentos*1).toFixed(2);
                var descuento = ((numb * porcentajeDescuentos / 100));
                parent.find('input[name="descuento[]"]').val(descuento.toFixed(2));

                numb2 = (parent.find('input[name="neto[]"]').val()-descuento);
                parent.find('input[name="porcentajeDescuento2[]"]').val();
                var porcentajeDescuento2 =  $("#descuentoMovimiento2").val();
                var porcentajeDescuentos2 = porcentajeDescuento2;
                porcentajeDescuentos2 = (porcentajeDescuentos2*1).toFixed(2);
                var descuento2 = ((numb2 * porcentajeDescuentos2 / 100));
                parent.find('input[name="descuento2[]"]').val(descuento2.toFixed(2));


                var descuentoIva = (((numb - descuento - descuento2) * 16 /100));
                parent.find('input[name="descuentoIva[]"]').val(descuentoIva.toFixed(2));

                
                var total = ((numb - descuento - descuento2 + descuentoIva));
                parent.find('input[name="total[]"]').val(total.toFixed(2));
                
                var totalUnidades = $('[name="cantidad[]"]');; 
                var totalUnid = 0;

                  totalUnidades.each(function(){
                  totalUnid += parseFloat($(this).val());

                });
                $('#totalProductos').val(totalUnid.toFixed(2));

                var totalNeto = $('[name="neto[]"]'); 
                var totalNet = 0;

                  totalNeto.each(function(){
                  totalNet += parseFloat($(this).val());

                });

                $('#subtotal').val(totalNet.toFixed(2));

                var totalDescuentos = $('[name="descuento[]"]');
                var totalDesc = 0;
                var totalDescuentos2 = $('[name="descuento2[]"]'); 
                var totalDesc2 = 0;

                totalDescuentos.each(function(){
                totalDesc += parseFloat($(this).val());
                });

                totalDescuentos2.each(function(){
                  totalDesc2 += parseFloat($(this).val());
                });

                var totalFinalDesc = totalDesc + totalDesc2;
                $('#totalDescuentos').val(totalFinalDesc.toFixed(2));

                var totalImpuestos = $('[name="descuentoIva[]"]'); 
                var totalImpues = 0;

                totalImpuestos.each(function(){
                  totalImpues += parseFloat($(this).val())
                });

                $('#totalImpuestos').val(totalImpues.toFixed(2));

                var totalCotizacion = $('[name="total[]"]'); 
                var totalCot = 0;

                totalCotizacion.each(function(){
                  totalCot += parseFloat($(this).val());
                });

                $('#totalCotizacion').val(totalCot.toFixed(2));
          
                var nombreCliente = $("#codigoCliente").val();
                console.log(nombreCliente);
              });

              parent.find('input[name="porcentajeDescuento[]"]').keyup(function(e) {
                var cantidadProductos = parent.find('input[name="cantidad[]"]').val();
                
                var precio = parent.find('input[name="precio[]"]').val();
                var numb = precio * cantidadProductos;
                numb = (numb*1).toFixed(2);
                parent.find('input[name="neto[]"]').val(numb);
        
                if ($("#descuentoMovimiento").val() == "") {
                    
                    $("#descuentoMovimiento").val(parent.find('input[name="porcentajeDescuento[]"]').val());
                }else {
                    $("#descuentoMovimiento").val(parent.find('input[name="porcentajeDescuento[]"]').val());
                }
          

                parent.find('input[name="porcentajeDescuento[]"]').val();
                var porcentajeDescuento =  $("#descuentoMovimiento").val();
                var porcentajeDescuentos = porcentajeDescuento;
                porcentajeDescuentos = (porcentajeDescuentos*1).toFixed(2);
                var descuento = ((numb * porcentajeDescuentos / 100));
                parent.find('input[name="descuento[]"]').val(descuento.toFixed(2));
                numb2 = (parent.find('input[name="neto[]"]').val()-descuento);
                parent.find('input[name="porcentajeDescuento2[]"]').val();
                var porcentajeDescuento2 =  $("#descuentoMovimiento2").val();
                var porcentajeDescuentos2 = porcentajeDescuento2;
                porcentajeDescuentos2 = (porcentajeDescuentos2*1).toFixed(2);
                var descuento2 = ((numb2 * porcentajeDescuentos2 / 100));
                parent.find('input[name="descuento2[]"]').val(descuento2.toFixed(2));


                var descuentoIva = (((numb - descuento - descuento2) * 16 /100));
                parent.find('input[name="descuentoIva[]"]').val(descuentoIva.toFixed(2));

                
                var total = ((numb - descuento - descuento2 + descuentoIva));
                parent.find('input[name="total[]"]').val(total.toFixed(2));
                
               var totalUnidades = $('[name="cantidad[]"]');; 
                var totalUnid = 0;

                  totalUnidades.each(function(){
                  totalUnid += parseFloat($(this).val());

                });
                $('#totalProductos').val(totalUnid.toFixed(2));

                var totalNeto = $('[name="neto[]"]'); 
                var totalNet = 0;

                  totalNeto.each(function(){
                  totalNet += parseFloat($(this).val());

                });

                $('#subtotal').val(totalNet.toFixed(2));

                var totalDescuentos = $('[name="descuento[]"]');
                var totalDesc = 0;
                var totalDescuentos2 = $('[name="descuento2[]"]'); 
                var totalDesc2 = 0;

                totalDescuentos.each(function(){
                totalDesc += parseFloat($(this).val());
                });

                totalDescuentos2.each(function(){
                  totalDesc2 += parseFloat($(this).val());
                });

                var totalFinalDesc = totalDesc + totalDesc2;
                $('#totalDescuentos').val(totalFinalDesc.toFixed(2));

                var totalImpuestos = $('[name="descuentoIva[]"]'); 
                var totalImpues = 0;

                totalImpuestos.each(function(){
                  totalImpues += parseFloat($(this).val())
                });

                $('#totalImpuestos').val(totalImpues.toFixed(2));

                var totalCotizacion = $('[name="total[]"]'); 
                var totalCot = 0;

                totalCotizacion.each(function(){
                  totalCot += parseFloat($(this).val());
                });

                $('#totalCotizacion').val(totalCot.toFixed(2));
          
                var nombreCliente = $("#codigoCliente").val();
                console.log(nombreCliente);


              });

              /******LISTA DE UNIDADES***********/
              parent.find('input[name="unidadMedida[]"]').keyup(function(e) {

                 
                 var valor = parent.find('input[name="unidadMedida[]"]').val();

                 var precioVar = parent.find('input[name="precioVar[]"]').val();
                 
                 if (parent.find('input[name="valorMedida[]"]').val() != "") {
                   
                   var valorMedi = parent.find('input[name="valorMedida[]"]').val();

                 }else {

                     var valorMedi = parent.find('input[name="valorMedida[]"]').val("1");

                 }
                 


                 if (valor == "LT" || valor == "MT" || valor == "ML" || valor == "PZ" || valor == "KG" || valor == "GR") {
                  
                  var precioFinal = (precioVar/valorMedi);
                 
                  
                  
                  }else{

                  var precioFinal = precioVar;
                  

                  }      
                  

                  parent.find('input[name="precio[]"]').val(precioFinal);

                


              });
              /******LISTA DE UNIDADES***********/
              /******LISTA DE PRECIOS************/
               parent.find('input[name="precioVar2[]"]').keyup(function(e) {

                 
                 var valor = parent.find('input[name="unidadMedida[]"]').val();

                 var precioVar = parent.find('input[name="precioVar2[]"]').val();
                 
                 if (parent.find('input[name="valorMedida[]"]').val() != "") {
                   
                   var valorMedi = parent.find('input[name="valorMedida[]"]').val();

                 }else {

                     var valorMedi = parent.find('input[name="valorMedida[]"]').val("1");

                 }
                 

                 if (valor == "LT" || valor == "MT" || valor == "ML" || valor == "PZ" || valor == "KG" || valor == "GR") {
                  
                  var precioFinal = (precioVar/valorMedi);
                 
                  
                  
                  }else{

                  var precioFinal = precioVar;
                  

                  }      
                  

                  parent.find('input[name="precio[]"]').val(precioFinal);

                


              });

              /******LISTA DE PRECIOS************/
             parent.find('input[name="neto[]"]').keyup(function(e) {
                var cantidadProductos = parent.find('input[name="cantidad[]"]').val();
              
                var precio = parent.find('input[name="precio[]"]').val();
                var numb = precio * cantidadProductos;
                numb = (numb*1).toFixed(2);
                parent.find('input[name="neto[]"]').val(numb);
        
                if ($("#descuentoMovimiento2").val() == "") {
                    
                    $("#descuentoMovimiento2").val(parent.find('input[name="porcentajeDescuento2[]"]').val());
                }else {
                    $("#descuentoMovimiento2").val(parent.find('input[name="porcentajeDescuento2[]"]').val());
                }
          

                parent.find('input[name="porcentajeDescuento[]"]').val();
                var porcentajeDescuento =  $("#descuentoMovimiento").val();
                var porcentajeDescuentos = porcentajeDescuento;
                porcentajeDescuentos = (porcentajeDescuentos*1).toFixed(2);
                var descuento = ((numb * porcentajeDescuentos / 100));
                parent.find('input[name="descuento[]"]').val(descuento.toFixed(2));
                numb2 = (parent.find('input[name="neto[]"]').val()-descuento);
                parent.find('input[name="porcentajeDescuento2[]"]').val();
                var porcentajeDescuento2 =  $("#descuentoMovimiento2").val();
                var porcentajeDescuentos2 = porcentajeDescuento2;
                porcentajeDescuentos2 = (porcentajeDescuentos2*1).toFixed(2);
                var descuento2 = ((numb2 * porcentajeDescuentos2 / 100));
                parent.find('input[name="descuento2[]"]').val(descuento2.toFixed(2));


                var descuentoIva = (((numb - descuento - descuento2) * 16 /100));
                parent.find('[name="descuentoIva[]"]').val(descuentoIva.toFixed(2));

                
                var total = ((numb - descuento - descuento2 + descuentoIva));
                parent.find('[name="total[]"]').val(total.toFixed(2));
                
                var totalUnidades = $('[name="cantidad[]"]');; 
                var totalUnid = 0;

                  totalUnidades.each(function(){
                  totalUnid += parseFloat($(this).val());

                });
                $('#totalProductos').val(totalUnid.toFixed(2));

                var totalNeto = $('[name="neto[]"]'); 
                var totalNet = 0;

                  totalNeto.each(function(){
                  totalNet += parseFloat($(this).val());

                });

                $('#subtotal').val(totalNet.toFixed(2));

                var totalDescuentos = $('[name="descuento[]"]');
                var totalDesc = 0;
                var totalDescuentos2 = $('[name="descuento2[]"]'); 
                var totalDesc2 = 0;

                totalDescuentos.each(function(){
                totalDesc += parseFloat($(this).val());
                });

                totalDescuentos2.each(function(){
                  totalDesc2 += parseFloat($(this).val());
                });

                var totalFinalDesc = totalDesc + totalDesc2;
                $('#totalDescuentos').val(totalFinalDesc.toFixed(2));

                var totalImpuestos = $('[name="descuentoIva[]"]'); 
                var totalImpues = 0;

                totalImpuestos.each(function(){
                  totalImpues += parseFloat($(this).val())
                });

                $('#totalImpuestos').val(totalImpues.toFixed(2));

                var totalCotizacion = $('[name="total[]"]'); 
                var totalCot = 0;

                totalCotizacion.each(function(){
                  totalCot += parseFloat($(this).val());
                });

                $('#totalCotizacion').val(totalCot.toFixed(2));
          
                var nombreCliente = $("#codigoCliente").val();
                console.log(nombreCliente);



              });
             parent.find('input[name="porcentajeDescuento2[]"]').keyup(function(e) {
                var cantidadProductos = parent.find('input[name="cantidad[]"]').val();
              
                var precio = parent.find('input[name="precio[]"]').val();
                var numb = precio * cantidadProductos;
                numb = (numb*1).toFixed(2);
                parent.find('input[name="neto[]"]').val(numb);
        
                if ($("#descuentoMovimiento2").val() == "") {
                    
                    $("#descuentoMovimiento2").val(parent.find('input[name="porcentajeDescuento2[]"]').val());
                }else {
                    $("#descuentoMovimiento2").val(parent.find('input[name="porcentajeDescuento2[]"]').val());
                }
          

                parent.find('input[name="porcentajeDescuento[]"]').val();
                var porcentajeDescuento =  $("#descuentoMovimiento").val();
                var porcentajeDescuentos = porcentajeDescuento;
                porcentajeDescuentos = (porcentajeDescuentos*1).toFixed(2);
                var descuento = ((numb * porcentajeDescuentos / 100));
                parent.find('input[name="descuento[]"]').val(descuento.toFixed(2));
                numb2 = (parent.find('input[name="neto[]"]').val()-descuento);
                parent.find('input[name="porcentajeDescuento2[]"]').val();
                var porcentajeDescuento2 =  $("#descuentoMovimiento2").val();
                var porcentajeDescuentos2 = porcentajeDescuento2;
                porcentajeDescuentos2 = (porcentajeDescuentos2*1).toFixed(2);
                var descuento2 = ((numb2 * porcentajeDescuentos2 / 100));
                parent.find('input[name="descuento2[]"]').val(descuento2.toFixed(2));


                var descuentoIva = (((numb - descuento - descuento2) * 16 /100));
                parent.find('[name="descuentoIva[]"]').val(descuentoIva.toFixed(2));

                
                var total = ((numb - descuento - descuento2 + descuentoIva));
                parent.find('[name="total[]"]').val(total.toFixed(2));
                
                var totalUnidades = $('[name="cantidad[]"]');; 
                var totalUnid = 0;

                  totalUnidades.each(function(){
                  totalUnid += parseFloat($(this).val());

                });
                $('#totalProductos').val(totalUnid.toFixed(2));

                var totalNeto = $('[name="neto[]"]'); 
                var totalNet = 0;

                  totalNeto.each(function(){
                  totalNet += parseFloat($(this).val());

                });

                $('#subtotal').val(totalNet.toFixed(2));

                var totalDescuentos = $('[name="descuento[]"]');
                var totalDesc = 0;
                var totalDescuentos2 = $('[name="descuento2[]"]'); 
                var totalDesc2 = 0;

                totalDescuentos.each(function(){
                totalDesc += parseFloat($(this).val());
                });

                totalDescuentos2.each(function(){
                  totalDesc2 += parseFloat($(this).val());
                });

                var totalFinalDesc = totalDesc + totalDesc2;
                $('#totalDescuentos').val(totalFinalDesc.toFixed(2));

                var totalImpuestos = $('[name="descuentoIva[]"]'); 
                var totalImpues = 0;

                totalImpuestos.each(function(){
                  totalImpues += parseFloat($(this).val())
                });

                $('#totalImpuestos').val(totalImpues.toFixed(2));

                var totalCotizacion = $('[name="total[]"]'); 
                var totalCot = 0;

                totalCotizacion.each(function(){
                  totalCot += parseFloat($(this).val());
                });

                $('#totalCotizacion').val(totalCot.toFixed(2));
          
                var nombreCliente = $("#codigoCliente").val();
                console.log(nombreCliente);



              });
            });
          });
        });    
        /******************************************************/   
    });

    /*********LISTA AGENTES DE VENTAS*/
      $(document).ready(function() {
         $('.listaAgentes').select2({
            placeholder: 'Seleccionar',
            allowClear: true,
            
            tags: true,
            ajax: {
              url: 'vistas/modulos/getAgentesJson.php',
              dataType: 'json',
              delay: 1,
              selected: true,
              processResults: function (data) {
                return {
                  results: data

                };
              },
              cache: true
            }

          });
           
            

    });
       $(document).ready(function(){
       
        $("#codigoAgente").focus();

        $("#codigoAgente").keyup(function(e){
          ;
          var url = "agentesLista.php";
          $.getJSON(url, { _num1 : $("#codigoAgente").val() }, function(agentes){
            $.each(agentes, function(i, agente){
              var agente = $("#agenteVentas").val(agente.nombreAgente);
              
            });
          });
        });

        
    });
   
    /*********LISTA AGENTES DE VENTAS*/
    function mostrarInputs(dato) {
        if (dato != "") {

          $("#codigoCliente").val(dato);
          $("#codigoCliente").keyup();
          
            }
      }
      function mostrarInputsProductos(select) {
        select = $(select);

        var dato = select.val();

        var parent = select.parent();

        if (dato != "") {
          parent.find('input[name="codigo[]"]').val(dato);

          parent.find('input[name="codigo[]"]').keyup();
        }
      }
      function mostrarInputsUnidades(select) {
        select = $(select);

        var dato = select.val();

        var parent = select.parent();

        if (dato != "") {
          parent.find('input[name="unidadMedida[]"]').val(dato);

          parent.find('input[name="unidadMedida[]"]').keyup();

                
        }
      }

      function mostrarInputsPrecios(select) {
        select = $(select);

        var dato = select.val();

        var parent = select.parent();

        if (dato != "") {
          parent.find('input[name="precioVar2[]"]').val(dato);

          parent.find('input[name="precioVar2[]"]').keyup();

                
        }
      }

      function mostrarInputsAgente(dato){
        if (dato != "") {

          $("#codigoAgente").val(dato);
          $("#codigoAgente").keyup();
        }
      }
 
      

      $(document).click(function() {
        var fecha = moment().format("YYYY-MM-DD");
        document.getElementById("fecha").value=""+fecha;

        


        var diasCredito = $("#diasCredito").val();
        var fechaVencimiento = new Date($("#fecha").val());
        var dias = +diasCredito; // Número de días a agregar
        console.log(dias);
        fechaVencimiento.setDate(fechaVencimiento.getDate() + dias +1);
        var fechaFormato = $.datepicker.formatDate('dd/mm/yy', fechaVencimiento);
        console.log(fechaFormato);
        document.getElementById("vencimiento").value=""+fechaFormato;
 
   });

       

        $(document).ready(function() {
            $('.datepick3').datetimepicker({
               format: 'DD/MM/YYYY',
              ignoreReadonly: true
            });
            
          });

        //LISTAR PRODUCTOS
            function AgregarMas() {
                $("<div>").load("inputDinamico.php", function() {
                 var parent2 = $("#productos").append($(this).html());
                
                  //parent2.find('input[name="unidadMedida[]"]').css('border-color', 'red');

                  $('.listaProductos').select2({
                    placeholder: 'Seleccionar',
                    allowClear: true,
                    tags: true,
                    ajax: {
                      url: 'vistas/modulos/getProductosJson.php',
                      dataType: 'json',
                      delay: 1,
                      selected: true,
                      processResults: function (data) {
                        return {
                          results: data

                        };
                      },
                      cache: true
                    }
                  });
                  
                  
                  $('.listaUnidades').select2({
                      placeholder: 'Seleccionar',
                      allowClear: true,
                      open: true,
                      tags: true,
                      ajax: {
                        url: 'vistas/modulos/getUnidadesJson.php',
                        dataType: 'json',
                        delay: 1,
                        selected: true,
                        processResults: function (data) {
                          return {
                            results: data

                          };
                        },
                        cache: true
                      }
                    });

                  $('.listaPrecios').select2({
                      placeholder: 'Seleccionar',
                      allowClear: true,
                      open: true,
                      tags: true,
                      ajax: {
                        url: 'vistas/modulos/getPreciosJson.php',
                        dataType: 'json',
                        delay: 1,
                        selected: true,
                        processResults: function (data) {
                          return {
                            results: data

                          };
                        },
                        cache: true
                      }
                    });
                });
              }

              function BorrarRegistro() {
                $('div.lista-producto').each(function(index, item){
                  jQuery(':checkbox', this).each(function () {
                          if ($(this).is(':checked')) {
                      $(item).remove();
                          }
                      });
                });

              }
         

            //LISTAR Productos
            function validar(f){
                  var ok = true;


                  var codCliente = $("#codigoCliente").val();
                  if (codCliente == "") {
                    $("#textAlert").text("No ha seleccionado un cliente");
                    $("#warning-alert").fadeTo(2000, 500).slideUp(500, function(){
                     $("#warning-alert").slideUp(600);
                      });
                    ok = false;
                  }
                  var nomCliente = $("#nombreCliente").val();
                  if (nomCliente == "El cliente no existe") {
                    $("#textAlert").text("Verificar codigo de cliente");
                    $("#warning-alert").fadeTo(2000, 500).slideUp(500, function(){
                     $("#warning-alert").slideUp(600);
                      });
                    ok = false;
                  }
                  var metodoPagos = $("#metodoPago").val();
                  if (metodoPagos == 0) {
                     $("#metodoPago").css({"borderColor": "#ff8080", "borderWidth":"2px", "borderStyle": "solid"});
                    ok = false;
                  }
                  var formaPagos = $("#formaPago").val();
                  if (formaPagos == 0) {
                    $("#formaPago").css({"borderColor": "#ff8080", "borderWidth":"2px", "borderStyle": "solid"});
                    ok = false;
                  }
                  
                  
                return ok;
                }

                 function pulsar(e) { 
                    tecla = (document.all) ? e.keyCode :e.which; 
                    return (tecla!=13); 
                  } 
               

            
            /************************************
            ASIGNAR A LOS INPUTS OCULTOS LOS VALORES
            DE LOS CLIENTES
            *************************************/
            $(document).click(function(){

                $("#fechaCot").val($("#fecha").val());
                $("#folioCot").val($("#folioCotizacion").val());
                $("#empresaCot").val($("#empresa").val());
                $("#codigoClienteCot").val($("#codigoCliente").val());
                $("#nombreClienteCot").val($("#nombreCliente").val());
                $("#rfcCot").val($("#rfc").val());
                $("#vencimientoCot").val($("#vencimiento").val());
                $("#fechaEntregaCot").val($("#fechaEntrega").val());
                $("#domicilioFiscalCot").val($("#domicilioFiscal").val());
                $("#referenciaCot").val($("#referencia").val());
                $("#observacionesCot").val($("#observaciones").val());
                $("#metodoPagoCot").val($("#metodoPago").val());
                $("#formaPagoCot").val($("#formaPago").val());
                $("#monedaCot").val($("#moneda").val());
                $("#tipoCambioCot").val($("#tipoCambio").val());
                $("#codigoAgenteCot").val($("#codigoAgente").val());
                $("#agenteVentasCot").val($("#agenteVentas").val());
                $("#diasCreditoCot").val($("#diasCredito").val());
                $("#listasCot").val($("#listas").val());

            })
    
</script>
 <script>
    /**
     * Funcion que captura las variables pasados por GET
     * Devuelve un array de clave=>valor
     */
    function getGET()
    {
        // capturamos la url
        var loc = document.location.href;
        // si existe el interrogante
        if(loc.indexOf('?')>0)
        {
            // cogemos la parte de la url que hay despues del interrogante
            var getString = loc.split('?')[1];
            // obtenemos un array con cada clave=valor
            var GET = getString.split('&');
            var get = {};
 
            // recorremos todo el array de valores
            for(var i = 0, l = GET.length; i < l; i++){
                var tmp = GET[i].split('=');
                get[tmp[0]] = unescape(decodeURI(tmp[1]));
            }
            return get;
        }
    }
 
    window.onload = function()
    {
        // Cogemos los valores pasados por get
        var valores=getGET();
        if(valores)
        {
            // hacemos un bucle para pasar por cada indice del array de valores
            for(var index in valores)
            {
                
                if (valores[index] == "success") {
              
                  swal({

                      type: "success",
                      title: "¡La cotización ha sido creada exitosamente!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"

                    }).then(function(result){

                      if(result.value){
                        
                        window.location = "cotizador";

                      }

                    });
                }
            }
        }else{
            
        }
    }
    </script>
   
    <script type="text/javascript">
$(document).ready(function() {
    function actualizarFolio() {
        value = $('#folioCotizacion').val();
        $.ajax({
            type: "POST",
            url: "vistas/modulos/folioCalc.php",
            success: function(data) {
                var valor = $('#folioCotizacion').val(data);
                
            }
        });
    }
    setInterval(actualizarFolio, 1000);
});
</script>
<script>$("#productos").sortable();</script>