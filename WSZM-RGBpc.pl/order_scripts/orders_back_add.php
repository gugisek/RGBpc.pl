<?php
include "../scripts/conn_db.php";
include "orders_back_upload.php";
$order_number = $_POST['order_number'];
$seller = $_POST['seller'];
$client = $_POST['client'];
$contact_line_1 = $_POST['contact_line_1'];
$contact_line_2 = $_POST['contact_line_2'];
$date = $_POST['date'];
$value = $_POST['value'];
$status = $_POST['status'];
$description = $_POST['description'];
$platform = $_POST['platform'];
$invoice = $_POST['order_number'].".".$fileType;
if (!empty($order_number) && !empty($seller) && !empty($client) && !empty($contact_line_1) && !empty($contact_line_2) && !empty($date) && !empty($value) && !empty($status) && !empty($platform)) {
    $sql = "SELECT order_number FROM orders WHERE order_number='$order_number'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if ($row['order_number'] == $order_number) {
        header('Location: ../panel.php?page=zamówienia&action=add_same');
    }else if($_FILES["upload"]["size"] > 500000){
        header('Location: ../panel.php?page=zamówienia&action=too_large');
    }else if($_FILES["upload"]["error"] == '4'){
        $sql = "INSERT INTO `orders` (`order_number`, `seller`, `client`, `contact_line_1`, `contact_line_2`, `date`, `value`, `status_id`, `platform_id`, `description`, `invoice`) VALUES ('$order_number', '$seller', '$client', '$contact_line_1', '$contact_line_2', '$date', '$value', '$status', '$platform', '$description', '')";
        $sql2 = "SELECT id FROM orders ORDER by id desc limit 1;";
        if ($conn->query($sql) === TRUE) {
            $id = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
            rename($target_file, $target_dir . $invoice);
            header("Location: ../panel.php?page=zamówienia&action=create_cart&for=".$id['id']."");
        } else {
            header('Location: ../panel.php?page=zamówienia&action=error');
        }
    }else if($_FILES["upload"]["error"] !== '4'){
        if($fileType !== 'pdf' && $fileType !== 'jpeg' && $fileType !== 'png' && $fileType !== 'jpg'){
            header('Location: ../panel.php?page=zamówienia&action=wrong_ext');
        } else {
            $sql = "INSERT INTO `orders` (`order_number`, `seller`, `client`, `contact_line_1`, `contact_line_2`, `date`, `value`, `status_id`, `platform_id`, `description`, `invoice`) VALUES ('$order_number', '$seller', '$client', '$contact_line_1', '$contact_line_2', '$date', '$value', '$status', '$platform', '$description', '$invoice')";
            $sql2 = "SELECT id FROM orders ORDER by id desc limit 1;";
            if ($conn->query($sql) === TRUE && move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
                $id = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
                rename($target_file, $target_dir . $invoice);
                header('Location: ../panel.php?page=zamówienia&action=added');
                header("Location: ../panel.php?page=zamówienia&action=create_cart&for=".$id['id']."");
            } else{
                header('Location: ../panel.php?page=zamówienia&action=error');
            }
        }
    }
} elseif (empty($order_number) or empty($seller) or empty($client) or empty($contact_line_1) or empty($contact_line_2) or empty($date) or empty($value) or empty($status) or empty($platform)) {
        header('Location: ../panel.php?page=zamówienia&action=add_empty');
}
?>