<?php
# handling the file uploading data
$uploader = $_POST['uploader'] ?? '';
$file = $_FILES['uploaded_file'] ?? null;

if (!$file) {
    sendError("No file recieved");
}

if ($file['error'] !== UPLOAD_ERR_OK) {
    sendError("File Upload Failed..!");
}

if ($file['size'] > 2 * 1024 * 1024) {
    sendError("File is too large..!");
}
# allowed extensions
$allowed_mime_types = ["jpeg", "jpg", "pdf", "png", "txt"];


$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if (!in_array($extension, $allowed_mime_types)) {
    sendError("Invalid file type..!");
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);

$mime = finfo_file($finfo, $file['tmp_name']);

finfo_close($finfo);

$allowedMime = [
    'jpg' => 'image/jpeg',
    'png' => 'image/png',
    'pdf' => 'application/pdf'
];

if (($allowedMime[$extension] ?? '') !== $mime) {
    die("Invalid file content");
}


statusOK("Validation Success");


function sendError($message)
{
    http_response_code(400);
    echo json_encode([
        "status" => false,
        "message" => $message,
    ]);
    exit;
}

function statusOK($message)
{
    http_response_code(200);
    echo json_encode([
        "status" => false,
        "message" => $message,
    ]);
    exit;
}
