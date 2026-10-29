<?php
require_once __DIR__ . "/../../database/debug_config.php";
require_once __DIR__ . "/../../database/db_mysqli.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
# insert 
// $q = "INSERT into users (name,email) values('Aashtha 2','astha2@gmail.com')";

#update 
$q = "DELETE from users where email ='changed2@gmail.com' where id=2";

try {
    $result = $conn->query($q);
    if ($result) {
        echo "Record Updated successfully ..! : <br>";
        var_dump($conn->affected_rows);
    }
} catch (mysqli_sql_exception $e) {
    $errorRes = [
        "Status" => false,
        "Message" => "MySQL Error",
        "Error" => $e->getMessage(),
        "File" => $e->getFile(),
        "Line" => $e->getLine(),
        "code" => $e->getCode(),
    ];
    echo "<code>";
    echo json_encode($errorRes, JSON_PRETTY_PRINT);
    echo "</code>";
} finally {
    $conn->close();
}
