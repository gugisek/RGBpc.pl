<?php
include "../conn_db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['sur_name'];
$mail = $_POST['mail'];
$role_id = $_POST['role'];
$status_id = $_POST['status'];
$create_date = $_POST['create_date'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
if ($password == $password2 && !empty($password) && !empty($password2)) {
    $password = hash('sha256', $password);
    $sql = "SELECT pswd FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if ($row['pswd'] == $password) {
        header('Location: ../panel.php?page=użytkownicy&action=edited_same#edited');
    } else {
        $sql = "UPDATE users SET name='$name', sur_name='$surname', mail='$mail', role_id='$role_id', status_id='$status_id', pswd='$password', create_date='$create_date' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header('Location: ../panel.php?page=użytkownicy&action=edited_pswd');
        } else {
            header('Location: ../panel.php?page=użytkownicy&action=error');
        }
    }

} elseif (empty($password) && empty($password2)) {
    
        $sql = "UPDATE users SET name='$name', sur_name='$surname', mail='$mail', role_id='$role_id', status_id='$status_id', create_date='$create_date' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header('Location: ../panel.php?page=użytkownicy&action=edited');
        } else {
            header('Location: ../panel.php?page=użytkownicy&action=error');
        }
    
}else {
    header('Location: ../panel.php?page=użytkownicy&action=error_pswd');
}
?>