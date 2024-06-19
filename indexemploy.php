<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['usertype'] != 'Employer') {
    header("Location: html/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Navigation -->

    <nav>
        <div class="logo">
            <img src="img/logo_peso.png" alt="Logo">
            <a href="#"> PESO-lb.ph</a>
        </div>
        <label class="burger" for="burger">
            <input type="checkbox" id="burger">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <ul class="menu">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="html/about.html">About Us</a></li>
            <li><a href="html/applicant.html">Applicant</a></li>
            <li><a href="html/employer.html">Employer</a></li>
            <li><a href="html/services.html">Services</a></li>
            <li><a href="html/contact.html">Contact</a></li>
        </ul>
        <div class="auth">
            <button id ="loginButton">For editing</button>
        </div>
    </nav>

    <!-- Body -->

    <div class="container">
        <div class="content">
            <p> <span class="label1">PESO</span><span class="label2">Los Baños</span><br />
            <span class="label3">Public Employment Service Office</span><br>
            <span class="label4"> JOB PORTAL &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><br>
            <span class="label5">YOUR <span style="color: #3D93D3; font-weight: bold">NEW CAREER </span> STARTS HERE!</span></p>
            <button class="label6">Find Job</button>
            <p><span class="label7"> Available in one roof the various employment promotion, manpower programs, and services of the DOLE </span><br>
                <span class="label8">and other government agencies to enable all types of clientele to know more about them and seek </span> <br>
                <span class="label9"></span>specific assistance they require.</span></p>
        </div>
    </div>

   <script src="javascript/script.js"></script> <!-- You can link your JavaScript file here if needed -->
</body>
</html>
