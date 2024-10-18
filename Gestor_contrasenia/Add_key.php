<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Add Password</title>
    <link rel="stylesheet" href="stylesagregar.css">
</head>
<body>
   
    <div class="back-button">
        <a href="menu.php">
            <img src="assets/regreso.png" alt="Back" class="logoback">
        </a>
    </div>
    
   
    <div class="container">
        <h2 class="welcome-text">Add Account</h2>
        <form action="Add.php" method="POST">
            <div class="form-row">
                <label for="user_name">User</label>
                <input class="form-control" type="text" name="user_name" required />
            </div>
            
            <div class="form-row password-container">
                <label for="password">Password</label>
                <input id="password" class="form-control password-field" type="password" name="password" required />
                <img src="assets/eye.png" alt="Show/Hide Password" class="toggle-password">
            </div>

            <div class="form-row">
                <label for="category">Category</label>
                <select class="form-control" name="category" required>
                    <option selected disabled>...</option>
                    <option value="wi-fi">Wi-fi</option>
                    <option value="social_media">Social Media</option>
                    <option value="stream">Stream</option>
                    <option value="shop">Shop</option>
                    <option value="productivity">Productivity</option>
                </select>
            </div>
            
            <div class="form-row">
                <label for="platform">Platform</label>
                <input class="form-control" type="text" name="platform" required />
            </div>

            <button type="submit" class="btn-submit">Add</button>
        </form>
    </div>
</body>
</html>
