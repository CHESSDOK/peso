<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Job</title>
</head>
<body>
    <form action="post_job_process.php" method="post">
        <label for="job_title">Job Title:</label>
        <input type="text" name="job_title" id="job_title" required><br>

        <label for="job_description">Job Description:</label>
        <textarea name="job_description" id="job_description" required></textarea><br>

        <input type="submit" value="Post Job">
    </form>
</body>
</html>
