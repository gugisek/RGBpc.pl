<?php

include '../../../security.php';

$id = $_POST['id'];
$category = $_POST['name'];
$parent_id = $_POST['parent_id'];


if ($category != "" && $parent_id != "") {
    
    include "../../../conn_db.php";
    $sql_old = "SELECT * FROM product_categories WHERE id=$id;";
    $result_old = mysqli_query($conn, $sql_old);
    $row_old = mysqli_fetch_assoc($result_old);

    if ($row_old['category'] != $category || $row_old['parent_id'] != $parent_id) {
        $sql = "UPDATE product_categories SET category='$category', parent_id='$parent_id' WHERE id=$id;";
        echo $sql;
        if (mysqli_query($conn, $sql)) {

            //log
            $before = 'Nazwa: ' . $row_old['category'] . ' <br/>Nadrzędna kategoria: ' . $row_old['parent_id'];
            $after = 'Nazwa: ' . $category . ' <br/>Nadrzędna kategoria: ' . $parent_id;
            $object_id = $id;
            $object_type="settings";
            $action_type = '1';
            $desc = 'Edytowano kategorię produktu';
            include "../../../log.php";
            //log

            $_SESSION['alert'] = 'Dane zostały zaktualizowane';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Błąd aktualizacji danych';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'Nie wprowadzono nowych danych';
        $_SESSION['alert_type'] = 'warning';
    }
} else {
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../../../panel.php");
?>