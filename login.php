<?php
include("db.php");
if(isset($_POST['Email'])&& isset($_POST['Password']))
{
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    if(empty($Email))
    {
        header("Location:loginform.php");
        exit();
    }
    elseif(empty($Password))
    {
        header("Location:loginform.php");
        exit(); 
    }
    else
    {
        
        $sql="Select * from registerform where Email='$Email' and Password='$Password'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result))
        {
            $row=mysqli_fetch_assoc($result);
            if($row['Email']==$Email && $row['Password']==$Password)
            {
                {echo"<script>alert('Login Successfull!'); window.location.href='Carecourses.php'</script>";}
                // header("Location:index.php");
            }
        }else{echo"<script>alert('Invalid Email or Password!'); window.location.href='loginform.php'</script>";}
    }
}
else{
    echo"empty";
    header("Location:loginform.php");
    exit();
}
?>