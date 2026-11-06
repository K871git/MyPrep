<?php
# handling the file uploading data
$uploader = $_POST['uploader'] ?? '';
$file = $_FILES['uploaded_file'] ?? null;

if (!$file) {
    sendMessage(400, false, "No file recieved");
}

if ($file['error'] !== UPLOAD_ERR_OK) {
    sendMessage(400, false, "File Upload Failed..!");
}

if ($file['size'] > 2 * 1024 * 1024) {
    sendMessage(400, false, "File is too large..!");
}

# allowed extensions
$allowed_ext_types = ["jpeg", "jpg", "pdf", "png", "txt"];
$allowed_mime_types = [
    'jpg' => 'image/jpg',
    'png' => 'image/png',
    'pdf' => 'application/png',
    'txt' => 'text/plain',
];

$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if (!in_array($extension, $allowed_ext_types)) {
    sendMessage(400, false, "Invalid file type..!");
}


# checking MIME type
$finfo = finfo_open(FILEINFO_MIME_TYPE);

$mime = finfo_file($finfo, $file['tmp_name']);

if (($allowed_mime_types[$extension] ?? '') !== $mime) {
    sendMessage(400, false, "Invalid File Content");
}
finfo_close($finfo);


# uploading the file
$newName = bin2hex(random_bytes(16)) . "." . $extension;

$byte = random_bytes(16);

$uploadDir = __DIR__ . "/../../uploads/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
};

$destination = $uploadDir . $newName;
 
if (!move_uploaded_file($file['tmp_name'], $destination)) {
    sendMessage(500, false, "Failed to save File");
    exit;
}

echo json_encode([
    "status" => true,
    "message" => "File uploaded successfully",
    "filename" => $newName
]);


function sendMessage($code, $status, $message)
{
    http_response_code($code);
    echo json_encode([
        "status" => $status,
        "message" => $message,
    ]);
    exit;
}
