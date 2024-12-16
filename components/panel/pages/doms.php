<section>
    
        <div class="flex items-center justify-between">
            <div class="flex items-center -mt-2">
                <h1 onclick="openPanelSite('products')" class="cursor-pointer hover:text-gray-400 duration-150 font-medium text-2xl">Produkty</h1>
                <h1 data-aos="fade-right" data-aos-delay="100" class="font-medium text-2xl px-2 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </h1>
                <a data-aos="fade-right" data-aos-delay="100">
                    <h1 class="font-medium text-2xl text-gray-600">Stan magazynowy</h1>
                </a>
            </div>
            <div class="flex items-center gap-2 flex-row-reverse" data-aos="fade-right" data-aos-delay="100">
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
</section>
<section data-aos="fade-right" data-aos-delay="100">
    <section class="flex flex-col gap-4">
        <div class="grid grid-cols-8 text-sm text-gray-600 font-[poppins] bg-white ring-1 ring-black ring-opacity-5 rounded-2xl shadow-xl mt-2">
            <div class="col-span-2 font-medium py-5 pl-4 pr-3 sm:pl-6">
                Nazwa
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Numer seryjny
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Kategoria
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex justify-center">
                Cena zakupu brutto
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex justify-center">
                Cena netto
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex gap-2 justify-center">
                <span>Cena brutto</span>
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Status
            </div>
        </div>
        <div id="doms_table_body">
            <?php include "../products/doms_table.php"; ?>      
        </div>
    </section>
</section>