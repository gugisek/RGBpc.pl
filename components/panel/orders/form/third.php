<div data-aos="fade-up" data-aos-delay="100" class="w-full">

    <div class="flex gap-4">
        <main class="w-3/4">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Dodaj produkty</h2>
            <div class="transform overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-black ring-opacity-5 transition-all">
                    <div class="relative">
                        <svg class="pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                        <input onchange="search(this.value)" type="text" class="h-12 w-full border-0 rounded-xl bg-transparent outline-violet-500 pl-11 pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm" placeholder="Wyszukaj..." role="combobox" aria-expanded="false" aria-controls="options">
                        <div class=" absolute right-4 top-3.5 h-5  text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <div class="flex items-center">
                                <select name="" id="">
                                    <option value="">Najnowsze</option>
                                </select>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                </svg>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <?php
                    include '../../../../scripts/conn_db.php';
                    $sql = "SELECT products.id, products.name, products.sku, products.img, products.source, product_categories.category, products.description, products.sell_price_brutto, products.status_id, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.category_id LEFT JOIN product_doms on product_doms.product_id=products.id and product_doms.status_id = 2 LEFT JOIN product_status on product_status.id=products.status_id where products.status_id = 1 group by products.id order by id desc;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if($row['sell_price_brutto'] == 0){
                                $price_brutto = '<span class="text-gray-400">Brak ceny</span>';
                                $price_netto = '<span class="text-gray-400">Brak ceny</span>';
                            }else{
                                $row['sell_price_brutto'] = round($row['sell_price_brutto'], 2);
                                $price_brutto = round($row['sell_price_brutto'], 2) . ' PLN';
                                $price_netto = round($row['sell_price_brutto'] - (0.23*$row['sell_price_brutto']), 2) . ' PLN';
                            }
                            echo '
                            <section id="product-'.$row['id'].'" onclick="toggleCart(this, '.$row['id'].')" class="cursor-pointer group relative rounded-xl hover:scale-105 hover:shadow-xl active:scale-95 duration-150">
                                <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-xl bg-gray-200 lg:aspect-none lg:h-80">
                                    <img src="img/products_images/'.$row['img'].'" alt="" class="h-full w-full object-cover object-center lg:h-full lg:w-full group-hover:opacity-40 duration-150">
                                    <!-- Dodajemy ikonę koszyka i podpis -->
                                    <div class="absolute inset-0 flex items-center flex-col justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-150">
                                        <div class="flex flex-col items-center bg-white rounded-full p-4 border border-black/10 -mt-20">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class=" w-12 h-12 text-gray-700">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- Dodajemy ikonę checkmark i podpis -->
                                    <span class="absolute inset-0 flex items-center flex-col justify-center transition-opacity duration-150 bg-green-100/40 rounded-xl">
                                        <div class="flex flex-col items-center bg-white rounded-full p-4 border border-black/10 -mt-20">
                                            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            
                                        </div>
                                    </span>
                                </div>
                                <div class="mt-4 flex justify-between pb-4 px-4">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <a>
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                '.$row['name'].'
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500 uppercase">'.$row['sku'].' | <span class="normal-case">Ilość: '.$row['quantity'].'</span></p>
                                        
                                    </div>
                                    <p class="text-sm font-medium text-gray-900">'.$price_brutto.'</p>
                                </div>
                            </section>
                            ';
                        }
                    }

                    ?>
                </div>
           
        </main>
        <aside class="w-1/4 h-full">
            <div class="mt-10 lg:mt-0">
                <h2 class="text-lg font-medium text-gray-900 flex  items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    <span>Koszyk</span>
                </h2>

                <div class="mt-4 rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div id="statusLoading" class='hidden fixed z-[30] bg-black/40 p-2 rounded-3xl scale-50 flex items-center justify-center'><div class='lds-dual-ring'></div></div>
                    <div id="summary_body">

                    </div>
                    <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                        <button onclick="checkThird()" class="mb-2 bg-violet-500 border-2 border-violet-500 text-white w-full py-2 font-medium rounded-2xl hover:shadow-xl hover:scale-105 active:scale-95 duration-150">Dalej</button>
                        <button onclick="openOrderAddSite('second')" class="w-full border-2 border-black/60 text-gray-600 hover:bg-black/60 hover:border-black/0 hover:text-white py-2 font-medium rounded-2xl hover:shadow-xl hover:scale-105 active:scale-95 duration-150">Wróć</button>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>

<script>

    function checkThird() {
        //sprawdzenie czy w localsotrage w cart są liczby
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        if(cart.length == 0){
            let supOrder = JSON.parse(localStorage.getItem("supOrder"));

            // Zmiana konkretnej wartości
            supOrder.third = "warning";

            // Zapisanie zaktualizowanego obiektu z powrotem do localStorage
            localStorage.setItem("supOrder", JSON.stringify(supOrder));

            supCheck('third');
            showAlert('warning', 'Brak produktów w koszyku!');
            return;
        }else{
            let supOrder = JSON.parse(localStorage.getItem("supOrder"));

            // Zmiana konkretnej wartości
            supOrder.third = "ok";

            // Zapisanie zaktualizowanego obiektu z powrotem do localStorage
            localStorage.setItem("supOrder", JSON.stringify(supOrder));

            supCheck('third');
            openOrderAddSite('fourth');
        }

    }

    cartSummary();
    // Pobierz localStorage dla koszyka i ustaw statusy active dla produktów w koszyku
if (localStorage.getItem('cart')) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    console.log(cart);
    
    cart.forEach(item => {
        let productElement = document.getElementById('product-' + item.id);
        if (productElement) {
            productElement.classList.add('active');
        }
    });
}

    
    function cartSummary(){
        document.getElementById('statusLoading').classList.remove('hidden');
        var body = document.getElementById("summary_body");
        //body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
        if((localStorage.getItem('cart'))){
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const url = "components/panel/orders/cart_summary.php?cart="+JSON.stringify(cart);
        fetch(url)
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const parsedDocument = parser.parseFromString(data, "text/html");
                body.innerHTML = parsedDocument.body.innerHTML;
                executeScripts(parsedDocument);
        });
        }
        document.getElementById('statusLoading').classList.add('hidden');
    }


    function toggleCart(element, productId) {
    productId = Number(productId); // Konwersja na liczbę

    element.classList.toggle('active');

    // Pobierz koszyk z localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    if (element.classList.contains('active')) {
        // Dodaj produkt do koszyka (z domyślną ilością = 1)
        if (!cart.some(item => item.id === productId)) {
            cart.push({ id: productId, quantity: 1 });
        }
    } else {
        // Usuń produkt z koszyka natychmiast
        cart = cart.filter(item => item.id !== productId);
    }

    // Zapisz zmiany do localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    cartSummary();
}


function removeFromCart(productId) {
    console.log('Usuwanie produktu:', productId);

    // Konwersja ID na liczbę, aby uniknąć problemów z typami
    productId = Number(productId);

    // Pobierz localStorage dla koszyka
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Usuń produkt całkowicie
    cart = cart.filter(item => item.id !== productId);

    // Zapisz zmiany do localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Usuń klasę 'active' z produktu, jeśli jest wyświetlony
    let productElement = document.getElementById('product-' + productId);
    if (productElement) {
        productElement.classList.remove('active');
    }

    cartSummary();
}



function productQuantityUpdate(productId, quantity) {
    // Konwersja na liczby
    productId = Number(productId);
    quantity = Number(quantity);

    // Pobierz aktualny koszyk z localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Usuń ewentualne duplikaty ID
    cart = cart.filter(item => Number(item.id) !== productId);

    if (quantity > 0) {
        // Dodaj lub zaktualizuj produkt z poprawioną ilością
        cart.push({ id: productId, quantity: quantity });
    }

    // Zapisz zmiany do localStorage
    localStorage.setItem('cart', JSON.stringify(cart));



    cartSummary();
}


</script>