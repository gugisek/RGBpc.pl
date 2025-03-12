                    <h3 class="sr-only">Items in your cart</h3>
                    <ul data-aos="fade-in" role="list" class="divide-y divide-gray-200">
                    <?php
                        include "../../../scripts/conn_db.php";
                        $cart = isset($_GET['cart']) ? $_GET['cart'] : '[]'; // Domyślnie pusty JSON-owy string

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

                        $sql = "SELECT products.id, name, img, products.sell_price_brutto, sku, 
                                    count(product_doms.id) as 'quantity', products.status_id
                                FROM products 
                                LEFT JOIN product_doms ON product_doms.product_id = products.id AND product_doms.status_id = 2
                                WHERE products.id IN ($cartString) 
                                GROUP BY products.id
                                ORDER BY FIELD(products.id, $cartString) DESC;";

                        $result = $conn->query($sql);
                        $price = 0;
                        $products = 0;

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $products = $products + 1* $productQuantities[$row['id']];

                                // Pobranie ilości z koszyka lub ustawienie domyślnej wartości 1
                                $cartQuantity = isset($productQuantities[$row['id']]) ? $productQuantities[$row['id']] : 1;

                                echo '<li class="flex px-4 py-6 sm:px-6">
                                        <div class="flex-shrink-0">
                                            <img src="img/products_images/' . $row['img'] . '" alt="" class="aspect-square object-cover border border-black/10 w-20 rounded-xl">
                                        </div>

                                        <div class="ml-6 flex flex-1 flex-col">
                                            <div class="flex">
                                                <div class="min-w-0 flex-1">
                                                    <h4 class="text-sm">
                                                        <a href="#" class="font-medium text-gray-700 hover:text-gray-800">' . $row['name'] . '</a>
                                                    </h4>
                                                    <p class="mt-1 text-sm text-gray-500 uppercase">' . $row['sku'] . ' ';

                                if ($row['quantity'] <= 1 && $row['quantity'] != 0) {
                                    echo '<span class="text-xs text-red-400 normal-case"> Ostatnia sztuka (' . $row['quantity'] . ')</span></p>';
                                } elseif ($row['quantity'] <= 2 && $row['quantity'] != 0) {
                                    echo '<span class="text-xs text-orange-400 normal-case"> Ostatnie sztuki (' . $row['quantity'] . ')</span></p>';
                                } elseif ($row['quantity'] == 0 && $row['status_id'] == 1) {
                                    echo '<span class="text-xs text-red-400 normal-case"> Brak na stanie</span></p>';
                                } elseif ($row['quantity'] > 2) {
                                    echo '<span class="text-xs text-green-400 normal-case"> Dostępne (' . $row['quantity'] . ')</span></p>';
                                } else {
                                    echo '<span class="text-xs text-yellow-400 normal-case"> Ostatnie sztuki (' . $row['quantity'] . ')</span></p>';
                                }

                                echo '</div>
                                        <div class="ml-4 flow-root flex-shrink-0">
                                            <button type="button" onclick="removeFromCart(' . $row['id'] . ')" class="-m-2.5 flex items-center justify-center bg-white p-2.5 text-gray-400 hover:text-red-500 duration-150">
                                                <span class="sr-only">Remove</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd"/>
                                                </svg>  
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex flex-1 items-end justify-between pt-2">
                                        <p class="mt-1 text-sm font-medium text-gray-900">' . str_replace(".", ",", $row['sell_price_brutto']) . '</p>

                                        <div class="ml-4">
                                            <label for="quantity-' . $row['id'] . '" class="sr-only">Quantity</label>
                                            <input onchange="productQuantityUpdate(' . $row['id'] . ', this.value)" type="number" min="1" value="' . $cartQuantity . '" id="quantity-' . $row['id'] . '" name="quantity" class="w-9 pl-1 rounded-md border border-gray-300 text-left text-base font-medium text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                            </li>';
                                $price += $row['sell_price_brutto']* $cartQuantity;
                            }
                        } else {
                            echo '<span class="text-sm px-6 text-gray-500">Brak produktów w koszyku</span>';
                        }
                    ?>

                        

                    <!-- More products... -->
                    </ul>
                    <dl class="space-y-6 border-t border-gray-200 px-4 py-6 sm:px-6">
                        
                    <div class="flex items-center justify-between">
                        <span class="w-full text-xs text-gray-600 ">Liczba produktów w koszyku</span>
                        <dd class="text-xs font-medium text-gray-600"><?=$products?></dd>
                    </div>
                    <div class="flex items-center justify-between">
                        <dt class="text-sm">Cena netto</dt>
                        <dd class="text-sm font-medium text-gray-900"><?=str_replace(".", ",", round((0.77*$price), 2))?> PLN</dd>
                    </div>
                    <div class="flex items-center justify-between">
                        <dt class="text-sm">Prowizja</dt>
                        <dd class="text-sm font-medium text-gray-900">-,-</dd>
                    </div>
                    <div class="flex items-center justify-between">
                        <dt class="text-sm">VAT</dt>
                        <dd class="text-sm font-medium text-gray-900"><?=str_replace(".", ",", round((0.23*$price), 2))?> PLN</dd>
                    </div>
                    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                        <dt class="text-base font-medium">Cena brutto</dt>
                        <dd class="text-base font-medium text-gray-900"><?=str_replace(".", ",", $price)?> PLN</dd>
                    </div>
                    </dl>