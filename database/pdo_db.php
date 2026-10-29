<?php
// pdo : php data object : PHP interface
// it supports multiple databases like MySQL, PostgreSQL, SQLite

$host = "localhost";
$username = "root";
$password = "npav";
$database = "AppManagerDB";
$port = 3307;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4", $username, $password);

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION,
    );
    var_dump($pdo);
} catch (PDOException $e) {
    error_log($e->getMessage());
    exit("Database connection failed");
}
