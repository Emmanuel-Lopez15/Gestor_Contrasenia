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
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Password Management</title>
    <link rel="stylesheet" href="styleslogin.css">
</head>
<body class="container">
    <div class="login-box">
        <div class="logo-container">
            <img src="assets/LogoPM.png" alt="login-icon" class="logo" />
        </div>

        <form action="login.php" method="POST">
            <div class="input-group">
                <div class="icon-container">
                    <img src="assets/avatar.png" alt="username-icon" class="icon" />
                </div>
                <input class="input-field" type="text" name="username" placeholder="User" required />
            </div>

            <div class="input-group">
                <div class="icon-container">
                    <img src="assets/cerrar-con-llave.png" alt="password-icon" class="icon" />
                </div>
                <div class="password-container">
                    <input class="input-field password-field" type="password" id="password" name="password" placeholder="Password" required />
                    <img src="assets/eye.png" alt="Toggle Password Visibility" class="toggle-password">
                </div>
            </div>

            <div class="remember-me">
                <input type="checkbox" name="remember_me" id="rememberMe" />
                <label for="rememberMe">Remember me</label>
            </div>

            <button type="submit" class="btn">Sign in</button>
        </form>

        <div class="register-link">
            <span>Don't have an account yet?</span>
            <a href="formulario.html" class="register">Register now</a>
        </div>
    </div>

    <div class="modal" id="alertModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Notification</h5>
                <button class="close-modal">X</button>
            </div>
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

    <script src="funciones.js"></script>
</body>
</html>
