<?php
session_start();
if(isset($_SESSION["usuario"])){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Información de la imagen</title>
    </head>
    <body>
        <h1>Información de la imagen</h1>
        <p>Fecha de subida: </p>
        <p>Subida por:</p>
        <p>Visitas: </p>
        <!-- Agrega más detalles si es necesario -->
    </body>
    </html>
    <?php
} else {
    header("Location: login.php");
    exit();
}
?>
