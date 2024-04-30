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
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>
        <input style="margin-top: 10px;" type="submit" value="Submit" class="btn btn-primary">
    </form>

    <h2>Records</h2>
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
        </tbody>
    </table>
</body>

</html>