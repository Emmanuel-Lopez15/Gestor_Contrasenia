<?php
session_start();

$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "";
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : "";

// Limpia de mensajes
unset($_SESSION['error_message']);
unset($_SESSION['success_message']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Editar Inventario</title>
    <link rel="stylesheet" href="stylesinventario.css"> 
</head>
<body>
<div class="back-button">
        <a href="menu.php">
            <img src="assets/regreso.png" alt="Back">
        </a>
    </div>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="table-container">
            <h2 class="text-center">Accounts</h2>

            <?php
            require 'conexion.php';

            $sql = "SELECT * FROM gestor";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                
                echo "<table>";
                echo "<tr>
                <th>ID</th>
                <th>User</th>
                <th>Password</th>
                <th>Category</th>
                <th>Platform</th>
                </tr>";

                while($fila = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $fila["ID"] . "</td>
                            <td>" . $fila["User"] . "</td>
                            <td>" . $fila["Password_User"] . "</td>
                            <td>" . $fila["Category"] . "</td>
                            <td>" . $fila["Platform"] . "</td>  
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='text-center'>No results found</p>";
            }
            
            $conexion->close();
            ?>
        </div>
    </div>
            
    <div class="modal" id="alertModal">
        <div class="modal-dialog">
            <div class="modal-header">Notification</div>
            <button class="close-modal">X</button>
            <div class="modal-body">
                <?php
                if (!empty($error_message)) {
                    echo '<div class="alert alert-danger">' . $error_message . '</div>';
                }
                if (!empty($success_message)) {
                    echo '<div class="alert alert-success">' . $success_message . '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        
        <?php if (!empty($error_message) || !empty($success_message)) : ?>
            document.getElementById('alertModal').classList.add('show');
            document.getElementById('alertModal').style.display = 'flex';
        <?php endif; ?>

        function closeModal() {
            document.getElementById('alertModal').style.display = 'none';
        }
    </script>

    
    <script src="funciones.js"></script>
</body>
</html>
