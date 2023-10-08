<?php
include "../scripts/conn_db.php";
$id = $_POST['popup_personal_id'];
$name = $_POST['popup_name_input'];
$sur_name = $_POST['popup_surname'];
$name_2 = $_POST['popup_sec_name'];
$email = $_POST['popup_email'];
$addres = $_POST['popup_addres'];
$description = $_POST['popup_desc'];

$sql = "UPDATE `users` SET `name` = '$name', `sec_name` = '$name_2', `sur_name` = '$sur_name', `mail` = '$email', `description` = '$description', `addres` = '$addres' WHERE `users`.`id` = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: ../panel.php?page=użytkownicy&action=edited');
} else {
    header('Location: ../panel.php?page=użytkownicy&action=error');
}
?>