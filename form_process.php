<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include 'db_conn.php';

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $phone = sanitizeInput($_POST["phone"]);
    $address = sanitizeInput($_POST["address"]);
    $message = sanitizeInput($_POST["message"]);
}


$stmt = $conn->prepare("INSERT INTO users (name, email, phone, address, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $address, $message);


$stmt->execute();
$last_id = $conn->insert_id;

$stmt->close();
$conn->close();


echo json_encode(array("id" => $last_id, "name" => $name, "email" => $email, "phone" => $phone, "address" => $address, "message" => $message));
exit();
