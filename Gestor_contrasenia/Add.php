<?php
require 'conexion.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $user_name = $conexion->real_escape_string($_POST["user_name"]);
    $password = $conexion->real_escape_string($_POST["password"]);
    $category = $conexion->real_escape_string($_POST["category"]);
    $platform = $conexion->real_escape_string($_POST["platform"]);

    
    $verifyAccount = $conexion->query("SELECT * FROM gestor WHERE User='$user_name' AND Platform='$platform'");

    if ($verifyAccount->num_rows > 0) {
        $_SESSION['error_message'] = "The account is already registered.";
    } else {
        $sql = "INSERT INTO gestor (User, Password_User, Category, Platform) 
                VALUES ('$user_name', '$password', '$category','$platform')";

        if ($conexion->query($sql) === TRUE) {
            $_SESSION['success_message'] = "Successful account registration.";
        } else {
            $_SESSION['error_message'] = "Account registration error: " . $conexion->error;
        }
    }

    header("Location: Review_key.php");
    exit();  
}


$conexion->close();
?>