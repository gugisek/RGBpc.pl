<?php


include '../../../security.php';

$filter_category_id = $_POST['id'];
$parameter = $_POST['name'];

if(isset($_POST['priority'])) {
    if($_POST['priority'] == "") {
        $priority = 'NULL';
    }else{
        $priority = $_POST['priority'];
    }
} else {
    $priority = 'NULL';
}

if($parameter != "" && $filter_category_id != "") {
    include "../../../conn_db.php";
    $sql = "SELECT * FROM product_parameters where value = '$parameter' and filter_category_id = $filter_category_id;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['alert'] = 'Parametr z taką nazwą już istnieje';
        $_SESSION['alert_type'] = 'warning';
    } else {
        $sql = "INSERT INTO product_parameters (value, filter_category_id, priority) VALUES ('$parameter', $filter_category_id, $priority);";
        echo $sql;
        if (mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
            //log
            $before = '';
            $after = 'Nazwa: ' . $parameter . ' <br/>Kategoria filtra: ' . $filter_category_id . ' <br/>Priorytet: ' . $priority;
            $object_id = $id;
            $object_type="Categories_parameters";
            $action_type = '2';
            $desc = 'Dodano parametr produktu';
            include "../../../log.php";
            //log

            $_SESSION['alert'] = 'Dane zostały dodane';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Błąd aktualizacji danych';
            $_SESSION['alert_type'] = 'error';
        }
    }
} else {
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'warning';
}
header("Location: ../../../../panel.php");