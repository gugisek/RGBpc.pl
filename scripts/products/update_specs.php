<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json'); // Nagłówek JSON

include '../security.php';

$value = $_POST['value'] ?? null;
$parameter_id = $_POST['parameter_id'] ?? null;
$product_id = $_POST['product_id'] ?? null;

$specs_id = $_POST['specs_id'] ?? null;

if (!empty($value) && !empty($parameter_id) && !empty($product_id) && !empty($specs_id)) {
    include '../conn_db.php';

    if ($_POST['specs_id'] == "new") {
        $sql_check = "SELECT * FROM product_specs WHERE product_id='$product_id' AND parameter_id='$parameter_id'";
        $result_check = $conn->query($sql_check);
        if ($result_check->num_rows > 0) {
            $specs_id = $result_check->fetch_assoc()['id'];
            $sql_old = "SELECT * FROM product_specs WHERE id='$specs_id'";
            $result_old = $conn->query($sql_old);
            $row_old = $result_old->fetch_assoc();

            if ($row_old['value'] !== $value) {
                $sql = "UPDATE product_specs SET parameter_id='$parameter_id', value='$value' WHERE id='$specs_id'";
                $result = $conn->query($sql);

                if ($result) {
                    // Sukces aktualizacji
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Zaktualizowano parametr'
                    ]);
                    //log
                    $before = 'Produkt: '.$product_id.' <br/>Parametr_id: '.$parameter_id.'<br/>Wartość: '.$row_old['value'];
                    $after = 'Produkt: '.$product_id.' <br/>Parametr_id: '.$parameter_id.'<br/>Wartość: '.$value;
                    $object_id = $product_id;
                    $object_type="product_specs";
                    $action_type = '1';
                    $desc = 'Zaktualizowano parametr';
                    include "../log_stripped.php";
                    //log
                } else {
                    // Błąd aktualizacji
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Błąd aktualizacji parametru'
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
            $sql = "INSERT INTO product_specs (product_id, parameter_id, value) VALUES ('$product_id', '$parameter_id', '$value')";
            $result = $conn->query($sql);

            if ($result) {
                // Sukces dodania
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Dodano nowy parametr'
                ]);
                //log
                $before = '';
                $after = 'Produkt: '.$product_id.' <br/>Parametr_id: '.$parameter_id.'<br/>Wartość: '.$value;
                $object_id = $product_id;
                $object_type="product_specs";
                $action_type = '2';
                $desc = 'Dodano parametr';
                include "../log_stripped.php";
                //log
            } else {
                // Błąd dodawania
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Błąd dodawania nowego parametru'
                ]);;
            }
        }
    } else {
        $specs_id = $_POST['specs_id'];
        $sql_old = "SELECT * FROM product_specs WHERE id='$specs_id'";
        $result_old = $conn->query($sql_old);
        $row_old = $result_old->fetch_assoc();

        if ($row_old['value'] !== $value) {
            $sql = "UPDATE product_specs SET parameter_id='$parameter_id', value='$value' WHERE id='$specs_id'";
            $result = $conn->query($sql);

            if ($result) {
                // Sukces aktualizacji
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Zaktualizowano parametr'
                ]);
                //log
                $before = 'Produkt: '.$product_id.' <br/>Parametr_id: '.$parameter_id.'<br/>Wartość: '.$row_old['value'];
                $after = 'Produkt: '.$product_id.' <br/>Parametr_id: '.$parameter_id.'<br/>Wartość: '.$value;
                $object_id = $product_id;
                $object_type="product_specs";
                $action_type = '1';
                $desc = 'Zaktualizowano parametr';
                include "../log_stripped.php";
                //log
            } else {
                // Błąd aktualizacji
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Błąd aktualizacji parametru'
                ]);
            }
        } else {
            // Brak zmian
            echo json_encode([
                'status' => 'warning',
                'message' => 'Wprowadzona wartość jest taka sama jak poprzednia'
            ]);
        }
    }
} else {
    // Błąd brak wymaganych danych
    echo json_encode([
        'status' => 'warning',
        'message' => 'Brak wymaganych danych: value: ' . $value . ', parameter_id: ' . $parameter_id . ', product_id: ' . $product_id . ', specs_id: ' . $specs_id
    ]);
}
?>
