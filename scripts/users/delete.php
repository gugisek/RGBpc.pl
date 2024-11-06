<?php
include '../security.php';

$id = $_POST['id'];
include "../conn_db.php";
if ($id == $_SESSION['user_id']) {
    $_SESSION['alert'] = 'Nie możesz usunąć samego siebie!';
    $_SESSION['alert_type'] = 'error';
} else {
    if($id != "") {
        $sql_old = "Select * from users where id='$id'";
        $result_old = $conn->query($sql_old);
        $row_old = $result_old->fetch_assoc();

        $sql = "DELETE FROM users WHERE id='$id';";
        if ($conn->query($sql) === TRUE) {
            //log
                    $before = 'Imię: ' . $row_old['name'] . ' '. $row_old['sur_name'] .' <br/> Email: ' . $row_old['email'] . '<br/> Rola: ' . $row_old['role_id'] . '<br/> Wspólnota: ' . $row_old['communities'];
                    $after = "";
                    $object_id=$id;
                    $object_type="users";
                    $action_type="3";
                    $desc="Usunięto użytkownika";
                    include "../../scripts/log.php";
            //log
            $_SESSION['alert'] = 'Pomyślnie usunięto użytkownika';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Wystąpił błąd podczas usuwania użytkownika';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'Nie wybrano użytkownika';
        $_SESSION['alert_type'] = 'warning';
    }
}
header("Location: ../../panel.php");

?>