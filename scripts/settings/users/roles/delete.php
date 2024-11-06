<?php
include '../../../security.php';

$id = $_POST['id'];
include "../../../conn_db.php";
    if($id != "") {
        $sql_old = "Select * from user_roles where id='$id'";
        $result_old = $conn->query($sql_old);
        $row_old = $result_old->fetch_assoc();

        $sql = "DELETE FROM user_roles WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            //log
                    $before = 'Role: ' . $row_old['role'] . ' <br/>Opis: '. $row_old['description'] .' <br/> Dashboard: ' . $row_old['dashboard'] . '<br/> Users: ' . $row_old['users'] . '<br/> Logs: ' . $row_old['logs'] . '<br/> Settings: ' . $row_old['settings'];
                    $after = "";
                    $object_id=$id;
                    $object_type="settings";
                    $action_type="3";
                    $desc="Usunięto rolę użytkownika";
                    include "../../../log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie usunięto rolę użytkownika';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Wystąpił błąd podczas usuwania roli użytkownika';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'Nie wybrano roli użytkownika';
        $_SESSION['alert_type'] = 'warning';
    }

header("Location: ../../../../panel.php");

?>