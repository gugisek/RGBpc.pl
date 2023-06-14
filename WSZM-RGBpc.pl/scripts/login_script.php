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
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['user'] = $result->fetch_assoc()['name'];
    header('Location: ../panel.php?page=');
}
else
{
    session_start();
    $_SESSION['error'] = 'Nieprawidłowy login lub hasło';
    header('Location: ../login.php');
}
?>