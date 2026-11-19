<?php
require_once __DIR__ . "/../exceptions/ValidationException.php";
try {
    $empty = "";
    if (empty($empty) || $empty === "") {
        // throw new ValidationException("Value is required..! Cannot be empty");
        throw new Exception("Value cannot be empty..!");
    }
} catch (ValidationException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    echo "\nCode completed";
}


# Notes :
// I can use Exception class for handling exception, but using custom exception classes maintain clearity
