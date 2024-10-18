<?php
require 'conexion.php'; 

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM gestor WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Account deleted successfully.";
    } else {
        $_SESSION['error_message'] = "Error deleting account: " . $conexion->error;
    }

    header("Location: Delete_key.php");
    exit();  

    $stmt->close();
    $conexion->close();
}
?>