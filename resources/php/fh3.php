<?php
$filePath = __DIR__ . "/../../resources/txtdir/app.txt";
$file = fopen($filePath, "w"); # at this point PHP opens the file and place the pointer at the beginning "apple"

if ($file === false) {
    die("Failed to open file..!");
}

try {
    // # file_get_contents // it doesn't require the fopen and fclose
    // $content = file_get_contents($filePath); 
    // if ($content === false) {
    //     die("Unable to read file");
    // }


    #reading the content
    $content = file_get_contents($filePath);
    echo $content . "\n";

    #writing into the file
    $text = ["apple", "banana", "new dominance", "doomsday"];
    $string = implode(PHP_EOL, $text);
    $bytes = fwrite($file, $string);

    $content = file_get_contents($filePath);
    echo $content . "\n";
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
