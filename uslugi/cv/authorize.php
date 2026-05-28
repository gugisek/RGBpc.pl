<?php
define('CV_KEY', 'Marta123');

$pwd = $_POST['password'] ?? '';

if ($pwd === CV_KEY) {
    setcookie('cv_key', CV_KEY, time() + 60 * 60 * 24 * 30, '/');
    header('Location: ./');
} else {
    header('Location: ./?error=1');
}
exit;
