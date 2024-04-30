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

<table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>123-456-7890</td>
                    <td>123 Main St, City</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
</body>
</html>
