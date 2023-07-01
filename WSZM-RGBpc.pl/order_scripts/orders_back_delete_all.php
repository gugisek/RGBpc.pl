<?php
    include "../scripts/conn_db.php";
    $target_dir = "../public/invoices/";
    if(!empty($_POST['order_id'])){
        if(!empty($_POST['invoice'])){
            $invoice = $_POST['invoice'];
        } else{
            $invoice = '';
        }
        $order_id = $_POST['order_id'];
        $sql = "DELETE from carts where order_id = ".$order_id."";
        $sql2 = "DELETE from orders where id = ".$order_id."";
        shell_exec("rm -r ".$target_dir . $invoice);
        if (mysqli_query($conn, $sql) === TRUE && mysqli_query($conn, $sql2) === TRUE ) {
            header("Location: ../panel.php?page=zamówienia&action=aborted");
        } else {
            header('Location: ../panel.php?page=zamówienia&action=error');
        }
    } else{
        header('Location: ../panel.php?page=zamówienia&action=error');
    }
?>