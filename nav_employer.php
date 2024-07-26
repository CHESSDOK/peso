 <!-- Navigation -->
 <?php

// Assuming $conn is your valid database connection
include 'php/conn_db.php'; // Include your database connection script

$userId = $_SESSION['id'];
$sql = "SELECT * FROM register WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Invalid query: " . $conn->error);
}

$row = $result->fetch_assoc();
if (!$row) {
    die("User not found.");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="stylesheet" href="css/style.css">
    <style>
        a.disabled {
        color: #d3d3d3;
        pointer-events: none;
        cursor: default;
        }
    </style>
</head>
<body>
 <nav>
        <div class="logo">
            <img src="../img/logo_peso.png" alt="Logo">
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
            <li><a href="html/upload_document.php">documents</a></li>
            <li><a href="html/about.html">About Us</a></li>
            <li><a href="html/employer.php">Employer</a></li>
            <li><a href="html/services.html">Services</a></li>
            <li><a href="html/contact.html">Contact</a></li>
        </ul>
        <div class="auth">
        <button id ="emprof">  <?php echo htmlspecialchars($row['Fname']); ?> </button>
        </div>
    </nav>
    <script>
            document.getElementById("emprof").addEventListener("click", function (event) {
        event.preventDefault(); // Prevent default link behavior

        // Change the URL after the transition ends
        setTimeout(function () {
            window.location.href = "html/emprof.php";
        }, 300); // Adjust the delay according to your transition duration

        // Adding the class to initiate the fade-in and slide-up animation
        document.body.classList.add('fade-in');
    });
     </script> 
</body>
</html>