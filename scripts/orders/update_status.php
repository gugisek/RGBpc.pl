<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json'); // Nagłówek JSON

include '../security.php';

$old_id = $_POST['old_id'] ?? null;
$new_id = $_POST['new_id'] ?? null;
$order_id = $_POST['order_id'] ?? null;

if (!empty($old_id) && !empty($new_id) && !empty($order_id)){
    include '../conn_db.php';

            $sql = "UPDATE orders SET status_id='$new_id', last_update=NOW() WHERE id='$order_id'";
            $result = $conn->query($sql);

            if ($result) {
                // Sukces aktualizacji
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Pomyślnie zaktualizowano status'
                ]);
                //log
                $before = 'Status_id: '.$old_id;
                $after = 'Status_id: '.$new_id;
                $object_id = $order_id;
                $object_type="orders";
                $action_type = '1';
                $desc = 'Zaktualizowano status';
                include "../log_stripped.php";
                //log
                //time_line
                $sql_status = "SELECT name, description from orders_status where id='$new_id'";
                $result_status = $conn->query($sql_status);
                $row_status = $result_status->fetch_assoc();
                if($row_status['name'] == 'created'){
                    $color = 'text-violet-500';
                    $type_id = 1;
                }elseif($row_status['name'] == 'approved'){
                    $color = 'text-green-500';
                    $type_id = 2;
                }elseif($row_status['name'] == 'finished'){
                    $color = 'text-gray-500';
                    $type_id = 4;
                }else{
                    $color = '';
                    $type_id = 2;
                }
                $message = '<span class="'.$color.'"><b>'.$row_status['description'].'</b></span> - zmieniono status';
                
                $object_id = $order_id;
                $object_type="orders";
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
?>
