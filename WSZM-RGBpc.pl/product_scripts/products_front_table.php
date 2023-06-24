<section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6">
    <h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Produkty</h1>
    <table class="w-full">
        <tr class="uppercase text-left text-xs text-gray-400 ">
            <th class="w-1/3" <?php if($action=='sorted_name') { echo 'onclick=window.location="?page=produkty&action=sorted_name_desc&search_status=1"'; echo ' style="cursor: n-resize;"'; echo '>Nazwa ⬇';} else if($action=='sorted_name_desc') { echo 'onclick=window.location="?page=produkty&action=sorted_name&search_status=1"'; echo ' style="cursor: s-resize;"'; echo '>Nazwa ⬆';} else { echo 'onclick=window.location="?page=produkty&action=sorted_name"'; echo ' style="cursor: s-resize;"'; echo '>Nazwa'; } ?></th>
            <th class="w-1/8 text-center" <?php if($action=='sorted_sku') { echo 'onclick=window.location="?page=produkty&action=sorted_sku_desc"'; echo ' style="cursor: n-resize;"'; echo '>SKU ⬇';} else if($action=='sorted_sku_desc') { echo 'onclick=window.location="?page=produkty&action=sorted_sku"'; echo ' style="cursor: s-resize;"'; echo '>SKU ⬆';} else { echo 'onclick=window.location="?page=produkty&action=sorted_sku"'; echo ' style="cursor: s-resize;"'; echo '>SKU';} ?></th>
            <th class="text-center py-3 w-1/8">Kategoria</th>
            <th class="w-1/8 text-center" <?php if($action=='sorted_quantity') { echo 'onclick=window.location="?page=produkty&action=sorted_quantity_desc"'; echo ' style="cursor: n-resize;"'; echo '>Ilość ⬇';} else if($action=='sorted_quantity_desc') { echo 'onclick=window.location="?page=produkty&action=sorted_quantity"'; echo ' style="cursor: s-resize;"'; echo '>Ilość ⬆';} else { echo 'onclick=window.location="?page=produkty&action=sorted_quantity_desc"'; echo ' style="cursor: n-resize;"'; echo '>Ilość';} ?></th>
            <th class="w-1/8 text-center" <?php if($action=='sorted_bought') { echo 'onclick=window.location="?page=produkty&action=sorted_bought_desc"'; echo ' style="cursor: n-resize;"'; echo '>Zakup ⬇';} else if($action=='sorted_bought_desc') { echo 'onclick=window.location="?page=produkty&action=sorted_bought"'; echo ' style="cursor: s-resize;"'; echo '>Zakup ⬆';} else { echo 'onclick=window.location="?page=produkty&action=sorted_bought"'; echo ' style="cursor: s-resize;"'; echo '>Zakup';} ?></th>
            <th class="w-1/8 text-center" <?php if($action=='sorted_sold') { echo 'onclick=window.location="?page=produkty&action=sorted_sold_desc"'; echo ' style="cursor: n-resize;"'; echo '>Sprzedaż ⬇';} else if($action=='sorted_sold_desc') { echo 'onclick=window.location="?page=produkty&action=sorted_sold"'; echo ' style="cursor: s-resize;"'; echo '>Sprzedaż ⬆';} else { echo 'onclick=window.location="?page=produkty&action=sorted_sold"'; echo ' style="cursor: s-resize;"'; echo '>Sprzedaż';} ?></th>
            <th class="w-1/8 text-center">Status</th>
            <th class="w-1/8"></th>
        </tr>
        <?php
            include 'scripts/conn_db.php';
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $category = $_POST['category'];
                $quantity = $_POST['quantity'];
                $status = $_POST['status'];
            }
            else {
                $search = "";
                $category = "";
                $quantity = "between 0 and 1000";
                $status = "";
            }
                if($action == 'sorted_name'){
                    $ordered = 'name';
                } else if($action == 'sorted_name_desc'){
                    $ordered = 'name desc';
                } else if($action == 'sorted_sku'){
                    $ordered = 'sku';
                } else if($action == 'sorted_sku_desc'){
                    $ordered = 'sku desc';
                } else if($action == 'sorted_quantity'){
                    $ordered = 'quantity';
                } else if($action == 'sorted_quantity_desc'){
                    $ordered = 'quantity desc';
                } else if($action == 'sorted_bought'){
                    $ordered = 'bought';
                } else if($action == 'sorted_bought_desc'){
                    $ordered = 'bought desc';
                } else if($action == 'sorted_sold'){
                    $ordered = 'sold';
                } else if($action == 'sorted_sold_desc'){
                    $ordered = 'sold desc';
                } else if($action == 'sorted_status'){
                    $ordered = 'status';
                } else{
                    $ordered = 'products.id desc';
                }
            $sql = "SELECT products.id, name, sku, product_categories.category, quantity, bought, sold, product_status.status, img FROM products left join product_categories on product_categories.id = products.category_id left join product_status on product_status.id = products.status_id where (name like '%$search%' and products.category_id like '%$category%' and status_id like '%$status%' and quantity ".$quantity.") or (sku like '%$search%' and products.category_id like '%$category%' and status_id like '%$status%' and quantity ".$quantity.") order by ".$ordered.";";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr class='border-t-[0.5px] border-b-[0.5px] hover:bg-gray-100 transition-all duration-300' style='cursor: pointer; cursor: hand;' onclick='window.location=`?page=produkty&action=edit&id=".$row['id']."#edit`;'>";
                        echo "<td class='py-5 capitalize text-sm text-gray-500 flex items-center'><img class='object-cover bg-yellow-300 w-10 h-10 mx-2 rounded-xl' src='public/img/products_images/".$row['img']."' />".$row['name']."</td>";
                        echo "<td class='text-center text-sm text-gray-500 uppercase'>".$row['sku']."</td>";
                        echo "<td class='py-5 text-center capitalize text-sm text-gray-500'>".$row['category']."</td>";
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
                        echo "<td class='py-5 text-center text-sm text-gray-500'>".$row['bought']."</td>";
                        echo "<td class='py-5 text-center text-sm text-gray-500'>".$row['sold']."</td>";
                        echo "<td class='py-5 text-center capitalize text-sm";
                            if ($row['status']=="dostępne") {
                                echo " text-green-500";
                            }
                            else if ($row['status']=="niedostępne") {
                                echo " text-gray-500";
                            }
                            else if ($row['status']=="brak") {
                                echo " text-red-500";
                            }
                            else if ($row['status']=="wycofane") {
                                echo " text-stone-800";
                            }
                        echo "'>";
                            echo $row['status'];
                        echo "</td>";
                        echo "<td class='text-center text-sm'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                    echo "<td class='py-3 text-gray-800 leading-4 text-sm'>Brak wyników</td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center text-sm text-gray-500'></td>";
                    echo "<td class='text-center text-sm text-gray-500'></td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center text-sm'></td>";
                echo "</tr>";
            }
        ?>
    </table>
</section>