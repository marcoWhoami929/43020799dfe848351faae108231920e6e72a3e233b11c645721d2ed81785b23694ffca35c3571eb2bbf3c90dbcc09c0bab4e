<?php
    $file = $_GET["rutaArchivo"];


    if(!file_exists($file)) die("lo siento el archivo no existe");

    $type = filetype($file);
    // Get a date and timestamp
    $today = date("F j, Y, g:i a");
    $time = time();
    // Send file headers
    header("Content-type: $type");

    header("Content-Disposition: attachment;filename=".$file."");
    header("Content-Transfer-Encoding: binary"); 
    header('Pragma: no-cache'); 
    header('Expires: 0');
    // Send the file contents.
    set_time_limit(0);
    ob_clean();
    flush();
    readfile($file);

?>