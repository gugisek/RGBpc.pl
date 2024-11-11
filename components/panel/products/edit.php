<?php
$id = $_GET['id'];
include "../../../scripts/conn_db.php";
$sql = "SELECT products.id, products.name, products.sku, products.img, products.source, products.sell_price_brutto, product_categories.category, products.description, products.status_id, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.id LEFT JOIN product_doms on product_doms.product_id=products.id LEFT JOIN product_status on product_status.id=products.status_id where products.id=$id group by products.id;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
$row = mysqli_fetch_assoc($result)

?>
<form action="scripts/settings/products/categories/edit.php" method="POST" class="">
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="-mt-4 flex gap-4">
        <img src="img/products_images/<?=$row['img']?>" alt="product_image" class="size-80 rounded-2xl">
        <div class="flex flex-col justify-between">
            <div>
                <p class="text-sm text-gray-600 capitalize"><?=$row['category']?></p>
                <h1 class="text-lg font-[poppins] font-medium"><?=$row['name']?></h1>
            </div>
            <div>
                <span class="text-sm text-gray-600">Status:</span> <span><?=$row['status']?></span><br/>
                <span class="text-sm text-gray-600">Dostępne sztuki:</span> <span><?=$row['quantity']?></span><br/>
                <span class="text-sm text-gray-600">Cena netto sprzedaży: </span><span><?php echo $row['sell_price_brutto'] - ($row['sell_price_brutto'] * 0.23) ?></span><br/>
                <span class="text-sm text-gray-600">Cena brutto sprzedaży: </span><span><?=$row['sell_price_brutto']?></span>
            </div>
            <div class="flex items-center divide-x gap-2">
                <div class="flex gap-2 items-center hover:shadow-xl p-2 rounded-xl border border-black/10 hover:scale-105 active:scale-95 duration-150 cursor-pointer">
                    <img src="img/icons/alie.png" alt="" class="size-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>

                </div>
                <div class="flex gap-2 pl-2">
                    <div class="flex gap-2 items-center hover:shadow-xl p-2 rounded-xl border border-black/10 hover:scale-105 active:scale-95 duration-150 cursor-pointer">
                        <img src="img/icons/olx.png" alt="" class="size-8 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>

                    </div>
                    <div class="flex gap-2 items-center hover:shadow-xl p-2 rounded-xl border border-black/10 hover:scale-105 active:scale-95 duration-150 cursor-pointer">
                        <img src="img/icons/allegro_icon.png" alt="" class="size-8 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>

                    </div>
                    <div class="flex gap-2 items-center hover:shadow-xl p-2 rounded-xl border border-black/10 hover:scale-105 active:scale-95 duration-150 cursor-pointer">
                        <img src="img/icons/rgbpc.png" alt="" class="size-8 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="">
        <div class="border-y border-black/20 text-gray-700 font-[poppins] flex items-center justify-center text-xs my-4 py-2 divide-x divide-black/40">
            <a href="" class="px-2 hover:text-violet-600 duration-150">
                Stan magazynowy
            </a>
            <a href="" class="px-2 hover:text-violet-600 duration-150">
                Sprzeda
            </a>
            <a href="" class="px-2 hover:text-violet-600 duration-150">
                Opis
            </a>
            <a href="" class="px-2 hover:text-violet-600 duration-150">
                Specyfikacja
            </a>
            <a href="" class="px-2 hover:text-violet-600 duration-150">
                Warianty
            </a>
            <a href="" class="px-2 hover:text-violet-600 duration-150">
                Archiwum
            </a>
        </div>
        aktualny stan magazynowy, ostatnie sprzedae, pełny opis, warianty, archiwum 
        przy tworzeniu produktów nawet jak jest jeden wiarant zawsze tworzy się typ main i jeden wariant główny 
    </section>
    <div class="mt-6 sm:mt-6 mb-2 sm:flex sm:flex-row-reverse">
        <button type="button" onclick="openPopupUserRolesAdd()" class="text-xs px-4 font-semibold leading-6 text-violet-500 hover:text-violet-300 duration-150 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
            Edytuj dane
        </button>
    </div>
</form>

