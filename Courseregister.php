<?php
session_start(); 

// Database connection eka
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lecture_panel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $course = $_POST['course'];


    $sql = "INSERT INTO registrations (firstname, lastname, email, course_id) VALUES ('$firstname', '$lastname', '$email', '$course')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['registration_status'] = "success";
    } else {
        $_SESSION['registration_status'] = "error";
    }

    
    header("Location: Carecourses.php"); 
    exit();
}

$conn->close();
?>