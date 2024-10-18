<?php
require 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    $category = $_POST["category"];
    $platform = $_POST["platform"];

    $sql = "UPDATE gestor SET User = '$user_name', Password_User = '$password', Category = '$category', Platform = '$platform'
            WHERE ID = '$id'";

    
    if ($conexion->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Account edited successfully.";
    } else {
        $_SESSION['error_message'] = "Error editing account: " . $conexion->error;
    }


    header("Location: Edit_key.php");
    exit();

    $conexion->close();
}