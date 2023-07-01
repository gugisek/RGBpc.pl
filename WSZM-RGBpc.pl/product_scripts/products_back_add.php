<?php
include "../scripts/conn_db.php";
include "products_back_upload.php";
$for = $_POST['for'];
$name = $_POST['name'];
$sku = $_POST['sku'];
$bought = $_POST['bought'];
$sold = $_POST['sold'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$status = $_POST['status'];
$description = $_POST['description'];
$source = $_POST['source'];
$image = $_POST['sku'].".".$imageFileType;
if (!empty($name) && !empty($sku) && !empty($bought) && !empty($sold) && !empty($category) && !empty($status) && !empty($image) && !empty($source)) {
    $sql = "SELECT name FROM products WHERE name='$name'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if ($row['name'] == $name && !$for) {
        header('Location: ../panel.php?page=produkty&action=add_same');
    }else if ($row['name'] == $name && $for) {
        header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=add_same');
    }else if($_FILES["upload"]["size"] > 500000 && !$for){
        header('Location: ../panel.php?page=produkty&action=too_large');
    }else if($_FILES["upload"]["size"] > 500000 && $for){
        header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=too_large');
    }else if($_FILES["upload"]["error"] == '4'){
        $sql = "INSERT INTO `products` (`name`, `sku`, `bought`, `sold`, `quantity`, `img`, `source`, `category_id`, `description`, `status_id`) VALUES ('$name', '$sku', '$bought', '$sold', '$quantity', '', '$source', '$category', '$description', '$status')";
        if ($conn->query($sql) === TRUE) {
            //log
            $object_id=$conn->insert_id;
            $object_type="products";
            $before="NULL";
            $after="$name, $sku, $bought, $sold, $quantity, $image, $source, $category, $description, $status";
            $action_type="2";
            $desc="Dodano produkt";
            include "../scripts/log.php";
            //log
            rename($target_file, $target_dir . $image);
            if($for){
                $sql_get_new_id = "SELECT id FROM products ORDER by id desc limit 1;";
                $new_product_id = mysqli_fetch_assoc(mysqli_query($conn, $sql_get_new_id));
                $sql_cart = "INSERT into carts (product_id, order_id) VALUES ('".$new_product_id['id']."','".$for."')";
                if($conn->query($sql_cart) === TRUE){
                    header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=product_added');
                } else{
                    header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=error');
                }
            } else{
                header('Location: ../panel.php?page=produkty&action=added');
            }
        }elseif($conn->query($sql) !== TRUE && $for){
            header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=error');
        } else {
            header('Location: ../panel.php?page=produkty&action=error');
        }
    }else if($_FILES["upload"]["error"] !== '4'){
        if($imageFileType !== 'jpg' && $imageFileType !== 'jpeg' && $imageFileType !== 'png' && !$for){
            header('Location: ../panel.php?page=produkty&action=wrong_ext');
        } elseif($imageFileType !== 'jpg' && $imageFileType !== 'jpeg' && $imageFileType !== 'png' && $for){
            header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=wrong_ext');
        } else {
            $sql = "INSERT INTO `products` (`name`, `sku`, `bought`, `sold`, `quantity`, `img`, `source`, `category_id`, `description`, `status_id`) VALUES ('$name', '$sku', '$bought', '$sold', '$quantity', '$image', '$source', '$category', '$description', '$status')";
            if ($conn->query($sql) === TRUE && move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
                //log
                $object_id=$conn->insert_id;
                $object_type="products";
                $before="NULL";
                $after="$name, $sku, $bought, $sold, $quantity, $image, $source, $category, $description, $status";
                $action_type="2";
                $desc="Dodano produkt";
                include "../scripts/log.php";
                //log
                rename($target_file, $target_dir . $image);
                if($for){
                    $sql_get_new_id = "SELECT id FROM products ORDER by id desc limit 1;";
                    $new_product_id = mysqli_fetch_assoc(mysqli_query($conn, $sql_get_new_id));
                    $sql_cart = "INSERT into carts (product_id, order_id) VALUES ('".$new_product_id['id']."','".$for."')";
                    if($conn->query($sql_cart) === TRUE){
                        header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=product_added');
                    } else{
                        header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=error');
                    }
                } else{
                    header('Location: ../panel.php?page=produkty&action=added');
                }
            } elseif($conn->query($sql) !== TRUE && $for){
                header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=error');
            } else {
                header('Location: ../panel.php?page=produkty&action=error');
            }
        }
    }
} elseif (empty($name) or empty($sku) or empty($bought) or empty($sold) or empty($category) or empty($status) or empty($image) or empty($source)) {
        header('Location: ../panel.php?page=produkty&action=add_empty');
} else{
}
?>