<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Contabilidad" || $_SESSION["perfil"] == "Compras"){

    if (isset($_SESSION["user_id"]) == true && $_SESSION['googleVerifyCode'] == true) {
      
      
    }else{

      echo "<script> window.location = 'acceso6278'; </script>";

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
      
      BANCO 6278
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">BANCO 6278</li>
    
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
                echo '
                <button class="respaldo btn btn-warning" id="respaldo" name="respaldo" onclick="respaldo()"><i class="fa fa-database" aria-hidden="true"></i>Reporte</button>';

                   echo '<a href="vistas/modulos/reportes.php?reporteBancosGeneral=banco6278">

                  <button class="report btn btn-warning" id="report" name="report"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte General</button>

                </a>';

              }else if($_SESSION["perfil"] == "Credito y Cobranza"){

                echo '<div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="col-md-1">

                    <a href="vistas/modulos/reportes.php?reporteBancosCredito=banco6278">

                    <button class="report btn btn-info" id="report" name="report" onclick="myFunction()" disabled><i class="fa fa-file-excel-o" aria-hidden="true"></i>Reporte</button>

                    </a>
                  </div>
                  <div class="col-md-3">';

                    if (isset($_POST["fechaIni"])) {
                      echo '<a href="vistas/modulos/reportes.php?bancoRangoFechasCredito=banco6278&fechaInicioF='.date('Y-m-d', strtotime($_POST["fechaIni"])).'&fechaFinalF='.date('Y-m-d', strtotime($_POST["fechaFin"])).'">

                        <button class="report btn btn-info" id="reportRangoF" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Reporte Rango de Fechas</button>

                      </a>';
                      
                    }else{
                      echo '<a href="vistas/modulos/reportes.php?bancoRangoFechasCredito=banco6278">

                        <button class="report btn btn-info" id="reportRangoF" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Reporte Rango de Fechas</button>

                      </a>';
                    }

                  echo '</div>
                  <div class="col-lg-8" >
                    <form action="banco6278Credito" method="POST">
                      <div class="col-lg-3">'?>
                        <?php
                          if (isset($_POST["fechaIni"])) {
                            echo '<input type="date" id="fechaIni" name="fechaIni" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaIni"])).'" required>';

                            echo '<input type="date" id="fechaFin" name="fechaFin" class="form-control" placeholder="Fecha" value="'.date('Y-m-d', strtotime($_POST["fechaFin"])).'" required>';
                                       
                          }else {

                            echo '<input type="date" id="fechaIni" name="fechaIni" class="form-control" placeholder="Fecha" required>';

                            echo '<input type="date" id="fechaFin" name="fechaFin" class="form-control" placeholder="Fecha" required>';

                        }

                      echo'</div>

                      <div class="col-lg-2" >
                        <input type="submit" class="btn btn-info" value="BUSCAR">
                      </div>
                    </form>
                  </div>
                </div>';

              }
              
            }else{


              echo '
              <a href="vistas/modulos/reportes.php?reporteBancosEdicion=banco6278">

                <button class="report btn btn-success" id="reporte" name="reporte"><i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
              </a>
              <button class="respaldo btn btn-warning" id="respaldo" name="respaldo" onclick="respaldo()"><i class="fa fa-database" aria-hidden="true"></i>Respaldo</button>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#list-archive">
                LISTA DE RESPALDOS
              </button>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#restauracion">
                Restaurar Datos
              </button>';?>

            <?php

              if (isset($_POST["fechaIni"])) {
                echo '<a href="vistas/modulos/reportes.php?bancoRangoFechas=banco6278&fechaInicioF='.date('Y-m-d', strtotime($_POST["fechaIni"])).'&fechaFinalF='.date('Y-m-d', strtotime($_POST["fechaFin"])).'">

                <button class="report btn btn-info" id="reportRangoF" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Reporte Rango de Fechas</button>

              </a>';
              }else{
                echo '<a href="vistas/modulos/reportes.php?bancoRangoFechas=banco6278&fechaInicioF='.date('Y-m-d').'&fechaFinalF='.date('Y-m-d').'">

                    <button class="report btn btn-info" id="reportRangoF" name="report" onclick="myFunction()"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Reporte Rango de Fechas</button>

                  </a>';
              }              
            }

          ?>
        </div> 
        <br>
        
         
        
        <br>
        <table class="table-bordered table-striped dt-responsive tablaBanco6278Credito" width="100%" id="banco6278credito" style="border: 2px solid #187092">
         
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

        </table>
      </div>

    </div>

  
  </section>

</div>

<?php 

$item = null;
$valor = null;
$banco6278Valores = ControladorBanco6278::ctrMostrarBanco($item, $valor);

foreach ($banco6278Valores as $key => $value4) {
      
      if ($_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Compras") {
          
          echo '<script>
              $(document).ready(function(){
                $("#editDescripcion").hide();
                $("#editCargo").hide();
                $("#editSaldo").hide();
                
            });
              

          </script>';
      }
}

 ?>
 <!--=============================================
=  MODAL IDENTIFICACION DE FACTURAS PENDIENTES =
=============================================-->

<div class="modal fade" id="modalIdentificarDocumentosPendientes" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document" style="width: 80%;">
            <div class="modal-content">
              <div class="modal-header" style="background:#001f3f;color: white">
                <h3 class="modal-title" id="exampleModalLabel">Vincular Facturas</h3>

                <button type="button" class="close btnCerrarFacturasPendientes" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color:white">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="row">
                       <div class="alert alert-danger" role="alert" id="fracaso" style="display: none;opacity: 0.7">
                          Elegir Una Factura A Vincular!!!!
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert" role="alert" id="exito" style="display: none;opacity:1;background: white">
                          <center><span id='statusProceso'></span></center>
                          <center><i class="fa fa-spin fa-spinner fa-5x" aria-hidden="true" style="color: blue"></i></center>
                           
                        </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                          <h3>Total Abono: &nbsp;&nbsp;&nbsp;<span id="abonoBanco" style="color: blue;font-weight: bold;font-size: 18px;"></span></h3>
                          <input type="hidden" name="abonoBancoTotal" id="abonoBancoTotal">
                          <input type="hidden" name="idMovimientoBanco" id="idMovimientoBanco">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <h3>Total Depósito: &nbsp;&nbsp;&nbsp;<span id="abonoFacturas" style="color: blue;font-weight: bold;font-size: 18px;"></span></h3> 
                        </div>
                       
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <button type="button" class="btn btn-success" id="btnLigarFacturasPendientesCredito">Guardar</button>
                        </div>
                  </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <small>Nota: Elegir que factura se vincula con el depósito.</small>
                      <div id="listaFacturas"></div>
                       <table class="table-bordered table-striped dt-responsive tablaPendientesCredito" width="100%" id="pendientesCredito" style="border: 2px solid #001f3f">
                 
                        <thead style="background:#001f3f;color: white">
                         
                         <tr style="">
                           <th style="border:none">Serie</th>
                           <th style="border:none">Folio</th>
                           <th style="border:none">Fecha Factura</th>
                           <th style="border:none">Cliente</th>
                           <th style="border:none">Total</th>
                           <th style="border:none;color:red">Modificar <i class="fa fa-arrow-down" style="color:red"></i></th>
                           <th style="border:none"></th>
                         </tr> 

                        </thead>
                      </table>
                    </div>
                  </div>
                  
                      
                </div>
     
              </div>
              <br>
              <div class="modal-footer">
          
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="button" class="btn btn-primary btnCerrarFacturasPendientes" data-dismiss="modal">Cerrar</button>
                      </div>
                  </div>   
                   
              </div>
            </div>
          </div>
        </div>

<!--=====  MODAL IDENTIFICACION DE FACTURAS PENDIENTES  ======-->
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
                    <div class="col-lg-12" style="display: none;">
                      
                        <div class="input-group">
                        <input type="text" class="form-control input-lg" id="editarIdBanco" name="editarIdBanco" readonly style="border: none;background: white">
                        </div>
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
                  <div class="col-lg-3" id="editCargo">

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
                  <div class="col-lg-3" id="editSaldo">

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
                     <span style="font-weight: bold">Número de Documento</span>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                      <!-- ENTRADA PARA NUMERO DE DOCUMENTO-->
                    
                      <div class="input-group">
              
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                        <input type="text" class="form-control input-lg" name="editarNumeroDocumento" placeholder="Número de Documento" id="editarNumeroDocumento">
                        <input type="hidden" name="idBanco" id="idBanco">
                        
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                      <a href="#modalIdentificarDocumentosPendientes" role="button" class="btn btn-success" data-toggle="modal" id="vincularPendientesCredito"><i class='fa fa-chain-broken' aria-hidden='true'></i></a>
                      
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

        $editarDatos = new ControladorBanco6278();
        $editarDatos -> ctrEditarDatos6278();

        $registroBitacora =  new ControladorBanco6278();
        $registroBitacora -> ctrRegistroBitacora(); 

                $calcularImporteImportacion =  new ControladorBanco6278();
                $calcularImporteImportacion -> ctrCalcularImporteImportacion();

                $calcularImporteParciales = new ControladorBanco6278();
                $calcularImporteParciales -> ctrCalcularImporteParciales();

                $calcularIvaImportacion = new ControladorBanco6278();
                $calcularIvaImportacion -> ctrCalcularIvaImportacion();

                $calcularIvaArrendamientoImportacion = new ControladorBanco6278();
                $calcularIvaArrendamientoImportacion -> ctrCalcularIva1Importacion();

                $calcularIsrArrendamientoImportacion = new ControladorBanco6278();
                $calcularIsrArrendamientoImportacion -> ctrCalcularIsr1Importacion();

                $calcularIvaFleteImportacion = new ControladorBanco6278();
                $calcularIvaFleteImportacion -> ctrCalcularIva2Importacion();

                $calcularIsrFleteImportacion = new ControladorBanco6278();
                $calcularIsrFleteImportacion -> ctrCalcularIsr2Importacion();

                $calcularIvaHonorariosImportacion = new ControladorBanco6278();
                $calcularIvaHonorariosImportacion -> ctrCalcularIva3Importacion();

                $calcularIsrHonorariosImportacion = new ControladorBanco6278();
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

    <script type="text/javascript">

      function myFunction(){
        $.ajax({
        url: "bitacora.php",
        method: "GET",
        async: false,
        data: {funcion: "funcion5"},
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
          data: {funcion: "funcion6"},
          dataType: "json",
          success: function(respuesta){

          }
        })
      }

            // In your Javascript (external .js resource or <script> tag)
          $(document).ready(function() {
              $('.js-example-basic-single').select2({
                 placeholder: "Seleccionar subgrupo",
                  allowClear: true,
                  tags: true
              });
          });

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
    <script type="text/javascript">
    (function($, window) {
    'use strict';

    var MultiModal = function(element) {
        this.$element = $(element);
        this.modalCount = 0;
    };

    MultiModal.BASE_ZINDEX = 1040;

    MultiModal.prototype.show = function(target) {
        var that = this;
        var $target = $(target);
        var modalIndex = that.modalCount++;

        $target.css('z-index', MultiModal.BASE_ZINDEX + (modalIndex * 20) + 10);

        // Bootstrap triggers the show event at the beginning of the show function and before
        // the modal backdrop element has been created. The timeout here allows the modal
        // show function to complete, after which the modal backdrop will have been created
        // and appended to the DOM.
        window.setTimeout(function() {
            // we only want one backdrop; hide any extras
            if(modalIndex > 0)
                $('.modal-backdrop').not(':first').addClass('hidden');

            that.adjustBackdrop();
        });
    };

    MultiModal.prototype.hidden = function(target) {
        this.modalCount--;

        if(this.modalCount) {
           this.adjustBackdrop();

            // bootstrap removes the modal-open class when a modal is closed; add it back
            $('body').addClass('modal-open');
        }
    };

    MultiModal.prototype.adjustBackdrop = function() {
        var modalIndex = this.modalCount - 1;
        $('.modal-backdrop:first').css('z-index', MultiModal.BASE_ZINDEX + (modalIndex * 20));
    };

    function Plugin(method, target) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('multi-modal-plugin');

            if(!data)
                $this.data('multi-modal-plugin', (data = new MultiModal(this)));

            if(method)
                data[method](target);
        });
    }

    $.fn.multiModal = Plugin;
    $.fn.multiModal.Constructor = MultiModal;

    $(document).on('show.bs.modal', function(e) {
        $(document).multiModal('show', e.target);
    });

    $(document).on('hidden.bs.modal', function(e) {
        $(document).multiModal('hidden', e.target);
    });
}(jQuery, window));

  </script>
    
