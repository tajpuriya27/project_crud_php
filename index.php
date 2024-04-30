<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project-CRUD</title>
</head>
<body>
    <h1>Project CRUD</h1>
    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "project_crud_db";

    $conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

    ?>
</body>
</html>
