<?php
require 'conexion.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $apellido = $conexion->real_escape_string($_POST["apellido"]);
    $correo = $conexion->real_escape_string($_POST["correo"]);
    $usuario = $conexion->real_escape_string($_POST["usuario"]);
    $contrasena = $conexion->real_escape_string($_POST["contrasena"]); 

    
    $verificarUsuario = $conexion->query("SELECT * FROM usuarios WHERE Usuario='$usuario' OR Correo='$correo'");

    if ($verificarUsuario->num_rows > 0) {
        $_SESSION['error_message'] = "The user or e-mail is already registered.";
    } else {
        $sql = "INSERT INTO usuarios (Nombre, Apellido, Correo, Usuario, Contrasena) 
                VALUES ('$nombre', '$apellido', '$correo', '$usuario', '$contrasena')";

        if ($conexion->query($sql) === TRUE) {
            $_SESSION['success_message'] = "Register success.";
        } else {
            $_SESSION['error_message'] = "Failed: " . $conexion->error;
        }
    }

    header("Location: index.php");
    exit();
}

$conexion->close();
?>