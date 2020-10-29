<?php
require_once "../controladores/tickets.controlador.php";
require_once "../modelos/tickets.modelo.php";
if(isset($_POST["departamentos"])){

    $departamento = $_POST["departamentos"];

    $item = null;
    $valor = null;
    $listaDepartamentos = ControladorTickets::ctrMostrarListaDepartamentos($item,$valor);
    foreach ($listaDepartamentos as $value) {
            $listaId = $value["id"];
            $listaNombre = $value["nombreDepartamento"];
            $departamentoArr = array("Departamento" => array($listaId=>$listaNombre));
            foreach($departamentoArr[$departamento] as $key => $value){

                echo "<option value='".$key."'>". $value . "</option>";
            }
     
    }

    
}


if(isset($_POST["usuarios"])){

    $usuario = $_POST["usuarios"];
     
    $item = "id";
    $valor = $usuario;
    $listaDepartamentos = ControladorTickets::ctrMostrarListaDepartamentos($item,$valor);

    foreach ($listaDepartamentos as $value) {

        $usuarioId = $value["id"];
        $usuarioNombre = $value["nombre"];
        $usuariosARR = array("Usuario" => array($usuarioId => $usuarioNombre));
        foreach($usuariosARR["Usuario"] as $key => $value){
        
           echo "<option value='".$key."'>". $value . "</option>";

        }

        
    }
     
}



?>