<?php
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $database = "project_crud_db";

    $conn = new mysqli($hostname, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    ?>