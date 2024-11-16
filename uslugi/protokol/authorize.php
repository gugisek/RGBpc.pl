<?php
session_start();
$key = $_POST['key'];
if($key == 'Jablko1'){
    setcookie('key', $key, time() + 60*60*24*30);
    header('Location: /uslugi/protokol/');
}else{
    $_SESSION['error'] = 'Nieprawidłowy klucz';
    header('Location: /uslugi/protokol/');
}