<section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6">
    <h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Produkty</h1>
    <table class="w-full">
        <tr class="uppercase text-left text-xs text-gray-400 ">
            <th class="w-1/3">Nazwa</th>
            <th class="w-1/8 text-center">SKU</th>
            <th class="text-center py-3 w-1/8">Kategoria</th>
            <th class="w-1/8 text-center">Ilość</th>
            <th class="w-1/8 text-center">Zakup</th>
            <th class="w-1/8 text-center">Sprzedaż</th>
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
            $sql = "SELECT products.id, name, sku, product_categories.category, quantity, bought, sold, product_status.status FROM products left join product_categories on product_categories.id = products.category_id left join product_status on product_status.id = products.status_id where (name like '%$search%' and products.category_id like '%$category%' and status_id like '%$status%' and quantity ".$quantity.") or (sku like '%$search%' and products.category_id like '%$category%' and status_id like '%$status%' and quantity ".$quantity.") order by quantity desc;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                        echo "<td class='capitalize text-sm text-gray-500'><a class='transition-all duration-300 hover:text-indigo-500 hover:cursor-pointer' href='?page=produkty&action=edit&id=".$row['id']."#edit'>".$row['name']."</a></td>";
                        echo "<td class='text-center capitalize text-sm text-gray-500'>".$row['sku']."</td>";
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