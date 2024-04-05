<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

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
?>
