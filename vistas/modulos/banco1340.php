<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Contabilidad" || $_SESSION["perfil"] == "Compras"){

    if (isset($_SESSION["user_id"]) == true && $_SESSION['googleVerifyCode'] == true) {
      
      
    }else{

      echo "<script> window.location = 'acceso1340'; </script>";

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
      
      BANCO 1340
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">BANCO 1340</li>
    
    </ol>

  </section>

  <section class="content">

      <div class="box">

          <p style="font-weight: bold">Nota: Si desea utilizar atajos, usar los siguientes.</p>
        <p>Comandos:</p>
        <small style="font-size: 15px"><strong>CTRL X:</strong> Buscar archivo a importar.</small>
        <small style="font-size: 15px"><strong>CTRL Z:</strong> Abrir movimiento a editar.</small>
        <small style="font-size: 15px"><strong>ESC:</strong> Minimizar.</small>
        <small style="font-size: 15px"><strong>CTRL B:</strong> Buscar movimiento.</small>

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

          
          <?php 
          
            if ($_SESSION["grupo"] == "Visualizador" || $_SESSION["perfil"] == "Generador de Reportes" || $_SESSION["perfil"] == "Contabilidad" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Compras") {
              

          if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {
            echo '<a href="vistas/modulos/reportes.php?reporteBancos=banco1340">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>
          </a>
          <button class="respaldo btn btn-warning" id="respaldo" name="respaldo" onclick="respaldo()"><i class="fa fa-database" aria-hidden="true"></i>Reporte</button>';
          }else if($_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Compras"){

              echo '<a href="vistas/modulos/reportes.php?reporteBancosCredito=banco1340">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';

          }else if($_SESSION["perfil"] == "Contabilidad"){

              echo '<a href="vistas/modulos/reportes.php?reporteBancos=banco1340">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>';

          }
          
              
            }else{


              echo '
            <a href="vistas/modulos/reportes.php?reporteBancos=banco1340">

            <button class="report btn btn-info" id="report" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

          </a>
          <a href="vistas/modulos/reportes.php?reporteBancosEdicion=banco1340">

            <button class="report btn btn-success" id="reporte" name="reporte"><i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
          </a>
          <button class="respaldo btn btn-warning" id="respaldo" name="respaldo" onclick="respaldo()"><i class="fa fa-database" aria-hidden="true"></i>Respaldo</button>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#list-archive">
            LISTA DE RESPALDOS
          </button>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#restauracion">
            Restaurar Datos
          </button> ';
            }

          ?>
          

        </div> 
        <br>
        <?php

        if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {
          
            echo '<div class="">
          <div class="row">
            <form action="import1340.php" method="post" enctype="multipart/form-data" id="import_form">
              <div class="col-md-4">
                <input type="file" name="file" id="inputFile"/>
              </div>
              <div class="col-md-2">
                <input type="submit" class="btn btn-success" name="import_data" onclick="agregar()" value="IMPORTAR DATOS">
              </div>';

              ?>
             <?php 
                //$calcularFolioImportacion =  new ControladorBanco1340();
                //$calcularFolioImportacion -> ctrCalcularFolioImportacion();

                $comprobacionImportacion =  new ControladorBanco1340();
                $comprobacionImportacion -> ctrCalcularComprobacionImportacion();

                $calcularDiferenciaImportacion = new ControladorBanco1340();
                $calcularDiferenciaImportacion -> ctrCalcularDiferenciaImportacion();

           echo '</form>
          </div>
        </div>';

        }
        
        ?>

        <br>
        <!--
             <div class="container">
              <h5>Búsqueda por rango de fechas</h5>
              <div class="row">
               <div class="col-lg-12" style="margin-left: -50px">
                <div class="col-lg-3">
                 <input type="text" name="start_date" id="start_date" class="form-control" placeholder="fecha inicial" required="true" />
                </div>
                <div class="col-lg-3">
                 <input type="text" name="end_date" id="end_date" class="form-control" placeholder="fecha final"  required="true"/>
                </div>
               </div>
               <br>
               <br>
               <div class="col-lg-12">
               
                  <div class="col-lg-3">
                      <input type="button" name="search" id="search" value="Filtrar" class="btn btn-info" />
                      <input type="button" name="reiniciar" id="reiniciar" value="Recargar" class="btn btn-info" />
                     
                  </div>
                   <button class="btn btn-info" id="generarReporte" data-toggle="modal" data-target="#reporteFiltrado">Generar Reporte</button>
                   
               </div>
              </div>
             </div>
          -->
       <!--
        <form action="actualizarFechas.php" method="post" id="importacion" name="importacion">
            <div class="col-lg-3">
              <input type="submit" name="actualizar" id="actualizar" value="RECALCULAR">
            </div>
          </form>
        -->
        
        <br />
        <?php
          if ($_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Contabilidad") {
                  
            echo '<table class="table-bordered table-striped dt-responsive tablaBanco1340" width="100%" id="banco1340"  style="border: 2px solid #187092">
         
          <thead style="background:#187092;color: white">
           
           <tr style="">
             <th style="width:20px;height: 40px;border:none">N°</th>
             <th style="border:none">Departamento</th>
             <th style="border:none">Grupo</th>
             <th style="border:none">Subgrupo</th>
             <th style="border:none">Mes</th>
             <th style="border:none">Fecha</th>
             <th style="border:none">Descripción</th>
             <th style="border:none">Cargo</th>
             <th style="border:none">Abono</th>
             <th style="border:none">Saldo</th>
             <th style="border:none">Comprobación</th>
             <th style="border:none">Diferencia</th>
             <th style="border:none">Parcial</th>
             <th style="border:none">Serie</th>
             <th style="border:none">Folio</th>
             <th style="border:none">Numero de Movimiento</th>
             <th style="border:none">Cliente / Proveedor / Acreedor</th>
             <th style="border:none">Concepto</th>
             <th style="border:none">Número Documento</th>
             <th style="border:none">Importe</th>
             <th style="border:none">IVA</th>
             <th style="border:none">Retención IVA Arrendamiento</th>
             <th style="border:none">Retencion ISR Arrendamiento</th>
             <th style="border:none">Retención IVA Flete</th>
             <th style="border:none">Retencion ISR Flete</th>
             <th style="border:none">Retención IVA Honorarios</th>
             <th style="border:none">Retencion ISR Honorarios</th>
             <th style="border:none">Acciones</th>

           </tr> 

          </thead> 
        </table>';
          }else if($_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Compras"){

            echo '<table class="table-bordered table-striped dt-responsive tablaBanco1340Credito" width="100%" id="banco1340credito" style="border: 2px solid #187092">
         
          <thead style="background:#187092;color: white">
           
           <tr style="">
             <th style="width:20px;height: 40px;border:none;">N°</th>
             <th style="border:none">Departamento</th>
             <th style="border:none">Grupo</th>
             <th style="border:none">Subgrupo</th>
             <th style="border:none">Mes</th>
             <th style="border:none">Fecha</th>
             <th style="border:none">Descripción</th>
             <th style="border:none">Abono</th>
             <th style="border:none">Parcial</th>
             <th style="border:none">Serie</th>
             <th style="border:none">Folio</th>
             <th style="border:none">Numero de Movimiento</th>
             <th style="border:none">Cliente / Proveedor / Acreedor</th>
             <th style="border:none">Concepto</th>
             <th style="border:none">Número Documento</th>
             <th style="border:none">Importe</th>
             <th style="border:none">IVA</th>
             <th style="border:none">Acciones</th>

           </tr> 

          </thead>
        </table>';

          }
        ?>

      </div>

    </div>

  
  </section>

</div>

<!--=====================================
MODAL EDITAR DATOS
======================================-->

<div id="modalEditarDatos" class="modal fade" role="dialog"  >
  
  <div class="modal-dialog" style="width: 80%;">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#187092;color: white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <div class="container col-lg-12">
                <div class="row" >
                    <div class="col-lg-12" style="display: none;">
                      
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="cantidadParciales" name="cantidadParciales" readonly style="border: none;background: white">
                        </div>
                    </div>
                   </div>
                    <div class="col-lg-12" style="display: none;">
                      
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="editarIdBanco" name="editarIdBanco" readonly style="border: none;background: white">
                        </div>
                    </div>
                <div class="row">
                  <div class="col-lg-3">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamento" id="editarDepartamento" required="true">
                          
                          <option value="" id="editarDepartamento">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="RUTAS">RUTAS</option>
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
                          <option value="MAYOREO">MAYOREO</option>
                        </select>

                      </div>
                  </div>
                  <div class="col-lg-3">
                     <!-- ENTRADA PARA SELECCIONAR EL GRUPO -->
                      <span style="font-weight: bold">Grupo</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarGrupo" id="editarGrupo" required="true">
                          
                          <option value="" id="editarGrupo">Elegir Grupo</option>

                          <option value="EGRESOS">EGRESOS</option>
                          <option value="INGRESOS">INGRESOS</option>
                          
                        </select>

                      </div>
                  </div>
                  <div class="col-lg-3">
                     <!-- ENTRADA PARA SELECCIONAR EL SUBGRUPO -->
                      <span style="font-weight: bold">Subgrupo</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                          <select class="js-example-basic-single" name="editarSubgrupo" id="editarSubgrupo" required="true" style="width: 220px">


                                    <option value="" id="editarSubgrupo">Elegir Subgrupo</option>
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

                        <select class="form-control" name="editarMes" id="editarMes" required="true">
                          
                          <option value="" id="editarMes">Elegir Mes</option>

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
                    <!-- ENTRADA PARA FECHA -->
                     <span style="font-weight: bold">Fecha</span>
                       <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarFecha" id="editarFecha" readonly>
                        
                      </div>
                        

                  </div>
                  <div class="col-lg-6">

                    <!-- ENTRADA PARA LA DESCRIPCION -->
                     <span style="font-weight: bold">Descripción</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" readonly>
                        
                      </div>

                  </div>
                  <div class="col-lg-3">

                    <!-- ENTRADA PARA EL CARGO -->
                     <span style="font-weight: bold">Cargo</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarCargo" placeholder="0.00" id="editarCargo" readonly>
                        
                      </div>

                  </div>
                  
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-3">

                    <!-- ENTRADA PARA EL ABONO -->
                     <span style="font-weight: bold">Abono</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarAbono" placeholder="0.00" id="editarAbono" readonly>
                        
                      </div>

                  </div>
                  <div class="col-lg-3">

                    <!-- ENTRADA PARA EL SALDO -->
                     <span style="font-weight: bold">Saldo</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarSaldo" placeholder="0.00" id="editarSaldo" readonly>
                        
                      </div>

                  </div>
                  <div class="col-lg-2">

                    <!-- ENTRADA PARA LA SERIE-->
                     <span style="font-weight: bold">Serie</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarSerie" id="editarSerie" placeholder="Serie">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">

                    <!-- ENTRADA PARA EL FOLIO-->
                     <span style="font-weight: bold">Folio</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarFolio" id="editarFolio" placeholder="Folio">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA PARCIALES -->
                     <span style="font-weight: bold">Número de Parciales</span>
                      <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-hashtag"></i></span> 
                        <select class="form-control" onchange="editarParcialesOnChange(this)" id="editarParciales" name="editarParciales">
                          <option value="0" id="editarParciales">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>

                          
                        </select>

                      </div>
                  </div>
                  
                </div>
                <div class="row">
                <div id="1P" style="display:none">
                  <div class="col-lg-2" >

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial" placeholder="0.00" id="editarParcial">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial1" id="editarDepartamentoParcial1">
                          
                          <option value="" id="editarDepartamentoParcial1">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>
                  <div id="2P" style="display: none">
                  <div class="col-lg-2" >

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial2" placeholder="0.00" id="editarParcial2">
                        
                      </div>

                    </div>
                    <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial2" id="editarDepartamentoParcial2">
                          
                          <option value="" id="editarDepartamentoParcial2">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>
                  <div  id="3P" style="display: none">
                   <div class="col-lg-2">

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial3" placeholder="0.00" id="editarParcial3">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial3" id="editarDepartamentoParcial3">
                          
                          <option value="" id="editarDepartamentoParcial3">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>

                </div>
                <br>
                <div class="row">
                  <div id="4P" style="display: none">
                   <div class="col-lg-2" >

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial4" placeholder="0.00" id="editarParcial4">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial4" id="editarDepartamentoParcial4">
                          
                          <option value="" id="editarDepartamentoParcial4">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>
                  <div id="5P" style="display: none">
                    <div class="col-lg-2" >

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial5" placeholder="0.00" id="editarParcial5">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial5" id="editarDepartamentoParcial5">
                          
                          <option value="" id="editarDepartamentoParcial5">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                    </div>
                    <div id="6P" style="display: none">
                   <div class="col-lg-2">

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial6" placeholder="0.00" id="editarParcial6">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial6" id="editarDepartamentoParcial6">
                          
                          <option value="" id="editarDepartamentoParcial6">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>

                </div>
                <br>
                <div class="row">
                  <div id="7P" style="display: none">
                  <div class="col-lg-2">

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial7" placeholder="0.00" id="editarParcial7">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial7" id="editarDepartamentoParcial7">
                          
                          <option value="" id="editarDepartamentoParcial7">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>
                  <div id="8P" style="display: none">
                  <div class="col-lg-2">

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial8" placeholder="0.00" id="editarParcial8">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial8" id="editarDepartamentoParcial8">
                          
                          <option value="" id="editarDepartamentoParcial8">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>
                  <div id="9P" style="display: none">
                  <div class="col-lg-2">

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial9" placeholder="0.00" id="editarParcial9">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial9" id="editarDepartamentoParcial9">
                          
                          <option value="" id="editarDepartamentoParcial9">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>
                </div>
                <br>
                <div class="row">
                  <div id="10P" style="display: none">
                  <div class="col-lg-2">

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial10" placeholder="0.00" id="editarParcial10">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial10" id="editarDepartamentoParcial10">
                          
                          <option value="" id="editarDepartamentoParcial10">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>
                  <div id="11P" style="display: none">
                  <div class="col-lg-2">

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial11" placeholder="0.00" id="editarParcial11">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial11" id="editarDepartamentoParcial11">
                          
                          <option value="" id="editarDepartamentoParcial11">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>
                  <div id="12P" style="display: none">
                  <div class="col-lg-2">

                    <!-- ENTRADA PARA EL PARCIAL -->
                     <span style="font-weight: bold">Parcial</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarParcial12" placeholder="0.00" id="editarParcial12">
                        
                      </div>

                  </div>
                  <div class="col-lg-2">
                     <!-- ENTRADA PARA SELECCIONAR EL DEPARTAMENTO -->
                      <span style="font-weight: bold">Departamento</span>
                     <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <select class="form-control" name="editarDepartamentoParcial12" id="editarDepartamentoParcial12">
                          
                          <option value="" id="editarDepartamentoParcial12">Elegir Departamento</option>

                          <option value="ADMINISTRACION">ADMINISTRACION</option>
                          <option value="DESGLOSE">DESGLOSE</option>
                          <option value="RUTAS">RUTAS</option>
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
                  </div>
                </div>
                <br>
                <div class="row">
                  
                  <div class="col-lg-3">
                  
                    <!-- ENTRADA PARA Cliente / Proveedor / Acreedor-->
                    
                     <span style="font-weight: bold">Cliente / Proveedor / Acreedor</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <!--
                        <select class="listaClientes" id="editarAcreedor" name="editarAcreedor" required="true" style="width: 220px">

                          <option></option>
                                
                        </select>
                        -->
                         <input type="text" class="form-control input-lg" name="editarAcreedor" placeholder="Cliente / Proveedor / Acreedor" id="editarAcreedor">
                        
                      </div>

                  </div>
              
                  
                  <div class="col-lg-3">

                    <!-- ENTRADA PARA CONCEPTO-->
                     <span style="font-weight: bold">Concepto</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarConcepto" placeholder="Concepto" id="editarConcepto">
                        
                      </div>

                  </div>
                  <div class="col-lg-3">

                    <!-- ENTRADA PARA NUMERO DE DOCUMENTO-->
                     <span style="font-weight: bold">Número de Documento</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarNumeroDocumento" placeholder="Número de Documento" id="editarNumeroDocumento">
                        <input type="hidden" name="idBanco" id="idBanco">
                        
                      </div>

                  </div>
                  <div class="col-lg-3">

                    <!-- ENTRADA PARA SELECCIONAR SI TIENE IVA-->
                     <span style="font-weight: bold">Elegir Si Tiene Iva</span>
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                        <select class="form-control" name="editarTieneIva" id="editarTieneIva" required>
                          
                          <option value="" id="editarTieneIva">Elegir Opción</option>

                          <option value="Si">Si</option>
                          <option value="No">No</option>
                          
                        </select>
                        
                      </div>

                  </div>
                
                  
                </div>
                <br>
                <div class="row">
                  
                    <div class="col-lg-3">

                      <!-- ENTRADA PARA SELECCIONAR SI TIENE RETENCIONES-->
                       <span style="font-weight: bold">Elegir Si Tiene Retenciones</span>
                        <div class="input-group">
                
                          <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                          <select class="form-control" name="editarTieneRetenciones" id="editarTieneRetenciones" required>
                            
                            <option value="" id="editarTieneRetenciones">Elegir Opción</option>

                            <option value="01">Si</option>
                            <option value="0">No</option>
                            
                          </select>
                          
                        </div>

                    </div>
                    <div class="contenido4"  style="display: none;" id="div_01" name="div_01">
                      <div class="row">
                        <div class="col-lg-3">
                          <!-- CALCULAR RETENCIONES -->
                       <span style="font-weight: bold">Tipo de Retención</span>
                        <div class="input-group">
                  
                          <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                          <select class="form-control" name="editarTipoRetencion" id="editarTipoRetencion">
                            
                            <option value="" id="editarTipoRetencion">Elegir Opción</option>

                            <option value="Arrendamiento">Arrendamiento</option>
                            <option value="Flete">Flete</option>
                            <option value="Honorarios">Honorarios</option>
                            
                          </select>

                        </div>
                        </div>
                        <div class="row">
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
                    </div>
                    <div >
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

                $editarDatos = new ControladorBanco1340();
                $editarDatos -> ctrEditarDatos1340();

                $registroBitacora =  new ControladorBanco1340();
                $registroBitacora -> ctrRegistroBitacora(); 

                $calcularImporteImportacion =  new ControladorBanco1340();
                $calcularImporteImportacion -> ctrCalcularImporteImportacion();

                $calcularImporteParciales = new ControladorBanco1340();
                $calcularImporteParciales -> ctrCalcularImporteParciales();

                $calcularIvaImportacion = new ControladorBanco1340();
                $calcularIvaImportacion -> ctrCalcularIvaImportacion();

                $calcularIvaArrendamientoImportacion = new ControladorBanco1340();
                $calcularIvaArrendamientoImportacion -> ctrCalcularIva1Importacion();

                $calcularIsrArrendamientoImportacion = new ControladorBanco1340();
                $calcularIsrArrendamientoImportacion -> ctrCalcularIsr1Importacion();

                $calcularIvaFleteImportacion = new ControladorBanco1340();
                $calcularIvaFleteImportacion -> ctrCalcularIva2Importacion();

                $calcularIsrFleteImportacion = new ControladorBanco1340();
                $calcularIsrFleteImportacion -> ctrCalcularIsr2Importacion();

                $calcularIvaHonorariosImportacion = new ControladorBanco1340();
                $calcularIvaHonorariosImportacion -> ctrCalcularIva3Importacion();

                $calcularIsrHonorariosImportacion = new ControladorBanco1340();
                $calcularIsrHonorariosImportacion -> ctrCalcularIsr3Importacion();      

                            
       

        ?>

      </form>

    </div>

  </div>

</div>
<!--=====================================
MODAL VER PARCIALES
======================================-->

<!-- Modal -->
<div class="modal fade" id="modalVerParciales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: tomato">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white">Parciales</h4>
      </div>
      <div class="modal-body">
        
        <div class="container col-lg-12">
          <div class="row" >
            <div class="col-lg-12" style="display: none;">
              
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantParciales" name="cantParciales" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-12">
              
                <div class="input-group">
                <span style="font-weight: bold;">Total Parciales</span>
                <input type="text" class="form-control input-lg" id="totalParciales" name="totalParciales" readonly style="border: none;background: white">
                </div>
            </div>
           </div>
           <div class="row">
            <hr style="background: black">
            <div id="1Par" style="display: none;">
              <div class="col-lg-3">
              <span style="font-weight: bold">Parcial 1</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantParcial1" name="cantParcial1" readonly style="border: none;background: white">
                </div>
            </div>
            <div class="col-lg-3">
              <span style="font-weight: bold">Departamento</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantDepartamento1" name="cantDepartamento1" readonly style="border: none;background: white">
                </div>
            </div>
            </div>
            <div id="2Par" style="display: none;">
              <div class="col-lg-3">
              <span style="font-weight: bold">Parcial 2</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantParcial2" name="cantParcial2" readonly style="border: none;background: white">
                </div>
               </div>
               <div class="col-lg-3">
              <span style="font-weight: bold">Departamento</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantDepartamento2" name="cantDepartamento2" readonly style="border: none;background: white">
                </div>
              </div>
            </div>
            <div id="3Par" style="display: none;">
              <div class="col-lg-3">
              <span style="font-weight: bold">Parcial 3</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantParcial3" name="cantParcial3" readonly style="border: none;background: white">
                </div>
            </div>
              <div class="col-lg-3">
              <span style="font-weight: bold">Departamento</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantDepartamento3" name="cantDepartamento3" readonly style="border: none;background: white">
                </div>
              </div>
            </div>
            <div id="4Par" style="display: none;">
              <div class="col-lg-3">
              <span style="font-weight: bold">Parcial 4</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantParcial4" name="cantParcial4" readonly style="border: none;background: white">
                </div>
              </div>
              <div class="col-lg-3">
              <span style="font-weight: bold">Departamento</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantDepartamento4" name="cantDepartamento4" readonly style="border: none;background: white">
                </div>
              </div>
            </div>
            <div id="5Par" style="display: none;">
              <div class="col-lg-3" >
              <span style="font-weight: bold">Parcial 5</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantParcial5" name="cantParcial5" readonly style="border: none;background: white">
                </div>
              </div>
              <div class="col-lg-3">
              <span style="font-weight: bold">Departamento</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantDepartamento5" name="cantDepartamento5" readonly style="border: none;background: white">
                </div>
              </div>
            </div>
            <div id="6Par" style="display: none;">
              <div class="col-lg-3">
              <span style="font-weight: bold">Parcial 6</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantParcial6" name="cantParcial6" readonly style="border: none;background: white">
                </div>
              </div>
              <div class="col-lg-3">
              <span style="font-weight: bold">Departamento</span>
                <div class="input-group">
                <input type="text" class="form-control input-lg" id="cantDepartamento6" name="cantDepartamento6" readonly style="border: none;background: white">
                </div>
              </div>
            </div> 
            <div id="7Par" style="display: none;">
              <div class="col-lg-3">
                <span style="font-weight: bold">Parcial 7</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantParcial7" name="cantParcial7" readonly style="border: none;background: white">
                  </div>
              </div>
               <div class="col-lg-3">
                <span style="font-weight: bold">Departamento</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantDepartamento7" name="cantDepartamento7" readonly style="border: none;background: white">
                  </div>
                </div>
            </div>
            <div id="8Par" style="display: none;">
              <div class="col-lg-3">
                <span style="font-weight: bold">Parcial 8</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantParcial8" name="cantParcial8" readonly style="border: none;background: white">
                  </div>
              </div>
               <div class="col-lg-3">
                <span style="font-weight: bold">Departamento</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantDepartamento8" name="cantDepartamento8" readonly style="border: none;background: white">
                  </div>
                </div>
            </div>
            <div id="9Par" style="display: none;">
              <div class="col-lg-3">
                <span style="font-weight: bold">Parcial 9</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantParcial9" name="cantParcial9" readonly style="border: none;background: white">
                  </div>
              </div>
               <div class="col-lg-3">
                <span style="font-weight: bold">Departamento</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantDepartamento9" name="cantDepartamento9" readonly style="border: none;background: white">
                  </div>
                </div>
            </div>
            <div id="10Par" style="display: none;">
              <div class="col-lg-3">
                <span style="font-weight: bold">Parcial 10</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantParcial10" name="cantParcial10" readonly style="border: none;background: white">
                  </div>
              </div>
               <div class="col-lg-3">
                <span style="font-weight: bold">Departamento</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantDepartamento10" name="cantDepartamento10" readonly style="border: none;background: white">
                  </div>
                </div>
            </div>
            <div id="11Par" style="display: none;">
              <div class="col-lg-3">
                <span style="font-weight: bold">Parcial 11</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantParcial11" name="cantParcial11" readonly style="border: none;background: white">
                  </div>
              </div>
               <div class="col-lg-3">
                <span style="font-weight: bold">Departamento</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantDepartamento11" name="cantDepartamento11" readonly style="border: none;background: white">
                  </div>
                </div>
            </div>
            <div id="12Par" style="display: none;">
              <div class="col-lg-3">
                <span style="font-weight: bold">Parcial 12</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantParcial12" name="cantParcial12" readonly style="border: none;background: white">
                  </div>
              </div>
               <div class="col-lg-3">
                <span style="font-weight: bold">Departamento</span>
                  <div class="input-group">
                  <input type="text" class="form-control input-lg" id="cantDepartamento12" name="cantDepartamento12" readonly style="border: none;background: white">
                  </div>
                </div>
            </div>
              
           </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        
      </div>
    </div>
  </div>
</div>
<!--============================================
  LISTAR EL DIRECTORIO ACTUAL EN EL SISTEMA DE UNA CARPETA EN ESPECIFICO
=============================================-->
<!-- Modal -->
<div class="modal fade" id="list-archive" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#187092;color: white;">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 15px;font-weight: bold">LISTA DE RESPALDOS BANCO1340</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="list-archives" style="overflow: scroll;height: 300px">
            <?php
                function listar_archivos($carpeta){

                    if(is_dir($carpeta)){
                        if($dir = opendir($carpeta)){
                           $total_respaldos = count(glob('Respaldo-Banco1340/{*.gz}',GLOB_BRACE));
                           
                            while(($archivo = readdir($dir)) !== false && $total_respaldos > 0){
                                
                                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                                    //echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'"></a></li>';
                                    echo '<input type="text" value="'.$archivo.'" id="'.$archivo.'" style="width:70%; border:none;" onfocus="clickInput(this)">';
                                   

                                    
                                }
                               
                            }

                            closedir($dir);
                        }
                    }
                }
                 
                echo listar_archivos('Respaldo-Banco1340');
                
                $total_respaldos = count(glob('Respaldo-Banco1340/{*.gz}',GLOB_BRACE));
                echo 'Total de Respaldos:    '.$total_respaldos.'';
                 
            ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>
<!--============================================
  INGRESAR LA DIRECCION DE LA RESTAURACION
=============================================-->
<!-- Modal -->
<div class="modal fade" id="restauracion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#187092;color: white;">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 15px;font-weight: bold">Restaurar Base de Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           
                <p style="font-weight: bold">Ingresar nombre del respaldo con extensión</p>
                <input type="text" name="direccion" id="direccion" class="form-control input-lg">
                <br>
                <button  class="btn btn-info" onclick="restaurar()">Enviar</button>

           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>
<!--============================================
=============================================-->
<!--============================================
  INGRESAR FECHAS DE FILTRO
=============================================-->
<!-- Modal -->
<div class="modal fade" id="reporteFiltrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document" style="width: 50%">
    <div class="modal-content">
      <div class="modal-header" style="background:#187092;color: white;">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 15px;font-weight: bold">Generar Reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           
                <form action="vistas/modulos/reportes/reporte1340.php" method="POST">
                  <div class="container col-lg-12">
                    <div class="row">
                      <div class="col-lg-6">
                      <label>Fecha Inicial</label>
                      <input type="text" class="form-control" id="fechaInicio" name="fechaInicio" placeholder="Fecha Inicio" required="true">
                    </div>
                    <div class="col-lg-6">
                      <label>Fecha Final</label>
                      <input type="text" class="form-control" id="fechaFinal" name="fechaFinal" placeholder="Fecha Final" required="true">
                    </div>
                    </div>
                  </div>
                    
                    <div class="col-lg-3">
                       <input type="submit" class="btn btn-primary" value="Generar">
                       
                    </div>
                    <div class="col-lg-3">
                      <button class="btn btn-primary" onclick="limpiar()">Limpiar</button>
                    </div>
                   
               </form>

           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>
<!--============================================
=============================================-->

<script>
/*
$(document).ready(function(){
                $(".contenido").hide();
                $("#tieneIva").change(function(){
                $(".contenido").hide();
                    $("#div_" + $(this).val()).show();
                });
            });
*/
$(document).ready(function(){
                $(".contenido2").hide();
                $("#tieneRetenciones").change(function(){
                $(".contenido2").hide();
                    $("#div_" + $(this).val()).show();
                });
            });
$(document).ready(function(){
                $(".contenido4").hide();
                $("#editarTieneRetenciones").change(function(){
                $(".contenido4").hide();
                    $("#div_" + $(this).val()).show();
                });
            });
/*
$(document).ready(function(){
                $(".contenido3").hide();
                $("#tipoRetencion").change(function(){
                $(".contenido3").hide();
                    $("#div_" + $(this).val()).show();
                });
            });
$(document).ready(function(){
                $(".contenido4").hide();
                $("#tipoRetencion").change(function(){
                $(".contenido4").hide();
                    $("#div_" + $(this).val()).show();
                });
            });
*/
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $('.datepick').datetimepicker({
    format: 'YYYY-MM-DD',
    ignoreReadonly: true
  });
});
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
                      title: "¡Los datos han sido ingresados correctamente!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"

                    }).then(function(result){

                      if(result.value){
                        
                        window.location = "banco1340";

                      }

                    });
                }else if (valores[index] == "error") {
                  swal({

                        type: "error",
                        title: "¡UPPS! Hubo un error durante la ejecución",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                      }).then(function(result){

                        if(result.value){
                        
                          window.location = "banco1340";

                        }

                      });
                }else if (valores[index] == "invalid_file") {
                      swal({

                        type: "error",
                        title: "¡UPPS!El formato del archivo es inválido",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                      }).then(function(result){

                        if(result.value){
                        
                          window.location = "banco1340";

                        }

                      });
                }
            }
        }else{
            
        }
    }
   
   
    </script>
    <script type="text/javascript">

      function myFunction(){
        $.ajax({
        url: "bitacora.php",
        method: "GET",
        async: false,
        data: {funcion: "funcion29"},
        dataType: "json",
        success: function(respuesta) {
                  //Accion 1
        }
        });
      }

      function agregar(){
        $.ajax({
          url: "bitacora.php",
          method: "GET",
          async: false,
          data: {funcion: "funcion30"},
          dataType: "json",
          success: function(respuesta){

          }
        })
      }
      function respaldo(){
        $.ajax({
          url: "respaldosBancos.php",
          method: "GET",
          async: false,
          data: {funcion: "respaldo1340"},
          dataType: "json",
          success: function(response){
             
          }
        })

        var request = new XMLHttpRequest();

          request.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  console.log(this.responseText);
                  var bool=confirm(this.responseText);
                  if(bool){
                    location.reload();
                  }
              }
          };

          request.open('GET', 'http://dkmatrizz.ddns.net/respaldosBancos.php?funcion=respaldo1340');
          request.send();
          
          
      }
      function restaurar(){
        $.ajax({
          url: "restauracionBancos.php",
          method: "GET",
          async: false,
          data: {funcion: "restauracionBanco1340", direccion: $('input[name="direccion"]').val()},
          dataType: "json",
          success: function(response){

            }
        })
       
        var CustomerNumber = document.getElementById("direccion").value;
        var Url = "http://dkmatrizz.ddns.net/restauracionBancos.php?funcion=restauracionBanco1340&direccion="+CustomerNumber;

              xmlHttp = new XMLHttpRequest(); 
              xmlHttp.onreadystatechange = ProcessRequest;
              xmlHttp.open( "GET", Url, true );
              xmlHttp.send();

              function ProcessRequest() 
          {
              if ( xmlHttp.readyState == 4 && xmlHttp.status == 200 ) 
              {
                  console.log(this.responseText);
                  var bool=confirm(this.responseText);
                  if(bool){
                    location.reload();
                  }                   
              }
          }
      }
  
      function clickInput(){
        $("input[type=text]").focus(function(){    
            this.select();
            return document.execCommand("copy");
          });
        
      }

    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
           placeholder: "Seleccionar subgrupo",
            allowClear: true,
            tags: true
        });
        
    });
    /*
    $(document).ready(function() {
         $('.listaClientes').select2({
        placeholder: 'Seleccionar',
        allowClear: true,
        tags: true,
        ajax: {
          url: 'vistas/modulos/getClientesJson.php',
          dataType: 'json',
          delay: 250,
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
*/



  /*FILTROS DE DATATABLES */
    

  /*FILTROS DE DATATABLES */
    </script>
  <style type="text/css">
    
    /* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
 
    tr { height: 50px; }
  </style>
  <script type="text/javascript">
     jQuery(function($){
           $("#fechaInicio").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
        });
     jQuery(function($){
           $("#fechaFinal").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
        });
     jQuery(function($){
           $("#start_date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
        });
     jQuery(function($){
           $("#end_date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
        });

     function limpiar(){

        $("#fechaInicio").val("");
        $("#fechaFinal").val("");


     }
  </script>
     <script type="text/javascript">
           shortcut.add("Ctrl+X",function() {
                 document.getElementById("inputFile").click();
            });
            shortcut.add("Ctrl+Z",function() {
                 document.getElementById("editarBanco").click();
            });
            shortcut.add("Esc",function() {
                 document.getElementById("minimizar").click();
            });
            shortcut.add("Ctrl+B", function() {
                document.getElementsByTagName("input")[2].focus();
            });
           

    </script>
  
    
