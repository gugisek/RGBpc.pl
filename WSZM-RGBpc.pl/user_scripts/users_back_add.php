<?php
include 'conn_db.php';
$name = $_POST['name'];
$surname = $_POST['sur_name'];
$mail = $_POST['mail'];
$role_id = $_POST['role'];
$status_id = $_POST['status'];
$login = $_POST['login'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
if ($password == $password2 && !empty($password) && !empty($password2) && !empty($name) && !empty($surname) && !empty($mail) && !empty($role_id) && !empty($status_id)) {
    $login = hash('sha256', $login);
    $sql = "SELECT login FROM users WHERE login='$login'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if ($row['login'] == $login) {
        header('Location: ../panel.php?page=użytkownicy&action=add_same');
    } else {
        $password = hash('sha256', $password);
        $sql = "INSERT INTO `users` (`id`, `login`, `name`, `sur_name`, `pswd`, `mail`, `role_id`, `create_date`, `update_date`, `status_id`) VALUES (NULL, '$login', '$name', '$surname', '$password', '$mail', '$role_id', current_timestamp(), current_timestamp(), '$status_id')";
        if ($conn->query($sql) === TRUE) {
            header('Location: ../panel.php?page=użytkownicy&action=added');
        } else {
            header('Location: ../panel.php?page=użytkownicy&action=error');
        }
    }
    
} elseif (empty($password) or empty($password2) or empty($name) or empty($surname) or empty($mail) or empty($role_id) or empty($status_id)) {
            header('Location: ../panel.php?page=użytkownicy&action=add_empty');
} else (
    header('Location: ../panel.php?page=użytkownicy&action=add_pswd')
)
?>