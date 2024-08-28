<?php
$con = new mysqli('localhost', 'root', '', 'lecture_panel_db');

if ($con) {
    // echo "Connected";
} else {
    die(mysqli_error($con));
}
?>
