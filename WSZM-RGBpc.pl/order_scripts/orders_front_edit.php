<?php
    if(isset($_GET['error'])){
        $error = $_GET['error'];
        if(isset($_GET['id'])){
            $order_id = $_GET['id'];
        } else{
            $order_id = '';
        }
    } else{
        $error = '';
    }
    if ($action == "edit") {
    $id = $_GET['id'];
    $sql = "SELECT orders.order_number, orders.seller, orders.client, orders.contact_line_1, orders.contact_line_2, orders.date, orders.value, order_status.status, order_platforms.platform, orders.description, orders.invoice FROM orders left join order_status on order_status.id = orders.status_id left join order_platforms on order_platforms.id = orders.platform_id WHERE orders.id = $id;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
        $order_number = $row['order_number'];
        $seller = $row['seller'];
        $client = $row['client'];
        $contact_line_1 = $row['contact_line_1'];
        $contact_line_2 = $row['contact_line_2'];
        $date = $row['date'];
        $value = $row['value'];
        $order_status = $row['status'];
        $order_platform = $row['platform'];
        $description = $row['description'];
        $invoice = $row['invoice'];
        }
    }
}
if($error == 'cart_edited'){
    echo "<section id='edited' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>Pomyślnie edytwano koszyk.</h1>";
        echo '<a href="?page=zamówienia&action=edit&id='.$order_id.'#edit" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
}else if($error == 'error'){
    echo "<section id='edited' class='flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>Błąd edycji koszyka. Spróbuj ponownie.</h1>";
        echo '<a href="?page=zamówienia&action=edit&id="'.$order_id.'#edit" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
}elseif($error == 'product_deleted'){
    echo "<section id='deleted' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>Pomyślnie usunięto produkt z koszyka.</h1>";
        echo '<a href="?page=zamówienia&action=create_cart&for='.$order_id.'" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
}elseif($error == 'del_wrong'){
    echo "<section id='deleted' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>Taki produkt nie znajduje się w koszyku.</h1>";
        echo '<a href="?page=zamówienia&action=create_cart&for='.$order_id.'" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
} elseif($error == 'product_added'){
    echo "<section id='added' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>Pomyślnie dodano nowy produkt do koszyka.</h1>";
        echo '<a href="?page=zamówienia&action=create_cart&for='.$order_id.'" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
}
?>
<section id='edit' class='w-full bg-white shadow-xl rounded-3xl py-6 px-6'>
    <h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Edytuj zamówienie</h1>
    
    <form action='order_scripts/orders_back_edit.php' method='post' enctype='multipart/form-data' class='flex flex-col gap-4'>
        <div class="flex">
            <input type='hidden' name='id' value='<?=$id?>'>
            <div class='flex flex-col gap-2'>
                <label for='order_number' class='text-xs text-gray-500'>Numer zamówienia</label>
                <input readonly type='text' name='order_number' id='order_number' value='<?=$order_number?>' class='w-full py-2 px-4 rounded-lg shadow-sm uppercase focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
            </div>
            <div class='flex flex-col gap-2'>
                <label for='seller' class='text-xs text-gray-500'>Sprzedawca</label>
                <input required type='text' name='seller' id='seller' value='<?=$seller?>' class='w-full py-2 px-4 rounded-lg shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
            </div>
            <div class='flex flex-col gap-2'>
                <label for='client' class='text-xs text-gray-500'>Kupujący</label>
                <input required type='text' name='client' id='client' value='<?=$client?>' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent uppercase'>
            </div>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='contact_line_1' class='text-xs text-gray-500'>Dane kontaktowe pierwsza linijka</label>
            <input required type='text' name='contact_line_1' id='contact_line_1' value='<?=$contact_line_1?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='contact_line_2' class='text-xs text-gray-500'>Dane kontaktowe druga linijka</label>
            <input required type='text' name='contact_line_2' id='contact_line_2' value='<?=$contact_line_2?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='date' class='text-xs text-gray-500'>Data</label>
            <input readonly type='text' value='<?=$date?>' name='date' id='date' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='value' class='text-xs text-gray-500'>Wartość</label>
            <input required type='text' value='<?=$value?>' name='value' id='value' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='order_status' class='text-xs text-gray-500'>Status zamówienia</label>
            <select name='order_status' id='order_status' value='<?=$order_status?>' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 outline-none transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
            <?php                
                $sql2 = "SELECT * FROM `order_status`;";
                $result2 = mysqli_query($conn, $sql2);
                if(mysqli_num_rows($result2) > 0)
                {
                    while($row2 = mysqli_fetch_assoc($result2))
                    {
                    echo "<option class='capitalize' value='".$row2['id']."'";
                    if ($row2['status']==$order_status) {
                        echo " selected";
                    }
                    echo ">".$row2['status']."</option>";
                    }
                }
            ?>
            </select>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='order_platform' class='text-xs text-gray-500'>Platforma</label>
            <select name='order_platform' id='order_platform' value='<?=$order_platform?>' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 outline-none transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
            <?php                
                $sql3 = "SELECT * FROM `order_platforms`;";
                $result3 = mysqli_query($conn, $sql3);
                if(mysqli_num_rows($result3) > 0)
                {
                    while($row3 = mysqli_fetch_assoc($result3))
                    {
                    echo "<option class='capitalize' value='".$row3['id']."'";
                    if ($row3['platform']==$order_platform) {
                        echo " selected";
                    }
                    echo ">".$row3['platform']."</option>";
                    }
                }
            ?>
            </select>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='description' class='text-xs text-gray-500'>Opis</label>
            <input type='text' name='description' id='description' value='<?=$description?>' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div><div class='flex flex-col gap-2'>
            <label for='invoice' class='text-xs text-gray-500'>URL faktury</label>
            <input readonly required type='text' name='invoice' id='invoice' value='<?=$invoice?>' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='upload' class='text-xs text-gray-500'>Faktura</label>
            <input type='file' name='upload' id='upload' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-row gap-2'>
            <button type='submit' class='w-full py-2 px-4 bg-green-500 hover:bg-green-600 hover:shadow-green-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Zapisz</button>
            <a href='?page=zamówienia&action=create_cart&for=<?php echo $id; ?>&edit=edit' class='w-full py-2 px-4 bg-indigo-500 text-center hover:bg-indigo-600 hover:shadow-infigo-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Edytuj koszyk</a>
            <?php
            if (isset($_GET['return']))
            {
                $return = $_GET['return'];
            } else{
                $return = '';
            }
            ?>
            <a href='?page=<?php if ($return!=''){echo $return;}else{echo 'zamówienia';}?>&action=' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>
        </div>
    </form>
</section>