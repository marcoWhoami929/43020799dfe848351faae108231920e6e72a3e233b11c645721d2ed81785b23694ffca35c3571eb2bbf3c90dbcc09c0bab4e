<?php 
$idUsuario = $_SESSION["id"];
echo '<script type="text/javascript">
        var idUsuario = '.$idUsuario.';
        localStorage.setItem("idUsuario",idUsuario);
</script>';
 ?>
<div class="content-wrapper" style="margin-bottom: 150px;">
  <section class="content-header">
    <h1>
      TABLERO
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">TABLERO </li>
    </ol>
  </section>

  <section class="content" >

  <nav id="colorNav">
    
  </nav>
    
  </section>

</div>

<style>
  #colorNav > ul{
   width: 100%;
   margin:0 auto;

  }
  #colorNav > ul > li{ /* will style only the top level li */
   list-style: none;
   box-shadow: 0 0 10px rgba(100, 100, 100, 0.2) inset,1px 1px 1px #CCC;
   display: inline-block;
   line-height: 1;
   margin: 1px;
   border-radius: 3px;
   position:relative;
   border-radius: 22px 22px 22px 22px;
-moz-border-radius: 22px 22px 22px 22px;
-webkit-border-radius: 22px 22px 22px 22px;
border: 0px solid #000000;
  }
  #colorNav > ul > li > a{
   color:inherit;
   text-decoration:none !important;
   font-size:24px;
   padding: 25px;
  }
  #colorNav li ul{
   position:absolute;
   list-style:none;
   text-align:center;
   width:180px;
   left:50%;
   margin-left:-90px;
   top:70px;
   font:bold 12px 'Open Sans Condensed', sans-serif;
   
  /* This is important for the show/hide CSS animation */
   max-height:0px;
   overflow:hidden;
   
  -webkit-transition:max-height 0.4s linear;
   -moz-transition:max-height 0.4s linear;
   transition:max-height 0.4s linear;
  }
  #colorNav li:hover ul{
   max-height:200px;
   z-index: 1000;
  }
  #colorNav li ul li{
   background-color:#313131;
  }
   
  #colorNav li ul li a{
   padding:12px;
   color:#fff !important;
   text-decoration:none !important;
   display:block;
  }
   
  #colorNav li ul li:nth-child(odd){ /* zebra stripes */
   background-color:#363636;
  }
   
  #colorNav li ul li:hover{
   background-color:#444;
  }
   
  #colorNav li ul li:first-child{
   border-radius:3px 3px 0 0;
   margin-top:25px;
   position:relative;
  }
   
  #colorNav li ul li:first-child:before{ /* the pointer tip */
   content:'';
   position:absolute;
   width:1px;
   height:1px;
   border:5px solid transparent;
   border-bottom-color:#313131;
   left:50%;
   top:-10px;
   margin-left:-5px;
  }
   
  #colorNav li ul li:last-child{
   border-bottom-left-radius:3px;
   border-bottom-right-radius:3px;
  }

  #colorNav a  i {
   
    margin-left:  25%;
    margin-top: 5%;
  }
  #colorNav h2 {
    text-align: center;
  
  }
  
</style>