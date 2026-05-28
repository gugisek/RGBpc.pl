<?php
define('CV_KEY', 'Marta123');

if (!isset($_COOKIE['cv_key']) || $_COOKIE['cv_key'] !== CV_KEY) {
    http_response_code(401);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$file = $_FILES['img'] ?? null;
if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Upload error: ' . ($file['error'] ?? 'no file')]);
    exit;
}

// Validate by actual mime type, not browser-reported
$mime = mime_content_type($file['tmp_name']);
$allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/avif'];

if (!in_array($mime, $allowed)) {
    http_response_code(400);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Niedozwolony typ pliku']);
    exit;
}

if ($file['size'] > 8 * 1024 * 1024) {
    http_response_code(400);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Plik zbyt duży (max 8 MB)']);
    exit;
}

$extMap = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'image/gif'  => 'gif',
    'image/webp' => 'webp',
    'image/avif' => 'avif',
];
$ext = $extMap[$mime] ?? 'jpg';

$uploadDir = __DIR__ . '/data/uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$filename = uniqid('img_', true) . '.' . $ext;
$dest     = $uploadDir . $filename;

if (!move_uploaded_file($file['tmp_name'], $dest)) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Nie udało się zapisać pliku']);
    exit;
}

header('Content-Type: application/json');
echo json_encode(['url' => 'data/uploads/' . $filename]);
