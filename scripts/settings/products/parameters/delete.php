<?php
include '../../../security.php';

$id = $_POST['id'];
include "../../../conn_db.php";
    if($id != "") {
        $sql_old = "Select * from product_parameters where id=$id";
        $result_old = $conn->query($sql_old);
        $row_old = $result_old->fetch_assoc();

        $sql = "DELETE FROM product_parameters WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            //log
                    $before = 'Nazwa: ' . $row_old['value'] . ' <br/>Priorytet: ' . $row_old['priority'] . ' <br/>Kategoria filtra: ' . $row_old['filter_category_id'];
                    $after = "";
                    $object_id=$id;
                    $object_type="Categories_parameters";
                    $action_type="3";
                    $desc="Usunięto parametr kategorii";
                    include "../../../log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie usunięto parametr kategorii';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Wystąpił błąd podczas usuwania parametru kategorii';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'Nie wybrano parametru kategorii';
        $_SESSION['alert_type'] = 'warning';
    }

header("Location: ../../../../panel.php");

?>