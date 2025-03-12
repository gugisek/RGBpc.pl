    <?php
                            include "../../../scripts/conn_db.php";
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
                        $sql = "SELECT products.id, name, description, img, products.sell_price_brutto, sku, 
                        count(product_doms.id) as 'quantity', products.status_id
                        FROM products 
                        LEFT JOIN product_doms ON product_doms.product_id = products.id AND product_doms.status_id = 2
                        WHERE products.id IN ($cartString) 
                        GROUP BY products.id
                        ORDER BY FIELD(products.id, $cartString) DESC;";
                            $result = $conn->query($sql);
                            $price = 0;
                            $products = 0;
                            $products_2 = 0;
                            if ($result->num_rows > 0) {
                               
                                while($row = $result->fetch_assoc()) {
                                    $products_2++;
                                    $products = $products + 1* $productQuantities[$row['id']];
                                    $cartQuantity = isset($productQuantities[$row['id']]) ? $productQuantities[$row['id']] : 1;
                                    $price += $row['sell_price_brutto']* $cartQuantity;
                                    echo '<div class="border-b border-t border-gray-200 bg-white shadow-sm sm:rounded-xl sm:border">
                                            <div class="px-4 py-6 sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">
                                                <div class="sm:flex lg:col-span-7">
                                                <div class="aspect-h-1 aspect-w-1 w-full flex-shrink-0 overflow-hidden rounded-lg sm:aspect-none sm:h-32 sm:w-32">
                                                    <img src="img/products_images/'.$row['img'].'" alt="Product image" class="h-full w-full object-cover object-center sm:h-full sm:w-full border border-black/10 rounded-lg">
                                                </div>

                                                <div class="mt-6 sm:ml-6 sm:mt-0">
                                                    <h3 class="text-base font-medium text-gray-900">
                                                    <a href="#">'.$row['name'].'</a>
                                                    </h3>
                                                    <p class="mt-2 text-sm font-medium text-gray-900">'.str_replace(".", ",",$row['sell_price_brutto']).' PLN</p>
                                                    <p class="mt-3 text-sm text-gray-500">'.$row['description'].'</p>
                                                </div>
                                                </div>

                                                <div class="mt-6 lg:col-span-5 lg:mt-0">
                                                <dl class="grid grid-cols-2 gap-x-6 text-sm">
                                                    <div>
                                                    <dt class="font-medium text-gray-900">Numer SKU</dt>
                                                    <dd class="mt-3 text-gray-500">
                                                        <span class="block uppercase">'.$row['sku'].'</span>
                                                    </dd>
                                                    </div>
                                                    <div>
                                                    <dt class="font-medium text-gray-900">Ilość</dt>
                                                    <dd class="mt-3 space-y-3 text-gray-500">
                                                        <p>Dostępne: '.$row['quantity'].'</p>
                                                        <p>W zamówieniu: <span class="text-gray-800">'.$cartQuantity.'</span></p>
                                                    </dd>
                                                    </div>
                                                </dl>
                                                </div>
                                            </div>

                                            
                                            </div>';
                                }
                                echo '<p class="text-center text-sm text-gray-400">Liczba produktów w koszyku: '.$products_2.' ('.$products.' szt.)</p>';
                                
                            }

        ?>