<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job = $_POST['job'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $resume = $_POST['resume'];

    // Database connection
    include 'conn_db.php';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO applications (F_name, job, email, resume) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $job, $email, $resume);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<h1>Application Submitted</h1>";
        echo "<p>Thank you, $name, for applying for the $job position. We will review your application and get back to you at $email.</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
