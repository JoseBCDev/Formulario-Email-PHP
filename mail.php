<?php

require("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;

function sendMail($asunto, $cuerpo,$correo,$nombre,$html = false)
{
    // Configuracion de MAILTRAP PHP MAILER Servidor de Correos
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '4b29648ffd28d0';
    $phpmailer->Password = 'e52e9581135f88';

    // Destinarios
    $phpmailer->setFrom('contact@miempresa.com', 'Miempresa');
    $phpmailer->addAddress($correo, $nombre);     //Add a recipient

    //Contentido del Correo
    $phpmailer->isHTML($html);                                  //Set email format to HTML
    $phpmailer->Subject = $asunto;
    $phpmailer->Body    = $cuerpo;

    //Enviar el Correo
    $phpmailer->send();
}

?>