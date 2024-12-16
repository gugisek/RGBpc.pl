<section data-aos="fade-up" data-aos-delay="100">
    
        <div class="flex itesm-center justify-between">
            <h1 class="font-medium text-2xl">Produkty</h1>
            <div class="flex items-center gap-2">
                <div onclick="openPanelSite('doms')"  class="hover:text-white hover:bg-violet-500 text-gray-600 hover:shadow-xl shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                    </svg>
               </div>
               <div onclick="openPopupProductsAdd()"  class="hover:text-white hover:bg-violet-500 text-gray-600 hover:shadow-xl shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 cursor-pointer">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                   </svg>
               </div>
            <div class="mx-auto max-w-xl transform overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-black ring-opacity-5 transition-all">
                    <div class="relative">
                        <svg class="pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                        <input onchange="search(this.value)" type="text" class="h-12 w-full border-0 rounded-xl bg-transparent outline-violet-500 pl-11 pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm" placeholder="Wyszukaj..." role="combobox" aria-expanded="false" aria-controls="options">
                    </div>
                </div>

           </div>
        </div>

    <section class="flex flex-col gap-4">
        <div class="grid grid-cols-8 text-sm text-gray-600 font-[poppins] bg-white ring-1 ring-black ring-opacity-5 rounded-2xl shadow-xl mt-2">
            <div class="col-span-2 font-medium py-5 pl-4 pr-3 sm:pl-6">
                Nazwa
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                SKU
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Kategoria
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex justify-center">
                Ilość
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex justify-center">
                Cena netto
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex gap-2 justify-center">
                <span>Cena brutto</span>
                <!-- <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2.5 text-[gray]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2.5 text-[black] rotate-180">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12" />
                    </svg>
                </span> -->

            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Status
            </div>
        </div>
        <div id="table_body">
            <?php include "../products/table_list.php"; ?>      
        </div>
    </section>
</section>

<script>
    function search(arg){

        var body = document.getElementById("table_body");
        body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
        const url = "components/panel/products/table_list.php?arg=" + arg;
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
</script>

<?php 
$name_in_scripts = 'Products';
$delete_path = 'scripts/products/delete.php';
$path = 'components/panel/products/edit.php';
$close= 'true';
include "../../popup.php";
?>
<?php 
$name_in_scripts = 'ProductsAdd';
$delete_path = '';
$close= 'false';
$path = 'components/panel/products/add.php';
include "../../popup.php";
?>