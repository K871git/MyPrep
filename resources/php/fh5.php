<?php
$filePath = __DIR__ . "/../txtdir/app.txt";
try {
    if (file_exists($filePath)) {
        echo "file exists";
    } else {
        echo "file not found";
    };
} finally {
    fclose($file);
}
