<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="Admin.css">
</head>
<body>
    <div class="main">
        <div class="form">
            <form method="POST" action="AdminDBLog.php" autocomplete="off">
                <h2>Admin Login Process</h2><br><br>
                <input type="email" name="Admin_email" placeholder="Enter Email ">
                <input type="password" name="Admin_password" placeholder="Enter Password" id="password">
                <span class="toggle-password" onclick="togglePassword('password')"></span><br><br>
                <button class="btnn" type="submit">Sign In</button>
                <!-- <p class="link">Don't have an Admin account<br><a href="Adminregister.php">Sign up </a> here</p> -->
                <p class="liw">Log in with</p><br><br><br>
                <div class="icons">
                    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
