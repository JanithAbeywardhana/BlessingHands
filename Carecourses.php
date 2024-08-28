<?php

session_start();

// Database connection 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lecture_panel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//  courses 
$courses_sql = "SELECT * FROM courses";
$courses_result = $conn->query($courses_sql);

//  lecturers
$lecturers_sql = "SELECT * FROM lecturers";
$lecturers_result = $conn->query($lecturers_sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="Carecourses.css">
    <style>



.description {
    text-align: center;
    margin: 20px 20px;
    padding: 20px;
    background: #0a7185;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    color: white;
}

/*Courses section CSS*/
:root {
    --primary-color: #0a7185;
    --primary-color-dark: black;
    --text-dark: #0c0a09;
    --text-light: #78716c;
    --white: #ffffff;
    --max-width: 1200px;
}

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.section_container {
    max-width: var(--max-width);
    margin: auto;
    padding: 5rem 1rem;
}

.section_subheader::after {
    position: absolute;
    content: "";
    top: 50%;
    transform: translate(1rem, -50%);
    height: 2px;
    width: 4rem;
    /* background-color: var(--primary-color); */
}

.section_header {
    max-width: 600px;
    margin-bottom: 1rem;
    font-size: 2.5rem;
    font-weight: 600;
    line-height: 3rem;
    color: var(--text-dark);
}

.section_description {
    max-width: 600px;
    margin-bottom: 1rem;
    color: var(--text-light);
}

.btn {
    padding: .75rem 1.5rem;
    outline: none;
    border: none;
    font-size: 1rem;
    font-weight: 500;
    color: var(--white);
    background-color: var(--primary-color);
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover {
    background-color: var(--primary-color-dark);
}

img {
    width: 100%;
    display: block;
}

a {
    text-decoration: none;
}

.logo {
    max-width: 120px;
}

html,
body {
    scroll-behavior: smooth;
}

body {
    font-family: "Poppins", sans-serif;
}

/* Lecture Panel */
.lecture_panel {
    margin: 50px 0;
    padding: 20px;
    background: white;
    border-radius: 12px;
    width: 100%;
    
    position: relative;
}

.lecture_table {
   
    width: 113%;
    border-collapse: collapse;
    margin: 20px 0;
    font-family: 'Roboto', sans-serif;
}

.lecture_table th, .lecture_table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    transition: background-color 0.3s;
}

.lecture_table th {
    background: linear-gradient(135deg, #0a7185, #0fa6c4);
    color: white;
    font-size: 1.2em;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.lecture_table td {
    background: #f9f9f9;
    position: relative;
}

.lecture_table tr:hover td {
    background-color: #0fa6c4;
}

.lecturer_image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 3px solid black;
    transition: transform 0.3s ease-in-out, border-color 0.3s ease-in-out;
    display: block;
    margin: 0 auto;
}

.lecturer_image:hover {
    transform: scale(1.1);
    border-color: orange;   q
}

@media (max-width: 768px) {
    .lecture_table th, .lecture_table td {
        padding: 10px;
    }

    .lecturer_image {
        width: 80px;
        height: 80px;
    }
}

@media (max-width: 480px) {
    .lecture_table th, .lecture_table td {
        display: block;
        width: 100%;
        text-align: center;
        border-bottom: none;
        padding: 10px 5px;
    }

    .lecture_table th {
        background: none;
        color: #7bbffe;
    }

    .lecture_table td {
        background: none;
    }

    .lecture_table tr {
        border: 1px solid #ddd;
        border-radius: 12px;
        margin-bottom: 10px;
        overflow: hidden;
    }

    .lecturer_image {
        width: 70px;
        height: 70px;
    }
}



/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 10px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

form label {
    display: block;
    margin: 10px 0 5px;
}

form input, form select {
    width: 100%;
    padding: 10px;
    margin: 5px 0 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form button {
    width: 100%;
    padding: 10px;
    background-color: #0a7185;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form button:hover {
    background-color: #0fa6c4;
}

/*Success-message CSS*/
.success-message {
    display: none;
    margin: 20px 0;
    padding: 15px 20px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-size: 1.1em;
    font-weight: bold;
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1000;
    animation: fadeInOut 5s ease-in-out;
}

@keyframes fadeInOut {
    0% { opacity: 0; transform: translateY(-10px) translateX(-50%); }
    10% { opacity: 1; transform: translateY(0) translateX(-50%); }
    90% { opacity: 1; transform: translateY(0) translateX(-50%); }
    100% { opacity: 0; transform: translateY(-10px) translateX(-50%); }
}

</style>
</head>
<body>
    <div class="title">
    <h1>Courses</h1>
    </div>


    <div class="row">
        <div class="column">
            <div class="image-wrapper">
            <img src="images/img2.jpg" width="485" height="350">
          <div class="overlay">Empathy</div>
        </div>
        </div>

        <div class="column">
            <div class="image-wrapper">
            <img src="images/img3.jpg" width="485" height="350">
          <div class="overlay">Education</div>
        </div>
        </div>

        <div class="column">
            <div class="image-wrapper">
          <img src="images/img4.jpg" width="485" height="350">
          <div class="overlay">Essentials</div>
        </div>
      </div>
    </div>
    
    <div class="description"  >
      <h2>
        Discover the essential skills and knowledge needed to excel in caregiving through our comprehensive courses. 
        Gain practical experience, develop empathy, and learn best practices to provide exceptional care for those in need. 
        Join us to become a compassionate and competent caregiver.</h2>
    </div>




    
    <!-- Course Section -->

    <section class="section_container course_container">
        <p class="section_subheader">Current Courses Available</p>
        <h2 class="section_header">Explore Our Top-Rated Courses!</h2>
        <div class="course_grid">
            <?php
            if ($courses_result->num_rows > 0) {
                while($row = $courses_result->fetch_assoc()) {
                    echo '<div class="course_card">';
                    echo '<div class="course_card_image">';
                    echo '<img src="images/' . $row["image"] . '" alt="course">';
                    echo '</div>';
                    echo '<div class="course_card_details">';
                    echo '<h4>' . $row["title"] . '</h4><br>';
                    echo '<p>' . $row["description"] . '</p><br>';
                    echo '<button class="btn" onclick="openRegisterForm()">Register</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No courses available.";
            }
            ?>
        </div>
    </section>


    <!-- Registration Form -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeRegisterForm()">&times;</span>
            <h2>Register for the Course</h2>

            <form id="registerForm" action="Courseregister.php" method="POST">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" required>

                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="course">Course</label>
                <select id="course" name="course" required>
                    <?php
                    
                    $courses_result_for_dropdown = $conn->query($courses_sql);
                    if ($courses_result_for_dropdown->num_rows > 0) {
                        while($row = $courses_result_for_dropdown->fetch_assoc()) {
                            echo '<option value="' . $row["id"] . '">' . $row["title"] . '</option>';
                        }
                    }
                    ?>
                </select>

                <button type="submit" class="btn">Register</button>
            </form>
        </div>
    </div>

    <div class="success-message" id="successMessage">
        Registration successful!
    </div>
  
      <script src="https://unpkg.com/scrollreveal"></script>
      <script src="Carecourse.js"></script>


    <!-- Lecture Panel -->
    <section class="section_container lecture_panel">
        
        <h2 class="section_header">Lecture Panel</h2>
        <p class="section_subheader">Our lecture panel includes renowned experts who provide valuable insights and knowledge across diverse subjects.</p><br>
        <table class="lecture_table">
            <thead>
                <tr>
                    <th>Profile Picture</th>
                    <th>Name</th>
                    <th>Expertise</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($lecturers_result->num_rows > 0) {
                    while($row = $lecturers_result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td><img src="images/' . $row["image"] . '" alt="' . $row["name"] . '" class="lecturer_image"></td>';
                        echo '<td>' . $row["name"] . '</td>';
                        echo '<td>' . $row["expertise"] . '</td>';
                        echo '<td>' . $row["description"] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "No lecturers available.";
                }
                ?>
            </tbody>
        </table>
    </section>

<!-- Registration form Js Part -->
    <script>
        function openRegisterForm() {
            document.getElementById('registerModal').style.display = 'block';
        }

        function closeRegisterForm() {
            document.getElementById('registerModal').style.display = 'none';
        }

        
        window.onclick = function(event) {
            if (event.target == document.getElementById('registerModal')) {
                document.getElementById('registerModal').style.display = 'none';
            }
        }

        <?php
        if (isset($_SESSION['registration_status'])) {
            if ($_SESSION['registration_status'] == "success") {
                echo 'document.getElementById("registerModal").style.display = "none";';
                echo 'document.getElementById("successMessage").style.display = "block";';
            } elseif ($_SESSION['registration_status'] == "error") {
                echo 'alert("There was an error with your registration. Please try again.");';
            }
            unset($_SESSION['registration_status']); 
        }
        ?>


    </script>

</body>
</html>

<?php
$conn->close();
?>