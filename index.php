
<?php
require_once "database/debug_config.php";
// Main entry point for the Core PHP project
// require __DIR__."database/db_mysqli.php";

$page = $_GET['page'] ?? 'index';

$allowedPages = [
    'index' => __DIR__ . '/resources/html/index.html',
];

if (!isset($allowedPages[$page])) {
    http_response_code(404);
    exit('Page not found');
}

require $allowedPages[$page];
