<?php
include 'conn_db.php';
$login_sha = hash('sha256', $_POST['login']);
$password_sha = hash('sha256', $_POST['password']);
$sql = "SELECT * FROM users WHERE login = '".$login_sha."' AND pswd = '".$password_sha."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
    $sql = "SELECT users.status_id, users.name, status_privileges.login, users.id FROM users join user_status on users.status_id=user_status.id join status_privileges on status_privileges.id=user_status.privileges WHERE users.login = '".$login_sha."' AND pswd = '".$password_sha."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $login = $row['login'];
    $name = $row['name'];
    $login_id = $row['id'];
    if($login == 1)
    {
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $name;
        $_SESSION['login'] = $login_sha;
        $_SESSION['login_id'] = $login_id;
        $sql = "SELECT dashboard, products, orders, outcome, income, accountancy, users, logs, settings from users join user_roles on users.role_id= user_roles.id where users.login = '".$login_sha."';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['privilage_dashboard'] = $row['dashboard'];
        $_SESSION['privilage_products'] = $row['products'];
        $_SESSION['privilage_orders'] = $row['orders'];
        $_SESSION['privilage_outcome'] = $row['outcome'];
        $_SESSION['privilage_income'] = $row['income'];
        $_SESSION['privilage_accountancy'] = $row['accountancy'];
        $_SESSION['privilage_users'] = $row['users'];
        $_SESSION['privilage_logs'] = $row['logs'];
        $_SESSION['privilage_settings'] = $row['settings'];
        header('Location: ../panel.php?page=dashboard&action=');
    }
    else
    {
        session_start();
        $_SESSION['error'] = 'Konto nieaktywne, zablokowane lub wyłączone.<br><br> Skontaktuj się z administratorem.';
        header('Location: ../login.php');
    }
}
else
{
    session_start();
    $_SESSION['error'] = 'Nieprawidłowy login lub hasło.';
    header('Location: ../login.php');
}
?>