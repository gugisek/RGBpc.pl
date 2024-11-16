<?php
$id = $_GET['id'];
include "../../../scripts/conn_db.php";
$sql = "SELECT products.id, products.name, products.sku, products.img, products.source, products.sell_price_brutto, product_categories.category, products.description, products.status_id, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.category_id LEFT JOIN product_doms on product_doms.product_id=products.id LEFT JOIN product_status on product_status.id=products.status_id where products.id=$id group by products.id;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
$row = mysqli_fetch_assoc($result)

?>
<form action="scripts/settings/products/categories/edit.php" method="POST" class="transition-all duration-150">
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="-mt-4 flex gap-4">
        <img src="img/products_images/<?=$row['img']?>" alt="product_image" class="size-80 rounded-2xl object-cover">
        <div class="flex flex-col justify-between">
            <div>
                <p class="text-sm text-gray-600"><?=$row['category']?></p>
                <h1 class="text-lg font-[poppins] font-medium"><?=$row['name']?></h1>
            </div>
            <div>
                <span class="text-sm text-gray-600">SKU:</span> <span class="uppercase"><?=$row['sku']?></span><br/>
                <span class="text-sm text-gray-600">Status:</span> <span><?=$row['status']?></span><br/>
                <span class="text-sm text-gray-600">Dostępne sztuki:</span> <span><?=$row['quantity']?></span><br/>
                <span class="text-sm text-gray-600">Cena netto sprzedaży: </span><span><?php echo round($row['sell_price_brutto'] - ($row['sell_price_brutto'] * 0.23), 2) ?></span> PLN<br/>
                <span class="text-sm text-gray-600">Cena brutto sprzedaży: </span><span><?=$row['sell_price_brutto']?></span> PLN
            </div>
            <div class="flex items-center divide-x gap-2">
                <a href="esz" target="_blank" class="flex gap-2 items-center hover:shadow-xl p-2 rounded-xl border border-black/10 hover:scale-105 active:scale-95 duration-150 cursor-pointer">
                    <img src="img/icons/alie.png" alt="" class="size-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>

                </a>
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
            <a id="nav_button_details" onclick="openDetailTab('stan_magazynowy')" class="stan_magazynowy text-violet-600 px-2 hover:text-violet-600 duration-150 cursor-pointer">
                Stan magazynowy
            </a>
            <a id="nav_button_details" onclick="openDetailTab('sell')" class="sell px-2 hover:text-violet-600 duration-150 cursor-pointer">
                Sprzedaż
            </a>
            <a id="nav_button_details" onclick="openDetailTab('opis')" class="opis px-2 hover:text-violet-600 duration-150 cursor-pointer">
                Opis
            </a>
            <a id="nav_button_details" onclick="openDetailTab('specs')" class="specs px-2 hover:text-violet-600 duration-150 cursor-pointer">
                Specyfikacja
            </a>
            <a id="nav_button_details" onclick="openDetailTab('variants')" class="variants px-2 hover:text-violet-600 duration-150 cursor-pointer">
                Warianty
            </a>
            <a id="nav_button_details" onclick="openDetailTab('archive')" class="archive px-2 hover:text-violet-600 duration-150 cursor-pointer">
                Archiwum
            </a>
        </div>
        <div id="details_body">
            <?php include 'detail_tabs/stan_magazynowy.php'; ?>
        </div> 
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

<script>
    function openDetailTab(site) {
    var body = document.getElementById("details_body");
    //  body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
    const url = "components/panel/products/detail_tabs/" + site + ".php";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const parsedDocument = parser.parseFromString(data, "text/html");
            body.innerHTML = parsedDocument.body.innerHTML;
            executeScripts(parsedDocument);
        });
    var removeButtons = document.querySelectorAll("#nav_button_details");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].classList.remove("text-violet-600");
    }
    var activeButtons = document.querySelectorAll("." + site);
    for(var i = 0; i < activeButtons.length; i++) {  
      activeButtons[i].classList.add("text-violet-600");
    }
}

function executeScripts(parsedDocument) {
    // Przechodź przez znalezione skrypty i wykonuj je
    const scripts = parsedDocument.querySelectorAll("script");
    scripts.forEach(script => {
        const scriptElement = document.createElement("script");
        scriptElement.textContent = script.textContent;
        document.body.appendChild(scriptElement);
    });
}
</script>

