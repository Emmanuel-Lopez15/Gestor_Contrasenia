<?php
session_start();

$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "";
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : "";

// Limpia de mensajes
unset($_SESSION['error_message']);
unset($_SESSION['success_message']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Editar Productos</title>
    <link rel="stylesheet" href="stylesedit.css">
</head>
<body>
    <div class="back-button">
        <a href="menu.php">
            <img src="assets/regreso.png" alt="Regresar">
        </a>
    </div>

    <div class="container">
        <h2 class="welcome-text">Edit Account</h2>

        <?php
        require 'conexion.php';

        $sql = "SELECT * FROM gestor";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='styled-table'>";
            echo "<tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Password</th>
                    <th>Category</th>
                    <th>Platform</th>
                    <th>Action</th>
                  </tr>";

            while($fila = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $fila["ID"] . "</td>
                        <td>" . $fila["User"] . "</td>
                        <td>" . $fila["Password_User"] . "</td>
                        <td>" . $fila["Category"] . "</td>
                        <td>" . $fila["Platform"] . "</td>
                        <td>
                            <form action='edit_key_select.php' method='POST'>
                                <input type='hidden' name='id' value='" . $fila["ID"] . "' />
                                <button type='submit' class='action-box'>Edit</button>
                            </form>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='sub-text'>No results found</p>";
        }
        $conexion->close();
        ?>
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
