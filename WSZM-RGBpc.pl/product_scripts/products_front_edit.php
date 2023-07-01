<?php
if ($action == "edit") {
    $id = $_GET['id'];
    $sql = "SELECT products.id, products.name, products.sku, products.bought, products.sold, products.quantity, product_categories.category, product_status.status, products.description, products.img, products.source, products.our_olx, products.our_allegro FROM products left join product_categories on product_categories.id = products.category_id left join product_status on product_status.id = products.status_id WHERE products.id = $id;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
        $name = $row['name'];
        $sku = $row['sku'];
        $bought = $row['bought'];
        $sold = $row['sold'];
        $quantity = $row['quantity'];
        $category = $row['category'];
        $status = $row['status'];
        $description = $row['description'];
        $img = $row['img'];
        $source = $row['source'];
        $our_olx = $row['our_olx'];
        $our_allegro = $row['our_allegro'];
        }
    }
}
?>
<section id='edit' class='w-full bg-white shadow-xl rounded-3xl py-6 px-6'>
    <h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Edytuj produkt</h1>
    
    <form action='product_scripts/products_back_edit.php' method='post' enctype='multipart/form-data' class='flex flex-col gap-4'>
        <div class="flex gap-4 md:flex-row flex-col">
            <div class='flex flex-col md:w-1/2 gap-2'>
                <label for='upload' class='text-xs text-gray-500'>Zdjęcie</label>
                <input readonly required type='hidden' name='image' id='image' value='<?=$img?>'>
                <input type='file' name='upload' id='upload' style="text-shadow: 0px 0px 4px #000;" class='hover:shadow-2xl text-white bg-[url("public/img/products_images/<?=$img?>")] bg-contain bg-no-repeat bg-center hover:cursor-pointer w-full h-full min-h-[300px] py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
            </div>
            <!-- vertical line -->
            <div class="w-px mx-1 bg-gray-200 hidden md:block"></div>
            <input type='hidden' name='id' value='<?=$id?>'>
            <div class="flex flex-col w-full gap-3">
                <div class="flex md:flex-row flex-col w-full gap-4">
                    <div class='flex flex-col gap-2 md:w-1/2'>
                        <label for='name' class='text-xs text-gray-500'>Nazwa</label>
                        <input required type='text' name='name' id='name' value='<?=$name?>' class='w-full py-2 px-4 rounded-lg shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                    </div>
                    <div class="flex gap-2 md:w-1/2 md:flex-row flex-col">
                        <div class='flex flex-col gap-2 md:w-1/2'>
                            <label for='bought' class='text-xs text-gray-500'>Cena zakupu</label>
                            <input required type='text' name='bought' id='bought' value='<?=$bought?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                        </div>
                        <div class='flex flex-col gap-2 md:w-1/2'>
                            <label for='sold' class='text-xs text-gray-500'>Cena sprzedaży</label>
                            <input required type='text' name='sold' id='sold' value='<?=$sold?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                        </div>
                    </div>
                </div>
                <div class="flex w-full md:flex-row flex-col gap-4">
                    <div class='flex flex-col gap-2 md:w-1/2'>
                        <label for='sku' class='text-xs text-gray-500'>SKU</label>
                        <input required readonly type='text' name='sku' id='sku' value='<?=$sku?>' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent uppercase'>
                    </div>
                    <div class="flex md:flex-row flex-col gap-2 md:w-1/2">
                        <div class='flex flex-col gap-2 md:w-1/2'>
                            <label for='quantity' class='text-xs text-gray-500'>Ilość</label>
                            <input required type='number' min='0' step='1' value='<?=$quantity?>' name='quantity' id='quantity' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                        </div>
                        <div class='flex flex-col gap-2 md:w-1/2'>
                            <label for='status' class='text-xs text-gray-500'>Status</label>
                            <select name='status' id='status' value='<?=$status?>' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all outline-none duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                            <?php                    
                                $sql3 = "SELECT * FROM `product_status`;";
                                $result3 = mysqli_query($conn, $sql3);
                                if(mysqli_num_rows($result3) > 0)
                                {
                                    while($row3 = mysqli_fetch_assoc($result3))
                                    {
                                        echo "<option class='capitalize' value='".$row3['id']."'";
                                        if ($row3['status']==$status) {
                                            echo " selected";
                                        }
                                        echo ">".$row3['status']."</option>";
                                    }
                                }
                                ?>
                                </select>
                        </div>
                    </div>
                    
                </div>
                <div class='flex flex-col gap-2'>
                        <label for='category' class='text-xs text-gray-500'>Kategoria</label>
                        <select name='category' id='category' value='<?=$category?>' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 outline-none transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                        <?php                
                            $sql2 = "SELECT * FROM `product_categories`;";
                            $result2 = mysqli_query($conn, $sql2);
                            if(mysqli_num_rows($result2) > 0)
                            {
                                while($row2 = mysqli_fetch_assoc($result2))
                                {
                                echo "<option class='capitalize' value='".$row2['id']."'";
                                if ($row2['category']==$category) {
                                    echo " selected";
                                }
                                echo ">".$row2['category']."</option>";
                                }
                            }
                        ?>
                        </select>
                </div>
                <div class='flex flex-col gap-2'>
                    <label for='description' class='text-xs text-gray-500'>Opis</label>
                    <input type='text' name='description' id='description' value='<?=$description?>' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                </div>
                <div class='flex flex-row gap-2'>
                    <div>
                        <label for='source' class='text-xs text-gray-500'>Źródło</label>
                        <div class="flex items-center justify-center gap-2">
                            <input required type='text' name='source' id='source' value='<?=$source?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                            <a href="<?=$source?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div>
                        <label for='our_olx' class='text-xs text-gray-500'>OLX</label>
                        <div class="flex items-center justify-center gap-2">
                            <input type='text' name='our_olx' id='our_olx' value='<?=$our_olx?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                            <a href="<?=$our_olx?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div>
                        <label for='our_allegro' class='text-xs text-gray-500'>Allegro</label>
                        <div class="flex items-center justify-center gap-2">
                            <input type='text' name='our_allegro' id='our_allegro' value='<?=$our_allegro?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                            <a href="<?=$our_allegro?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='flex md:flex-row flex-col gap-2'>
            <a href='product_scripts/products_print.php?sku=<?=$sku?>&category=<?=$category?>&page=produkty&action=<?=$action?>&id=<?=$id?>' class='w-full py-2 px-4 bg-indigo-500 text-center hover:bg-indigo-600 hover:shadow-indigo-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Drukuj</a>
            <button type='submit' class='w-full py-2 px-4 bg-green-500 hover:bg-green-600 hover:shadow-green-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Zapisz</button>
            <a href='?page=produkty&action=' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>
        </div>
        <div id="#arch" class="w-full flex justify-between items-center">
            <h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Historia produktu</h1>
            <?php include 'product_scripts/products_edit_nav_page.php'; ?>
        </div>
        <table class="w-full">
            <tr class="uppercase text-left text-xs text-gray-400 ">
                <th class="px-3 text-center md:w-auto md:table-cell hidden">ID</th>
                <th class="w-1/6">Użytkownik</th>
                <th class="text-center py-3 w-1/6">Data</th>
                <th class="w-[54%] md:table-cell hidden">Opis</th>
                <th class="w-[9%] text-center">Typ rekordu</th>
            </tr>
            <?php
                include 'scripts/conn_db.php';
                if (isset($_POST['search'])) {
                    $search = $_POST['search'];
                    $role = $_POST['role'];
                    $status = $_POST['status'];
                }
                else {
                    $search = "";
                    $role = "";
                    $status = "";
                }
                $sql = "SELECT logs.id, users.name, users.sur_name, logs.when, log_types.type,logs.description FROM `logs` join users on users.id=logs.user_id join log_types on log_types.id=logs.type where object_id='$id' and object_type='products' order by id desc limit 10 offset ".($page_id - 1) * 10;
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {

                        echo "<tr class='hover:bg-gray-100 transition-all duration-300 border-t-[0.5px] border-b-[0.5px]' style='cursor: pointer; cursor: hand;' onclick='window.location=`?page=archiwum&action=details&page_id=".$page_id."&id=".$row['id']."&return=produkty`;'>";
                            echo "<td class='py-3 text-gray-600 text-center text-sm md:table-cell hidden'>".$row['id']."</td>";
                            echo "<td class='py-3 text-gray-600 text-sm'>".$row['name']." ".$row['sur_name']."</td>";
                            echo "<td class='text-center capitalize text-sm text-gray-500'>".$row['when']."</td>";
                            $description = $row['description'];
                            if (strlen($description) > 100) {
                                $description = substr($description, 0, 100)."...";
                            }
                            echo "<td class='text-sm md:table-cell hidden text-gray-600'>".$description."</td>";
                            echo "<td class='text-center text-sm text-gray-500 capitalize ";
                            if ($row['type'] == "create") {
                                echo " text-green-500";
                            }
                            else if ($row['type'] == "modify") {
                                echo " text-blue-500";
                            }
                            else if ($row['type'] == "delete") {
                                echo " text-red-500";
                            }
                            echo "'>".$row['type']."</td>";
                        echo "</tr>";
                        ;
                    }
                } else {
                    echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                        echo "<td class='py-3 text-gray-800 leading-4 text-sm'>Brak wyników</td>";
                        echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                        echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                        echo "<td class='text-center text-sm text-gray-500'></td>";
                        echo "<td class='text-center text-sm'></td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <div class="w-full flex items-center justify-between mt-2 mb-[-16px]">
            <div class="w-1/3"></div>
            <?php include 'product_scripts/products_edit_nav_page.php'; ?>
            <span class="text-right w-1/3 text-sm text-gray-400">Strona <?=$page_id?> z <?=$total_pages?></span>
        </div>
    </form>
</section>