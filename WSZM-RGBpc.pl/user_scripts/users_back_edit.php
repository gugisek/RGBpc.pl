<?php
include "../scripts/conn_db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['sur_name'];
$mail = $_POST['mail'];
$role_id = $_POST['role'];
$status_id = $_POST['status'];
$create_date = $_POST['create_date'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
//log
$sql_old = "SELECT * FROM users WHERE id='$id'";
$result_old = mysqli_query($conn, $sql_old);
$row_old = $result_old->fetch_assoc();
//log

if ($password == $password2 && !empty($password) && !empty($password2)) {
    $password = hash('sha256', $password);
    $sql = "SELECT pswd FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if ($row['pswd'] == $password) {
        header('Location: ../panel.php?page=użytkownicy&action=edited_same#edited');
    } else {
        
        $sql = "UPDATE users SET name='$name', sur_name='$surname', mail='$mail', role_id='$role_id', status_id='$status_id', pswd='$password', create_date='$create_date' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            //log
            $object_id=$id;
            $object_type="users";
            $before="$row_old[name], $row_old[sur_name], $row_old[pswd], $row_old[mail], $row_old[role_id], $row_old[create_date], $row_old[update_date], $row_old[status_id]";
            $after="$name, $surname, $password, $mail, $role_id, $create_date, current_timestamp(), $status_id";
            $action_type="1";
            $desc="Edytowano użytkownika i/lub hasło";
            include "../scripts/log.php";
            //log
            header('Location: ../panel.php?page=użytkownicy&action=edited_pswd');
        } else {
            header('Location: ../panel.php?page=użytkownicy&action=error');
        }
    }

} elseif (empty($password) && empty($password2)) {
        //log
        $object_id=$id;
        $object_type="users";
        $before="$row_old[name], $row_old[sur_name], $row_old[mail], $row_old[role_id], $row_old[create_date], $row_old[update_date], $row_old[status_id]";
        $after="$name, $surname, $mail, $role_id, $create_date, current_timestamp(), $status_id";
        $action_type="1";
        $desc="Edytowano użytkownika";
        include "../scripts/log.php";
        //log
        $sql = "UPDATE users SET name='$name', sur_name='$surname', mail='$mail', role_id='$role_id', status_id='$status_id', create_date='$create_date' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header('Location: ../panel.php?page=użytkownicy&action=edited');
        } else {
            header('Location: ../panel.php?page=użytkownicy&action=error');
        }
    
}else {
    header('Location: ../panel.php?page=użytkownicy&action=error_pswd');
}
?>