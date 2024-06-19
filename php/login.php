<?php
session_start();
include 'conn_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

$sql = "SELECT * FROM register WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            if ($user['is_verified'] == 1) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['usertype'] = $user['usertype'];

                if ($user['usertype'] == 'Applicant') {
                    header("Location: ../indexuser.php");
                } elseif ($user['usertype'] == 'Employer') {
                    header("Location: employer_dashboard.php");
                } elseif ($user['usertype'] == 'OFW') {
                    header("Location: ofw_dashboard.php");
                } else {
                    echo "Invalid user type.";
                }
            } else {
                echo "<script>alert('Please verify your email before logging in.');</script>";
            }
        } else {
            echo "<script>alert('Invalid email or password.');</script>";
        }
    } else {
        echo "<script>alert('No account found with this email.');</script>";
    }
}
?>
