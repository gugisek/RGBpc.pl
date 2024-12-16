<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json'); // Nagłówek JSON

include '../security.php';

$status_id = $_POST['status_id'] ?? null;
$product_id = $_POST['product_id'] ?? null;

if (!empty($status_id) && !empty($product_id)) {
    include '../conn_db.php';
        $sql_old = "SELECT products.status_id from products where products.id='$product_id'";
        $result_old = $conn->query($sql_old);
        $row_old = $result_old->fetch_assoc();

        if ($row_old['status_id'] !== $status_id) {
            $sql = "UPDATE products SET status_id='$status_id' WHERE id='$product_id'";
            $result = $conn->query($sql);

            if ($result) {
                // Sukces aktualizacji
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Pomyślnie zaktualizowano status'
                ]);
                //log
                $before = 'Produkt: '.$product_id.' <br/>Status_id: '.$row_old['status_id'];
                $after = 'Produkt: '.$product_id.' <br/>Status_id: '.$status_id;
                $object_id = $product_id;
                $object_type="products";
                $action_type = '1';
                $desc = 'Zaktualizowano status';
                include "../log_stripped.php";
                //log
            } else {
                // Błąd aktualizacji
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Błąd aktualizacji statusu'
                ]);
            }
        } else {
            // Brak zmian
            echo json_encode([
                'status' => 'warning',
                'message' => 'Wprowadzona wartość jest taka sama jak poprzednia'
            ]);
        }
} else {
    // Błąd brak wymaganych danych
    echo json_encode([
        'status' => 'warning',
        'message' => 'Brak wymaganych danych: status_id, product_id'
    ]);
}
?>
