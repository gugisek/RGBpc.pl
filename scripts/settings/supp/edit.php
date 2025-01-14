<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json'); // Nagłówek JSON

include '../../security.php';

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];



if ($name != "") {
    
    include "../../conn_db.php";
    $sql_old = "SELECT * FROM supplayers WHERE id=$id;";
    $result_old = mysqli_query($conn, $sql_old);
    $row_old = mysqli_fetch_assoc($result_old);

    if ($row_old['name'] != $name || $row_old['description'] != $description) {
        $sql = "UPDATE supplayers SET name='$name', description='$description' WHERE id=$id;";
        
        if (mysqli_query($conn, $sql)) {

            //log
            $before = 'Nazwa: ' . $row_old['name'] . ' <br/>Opis: ' . $row_old['description'];
            $after = 'Nazwa: ' . $name . ' <br/>Opis: ' . $description;
            $object_id = $id;
            $object_type="supplayers";
            $action_type = '1';
            $desc = 'Edytowano dostawcę';
            include "../../log_stripped_without_conn.php";
            //log

            echo json_encode([
                'status' => 'success',
                'message' => 'Zaktualizowano dane dostawcy'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Błąd aktualizacji danych dostawcy'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'warning',
            'message' => 'Wprowadzone dane są takie same jak poprzednie'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'warning',
        'message' => 'Wypełnij wszystkie pola'
    ]);
}
?>