<?php
require 'conexion.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $conexion->real_escape_string($_POST["username"]);
    $contrasena = $conexion->real_escape_string($_POST["password"]);

    
    $sql = "SELECT * FROM usuarios WHERE Usuario='$usuario' AND Contrasena='$contrasena'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION['username'] = $usuario; 

        header("Location: menu.php");
        exit();
    } else {
        $_SESSION['error_message'] = "User or password incorrect.";
        
        header("Location: index.php");
        exit();
    }
}

$conexion->close();
?>