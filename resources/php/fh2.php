<?php
$filePath = __DIR__ . "/../../resources/txtdir/app.txt";
$file = fopen($filePath, "r"); # at this point PHP opens the file and place the pointer at the beginning "apple"

if ($file === false) {
    die("Failed to open file..!");
}

try {
    #fgets() and fgetc()
    /**
     * file contains :
     * apple
     * banana
     * chad
     * dominant
     */
    # program starts -> file pointer at "apple"
    // echo fgets($file); # prints apple then pointer moves to the next line "\n or EOF" goes to start of "banana"
    // echo fgets($file); # prints banana, pointer goes to the "chad"
    // echo fgets($file); # prints chad

    // rewind($file); # pointer at start of "dominant" goes to the very start of the file "apple" with rewind()
    // echo fgets($file); # prints apple, not dominant

    while (($char = fgetc($file)) !== false) {
        echo $char . "\n";
    }
    # \n works for cmd and <br> works for the printing output in web browser


    # fgetc # get one character at a time, pointer moves forword by one char
    // echo fgetc($file);
    // echo fgetc($file);
    // echo fgetc($file);
    // echo fgetc($file);
    // rewind($file); # pointer goes to the starting of the file
    // echo fgetc($file);
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
