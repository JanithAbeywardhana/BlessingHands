<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blessings | Hands </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        color: white;
        font-size: 20px;
        font-weight: bold;
        background: linear-gradient(to top, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0.5) 50%), url(img/adpan.png);
        background-position: center;
        background-size: cover;
    }
    .btn-group-custom {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-right: 45px;
        align-items: center; /* Center items horizontally */
        justify-content: center; /* Center items vertically */
        gap:2rem;
    }
    .btn-custom {
        width: 20%;
        text-align: center;
        
        
    }
</style>
<body><br><br>
    <h2 style="text-align: center; font-size: 60px;">Admin Panel Management</h2>

    <div class="container">
        <div class="btn-group-custom my-5">
            <button class="btn btn-primary btn-custom"><a href="http://localhost/phpmyadmin/" class="text-light">View Database</a></button>
            <button class="btn btn-primary btn-custom"><a href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=lecture_panel_db&table=registerform" class="text-light">Manage User</a></button>
            <button class="btn btn-primary btn-custom"><a href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=lecture_panel_db&table=findcareerform" class="text-light">View Find Career</a></button>
            <button class="btn btn-primary btn-custom"><a href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=lecture_panel_db&table=feedbackform" class="text-light">Manage Feedback</a></button>
           <br>
           <button class="btn btn-success btn-custom"><a href="home.php" class="text-light">View   Site</a></button>
        </div>
        <button class="btn btn-secondary btn-custom"><a href="Register.php" class="text-light">Add User</a></button>
        <button class="btn btn-secondary btn-custom"><a href="Adminregister.php" class="text-light">Add Admin</a></button>

       <br><br> <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="color: black; font-size: 24px; font-weight: bold; background-color: cornflowerblue;">Admin ID</th>
                    <th scope="col" style="color: black; font-size: 24px; font-weight: bold; background-color: cornflowerblue;">Admin Name</th>
                    <th scope="col" style="color: black; font-size: 24px; font-weight: bold; background-color: cornflowerblue;">Mobile No</th>
                    <th scope="col" style="color: black; font-size: 24px; font-weight: bold; background-color: cornflowerblue;">Email</th>
                    <th scope="col" style="color: black; font-size: 24px; font-weight: bold; background-color: cornflowerblue;">Password</th>
                    <th scope="col" style="color: black; font-size: 24px; font-weight: bold; background-color: cornflowerblue;">Option</th>
                    <th scope="col" style="color: black; font-size: 24px; font-weight: bold; background-color: cornflowerblue;">Process</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM adminRegisterForm";
                $result = mysqli_query($db, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $Admin_Name = $row['Admin_Name'];
                        $Admin_Phone_Number = $row['Admin_Phone_Number'];
                        $Admin_Email = $row['Admin_Email'];
                        $Admin_Password = $row['Admin_Password'];
                        $admin_option = $row['admin_option'];
                        echo '<tr>
                                <th scope="row">' . $id . '</th>
                                <td>' . $Admin_Name . '</td>
                                <td>' . $Admin_Phone_Number . '</td>
                                <td>' . $Admin_Email . '</td>
                                <td>' . $Admin_Password . '</td>
                                <td>' . $admin_option . '</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-primary" style="margin-right: 10px;">
                                         <a href="UpdateAdmin.php?updateid=' . $id . '" class="text-light">Update</a>
                                        </button>

                                        <button class="btn btn-danger">
                                         <a href="RemoveAdmin.php?deleteid=' . $id . '" class="text-light">Delete</a>
                                        </button>

                                    </div>
                                    
                                </td>
                              </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
