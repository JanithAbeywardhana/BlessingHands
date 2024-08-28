<?php
include("db.php");

if(isset($_POST['Admin_email']) && isset($_POST['Admin_password'])) {
    $Admin_Email = $_POST['Admin_email'];
    $Admin_Password = $_POST['Admin_password'];
    
    if(empty($Admin_Email)) {
        header("Location:Adminlog.php");
        exit();
    } elseif(empty($Admin_Password)) {
        header("Location:Adminlog.php");
        exit(); 
    } else {
        $sql = "SELECT * FROM adminRegisterForm WHERE Admin_Email='$Admin_Email' AND Admin_Password='$Admin_Password'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if($row['Admin_Email'] == $Admin_Email && $row['Admin_Password'] == $Admin_Password) {
                echo "<script>alert('Admin Login Successful!'); window.location.href='AdminDashboard.php'</script>";
            }
        } else {
            echo "<script>alert('Invalid Email or Password!'); window.location.href='Adminlog.php'</script>";
        }
    }
} else {
    echo "empty";
    header("Location:Adminlog.php");
    exit();
}
?>
