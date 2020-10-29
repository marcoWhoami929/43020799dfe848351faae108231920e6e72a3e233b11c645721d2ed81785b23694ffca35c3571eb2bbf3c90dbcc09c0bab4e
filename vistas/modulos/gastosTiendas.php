<?php
error_reporting(E_ALL);
if($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma"){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        GASTOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Gastos</li>
    
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
        <br>
        
        
        <br>
   
        <div class="col-lg-12">
          <div class="col-lg-3 col-md-3 col-sm-3">
            <i class='fa fa-flag fa-2x' aria-hidden='true' style='color:red'></i>&nbsp;<span><strong>Gasto Creado</strong></span>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3">
            <i class='fa fa-flag fa-2x' aria-hidden='true' style='color:orange'></i>&nbsp;<span><strong>Gasto Solicitado</strong></span>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3">
            <i class='fa fa-flag fa-2x' aria-hidden='true' style='color:green'></i>&nbsp;<span><strong>Gasto Aprobado</strong></span>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3">
            <i class='fa fa-flag fa-2x' aria-hidden='true' style='color:#1a2c75'></i>&nbsp;<span><strong>Gasto Reembolsado</strong></span>
          </div>
          
        </div>
        <div class="box-tools">

        <?php 

            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["nombre"] == "Sucursal San Manuel" || $_SESSION["nombre"] == "Sucursal Santiago" || $_SESSION["nombre"] == "Sucursal Capu" || $_SESSION["nombre"] == "Sucursal Las Torres" || $_SESSION["nombre"] == "Sucursal Reforma") {
              
              echo '<a href="vistas/modulos/reportes.php?reporteGastos=gastos">

                <button class="report btn btn-info" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';
              echo '<button class="report btn btn-warning" id="generarGasto" name="generarGasto" data-toggle="modal" data-target="#modalGenerarGasto"><i class="fa fa-money" aria-hidden="true"></i>Nuevo Gasto</button>&nbsp;';

              
               echo '<a  class="btn btn-success" id="solicitarReembolso" name="solicitarReembolso"><i class="fa fa-money" aria-hidden="true"></i>Solicitar Reembolso</a>';

              
              
            }else{
              echo '
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="vistas/modulos/reportes.php?reporteGastos=gastos">

                <button class="report btn btn-info" id="report" name="report" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

              </a>';

            }

          ?>
       
        </div>
        <br>
        
        <br>
        <div class="alert alert-dismissible" role="alert" id="solicitudTrue" style="display: none">
            <span id="mensajeSolicitud"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <table class="table-bordered table-striped dt-responsive tablaGastosTiendas" width="100%" id="gastosTiendas" style="border: 2px solid #001f3f">
         
          <thead style="background:#001f3f;color: white">
           
           <tr style="">
             <th style="width:20px;height: 40px;border:none;">N°</th>
             <th style="width:20px;height: 40px;border:none;"></th>
             <th style="border:none">Serie</th>
             <th style="border:none">Folio</th>
             <th style="border:none"></th>
             <th style="border:none">Departamento</th>
             <th style="border:none">Grupo</th>
             <th style="border:none">Subgrupo</th>
             <th style="border:none">Mes</th>
             <th style="border:none">Fecha</th>
             <th style="border:none">Descripción</th>
             <th style="border:none">Importe Gasto</th>
             <th style="border:none">Proveedor</th>
             <th style="border:none">Factura</th>
             <th style="border:none">Impuestos Gasto</th>
             <th style="border:none">Total Gasto</th>
            <th style="border:none">Acciones</th>
             <th style="border:none">Retención IVA Arrendamiento</th>
             <th style="border:none">Retencion ISR Arrendamiento</th>
             <th style="border:none">Retención IVA Flete</th>
             <th style="border:none">Retencion ISR Flete</th>
             <th style="border:none">Retención IVA Honorarios</th>
             <th style="border:none">Retencion ISR Honorarios</th>
            

           </tr>

          </thead>
          
        </table>
        <!--=====================================
        MODAL AGREGAR
        ======================================-->

        <div id="modalGenerarGasto" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
          
          <div class="modal-dialog" style="width: 80%">

            <div class="modal-content">

              <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#001f3f;color: white">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title">Generar Nuevo Gasto</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
             
                <div class="modal-body">

                  <div class="box-body">

                    <div class="form-group">

                      <div class="container col-lg-12">
                        
                        <div class="row">
                           
                          <div class="col-lg-3">
                             <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                              <span style="font-weight: bold">Departamento</span>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="form-control" name="departamento" id="departamento">
                                  
                                  <option value="">Elegir Departamento</option>

                                  <option value="ADMINISTRACION">ADMINISTRACION</option>
                                  <option value="DESGLOSE">DESGLOSE</option>
                                  <option value="CAPU">CAPU</option>
                                  <option value="CEDIS">CEDIS</option> 
                                  <option value="DIAGONAL">DIAGONAL</option>
                                  <option value="INDUSTRIAL">INDUSTRIAL</option>
                                  <option value="LAS TORRES">LAS TORRES</option>
                                  <option value="MAYORAZGO">MAYORAZGO</option>
                                  <option value="MGA">MGA</option>
                                  <option value="NO IDENTIFICADO">NO IDENTIFICADO</option>
                                  <option value="OPERACIONES">OPERACIONES</option>
                                  <option value="REFORMA">REFORMA</option>
                                  <option value="SAN MANUEL">SAN MANUEL</option>
                                  <option value="SANTIAGO">SANTIAGO</option>
                                  <option value="VENTAS">VENTAS</option>
                                  <option value="VERGEL">VERGEL</option>
                                  <option value="XONACA">XONACA</option>
                                </select>

                              </div>
                          </div>
                          <div class="col-lg-3">
                             <!-- ENTRADA PARA SELECCIONAR EL GRUPO -->
                              <span style="font-weight: bold">Grupo</span>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="form-control" name="grupo" id="grupo">
                                  
                                  <option value="">Elegir Grupo</option>

                                  <option value="EGRESOS" selected>EGRESOS</option>
                                  <option value="INGRESOS">INGRESOS</option>
                                  
                                </select>

                              </div>
                          </div>
                          <div class="col-lg-3">
                             <!-- ENTRADA PARA SELECCIONAR EL SUBGRUPO -->
                              <span style="font-weight: bold">Subgrupo</span>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="js-example-basic-single" name="subgrupo" id="subgrupo" required="true" style="width: 210px">
                                              <option value="">Elegir Subgrupo</option>
                                              <option value="Acreedores Bancarios">Acreedores Bancarios</option>
                                              <option value="Proveedores">Proveedores</option>
                                              <option value="Clientes">Clientes</option>
                                              <option value="Prestamos Bancarios">Prestamos Bancarios</option>
                                              <option value="Otros Ingresos">Otros Ingresos</option>
                                              <option value="I.V.A Acreditable">I.V.A Acreditable</option>
                                              <option value="Cuentas Propias">Cuentas Propias</option>
                                              <option value="Reembolsos de Gastos">Reembolsos de Gastos</option>
                                              <option value="Reembolsos a Clientes">Reembolsos a Clientes</option>
                                              <option value="02. Adquisición de Activos (Equipo Computo-Accesorio)">02. Adquisición de Activos (Equipo Computo-Accesorio)</option>
                                              <option value="02. Adquisición de Activos (Equipo Transporte)">02. Adquisición de Activos (Equipo Transporte)</option>
                                              <option value="02. Adquisición de Activos (Maquinaria y Equipo)">02. Adquisición de Activos (Maquinaria y Equipo)</option>
                                              <option value="02. Adquisición de Activos (Mobiliario y Equipo Oficina)">02. Adquisición de Activos (Mobiliario y Equipo Oficina)</option>
                                              <option value="03. Gastos Operativos con Retenciones  Desperdicio Industrial">03. Gastos Operativos con Retenciones  Desperdicio Industrial</option>
                                              <option value="03. Gastos Operativos con Retenciones  Fletes y Acarreos">03. Gastos Operativos con Retenciones  Fletes y Acarreos</option>
                                              <option value="03. Gastos Operativos con Retenciones  Honorarios Personas Fisicas">03. Gastos Operativos con Retenciones  Honorarios Personas Fisicas</option>
                                              <option value="03. Gastos Operativos con Retenciones  Renta Local Persona Fisica">03. Gastos Operativos con Retenciones  Renta Local Persona Fisica</option>
                                              <option value="03. Gastos Operativos con Retenciones  Renta Local Persona Moral">03. Gastos Operativos con Retenciones  Renta Local Persona Moral</option>
                                              <option value="04. Gastos Operativos Gravados  Administ y Servicio Personal">04. Gastos Operativos Gravados  Administ y Servicio Personal</option>
                                              <option value="04. Gastos Operativos Gravados  Atencion Clientes-Proveedores">04. Gastos Operativos Gravados  Atencion Clientes-Proveedores</option>
                                              <option value="04. Gastos Operativos Gravados  Capacitacion al Personal">04. Gastos Operativos Gravados  Capacitacion al Personal</option>
                                              <option value="04. Gastos Operativos Gravados  Casetas Autopistas">04. Gastos Operativos Gravados  Casetas Autopistas</option>
                                              <option value="04. Gastos Operativos Gravados  Cerrajeria">04. Gastos Operativos Gravados  Cerrajeria</option>
                                              <option value="04. Gastos Operativos Gravados  Combustibles y Lubricantes">04. Gastos Operativos Gravados  Combustibles y Lubricantes</option>
                                              <option value="04. Gastos Operativos Gravados  Convenciones">04. Gastos Operativos Gravados  Convenciones</option>
                                              <option value="04. Gastos Operativos Gravados  Demostracion de Productos">04. Gastos Operativos Gravados  Demostracion de Productos</option>
                                              <option value="04. Gastos Operativos Gravados  Energia Electrica">04. Gastos Operativos Gravados  Energia Electrica</option>
                                              <option value="04. Gastos Operativos Gravados  Equipos y Accesorios Uso Almacen">04. Gastos Operativos Gravados  Equipos y Accesorios Uso Almacen</option>
                                              <option value="04. Gastos Operativos Gravados  Farmaceuticas Laboral">04. Gastos Operativos Gravados  Farmaceuticas Laboral</option>
                                              <option value="04. Gastos Operativos Gravados  Ferreteria y Herramientas">04. Gastos Operativos Gravados  Ferreteria y Herramientas</option>
                                              <option value="04. Gastos Operativos Gravados  Gastos Diversos (CON IVA)">04. Gastos Operativos Gravados  Gastos Diversos (CON IVA)</option>
                                              <option value="04. Gastos Operativos Gravados  Gestoria Recuperacion Cartera">04. Gastos Operativos Gravados  Gestoria Recuperacion Cartera</option>
                                              <option value="04. Gastos Operativos Gravados  Limpieza y Accesorios">04. Gastos Operativos Gravados  Limpieza y Accesorios</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Computo">04. Gastos Operativos Gravados  Mantto Computo</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Instalacion Electrica">04. Gastos Operativos Gravados  Mantto Instalacion Electrica</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Local y Mejoras">04. Gastos Operativos Gravados  Mantto Local y Mejoras</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Maquinaria y Equipos">04. Gastos Operativos Gravados  Mantto Maquinaria y Equipos</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Mobiliario y Equipo Oficina">04. Gastos Operativos Gravados  Mantto Mobiliario y Equipo Oficina</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Transporte">04. Gastos Operativos Gravados  Mantto Transporte</option>
                                              <option value="04. Gastos Operativos Gravados  Material y Accesorio Electrico">04. Gastos Operativos Gravados  Material y Accesorio Electrico</option>
                                              <option value="04. Gastos Operativos Gravados  Material y Accesorio para Computo">04. Gastos Operativos Gravados  Material y Accesorio para Computo</option>
                                              <option value="04. Gastos Operativos Gravados  Mercadotecnia">04. Gastos Operativos Gravados  Mercadotecnia</option>
                                              <option value="04. Gastos Operativos Gravados  Papeleria y Articulos Oficina">04. Gastos Operativos Gravados  Papeleria y Articulos Oficina</option>
                                              <option value="04. Gastos Operativos Gravados  Propaganda y Publicidad">04. Gastos Operativos Gravados  Propaganda y Publicidad</option>
                                              <option value="04. Gastos Operativos Gravados  Reclutamiento Personal">04. Gastos Operativos Gravados  Reclutamiento Personal</option>
                                              <option value="04. Gastos Operativos Gravados  Renta Auto-Carga">04. Gastos Operativos Gravados  Renta Auto-Carga</option>
                                              <option value="04. Gastos Operativos Gravados  Seguridad Industrial y Salud">04. Gastos Operativos Gravados  Seguridad Industrial y Salud</option>
                                              <option value="04. Gastos Operativos Gravados  Seguros y Fianza">04. Gastos Operativos Gravados  Seguros y Fianza</option>
                                              <option value="04. Gastos Operativos Gravados  Sistema Software/Datos">04. Gastos Operativos Gravados  Sistema Software/Datos</option>
                                              <option value="04. Gastos Operativos Gravados  Telefonia">04. Gastos Operativos Gravados  Telefonia</option>
                                              <option value="04. Gastos Operativos Gravados  Uniformes">04. Gastos Operativos Gravados  Uniformes</option>
                                              <option value="04. Gastos Operativos Gravados  Viaticos (Cosumo-Hospedaje-Pasaje-Vias)">04. Gastos Operativos Gravados  Viaticos (Cosumo-Hospedaje-Pasaje-Vias)</option>
                                              <option value="04. Gastos Operativos Gravados  Vigilancia y Seguridad">04. Gastos Operativos Gravados  Vigilancia y Seguridad</option>
                                              <option value="05. Gastos Operativos Exentos  Agua">05. Gastos Operativos Exentos  Agua</option>
                                              <option value="05. Gastos Operativos Exentos  Control y Verificacion Vehicular">05. Gastos Operativos Exentos  Control y Verificacion Vehicular</option>
                                              <option value="05. Gastos Operativos Exentos  Gastos Diversos (SIN IVA)">05. Gastos Operativos Exentos  Gastos Diversos (SIN IVA)</option>
                                              <option value="06. Gastos Impuestos Locales  Cuotas SIEM Empresarial">06. Gastos Impuestos Locales  Cuotas SIEM Empresarial</option>
                                              <option value="06. Gastos Impuestos Locales  Impuesto Servicios Limpia">06. Gastos Impuestos Locales  Impuesto Servicios Limpia</option>
                                              <option value="06. Gastos Impuestos Locales  Impuesto Vehicular Tenencia/Control">06. Gastos Impuestos Locales  Impuesto Vehicular Tenencia/Control</option>
                                              <option value="06. Gastos Impuestos Locales  Impuesto y Derechos">06. Gastos Impuestos Locales  Impuesto y Derechos</option>
                                              <option value="07. Gastos Financieros  Comisiones Bancarias">07. Gastos Financieros  Comisiones Bancarias</option>
                                              <option value="07. Gastos Financieros  Comisiones NO Bancarias">07. Gastos Financieros  Comisiones NO Bancarias</option>
                                              <option value="07. Gastos Financieros  Intereses a Cargo Bancarios">07. Gastos Financieros  Intereses a Cargo Bancarios</option>
                                              <option value="99. Gastos Operativos NO Deducibles  Multas">99. Gastos Operativos NO Deducibles  Multas</option>
                                              <option value="99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales">99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales</option>
                                              <option value="Sueldos y Salarios">Sueldos y Salarios</option>
                                              <option value="Impuestos Federales SAT">Impuestos Federales SAT</option>
                                              <option value="Impuestos Federales SUA">Impuestos Federales SUA</option>
                                              <option value="Aguinaldo">Aguinaldo</option>
                                              <option value="Despensa">Despensa</option>
                                              <option value="Vacaciones">Vacaciones</option>
                                              <option value="Prima Vacacional">Prima Vacacional</option>
                                              <option value="Prima Antigüedad">Prima Antigüedad</option>
                                              <option value="Septimo Día">Septimo Día</option>
                                              <option value="Separacion">Separacion</option>
                                              <option value="Indemnizacion">Indemnizacion</option>
                                              <option value="Subsidio Empleo (SP)">Subsidio Empleo (SP)</option>
                                              <option value="PTU">PTU</option>         
                                    </select>
                              </div>
                          </div>
                           <div class="col-lg-3">
                             <!-- ENTRADA PARA SELECCIONAR EL MES -->
                              <span style="font-weight: bold">Mes</span>
                              <?php 
                                setlocale(LC_ALL,"es_MX");
                                $mesActual = date('m');
                                
                                switch ($mesActual) {
                                  case '01':
                                    $mes = "ENERO";
                                    break;
                                  case '02':
                                    $mes = "FEBRERO";
                                    break;
                                  case '03':
                                    $mes = "MARZO";
                                    break;
                                  case '04':
                                    $mes = "ABRIL";
                                    break;
                                  case '05':
                                    $mes = "MAYO";
                                    break;
                                  case '06':
                                    $mes = "JUNIO";
                                    break;
                                  case '07':
                                    $mes = "JULIO";
                                    break;
                                  case '08':
                                    $mes = "AGOSTO";
                                    break;
                                  case '09':
                                    $mes = "SEPTIEMBRE";
                                    break;
                                  case '10':
                                    $mes = "OCTUBRE";
                                    break;
                                  case '11':
                                    $mes = "NOVIEMBRE";
                                    break;
                                  case '12':
                                    $mes = "DICIEMBRE";
                                    break;
                                  
                                  default:
                                    break;
                                }
                               ?>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="form-control" name="mes" id="mes" required>
                                  
                                  <option value="<?php echo $mes ?>"><?php echo $mes ?></option>

                                  <option value="ENERO">ENERO</option>
                                  <option value="FEBRERO">FEBRERO</option>
                                  <option value="MARZO">MARZO</option>
                                  <option value="ABRIL">ABRIL</option>
                                  <option value="MAYO">MAYO</option>
                                  <option value="JUNIO">JUNIO</option>
                                  <option value="JULIO">JULIO</option>
                                  <option value="AGOSTO">AGOSTO</option>
                                  <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                                  <option value="OCTUBRE">OCTUBRE</option>
                                  <option value="NOVIEMBRE">NOVIEMBRE</option>
                                  <option value="DICIEMBRE">DICIEMBRE</option>

                                  
                                </select>

                              </div>
                          </div>
                          
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-lg-3">
                             <!-- ENTRADA PARA FECHA-->
                             <span style="font-weight: bold">Fecha</span>
                              <div class="input-group datepick" id="datepick">
                                  <input type="text" class="form-control input-lg datepick" name="fecha" id="fecha" required placeholder="01/01/2020">
                                  <div class="input-group-addon add-on datepick">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </div>
                                </div>
                                
                          </div>
                          <div class="col-lg-6">

                            <!-- ENTRADA PARA LA DESCRIPCION -->
                             <span style="font-weight: bold">Descripción</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                                <input type="text" class="form-control input-lg" name="descripcion" placeholder="Descripción" id="descripcion" style="text-transform: uppercase;" required>
                                
                              </div>

                          </div>
                          <div class="col-lg-3">

                            <!-- ENTRADA PARA EL IMPORTE DEL GASTO -->
                             <span style="font-weight: bold">Importe Gasto</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                <input type="text" class="form-control input-lg" name="importeGasto" placeholder="0.00" id="importeGasto" required>
                                
                              </div>

                          </div>
                          
                        </div>

                        <br>
                        
                        <div class="row">
                         
                          <div class="col-lg-3">

                            <!-- ENTRADA PARA Cliente / Proveedor / Acreedor-->
                             <span style="font-weight: bold">Proveedor</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <input type="text" class="form-control input-lg" name="acreedor" placeholder="Proveedor" id="acreedor" style="text-transform: uppercase;" required>
                                
                              </div>

                          </div>
                          <div class="col-lg-3" style="display: none" >

                            <!-- ENTRADA PARA CONCEPTO-->
                             <span style="font-weight: bold">N° Factura</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <input type="text" class="form-control input-lg" name="numeroDocumento" placeholder="Factura" id="numeroDocumento" style="text-transform: uppercase;">
                                
                              </div>

                          </div>
                            <div class="col-lg-3">

                            <!-- ENTRADA PARA SELECCIONAR SI TIENE IVA-->
                             <span style="font-weight: bold">Elegir Si Tiene Iva</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                                <select class="form-control" name="tieneIva" id="tieneIva" required>
                                  
                                  <option value="">Elegir Opción</option>

                                  <option value="Si" selected>Si</option>
                                  <option value="No">No</option>
                                  
                                </select>
                                
                              </div>

                          </div>
                          <div class="col-lg-3">

                            <!-- ENTRADA PARA SELECCIONAR SI TIENE RETENCIONES-->
                             <span style="font-weight: bold">Elegir Si Tiene Retenciones</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                                <select class="form-control" name="tieneRetenciones" id="tieneRetenciones" required>
                                  
                                  <option value="">Elegir Opción</option>

                                  <option value="01">Si</option>
                                  <option value="0" selected>No</option>
                                  
                                </select>
                                
                              </div>

                          </div>
                          
                        </div>
                        <br>
                        <div class="row">
                         <div class="contenido2"  style="display: none;" id="div_1" name="div_1">
                              <div class="row">
                                <div class="col-lg-3">
                                  <!-- CALCULAR RETENCIONES -->
                                   <span style="font-weight: bold">Tipo de Retención</span>
                                    <div class="input-group">
                              
                                      <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                                      <select class="form-control" name="tipoRetencion" id="tipoRetencion">
                                        
                                        <option value="" selected>Elegir Opción</option>

                                        <option value="Arrendamiento">Arrendamiento</option>
                                        <option value="Flete">Flete</option>
                                        <option value="Honorarios">Honorarios</option>
                                        
                                      </select>

                                    </div>
                                  </div>
                                  <div class="col-lg-3">
                                      <!-- IMPORTE -->
                                      <span style="font-weight: bold">Importe</span>
                                         <div class="input-group">
                          
                                          <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                                        <input type="text" class="form-control input-lg" name="importeRetenciones" placeholder="Importe" id="importeRetenciones">

                                        </div>
                                  </div> 
                                </div>
                               
                                                         
                              
                            </div>
                      
                        </div>
                        
                        
                      </div>
                     

                    </div>


                  </div>

                </div>


                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="minimizar">Salir</button>

                  <button type="submit" class="btn btn-primary">Guardar</button>

                </div>
                
                <?php

                $agregarDatos = new ControladorFacturasTiendas();
                $agregarDatos -> ctrCrearNuevoGasto();

                ?>

              </form>

            </div>

          </div>

        </div>

        <!--=====================================
        MODAL EDITAR GASTO
        ======================================-->

        <div id="modalEditarDatosGasto" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
          
          <div class="modal-dialog" style="width: 80%">

            <div class="modal-content">

              <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#001f3f;color: white">

                  <button type="button" class="close minimizarGastos" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title">Editar Gasto</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
             
                <div class="modal-body">

                  <div class="box-body">

                    <div class="form-group">

                      <div class="container col-lg-12">
                        
                        <div class="row">
                           
                          <div class="col-lg-3">
                             <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                              <span style="font-weight: bold">Departamento</span>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="form-control" name="editarDepartamento" id="editarDepartamento">
                                  
                                  <option value="">Elegir Departamento</option>

                                  <option value="ADMINISTRACION">ADMINISTRACION</option>
                                  <option value="DESGLOSE">DESGLOSE</option>
                                  <option value="CAPU">CAPU</option>
                                  <option value="CEDIS">CEDIS</option> 
                                  <option value="DIAGONAL">DIAGONAL</option>
                                  <option value="INDUSTRIAL">INDUSTRIAL</option>
                                  <option value="LAS TORRES">LAS TORRES</option>
                                  <option value="MAYORAZGO">MAYORAZGO</option>
                                  <option value="MGA">MGA</option>
                                  <option value="NO IDENTIFICADO">NO IDENTIFICADO</option>
                                  <option value="OPERACIONES">OPERACIONES</option>
                                  <option value="REFORMA">REFORMA</option>
                                  <option value="SAN MANUEL">SAN MANUEL</option>
                                  <option value="SANTIAGO">SANTIAGO</option>
                                  <option value="VENTAS">VENTAS</option>
                                  <option value="VERGEL">VERGEL</option>
                                  <option value="XONACA">XONACA</option>
                                </select>
                                <input type="hidden" name="idGasto" id="idGasto">
                                <input type="hidden" name="editarFolioGasto" id="editarFolioGasto">

                              </div>
                          </div>
                          <div class="col-lg-3">
                             <!-- ENTRADA PARA SELECCIONAR EL GRUPO -->
                              <span style="font-weight: bold">Grupo</span>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="form-control" name="editarGrupo" id="editarGrupo">
                                  
                                  <option value="">Elegir Grupo</option>

                                  <option value="EGRESOS" selected>EGRESOS</option>
                                  <option value="INGRESOS">INGRESOS</option>
                                  
                                </select>

                              </div>
                          </div>
                          <div class="col-lg-3">
                             <!-- ENTRADA PARA SELECCIONAR EL SUBGRUPO -->
                              <span style="font-weight: bold">Subgrupo</span>
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="js-example-basic-single" name="editarSubgrupo" id="editarSubgrupo" required="true" style="width: 210px">
                                              <option value="">Elegir Subgrupo</option>
                                              <option value="Acreedores Bancarios">Acreedores Bancarios</option>
                                              <option value="Proveedores">Proveedores</option>
                                              <option value="Clientes">Clientes</option>
                                              <option value="Prestamos Bancarios">Prestamos Bancarios</option>
                                              <option value="Otros Ingresos">Otros Ingresos</option>
                                              <option value="I.V.A Acreditable">I.V.A Acreditable</option>
                                              <option value="Cuentas Propias">Cuentas Propias</option>
                                              <option value="Reembolsos de Gastos">Reembolsos de Gastos</option>
                                              <option value="Reembolsos a Clientes">Reembolsos a Clientes</option>
                                              <option value="02. Adquisición de Activos (Equipo Computo-Accesorio)">02. Adquisición de Activos (Equipo Computo-Accesorio)</option>
                                              <option value="02. Adquisición de Activos (Equipo Transporte)">02. Adquisición de Activos (Equipo Transporte)</option>
                                              <option value="02. Adquisición de Activos (Maquinaria y Equipo)">02. Adquisición de Activos (Maquinaria y Equipo)</option>
                                              <option value="02. Adquisición de Activos (Mobiliario y Equipo Oficina)">02. Adquisición de Activos (Mobiliario y Equipo Oficina)</option>
                                              <option value="03. Gastos Operativos con Retenciones  Desperdicio Industrial">03. Gastos Operativos con Retenciones  Desperdicio Industrial</option>
                                              <option value="03. Gastos Operativos con Retenciones  Fletes y Acarreos">03. Gastos Operativos con Retenciones  Fletes y Acarreos</option>
                                              <option value="03. Gastos Operativos con Retenciones  Honorarios Personas Fisicas">03. Gastos Operativos con Retenciones  Honorarios Personas Fisicas</option>
                                              <option value="03. Gastos Operativos con Retenciones  Renta Local Persona Fisica">03. Gastos Operativos con Retenciones  Renta Local Persona Fisica</option>
                                              <option value="03. Gastos Operativos con Retenciones  Renta Local Persona Moral">03. Gastos Operativos con Retenciones  Renta Local Persona Moral</option>
                                              <option value="04. Gastos Operativos Gravados  Administ y Servicio Personal">04. Gastos Operativos Gravados  Administ y Servicio Personal</option>
                                              <option value="04. Gastos Operativos Gravados  Atencion Clientes-Proveedores">04. Gastos Operativos Gravados  Atencion Clientes-Proveedores</option>
                                              <option value="04. Gastos Operativos Gravados  Capacitacion al Personal">04. Gastos Operativos Gravados  Capacitacion al Personal</option>
                                              <option value="04. Gastos Operativos Gravados  Casetas Autopistas">04. Gastos Operativos Gravados  Casetas Autopistas</option>
                                              <option value="04. Gastos Operativos Gravados  Cerrajeria">04. Gastos Operativos Gravados  Cerrajeria</option>
                                              <option value="04. Gastos Operativos Gravados  Combustibles y Lubricantes">04. Gastos Operativos Gravados  Combustibles y Lubricantes</option>
                                              <option value="04. Gastos Operativos Gravados  Convenciones">04. Gastos Operativos Gravados  Convenciones</option>
                                              <option value="04. Gastos Operativos Gravados  Demostracion de Productos">04. Gastos Operativos Gravados  Demostracion de Productos</option>
                                              <option value="04. Gastos Operativos Gravados  Energia Electrica">04. Gastos Operativos Gravados  Energia Electrica</option>
                                              <option value="04. Gastos Operativos Gravados  Equipos y Accesorios Uso Almacen">04. Gastos Operativos Gravados  Equipos y Accesorios Uso Almacen</option>
                                              <option value="04. Gastos Operativos Gravados  Farmaceuticas Laboral">04. Gastos Operativos Gravados  Farmaceuticas Laboral</option>
                                              <option value="04. Gastos Operativos Gravados  Ferreteria y Herramientas">04. Gastos Operativos Gravados  Ferreteria y Herramientas</option>
                                              <option value="04. Gastos Operativos Gravados  Gastos Diversos (CON IVA)">04. Gastos Operativos Gravados  Gastos Diversos (CON IVA)</option>
                                              <option value="04. Gastos Operativos Gravados  Gestoria Recuperacion Cartera">04. Gastos Operativos Gravados  Gestoria Recuperacion Cartera</option>
                                              <option value="04. Gastos Operativos Gravados  Limpieza y Accesorios">04. Gastos Operativos Gravados  Limpieza y Accesorios</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Computo">04. Gastos Operativos Gravados  Mantto Computo</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Instalacion Electrica">04. Gastos Operativos Gravados  Mantto Instalacion Electrica</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Local y Mejoras">04. Gastos Operativos Gravados  Mantto Local y Mejoras</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Maquinaria y Equipos">04. Gastos Operativos Gravados  Mantto Maquinaria y Equipos</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Mobiliario y Equipo Oficina">04. Gastos Operativos Gravados  Mantto Mobiliario y Equipo Oficina</option>
                                              <option value="04. Gastos Operativos Gravados  Mantto Transporte">04. Gastos Operativos Gravados  Mantto Transporte</option>
                                              <option value="04. Gastos Operativos Gravados  Material y Accesorio Electrico">04. Gastos Operativos Gravados  Material y Accesorio Electrico</option>
                                              <option value="04. Gastos Operativos Gravados  Material y Accesorio para Computo">04. Gastos Operativos Gravados  Material y Accesorio para Computo</option>
                                              <option value="04. Gastos Operativos Gravados  Mercadotecnia">04. Gastos Operativos Gravados  Mercadotecnia</option>
                                              <option value="04. Gastos Operativos Gravados  Papeleria y Articulos Oficina">04. Gastos Operativos Gravados  Papeleria y Articulos Oficina</option>
                                              <option value="04. Gastos Operativos Gravados  Propaganda y Publicidad">04. Gastos Operativos Gravados  Propaganda y Publicidad</option>
                                              <option value="04. Gastos Operativos Gravados  Reclutamiento Personal">04. Gastos Operativos Gravados  Reclutamiento Personal</option>
                                              <option value="04. Gastos Operativos Gravados  Renta Auto-Carga">04. Gastos Operativos Gravados  Renta Auto-Carga</option>
                                              <option value="04. Gastos Operativos Gravados  Seguridad Industrial y Salud">04. Gastos Operativos Gravados  Seguridad Industrial y Salud</option>
                                              <option value="04. Gastos Operativos Gravados  Seguros y Fianza">04. Gastos Operativos Gravados  Seguros y Fianza</option>
                                              <option value="04. Gastos Operativos Gravados  Sistema Software/Datos">04. Gastos Operativos Gravados  Sistema Software/Datos</option>
                                              <option value="04. Gastos Operativos Gravados  Telefonia">04. Gastos Operativos Gravados  Telefonia</option>
                                              <option value="04. Gastos Operativos Gravados  Uniformes">04. Gastos Operativos Gravados  Uniformes</option>
                                              <option value="04. Gastos Operativos Gravados  Viaticos (Cosumo-Hospedaje-Pasaje-Vias)">04. Gastos Operativos Gravados  Viaticos (Cosumo-Hospedaje-Pasaje-Vias)</option>
                                              <option value="04. Gastos Operativos Gravados  Vigilancia y Seguridad">04. Gastos Operativos Gravados  Vigilancia y Seguridad</option>
                                              <option value="05. Gastos Operativos Exentos  Agua">05. Gastos Operativos Exentos  Agua</option>
                                              <option value="05. Gastos Operativos Exentos  Control y Verificacion Vehicular">05. Gastos Operativos Exentos  Control y Verificacion Vehicular</option>
                                              <option value="05. Gastos Operativos Exentos  Gastos Diversos (SIN IVA)">05. Gastos Operativos Exentos  Gastos Diversos (SIN IVA)</option>
                                              <option value="06. Gastos Impuestos Locales  Cuotas SIEM Empresarial">06. Gastos Impuestos Locales  Cuotas SIEM Empresarial</option>
                                              <option value="06. Gastos Impuestos Locales  Impuesto Servicios Limpia">06. Gastos Impuestos Locales  Impuesto Servicios Limpia</option>
                                              <option value="06. Gastos Impuestos Locales  Impuesto Vehicular Tenencia/Control">06. Gastos Impuestos Locales  Impuesto Vehicular Tenencia/Control</option>
                                              <option value="06. Gastos Impuestos Locales  Impuesto y Derechos">06. Gastos Impuestos Locales  Impuesto y Derechos</option>
                                              <option value="07. Gastos Financieros  Comisiones Bancarias">07. Gastos Financieros  Comisiones Bancarias</option>
                                              <option value="07. Gastos Financieros  Comisiones NO Bancarias">07. Gastos Financieros  Comisiones NO Bancarias</option>
                                              <option value="07. Gastos Financieros  Intereses a Cargo Bancarios">07. Gastos Financieros  Intereses a Cargo Bancarios</option>
                                              <option value="99. Gastos Operativos NO Deducibles  Multas">99. Gastos Operativos NO Deducibles  Multas</option>
                                              <option value="99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales">99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales</option>
                                              <option value="Sueldos y Salarios">Sueldos y Salarios</option>
                                              <option value="Impuestos Federales SAT">Impuestos Federales SAT</option>
                                              <option value="Impuestos Federales SUA">Impuestos Federales SUA</option>
                                              <option value="Aguinaldo">Aguinaldo</option>
                                              <option value="Despensa">Despensa</option>
                                              <option value="Vacaciones">Vacaciones</option>
                                              <option value="Prima Vacacional">Prima Vacacional</option>
                                              <option value="Prima Antigüedad">Prima Antigüedad</option>
                                              <option value="Septimo Día">Septimo Día</option>
                                              <option value="Separacion">Separacion</option>
                                              <option value="Indemnizacion">Indemnizacion</option>
                                              <option value="Subsidio Empleo (SP)">Subsidio Empleo (SP)</option>
                                              <option value="PTU">PTU</option>         
                                    </select>
                              </div>
                          </div>
                          <div class="col-lg-3">
                             <!-- ENTRADA PARA SELECCIONAR EL MES -->
                              <span style="font-weight: bold">Mes</span>
                              
                             <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="form-control" name="editarMes" id="editarMes" required readonly>
                                  
                                  <option value="ENERO">ENERO</option>
                                  <option value="FEBRERO">FEBRERO</option>
                                  <option value="MARZO">MARZO</option>
                                  <option value="ABRIL">ABRIL</option>
                                  <option value="MAYO">MAYO</option>
                                  <option value="JUNIO">JUNIO</option>
                                  <option value="JULIO">JULIO</option>
                                  <option value="AGOSTO">AGOSTO</option>
                                  <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                                  <option value="OCTUBRE">OCTUBRE</option>
                                  <option value="NOVIEMBRE">NOVIEMBRE</option>
                                  <option value="DICIEMBRE">DICIEMBRE</option>

                                  
                                </select>

                              </div>
                          </div>
                          
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-lg-3">
                             <!-- ENTRADA PARA FECHA-->
                             <span style="font-weight: bold">Fecha</span>
                              <div class="input-group datepick" id="datepick">
                                  <input type="text" class="form-control input-lg datepick" name="editarFecha" id="editarFecha" required readonly>
                                  <div class="input-group-addon add-on datepick">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </div>
                                </div>
                                
                          </div>
                          <div class="col-lg-6">

                            <!-- ENTRADA PARA LA DESCRIPCION -->
                             <span style="font-weight: bold">Descripción</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarDescripcion" placeholder="Descripción" id="editarDescripcion" style="text-transform: uppercase;">
                                <input type="hidden" class="form-control input-lg" name="editarRutaFactura" id="editarRutaFactura">
                                <input type="hidden" class="form-control input-lg" name="editarRutaXml" id="editarRutaXml">
                                
                              </div>

                          </div>
                          <div class="col-lg-3">

                            <!-- ENTRADA PARA EL IMPORTE DEL GASTO -->
                             <span style="font-weight: bold">Importe Gasto</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarImporteGasto" placeholder="0.00" id="editarImporteGasto">
                                
                              </div>

                          </div>
                          
                        </div>

                        <br>
                        
                        <div class="row">
                         
                          <div class="col-lg-3">

                            <!-- ENTRADA PARA Cliente / Proveedor / Acreedor-->
                             <span style="font-weight: bold">Proveedor</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarAcreedor" placeholder="Proveedor" id="editarAcreedor" style="text-transform: uppercase;">
                                
                              </div>

                          </div>
                          <div class="col-lg-3" id="divNumeroDocumento">

                            <!-- ENTRADA PARA NUMERO DE FACTURA-->
                             <span style="font-weight: bold">N° Factura</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarNumeroDocumento" placeholder="Factura" id="editarNumeroDocumento" required onblur ="validarFactura()" style="text-transform: uppercase;">
                                
                              </div>

                          </div>
                          
                            <div class="col-lg-3">

                            <!-- ENTRADA PARA SELECCIONAR SI TIENE IVA-->
                             <span style="font-weight: bold">Elegir Si Tiene Iva</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                                <select class="form-control" name="editarTieneIva" id="editarTieneIva" required>
                                  
                                  <option value="">Elegir Opción</option>

                                  <option value="Si">Si</option>
                                  <option value="No">No</option>
                                  
                                </select>
                                
                              </div>

                          </div>
                          <div class="col-lg-3">

                            <!-- ENTRADA PARA SELECCIONAR SI TIENE RETENCIONES-->
                             <span style="font-weight: bold">Elegir Si Tiene Retenciones</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                                <select class="form-control" name="editarTieneRetenciones" id="editarTieneRetenciones" required>
                                  
                                  <option value="">Elegir Opción</option>

                                  <option value="01">Si</option>
                                  <option value="0">No</option>
                                  
                                </select>
                                
                              </div>

                          </div>
                          
                        </div>
                        <br>
                        <div class="row">
                         <div class="contenido2"  style="display: none;" id="div_01" name="div_01">
                              <div class="row">
                                <div class="col-lg-3">
                                  <!-- CALCULAR RETENCIONES -->
                                   <span style="font-weight: bold">Tipo de Retención</span>
                                    <div class="input-group">
                              
                                      <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                                      <select class="form-control" name="editarTipoRetencion" id="editarTipoRetencion">
                                        
                                        <option value="" selected>Elegir Opción</option>

                                        <option value="Arrendamiento">Arrendamiento</option>
                                        <option value="Flete">Flete</option>
                                        <option value="Honorarios">Honorarios</option>
                                        
                                      </select>

                                    </div>
                                  </div>
                                  <div class="col-lg-3">
                                      <!-- IMPORTE -->
                                      <span style="font-weight: bold">Importe</span>
                                         <div class="input-group">
                          
                                          <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                                        <input type="text" class="form-control input-lg" name="editarImporteRetenciones" placeholder="Importe" id="editarImporteRetenciones">

                                        </div>
                                  </div> 
                                </div>
                               
                                                         
                              
                            </div>
                            <div id= "divAlertaValidacion" class="alert alert-warning alert-dismissible" role="alert" style="display: none">
                                <span id="mensajeValidacion"></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div id= "divAlertaValidacionFolio" class="alert alert-warning alert-dismissible" role="alert" style="display: none">
                                <span id="mensajeValidacionFolio"></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                            <div class="col-lg-3 col-md-3 col-sm-3" id="divFolioFiscal">
                              
                              <!-- ENTRADA PARA FOLIO FISCAL-->
                              <span style="font-weight: bold">Folio Fiscal</span>
                              <div class="input-group">
                      
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <input type="text" class="form-control input-lg" name="editarFolioFiscal" placeholder="Ingresar Folio Fiscal" id="editarFolioFiscal" onblur="validarFolioFiscal()">
                                
                              </div>
                            
                            </div>
                             <div id="divArchivosGasto">
                              <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                  <span style="font-weight: bold">Factura</span>
                                  <div class="input-group">
                                    <input id="facturaGasto" type="file" name="facturaGasto" onchange="return fileValidationFactura()">
                                  </div>
                                </div>
                                
                              </div>
                              
                              <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                  <span style="font-weight: bold">Xml</span>
                                  <div class="input-group">
                                    <input id="xmlGasto" type="file" name="xmlGasto" onchange="return fileValidationXml()">
                                  </div>
                                </div>
                                
                              </div>
                               
                             </div>

                        </div>
                        
                        
                      </div>
                     

                    </div>


                  </div>

                </div>


                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                  <button type="button" class="btn btn-default pull-left minimizarGastos" data-dismiss="modal">Salir</button>
                  <button type="submit" class="btn btn-primary" id="btnGuardarGastos" style="display: none">Guardar</button>
                  <button type="button" class="btn btn-primary" id="btnGuardarGasto">Guardar</button>

                </div>
                
                <?php

                $editarDatos = new ControladorFacturasTiendas();
                $editarDatos -> ctrEditarGasto();

                ?>

              </form>

            </div>

          </div>

        </div>

      </div>

    </div>

  
  </section>

</div>

<script type="text/javascript">

       $(document).ready(function() {
          $('.js-example-basic-single').select2();
      });

    $(document).ready(function() {
        $('.datepick').datetimepicker({
          format: 'DD/MM/YYYY',
          ignoreReadonly: true
        });
      });
    $(document).ready(function(){
                $(".contenido2").hide();
                $("#tieneRetenciones").change(function(){
                $(".contenido2").hide();
                    $("#div_" + $(this).val()).show();
                });
                $("#editarTieneRetenciones").change(function(){
                $(".contenido2").hide();
                    $("#div_" + $(this).val()).show();
                });
            });

    function fileValidationFactura(){
    var fileInput = document.getElementById('facturaGasto');
    var filePath = fileInput.value;
    var allowedExtensions = /(.pdf)$/i;
          if(!allowedExtensions.exec(filePath)){
                swal({

                  type: "error",
                  title: "¡Solo se permiten archivos PDF.!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"

                }).then(function(result){

                  if(result.value){
                  
                   

                  }

                });

              fileInput.value = '';
              return false;
          }
      };
      function fileValidationXml(){
      var fileInput = document.getElementById('xmlGasto');
      var filePath = fileInput.value;
      var allowedExtensions = /(.xml)$/i;
            if(!allowedExtensions.exec(filePath)){
                  swal({

                    type: "error",
                    title: "¡Solo se permiten archivos XML .!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                  }).then(function(result){

                    if(result.value){
                    
                     

                    }

                  });

                fileInput.value = '';
                return false;
            }
        }

    </script>
   