<?php
session_start();
include('../../../db_connect.php');
if (isset($_POST['view'])) {
    
    if ($_POST["view"] != '') {
        $update_query = "UPDATE notificacionestickets SET estatus = 1 WHERE id = '".$_POST["view"]."' and  estatus=0";
        mysqli_query($conn, $update_query);
    }
    $usuario = $_SESSION["id"];
    $query  = "SELECT * FROM notificacionestickets where autorTicket = '".$usuario."' ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
   
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_array($result)) {

            if ($row["estatus"] == 1) {

              $output .= '
            <li class="notifyId" id="'.$row["id"].'" style="background:#efe6dd;color:white;">
            <a href="#">
            <i class="fa fa-check" aria-hidden="true" style="color:#0576d6"></i><i class="fa fa-check" aria-hidden="true" style="color:#0576d6"></i><strong style="color:#434348">' . utf8_encode($row["titulo"]) . '</strong><br />
            <small style="color:#434348"><em>' . $row["fecha"] . '</em></small>
            </a>
            </li>
           
            ';
              
            }else{

              $output .= '
            <li class="notifyId" id="'.$row["id"].'" style="background:#efe6dd;color:white">
            <a href="#">
            <i class="fa fa-check" aria-hidden="true"></i><strong  style="color:#434348">' .utf8_encode($row["titulo"]) . '</strong><br />
            <small  style="color:#434348"><em>' . $row["fecha"] . '</em></small>
            </a>
            </li>
           
            ';
            }

        }
    }
    
    else {
        $output .= '<li><a href="#" class="text-bold text-italic">No hay notificaciones</a></li>';
    }

    $status_query = "SELECT * FROM notificacionestickets WHERE estatus=0 and autorTicket = '".$usuario."'";
    $result_query = mysqli_query($conn, $status_query);
    $count        = mysqli_num_rows($result_query);
    
    $data = array(
        'notification' => $output,
        'unseen_notification' => $count
    );
    
    echo json_encode($data);
}
?>