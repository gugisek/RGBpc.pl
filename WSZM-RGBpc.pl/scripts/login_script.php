<?php
include 'conn_db.php';
$login_sha = hash('sha256', $_POST['login']);
$password_sha = hash('sha256', $_POST['password']);
echo $login_sha;
echo $sql;

$sql = "SELECT * FROM users WHERE login = '".$login_sha."' AND pswd = '".$password_sha."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
    $sql = "SELECT status_id, name FROM users WHERE login = '".$login_sha."' AND pswd = '".$password_sha."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $status_id = $row['status_id'];
    $name = $row['name'];
    if($status_id == 1)
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