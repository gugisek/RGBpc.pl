<?php
define('CV_KEY', 'Marta123');

if (isset($_COOKIE['cv_key']) && $_COOKIE['cv_key'] === CV_KEY) {
    include __DIR__ . '/cv_app.php';
} else {
    include __DIR__ . '/login_form.php';
}
