<?php

// Create cookie
if (isset($_GET['save'])) {

    setcookie("theme", "dark", [
        "expires" => time() + 3600,
        "path" => "/AppManager/",
        "httponly" => true,
        "secure" => false,
        "samesite" => "Lax"
    ]);

    echo "Cookie created. Refresh the page.";
}

// Read cookie
echo "<br>Theme: " . htmlspecialchars(
    $_COOKIE['theme'] ?? 'Not set'
);

// Delete cookie
if (isset($_GET['delete'])) {

    setcookie("theme", "", [
        "expires" => time() - 3600,
        "path" => "/AppManager/",
        "httponly" => true,
        "secure" => false,
        "samesite" => "Lax"
    ]);

    echo "<br>Cookie deleted. Refresh the page.";
}
