<?php
# handling the file uploading data
$uploader = $_POST['uploader'] ?? '';
$file = $_FILES['uploaded_file'] ?? null;

if (!$file) {
    sendError(400, "No file recieved");
}

if ($file['error'] !== UPLOAD_ERR_OK) {
    sendError(400, "File Upload Failed..!");
}

if ($file['size'] > 2 * 1024 * 1024) {
    sendError(400, "File is too large..!");
}
# allowed extensions
$allowed_mime_types = ["jpeg", "jpg", "pdf", "png", "txt"];


$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if (!in_array($extension, $allowed_mime_types)) {
    sendError(400, "Invalid file type..!");
}

// $finfo = finfo_open(FILEINFO_MIME_TYPE);

// $mime = finfo_file($finfo, $file['tmp_name']);

// finfo_close($finfo);

// $allowedMime = [
//     'jpg' => 'image/jpeg',
//     'png' => 'image/png',
//     'pdf' => 'application/pdf'
// ];

// if (($allowedMime[$extension] ?? '') !== $mime) {
//     die("Invalid file content");
// }


// uploading the file

$newName = bin2hex(random_bytes(16)) . "." . $extension;

$uploadDir = __DIR__ . "/../../uploads/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
};

$destination = $uploadDir . $newName;

if (!move_uploaded_file($file['temp_name'], $destination)) {
    sendError(500, "Failed to save File");
    exit;
}

echo json_encode([
    "status" => true,
    "message" => "File uploaded successfully",
    "filename" => $newName
]);


function sendError($code, $message)
{
    http_response_code($code);
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
