<?php
  session_start();
  if(!isset($_SESSION['logged']))
  {
    $_SESSION['alert'] = 'Hola hola! Nie masz dostępu do tej strony. Zaloguj się!';
    $_SESSION['alert_type'] = 'warning';
    header('Location: login.php');
    exit();
  }
?>