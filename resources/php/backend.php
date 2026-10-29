<?php
require_once __DIR__ . "/../../database/debug_config.php";
require_once __DIR__ . "/../../database/db_mysqli.php";
// require_once __DIR__ . "/../../database/pdo_db.php";


$query = "SELECT * from users";
// $query = "SELECT * from users where id=1";
// $query="SELECT * from users where name like '%Smith%'";
// $query = "SELECT * from devices where device_identifier is null";
$result = $conn->query($query);

if ($result === false) {
    die("Query Failed" . $conn->error);
}

if ($result === false) {
    die($conn->error);
}

echo "<table style='border: 1px solid #999; border-collapse: collapse; width: 100%;'>";
echo "<thead>";
echo "<tr>";
echo "<th style=\"border: 1px solid #999; padding: 8px;\">Name</th>";
echo "<th style=\"border: 1px solid #999; padding: 8px;\">Email</th>";
echo "<th style=\"border: 1px solid #999; padding: 8px;\">Created At</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style=\"border: 1px solid #999; padding: 8px;\">" . htmlspecialchars($row["name"], ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td style=\"border: 1px solid #999; padding: 8px;\">" . htmlspecialchars($row["email"], ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td style=\"border: 1px solid #999; padding: 8px;\">" . htmlspecialchars($row["created_at"], ENT_QUOTES, "UTF-8") . "</td>";
        echo "</tr>";
    }
}

echo "</tbody>";
echo "</table>";



$conn->close(); # close the connection to release the resources
