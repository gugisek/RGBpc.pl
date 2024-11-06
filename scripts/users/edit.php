<?php

include '../security.php';


$name = $_POST['name'];
$sur_name = $_POST['sur_name'];
$email = $_POST['email'];
$role = $_POST['role'];
$description = $_POST['description'];
$status_id = $_POST['status_id'];
$id = $_POST['id'];

$password = $_POST['pswd'];
$reapet_password = $_POST['repeat_pswd'];


if ($name != "" && $sur_name != "" && $email != "" && $role != "" && $id != "" && $status_id != "") {
    
    include "../conn_db.php";
    $sql_old = "SELECT users.id, users.name, users.sur_name, users.mail, role_id, status_id, description FROM users where users.id = $id;";
    $result_old = mysqli_query($conn, $sql_old);
    $row_old = mysqli_fetch_assoc($result_old);

    if ($row_old['name'] != $name || $row_old['sur_name'] != $sur_name || $row_old['mail'] != $email || $row_old['role_id'] != $role || $row_old['description'] != $description || $row_old['status_id'] != $status_id) {
        $sql = "UPDATE users SET name='$name', sur_name='$sur_name', mail='$email', role_id=$role, description='$description', status_id=$status_id WHERE id=$id;";
        echo $sql;
        if (mysqli_query($conn, $sql)) {

            //log
            $before = 'Imię: ' . $row_old['name'] . ' ' . $row_old['sur_name'] . ' <br/> Email: ' . $row_old['mail'] . '<br/> Rola: ' . $row_old['role_id'] . '<br/> Opis: ' . $row_old['description'] . '<br/> Status: ' . $row_old['status_id'];
            $after = 'Imię: ' . $name . ' ' . $sur_name . '<br/> Email: ' . $email . '<br/> Rola: ' . $role . '<br/> Opis: ' . $description . '<br/> Status: ' . $status_id;
            $object_id = $id;
            $object_type="users";
            $action_type = '1';
            $desc = 'Edytowano użytkownika';
            include "../../scripts/log.php";
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

        if($password != "" && $reapet_password != ""){
            if($password == $reapet_password){
                $sha_password = hash('sha256', $password);
                $sql = "UPDATE users SET pswd='$sha_password' WHERE id=$id;";
                echo $sql;
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['alert'] = 'Dane zostały zaktualizowane';
                    $_SESSION['alert_type'] = 'success';

                    //log
                    $before = '';
                    $after = 'Hasło: ' . $password;
                    $object_id = $id;
                    $object_type="users";
                    $action_type = '1';
                    $desc = 'Edyctowano hasło użytkownika';
                    include "../../scripts/log.php";
                    //log

                } else {
                    $_SESSION['alert'] = 'Błąd aktualizacji danych';
                    $_SESSION['alert_type'] = 'error';
                }
            } else {
                $_SESSION['alert'] = 'Podane hasła różnią się od siebie';
                $_SESSION['alert_type'] = 'error';
            }
        }
    }
    //przyrównanie czy nowe dane faktycznie są nowe

} else {
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");
?>