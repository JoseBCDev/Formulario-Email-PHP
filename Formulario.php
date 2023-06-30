<?php

require("mail.php");

function validate_campos($nombre,$email,$asunto,$mensaje)
{
    return !empty($nombre) && !empty($email) && !empty($asunto) && !empty($mensaje);
}

$status = "";

if (isset($_POST["btn-form"])) {
    if (validate_campos($_POST["name"],$_POST["email"],$_POST["asunto"],$_POST["mensaje"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $asunto = $_POST["asunto"];
        $mensaje = $_POST["mensaje"];

        //Contenido del Correo
        $cuerpo = "$name <$email> te envia el siguiente mensaje: <br><br> $mensaje";

        //Mandar Correo
        sendMail($asunto,$cuerpo,$email,$name,true);

        $status = "success";
    }else{
        $status = "danger";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myStylo.css">
    
    <title>Formulario de Contacto</title>
</head>
<body>
    
    <div class="form-container">

        <?php if($status == "danger"): ?>
            <div class="alert danger">
            <span>¡No sé pudo enviar los Datos!</span>
            </div>
        <?php endif; ?>

        <?php if($status == "success"): ?>
            <div class="alert success">
            <span>¡Enviado con éxito!</span>
            </div>
        <?php endif; ?>

    <form action="./Formulario.php" class="form" method="post">
        <h1>¡Contactanos!</h1>

        <div class="form-row">
        <label for="name">Nombre: </label>
        <input type="text" name="name" id="name">
        </div>
        
        <div class="form-row">
        <label for="email" >Email: </label>
        <input type="text" name="email" id="email">
        </div>

        <div class="form-row">
        <label for="asunto" >Asunto: </label>
        <textarea name="asunto" id="asunto"></textarea>
        </div>

        <div class="form-row">
        <label for="mensaje" >Mensaje: </label>
        <textarea name="mensaje" id="mensaje"></textarea>
        </div>

        <div class="button-container">
            
        <button type="submit" name="btn-form"><i class="fa-solid fa-envelope"></i>    Enviar Correo</button>
        </div>
        
    </form>
    <div class="contact-info">
            <div class="info">
                <span><i class="fa-solid fa-location-dot"></i>  Av. J, San Juan de Salinas, SMP</span>
                
            </div>
            <div class="info">
                <span><i class="fa-solid fa-phone"></i> +01 5388820</span>
            </div>
        </div>
    </div>
    
    <script src="https://kit.fontawesome.com/f6182eea8c.js" crossorigin="anonymous"></script>
</body>
</html>