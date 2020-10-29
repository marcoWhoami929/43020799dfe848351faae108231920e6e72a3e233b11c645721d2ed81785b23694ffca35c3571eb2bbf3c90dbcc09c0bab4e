<?php
    session_start();
    set_time_limit(0);
    ignore_user_abort(true);
    error_reporting(0);

    $serie = $_POST["serie"];
    $folio = $_POST["folio"];
    $fechaCorte = $_POST["fechaCorte"];
    $total = $_POST["total"];
    $importeVenta = $_POST["importeVenta"];
    $diferencia = $_POST["diferencia"];
    $gastos = $_POST["gastos"];
    $fondoCaja = $_POST["fondoCaja"];  

    /*RECOGER VALORES ENVIADOS DESDE INDEX.PHP*/
    $sDestino = "emartinez@sfd.com.mx";
    $sAsunto = "Notificación de Diferencias En Corte Caja ".$_SESSION["nombre"];
  
    $sMensaje = "Hola soy ".$_SESSION["nombre"]." "."quiero notificar que cuento con diferencias en mi corte de caja realizado el dia ".$fechaCorte." con Serie ".$serie." Y Folio ".$folio.". <br> <strong>Tengo una diferencia de:</strong> ".number_format($diferencia,2)." <br> <strong>Total:</strong> ".number_format($total,2)." <br> <strong>Importe de Venta:</strong> ".number_format($importeVenta,2)." <br> <strong>Gastos:</strong> ".number_format($gastos,2)." <br> <strong>Fondo de Caja:</strong> ".number_format($fondoCaja,2)."";

    date_default_timezone_set('America/Mexico_City');
    require 'extensiones/PHPMailer/PHPMailerAutoload.php';
    /*CONFIGURACIÓN DE CLASE*/
        $mail = new PHPMailer;
        $mail->isSMTP(); //Indicar que se usará SMTP
        $mail->CharSet = 'UTF-8';//permitir envío de caracteres especiales (tildes y ñ)
    /*CONFIGURACIÓN DE DEBUG (DEPURACIÓN)*/
        $mail->SMTPDebug = 0; //Mensajes de debug; 0 = no mostrar (en producción), 1 = de cliente, 2 = de cliente y servidor
        $mail->Debugoutput = 'html'; //Mostrar mensajes (resultados) de depuración(debug) en html
    /*CONFIGURACIÓN DE PROVEEDOR DE CORREO QUE USARÁ EL EMISOR(GMAIL)*/
        $mail->Host = 'smtp.gmail.com'; //Nombre de host
        // $mail->Host = gethostbyname('smtp.gmail.com'); // Si su red no soporta SMTP sobre IPv6
        $mail->Port = 587; //Puerto SMTP, 587 para autenticado TLS
        $mail->SMTPSecure = 'tls'; //Sistema de encriptación - ssl (obsoleto) o tls
        $mail->SMTPAuth = true;//Usar autenticación SMTP
        $mail->SMTPOptions = array(
            'ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true)
        );//opciones para "saltarse" comprobación de certificados (hace posible del envío desde localhost)
    //CONFIGURACIÓN DEL EMISOR
        $mail->Username = "cotizador.sfdk@gmail.com";
        $mail->Password = "CotSfdk2";
        $mail->setFrom('cotizador.sfdk@gmail.com', 'Diferencias Corte de Caja '.$serie.' '.$folio.'');

    //CONFIGURACIÓN DEL MENSAJE, EL CUERPO DEL MENSAJE SERA UNA PLANTILLA HTML QUE INCLUYE IMAGEN Y CSS
        $mail->Subject = $sAsunto; //asunto del mensaje
        //incrustar imagen para cuerpo de mensaje(no confundir con Adjuntar)
        //cargar archivo css para cuerpo de mensaje
            $rcss = "extensiones/plantilla/estilo.css";//ruta de archivo css
            $fcss = fopen ($rcss, "r");//abrir archivo css
            $scss = fread ($fcss, filesize ($rcss));//leer contenido de css
            fclose ($fcss);//cerrar archivo css
        //Cargar archivo html 
            $shtml = file_get_contents('extensiones/plantilla/notificacionDiferenciasCorte.html');
            
        //reemplazar sección de plantilla html con el css cargado y mensaje creado
            $incss  = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml);
            $cuerpo = str_replace('<p id="mensaje"></p>',$sMensaje,$incss);
        $mail->Body = $cuerpo; //cuerpo del mensaje
        $mail->AltBody = '---';//Mensaje de sólo texto si el receptor no acepta HTML

    //CONFIGURACIÓN DE ARCHIVOS ADJUNTOS 


    //CONFIGURACIÓN DE RECEPTORES
        $aDestino = explode(";",$sDestino);
        foreach ( $aDestino as $i => $sDest){
            $mail->addAddress(trim($sDest), "Destinatario ".$i+1);
        }
    //ENVIAR MENSAJE
    $mail->addCC('mm_marco_mar@hotmail.com');
    $mail->addCC('rgutierrez@sfd.com.mx');
    $mail->addCC('iherrera@sfd.com.mx');
    if (!$mail->send()) {
        $fracaso = "fracaso";
        echo json_encode($fracaso);
        //$import_status = '?import_status=error';
        //header('Location: nuevoCorteCaja'.$import_status);
    } else {
        $exito = "exito";
        echo json_encode($exito);
         
        //$import_status = '?import_status=success';
        //header('Location: nuevoCorteCaja'.$import_status);
        
    }
?>