//log
    $object_id=$conn->insert_id;
    $object_type="users";
    $before="NULL";
    $after="$login, $name, $surname, $password, $mail, $role_id, current_timestamp(), current_timestamp(), $status_id";
    $action_type="2";
    $desc="Dodano użytkownika";
    include "../scripts/log.php";
//log