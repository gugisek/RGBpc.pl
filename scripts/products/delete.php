<?php
include '../security.php';
$id = $_POST['id'];
include "../conn_db.php";
$sql_old = "SELECT products.id, products.name, products.sku, products.our_olx, products.our_allegro, products.img, products.type, products.source, products.sell_price_brutto, product_categories.category, products.category_id, products.description, products.status_id, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.category_id LEFT JOIN product_doms on product_doms.product_id=products.id LEFT JOIN product_status on product_status.id=products.status_id where products.id=$id group by products.id;";
$result_old = mysqli_query($conn, $sql_old);
if(mysqli_num_rows($result_old) > 0)
$row_old = mysqli_fetch_assoc($result_old);

$sql = "DELETE FROM products WHERE id=$id";
if($id != ""){
    if ($conn->query($sql) === TRUE) {
        //log
        $before = 'Nazwa: ' . $row_old['name'] . ' <br/>SKU: ' . $row_old['sku'] . ' <br/>Kategoria: ' . $row_old['category'] . ' <br/>Opis: ' . $row_old['description'] . ' <br/>Status: ' . $row_old['status'] . ' <br/>Cena: ' . $row_old['sell_price_brutto'] . ' <br/>Ilość: ' . $row_old['quantity'] . ' <br/>Typ: ' . $row_old['type'] . ' <br/>Źródło: ' . $row_old['source'] . ' <br/>OLX: ' . $row_old['our_olx'] . ' <br/>Allegro: ' . $row_old['our_allegro'] . ' <br/>Zdjęcie: ' . $row_old['img'] . ' <br/>Kategoria ID: ' . $row_old['category_id'] . ' <br/>Status ID: ' . $row_old['status_id'];
        $after = "";
                $object_id=$id;
                $object_type="Products";
                $action_type="3";
                $desc="Usunięto produkt";
                include "../log.php";
        //log
        $_SESSION['alert'] = 'Pomyślnie usunięto produkt <script>openPanelSite("products");</script>';
        $_SESSION['alert_type'] = 'success';
    } else {
        $_SESSION['alert'] = 'Wystąpił błąd podczas usuwania produktu';
        $_SESSION['alert_type'] = 'error';
    }
}else{
    $_SESSION['alert'] = 'Nie wybrano produktu';
    $_SESSION['alert_type'] = 'warning';
}
header("Location: ../../panel.php");
?>