<?php
session_start();
include "../scripts/conn_db.php";
$id = $_POST['popup_account_id'];
$status = $_POST['popup_status_inpt']; //słownie
$login = $_POST['popup_login'];
$login2 = $_POST['popup_login_2'];
$password = $_POST['popup_pswd'];
$password2 = $_POST['popup_pswd_2'];

$sql = "SELECT id from user_status WHERE status='$status'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
$status_id = $row['id'];

//log
$sql_old = "SELECT login, pswd, status_id FROM users WHERE id='$id'";
$result_old = mysqli_query($conn, $sql_old);
$row_old = $result_old->fetch_assoc();
//log
if (!empty($password) || !empty($password2) || !empty($login) || !empty($login2)) {
    if(!empty($login) || !empty($login2)){
        if($login != $login2){
            $_SESSION['alert'] = 'Login jest różny.';
            $_SESSION['alert_type'] = 'warn';
        }else{
            $login_sha = hash('sha256', $login);
            if($login_sha == $row_old['login']){
                $_SESSION['alert'] = 'Login jest taki sam jak poprzedni.';
                $_SESSION['alert_type'] = 'warn';
            }else{
                $sql = "UPDATE users SET login='$login_sha' WHERE id='$id'";
                if ($conn->query($sql) === TRUE) {
                    //log
                    $object_id=$id;
                    $object_type="users";
                    $before="Login: $row_old[login]";
                    $after="Login: $login_sha";
                    $action_type="1";
                    $desc="Edytowano login użytkownika";
                    include "../scripts/log.php";
                    //log
                    $_SESSION['alert'] = 'Login został zmieniony.';
                    $_SESSION['alert_type'] = 'ok';
                } else {
                    header('Location: ../panel.php?page=użytkownicy&action=error');
                }
            }
        }   
    }
    if(!empty($password) || !empty($password2)){
        if($password != $password2){
            $_SESSION['alert'] = 'Hasła są różne.';
            $_SESSION['alert_type'] = 'warn';
        }else{
            $password_sha = hash('sha256', $password);
            if($password_sha == $row_old['pswd']){
                $_SESSION['alert'] = 'Hasło jest takie same jak poprzednie.';
                $_SESSION['alert_type'] = 'warn';
            }else{
                $sql = "UPDATE users SET pswd='$password_sha' WHERE id='$id'";
                if ($conn->query($sql) === TRUE) {
                    //log
                    $object_id=$id;
                    $object_type="users";
                    $before="Hasło: $row_old[pswd]";
                    $after="Hasło: $password_sha";
                    $action_type="1";
                    $desc="Edytowano hasło użytkownika";
                    include "../scripts/log.php";
                    //log
                    $_SESSION['alert'] = 'Hasło zostało zmienione.';
                    $_SESSION['alert_type'] = 'ok';
                } else {
                    header('Location: ../panel.php?page=użytkownicy&action=error');
                }
            }
        }
    }
}
if ($status_id != $row_old['status_id']){
    $sql = "UPDATE users SET status_id='$status_id' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        //log
        $object_id=$id;
        $object_type="users";
        $before="Status: $row_old[status_id]";
        $after="Status: $status_id";
        $action_type="1";
        $desc="Edytowano status użytkownika";
        include "../scripts/log.php";
        //log

        //header('Location: ../panel.php?page=użytkownicy&action=edited_status');

    } else {
        header('Location: ../panel.php?page=użytkownicy&action=error');
    }
}
if($status_id == $row_old['status_id'] && empty($login) && empty($login2) && empty($password) && empty($password2)){
    $_SESSION['alert'] = 'Nie wprowadzono żadnych zmian.';
    $_SESSION['alert_type'] = 'warn';
}
header('Location: ../panel.php?page=użytkownicy&action=edited');

?>