<?php
    include "../scripts/conn_db.php";
    if(!empty($_POST)){
        $order_id = $_POST['order_id'];
        $sql = "SELECT products.id FROM carts left JOIN products on products.id = carts.product_id WHERE order_id = ".$order_id."";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $i = 0;
            while($row = mysqli_fetch_assoc($result)){
                $value = $_POST['product_quantity_input_'.$row["id"].''];
                $sql1 = "UPDATE `carts` SET `quantity` = '".$value."' WHERE product_id = ".$row['id']." AND order_id = ".$order_id.";";
                $result1 = mysqli_query($conn, $sql1);
            }
        }if (mysqli_query($conn, $sql1) === TRUE ) {
            header("Location: ../panel.php?page=zamówienia&action=added");
        } else {
            header("Location: ../panel.php?page=zamówienia&action=error");
        }
    } else{
        header('Location: ../panel.php?page=zamówienia&action=error');
    }
?>
