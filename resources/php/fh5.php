<?php
$filePath = __DIR__ . "/../txtdir/app.txt";
$copyPath = __DIR__ . "/../../database/databackup.php";
$renPath = __DIR__ . "/../php/ren.php";
$dir = __DIR__ . "/../php";
try {

    if (file_exists($filePath)) {
        # delete an file
        // if (unlink($filePath)) {
        //     echo "file deleted";
        // } else {
        //     echo "file not deleted";
        // }

        # copy and rename
        // $copy = copy($filePath, "backup.txt");
        // if ($copy) {
        //     echo "copy done..!";
        // } else {
        //     echo "something is fishy";
        // }

        # either rename or move file to that path
        if (rename($filePath, $renPath)) {
            echo "rename done";
        }
    } else {
        echo "file not found";
    };

    // if (is_file($filePath)) {
    //     echo "Done";
    // } else {
    //     echo "None";
    // }
} finally {
    fclose($file);
}


# file_exists check weather file or directory exists
# unlink delete the file, return true and false, require the permission from filesystem 
# is_file() and is_dir for specifically checking file and directory exists, return true and false