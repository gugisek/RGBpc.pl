<?php
$id = $_POST['id'];
$delete = $_POST['delete'];
$status = $_POST['status'];
$privileges = $_POST['privileges'];
if ($delete == 'true') {
    include '../scripts/conn_db.php';
    $sql_check = "SELECT * FROM users WHERE status_id='$id'";
    $result_check = mysqli_query($conn, $sql_check);
    $row_check = $result_check->fetch_assoc();
    if ($row_check['status_id'] == $id) {
        header("Location: ../panel.php?page=ustawienia&action=delete_in_use");
        exit();
    }
    $sql = "DELETE FROM user_status WHERE id = '$id' AND status = '$status' AND privileges = '$privileges'";
    $result = mysqli_query($conn, $sql);
    //log
    $object_id=$id;
    $object_type="user_status";
    $before="$id, $status, $privileges";
    $after="";
    $action_type="3";
    $desc="Usunięto status użytkownika";
    include "../scripts/log.php";
    //log
    if ($result) {
        header("Location: ../panel.php?page=ustawienia&action=deleted");
    } else {
        header("Location: ../panel.php?page=ustawienia&action=error");
    }
} else {
    header("Location: ../panel.php?page=ustawienia&action=error");
}