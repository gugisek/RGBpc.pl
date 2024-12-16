<?php
$id = $_GET['id'];
include "../../../scripts/conn_db.php";
$sql = "SELECT products.id, products.name, products.sku, products.our_olx, products.our_allegro, products.img, products.type, products.source, products.sell_price_brutto, product_categories.category, products.category_id, products.description, products.status_id, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.category_id LEFT JOIN product_doms on product_doms.product_id=products.id LEFT JOIN product_status on product_status.id=products.status_id where products.id=$id group by products.id;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
$row = mysqli_fetch_assoc($result);

//stworzenie nowej zmiennej z nazwą produktu ale bez polskich znaków i spacje są zamieniane na myślniki
$name = $row['name'];
$name = str_replace(' ', '-', $name);
$name = str_replace('ą', 'a', $name);
$name = str_replace('ć', 'c', $name);
$name = str_replace('ę', 'e', $name);
$name = str_replace('ł', 'l', $name);
$name = str_replace('ń', 'n', $name);
$name = str_replace('ó', 'o', $name);
$name = str_replace('ś', 's', $name);
$name = str_replace('ż', 'z', $name);
$name = str_replace('ź', 'z', $name);
$name = strtolower($name);

?>
<div class="transition-all duration-150 font-[poppins]">
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="-mt-4 flex gap-4">
        <img src="img/products_images/<?=$row['img']?>" alt="product_image" class="size-80 rounded-2xl object-cover border border-black/20">
        <div class="flex flex-col gap-4 w-full">
            <div>
                <p class="text-sm text-gray-600"><?=$row['category']?></p>
                <h1 class="text-lg font-[poppins] font-medium leading-none"><?=$row['name']?></h1>
                
                <div class="mt-2">
                    <?=$row['description']?>
                </div>
            </div>
            <div>
                <span class="text-sm text-gray-600">SKU:</span> <span class="uppercase"><?=$row['sku']?></span><br/>
                <span class="text-sm text-gray-600">Status:</span> <span><?=$row['status']?></span><br/>
                <span class="text-sm text-gray-600">Dostępne sztuki:</span> <span><?=$row['quantity']?></span><br/>
                <span class="text-sm text-gray-600">Cena netto sprzedaży: </span><span><?php echo round($row['sell_price_brutto'] - ($row['sell_price_brutto'] * 0.23), 2) ?></span> PLN<br/>
                <span class="text-sm text-gray-600">Cena brutto sprzedaży: </span><span><?=$row['sell_price_brutto']?></span> PLN
            </div>
                <div class="flex items-center justify-center">
                    <select type="text" onchange="updateStatus(this.value, '<?=$id?>')" id="status_id" value="" name="status_id" placeholder="" class="minimal border border-black/10 w-full px-6 py-3 rounded-2xl focus:ring-0 focus:outline-1 focus:outline-violet-500 cursor-pointer active:scale-95 hover:shadow-xl duration-150 text-sm">
                    <?php
                        $sql = "SELECT * from product_status";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row2 = mysqli_fetch_assoc($result))
                            {
                                echo '<option ';
                                if ($row['status_id'] == $row2['id']) {
                                    echo 'selected ';
                                }
                                echo ' value="'.$row2['id'].'">'.$row2['status'].'</option>';
                            }
                        }
                        ?>
                    </select>
                    <div id="statusLoading" class='hidden fixed z-[30] bg-black/40 p-2 rounded-3xl scale-50 flex items-center justify-center'><div class='lds-dual-ring'></div></div>
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
            <a id="nav_button_details" onclick="openDetailTab('specs', 'category=<?=$row['category_id']?>')" class="specs px-2 hover:text-violet-600 duration-150 cursor-pointer">
                Specyfikacja
            </a>
            <?php
            if($row['type'] == "main_variants") {
                echo '
                <a id="nav_button_details" onclick="openDetailTab(`variants`)" class="variants px-2 hover:text-violet-600 duration-150 cursor-pointer">
                    Warianty
                </a>
                ';
            }
            ?>
            <a id="nav_button_details" onclick="openDetailTab('archive_prod')" class="archive_prod px-2 hover:text-violet-600 duration-150 cursor-pointer">
                Archiwum
            </a>
            <a id="nav_button_details" onclick="openDetailTab('bar_code', 'sku=<?=$row['sku']?>&category=<?=$row['category']?>')" class="bar_code px-2 hover:text-violet-600 duration-150 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />
                </svg>
            </a>
        </div>
        <div id="details_body">
        
            <table>
                <div class="grid grid-cols-4 text-sm shadow-xl text-gray-800 font-[poppins] rounded-2xl active:scale-95 duration-150">
                                <div class=" font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center">
                                    Numer seryjny
                                </div>
                                <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center">
                                    Data zakupu
                                </div>
                                <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                                    Cena zakupu brutto
                                </div>
                                <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 text-center">
                                    Źródło
                                </div>

                </div>
                
                <?php
                
                $sql = "select product_doms.id, product_doms.dom_code, product_doms.bought_price_brutto, product_doms.bought_date, product_doms.bought_source_id from product_doms where product_doms.product_id = $id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        
                        while ($row = $result->fetch_assoc()) {
                            $short_date = substr($row['bought_date'], 0, 10);
                            echo '
                            <div onclick="openPopupDoms('.$row['id'].')" class="grid grid-cols-4 text-sm text-gray-600 font-[poppins] rounded-2xl hover:bg-gray-200 cursor-pointer active:scale-95 duration-150">
                                <div class=" font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center gap-4">
                                    <span>'. $row['dom_code'] .'</span>
                                </div>
                                <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center uppercase">
                                    '. $short_date .'
                                </div>
                                <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                                    '. number_format(round($row['bought_price_brutto'],2),2,',','') .' PLN
                                </div>
                                <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 text-center">
                                    '. $row['bought_source_id'] .'
                                </div>

                            </div>
                            ';
                        }
                    }else{
                        echo '<span class="text-xs text-gray-600 text-center w-full flex items-center justify-center py-12">Brak w magazynie</span>';
                    }
                ?>
            </table>
        </div>
        
    </section>
    
    <div class="mt-6 sm:mt-6 mb-2 sm:flex justify-between flex-row-reverse">
        <div class="flex items-center divide-x gap-2 divide-gray-300">
                <a href="<?=$row['source']?>" target="_blank" class="flex gap-2 items-center hover:shadow-xl  rounded-xl border border-black/10 hover:scale-105 active:scale-95 duration-150 cursor-pointer">
                    <img src="img/icons/alie.png" alt="" class="size-8">
                </a>
                <div class="flex gap-2 pl-2">
                    <a target="_blank" href="<?=$row['our_olx']?>" class="flex gap-2 items-center hover:shadow-xl rounded-xl border border-black/10 hover:scale-105 active:scale-95 duration-150 cursor-pointer">
                        <img src="img/icons/olx.jpg" alt="" class="size-8 rounded-lg">
                    </a>
                    <a target="_blank" href="<?=$row['our_allegro']?>" class="flex gap-2 items-center hover:shadow-xl rounded-xl border border-black/10 hover:scale-105 active:scale-95 duration-150 cursor-pointer">
                        <img src="img/icons/allegro_icon.png" alt="" class="size-8 rounded-lg">
                    </a>
                    <a href="/sklep/p/view?p=<?=$row['sku']?>&n=<?=$name?>" target="_blank" class="flex gap-2 items-center hover:shadow-xl rounded-xl border border-black/10 hover:scale-105 active:scale-95 duration-150 cursor-pointer">
                        <img src="img/icons/rgbpc.png" alt="" class="size-8 rounded-lg">
                    </a>
                </div>
            </div>
        <button type="button" onclick="popupProductsOpenClose();openPanelSite('product_edit','id=<?=$id?>')" class="text-xs px-4 font-semibold leading-6 text-violet-500 hover:text-violet-300 duration-150 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
            Edytuj dane
        </button>
    </div>
</div>

<script>
    function openDetailTab(site, link) {
    var body = document.getElementById("details_body");
    //  body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
    const url = "components/panel/products/detail_tabs/" + site + ".php?id=" + <?=$id?> + "&" + link;
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
<script>
    function updateStatus(statusId, productId) {
        console.log(statusId, productId);
    // Dane do wysłania w żądaniu
    const postData = new FormData();
    postData.append('status_id', statusId);
    postData.append('product_id', productId);
    
        //ustawienie selecta na disabled oraz animacji ładowania kółka na nim na czas wysyłania żądania
        var select = document.getElementById("status_id");
        select.disabled = true;
        var loading = document.getElementById("statusLoading");
        loading.classList.remove("hidden");
    // Wysyłanie żądania POST do skryptu PHP
    fetch('scripts/products/update_status.php', {
        method: 'POST',
        body: postData,
    })
    .then(response => response.json()) // Oczekiwanie na odpowiedź JSON
    .then(data => {
        // Jeśli odpowiedź zawiera sukces lub błąd
        switch (data.status) {
            case 'success':
                showAlert('success', data.message); // Wyświetl sukces
                updateStatTable(statusId, productId);
                break;
            case 'error':
                showAlert('error', data.message); // Wyświetl błąd
                break;
            case 'warning':
                showAlert('warning', data.message); // Wyświetl ostrzeżenie
                break;
            default:
                showAlert('error', 'Nieznany status odpowiedzi');
        }
    })
    .catch(error => {
        // Wyświetlenie alertu błędu w przypadku problemów z żądaniem
        showAlert('error', 'Wystąpił problem połączenia z serwerem');
        console.error('Błąd:', error);
    });

    //odwołanie selecta z powrotem do stanu aktywnego
    select.disabled = false;
    loading.classList.add("hidden");
    

}
</script>
<script>
    function updateStatTable(statusId, productId) {
        var status = document.getElementById("status_"+productId);
        var statusHTML = "";
        if(statusId == 1){
            statusHTML = '<div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center text-green-500">Dostępne</div>';
        }else if(statusId == 3){
            statusHTML = '<div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center text-red-500">Niedostępne</div>';
        }else if(statusId == 4){
            statusHTML = '<div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center text-gray-500">Wycofane</div>';
        }else if(statusId == 5){
            statusHTML = '<div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center text-violet-500">Szkic</div>';
        }
        status.innerHTML = statusHTML;
    }
</script>
