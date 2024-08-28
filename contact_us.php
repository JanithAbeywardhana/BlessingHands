<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Check if required fields are not empty
    if (!empty($full_name) && !empty($email) && !empty($message)) {
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO feedbackForm (full_name, email, message) VALUES (?, ?, ?)";
        
        // Prepare the statement
        $stmt = mysqli_prepare($db, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'sss', $full_name, $email, $message);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
          {echo"<script>alert('Thank You For your Feedback!!'); window.location.href='contact_us.php'</script>";}

            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Required fields are empty";
    }
}

// Close the database connection
mysqli_close($db);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact_us.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Contact Us</title>
</head>
















<body>
  <nav>
    <ul class="nav-container">
        <li class="logo-container">
            <h1 class="logo">Blessing <span>Hands</span></h1>
        </li>
        <div class="navbar">
            <li><a href="home.php">Home</a></li>
            <li>
                <a href="">Academy <i class="fas fa-caret-down"></i></a>
                <ul class="dropdown">
                  <li><a href="courses.php">Courses</a></li>
                  <li><a href="lecture_panel.php">Lecture Panel</a></li>
                  <li><a href="find_a_career.php">Find A Career</a></li>
              </ul>
          </li>
          <li>
              <a href="">Services <i class="fas fa-caret-down"></i></a>
              <ul class="dropdown">
                  <li><a href="ambulance.php">Ambulance</a></li>
                  <li><a href="live_in_care.php">Live-in Care</a></li>
                  <li><a href="short_term.php">Short-term Care</a></li>
                  <li><a href="pricing.php">Pricing</a></li>
              </ul>
            </li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="home.php#about_us_container">About Us</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
        </div>
    </ul>
</nav>






















<!-- Feedback Form -->

  <section class="contact">

    <div class="container">


      <div class="contact-info">
        <div class="info">
        <br>
        <div class="box">
          <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></i>
          </div>
          <div class="text">
            <h3>Address</h3> 
            <p> No 110/B/1,<br>New Kandy Road,<br>Kothalawala,<br>Kaduwela.</p>
          </div>
        </div>
        <br>
        <div class="box">
          <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i>
          </div>
          <div class="text">
            <h3>Phone</h3> 
            <p>+94 81 345 7643</p>
          </div>
        </div>
        <br>
        <div class="box">
          <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i>
          </div>
          <div class="text">
            <h3>Email</h3> 
            <p>jcblessinghands.pvt.ltd@gmail.com</p>
          </div>
        </div>
      </div>


      <div class="contact-form"> 
        <form action="contact_us.php" method="post">
          <h2>Send Feedback</h2>
          <div class="input-box">
            <input type="text" name="full_name" required="required">
            <span>Full Name</span>
          </div>
          <div class="input-box">
            <input type="text" name="email" required="required">
            <span>Email</span>
          </div>
          <div class="input-box">
            <textarea required="required" name="message" rows="3"></textarea><br>
            <span>Type your message</span>
          </div>
          <div class="input-box">
            <input type="submit" name="" value="Send">
          </div>
        </form>

        
      </div>

    </div> 


    </div>

  </section>

  <div class="card-container">
    <p>We deeply value your experience with Blessing Hands Elderly Care & Nursing Academy. <br>
      Your detailed feedback helps us understand how well we are meeting your needs and where we can improve. 
      By sharing your thoughts and suggestions, you help us enhance our care services. <br>
      Whether it's about the quality of care, our staff, or any other aspect, your input is crucial. <br>
      We are committed to continuously improving, and your feedback is the driving force behind our progress. <br>
      Please take a moment to let us know how we can serve you better.</p>
  </div>

<br><br><br>











  







 <!-- Home Page Footer -->
  
 <footer>
  <div class="footer-container">
      <div class="footer-content">
        <h3>Contact Us</h3><br>
        <p>Email: blessinghands@gmail.com</p><br>
        <p>Phone: +94 71 7912 270</p><br>
        <p>Address: 110/B/1, New Kandy Rd, Kothalawala, Kaduwela.</p>
      </div><br>

      <div class="footer-content">
          <h3>Quick Links</h3><br>
          <ul class="list">
              <li><a href="home.php">Home</a></li>
              <li><a href="academy.php">Academy</a></li>
              <li><a href="ambulance.php">Services</a></li>
              <li><a href="gallery.php">Gallery</a></li>
              <li><a href="about_us.php">About Us</a></li>
              <li><a href="contact_us.php">Contact Us</a></li>
          </ul>
      </div><br>

      <div class="footer-content">
          <h3>Follow Us</h3><br>
          <ul class="social-icons">
              <li><a href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
          </ul>
      </div>
  </div>

  <div class="bottom-bar"><br>
      <p>Copyright &copy;2024; All rights reserved by <span class="designer">64 Group05</span></p>
  </div>
</footer>






              
</body>











</html>