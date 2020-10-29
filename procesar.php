<?php
session_start();
    function SubirArchivo ($sfArchivo){
        $dir_subida = 'vistas/modulos/cotizacionesEnviadas/';
        $fichero_subido = $dir_subida . basename($_FILES[$sfArchivo]['name']);
        if (move_uploaded_file($_FILES[$sfArchivo]['tmp_name'], $fichero_subido)) {
            return $fichero_subido;
        } else {
            return "";
        }
    }

    set_time_limit(0);
    ignore_user_abort(true);
    /*RECOGER VALORES ENVIADOS DESDE INDEX.PHP*/
    $sDestino = $_POST['txtDestin'];
    $sAsunto = $_POST['txtAsunto'];
    $sMensaje = $_POST['txtMensa'];
    $sAdjunto = SubirArchivo('txtAdjun');

    $adj = intval(preg_replace('/[^0-9]+/', '', $sAdjunto), 10);
    
    /*VALIDAR QUE EL ARCHIVO HA SIDO ENVIADO Y ACTUALIZARLO EN LA BASE DE DATOS*/
    include_once("db_connect.php");
    $actualizarEnviado = "UPDATE cotizaciones set enviada = '1' where folio = '".$adj."'";
    mysqli_query($conn, $actualizarEnviado) or die("database error : ".mysqli_error($conn));

    /*VALIDAR QUE EL ARCHIVO HA SIDO ENVIADO Y ACTUALIZARLO EN LA BASE DE DATOS*/

    date_default_timezone_set('Etc/UTC');
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
        $mail->setFrom('cotizador.sfdk@gmail.com', 'Cotizador San Francisco Dekkerlab');

    //CONFIGURACIÓN DEL MENSAJE, EL CUERPO DEL MENSAJE SERA UNA PLANTILLA HTML QUE INCLUYE IMAGEN Y CSS
        $mail->Subject = $sAsunto; //asunto del mensaje
        //incrustar imagen para cuerpo de mensaje(no confundir con Adjuntar)
        //cargar archivo css para cuerpo de mensaje
            $rcss = "extensiones/plantilla/estilo.css";//ruta de archivo css
            $fcss = fopen ($rcss, "r");//abrir archivo css
            $scss = fread ($fcss, filesize ($rcss));//leer contenido de css
            fclose ($fcss);//cerrar archivo css
        //Cargar archivo html 
             if ($_SESSION['nombre'] == "Miguel Gutierrez Angeles") {
                $shtml = file_get_contents('extensiones/plantilla/mail.html');
                
            }else if($_SESSION['nombre'] == "Rocio Martínez Morales"){
                $shtml = file_get_contents('extensiones/plantilla/mail2.html');

            }else if($_SESSION['nombre'] == "Luis Enrique Bustos Monterd"){
                $shtml = file_get_contents('extensiones/plantilla/mail3.html');

            }
            else if($_SESSION['nombre'] == "Orlando Briones Aguirre"){
                $shtml = file_get_contents('extensiones/plantilla/mail4.html');

            }
            else if($_SESSION['nombre'] == "Erick Gomez Rodriguez"){
                $shtml = file_get_contents('extensiones/plantilla/mail5.html');

            }
            else if($_SESSION['nombre'] == "Jonathan Gonzalez Sanchez"){
                $shtml = file_get_contents('extensiones/plantilla/mail6.html');

            }
            else if($_SESSION['nombre'] == "Alfredo Mendoza Segura"){
                $shtml = file_get_contents('extensiones/plantilla/mail7.html');

            }else if($_SESSION['nombre'] == "Elsa Martinez"){
                $shtml = file_get_contents('extensiones/plantilla/mail8.html');

            }
            else{
                 $shtml = file_get_contents('extensiones/plantilla/mail9.html');
            }
            
        //reemplazar sección de plantilla html con el css cargado y mensaje creado
            $incss  = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml);
            $cuerpo = str_replace('<p id="mensaje"></p>',$sMensaje,$incss);
        $mail->Body = $cuerpo; //cuerpo del mensaje
        $mail->AltBody = '---';//Mensaje de sólo texto si el receptor no acepta HTML

    //CONFIGURACIÓN DE ARCHIVOS ADJUNTOS 
        $mail->addAttachment($sAdjunto);

    //CONFIGURACIÓN DE RECEPTORES
        $aDestino = explode(";",$sDestino);
        foreach ( $aDestino as $i => $sDest){
            $mail->addAddress(trim($sDest), "Destinatario ".$i+1);
        }
    //ENVIAR MENSAJE
    if ($_SESSION['nombre'] == "Miguel Gutierrez Angeles") {
                $mail->addCC('mangeles@sfd.com.mx');
                
            }else if($_SESSION['nombre'] == "Rocio Martínez Morales"){
                $mail->addCC('ventas1@sfd.com.mx');

            }else if($_SESSION['nombre'] == "Luis Enrique Bustos Monterd"){
                $mail->addCC('ventas6@sfd.com.mx');

            }
            else if($_SESSION['nombre'] == "Orlando Briones Aguirre"){
                $mail->addCC('ventas4@sfd.com.mx');

            }
            else if($_SESSION['nombre'] == "Erick Gomez Rodriguez"){
                $mail->addCC('ventas2@sfd.com.mx');

            }
            else if($_SESSION['nombre'] == "Jonathan Gonzalez Sanchez"){
                $mail->addCC('jgonzalez@sfd.com.mx');

            }
            else if($_SESSION['nombre'] == "Alfredo Mendoza Segura"){
                 //$mail->addCC('jgonzalez@sfd.com.mx');

            }else if($_SESSION['nombre'] == "Elsa Martinez"){
                 $mail->addCC('emartinez@sfd.com.mx');

            }
            else{
                //$mail->addCC('mlopez@sfd.com.mx');
            }
    if (!$mail->send()) {
        $import_status = '?import_status=error';
        header('Location: enviarCotizaciones'.$import_status);
    } else {
        $import_status = '?import_status=success';
        header('Location: enviarCotizaciones'.$import_status);
        //eliminar archivos temporales de carpeta subidas
        //unlink($sAdjunto);
    }
?>