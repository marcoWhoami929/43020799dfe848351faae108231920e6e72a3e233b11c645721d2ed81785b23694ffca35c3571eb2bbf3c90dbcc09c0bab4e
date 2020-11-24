<?php

if($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Contabilidad" || $_SESSION["perfil"] == "Compras" ){



}else {
  echo '<script>

  window.location = "inicio";

  </script>';

}


?>
<style>
  img{
-webkit-transition: all 1s ease;
-moz-transition: all 1s ease;
-ms-transition: all 1s ease;
transition: all 1s ease;
  }
  img:hover {
height: 70%;
width: 100%;
margin-left: -10%;
}
</style>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>Saldos</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Saldos</li>
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
      <br>
       <div class="logi" id="logi">
          <CENTER><h2>CONTROL SALDOS</h2></CENTER>
    </div>
    <br><br>
    </div>


    <div class="box-body">
      <?php
        if ($_SESSION["perfil"] == "Credito y Cobranza" || $_SESSION["perfil"] == "Compras") {

              $tabla = "Credito";
          
        }else{

              $tabla = "";

        }
       

      ?>
      <div class="col-lg-3 col-xs-8">
        <div class="">
            <a href="banco0198" class="btnBancoElegido" banco="banco0198" tabla="<?php echo 'tablaBanco0198'.$tabla ?>"><img src="vistas/img/bancos/Crd_0198.png" alt="" style="width: 90%; height: 60%"></a>
          <div class="alert alert-info alert-dismissable" style="width:90%">
            <div>
            <?php
              $item = null;
              $valor = null;

              $B0198 = ControladorUltimoSaldoBancos::ctrMostrarBanco0198($item, $valor);
              foreach ($B0198 as $key => $value) {
                $saldo0198 = $value["saldo"];
              }

              if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {

                echo "<h4 style='margin-left:10%'>Saldo Actual: $ ".$saldo0198."</h4>";
                
              }else {
                
                echo '';

              }

            

            ?>
            </div>
            <div>
              <?php 
               $item = null;
              $valor = null;

              $B0198UltimaActualizacion = ControladorUltimoSaldoBancos::ctrMostrarUltimaActualizacion0198($item, $valor);

              foreach ($B0198UltimaActualizacion as $key => $value) {
                $actualizacion0198 = $value["fecha"];
              }
              echo "<h5 style='margin-left:-5%'>Ultima Actualizacion: ".$actualizacion0198."</h5>";
               ?>
            </div>
          </div>
        </div>
        
      </div>

      <?php 

        if ($_SESSION["perfil"] != "Credito y Cobranza") {

          echo "<div class='col-lg-3 col-xs-8'>
              <div class=''>
                <a href='banco0840' class='btnBancoElegido' banco='banco0840' tabla='tablaBanco0840".$tabla."'><img src='vistas/img/bancos/Crd_0840.png' alt='' style='width: 90%; height: 60%'></a><div class='alert alert-info alert-dismissable' style='width:90%'><div>";
          
              $item = null;
              $valor = null;

              $B0840 = ControladorUltimoSaldoBancos::ctrMostrarBanco0840($item, $valor);
              foreach ($B0840 as $key => $value) {
                $saldo0840 = $value["saldo"];
              }

              if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {

                echo "<h4 style='margin-left:10%'>Saldo Actual: $ ".$saldo0840."</h4>";
                
              }else {
                
                echo '';

              }

            echo "</div>
            <div>";
              
               $item = null;
              $valor = null;

              $B0840UltimaActualizacion = ControladorUltimoSaldoBancos::ctrMostrarUltimaActualizacion0840($item, $valor);

              foreach ($B0840UltimaActualizacion as $key => $value) {
                $actualizacion0840 = $value["fecha"];
              }
              echo "<h5 style='margin-left:-5%'>Ultima Actualizacion: ".$actualizacion0840."</h5>";
               
            echo "</div>
          </div>
        </div>
        
      </div>";
        
        }else{

        }


      ?>

      <?php 

        if ($_SESSION["perfil"] != "Credito y Cobranza") {

          echo "<div class='col-lg-3 col-xs-8'>
              <div class=''>
                <a href='banco1219' class='btnBancoElegido' banco='banco1219' tabla='tablaBanco1219".$tabla."'><img src='vistas/img/bancos/Crd_1219.png' alt='' style='width: 90%; height: 60%'></a><div class='alert alert-info alert-dismissable' style='width:90%'><div>";
          
              $item = null;
              $valor = null;

              $B1219 = ControladorUltimoSaldoBancos::ctrMostrarBanco1219($item, $valor);
              foreach ($B1219 as $key => $value) {
                $saldo1219 = $value["saldo"];
              }

              if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {

                echo "<h4 style='margin-left:10%'>Saldo Actual: $ ".$saldo1219."</h4>";
                
              }else {
                
                echo '';

              }

            echo "</div>
            <div>";
              
               $item = null;
              $valor = null;

              $B1219UltimaActualizacion = ControladorUltimoSaldoBancos::ctrMostrarUltimaActualizacion1219($item, $valor);

              foreach ($B1219UltimaActualizacion as $key => $value) {
                $actualizacion1219 = $value["fecha"];
              }
              echo "<h5 style='margin-left:-5%'>Ultima Actualizacion: ".$actualizacion1219."</h5>";
               
            echo "</div>
          </div>
        </div>
        
      </div>";
        
        }else{

        }


      ?>

       <?php 

        if ($_SESSION["perfil"] != "Credito y Cobranza") {

          echo "<div class='col-lg-3 col-xs-8'>
              <div class=''>
                <a href='banco1286' class='btnBancoElegido' banco='banco1286' tabla='tablaBanco1286".$tabla."'><img src='vistas/img/bancos/Crd_1286.png' alt='' style='width: 90%; height: 60%'></a><div class='alert alert-info alert-dismissable' style='width:90%'><div>";
          
              $item = null;
              $valor = null;

              $B1286 = ControladorUltimoSaldoBancos::ctrMostrarBanco1286($item, $valor);
              foreach ($B1286 as $key => $value) {
                $saldo1286 = $value["saldo"];
              }

              if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {

                echo "<h4 style='margin-left:10%'>Saldo Actual: $ ".$saldo1286."</h4>";
                
              }else {
                
                echo '';

              }

            echo "</div>
            <div>";
              
               $item = null;
              $valor = null;

              $B1286UltimaActualizacion = ControladorUltimoSaldoBancos::ctrMostrarUltimaActualizacion1286($item, $valor);

              foreach ($B1286UltimaActualizacion as $key => $value) {
                $actualizacion1286 = $value["fecha"];
              }
              echo "<h5 style='margin-left:-5%'>Ultima Actualizacion: ".$actualizacion1286."</h5>";
               
            echo "</div>
          </div>
        </div>
        
      </div>";
        
        }else{

        }


      ?>
     
    </div>

    <div class="box-body">
      <?php 

        if ($_SESSION["perfil"] != "Credito y Cobranza") {

          echo "<div class='col-lg-3 col-xs-8'>
              <div class=''>
                <a href='banco1340' class='btnBancoElegido' banco='banco1340' tabla='tablaBanco1340".$tabla."'><img src='vistas/img/bancos/Crd_1340.png' alt='' style='width: 90%; height: 60%'></a><div class='alert alert-info alert-dismissable' style='width:90%'><div>";
          
              $item = null;
              $valor = null;

              $B1340 = ControladorUltimoSaldoBancos::ctrMostrarBanco1340($item, $valor);
              foreach ($B1340 as $key => $value) {
                $saldo1340 = $value["saldo"];
              }

              if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {

                echo "<h4 style='margin-left:10%'>Saldo Actual: $ ".$saldo1340."</h4>";
                
              }else {
                
                echo '';

              }

            echo "</div>
            <div>";
              
               $item = null;
              $valor = null;

              $B1340UltimaActualizacion = ControladorUltimoSaldoBancos::ctrMostrarUltimaActualizacion1340($item, $valor);

              foreach ($B1340UltimaActualizacion as $key => $value) {
                $actualizacion1340 = $value["fecha"];
              }
              echo "<h5 style='margin-left:-5%'>Ultima Actualizacion: ".$actualizacion1340."</h5>";
               
            echo "</div>
          </div>
        </div>
        
      </div>";
        
        }else{

        }


      ?>

      <div class="col-lg-3 col-xs-6">
        <div class="">
          <a href="banco3450" class="btnBancoElegido" banco="banco3450" tabla="<?php echo 'tablaBanco3450'.$tabla ?>"><img src="vistas/img/bancos/Crd_3450.png" alt="" style="width: 90%; height: 60%"></a>
          <div class="alert alert-info alert-dismissable" style="width:90%">
            <div>
              <?php
                $item = null;
                $valor = null;

                $B3450 = ControladorUltimoSaldoBancos::ctrMostrarBanco3450($item, $valor);
                foreach ($B3450 as $key => $value) {
                  $saldo3450 = $value["saldo"];
                }

              
                 if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {

                 echo "<h4 style='margin-left:10%'>Saldo Actual: $ ".$saldo3450."</h4>";

                
                }else {
                  
                  echo '';

                }
            ?>
            </div>
            <div >
              <?php 
               $item = null;
              $valor = null;

              $B3450UltimaActualizacion = ControladorUltimoSaldoBancos::ctrMostrarUltimaActualizacion3450($item, $valor);

              foreach ($B3450UltimaActualizacion as $key => $value) {
                $actualizacion3450 = $value["fecha"];
              }
              echo "<h5 style='margin-left:-5%'>Ultima Actualizacion: ".$actualizacion3450."</h5>";
               ?>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="">
          <a href="<?php echo 'banco6278'.$tabla ?>"  class="btnBancoElegido" banco="banco6278" tabla="<?php echo 'tablaBanco6278'.$tabla ?>"><img src="vistas/img/bancos/Crd_6278.png" alt="" style="width: 90%; height: 60%"></a>
          <div class="alert alert-info alert-dismissable" style="width:90%">
            <div>
              <?php
                $item = null;
                $valor = null;

                $B6278 = ControladorUltimoSaldoBancos::ctrMostrarBanco6278($item, $valor);
                foreach ($B6278 as $key => $value) {
                  $saldo6278 = $value["saldo"];
                }

                
                if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {

                 echo "<h4 style='margin-left:10%'>Saldo Actual: $ ".$saldo6278."</h4>";

                
                }else {
                  
                  echo '';

                }
              ?>
            </div>
            <div >
              <?php 
               $item = null;
              $valor = null;

              $B6278UltimaActualizacion = ControladorUltimoSaldoBancos::ctrMostrarUltimaActualizacion6278($item, $valor);

              foreach ($B6278UltimaActualizacion as $key => $value) {
                $actualizacion6278 = $value["fecha"];
              }
              echo "<h5 style='margin-left:-5%'>Ultima Actualizacion: ".$actualizacion6278."</h5>";
               ?>
            </div>
          </div>
        </div>
      </div>
      
       <?php 
       if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {

          echo '<div class="col-lg-3 col-xs-6">
            <div class="">
              <a href="caja"><img src="vistas/img/bancos/Crd_Caja.png" alt="" style="width: 90%; height: 60%;"></a><br>
              <div class="alert alert-info alert-dismissable" style="width:90%">
               <div>';
               ?>

                <?php
                  $item = null;
                  $valor = null;

                  $caja = ControladorUltimoSaldoBancos::ctrMostrarCaja($item, $valor);
                  foreach ($caja as $key => $value) {
                    $saldoCaja = number_format($value["saldo"],2);
                  }

                  echo "<h4 style='margin-left:10%'>Saldo Actual: $ ".$saldoCaja."</h4>";
                  ?>
              <?php 
                echo '</div>
              </div>
            </div>
          </div>';
         
       }
      
      ?>

    </div>
  </section>
</div>
