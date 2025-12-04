<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json'); // Nagłówek JSON

include '../security.php';
include '../conn_db.php';

$order_date = $_POST['order_date'];

$platform_id = $_POST['platform_id'];
$order_type = $_POST['order_type'];
$seller_id = $_POST['seller_id'];
$order_number = $_POST['order_number'];
$external_number = $_POST['external_number'];

$paynament_id = $_POST['paynament_id'];

$client = $_POST['client'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$addres = $_POST['addres'];
$client_type = $_POST['client_type'];
$nip = $_POST['nip'];
$city = $_POST['city'];
$post_code = $_POST['post_code'];

$products = $_POST['products'];

//$cart = json_decode($products, true);


$shipping_id = $_POST['shipping_id'];
$box_machine = $_POST['box_machine'];

//zmienić w pierwszym order type na selecta bo więcej tego jest
//!!!!!!!!!!!!!!1111
// trzeba dodać cene dla produktów w 3 sekcji
// zrobić aby order number był i tak nadpisywany automatycznie


// echo json_encode([
//     'status' => 'warning',
//     'message' => 'Order_date: '.$order_date.' Platform: '.$platform_id.' Order type: '.$order_type.' Seller: '.$seller_id.' Order number: '.$order_number.' External number: '.$external_number.' Client: '.$client.' Phone number: '.$phone_number.' Email: '.$email.' Addres: '.$addres.' Client type: '.$client_type.' NIP: '.$nip.' City: '.$city.' Post code: '.$post_code.' Products: '.$products.' Shipping id: '.$shipping_id.' Box machine: '.$box_machine
// ]);

if($order_date != '' && $platform_id != '' && $order_type != '' && $seller_id != '' && $order_number != '' && $client != '' && $phone_number != '' && $email != '' && $addres != '' && $client_type != '' && $city != '' && $post_code != '' && $products != '' && $shipping_id != '' && $paynament_id != ''){
    $sql="INSERT INTO `orders` (`id`, `type_id`, `order_number`, `external_number`, `seller_id`, `client`, `client_type`, `client_addres`, `client_addres_details`, `client_city`, `client_post_number`, `client_phone_number`, `client_email`, `client_nip`, `paczkomat`, `create_date`, `last_update`, `status_id`, `platform_id`, `invoice_vat`, `products`, `products_count`, `products_value`, `shipping_method`, `shipping_price`, `shipping_number`, `og_invoice_print_date`, `og_invoice_file`, `priority`, `paynament_id`)
    VALUES (NULL, '$order_type', '$order_number', '$external_number', '$seller_id', '$client', '$client_type', '$addres', '', '$city', '$post_code', '$phone_number', '$email', '$nip', '$box_machine', '$order_date', '$order_date', '1', '$platform_id', '$client_type', '$products', '0', '0', '$shipping_id', '0', NULL, NULL, NULL, '', '$paynament_id')";
    $result = $conn->query($sql);
    if($result){
        echo json_encode([
            'status' => 'success',
            'message' => 'Zamówienie zostało dodane'
        ]);
                $color = 'text-violet-500';
                $type_id = 1;
                $message = '<span class="'.$color.'"><b>Utworzono</b></span> - status automatyczny';
                
                $object_id = $conn->insert_id;
                $object_type="orders";
                include "../time_line.php";
                //time_line
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Błąd dodawania zamówienia'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'warning',
        'message' => 'Brakuje wszystkich danych, wypełnij wszystkie pola'
    ]);
}

//$sql="INSERT INTO `orders` (`id`, `type_id`, `order_number`, `external_number`, `seller_id`, `client`, `client_type`, `client_addres`, `client_addres_details`, `client_city`, `client_post_number`, `client_phone_number`, `client_email`, `client_nip`, `paczkomat`, `create_date`, `last_update`, `status_id`, `platform_id`, `invoice_vat`, `products`, `products_count`, `products_value`, `shipping_method`, `shipping_price`, `shipping_number`, `og_invoice_print_date`, `og_invoice_file`, `priority`) 
//VALUES (NULL, '$order_type', '$order_number', '$external_number', '$seller_id', '$client', '$client_type', '$addres', '', '$city', '$post_code', '$phone_number', '$email', '$nip', '$box_machine', '$order_date', '$order_date', '1', '$platform_id', '$client_type', '$products', '0', '0', '$shipping_id', '0', NULL, NULL, NULL, '')";

?>