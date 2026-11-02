<?php
# fopen()
# $file is file handle, an variable represents the connection to that file
$filePath = __DIR__ . "/phprv2.php";
$file = fopen($filePath, "rb");
if ($file === false) {
    echo "Something went wrong while opening the file...!";
    return;
}
try {
    echo "Opening the file..!";
    $content = stream_get_contents($file);
    if ($content === false) {
        throw new RuntimeException("Could not read the file.");
    }
    echo "<br>";
    echo $content;
} catch (Throwable $e) {
    $errorRes = [
        "Status" => false,
        "Message" => "Connection Failed",
        "Error" => $e->getMessage(),
        "File" => $e->getFile(),
        "Line" => $e->getLine(),
        "code" => $e->getCode(),
    ];

    echo json_encode($errorRes, JSON_PRETTY_PRINT);
} finally {
    fclose($file);
}

/**
 * r = read only : file must exists ; error if not found
 * w = writes only : create file if not exist and truncate content if file exists
 * a = append : create file if needed : append at the end
 * r+ = read and write : file must exists : otherwise error
 * w+ = read and write : create file or truncate existing file : 
 * a+ = read and append : create file if missing
 */