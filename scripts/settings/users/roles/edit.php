<?php

include '../../../security.php';

$id = $_POST['id'];
$role = $_POST['name'];
$description = $_POST['description'];
$dashboard = $_POST['dashboard'];
$users = $_POST['users'];
$logs = $_POST['logs'];
$settings = $_POST['settings'];


if ($role != "" && $description != "" && $dashboard != "" && $users != "" && $logs != "" && $settings != "") {
    
    include "../../../conn_db.php";
    $sql_old = "SELECT * FROM user_roles WHERE id=$id;";
    $result_old = mysqli_query($conn, $sql_old);
    $row_old = mysqli_fetch_assoc($result_old);

    if ($row_old['role'] != $role || $row_old['description'] != $description || $row_old['dashboard'] != $dashboard || $row_old['users'] != $users || $row_old['logs'] != $logs || $row_old['settings'] != $settings) {
        $sql = "UPDATE user_roles SET role='$role', description='$description', dashboard='$dashboard', users='$users', logs='$logs', settings='$settings' WHERE id=$id;";
        echo $sql;
        if (mysqli_query($conn, $sql)) {

            //log
            $before = 'Nazwa: ' . $row_old['role'] . ' <br/>Opis: ' . $row_old['description'] . ' <br/>Dashboard: ' . $row_old['dashboard'] . ' <br/>Użytkownicy: ' . $row_old['users'] . ' <br/>Logi: ' . $row_old['logs'] . ' <br/>Ustawienia: ' . $row_old['settings'];
            $after = 'Nazwa: ' . $role . ' <br/>Opis: ' . $description . ' <br/>Dashboard: ' . $dashboard . ' <br/>Użytkownicy: ' . $users . ' <br/>Logi: ' . $logs . ' <br/>Ustawienia: ' . $settings;
            $object_id = $id;
            $object_type="settings";
            $action_type = '1';
            $desc = 'Edytowano rolę użytkownika';
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