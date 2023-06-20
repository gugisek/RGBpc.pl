<?php
$id = $_POST['id'];
$status = $_POST['status'];
$privileges = $_POST['privileges'];
include '../scripts/conn_db.php';
$sql = "UPDATE user_status SET status = '$status', privileges = '$privileges' WHERE id = '$id'";
//log
$sql_old = "SELECT * FROM user_status WHERE id='$id'";
$result_old = mysqli_query($conn, $sql_old);
$row_old = $result_old->fetch_assoc();
//log
$sql_check = "SELECT * FROM user_status WHERE status='$status' and privileges='$privileges'";
$result_check = mysqli_query($conn, $sql_check);
$row_check = $result_check->fetch_assoc();
if ($row_check['status'] == $status) {
    header("Location: ../panel.php?page=ustawienia&action=same");
} else 
if(mysqli_query($conn, $sql))
{
    //log
    $object_id=$id;
    $object_type="user_status";
    $before="$row_old[id], $row_old[status], $row_old[privileges]";
    $after="$id, $status, $privileges";
    $action_type="1";
    $desc="Zmodfikowano status użytkownika";
    include "../scripts/log.php";
    //log
    header("Location: ../panel.php?page=ustawienia&action=edited");
} else {
    header("Location: ../panel.php?page=ustawienia&action=error");
}
?>