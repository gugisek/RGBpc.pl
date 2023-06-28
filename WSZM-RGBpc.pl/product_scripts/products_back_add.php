<?php
include "../scripts/conn_db.php";
include "products_back_upload.php";
$name = $_POST['name'];
$sku = $_POST['sku'];
$bought = $_POST['bought'];
$sold = $_POST['sold'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$status = $_POST['status'];
$description = $_POST['description'];
$source = $_POST['source'];
$our_olx = $_POST['our_olx'];
$our_allegro = $_POST['our_allegro'];
$image = $_POST['sku'].".".$imageFileType;
if (!empty($name) && !empty($sku) && !empty($bought) && !empty($sold) && !empty($quantity) && !empty($category) && !empty($status) && !empty($image) && !empty($source)) {
    $sql = "SELECT name FROM products WHERE name='$name'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if ($row['name'] == $name) {
        header('Location: ../panel.php?page=produkty&action=add_same');
    }else if($_FILES["upload"]["size"] > 500000){
        header('Location: ../panel.php?page=produkty&action=too_large');
    }else if($_FILES["upload"]["error"] == '4'){
        $sql = "INSERT INTO `products` (`name`, `sku`, `bought`, `sold`, `quantity`, `img`, `source`, `our_olx`, `our_allegro`, `category_id`, `description`, `status_id`) VALUES ('$name', '$sku', '$bought', '$sold', '$quantity', '', '$source', '$our_olx', '$our_allegro', '$category', '$description', '$status')";
        if ($conn->query($sql) === TRUE) {
            //log
            $object_id=$conn->insert_id;
            $object_type="products";
            $before="NULL";
            $after="Nazwa: $name, <br>SKU:$sku, <br>Cena zakupu: $bought, <br>Cena: $sold, <br>Ilość: $quantity, $image, <br>Źródło: $source, <br>ID kategorii: $category, <br>Opis: $description, <br>ID statusu: $status";
            $action_type="2";
            $desc="Dodano produkt";
            include "../scripts/log.php";
            //log
            rename($target_file, $target_dir . $image);
            header('Location: ../panel.php?page=produkty&action=added');
        } else {
            header('Location: ../panel.php?page=produkty&action=error');
        }
    }else if($_FILES["upload"]["error"] !== '4'){
        if($imageFileType !== 'jpg' && $imageFileType !== 'jpeg' && $imageFileType !== 'png'){
            header('Location: ../panel.php?page=produkty&action=wrong_ext');
        } else {
            $sql = "INSERT INTO `products` (`name`, `sku`, `bought`, `sold`, `quantity`, `img`, `source`, `our_olx`, `our_allegro`, `category_id`, `description`, `status_id`) VALUES ('$name', '$sku', '$bought', '$sold', '$quantity', '$image', '$source', '$our_olx', '$our_allegro', '$category', '$description', '$status')";
            if ($conn->query($sql) === TRUE && move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
                //log
                $object_id=$conn->insert_id;
                $object_type="products";
                $before="NULL";
                $after="Nazwa: $name, <br>SKU:$sku, <br>Cena zakupu: $bought, <br>Cena: $sold, <br>Ilość: $quantity, $image, <br>Źródło: $source, <br>ID kategorii: $category, <br>Opis: $description, <br>ID statusu: $status";
                $action_type="2";
                $desc="Dodano produkt";
                include "../scripts/log.php";
                //log
                rename($target_file, $target_dir . $image);
                header('Location: ../panel.php?page=produkty&action=added');
            } else {
                header('Location: ../panel.php?page=produkty&action=error');
            }
        }
    }
} elseif (empty($name) or empty($sku) or empty($bought) or empty($sold) or empty($quantity) or empty($category) or empty($status) or empty($image) or empty($source)) {
        header('Location: ../panel.php?page=produkty&action=add_empty');
}
?>