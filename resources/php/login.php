<?php
session_start();
header("Content-Type:application/json");

// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//     http_response_code(405);
//     exit(json_encode(["Success" => false]));
// }

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$storedUsername = "admin";
$storedPassword = password_hash("Admin@123", PASSWORD_DEFAULT);

if ($username === $storedUsername && password_verify($password, $storedPassword)) {
    session_regenerate_id(true);

    $_SESSION['username'] = $username;
    $_SESSION['logged_in'] = true;

    echo json_encode([
        "success" => true,
        "message" => "Login Successfull"
    ]);
} else {
    http_response_code(401);

    echo json_encode([
        "success" => false,
        "message" => "Invalid credentials"
    ]);
}
