<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Admin_Name']) && isset($_POST['Admin_Phone_Number']) && isset($_POST['Admin_Email']) && isset($_POST['Admin_Password']) && isset($_POST['admin_option'])) {
        $Admin_Name = $_POST['Admin_Name'];
        $Admin_Phone_Number = $_POST['Admin_Phone_Number'];
        $Admin_Email = $_POST['Admin_Email'];
        $Admin_Password = $_POST['Admin_Password'];
        $admin_option = $_POST['admin_option'];
        
        // You may want to perform additional validation here

        // Insert into the database
        $sql = "INSERT INTO adminRegisterForm (Admin_Name, Admin_Phone_Number, Admin_Email, Admin_Password, admin_option) 
                VALUES ('$Admin_Name', '$Admin_Phone_Number', '$Admin_Email', '$Admin_Password', '$admin_option')";

        if (mysqli_query($db, $sql)) {
            echo "<script>alert('Admin Registered Successfully!'); window.location.href='Adminlog.php';</script>";
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
    <link rel="stylesheet" href="Admin.css">
</head>
<body>
    <div class="main">
        <div class="form">
        <form method="POST" action="Adminregister.php" autocomplete="off">
            <h2>Admin Register Here</h2>
            <input type="text" name="Admin_Name" placeholder="Enter Your Name Here">
            <input type="text" name="Admin_Phone_Number" placeholder="Enter Phone Number Here">
            <input type="email" name="Admin_Email" placeholder="Enter Your Email Here">
            <input type="password" name="Admin_Password" placeholder="Enter Your Password Here" id="password">
<span class="toggle-password" onclick="togglePassword('password')"></span>
<br>
    <br><label for="admin" style="padding-right: 295px; font-weight: bold; font-size: 17px;color: white;">Admin Role</label>
            <select id="admin" name="admin_option" required>
                <option value="Admin for Academy">Admin for Academy</option>
                <option value="Admin for Caregivers">Admin for Caregivers</option>
                <option value="Admin for Management">Admin for Management</option>
               
            </select>

            
<button class="btnn">Register Now</a></button>
    
            <p class="link">Do you have an account<br><a href="Adminlog.php">Sign in </a> here</a></p>
            <p class="liw">Log in with</p><br>
            <div class="icons">
                <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
            </div>
        </div>
        </form>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
