<?php
include "../scripts/conn_db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$sku = $_POST['sku'];
$bought = $_POST['bought'];
$sold = $_POST['sold'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$status = $_POST['status'];
$description = $_POST['description'];
$image = $_POST['image'];
$source = $_POST['source'];
if (!empty($name) && !empty($sku) && !empty($bought) && !empty($sold) && !empty($category) && !empty($status) && !empty($image) && !empty($source)) {
    $sql = "SELECT name FROM products WHERE name='$name'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if($status == '3' or $status == '4'){
        $sql = "UPDATE `products` SET name = '$name', sku = '$sku', bought = '$bought', sold='$sold', quantity='0', img='$image', source='$source', category_id='$category', description='$description', status_id='$status' WHERE products.id = '$id';";
        if ($conn->query($sql) === TRUE) {
            header('Location: ../panel.php?page=produkty&action=edited');
        } else {
            header('Location: ../panel.php?page=produkty&action=error');
        }
    }else if($status == '1' or $status == '2'){
        $sql = "UPDATE `products` SET name = '$name', sku = '$sku', bought = '$bought', sold='$sold', quantity='$quantity', img='$image', source='$source', category_id='$category', description='$description', status_id= case when quantity = 0 then 2 when quantity > 0 then $status end WHERE products.id = '$id';";
        if ($conn->query($sql) === TRUE) {
            header('Location: ../panel.php?page=produkty&action=edited');
        } else {
            header('Location: ../panel.php?page=produkty&action=error');
            print_r($sql);
        }
    }
    
} elseif (empty($name) or empty($sku) or empty($bought) or empty($sold) or empty($category) or empty($status) or empty($image) or empty($source)) {
            header('Location: ../panel.php?page=produkty&action=edit_empty');
}
?>