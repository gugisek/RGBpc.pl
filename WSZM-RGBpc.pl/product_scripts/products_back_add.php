<?php
include "../scripts/conn_db.php";
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
if (!empty($name) && !empty($sku) && !empty($bought) && !empty($sold) && !empty($quantity) && !empty($category) && !empty($status) && !empty($image) && !empty($source)) {
    $sql = "SELECT name FROM products WHERE name='$name'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if ($row['name'] == $name) {
        header('Location: ../panel.php?page=produkty&action=add_same');
    } else {
        $sql = "INSERT INTO `products` (`name`, `sku`, `bought`, `sold`, `quantity`, `img`, `source`, `category_id`, `description`, `status_id`) VALUES ('$name', '$sku', '$bought', '$sold', '$quantity', '$image', '$source', '$category', '$description', '$status')";
        if ($conn->query($sql) === TRUE) {
            header('Location: ../panel.php?page=produkty&action=added');
        } else {
            header('Location: ../panel.php?page=produkty&action=error');
        }
    }
    
} elseif (empty($name) or empty($sku) or empty($bought) or empty($sold) or empty($quantity) or empty($category) or empty($status) or empty($image) or empty($source)) {
            header('Location: ../panel.php?page=produkty&action=add_empty');
}
?>