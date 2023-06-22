<?php
if ($action == "edit") {
    $id = $_GET['id'];
    $sql = "SELECT products.id, products.name, products.sku, products.bought, products.sold, products.quantity, product_categories.category, product_status.status, products.description, products.img, products.source FROM products left join product_categories on product_categories.id = products.category_id left join product_status on product_status.id = products.status_id WHERE products.id = $id;";
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
        }
    }
}
?>
<section id='edit' class='w-full bg-white shadow-xl rounded-3xl py-6 px-6'>
    <h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Edytuj produkt</h1>
    
    <form action='product_scripts/products_back_edit.php' method='post' enctype='multipart/form-data' class='flex flex-col gap-4'>
        <div class="flex">
            <img class='object-none object-center bg-yellow-300 w-1/3 mx-2 rounded-xl' src='public/img/products_images/<?=$img?>' />
            <input type='hidden' name='id' value='<?=$id?>'>
            <div class='flex flex-col gap-2'>
                <label for='name' class='text-xs text-gray-500'>Nazwa</label>
                <input required type='text' name='name' id='name' value='<?=$name?>' class='w-full py-2 px-4 rounded-lg shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
            </div>
            <div class='flex flex-col gap-2'>
                <label for='sku' class='text-xs text-gray-500'>SKU</label>
                <input required readonly type='text' name='sku' id='sku' value='<?=$sku?>' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent uppercase'>
            </div>
        </div>
        
        <div class='flex flex-col gap-2'>
            <label for='bought' class='text-xs text-gray-500'>Cena zakupu</label>
            <input required type='text' name='bought' id='bought' value='<?=$bought?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='sold' class='text-xs text-gray-500'>Cena sprzedaży</label>
            <input required type='text' name='sold' id='sold' value='<?=$sold?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='quantity' class='text-xs text-gray-500'>Ilość</label>
            <input required type='number' min='0' step='1' value='<?=$quantity?>' name='quantity' id='quantity' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
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
        <div class='flex flex-col gap-2'>
            <label for='description' class='text-xs text-gray-500'>Opis</label>
            <input type='text' name='description' id='description' value='<?=$description?>' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='source' class='text-xs text-gray-500'>Źródło</label>
            <input required type='text' name='source' id='source' value='<?=$source?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='image' class='text-xs text-gray-500'>URL zdjęcia</label>
            <input readonly required type='text' name='image' id='image' value='<?=$img?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='upload' class='text-xs text-gray-500'>Zdjęcie</label>
            <input type='file' name='upload' id='upload' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-row gap-2'>
            <button type='submit' class='w-full py-2 px-4 bg-green-500 hover:bg-green-600 hover:shadow-green-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Zapisz</button>
            <a href='?page=produkty&action=' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>
        </div>
    </form>
</section>