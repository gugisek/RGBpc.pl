<?php
include "../scripts/conn_db.php";
session_start();
$login_id = $_SESSION['login'];
$sql_id = "SELECT id FROM users WHERE login='$login_id'";
$result_id = mysqli_query($conn, $sql_id);
$row_id = $result_id->fetch_assoc();
$user_id = $row_id['id'];
$sql_log = "INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES (NULL, '$user_id', current_timestamp(), '$object_id', '$object_type', '$before', '$after', '$action_type', '$desc')";
mysqli_query($conn, $sql_log);
?>