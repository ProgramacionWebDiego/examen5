<?php
session_start();
if(!isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Inicia sesión</h1>
    <form action="validar_login.php" method="post">
        <label for="user">Nombre de usuario</label>
        <br>
        <input type="text" name="user" id="user">
        <br>
        <label for="pass">Contraseña</label>
        <br>
        <input type="password" name="pass" id="pass">
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <p>¿No tienes una cuenta? <a href="/registrar_usuario.php">Regístrate aquí</a></p>
</body>
</html>
<?php
}else{
    header("Location: index.php");
}
?>
