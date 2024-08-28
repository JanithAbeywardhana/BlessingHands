<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['UserName']) && isset($_POST['PhoneNumber']) && isset($_POST['Email']) && isset($_POST['Password'])) {
        $UserName = $_POST['UserName'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        
        // echo $UserName."<br>".$PhoneNumber."<br>".$Email."<br>".$Password;

        $sql = "INSERT INTO registerform(UserName, PhoneNumber, Email, Password) VALUES ('$UserName', '$PhoneNumber', '$Email', '$Password')";

        // echo $sql;

        if (mysqli_query($db, $sql)) {
            {echo"<script>alert('Registered Successfull!'); window.location.href='login.php'</script>";}

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    } else {
        echo "All form fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="loginform.css">
</head>
<style>
    .form {
        opacity: 60%;
        width: 550px;
        height: 680px;
        background: linear-gradient(to top, #0a7185 50%,  #0a7185 50%);
        border-radius: 10px;
        /* padding: 5px; */
        display: flex;
        flex-direction: column;
        align-items: center;
    }
   
</style>
<body>
    <div class="main">
        <div class="form">
            <form method="POST" action="Register.php" autocomplete="off">
                <h2>Register Here</h2>
                <input type="text" name="UserName" placeholder="Enter Your Name Here" required>
                <input type="text" name="PhoneNumber" placeholder="Enter Phone Number Here" required>
                <input type="email" name="Email" placeholder="Enter Your Email Here" required>
                <input type="password" name="Password" placeholder="Enter Your Password Here" id="password" required>
                <span class="toggle-password" onclick="togglePassword('password')" required></span>
                <div class="policy" style="display: flex; align-items: left;">
                <input type="checkbox" style="transform: scale(0.5); margin-right: 10px;">
    <h3 style="font-size: 18px; margin-left: -220px; white-space: nowrap;"><br><br>I accept all terms & conditions</h3>
</div>

<button class="btnn">Register Now</button>
            </form>
            <p class="link">Do you have an account?<br><a href="loginform.php">Sign in here</a></p>
            <p class="liw">Log in with</p><br>
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
