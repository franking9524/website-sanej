<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$nombre    = $_POST['name'];
$correo     = $_POST['email'];
$telefono   = $_POST['phone'];
$asunto   = $_POST['message'];

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.neexon.net';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cotizaciones@proyectosanej.com';                     // SMTP username
    $mail->Password   = 'dejavu2828'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('cotizaciones@proyectosanej.com', 'Proyecto Sanej');
    $mail->addAddress('cotizaciones@proyectosanej.com', 'Proyecto Sanej');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Solicitud de Informaci&oacute;n:';
    $mail->Body    = "<p><strong>Tienes una nueva solicitud de informaci&oacute;n.</strong></p><h3>Detalles del contacto</h3><ul><li>Nombre: '$nombre'</li>
    <li>Correo: '$correo'</li> <li>Telefono: '$telefono'</li> <li>Asunto: '$asunto'</li></ul>";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
