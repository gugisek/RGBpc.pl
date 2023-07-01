<?php
include "../scripts/conn_db.php";
$sku = $_POST['sku'];
$for = $_POST['for'];
if (!empty($sku) && !empty($for)) {
    $sql = "SELECT  products.sku FROM carts left join products on carts.product_id = products.id WHERE carts.order_id = '$for' and products.sku = '$sku'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=del_wrong');
    } else{
        $sql2 = "SELECT id FROM products WHERE sku ='$sku'";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
        $id = $result['id'];
        $sql3 = "DELETE FROM carts WHERE product_id = '$id' and order_id = '$for'";
        if ($conn->query($sql3) === TRUE) {
            header('Location: ../panel.php?page=zamówienia&action=create_cart&for='.$for.'&error=product_deleted');
        }else {
            header('Location: ../panel.php?page=produkty&action=reate_cart&for='.$for.'&error=error');
        }
    }
} elseif (empty($sku) or empty($for)) {
        header("Location: ../panel.php?page=zamówienia&action=create_cart&for='$for'&error=add_empty");
}
?>