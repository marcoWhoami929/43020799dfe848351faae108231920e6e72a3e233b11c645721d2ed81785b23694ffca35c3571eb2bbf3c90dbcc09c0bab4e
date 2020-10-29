<?php
			include_once("../../db_connect.php");
            $consulta = mysqli_query($conn,'SELECT MAX(folio) as folio FROM cotizaciones LIMIT 1');
            $consulta = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
            // En caso contrario se le suma +1.
            $folio = (empty($consulta['folio']) ? 1 : $consulta['folio']+=1);
            echo $folio;

?>