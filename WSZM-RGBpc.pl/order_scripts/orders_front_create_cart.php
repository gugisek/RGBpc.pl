<?php
    include 'scripts/conn_db.php';
    $id = $_GET['for'];
    if($action=='create_cart'){
        if(isset($_GET['error'])){
            $error = $_GET['error'];
            if($error == 'add_same'){
                echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                    echo "<h1>Taki produkt już znajduje się w koszyku.</h1>";
                    echo '<a href="?page=zamówienia&action=create_cart&for='.$id.'" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
                echo "</section>";
            } elseif($error == 'product_added'){
                echo "<section id='added' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
                    echo "<h1>Pomyślnie dodano nowy produkt do koszyka.</h1>";
                    echo '<a href="?page=zamówienia&action=create_cart&for='.$id.'" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
                echo "</section>";
            }elseif($error=='error') {
            echo "<section id='edited' class='flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Błąd bazy danych. Spróbuj ponownie lub skontaktuj się z administratorem.</h1>";
                echo '<a href="?page=zamówienia&action=create_cart&for='.$id.'" class="hover:rotate-90 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                 </svg></a>';
            echo "</section>";
            }elseif($error=='add_empty') {
            echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Nie zawarto wszystkich wymaganych informacji. Spróbuj ponownie.</h1>";
                echo '<a href="?page=zamówienia&action=create_cart&for='.$id.'" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
            } elseif($error == 'product_deleted'){
                echo "<section id='deleted' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
                    echo "<h1>Pomyślnie usunięto produkt z koszyka.</h1>";
                    echo '<a href="?page=zamówienia&action=create_cart&for='.$id.'" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
                echo "</section>";
            }elseif($error == 'del_wrong'){
                echo "<section id='deleted' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                    echo "<h1>Taki produkt nie znajduje się w koszyku.</h1>";
                    echo '<a href="?page=zamówienia&action=create_cart&for='.$id.'" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
                echo "</section>";
            }elseif($error=='wrong_ext') {
                echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                    echo "<h1>Wybrane zdjęcie posiada nieprawidłowe rozszerzenie.</h1>";
                    echo '<a href="?page=produkty&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
                echo "</section>";
            }
        }
        echo '<section class="w-1/2 bg-white shadow-xl rounded-3xl py-6 px-6 flex">';
            echo '<table class="w-full">';
                $sql2 = "SELECT order_number FROM orders WHERE id = '$id'";
                $result2 = mysqli_query($conn, $sql2);
                $on = mysqli_fetch_assoc($result2)['order_number'];
                echo '<h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Koszyk dla zamówienia nr:<span class="uppercase"> '.$on.'</span></h1>';
                echo '<tr class="uppercase text-left text-xs text-gray-400 ">';
                    echo '<th class="w-1/8 text-center">SKU</th>';
                    echo '<th class="w-1/8 text-center">Nazwa</th>';
                    echo '<th class="w-1/8 text-center">Ilość</th>';
                echo '</tr>';
                $sql = "SELECT orders.id, products.sku, products.name, carts.quantity FROM carts left join products on carts.product_id = products.id left join orders on orders.id = carts.order_id where orders.id = ".$id.";";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr class='border-t-[0.5px] border-b-[0.5px] transition-all duration-300'>";
                            echo "<td class='text-center text-sm text-gray-500 uppercase w-1/3'>".$row['sku']."</td>";
                            echo "<td class='text-center text-sm text-gray-500 capitalzie w-1/3'>".$row['name']."</td>";
                            ?>
                            <td class='text-center text-sm text-gray-500 capitalzie'><input class='product_quantity text-center w-full' type='number' <?php if($row['quantity'] !== NULL){ echo "value=".$row['quantity'].""; } else { echo "value='0'"; } ?> min='1' step='1'/></td>
                            <?php
                            echo '<form method="POST" action = "order_scripts/orders_back_delete_create_cart.php">';
                            echo '<input name="sku" type="hidden" value='.$row["sku"].'>';
                            echo '<input name="for" type="hidden" value='.$_GET["for"].'>';
                            echo "<td class='text-center capitalize text-sm text-gray-500'><button type='button' style='display:none' class='text-indigo-500 hover:text-indigo-700 transition-all duration-300 product_edit'>Edytuj</button><button type='button' class='text-green-500 hover:text-green-700 transition-all duration-300 product_apply'>Zatwierdź</button><button type='submit' class='text-red-500 hover:text-red-700 transition-all duration-300 product_delete'>Usuń</button></td>";
                            echo '</form>';
                        echo "</tr>";
                    }
            echo '</table>';
                } else{
                        echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                            echo "<td class='text-center py-4 text-sm text-gray-500 text-start'>Dodaj produkt do koszyka.</td>";
                            echo "<td class='text-center text-sm text-gray-500 '></td>";
                            echo "<td class='text-center text-sm text-gray-500 '></td>";
                        echo "</tr>";
                    echo "</table>";
                }
        echo '</section>';
        echo '<section class="w-1/2 bg-white shadow-xl rounded-3xl py-6 px-6 flex">';
            echo '<!-- search -->';
            include 'product_scripts/products_search.php';
            echo '<!-- script for working enter to submit on select -->';
            include 'product_scripts/products_option_enter.php';
        echo '</section>';
        echo '<section class="w-1/2 bg-white shadow-xl rounded-3xl py-6 px-6">';
            echo '<table class="w-full">';
                echo '<h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Produkty</h1>';
                echo '<tr class="uppercase text-left text-xs text-gray-400 ">';
                    echo '<th class="w-1/8 text-center">SKU</th>';
                    echo '<th class="w-1/8 text-center">Nazwa</th>';
                    echo '<th class="w-1/8 text-center">Ilość</th>';
                    echo '<th class="w-1/8 text-center"></th>';
                echo '</tr>';
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
            } else {
                $search = "";
            }
            $sql = "SELECT products.id, name, sku, quantity FROM products where (name like '%$search%') or (sku like '%$search%');";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                        echo "<td class='text-center text-sm text-gray-500 uppercase'>".$row['sku']."</td>";
                        echo "<td class='text-center text-sm text-gray-500 capitalzie'>".$row['name']."</td>";
                        echo "<td class='py-5 text-center capitalize text-sm";
                            if ($row['quantity']>=5 && $row['quantity']<10) {
                                echo " text-green-500";
                            }
                            else if ($row['quantity']>=10) {
                                echo " text-gray-500";
                            }
                            else if ($row['quantity']<=2) {
                                echo " text-red-500";
                            }
                            else if ($row['quantity']>2 && $row['quantity']<=4) {
                                echo " text-yellow-500";
                            }
                        echo "'>";
                            echo $row['quantity'];
                        echo "</td>";
                        echo '<form method="POST" action = "order_scripts/orders_back_add_create_cart.php">';
                        echo '<input name="sku" type="hidden" value='.$row["sku"].'>';
                        echo '<input name="for" type="hidden" value='.$_GET["for"].'>';
                        echo "<td class='text-center capitalize text-sm text-gray-500'><button type='submit' class='text-indigo-500 hover:text-indigo-700 transition-all duration-300'>Dodaj do koszyka</button></td>";
                        echo '</form>';
                    echo "</tr>";
                }
            } else {
                echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                    echo "<td class='py-3 text-gray-800 leading-4 text-sm'>Brak wyników. Dodaj nowy produkt.</td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                echo "</tr>";
            }
            echo '</table>';
        echo '</section>';
        echo '<section>';
                echo "<div class='flex flex-row gap-2'>";
                    echo "<a href='?page=produkty&action=add&type=cart&for=".$id."' class='w-full py-2 px-4 bg-green-500 hover:bg-green-600 hover:shadow-green-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Dodaj nowy produkt</a>";
                    echo '<form method="POST" action="order_scripts/orders_back_add_end.php">';
                    $sql3 = "SELECT products.id FROM carts left JOIN products on products.id = carts.product_id WHERE order_id = ".$id."";
                    $result3 = mysqli_query($conn, $sql3);
                    if(mysqli_num_rows($result3) > 0){
                        while($row = mysqli_fetch_assoc($result3)){
                            echo '<input type="hidden" name="product_quantity_input_'.$row["id"].'" class = "product_quantity_input" value=""/>';
                        }
                    }
                    echo '<input type="hidden" name="order_id" value="'.$_GET['for'].'"/>';
                    echo "<button type='submit' disabled class='w-full py-2 px-4 bg-indigo-500 hover:bg-indigo-600 hover:shadow-indigo-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300 submit_button'>Zatwierdź zamówienie</button>";
                    echo '</form>';
                    echo '<form method="POST" action="order_scripts/orders_back_delete_all.php">';
                        echo '<input type="hidden" name="order_id" value="'.$_GET['for'].'"/>';
                        $sql4 = "SELECT DISTINCT orders.invoice FROM carts left join orders on orders.id = carts.order_id  WHERE order_id = ".$id."";
                        $result4 = mysqli_query($conn, $sql4);
                        if(mysqli_num_rows($result4) > 0){
                            while($row = mysqli_fetch_assoc($result4)){
                                echo '<input type="hidden" name="invoice" value="'.$row['invoice'].'"/>';
                            }
                        }
                        echo "<button type='submit' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300''>Usuń zamówienie</button>";
                    echo '</form>';
                echo "</div>";
        echo '</section>';
        
    }
?>