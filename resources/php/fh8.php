<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once __DIR__ . "/../phsp/dashboard.php";


// $non = null;
// $emp = "";
// $emp2 = '';
// $zero = 0;

// $active = 1;

// if (empty($act)) {
//     echo "empty";
// } else {
//     echo "--";
// }
// echo "\n" . empty($emp);
// echo "\n" . empty($emp2);
// echo "\n" . empty($zero);
// echo "\n" . empty($active);

try {

    echo "========================\nworking";
} catch (Throwable $e) {
    $response = [
        "status" => false,
        "error" => $e->getMessage(),
        "line" => $e->getLine(),
    ];
    echo json_encode($response, JSON_PRETTY_PRINT);
}
