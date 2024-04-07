<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


if(isset($_POST["buttonCorreo"])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = $_POST['correoIndex'];
    
        $mail = new PHPMailer(true);
    
        try {
            // Configuración del servidor SMTP
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'e06547567@gmail.com';
            $mail->Password   = 'qblx xsbe gdtf bbmx'; // Reemplaza con tu contraseña de Gmail o contraseña de aplicación si tienes la autenticación en dos pasos habilitada
            $mail->SMTPSecure = 'ssl'; // Usar 'tls' o 'ssl' dependiendo de la configuración del servidor SMTP
            $mail->Port       = 465; // Puerto SMTP para TLS
    
            // Configuración del mensaje
            $mail->setFrom($correo, "Cliente");
            $mail->addAddress('e06547567@gmail.com', 'Noticias VallyMakeup');
            $mail->isHTML(true);
            $mail->Subject = 'Solicitud de informacion';
            $mail->Body    = '&nbsp;Hola, me gustaría enterarme de las últimas noticias ' . $correo;
    
            // Envío del mensaje
            $mail->send();
            header("Location: index.html");
            exit();
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Error del correo: {$mail->ErrorInfo}";
        }
    } else {
    
        header("Location: index.html");
        exit();
    }
}else if(isset($_POST["contactoForm"])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correoForm'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        
        $mail = new PHPMailer(true);
        
        try {
            // Configuración del servidor SMTP
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'e06547567@gmail.com';
            $mail->Password   = 'qblx xsbe gdtf bbmx'; // Reemplaza con tu contraseña de Gmail o contraseña de aplicación si tienes la autenticación en dos pasos habilitada
            $mail->SMTPSecure = 'ssl'; // Usar 'tls' o 'ssl' dependiendo de la configuración del servidor SMTP
            $mail->Port       = 465; // Puerto SMTP para TLS
    
            // Configuración del mensaje
            $mail->setFrom($correo, $nombre );
            $mail->addAddress('e06547567@gmail.com', 'VallyMakeUp Ventas');
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = '
            <!DOCTYPE html>
            <html lang="es">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Correo Electrónico</title>
            <style>
              :root {
                --main-color1: #BF3F61;
                --main-color2: #C13452;
                --main-color3: #d60c42;
                --main-color4: #D96C94;
                --main-color5: #e9adad;
                --main-color6: #f7f7f7;
                --main-color7: #000000;
                --main-color8: #333333;
                --montserrat: \'Montserrat\', serif;
                --roboto: "Roboto Condensed", sans-serif;
                --playfair: "Playfair Display", serif;
                --shrik: "Shrikhand", serif;
              }
            
              body {
                font-family: var(--roboto);
                color: var(--main-color7);
                background-color: var(--main-color6);
                padding: 20px;
              }
            
              h1 {
                font-family: var(--playfair);
                color: var(--main-color1);
              }
            
              p {
                font-family: var(--montserrat);
                color: var(--main-color8);
              }
            
              .button {
                font-family: var(--shrik);
                color: var(--main-color6);
                background-color: var(--main-color4);
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
              }
            </style>
            </head>
            <body>
            
            <h1>Detalles del mensaje de ' . $nombre . ' ' . $correo .'</h1>
            <p>' . $mensaje . '</p>
            
            </body>
            </html>
            ';
    
            // Envío del mensaje
            $mail->send();
            header("Location: index.html");
            exit();
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Error del correo: {$mail->ErrorInfo}";
        }
    } else {
    
        header("Location: index.html");
        exit();
    }
}else{
    echo "Hubo un error al intentar enviar un correo, intentalo de nuevo";
}

?>
