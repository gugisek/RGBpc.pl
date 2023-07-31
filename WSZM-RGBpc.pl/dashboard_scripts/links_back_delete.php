<?php
$id = $_POST['id'];
$action = $_POST['action'];

if ($action == 'delete') {
    include '../scripts/conn_db.php';
    $sql_old = "SELECT * FROM `links` WHERE `id` = $id";
    $result_old = $conn->query($sql_old);
    $row_old = $result_old->fetch_assoc();
    $sql = "DELETE FROM `links` WHERE `links`.`id` = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        //log
        $object_id=$id;
        $object_type="links";
        $before="id: $row_old[id]<br>nazwa: $row_old[nazwa]<br>opis: $row_old[opis]<br>icon_id: $row_old[icon_id]<br>link: $row_old[link]";
        $after="NULL";
        $action_type="3";
        $desc="Usunięto link";
        include "../scripts/log.php";
        //log
        header("Location: ../panel.php?page=dashboard&action=succes");
    } else {
        echo "Error deleting record: " . $conn->error;
        header("Location: ../panel.php?page=dashboard&action=error");
    }
}