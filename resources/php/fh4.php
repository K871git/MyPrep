<?php
$filePath = __DIR__ . "/../txtdir/app.txt";
try {
    $content = file_get_contents($filePath);
    echo $content;

    $text = ["Avengers", "Age of Ultron", "Infinity War", "Endgame"];
    $string = implode(PHP_EOL, $text);
    echo "\n";

    // file_put_contents($filePath, $string); # override by default
    file_put_contents($filePath, "\n" . $string, FILE_APPEND); # append at the end
    $content2 = file_get_contents($filePath);
    echo $content2;
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
