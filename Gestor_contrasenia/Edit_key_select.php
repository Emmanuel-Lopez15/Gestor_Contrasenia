<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Edit Password</title>
    <link rel="stylesheet" href="styleseditkey.css">
</head>
<body>
    <div class="back-button">
        <a href="menu.php">
            <img src="assets/regreso.png" alt="back">
        </a>
    </div>

    <div class="container">
        <h2 class="welcome-text">Edit Account</h2>

        <?php
        require 'conexion.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $sql = "SELECT * FROM gestor WHERE ID = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $fila = $result->fetch_assoc();
                $user_name = $fila["User"];
                $password = $fila["Password_User"];
                $category = $fila["Category"];
                $platform = $fila["Platform"];

                echo "<form action='edit_save.php' method='POST'>";
                echo "<input type='hidden' name='id' value='$id' />";

                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<label>User</label>";
                echo "<input class='form-control' type='text' name='user_name' value='$user_name' required />";
                echo "</div>";

                echo "<div class='col-md-4'>";
                echo "<label>Password</label>";
                echo "<div class='password-container'>";
                echo "<input class='form-control password-field' type='password' id='password' name='password' value='$password' required />";
                echo "<img src='assets/eye.png' alt='Toggle Password Visibility' class='toggle-password'>";
                echo "</div>";
                echo "</div>";

                echo "<div class='col-md-4'>";
                echo "<label>Category</label>";
                echo "<select class='form-select' name='category' required>";
                echo "<option value='wi-fi'".($category == 'wi-fi' ? ' selected' : '').">Wi-fi</option>";
                echo "<option value='social_media'".($category == 'social_media' ? ' selected' : '').">Social Media</option>";
                echo "<option value='stream'".($category == 'stream' ? ' selected' : '').">Stream</option>";
                echo "<option value='shop'".($category == 'shop' ? ' selected' : '').">Shop</option>";
                echo "<option value='productivity'".($category == 'productivity' ? ' selected' : '').">Productivity</option>";
                echo "</select>";
                echo "</div>";

                echo "<div class='col-md-4'>";
                echo "<label>Platform</label>";
                echo "<input class='form-control' type='text' name='platform' value='$platform' />";
                echo "</div>";

                echo "<div class='col-md-12 text-center mt-4'>";
                echo "<button type='submit' class='action-box'>Save</button>";
                echo "</div>";
                echo "</div>";

                echo "</form>";
            } else {
                echo "<p>No se encontró el producto.</p>";
            }
            $stmt->close();
        }
        $conexion->close();
        ?>
    </div>
   
</body>
</html>
