<?php
$filePath = __DIR__ . "/../../resources/txtdir/app.txt";
$file = fopen($filePath, "r"); # at this point PHP opens the file and place the pointer at the beginning "apple"

if ($file === false) {
    die("Failed to open file..!");
}

try {
    # file_get_contents 
    $content = file_get_contents($filePath);
    if ($content === false) {
        die("Unable to read file");
    }
    echo $content;
} catch (Throwable $e) {
    $response = [
        "status" => false,
        "message" => $e->getMessage(),
        "line" => $e->getLine(),
        "file" => $e->getFile(),
    ];
    echo json_encode($response, JSON_PRETTY_PRINT);
} finally {
    fclose($file);
}
