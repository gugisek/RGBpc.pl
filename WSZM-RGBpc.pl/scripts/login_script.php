<?php
include 'conn_db.php';
$login_sha = hash('sha256', $_POST['login']);
$password_sha = hash('sha256', $_POST['password']);
$sql = "SELECT * FROM users WHERE login = '".$login_sha."' AND pswd = '".$password_sha."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
    $sql = "SELECT users.status_id, users.name, status_privileges.login FROM users join user_status on users.status_id=user_status.id join status_privileges on status_privileges.id=user_status.privileges WHERE users.login = '".$login_sha."' AND pswd = '".$password_sha."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $login = $row['login'];
    $name = $row['name'];
    if($login == 1)
    {
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $name;
        $_SESSION['login'] = $login_sha;
        header('Location: ../panel.php?page=dashboard');
    }
    else
    {
        session_start();
        $_SESSION['error'] = 'Konto nieaktywne, zablokowane lub wyłączone.<br><br> Skontaktuj się z administratorem';
        header('Location: ../login.php');
    }
}
else
{
    session_start();
    $_SESSION['error'] = 'Nieprawidłowy login lub hasło';
    header('Location: ../login.php');
}
?>