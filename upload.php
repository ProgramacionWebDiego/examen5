<?php
session_start();
if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivos al servidor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            color: #333;
            text-decoration: none;
        }
        nav ul li a:hover {
            color: #555;
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>subir archivos</h1>
    <h2><?php echo "Bienvenido, ".$_SESSION["usuario"]?></h2>
    <nav>
        <ul>
            <li>
                <a href="index.php">Ver galeria</a>
            </li>
            <li>
                <a href="logout.php">Cerrar sesion</a>
            </li>
        </ul>
    </nav>
    <form action="subir_archivos.php" enctype="multipart/form-data" method="post">
        <input type="file" name="archivo" id="">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
<?php
}else{
    header("Location: login.php");
}
?>