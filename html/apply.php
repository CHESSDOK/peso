<?php
if (isset($_GET['job'])) {
    $jobTitle = urldecode($_GET['job']);
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Apply for <?php echo htmlspecialchars($jobTitle); ?></h1>
        <form action="../php/submit_application.php" method="post">
            <input type="hidden" name="job" value="<?php echo htmlspecialchars($jobTitle); ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="resume">Resume:</label>
            <textarea id="resume" name="resume" rows="4" required></textarea>
            <input type="submit" value="Submit Application">
        </form>
    </div>
</body>
</html>
