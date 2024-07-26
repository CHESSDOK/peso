<?php
include 'conn_db.php';

$document_id = $_GET['id'];

$sql = "UPDATE employer_documents SET is_verified = TRUE WHERE id = '$document_id'";

if ($conn->query($sql) === TRUE) {
    echo "Document verified successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
