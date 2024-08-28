<?php
include 'db.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM adminRegisterForm WHERE id='$id'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$Admin_Name = $row['Admin_Name'];
$Admin_Phone_Number = $row['Admin_Phone_Number'];
$Admin_Email = $row['Admin_Email'];
$Admin_Password = $row['Admin_Password'];
$admin_option = $row['admin_option'];

if (isset($_POST['submit'])) {
    $Admin_Name = $_POST['Admin_Name'];
    $Admin_Phone_Number = $_POST['Admin_Phone_Number'];
    $Admin_Email = $_POST['Admin_Email'];
    $Admin_Password = $_POST['Admin_Password'];
    $admin_option = $_POST['admin_option'];

    $sql = "UPDATE adminRegisterForm SET Admin_Name='$Admin_Name', Admin_Phone_Number='$Admin_Phone_Number', Admin_Email='$Admin_Email', Admin_Password='$Admin_Password', admin_option='$admin_option' WHERE id=$id";

    if (mysqli_query($db, $sql)) {
        echo "Updated successfully";
        header("Location: AdminDashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
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
            <form method="POST" action="" autocomplete="off">
                <h2>Admin Register Here</h2>
                <input type="text" name="Admin_Name" placeholder="Enter Your Name Here" value="<?php echo $Admin_Name; ?>">
                <input type="text" name="Admin_Phone_Number" placeholder="Enter Phone Number Here" value="<?php echo $Admin_Phone_Number; ?>">
                <input type="email" name="Admin_Email" placeholder="Enter Your Email Here" value="<?php echo $Admin_Email; ?>">
                <input type="password" name="Admin_Password" placeholder="Enter Your Password Here" id="password" value="<?php echo $Admin_Password; ?>">
                <span class="toggle-password" onclick="togglePassword('password')"></span>
                <br>
                <br><label for="admin" style="padding-right: 295px; font-weight: bold; font-size: 17px;color: white;">Admin Role</label>
                <select id="admin" name="admin_option" required>
                    <option value="Admin for Academy" <?php if ($admin_option == 'Admin for Academy') echo 'selected'; ?>>Admin for Academy</option>
                    <option value="Admin for Caregivers" <?php if ($admin_option == 'Admin for Caregivers') echo 'selected'; ?>>Admin for Caregivers</option>
                    <option value="Admin for Management" <?php if ($admin_option == 'Admin for Management') echo 'selected'; ?>>Admin for Management</option>
                </select>

                <button class="btnn" type="submit" name="submit">Update</button>
                
                <p class="link">Do you have an account<br><a href="Adminlog.php">Sign in</a> here</p>
                <p class="liw">Log in with</p><br>
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
