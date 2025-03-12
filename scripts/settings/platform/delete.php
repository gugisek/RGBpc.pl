<?php
include '../../security.php';

$id = $_POST['id'];
include "../../conn_db.php";
    if($id != "") {
        $sql_old = "Select * from platforms where id='$id'";
        $result_old = $conn->query($sql_old);
        $row_old = $result_old->fetch_assoc();

        $sql = "DELETE FROM platforms WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            //log
                    $before = 'Nazwa: ' . $row_old['name'];
                    $after = "";
                    $object_id=$id;
                    $object_type="Platforms";
                    $action_type="3";
                    $desc="Usunięto platformę";
                    include "../../log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie usunięto platformę';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Wystąpił błąd podczas usuwania platformy';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'Nie wybrano opcji platformy';
        $_SESSION['alert_type'] = 'warning';
    }

header("Location: ../../../panel.php");

?>