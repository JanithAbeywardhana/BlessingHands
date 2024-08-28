<?php
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
    $caregiverId = $_POST['caregiverId'];

    
    $sql = "UPDATE Caregivers SET availability='Not Available' WHERE id='$caregiverId'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Caregiver hired successfully!'); window.location.href='FindCaregver.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>