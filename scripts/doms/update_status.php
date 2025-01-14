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
        $sql_old = "SELECT product_doms.status_id from product_doms where product_doms.id='$product_id'";
        $result_old = $conn->query($sql_old);
        $row_old = $result_old->fetch_assoc();

        if ($row_old['status_id'] !== $status_id) {
            $sql = "UPDATE product_doms SET status_id='$status_id' WHERE id='$product_id'";
            $result = $conn->query($sql);

            if ($result) {
                // Sukces aktualizacji
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Pomyślnie zaktualizowano status'
                ]);
                //log
                $before = 'DOM: '.$product_id.' <br/>Status_id: '.$row_old['status_id'];
                $after = 'DOM: '.$product_id.' <br/>Status_id: '.$status_id;
                $object_id = $product_id;
                $object_type="products_doms";
                $action_type = '1';
                $desc = 'Zaktualizowano status';
                include "../log_stripped.php";
                //log
                //time_line
                $sql_status = "SELECT name from dom_status where id='$status_id'";
                $result_status = $conn->query($sql_status);
                $row_status = $result_status->fetch_assoc();
                if($row_status['name'] == 'Zamówiony'){
                    $color = 'text-violet-500';
                    $type_id = 1;
                }elseif($row_status['name'] == 'W magazynie'){
                    $color = 'text-green-500';
                    $type_id = 2;
                }elseif($row_status['name'] == 'Sprzedany'){
                    $color = 'text-gray-500';
                    $type_id = 4;
                }elseif($row_status['name'] == 'Wewnętrzny użytek'){
                    $color = 'text-blue-500';
                    $type_id = 2;
                }elseif($row_status['name'] == 'Zwrócony do hurtowni'){
                    $color = 'text-orange-500';
                    $type_id = 2;
                }elseif($row_status['name'] == 'Uszkodzony w transporcie'){
                    $color = 'text-red-500';
                    $type_id = 2;
                }elseif($row_status['name'] == 'Produkt wadliwy'){
                    $color = 'text-red-500';
                    $type_id = 2;
                }elseif($row_status['name'] == 'Zwrócony do RGBpc'){
                    $color = 'text-orange-500';
                    $type_id = 2;
                }elseif($row_status['name'] == 'Używany - outlet'){
                    $color = 'text-green-500';
                    $type_id = 2;
                }else{
                    $color = '';
                    $type_id = 2;
                }
                $message = '<span class="'.$color.'"><b>'.$row_status['name'].'</b></span> - zmieniono status';
                
                $object_id = $product_id;
                $object_type="products_doms";
                include "../time_line.php";
                //time_line
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
