<?php
include "../scripts/conn_db.php";
$id = $_POST['popup_personal_id'];
$name = $_POST['popup_name_input'];
$sur_name = $_POST['popup_surname'];
$name_2 = $_POST['popup_sec_name'];
$email = $_POST['popup_email'];
$addres = $_POST['popup_addres'];
$description = $_POST['popup_desc'];
//log
$sql_old = "SELECT * FROM users WHERE id='$id'";
$result_old = mysqli_query($conn, $sql_old);
$row_old = $result_old->fetch_assoc();
//log

$sql = "UPDATE `users` SET `name` = '$name', `sec_name` = '$name_2', `sur_name` = '$sur_name', `mail` = '$email', `description` = '$description', `addres` = '$addres' WHERE `users`.`id` = $id";
$result = mysqli_query($conn, $sql);


if ($result) {
    //log
    $object_id=$id;
    $object_type="users";
    $before="Imię: $row_old[name]<br> Drugie imię: $row_old[sec_name]<br> Nazwisko: $row_old[sur_name]<br> Email: $row_old[mail]<br> Opis: $row_old[description]<br> Adres: $row_old[addres]<br> Data modyfikacji: $row_old[update_date]";
    $after="Imię: $name<br> Drugie imię: $name_2<br> Nazwisko: $sur_name<br> Email: $email<br> Opis: $description<br> Adres: $addres<br> Data modyfikacji: current_timestamp()";
    $action_type="1";
    $desc="Edytowano dane personalne użytkownika";
    include "../scripts/log.php";
    //log
    header('Location: ../panel.php?page=użytkownicy&action=edited');
    $_SESSION['alert'] = 'Dane personalne zostały zmienione.';
    $_SESSION['alert_type'] = 'ok';
} else {
    header('Location: ../panel.php?page=użytkownicy&action=error');
}
?>