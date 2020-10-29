<?php
    if(isset($_POST["action"])) { // Se pasa una acción
        switch(sprintf("%d", $_POST["action"])) { // ¿Qué acción?
            case 1:
                update(); // Llamar a tu función
                echo "Tarea completada!";
                break;
            default:
                echo "Error: Falta una acción";
        }
    }else{
      echo 'No existe';

    }

    function update() {
          $actualizarClienteAlmacen = new ControladorAtencion();
          $actualizarClienteAlmacen -> ctrActualizarClienteAlmacen();

          $actualizarClienteFacturacion = new ControladorAtencion();
          $actualizarClienteFacturacion -> ctrActualizarClienteFacturacion();

          $actualizarClienteLogistica = new ControladorAtencion();
          $actualizarClienteLogistica -> ctrActualizarClienteLogistica();
    }
?>