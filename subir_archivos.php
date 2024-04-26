<?php
session_start();

$carpeta = "imagenes/";

if(!empty($_FILES["archivo"]["name"])){
    $usuario = $_SESSION["usuario"];

    $archivo_nombre = $_FILES["archivo"]["name"];
    $archivo_ruta_temporal = $_FILES["archivo"]["tmp_name"];
    $archivo_tipo = $_FILES["archivo"]["type"];
    $archivo_tamano = $_FILES["archivo"]["size"];

    if($archivo_tipo != "image/jpeg" && $archivo_tipo != "image/png" && $archivo_tipo != "image/gif"){
        echo "Error: solo se permiten imágenes jpg, png y gif";
        return;
    }

    if($archivo_tamano > 1000000){
        echo "Error: El archivo es demasiado grande";
        return;
    }

    $nombre_archivo_final = $usuario . "_" . time() . "_" . $archivo_nombre;

    if(move_uploaded_file($archivo_ruta_temporal, $carpeta . $nombre_archivo_final)){
        echo "Se ha enviado el archivo al servidor";
        header("Location: upload.php");
        exit; 
    } else {
        echo "Error al subir el archivo";
    }
} else {
    echo "No se ha enviado ningún archivo";
}
?>
