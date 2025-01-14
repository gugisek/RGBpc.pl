<?php
$user_id = $_SESSION['login_id'];
$sql_time_line = "INSERT INTO `time_lines` (`id`, `object_id`, `object_type`, `create_date`, `user_id`, `type_id`, `message`) VALUES (NULL, '$object_id', '$object_type', current_timestamp(), '$user_id', '$type_id', '$message')";
mysqli_query($conn, $sql_time_line);
?>