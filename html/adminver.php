<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Documents</title>
</head>
<body>
    <h2>Documents to Verify</h2>
    <table border="1">
        <tr>
            <th>Document Name</th>
            <th>Download</th>
            <th>Verify</th>
        </tr>
        <?php
        include '../php/conn_db.php';
        $sql = "SELECT * FROM employer_documents WHERE is_verified = FALSE";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['document_name'] . "</td>";
            echo "<td><a href='" . $row['document_path'] . "' download>Download</a></td>";
            echo "<td><a href='../php/verify_documents.php?id=" . $row['id'] . "'>Verify</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
