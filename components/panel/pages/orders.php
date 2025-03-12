<section data-aos="fade-up" data-aos-delay="100">
    <div class="flex items-center justify-between">
        <div class="text-gray-400">
        <span class="font-medium text-2xl text-black">Zamówienia</span>
        <span id="nav_button_orders" onclick="openOrdersSite('orders_outcome')" class="orders_outcome font-medium text-2xl hover:text-violet-500 duration-150 cursor-pointer">wychodzące </span><span id="nav_button_orders" onclick="openOrdersSite('orders_income')" class="orders_income font-medium text-2xl hover:text-violet-500 duration-150 cursor-pointer">i przychodzące</span>
        </div>
        <div onclick="openPanelSite('order_add')"  class="hover:text-white hover:bg-violet-500 hover:shadow-xl shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </div>
    </div>

    <section class="flex flex-col gap-4">
        <div class="grid grid-cols-7 text-sm text-gray-600 font-[poppins] bg-white rounded-2xl ring-1 ring-black ring-opacity-5 shadow-xl mt-4">
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Zamówienie
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Kupujący
            </div>
            <div class="col-span-2 font-medium py-5 pl-4 pr-3 sm:pl-6">
                Dane kontaktowe
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Wartość
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Utworzone
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 text-center">
                Status
            </div>
        </div>
        <div id="table_body"></div>
    </section>
</section>
<script>
function openOrdersSite(site) {
    var body = document.getElementById("table_body");
     body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
    const url = "components/panel/orders/" + site + ".php";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const parsedDocument = parser.parseFromString(data, "text/html");
            body.innerHTML = parsedDocument.body.innerHTML;

            // Wywołaj funkcję do wykonania skryptów
            executeScripts(parsedDocument);

            // Dodaj nowy wpis do historii przeglądarki
            //const newUrl = window.location.origin + window.location.pathname + "?" + site;
            //history.pushState({ path: newUrl }, "", newUrl);
        });
    // Zapisz URL w localStorage
    //przetłumaczenie site na tekst normalny

    localStorage.setItem("OrderPanelSite", site);
    var removeButtons = document.querySelectorAll("#nav_button_orders");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].classList.remove("text-black");
    }

    var activeButtons = document.querySelectorAll("." + site);
    for(var i = 0; i < activeButtons.length; i++) {  
      activeButtons[i].classList.add("text-black");
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

var orderspanelSite = localStorage.getItem("OrdersPanelSite");
if (orderspanelSite == null) {
    openOrdersSite('orders_outcome');
} else {
    openOrdersSite(orderspanelSite);
    var removeButtons = document.querySelectorAll("#nav_button_orders");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].classList.remove("text-black");
    }

    var activeButtons = document.querySelectorAll("." + orderspanelSite);
    for(var i = 0; i < activeButtons.length; i++) {  
      activeButtons[i].classList.add("text-black");
    }
}
</script>
<?php 
$name_in_scripts = 'Users';
$delete_path = 'scripts/users/delete.php';
$path = 'components/panel/users/users_edit.php';
include "../../popup.php";
?>
