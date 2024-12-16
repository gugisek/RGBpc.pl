<?php


include '../../../security.php';

$parameter_id = $_POST['id'];
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

if($parameter != "" && $parameter_id !== ""){
    include '../../../conn_db.php';
    $sql_old = "SELECT * FROM product_parameters WHERE id='$parameter_id'";
    $result_old = $conn->query($sql_old);
    $row_old = $result_old->fetch_assoc();

    if($row_old['value'] !== $parameter || $row_old['priority'] !== $priority) {
        $sql = "UPDATE product_parameters SET value='$parameter', priority=$priority WHERE id='$parameter_id'";
        $result = $conn->query($sql);

        if($result) {
            // Sukces aktualizacji
            $_SESSION['alert'] = 'Zaktualizowano parametr';
            $_SESSION['alert_type'] = 'success';
            //log
            $before = 'Nazwa: ' . $row_old['value'] . ' <br/>Priorytet: ' . $row_old['priority'];
            $after = 'Nazwa: ' . $parameter . ' <br/>Priorytet: ' . $priority;
            $object_id = $parameter_id;
            $object_type="Categories_parameters";
            $action_type = '1';
            $desc = 'Zaktualizowano parametr produktu';
            include "../../../log.php";
            //log
        } else {
            // Błąd aktualizacji
            $_SESSION['alert'] = 'Błąd aktualizacji danych';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        // Brak zmian
        $_SESSION['alert'] = 'Wprowadzone dane są takie same jak poprzednie';
        $_SESSION['alert_type'] = 'warning';
    }

} else {
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'warning';
}
header("Location: ../../../../panel.php");