<?php

include '../security.php';

$name = $_POST['name'];
$sur_name = $_POST['sur_name'];
$email = $_POST['email'];
$role = $_POST['role'];
$description = $_POST['description'];
$status_id = $_POST['status_id'];

$password = $_POST['pswd'];
$reapet_password = $_POST['repeat_pswd'];

echo $name;
echo $sur_name;
echo $email;
echo $role;
echo $description;
echo $status_id;

echo $password;
echo $reapet_password;


if ($name != "" && $sur_name != "" && $email != "" && $role != "" && $password != "" && $reapet_password != "" && $status_id != "") {
    
        //sprawdzenie czy w bazie danych jest już konto z tym adresem email
        include "../conn_db.php";
        $sql = "SELECT * FROM users where mail = '$email';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['alert'] = 'Konto z tym adresem email już istnieje';
            $_SESSION['alert_type'] = 'error';
        }else{
            if($password == $reapet_password){
                $sha_password = hash('sha256', $password);
                $sql = "INSERT INTO users (name, sur_name, mail, role_id, description, status_id, pswd, create_date, login) VALUES ('$name', '$sur_name', '$email', $role, '$description', $status_id, '$sha_password', current_timestamp(), '$email');";
                echo $sql;
                if (mysqli_query($conn, $sql)) {
                    $id = mysqli_insert_id($conn);
                    //log
                    $before = '';
                    $after = 'Imię: ' . $name . ' ' . $sur_name . '<br/> Email: ' . $email . '<br/> Rola: ' . $role . '<br/> Opis: ' . $description . '<br/> Status: ' . $status_id;
                    $object_id = $id;
                    $object_type="users";
                    $action_type = '2';
                    $desc = 'Dodano użytkownika użytkownika';
                    include "../../scripts/log.php";
                    //log

                    $_SESSION['alert'] = 'Konto zostało dodane';
                    $_SESSION['alert_type'] = 'success';
                } else {
                    $_SESSION['alert'] = 'Błąd aktualizacji danych';
                    $_SESSION['alert_type'] = 'error';
                }
            } else {
                $_SESSION['alert'] = 'Podane hasła różnią się od siebie';
                $_SESSION['alert_type'] = 'error';
            }
        }

} else {
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");
?>