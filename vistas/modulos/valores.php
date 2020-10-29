<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    Tablero De Control
    <small></small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Control de Flujo de Efectivo</li>

    </ol>
   

  </section>
  <!-- content-header -->

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
           <center><h2 style="font-weight: bold;color:tomato;">CONTROL DE FLUJO DE EFECTIVO</h2></center>
         </div>
         <div class="col-lg-6">
            <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Lucida Sans'"></span>
         </div>
         
        
          

      </div>
      <div style="display: none">

          <!--
           <?php 
           //include "flujodeefectivoR.php";
           ?><
         -->
      </div>
      <div class="box-body">
            <!-- row -->
              <div class="row">
                
                 <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-green" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">SALDOS</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">INICIALES</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-yellow" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                         <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">INGRESOS</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">CEDIS</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-blue" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                          <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">INGRESOS</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">TIENDAS</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-red" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">SUBTOTAL</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">OTROS INGRESOS</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-red" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">SUBTOTAL</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">ENTRADAS DEL MES</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-red" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">TOTAL INGRESO</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">BRUTO MENSUAL</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-green" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">PAGOS A PROVEEDORES</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">INICIALES</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-yellow" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                         <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">INGRESOS</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">CEDIS</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-blue" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                          <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">INGRESOS</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">TIENDAS</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-red" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">SUBTOTAL</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">OTROS INGRESOS</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-red" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">SUBTOTAL</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">ENTRADAS DEL MES</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">

                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-xs-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-red" style="-webkit-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);-moz-box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);box-shadow: 21px 13px 5px 2px rgba(173,173,173,1);border-radius: 42px 0px 42px 0px;
-moz-border-radius: 42px 0px 42px 0px;
-webkit-border-radius: 42px 0px 42px 0px;
border: 0px solid #000000;">

                      <!-- inner -->
                      <div class="inner">
                        
                        <h3 style="font-weight: bold;margin-left: 10PX;">0.00</h3>

                        <P style="font-weight: bold;font-size: 20px;margin-left: 10PX;">TOTAL INGRESO</P>
                        <P style="font-weight: bold;font-size: 17px;margin-left: 10PX;">BRUTO MENSUAL</P>
                      
                      </div>
                      <!-- inner -->
                      
                      <!-- icon -->
                      <div class="icon">
                        
                        <i class="fa fa-money"></i>
                      
                      </div>
                      
                    </div>
                    <!-- small box -->

                  </div>
                  <!-- col -->


              </div>

                </div>

              </div>
             <!-- row -->
 </section>
  <!-- content -->

</div>
<!-- content-wrapper -->
<script type="text/javascript">
    function actualiza(){
    $("#cabeceras").load("vistas/modulos/inicio/cajas-superiores.php");
  }
  setInterval( "actualiza()", 1000 );
</script>