<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "cuentas";

$conexion = new mysqli($server, $user, $pass, $db);
try {
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $sqlCount = "SELECT COUNT(*) FROM gestor";
    $result = $conn->query($sqlCount)->fetchColumn();

    if ($result == 0) {
        
        $sqlResetAI = "ALTER TABLE gestor AUTO_INCREMENT = 1";
        $conn->exec($sqlResetAI);
        
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
