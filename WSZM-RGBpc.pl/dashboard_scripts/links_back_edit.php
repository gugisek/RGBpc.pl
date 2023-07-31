<?php
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$icon = $_POST['icon_id'];
$link = $_POST['link'];
include '../scripts/conn_db.php';
if ($id != 'undefined') {
    $sql_old = "SELECT * FROM `links` WHERE `id` = $id";
    $result_old = $conn->query($sql_old);
    $row_old = $result_old->fetch_assoc();
    $sql = "UPDATE `links` SET `nazwa` = '$name', `opis` = '$description', `icon_id` = '$icon', `link` = '$link' WHERE `links`.`id` = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        //log
        $object_id=$id;
        $object_type="links";
        $before="id: $row_old[id]<br>nazwa: $row_old[nazwa]<br>opis: $row_old[opis]<br>icon_id: $row_old[icon_id]<br>link: $row_old[link]";
        $after="id: $id<br>nazwa: $name<br>opis: $description<br>icon_id: $icon<br>link: $link";
        $action_type="1";
        $desc="Edytowano link";
        include "../scripts/log.php";
        //log
        header("Location: ../panel.php?page=dashboard&action=succes");
    } else {
        echo "Error updating record: " . $conn->error;
        header("Location: ../panel.php?page=dashboard&action=error");
    }
}else {
    session_start();
    $login_id = $_SESSION['login_id'];
    $sql = "INSERT INTO `links` (`id`, `nazwa`, `opis`, `icon_id`, `link` , `user_id`, `create_date`) VALUES (NULL, '$name', '$description', '$icon', '$link', '$login_id', current_timestamp())";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        //log
        $object_id=$conn->insert_id;
        $object_type="links";
        $before="NULL";
        $after="id: $conn->insert_id<br>nazwa: $name<br>opis: $description<br>icon_id: $icon<br>link: $link";
        $action_type="2";
        $desc="Dodano link";
        include "../scripts/log.php";
        //log
        header("Location: ../panel.php?page=dashboard&action=succes");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location: ../panel.php?page=dashboard&action=error");
    }
}
?>