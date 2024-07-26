<?php
include 'conn_db.php';
session_start();

$user = $_SESSION['']; // Assume you store the user_id in session after login
$sql = "SELECT id FROM employer_profile WHERE user_id = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employer_id = $row['id'];

    $document_name = $_POST['document_name'];
    $document_path = "uploads/" . basename($_FILES["document"]["name"]);

    if (move_uploaded_file($_FILES["document"]["tmp_name"], $document_path)) {
        $sql = "INSERT INTO employer_documents (employer_id, document_name, document_path) VALUES ('$employer_id', '$document_name', '$document_path')";

        if ($conn->query($sql) === TRUE) {
            echo "Document uploaded successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Employer profile not found.";
}

$conn->close();
?>