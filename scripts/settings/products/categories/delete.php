<?php
include '../../../security.php';

$id = $_POST['id'];
include "../../../conn_db.php";
    if($id != "") {
        $sql_old = "Select * from product_categories where id='$id'";
        $result_old = $conn->query($sql_old);
        $row_old = $result_old->fetch_assoc();

        $sql = "DELETE FROM product_categories WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            //log
                    $before = 'Nazwa: ' . $row_old['category'] . ' <br/>Nadrzędna kategoria: ' . $row_old['parent_id'];
                    $after = "";
                    $object_id=$id;
                    $object_type="settings";
                    $action_type="3";
                    $desc="Usunięto kategorię produktu";
                    include "../../../log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie usunięto kategorię produktu';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Wystąpił błąd podczas usuwania kategorii produktu';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'Nie wybrano kategorii produktu';
        $_SESSION['alert_type'] = 'warning';
    }

header("Location: ../../../../panel.php");

?>