<?php
# directory handling
$directory_path = __DIR__ . "/../../NEW_DIR/images";
$scan_dir = __DIR__ . "/../php";
# makind nested directories
// if (mkdir($directory_path . "/images", 0777, true)) {
//     echo "made new directory";
// }


// if (rmdir($directory_path)) { # directory must be empty
//     echo "removed the directory";
// }

#scanning directory
// $files = scandir($scan_dir);
// print_r($files);


# 0777 is octal representation for handling permissions
# 4 = read
# 2 = write
# 1 = execute : so 4 + 2 + 1 = 7 (means full permission of read, write, execute)
# 0: octal representee; 7 7 7 => owner,group,others
# 0400 : means only owner can only read, no write, no execute
# 0070 : group can execute, read, write


// ================= code

$create_backupdir = __DIR__ . "/backup";

$app_txtpath = $create_backupdir . "/app.txt";

if (mkdir($create_backupdir)) {
    echo "make backup directory  \n";
} else {
    echo "error while making directory  \n";
}


if (file_exists(__DIR__ . "/app.txt")) {
    echo "file exists \n";
} else {
    echo "file does app.txt not exists please create it \n";
}
file_put_contents(__DIR__ . "/app.txt", "created this file using file_put_contents");

if (file_exists(__DIR__ . "/app.txt")) {
    echo "file exists \n";
} else {
    echo "file app.txt not exists please create it";
}

if (copy(__DIR__ . "/app.txt", $app_txtpath)) {
    echo "file copied into backup directory \n";
} else {
    echo "Error while copying the file \n";
}

if (file_exists($app_txtpath)) {
    echo "file exists \n";
    echo filesize($app_txtpath);
} else {
    echo "file does not exists \n";
}
