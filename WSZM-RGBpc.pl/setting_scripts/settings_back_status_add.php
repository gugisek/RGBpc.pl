<?php
$status = $_POST['status'];
echo $status;
$privileges = $_POST['privileges'];
include '../scripts/conn_db.php';
$sql = "INSERT INTO `user_status` (`id`, `status`, `privileges`) VALUES (NULL, '$status', '$privileges')";
$sql_check = "SELECT * FROM user_status WHERE status='$status' and privileges='$privileges'";
$result_check = mysqli_query($conn, $sql_check);
$row_check = $result_check->fetch_assoc();
if ($row_check['status'] == $status) {
    header("Location: ../panel.php?page=ustawienia&action=same");
} else 
if(mysqli_query($conn, $sql))
{
    //log
    $object_id=$conn->insert_id;;
    $object_type="user_status";
    $before="NULL";
    $after="$object_id, $status, $privileges";
    $action_type="2";
    $desc="Dodano status użytkownika";
    include "../scripts/log.php";
    //log
    header("Location: ../panel.php?page=ustawienia&action=added");
} else {
    header("Location: ../panel.php?page=ustawienia&action=error");
}
?>