<?php
include "../../scripts/conn_db.php";
session_start();
$user_id = $_SESSION['login_id'];
$sql_log = "INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES (NULL, '$user_id', current_timestamp(), '$object_id', '$object_type', '$before', '$after', '$action_type', '$desc')";
mysqli_query($conn, $sql_log);
?>