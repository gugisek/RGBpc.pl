<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json'); // Nagłówek JSON

include '../security.php';

$message = $_POST['message'] ?? null;
$product_id = $_POST['product_id'] ?? null;

if (!empty($message) && !empty($product_id)) {

    //make message be safe for messages with ' and "
    $message = str_replace("'", "\'", $message);
    $message = str_replace('"', '\"', $message);
    

    include '../conn_db.php';
            $user_id = $_SESSION['login_id'];
            $sql = "INSERT INTO `time_lines` (`id`, `object_id`, `object_type`, `create_date`, `user_id`, `type_id`, `message`) VALUES (NULL, '$product_id', 'orders', current_timestamp(), '$user_id', '3', '$message')";
            $result = $conn->query($sql);

            if ($result) {
                // Sukces aktualizacji
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Pomyślnie dodano komentarz',
                ]);
            } else {
                // Błąd aktualizacji
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Błąd dodawania komentarza',
                ]);
            }
        
} else {
    // Błąd brak wymaganych danych
    echo json_encode([
        'status' => 'warning',
        'message' => 'Brak wymaganych treści wiadomości'
    ]);
}
?>
