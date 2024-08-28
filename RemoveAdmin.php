<?php
include 'db.php';

if(isset($_GET['deleteid']))
$id=$_GET['deleteid'];

$sql="delete from adminRegisterForm where id=$id";
$result=mysqli_query($db,$sql);
if ($result){
    // echo "Deleted Success";
    header('Location:AdminDashboard.php');
}else {
    die(mysqli_error($db));
}
    
?>