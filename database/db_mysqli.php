<?php
require_once __DIR__ . "/../database/debug_config.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // configure the credentials
    $host = "localhost";
    $username = "root";
    $password = "npav";
    $database = "AppManagerDB";
    $port = 3307; # should be an integer # by default its 3306

    $conn = new mysqli($host, $username, $password, $database, $port);

    if ($conn->connect_error) {
        die("Connection Failed :" . $conn->connect_error);
    }

    if (!$conn->set_charset("utf8mb4")) {
        die("CHARSET ERROR :" . $conn->error);
    }

    // procedural style
    // $conn = mysqli_connect($host, $username, $password, $database, $port);

    // if (!$conn) {
    //     die('Connection failed' . mysqli_connect_error());
    // }
    // mysqli_set_charset($conn, "utf8mb4");
} catch (mysqli_sql_exception $e) {
    $errorRes = [
        "Status" => false,
        "Message" => "Connection Failed",
        "Error" => $e->getMessage(),
        "File" => $e->getFile(),
        "Line" => $e->getLine(),
        "code" => $e->getCode(),
    ];

    echo json_encode($errorRes, JSON_PRETTY_PRINT);
}
