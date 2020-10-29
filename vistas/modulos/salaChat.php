
<div class="content-wrapper" >

  <section class="content-header">
    
    <h1>
     SALA DE CHAT
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">SALA DE CHAT</li>
    
    </ol>

  </section>

  <section class="content" >

    <div class="box" style="z-index: 1;background:url(vistas/img/chat/bg.jpg) repeat;">

    <div class="box-body">
  
    <div class="tabs">
      <div class="tab" data-dip="chat">CHATS</div><div class="tab" data-dip="users">USUARIOS</div>
    </div>
     <div class="chat" id="scroll" >
       <?php 
      

     include("config.php");include("acceder.php");
       if(isset($_SESSION['user'])){
        include("chatbox.php");
       }else{
        $display_case=true;
        include("acceder.php");
       }


       ?>
     </div>
     <div class="users" style='display:none; height:550px;overflow: scroll;'>
       <?php include("users.php");?>
      </div>

      </div>

    </div>

  </section>

</div>

