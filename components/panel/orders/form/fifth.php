<div data-aos="fade-up" data-aos-delay="100" class="">
<div class="bg-gray-50">
  <div class="mx-auto max-w-2xl pt-8 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
    <div class="space-y-2 px-4 sm:flex sm:items-baseline sm:justify-between sm:space-y-0 sm:px-0">
      <div class="flex sm:items-baseline sm:space-x-4">
        <h class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Zamówienie #<span id="order_number_fifth"></span> <span id="order_number_2_fifth" class="text-sm text-gray-500"></span>
        <!-- <a href="#" class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:block">
          View invoice
          <span aria-hidden="true"> &rarr;</span>
        </a> -->
      </div>
      <p class="text-sm text-gray-600">Data złożenia zamówienia 
        <input type="datetime-local" name="order_date" id="order_date" class="ml-4 font-medium text-gray-900 focus:outline-none focus:ring-violet-500 focus:ring-2 rounded-md duration-150" value="<?php echo date('Y-m-d') . 'T' . date('H:i'); ?>">
      </p>
      <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:hidden">
        View invoice
        <span aria-hidden="true"> &rarr;</span>
      </a>
    </div>

    <!-- Products -->
    <div class="mt-6">
      <h2 class="sr-only">Products purchased</h2>
    <div id="statusLoading" class='hidden fixed z-[30] bg-black/40 p-2 rounded-3xl scale-50 flex items-center justify-center'><div class='lds-dual-ring'></div></div>

      <div id="products_sum_body" class="space-y-8">
        
      </div>
    </div>

    <!-- Billing -->
    <div class="mt-16">
      <h2 class="sr-only">Billing Summary</h2>

      <div class="bg-gray-100 px-4 py-6 sm:rounded-lg sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-8 lg:py-8">
        <dl class="grid grid-cols-2 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-7">
          <div>
            <dt class="font-medium text-gray-900">Dane klienta</dt>
            <dd class="mt-3 text-gray-500">
              <span id="fifth_name" class="block"></span>
              <span id="fifth_phone"class="block"></span>
              <span id="fifth_email"class="block"></span>
              <span id="fifth_addres"class="block mt-2 border-t pt-2"></span>
              <span id="fifth_city_post"class="block"></span>
            </dd>
          </div>
          <div id="fifth_delivery_body">
            
          </div>
        </dl>

        <dl id="price_sum_body" class="mt-8 divide-y divide-gray-200 text-sm lg:col-span-5 lg:mt-0">
          
        </dl>
      </div>
    </div>
  </div>
</div>
    <div class="flex flex-row-reverse gap-4 mx-auto max-w-2xl sm:px-6 lg:max-w-7xl lg:px-8">
      <input id="end_button" type="button" onclick="createOrder()" value="Zakończ" class="cursor-pointer bg-violet-500 border-2 border-violet-500 text-white w-full py-2 font-medium rounded-2xl hover:shadow-xl hover:scale-105 active:scale-95 duration-150">
      <button onclick="openOrderAddSite('fourth')" class="border-2 border-black/60 text-gray-600 hover:bg-black/60 hover:border-black/0 hover:text-white w-full py-2 font-medium rounded-2xl hover:shadow-xl hover:scale-105 active:scale-95 duration-150">Wróć</button>
    </div>
  </div>

<script>
    deliveryShow();
    productsShow();
    dataShowFifth();
    priceShow()

    function dataShowFifth(){
        data = JSON.parse(localStorage.getItem("OrderFirst"));
        document.getElementById('order_number_fifth').innerHTML = data[3];
        document.getElementById('order_number_2_fifth').innerHTML = data[4];
        data_second = JSON.parse(localStorage.getItem("OrderSecond"));
        document.getElementById('fifth_name').innerHTML = data_second[0];
        document.getElementById('fifth_phone').innerHTML = data_second[1];
        document.getElementById('fifth_email').innerHTML = data_second[2];
        document.getElementById('fifth_addres').innerHTML = data_second[3];
        document.getElementById('fifth_city_post').innerHTML = data_second[6] + " " + data_second[7];
    }

    function productsShow(){
        document.getElementById('statusLoading').classList.remove('hidden');
        var body = document.getElementById("products_sum_body");
        //body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
        let products = JSON.parse(localStorage.getItem('cart')) || [];
        const url = "components/panel/orders/fifth_products.php?products=" + JSON.stringify(products);
        fetch(url)
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const parsedDocument = parser.parseFromString(data, "text/html");
                body.innerHTML = parsedDocument.body.innerHTML;
                executeScripts(parsedDocument);
        });
        document.getElementById('statusLoading').classList.add('hidden');
    }

    function priceShow(){
        delivery_data = JSON.parse(localStorage.getItem('OrderFourth'));
        var delivery = delivery_data[0];
        document.getElementById('statusLoading').classList.remove('hidden');
        var body = document.getElementById("price_sum_body");
        let products = JSON.parse(localStorage.getItem('cart')) || [];
        const url = "components/panel/orders/fifth_price.php?products=" + JSON.stringify(products) + "&delivery_id=" + delivery; 
        fetch(url)
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const parsedDocument = parser.parseFromString(data, "text/html");
                body.innerHTML = parsedDocument.body.innerHTML;
                executeScripts(parsedDocument);
        });
        document.getElementById('statusLoading').classList.add('hidden');
    }

    function deliveryShow(){
        //document.getElementById('statusLoading').classList.remove('hidden');
        var body = document.getElementById("fifth_delivery_body");
        //body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
        delivery_data = JSON.parse(localStorage.getItem('OrderFourth'));
        var delivery = delivery_data[0];
        var box_machine_number = delivery_data[1];

        const url = "components/panel/orders/fifth_delivery.php?delivery_id=" + delivery + "&box_machine_number=" + box_machine_number + "&paynament_id=" + delivery_data[2];
        fetch(url)
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const parsedDocument = parser.parseFromString(data, "text/html");
                body.innerHTML = parsedDocument.body.innerHTML;
                executeScripts(parsedDocument);
        });
        //document.getElementById('statusLoading').classList.add('hidden');
    }

    function createOrder() {
        document.getElementById('end_button').disabled = true;
        document.getElementById('end_button').classList.add('cursor-wait');
        document.getElementById('end_button').classList.add('bg-gray-500');
        document.getElementById('end_button').classList.remove('bg-violet-500');

        // Dane do wysłania w żądaniu
        const postData = new FormData();

        postData.append('order_date', document.getElementById('order_date').value);
        data_first = JSON.parse(localStorage.getItem("OrderFirst"));
        data_second = JSON.parse(localStorage.getItem("OrderSecond"));
        data_products = JSON.parse(localStorage.getItem("cart"));
        data_fourth = JSON.parse(localStorage.getItem("OrderFourth"));
        
        postData.append('platform_id', data_first[0]);
        postData.append('order_type', data_first[1]);
        postData.append('seller_id', data_first[2]);
        postData.append('order_number', data_first[3]);
        postData.append('external_number', data_first[4]);

        postData.append('client', data_second[0]);
        postData.append('phone_number', data_second[1]);
        postData.append('email', data_second[2]);
        postData.append('addres', data_second[3]);
        postData.append('client_type', data_second[4]);
        postData.append('nip', data_second[5]);
        postData.append('city', data_second[6]);
        postData.append('post_code', data_second[7]);

        postData.append('products', JSON.stringify(data_products));

        postData.append('shipping_id', data_fourth[0]);
        postData.append('box_machine', data_fourth[1]);
        postData.append('paynament_id', data_fourth[2]);
        
      
      //console.log(parameterId, value, productId);

        // Wysyłanie żądania POST do skryptu PHP
        fetch('scripts/orders/create_back.php', {
            method: 'POST',
            body: postData,
        })
        .then(response => response.json()) // Oczekiwanie na odpowiedź JSON
        .then(data => {
            // Jeśli odpowiedź zawiera sukces lub błąd
            switch (data.status) {
                case 'success':
                    showAlert('success', data.message); // Wyświetl sukces
                    localStorage.removeItem('OrderFirst');
                    localStorage.removeItem('OrderSecond');
                    localStorage.removeItem('cart');
                    localStorage.removeItem('OrderFourth');
                    localStorage.removeItem('OrderFormPanelSite');
                    localStorage.removeItem('supOrder');
                    openPanelSite(`orders`);
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

        document.getElementById('end_button').disabled = false;
        document.getElementById('end_button').classList.remove('cursor-wait');
        document.getElementById('end_button').classList.remove('bg-gray-500');
        document.getElementById('end_button').classList.add('bg-violet-500');
    }
    
</script>