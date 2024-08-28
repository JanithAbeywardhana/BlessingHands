



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="loginform.css">
</head>
<body>
    <div class="main">
        <div class="form">
            <form id="loginForm" method="POST" action="login.php" autocomplete="off">
                <h2>Login Here</h2><br><br>
                <input type="email" name="Email" placeholder="Enter Your Email Here" required>
                <input type="password" name="Password" placeholder="Enter Your Password Here" id="password" required>
                <span class="toggle-password" onclick="togglePassword('password')"></span><br><br>
                <button class="btnn" type="submit">Login Now</button>
            </form>
            <p class="link">Don't have an account?<br><a href="Register.php">Sign up</a> here</p>
            <p class="liw">Log in with</p><br><br><br>
            <div class="icons">
                <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    
</body>
</html>
