<?php
$servidor = "localhost";
$usuariodb = "root";
$passdb = "";
$db = "tabla_galeria";
$conexion = mysqli_connect($servidor,$usuariodb,$passdb,$db);
if($conexion->connect_error){
  die("Error en la conexión: " . $conexion->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario = $_POST["user"];
    $contrasena = $_POST["pass"];
    $email = $_POST["email"];
    $id = 0;
    $sql = "UPDATE usuarios SET nombre='$usuario', correo_electronico='$email', contrasena='$contrasena' WHERE id=$id";
    if($conexion->query($sql) === TRUE){
        echo "Los datos se actualizaron correctamente";
    }else{
        echo "Error al actualizar los datos: " . $conexion->error;
    }
}
$conexion->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Modificar Usuario</title>
</head>
<body>
<h2>Modificar Usuario</h2>
<form action="" method="post">
        <label for="user">Nombre de usuario:</label>
        <br>
        <input type="text" name="user" id="user">
        <br>
        <label for="email">Email:</label>
        <br>
        <input type="text" name="email" id="email">
        <br>
        <label for="pass">Contraseña:</label>
        <br>
        <input type="text" name="pass" id="pass">
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>