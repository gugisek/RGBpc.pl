<?php
    include "../scripts/conn_db.php";
    $id = $_POST['id'];
    $order_number = $_POST['order_number'];
    $seller = $_POST['seller'];
    $client = $_POST['client'];
    $contact_line_1 = $_POST['contact_line_1'];
    $contact_line_2 = $_POST['contact_line_2'];
    $date = $_POST['date'];
    $value = $_POST['value'];
    $order_status = $_POST['order_status'];
    $order_platform = $_POST['order_platform'];
    $description = $_POST['description'];
    $invoice = $_POST['invoice'];
    include "orders_back_upload.php";
    $in_ext = pathinfo($target_file, PATHINFO_EXTENSION);
    $invoice_without_ext = pathinfo($invoice, PATHINFO_FILENAME);

    if(!empty($order_number) && !empty($seller) && !empty($client) && !empty($contact_line_1) && !empty($contact_line_2) && !empty($date) && !empty($value)  && !empty($order_status) && !empty($order_platform)){
        $sql = "SELECT status_id FROM orders WHERE id = ".$id."";
        $result = mysqli_query($conn, $sql);
        $current_status = mysqli_fetch_assoc($result);
        $sql2 = "SELECT product_id, quantity FROM carts WHERE order_id = ".$id."";
        $result2 = mysqli_query($conn, $sql2);
        if($order_status == '2' && $current_status['status_id'] == '1' or $order_status == '2' && $current_status['status_id'] == '3'){
            while($row2 = mysqli_fetch_assoc($result2)){
                $sql3 = "UPDATE products SET quantity = quantity + ".$row2['quantity']." WHERE id = ".$row2['product_id']."";
                $result3 = mysqli_query($conn, $sql3);
                $sql_check = "SELECT quantity FROM products WHERE id = ".$row2['product_id']."";
                $result_check = mysqli_query($conn, $sql_check);
                if(mysqli_fetch_assoc($result_check)['quantity'] == '0'){
                    mysqli_query($conn, "UPDATE products SET status_id = 2 WHERE id = ".$row2['product_id']."");
                } else{
                    mysqli_query($conn, "UPDATE products SET status_id = 1 WHERE id = ".$row2['product_id']."");
                }
            }
        } elseif($order_status == '1' && $current_status['status_id'] == '2' or $order_status == '3' && $current_status['status_id'] == '2'){
            while($row3 = mysqli_fetch_assoc($result2)){
                $sql4 = "UPDATE products SET quantity = quantity - ".$row3['quantity']." WHERE id = ".$row3['product_id']."";
                $result4 = mysqli_query($conn, $sql4);
                $sql_check = "SELECT quantity FROM products WHERE id = ".$row3['product_id']."";
                $result_check = mysqli_query($conn, $sql_check);
                if(mysqli_fetch_assoc($result_check)['quantity'] == '0'){
                    mysqli_query($conn, "UPDATE products SET status_id = 2 WHERE id = ".$row3['product_id']."");
                } else{
                    mysqli_query($conn, "UPDATE products SET status_id = 1 WHERE id = ".$row3['product_id']."");
                }
            }
        } elseif($order_status == $current_status['status_id']) {
            
        }
        if($_FILES['upload']['error'] == '4'){
            if($invoice){
                $invoice = $invoice;
            } else{
                $invoice = '';
            }
            $sql5 = "UPDATE orders set order_number = '$order_number', seller = '$seller', client = '$client', contact_line_1 = '$contact_line_1', contact_line_2 = '$contact_line_2', date = '$date', value = '$value', status_id = '$order_status', platform_id = '$order_platform', description = '$description', invoice = '$invoice' WHERE id = '$id'";
            if($conn->query($sql5) === TRUE){
                if($_FILES["upload"]["error"] == '4'){
                    header('Location: ../panel.php?page=zamówienia&action=edited');
                }else if($_FILES["upload"]["size"] > 500000){
                    header('Location: ../panel.php?page=zamówienia&action=too_large');
                }else if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)){
                    //shell_exec("rm -f ".$target_dir . $order_number.".*");
                    rename($target_file, $target_dir.$order_number.".".$in_ext);
                    header('Location: ../panel.php?page=zamówienia&action=edited');
                } else {
                    header('Location: ../panel.php?page=zamówienia&action=img_error');
                }
            } else{
                header('Location: ../panel.php?page=zamówienia&action=error');
            }
        } else{
            if($fileType !== 'jpg' && $fileType !== 'jpeg' && $fileType !== 'png' && $fileType !== 'pdf'){
                header('Location: ../panel.php?page=zamówienia&action=wrong_ext');
            } else{
                $sql5 = "UPDATE orders set order_number = '$order_number', seller = '$seller', client = '$client', contact_line_1 = '$contact_line_1', contact_line_2 = '$contact_line_2', date = '$date', value = '$value', status_id = '$order_status', platform_id = '$order_platform', description = '$description', invoice = '$order_number.$in_ext' WHERE id = '$id'";
                if($conn->query($sql5) === TRUE){
                    if($_FILES["upload"]["error"] == '4'){
                        header('Location: ../panel.php?page=zamówienia&action=edited');
                    }else if($_FILES["upload"]["size"] > 500000){
                        header('Location: ../panel.php?page=zamówienia&action=too_large');
                    }else if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)){
                        //shell_exec("rm -f ".$target_dir . $order_number.".*");
                        rename($target_file, $target_dir.$order_number.".".$in_ext);
                        header('Location: ../panel.php?page=zamówienia&action=edited');
                    } else {
                        header('Location: ../panel.php?page=zamówienia&action=img_error');
                    }
                } else{
                    header('Location: ../panel.php?page=zamówienia&action=error');
                }
            }
        }
    } elseif(empty($order_number) or empty($seller) or empty($client) or empty($contact_line_1) or empty($contact_line_2) or empty($date) or empty($value) or empty($order_status) or empty($order_platform)){
        header('Location: ../panel.php?page=zamówienia&action=edit_empty');
    }
?>
