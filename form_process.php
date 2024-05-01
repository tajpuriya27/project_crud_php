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

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $last_id);
$stmt->execute();

$result = $stmt->get_result();
$latest_data = $result->fetch_assoc();

$conn->close();

echo json_encode($latest_data);
exit();
