<?php
session_start();
$id = $_GET['id'];
include "../../../scripts/conn_db.php";
$sql = "select product_doms.id, products.id as 'product_id', product_doms.dom_code, products.sku, products.description, products.our_olx, products.source, products.our_allegro, product_doms.bought_price_brutto, product_doms.sell_date, supplayers.name as 'supplayer', product_categories.category, product_doms.sell_date, product_doms.status_id, products.name, products.img, products.sell_price_brutto, product_doms.sell_price_brutto as 'sell_price', dom_status.name as 'status' from product_doms left join products on products.id=product_doms.product_id left JOIN supplayers on supplayers.id=product_doms.bought_source_id left JOIN dom_status on dom_status.id=product_doms.status_id left JOIN product_categories on product_categories.id=products.category_id;";
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

if($row['sell_date'] != NULL){
    $sell_date = '| '+substr($row['sell_date'], 0, 10);
}else {
    $sell_date = '';
}

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
                <span class="text-sm text-gray-600">Numer seryjny:</span> <span class="uppercase font-medium"><?=$row['dom_code']?></span><br/>
                <span class="text-sm text-gray-600">Status:</span> <span id="status_popup" class="font-medium 
                <?php
                if($row['status'] == 'Zamówiony'){
                    echo 'text-violet-500';
                }elseif($row['status'] == 'W magazynie'){
                    echo 'text-green-500';
                }elseif($row['status'] == 'Sprzedany'){
                    echo 'text-gray-500';
                }elseif($row['status'] == 'Wewnętrzny użytek'){
                    echo 'text-blue-500';
                }elseif($row['status'] == 'Zwrócony do hurtowni'){
                    echo 'text-orange-500';
                }elseif($row['status'] == 'Uszkodzony w transporcie'){
                    echo 'text-red-500';
                }elseif($row['status'] == 'Produkt wadliwy'){
                    echo 'text-red-500';
                }elseif($row['status'] == 'Zwrócony do RGBpc'){
                    echo 'text-orange-500';
                }elseif($row['status'] == 'Używany - outlet'){
                    echo 'text-green-500';
                }
                ?>
                "><?=$row['status']?></span><br/>
                <span class="text-sm text-gray-600">Sugerowana cena brutto: </span><span><?=number_format($row['sell_price_brutto'],2,',','')?></span> PLN<br/>
                <span class="text-sm text-gray-600">Cena brutto sprzedaży: </span><span><?=number_format($row['sell_price'],2,',','')?></span> PLN <?=$sell_date?><br/>
            </div>
                <div class="flex items-center justify-center">
                    <select type="text" onchange="updateStatusDom(this.value, '<?=$id?>')" id="status_id" value="" name="status_id" placeholder="" class="minimal border border-black/10 w-full px-6 py-3 rounded-2xl focus:ring-0 focus:outline-1 focus:outline-violet-500 cursor-pointer active:scale-95 hover:shadow-xl duration-150 text-sm">
                    <?php
                        $sql = "SELECT * from dom_status";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row2 = mysqli_fetch_assoc($result))
                            {
                                echo '<option ';
                                if ($row['status_id'] == $row2['id']) {
                                    echo 'selected ';
                                }
                                echo ' value="'.$row2['id'].'">'.$row2['name'].'</option>';
                            }
                        }
                        ?>
                    </select>
                    <div id="statusLoading" class='hidden fixed z-[30] bg-black/40 p-2 rounded-3xl scale-50 flex items-center justify-center'><div class='lds-dual-ring'></div></div>
                </div>
                <p onclick="openPopupProducts('<?=$row['product_id']?>')" class="text-xs flex gap-2 items-center hover:text-violet-600 duration-150 cursor-pointer">Produkt
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z" clip-rule="evenodd" />
                    </svg>

                </p>    
            </div>
            </div>
    <section class="">
        <div class="border-y border-black/20 text-gray-700 font-[poppins] flex items-center justify-center text-xs my-4 py-2 divide-x divide-black/40">
        <a id="nav_button_details" onclick="openDetailDomTab('time_line', 'id=<?=$id?>&type=products_doms')" class="time_line text-violet-600 px-2 hover:text-violet-600 duration-150 cursor-pointer">
                Time Line
            </a>
            <a id="nav_button_details" onclick="openDetailDomTab('archive_prod')" class="archive_prod px-2 hover:text-violet-600 duration-150 cursor-pointer">
                Archiwum
            </a>
            <a id="nav_button_details" onclick="openDetailDomTab('bar_code', 'sku=<?=$row['sku']?>&serial=<?=$row['dom_code']?>&category=<?=$row['category']?>')" class="bar_code px-2 hover:text-violet-600 duration-150 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />
                </svg>
            </a>
        </div>
        <div id="details_body_doms">
        
        <ul role="list" class="space-y-6">

<?php

  $type = 'products_doms';
  include '../../../scripts/conn_db.php';
  $sql = "SELECT time_lines.object_type, time_lines.create_date, time_lines.type_id, time_lines.message, concat(users.name, ' ', users.sur_name) as 'user', users.profile_picture FROM `time_lines` left join users on users.id=time_lines.user_id where object_id = $id and object_type = '$type' order by time_lines.create_date desc;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      
      while ($row = $result->fetch_assoc()) {
          $date = substr($row['create_date'], 0, 10);
          $time = substr($row['create_date'], 11, 5);
          //calculate date, if orlder than 7 days, show date else calculate days from now or hours or minutes or seconds
          $date_now = date("Y-m-d H:i:s");
          $date_now = strtotime($date_now);
          $date = strtotime($row['create_date']);
          $diff = $date_now - $date;
          $days = floor($diff / (60 * 60 * 24));
          $hours = floor($diff / (60 * 60));
          $minutes = floor($diff / 60);
          $seconds = $diff;
          if($days > 7){
              $date = substr($row['create_date'], 0, 10);
          }elseif($days > 0){
              $date = $days . 'd ago';
          }elseif($hours > 0){
              $date = $hours . 'h ago';
          }elseif($minutes > 0){
              $date = $minutes . 'm ago';
          }elseif($seconds > 0){
              $date = $seconds . 's ago';
          }else{
              $date = 'teraz';
          }

          if($row['profile_picture'] == NULL){
              $row['profile_picture'] = 'default.png';
          }

          if($row['type_id']=='3'){
              echo '
              <li class="relative flex gap-x-4">
                  <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                      <div class="w-px bg-gray-200"></div>
                  </div>
                  <img src="img/users_images/'.$row['profile_picture'].'" alt="" class="relative mt-3 h-6 w-6 flex-none rounded-full bg-gray-50 object-cover border border-black/10">
                  <div class="flex-auto rounded-md p-3 ring-1 ring-inset ring-gray-200">
                      <div class="flex justify-between gap-x-4">
                          <div class="py-0.5 text-xs leading-5 text-gray-500"><span class="font-medium text-gray-900">'. $row['user'] .'</span> skomentował</div>
                          <time datetime="2023-01-23T15:56" class="flex-none py-0.5 text-xs leading-5 text-gray-500">'. $date .'</time>
                      </div>
                      <p class="text-sm leading-6 text-gray-500">'. $row['message'] .'</p>
                  </div>
              </li>
              ';
          }else{
          echo '
          <li class="relative flex gap-x-4">
              <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                  <div class="w-px bg-gray-200"></div>
              </div>';
                  if($row['type_id'] == '4'){
                      echo '
                      <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                          <svg class="h-6 w-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                          </svg>
                      </div>';
                  }elseif($row['type_id'] == '1'){
                      echo '
                      <div class="relative flex h-6 w-6 flex-none items-center justify-center">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5 text-white bg-indigo-600 rounded-full p-1">
                              <path d="M1.75 1.002a.75.75 0 1 0 0 1.5h1.835l1.24 5.113A3.752 3.752 0 0 0 2 11.25c0 .414.336.75.75.75h10.5a.75.75 0 0 0 0-1.5H3.628A2.25 2.25 0 0 1 5.75 9h6.5a.75.75 0 0 0 .73-.578l.846-3.595a.75.75 0 0 0-.578-.906 44.118 44.118 0 0 0-7.996-.91l-.348-1.436a.75.75 0 0 0-.73-.573H1.75ZM5 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM13 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                          </svg>

                      </div>';
                  }else{
                      echo '
                          <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                              <div class="h-1.5 w-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                          </div>';
                  }
              echo '
              <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500">'. $row['message'] .' przez <span class="font-medium text-gray-900">'. $row['user'] .'</span></p>
              <time datetime="2023-01-23T11:03" class="flex-none py-0.5 text-xs leading-5 text-gray-500" title="'. $row['create_date'] .'">'. $date .'</time>

          </li>
          ';
              }
      }
  }
?>

</ul>

<!-- New comment form -->
<div class="mt-6 flex gap-x-3">
<img src="img/users_images/<?=$_SESSION['profile_picture']?>" alt="" class="h-6 w-6 flex-none rounded-full bg-gray-50">
  <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6 text-white bg-gray-600 rounded-full p-1">
<path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
<path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
</svg> -->


<form class="relative flex-auto">
  <div class="overflow-hidden rounded-lg pb-12 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-violet-600">
    <label for="comment" class="sr-only">Dodaj komentarz</label>
    <textarea rows="2" name="comment" id="message" class="block w-full resize-none border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 focus:outline-none sm:text-sm sm:leading-6" placeholder="Dodaj notatkę..."></textarea>
    
  </div>
  
  <div class="absolute inset-x-0 bottom-0 flex justify-between py-2 pl-3 pr-2">
      <div class="flex items-center space-x-5">
          
          
          </div>
          <div class="flex flex-row gap-2 ">

              <div id="messageLoading" class='hidden z-[30] bg-black/40 rounded-3xl size-8 flex items-center justify-center'><div class='lds-dual-ring scale-[.3]'></div></div>
              <button onclick="addComment('<?=$id?>')" type="button" class="rounded-2xl bg-violet-600 px-4 py-1.5 text-sm font-medium hover:scale-105 active:scale-95 hover:shadow-xl duration-150 text-white shadow-sm">Dodaj</button>
          </div>
  </div>
</form>
</div>

           
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
    </div>
</div>

<script>
    function openDetailDomTab(site, link) {
    var body = document.getElementById("details_body_doms");
    //  body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
    const url = "components/panel/doms/details_tab/" + site + ".php?id=" + <?=$id?> + "&" + link;
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
    function updateStatusDom(statusId, productId) {
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
    fetch('scripts/doms/update_status.php', {
        method: 'POST',
        body: postData,
    })
    .then(response => response.json()) // Oczekiwanie na odpowiedź JSON
    .then(data => {
        // Jeśli odpowiedź zawiera sukces lub błąd
        switch (data.status) {
            case 'success':
                showAlert('success', data.message); // Wyświetl sukces
                updateStatsDom(statusId, productId);
                openDetailDomTab('time_line', 'id=<?=$id?>&type=products_doms')
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
    function updateStatsDom(statusId, productId) {
        var status_popup = document.getElementById("status_popup");
        var status = document.getElementById("status_dom_"+productId);

        var statusHTML = "";
        if(statusId == 1){
            statusHTML = '<span class="font-medium text-violet-500">Zamówiony</span>';
        }else if(statusId == 2){
            statusHTML = '<span class="font-medium text-green-500">W magazynie</span>';
        }else if(statusId == 3){
            statusHTML = '<span class="font-medium text-gray-500">Sprzedany</span>';
        }else if(statusId == 4){
            statusHTML = '<span class="font-medium text-blue-500">Wewnętrzny użytek</span>';
        }else if(statusId == 5){
            statusHTML = '<span class="font-medium text-orange-500">Zwrócony do hurtowni</span>';
        }else if(statusId == 6){
            statusHTML = '<span class="font-medium text-red-500">Uszkodzony w transporcie</span>';
        }else if(statusId == 7){
            statusHTML = '<span class="font-medium text-red-500">Produkt wadliwy</span>';
        }else if(statusId == 8){
            statusHTML = '<span class="font-medium text-orange-500">Zwrócony do RGBpc</span>';
        }else if(statusId == 9){
            statusHTML = '<span class="font-medium text-green-500">Używany - outlet</span>';
        }
        status_popup.innerHTML = statusHTML;
        status.innerHTML = statusHTML;
    }
</script>
<script>
    function addComment(productId) {
        // Dane do wysłania w żądaniu
        const postData = new FormData();
        var message = document.getElementById("message").value

        console.log(productId, message);

        postData.append('message', message);
        postData.append('product_id', productId);
    
        //ustawienie selecta na disabled oraz animacji ładowania kółka na nim na czas wysyłania żądania
        var loading = document.getElementById("messageLoading");
        loading.classList.remove("hidden");
    // Wysyłanie żądania POST do skryptu PHP
    fetch('scripts/doms/add_comment.php', {
        method: 'POST',
        body: postData,
    })
    .then(response => response.json()) // Oczekiwanie na odpowiedź JSON
    .then(data => {
        // Jeśli odpowiedź zawiera sukces lub błąd
        switch (data.status) {
            case 'success':
                showAlert('success', data.message); // Wyświetl sukces
                openDetailDomTab('time_line', 'id=<?=$id?>&type=products_doms')
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
    loading.classList.add("hidden");
    

}
</script>
<?php 
$name_in_scripts = 'Products';
$delete_path = 'scripts/products/delete.php';
$path = 'components/panel/products/edit.php';
$close= 'true';
include "../../popup.php";
?>