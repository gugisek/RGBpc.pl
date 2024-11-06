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
    
        //sprawdzenie czy w bazie danych jest już konto z tym adresem email
        include "../../../conn_db.php";
        $sql = "SELECT * FROM user_roles where role = '$role';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['alert'] = 'Rola z taką nazwą już istnieje';
            $_SESSION['alert_type'] = 'error';
        }else{
                $sql = "INSERT INTO user_roles (role, description, dashboard, users, logs, settings) VALUES ('$role', '$description', $dashboard, $users, $logs, $settings);";
                if (mysqli_query($conn, $sql)) {
                    $id = mysqli_insert_id($conn);
                    //log
                    $before = '';
                    $after = 'Nazwa: ' . $role . ' <br/>Opis: ' . $description . ' <br/>Dashboard: ' . $dashboard . ' <br/>Użytkownicy: ' . $users . ' <br/>Logi: ' . $logs . ' <br/>Ustawienia: ' . $settings;
                    $object_id = $id;
                    $object_type="settings";
                    $action_type = '2';
                    $desc = 'Dodano użytkownika rolę użytkownika';
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
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../../../panel.php");
?>