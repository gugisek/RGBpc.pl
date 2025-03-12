<section>
        <div class="flex items-center justify-between">
            <div class="flex items-center -mt-2">
                <h1 onclick="openPanelSite('orders')" class="cursor-pointer hover:text-gray-400 duration-150 font-medium text-2xl">Zamówienia</h1>
                <h1 data-aos="fade-right" data-aos-delay="100" class="font-medium text-2xl px-2 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </h1>
                <div data-aos="fade-right" data-aos-delay="200" class="flex items-center">
                <a>
                    <h1 onclick="" class="font-medium text-2xl text-gray-600">Dodaj nowe zamówienie</h1>
                </a>
                
                <a id="order_number_outer" class="hidden flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 mx-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                    <h1 id="order_number_header" class="font-medium text-2xl text-gray-600"></h1>
                </a>
                </div>
            </div>
        </div>
</section>
<section data-aos="fade-right" data-aos-delay="100">
<nav aria-label="Progress" class="px-8 py-8">
  <ol role="list" class="divide-y divide-gray-300 rounded-2xl border border-gray-300 md:flex md:divide-y-0">
    <?php
    $names = ['first', 'second', 'third', 'fourth', 'fifth'];
    $texts = ['Parametry zamówienia', 'Klient', 'Produkty', 'Dostawa i płatność', 'Podsumowanie'];
    for($i = 0; $i < 5; $i++){
        echo '
        <li onclick="openOrderAddSite(\''.$names[$i].'\');" class="relative md:flex md:flex-1 active:scale-95 hover:scale-105 transition-all duration-150">
          <!-- Completed Step -->
          <a href="#" class="group flex w-full items-center">
            <span class="flex items-center px-6 py-4 text-sm font-medium">
              <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full">
                <span id="nav_order_form_border" class="'.$names[$i].'_border flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-violet-400 duration-150">
                    <span id="nav_order_form" class="'.$names[$i].' text-gray-500 group-hover:text-violet-400 duration-150">0'.($i+1).'</span>
                </span>
              </span>
              <span id="nav_order_form" class="'.$names[$i].' ml-4 text-sm font-medium text-gray-500 group-hover:text-violet-400 duration-150">'.$texts[$i].'</span>
            </span>
            </a>';
           if($i != 4){
            echo '
            <div class="absolute right-0 top-0 hidden h-full w-5 md:block" aria-hidden="true">
              <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
              </svg>
            </div>
            ';
           }
        echo '
        </li>
        ';
    }
    ?>
    
  </ol>
</nav>

<section id="order_form_body" class="px-8 w-full flex items-center justify-center">

</section>


</section>

<script>

    function changeOrderNumber(number, external_number) {
        document.getElementById("order_number_header").innerHTML = number + " " + external_number;
        document.getElementById("order_number_outer").classList.remove("hidden");
    }

    function supCheck(page_number) {
      if (localStorage.getItem("supOrder") == null) {
        localStorage.setItem("supOrder", JSON.stringify({first: 'not set', second: 'not set', third: 'not set', fourth: 'not set', fifth: 'not set'}));
      } else {
        var data = JSON.parse(localStorage.getItem("supOrder"));
        if (data[page_number] == 'ok') {
          if(page_number == 'first'){
            changeOrderNumber(JSON.parse(localStorage.getItem("OrderFirst"))[3], " / " + JSON.parse(localStorage.getItem("OrderFirst"))[4]);
          }

          //ustawienie koloru na zielony dla danego page_number po klasie name
          document.querySelector("." + page_number).classList.add("text-green-500");
          document.querySelector("." + page_number).classList.remove("text-red-500");
        } else if (data[page_number] == 'warning') {
          //ustawienie koloru na czerwony dla danego page_number po klasie name
          document.querySelector("." + page_number).classList.add("text-red-500");
        } else {
          //ustawienie koloru na szary dla danego page_number po klasie name
         // document.querySelector("." + page_number).classList.add("text-gray-500");
          
        }
      }
    }

    

    function openOrderAddSite(site) {
    var body = document.getElementById("order_form_body");
     body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
    const url = "components/panel/orders/form/" + site + ".php";
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

    localStorage.setItem("OrderFormPanelSite", site);
    var removeButtons = document.querySelectorAll("#nav_order_form");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].classList.remove("text-violet-500");
    }

    var activeButtons = document.querySelectorAll("." + site);
    for(var i = 0; i < activeButtons.length; i++) {  
      activeButtons[i].classList.add("text-violet-500");
    }

    var removeButtons = document.querySelectorAll("#nav_order_form_border");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].classList.remove("border-violet-500");
    }

    var activeButtons = document.querySelectorAll("." + site + "_border");
    for(var i = 0; i < activeButtons.length; i++) {  
      activeButtons[i].classList.add("border-violet-500");
    }
    
}

if (localStorage.getItem("OrderFormPanelSite") == null) {
    openOrderAddSite('first');
} else {
    
    openOrderAddSite(localStorage.getItem("OrderFormPanelSite"));
    var removeButtons = document.querySelectorAll("#nav_order_form");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].classList.remove("text-violet-500");
    }

    var activeButtons = document.querySelectorAll("." + localStorage.getItem("OrderFormPanelSite"));
    for(var i = 0; i < activeButtons.length; i++) {  
      activeButtons[i].classList.add("text-violet-500");
    }

    var removeButtons = document.querySelectorAll("#nav_order_form_border");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].classList.remove("border-violet-500");
    }

    var activeButtons = document.querySelectorAll("." + localStorage.getItem("OrderFormPanelSite") + "_border");
    for(var i = 0; i < activeButtons.length; i++) {  
      activeButtons[i].classList.add("border-violet-500");
    }
    //check dla first, second, third, fourth, fifth
    supCheck('first');
    supCheck('second');
    supCheck('third');
    supCheck('fourth');
    supCheck('fifth');
}
</script>
