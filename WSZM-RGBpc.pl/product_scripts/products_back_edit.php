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
    $sql = "UPDATE `products` SET name = '$name', sku = '$sku', bought = '$bought', sold='$sold', quantity='$quantity', img='$image', source='$source', category_id='$category', description='$description', status_id= case when quantity = 0 then 2 when quantity > 0 then status_id='$status' end WHERE products.id = '$id';";
    if ($conn->query($sql) === TRUE) {
         header('Location: ../panel.php?page=produkty&action=edited');
    } else {
        header('Location: ../panel.php?page=produkty&action=error');
    }
    
} elseif (empty($name) or empty($sku) or empty($bought) or empty($sold) or empty($category) or empty($status) or empty($image) or empty($source)) {
            header('Location: ../panel.php?page=produkty&action=edit_empty');
}
?>