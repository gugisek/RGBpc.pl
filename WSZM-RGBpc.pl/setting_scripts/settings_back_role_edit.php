<?php
$id = $_POST['id'];
$role = $_POST['role'];
$desc = $_POST['desc'];
include '../scripts/conn_db.php';
$sql = "UPDATE user_roles SET role = '$role', description = '$desc' WHERE id = '$id'";
//log
$sql_old = "SELECT * FROM user_roles WHERE id='$id'";
$result_old = mysqli_query($conn, $sql_old);
$row_old = $result_old->fetch_assoc();
//log
$sql_check = "SELECT * FROM user_roles WHERE role='$role' and description='$desc'";
$result_check = mysqli_query($conn, $sql_check);
$row_check = $result_check->fetch_assoc();
if ($row_check['role'] == $role && $row_check['description'] == $desc) {
    header("Location: ../panel.php?page=ustawienia&action=same");
} else 
if(mysqli_query($conn, $sql))
{
    //log
    $object_id=$id;
    $object_type="user_roles";
    $before="$row_old[id], $row_old[role], $row_old[description]";
    $after="$id, $role, $desc";
    $action_type="1";
    $desc="Zmodfikowano rolę użytkownika";
    include "../scripts/log.php";
    //log
    header("Location: ../panel.php?page=ustawienia&action=edited");
} else {
    header("Location: ../panel.php?page=ustawienia&action=error");
}
?>