<?php
session_start(); # needed for initialize new session

$_SESSION['username'] = 'admin';
$_SESSION['logged_in'] = true;
// $_SESSION = [];
session_destroy();
try {

    if (isset($_SESSION['username'])) {
        $msg = "username exists";
    }

    $response = [
        "status" => true,
        "message" => $msg ?? "Username not exists",
    ];
    echo json_encode($response, JSON_PRETTY_PRINT);
} catch (Throwable $e) {
    $response = [
        "status" => false,
        "message" => $e->getMessage(),
        "line" => $e->getLine(),
        "file" => $e->getFile(),
    ];
    echo json_encode($response, JSON_PRETTY_PRINT);
} finally {
    session_unset(); # remove all session variables
}
