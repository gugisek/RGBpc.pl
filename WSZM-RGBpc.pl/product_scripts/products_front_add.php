<?php
if ($action == "add") {
    echo "<section id='edit' class='w-full bg-white shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Dodaj produkt</h1>";
        echo "<form action='product_scripts/products_back_add.php' method='post' enctype='multipart/form-data' class='flex flex-col gap-4'>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='name' class='text-xs text-gray-500'>Nazwa</label>";
                echo "<input required type='text' name='name' id='name' class='w-full py-2 px-4 rounded-lg shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            $sql = "SELECT right(sku,4)+1 FROM products ORDER by right(sku,4)+1 DESC limit 1;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $pn = mysqli_fetch_assoc($result);
            }
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='sku' class='text-xs text-gray-500'>SKU</label>";
                echo "<input required readonly type='text' name='sku' id='sku' value='pn-".$pn['right(sku,4)+1']."' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent uppercase'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='bought' class='text-xs text-gray-500'>Cena zakupu</label>";
                echo "<input required type='text' name='bought' id='bought' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='sold' class='text-xs text-gray-500'>Cena sprzedaży</label>";
                echo "<input required type='text' name='sold' id='sold' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='quantity' class='text-xs text-gray-500'>Ilość</label>";
                echo "<input required type='number' min='0' step='1' value='1' name='quantity' id='quantity' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='category' class='text-xs text-gray-500'>Kategoria</label>";
                echo "<select name='category' id='category' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 outline-none transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                        $sql2 = "SELECT * FROM `product_categories`;";
                        $result2 = mysqli_query($conn, $sql2);
                        if(mysqli_num_rows($result2) > 0)
                            {
                                while($row2 = mysqli_fetch_assoc($result2))
                                {
                                    echo "<option class='capitalize' value='".$row2['id']."'>".$row2['category']."</option>";
                                }
                            }
                echo "</select>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='status' class='text-xs text-gray-500'>Status</label>";
                echo "<select name='status' id='status' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all outline-none duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                        $sql3 = "SELECT * FROM `product_status`;";
                        $result3 = mysqli_query($conn, $sql3);
                        if(mysqli_num_rows($result3) > 0)
                        {
                            while($row3 = mysqli_fetch_assoc($result3))
                            {
                                echo "<option class='capitalize' value='".$row3['id']."'>".$row3['status']."</option>";
                            }
                        }
                echo "</select>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='description' class='text-xs text-gray-500'>Opis</label>";
                echo "<input type='text' name='description' id='description' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='source' class='text-xs text-gray-500'>Źródło</label>";
                echo "<input required type='text' name='source' id='source' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";            
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='our_olx' class='text-xs text-gray-500'>OLX</label>";
                echo "<input type='text' name='our_olx' id='our_olx' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='our_allegro' class='text-xs text-gray-500'>Allegro</label>";
                echo "<input type='text' name='our_allegro' id='our_allegro' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='image' class='text-xs text-gray-500'>URL zdjęcia</label>";
                echo "<input readonly required type='text' name='image' id='image' value='Uzupełniany automatycznie' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-400 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='upload' class='text-xs text-gray-500'>Zdjęcie</label>";
                echo "<input type='file' name='upload' id='upload' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-row gap-2'>";
                echo "<button type='submit' class='w-full py-2 px-4 bg-indigo-500 hover:bg-indigo-600 hover:shadow-indigo-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Dodaj</button>";
                echo "<a href='?page=produkty&action=' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>";
            echo "</div>";
        echo "</form>";
    echo "</section>";
}
?>