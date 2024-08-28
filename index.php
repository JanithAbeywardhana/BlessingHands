<?php
include("connect.php");

// Create the 'index' table if it does not exist
$sql_create_table = "
CREATE TABLE IF NOT EXISTS `findCareerForm` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    birth DATE NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    filename VARCHAR(255) NOT NULL
)";
mysqli_query($con, $sql_create_table);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $birth = $_POST['birth'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $filename = $_POST['filename'] ?? '';

    // Check if required fields are not empty
    if (!empty($name) && !empty($birth) && !empty($address) && !empty($email) && !empty($phone) && !empty($gender) && !empty($filename)) {
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO `findCareerForm` (name, birth, address, email, phone, gender, filename) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = mysqli_prepare($con, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'sssssss', $name, $birth, $address, $email, $phone, $gender, $filename);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            {echo"<script>alert('Thank Yoy...... Upload Your Details!'); window.location.href='home.php'</script>";}
            // header("Location: home.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Required fields are empty";
    }
}

// Close the database connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <style>
        .contact-form {
  background-color: #0a7185;
  position: relative;
}

    </style>
</head>
<body>
    <div class="container">
        <span class="big-circle"></span>
        <img src="img/44.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info" style=" background-image: url(img/33.png);">
                <!-- Additional content here -->
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form method="POST" action="index.php" autocomplete="off">
                    <h3 class="title">Find a Career</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" />
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="birth" class="input" />
                        <label for="">Birth</label>
                        <span>Birth</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="address" class="input" />
                        <label for="">Address</label>
                        <span>Address</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input" />
                        <label for="">Phone Number</label>
                        <span>Phone Number</span>
                    </div>
                    <div class="input-container">
                        <p>Please select your gender:</p>
                        <div>
                            
                            <label for="male">Male</label>
                            <input type="radio" id="male" name="gender" value="male">
                           
                            <br><label for="female"><br><br>Female</label>
                            <input type="radio" id="female" name="gender" value="female"><br>
                        </div>
                    </div>
                    <div class="input-container">
                        <p>Insert Your CV</p>
                        <input type="file" id="myFile" name="filename">
                    </div>
                    <input type="submit" value="Send" class="btn" />
                </form>
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>
</html>
