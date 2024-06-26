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
    <!-- <form action="form_process.php" method="POST"> -->
    <form>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" pattern="[0-9]{10}" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea name="message" id="message"></textarea>
        </div>
        <input style="margin-top: 10px;" type="submit" value="Submit" />
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
    <script>
        document.querySelector("form").addEventListener("submit", handleSubmit);

        function handleSubmit(e) {
            e.preventDefault();
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;
            var message = document.getElementById("message").value;

            if (name == "" || email == "" || phone == "" || address == "" || message == "") {
                alert("All fields are required");
                return false;
            }
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (xhttp.readyState === 4 && xhttp.status === 200) {
                    document.getElementsByTagName("tbody")[0].innerHTML += "<tr><td>" + JSON.parse(xhttp.responseText).id + "</td><td>" + JSON.parse(xhttp.responseText).name + "</td><td>" + JSON.parse(xhttp.responseText).email + "</td><td>" + JSON.parse(xhttp.responseText).phone + "</td><td>" + JSON.parse(xhttp.responseText).address + "</td><td>" + JSON.parse(xhttp.responseText).message + "</td></tr>";
                }
            };
            // var data = "name=" + encodeURIComponent(name);
            var data = "name=" + encodeURIComponent(name) +
                "&email=" + encodeURIComponent(email) +
                "&phone=" + encodeURIComponent(phone) +
                "&address=" + encodeURIComponent(address) +
                "&message=" + encodeURIComponent(message);
            // console.log(data);



            xhttp.open("POST", "form_process.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(data);

            document.getElementById("name").value = "";
            document.getElementById("email").value = "";
            document.getElementById("phone").value = "";
            document.getElementById("address").value = "";
            document.getElementById("message").value = "";


        }
    </script>
</body>

</html>