<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST["user"]) && isset($_POST["pass"])){
        $servidor = "localhost";
        $usuariodb = "root";
        $passdb = "";
        $db = "tabla_galeria";

        $usuario = $_POST["user"];
        $contrasena = $_POST["pass"];

        if(!empty($usuario) && !empty($contrasena)){
            $conexion = mysqli_connect($servidor,$usuariodb,$passdb,$db);
            if (!$conexion) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            $consulta = "SELECT nombre,contrasena FROM usuarios WHERE nombre=? AND contrasena=?";
            $stmt = mysqli_prepare($conexion, $consulta);
            mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) > 0){
                $_SESSION['usuario'] = $usuario;
                header("Location: upload.php");
                exit; 
            } else {
                echo "Error: Usuario y/o contraseña son incorrectos.";
            }


            mysqli_stmt_close($stmt);
            mysqli_close($conexion);
        } else {
            echo "Error: Debes ingresar un nombre de usuario y una contraseña.";
        }
    } else {
        echo "Error: Debes enviar los datos del formulario.";
    }
}
?>
