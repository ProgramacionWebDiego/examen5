<?php
session_start();

if(isset($_SESSION["usuario"])){

    $carpeta = "imagenes/";

    $usuario = $_SESSION["usuario"];

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Imágenes de <?php echo $_SESSION["usuario"]; ?></title>
        <style>
            #gallery {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
            }
            .imagen {
                width: 200px;
                height: auto;
                cursor: pointer;
                transition: transform 0.3s ease-in-out;
            }
            .imagen:hover {
                transform: scale(1.1);
            }
        </style>
    </head>
    <body>
        <h2>Imágenes de <?php echo $_SESSION["usuario"]; ?></h2>
        <div id="gallery">
            <?php
            $archivos = scandir($carpeta);

            foreach($archivos as $archivo){
                if(is_file($carpeta . $archivo)){
                    if(strpos($archivo, $usuario . "_") !== false){
                        echo "<img class='imagen' src='" . $carpeta . $archivo . "' alt='Imagen' onclick='mostrarInfo(\"$archivo\")'>";
                    }
                }
            }
            ?>
        </div>

        <div id="modal" style="display: none;">
            <div id="modal-content">
                <span class="close" onclick="cerrarModal()">&times;</span>
                <div id="info"></div>
            </div>
        </div>

    </body>
    </html>
    <?php
}else{
    header("Location: index.php");
}
?>
