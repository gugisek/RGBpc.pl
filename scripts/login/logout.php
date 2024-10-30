<?php 
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['alert_type'] = "success";
$_SESSION['alert'] = 'Wylogowano pomyślnie.';
header('Location: ../../login.php');
?>