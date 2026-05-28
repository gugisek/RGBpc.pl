<?php
define('CV_KEY', 'Marta123');

if (!isset($_COOKIE['cv_key']) || $_COOKIE['cv_key'] !== CV_KEY) {
    http_response_code(401);
    exit;
}

$raw = file_get_contents('php://input');
if (!$raw) {
    http_response_code(400);
    exit;
}

json_decode($raw);
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    exit;
}

$file = __DIR__ . '/data/cv_data.json';
if (file_put_contents($file, $raw) === false) {
    http_response_code(500);
    exit;
}

header('Content-Type: application/json');
echo '{"ok":true}';
