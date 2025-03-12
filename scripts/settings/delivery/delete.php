<?php
include '../../security.php';

$id = $_POST['id'];
include "../../conn_db.php";
    if($id != "") {
        $sql_old = "Select * from shippings where id='$id'";
        $result_old = $conn->query($sql_old);
        $row_old = $result_old->fetch_assoc();

        $sql = "DELETE FROM shippings WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            //log
                    $before = 'Nazwa: ' . $row_old['name'] . ' <br/>Krótki opis: ' . $row_old['desc_short'] . ' <br/>Platforma: ' . $row_old['platform_id'] . ' <br/>Cena: ' . $row_old['price_brutto'] . ' <br/>Maszyna: ' . $row_old['additonal_box_machine_number'];
                    $after = "";
                    $object_id=$id;
                    $object_type="Shippings";
                    $action_type="3";
                    $desc="Usunięto opcję dostawy";
                    include "../../log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie usunięto opcję dostawy';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Wystąpił błąd podczas usuwania opcji dostawy';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'Nie wybrano opcji dostawy';
        $_SESSION['alert_type'] = 'warning';
    }

header("Location: ../../../panel.php");

?>