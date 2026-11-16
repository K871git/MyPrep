<?php
// session_start(); # needed for initialize new session or resumes the session

// $_SESSION['username'] = 'admin';
// $_SESSION['logged_in'] = true;
// $_SESSION = [];

# setcookie
setcookie('ok', 'cookie_set_using_setcookie() function', time() + 3600, '/');

try {

    if (isset($_COOKIE['ok'])) {
        $val = $_COOKIE['ok'];
    }

    $response = [
        "status" => true,
        "message" => $val ?? "cookie not exists",
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
    session_destroy();
}
