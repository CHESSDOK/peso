<?php
include 'conn_db.php';
session_start();

$user_id = $_SESSION['id']; // Assume you store the user_id in session after login

// Check if employer documents are verified
$sql = "SELECT COUNT(*) AS count FROM employer_documents WHERE employer_id = '$user_id' AND is_verified = TRUE";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];
    $date_posted = date('Y-m-d');

    $sql = "INSERT INTO job_postings (employer_id, job_title, job_description, date_posted) VALUES ('$user_id', '$job_title', '$job_description', '$date_posted')";

    if ($conn->query($sql) === TRUE) {
        echo "Job posted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Your documents are not verified yet. Please wait for verification.";
}

$conn->close();
?>
