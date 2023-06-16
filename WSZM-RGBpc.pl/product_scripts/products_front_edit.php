<?php
if ($action == "edit") {
    $id = $_GET['id'];
    $sql = "SELECT products.id, products.name, products.sku, products.bought, products.sold, products.quantity, product_categories.category, product_status.status, products.description, products.img, products.source FROM products left join product_categories on product_categories.id = products.category_id left join product_status on product_status.id = products.status_id WHERE products.id = $id;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
        echo "<section id='edit' class='w-full bg-white shadow-xl rounded-3xl py-6 px-6'>";
            echo "<h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Edytuj produkt</h1>";
            echo "<form action='product_scripts/products_back_edit.php' method='post' class='flex flex-col gap-4'>";
                echo "<input type='hidden' name='id' value='".$row['id']."'>";
                echo "<div class='flex flex-col gap-2'>";
                    echo "<label for='name' class='text-xs text-gray-500'>Nazwa</label>";
                    echo "<input required type='text' name='name' id='name' value='".$row['name']."' class='w-full py-2 px-4 rounded-lg shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                echo "</div>";
                echo "<div class='flex flex-col gap-2'>";
                    echo "<label for='sku' class='text-xs text-gray-500'>SKU</label>";
                    echo "<input required readonly type='text' name='sku' id='sku' value='".$row['sku']."' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                echo "</div>";
                echo "<div class='flex flex-col gap-2'>";
                    echo "<label for='bought' class='text-xs text-gray-500'>Cena zakupu</label>";
                    echo "<input required type='text' name='bought' id='bought' value='".$row['bought']."' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                echo "</div>";
                echo "<div class='flex flex-col gap-2'>";
                    echo "<label for='sold' class='text-xs text-gray-500'>Cena sprzedaży</label>";
                    echo "<input required type='text' name='sold' id='sold' value='".$row['sold']."' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                echo "</div>";
                echo "<div class='flex flex-col gap-2'>";
                    echo "<label for='quantity' class='text-xs text-gray-500'>Ilość</label>";
                    echo "<input required type='number' min='0' step='1' value='".$row['quantity']."' name='quantity' id='quantity' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                echo "</div>";
                echo "<div class='flex flex-col gap-2'>";
                    echo "<label for='category' class='text-xs text-gray-500'>Kategoria</label>";
                    echo "<select name='category' id='category' value='".$row['category']."' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 outline-none transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                            $sql2 = "SELECT * FROM `product_categories`;";
                            $result2 = mysqli_query($conn, $sql2);
                            if(mysqli_num_rows($result2) > 0)
                                {
                                    while($row2 = mysqli_fetch_assoc($result2))
                                    {
                                        echo "<option class='capitalize' value='".$row2['id']."'";
                                        if ($row2['category']==$row['category']) {
                                            echo " selected";
                                        }
                                        echo ">".$row2['category']."</option>";
                                    }
                                }
                    echo "</select>";
                echo "</div>";
                echo "<div class='flex flex-col gap-2'>";
                    echo "<label for='status' class='text-xs text-gray-500'>Status</label>";
                    echo "<select name='status' id='status' value='".$row['status']."' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all outline-none duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                            $sql3 = "SELECT * FROM `product_status`;";
                            $result3 = mysqli_query($conn, $sql3);
                            if(mysqli_num_rows($result3) > 0)
                            {
                                while($row3 = mysqli_fetch_assoc($result3))
                                {
                                    echo "<option class='capitalize' value='".$row3['id']."'";
                                        if ($row3['status']==$row['status']) {
                                            echo " selected";
                                        }
                                        echo ">".$row3['status']."</option>";
                                }
                            }
                    echo "</select>";
                echo "</div>";
                echo "<div class='flex flex-col gap-2'>";
                    echo "<label for='description' class='text-xs text-gray-500'>Opis</label>";
                    echo "<input type='text' name='description' id='description' value='".$row['description']."' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                echo "</div>";
                echo "<div class='flex flex-col gap-2'>";
                    echo "<label for='image' class='text-xs text-gray-500'>URL zdjęcia</label>";
                    echo "<input readonly required type='text' name='image' id='image' value='".$row['img']."' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                    echo "</div>";
                echo "<div class='flex flex-col gap-2'>";
                    echo "<label for='source' class='text-xs text-gray-500'>Źródło</label>";
                    echo "<input required type='text' name='source' id='source' value='".$row['source']."' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                echo "</div>";
                echo "<div class='flex flex-row gap-2'>";
                    echo "<button type='submit' class='w-full py-2 px-4 bg-green-500 hover:bg-green-600 hover:shadow-green-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Zapisz</button>";
                    echo "<a href='?page=produkty&action=' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>";
                echo "</div>";
            echo "</form>";
        echo "</section>";
        }
    }
}elseif($action=='edited') {
    echo "<section id='added' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>Pomyślnie edytowano produkt.</h1>";
        echo '<a href="?page=produkty&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
}elseif($action=='edit_empty') {
    echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>W wyniku modyfikacji pewne pola zostały puste. Nie dokonano zmian.</h1>";
        echo '<a href="?page=produkty&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
}elseif($action=='error') {
    echo "<section id='edited' class='flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6'>";
    echo "<h1>Błąd bazy danych. Spróbuj ponownie lub skontaktuj się z administratorem.</h1>";
    echo '<a href="?page=produkty&action=" class="hover:rotate-90 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
         </svg></a>';
    echo "</section>";
}
?>