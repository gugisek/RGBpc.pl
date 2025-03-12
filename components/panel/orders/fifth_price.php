<?php
    include "../../../scripts/conn_db.php";

    $delivery_id = $_GET['delivery_id'];

    $sql = "select price_brutto from shippings where id=$delivery_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $delivery_price = $row['price_brutto'];

    $cart = isset($_GET['products']) ? $_GET['products'] : '[]'; // Domyślnie pusty JSON-owy string
    // Dekodujemy JSON na tablicę asocjacyjną
    
    $cart = json_decode($cart, true);

    if (!is_array($cart)) {
        $cart = []; // Jeśli nie jest tablicą, ustaw pustą tablicę
    }

    // Tworzymy tablicę ilości na podstawie $cart
    $productQuantities = [];
    foreach ($cart as $item) {
        $productQuantities[$item['id']] = $item['quantity'];
    }

    // Pobranie tylko identyfikatorów produktów
    $productIds = array_column($cart, 'id');

    if (empty($productIds)) {
        $cartString = "''"; // Jeśli koszyk pusty, zapobiega błędowi SQL
    } else {
        // Zamiana na liczby całkowite i tworzenie stringa SQL
        $productIds = array_map('intval', $productIds);
        $cartString = "'" . implode("','", $productIds) . "'";
    }
    $sql = "SELECT products.sell_price_brutto
    FROM products 
    WHERE products.id IN ($cartString) 
    GROUP BY products.id
    ORDER BY FIELD(products.id, $cartString) DESC;";
        $result = $conn->query($sql);
        $total = 0;
        while ($row = $result->fetch_assoc()) {
            $total += $row['sell_price_brutto'] * $productQuantities[$item['id']];
        }
        $netto = round($total*0.77, 2);
        $vat = round($total*0.23, 2);
        $sum = $total + $delivery_price;
        // echo json_encode([
        //     'netto' => $netto,
        //     'vat' => $vat,
        //     'sum' => $sum,
        //     'delivery' => $delivery_price
        // ]);
?>
<div class="flex items-center justify-between pb-4">
            <dt class="text-gray-600">Kwota netto</dt>
            <dd class="font-medium text-gray-900"><span id="netto"><?=str_replace(".", ",", $netto)?></span> PLN</dd>
          </div>
          <div class="flex items-center justify-between py-4">
            <dt class="text-gray-600">Dostawa</dt>
            <input type="hidden" id="delivery_value">
            <dd class="font-medium text-gray-900"><span id="delivery"><?=str_replace(".", ",",  $delivery_price)?></span> PLN</dd>
          </div>
          <div class="flex items-center justify-between py-4">
            <dt class="text-gray-600">Podatek Vat</dt>
            <dd class="font-medium text-gray-900"><span id="vat"><?=str_replace(".", ",",  $vat)?></span> PLN</dd>
          </div>
          <div class="flex items-center justify-between pt-4">
            <dt class="font-medium text-gray-900">Suma końcowa brutto</dt>
            <dd class="font-medium text-indigo-600"><span id="sum"><?=str_replace(".", ",", $sum)?></span> PLN</dd>
</div>