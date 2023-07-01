<?php
if ($action == "add_in") {
    echo "<section id='add_in' class='w-full bg-white shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Dodaj zamówienie przychodzące</h1>";
        echo "<form action='order_scripts/orders_back_add.php' method='post' enctype='multipart/form-data' class='flex flex-col gap-4'>";
            $sql = "SELECT right(order_number,4)+1 FROM orders ORDER by right(order_number,4)+1 DESC limit 1;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $on = mysqli_fetch_assoc($result);
            }
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='order_number' class='text-xs text-gray-500'>Numer zamówienia</label>";
                echo "<input required readonly type='text' name='order_number' id='order_number' value='on-".$on['right(order_number,4)+1']."' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent uppercase'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='seller' class='text-xs text-gray-500'>Sprzedawca</label>";
                echo "<input required type='text' name='seller' id='seller' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='client' class='text-xs text-gray-500'>Kupujący</label>";
                echo "<input required readonly type='text' name='client' id='client' value='RGBPC.PL' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent uppercase'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='contact_line_1' class='text-xs text-gray-500'>Dane kontaktowe pierwsza linijka</label>";
                echo "<input required type='text' placeholder='Kraj / jednostka administracyjna' name='contact_line_1' id='contact_line_1' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='contact_line_2' class='text-xs text-gray-500'>Dane kontaktowe druga linijka</label>";
                echo "<input required type='text' name='contact_line_2' placeholder='Ulica / adres / kod pocztowy / miejscowość' id='contact_line_2' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='date' class='text-xs text-gray-500'>Data i godzina</label>";
                echo "<input required readonly type='text' name='date' id='date' value='".date("Y-m-d H:i:s")."'class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='value' class='text-xs text-gray-500'>Wartość</label>";
                echo "<input required type='text' name='value' id='value' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent uppercase'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='platform' class='text-xs text-gray-500'>Platforma</label>";
                echo "<select name='platform' id='platform' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 outline-none transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                        $sql2 = "SELECT * FROM `order_platforms`;";
                        $result2 = mysqli_query($conn, $sql2);
                        if(mysqli_num_rows($result2) > 0)
                            {
                                while($row2 = mysqli_fetch_assoc($result2))
                                {
                                    echo "<option class='capitalize' value='".$row2['id']."'>".$row2['platform']."</option>";
                                }
                            }
                echo "</select>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='status' class='text-xs text-gray-500'>Status</label>";
                echo "<select name='status' id='status' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all outline-none duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                        $sql3 = "SELECT * FROM `order_status` where id = 1;";
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
                echo "<label for='invoice' class='text-xs text-gray-500'>URL faktury</label>";
                echo "<input readonly type='text' name='invoice' id='invoice' value='Uzupełniany automatycznie' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-400 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='upload' class='text-xs text-gray-500'>Faktura</label>";
                echo "<input type='file' name='upload' id='upload' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-row gap-2'>";
                echo "<button type='submit' class='w-full py-2 px-4 bg-indigo-500 hover:bg-indigo-600 hover:shadow-indigo-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Dodaj</button>";
                echo "<a href='?page=zamówienia&action=' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>";
            echo "</div>";
        echo "</form>";
    echo "</section>";
}
if($action=='create_cart'){
    print_r($action);
    include '../product_scripts/products_front_table.php';
}
?>