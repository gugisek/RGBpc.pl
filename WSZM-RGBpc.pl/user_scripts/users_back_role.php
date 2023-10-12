<?php
include "../scripts/conn_db.php";
session_start();
$id = $_POST['popup_role_id'];
$role = $_POST['popup_role'];
$department = $_POST['popup_department'];
$title = $_POST['popup_title_input'];
$sql = "select id from user_roles where role='$role'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
$role_id = $row['id'];
$sql = "select id from user_departments where name='$department'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
$department_id = $row['id'];
$sql = "select id from user_titles where name='$title'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
$title_id = $row['id'];
$sql = "SELECT department_id, title_id, role_id, update_date FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
if ($row['department_id'] != $department_id || $row['title_id'] != $title_id || $row['role_id'] != $role_id) {
    
    $sql = "UPDATE `users` SET `role_id` = '$role_id', `department_id` = '$department_id', `title_id` = '$title_id' WHERE `users`.`id` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //log
        $object_id=$id;
        $object_type="users";
        $before="Rola: $row[role_id]<br> Dział: $row[department_id]<br> Stanowisko: $row[title_id]<br> Data modyfikacji: $row[update_date]";
        $after="Rola: $role_id<br> Dział: $department_id<br> Stanowisko: $title_id<br> Data modyfikacji: current_timestamp()";
        $action_type="1";
        $desc="Edytowano role użytkownika";
        include "../scripts/log.php";
        //log

        //dodanie tablicy alertów do tablicy sesji
        $xddd = ['Rola nie została zmieniona.', 'ok'];
        $_SESSION['alert'][0] = $xddd;

        echo $_SESSION['alert'][0];
        

        //$_SESSION['alert'] = 'Rola została zmieniona.';
       // $_SESSION['alert_type'] = 'ok';
       // header('Location: ../panel.php?page=użytkownicy&action=edited');
    } else {
        header('Location: ../panel.php?page=użytkownicy&action=error');
    }
} else {
    
    $_SESSION['alert'] = 'Nie wproawdzono zmian.';
    $_SESSION['alert_type'] = 'warn';
    header('Location: ../panel.php?page=użytkownicy&action=same');
}
?>