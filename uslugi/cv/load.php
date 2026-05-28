<?php
define('CV_KEY', 'Marta123');

if (!isset($_COOKIE['cv_key']) || $_COOKIE['cv_key'] !== CV_KEY) {
    http_response_code(401);
    exit;
}

$file = __DIR__ . '/data/cv_data.json';
header('Content-Type: application/json');

if (!file_exists($file)) {
    echo 'null';
    exit;
}

$content = file_get_contents($file);
echo ($content !== false && $content !== '') ? $content : 'null';
