<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project-CRUD</title>
</head>

<body>
    <h1>Project CRUD</h1>
    <h6>Database connection: <span><i><?php
                                        include 'db_conn.php';
                                        ?></i></span></h6>

    <h2>Form</h2>
    <form action="form_process.php" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address">
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea name="message" id="message"></textarea>
        </div>
        <input style="margin-top: 10px;" type="submit" value="Submit">
    </form>

    <h2>Records</h2>
    <table>
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
            <!-- inquiry in database and show the details -->
            <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            // var_dump($result);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>