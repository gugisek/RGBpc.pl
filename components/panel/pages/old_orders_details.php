<main data-aos="fade-up" data-aos-delay="100" class="relative lg:min-h-full">
  <div>
    <div class="mx-auto max-w-2xl px-4  sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 xl:gap-x-24">
      <div class="lg:col-start-1">
      <dl class="mt-16 grid grid-cols-2 gap-x-4 text-sm text-gray-600">
         <div>
            <dt class="font-medium text-gray-900">Typ zamówienia</dt>
            <dd class="mt-2 text-gray-600 flex gap-1 items-center">
                <?php
                    //jezeli dwie pierwsze litery numeru zamówienia to 'ou' to zamówienie wychodzące
                    if(substr($row['order_number'], 0, 2) == 'OI'){
                        echo '
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 0 0 1.06 0l7.22-7.22v5.69a.75.75 0 0 0 1.5 0v-7.5a.75.75 0 0 0-.75-.75h-7.5a.75.75 0 0 0 0 1.5h5.69l-7.22 7.22a.75.75 0 0 0 0 1.06Z" clip-rule="evenodd" />
                        </svg>

                        Przychodzące do nas (kupno)';
                    }else{
                        echo '
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 0 0 1.06 0l7.22-7.22v5.69a.75.75 0 0 0 1.5 0v-7.5a.75.75 0 0 0-.75-.75h-7.5a.75.75 0 0 0 0 1.5h5.69l-7.22 7.22a.75.75 0 0 0 0 1.06Z" clip-rule="evenodd" />
                        </svg>

                        Wychodzące od nas (sprzedaż)';
                    }
                ?>

            </dd>
          </div>
          <div>
            <dt class="font-medium text-gray-900">Platforma</dt>
            <dd class="mt-2 text-gray-600 flex gap-2 items-center">
                <?php
                $platform_id = $row['platform_id'];
                $sql = "select img, name from platforms where id=$platform_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row2 = $result->fetch_assoc();
                    echo '<img src="img/icons/platforms/'.$row2['img'].'" alt="'.$row2['name'].'" class="h-6 w-6 flex-none rounded-md bg-gray-100 object-cover object-center">';
                    echo '<span>'.$row2['name'].'</span>';
                }
                ?>
            </dd>
          </div>
          
        </dl>
        <dl class="mt-8 grid grid-cols-2 gap-x-4 text-sm text-gray-600">
         <div>
            <dt class="font-medium text-gray-900">Data złożenia zamówienia</dt>
            <dd class="mt-2 text-gray-600"><?=$row['create_date']?></dd>
          </div>
          <div>
            <dt class="font-medium text-gray-900">Status zamówienia</dt>
            <dd class="mt-2">
                <div id="orderStatusLoading" class='hidden z-[30] bg-black/40 rounded-3xl size-8 flex items-center justify-center'><div class='lds-dual-ring scale-[.3]'></div></div>
                <select onchange="openPopupOrderConfirm(this.value+'&old_id=<?=$row['status_id']?>&order_id=<?=$row['id']?>')" name="" id="" class="minimal border border-black/10 w-full px-6 py-2 rounded-2xl focus:ring-0 focus:outline-1 focus:outline-violet-500 cursor-pointer active:scale-95 hover:shadow-xl duration-150 text-sm">
                    <?php
                    $status_id = $row['status_id'];
                    $sql = "select * from orders_status";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row3 = $result->fetch_assoc()) {
                        echo '<option ';
                        if ($row3['id'] == $status_id){
                            echo ' selected ';
                        }
                        echo 'value="'.$row3['id'].'">'.$row3['description'].'</option>';
                    }
                    }
                    ?>
                </select>
            </dd>
          </div>
          
        </dl>


        <dl class="mt-14 grid grid-cols-2 gap-x-4 text-sm text-gray-600">
          <div>
            <dt class="font-medium text-gray-900">Sposób płatności</dt>
            <dd class="flex items-center mt-2">
            <?php
                $paynament_id = $row['paynament_id'];
                $sql = "select img, name, desc_short from paynament where id=$paynament_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row4 = $result->fetch_assoc();
                    echo '
                    <div class="flex-shrink-0">
                                <img class="size-9 border border-black/10 rounded-lg object-contain" src="img/icons/'.$row4['img'].'">
                                <p class="sr-only">'.$row4['name'].'</p>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-900">'.$row4['name'].'</p>
                                <p class="text-gray-600">'.$row4['desc_short'].'</p>
                    </div>
                    ';
                }
                ?>
            </dd>
          </div>
          <div>
            <dt class="font-medium text-gray-900">Adres dostawy</dt>
            <dd class="mt-2">
              <address class="not-italic">
                <span class="block"><?=$row['client']?></span>
                <span class="block"><?=$row['client_post_number']?> <?=$row['client_addres']?></span>
                <span class="block"><?=$row['client_city']?>, Polska</span>
              </address>
            </dd>
          </div>
          
        </dl>
        <dl class="mt-16 grid grid-cols-2 gap-x-4 text-sm text-gray-600">
         <div>
            <dt class="font-medium text-gray-900">Sposób dostawy</dt>
            <dd class="mt-2 flex items-center">
            <?php
                $delivery_id = $row['shipping_method'];
                $sql = "select img, name, desc_short, additonal_box_machine_number from shippings where id=$delivery_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row5 = $result->fetch_assoc();
                    echo '
                    <div class="flex-shrink-0">
                                <img class="size-9 border border-black/10 rounded-lg object-contain" src="img/icons/delivery/'.$row5['img'].'">
                                <p class="sr-only">'.$row5['name'].'</p>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-900">'.$row5['name'].'</p>
                                <p class="text-gray-600">';
                                if($row5['additonal_box_machine_number'] == 1){
                                    echo '<span class="uppercase">'.$row['paczkomat'].'</span>';
                                }else{
                                echo $row5['desc_short'];
                                }
                                echo '</p>
                    </div>
                    ';
                }
                ?>
            </dd>
          </div>
          <div>
            <dt class="font-medium text-gray-900">Numer listu przewozowego</dt>
            <dd class="mt-2">
                <dd class=" text-gray-600 flex gap-1 items-center hover:text-violet-600 cursor-pointer duration-150">
                    <span>213721372137</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z" clip-rule="evenodd" />
                    </svg>

                </dd>
            </dd>
          </div>
          
        </dl>
        <ul role="list" class="mt-6 divide-y divide-gray-200 border-t border-gray-200 text-sm font-medium text-gray-500">
          
        <?php
                           
                            $cart = $row['products'];
                            // Dekodujemy JSON na tablicę asocjacyjną
                            
                            $cart = json_decode($cart, true);

                        if (!is_array($cart)) {
                            $cart = []; // Jeśli nie jest tablicą, ustaw pustą tablicę
                        }

                        // Tworzymy tablicę ilości na podstawie $cart
                        $productQuantities = [];
                        foreach ($cart as $item) {
                            $productQuantities[$item['id']] = $item['quantity'];
                        }

                        // Pobranie tylko identyfikatorów produktów
                        $productIds = array_column($cart, 'id');

                        if (empty($productIds)) {
                            $cartString = "''"; // Jeśli koszyk pusty, zapobiega błędowi SQL
                        } else {
                            // Zamiana na liczby całkowite i tworzenie stringa SQL
                            $productIds = array_map('intval', $productIds);
                            $cartString = "'" . implode("','", $productIds) . "'";
                        }
                        $sql = "SELECT products.id, name, description, img, products.sell_price_brutto, sku, 
                        count(product_doms.id) as 'quantity', products.status_id
                        FROM products 
                        LEFT JOIN product_doms ON product_doms.product_id = products.id AND product_doms.status_id = 2
                        WHERE products.id IN ($cartString) 
                        GROUP BY products.id
                        ORDER BY FIELD(products.id, $cartString) DESC;";
                            $result = $conn->query($sql);
                            $price = 0;
                            $products = 0;
                            $products_2 = 0;
                            if ($result->num_rows > 0) {
                               
                                while($row = $result->fetch_assoc()) {
                                    $products_2++;
                                    $products = $products + 1* $productQuantities[$row['id']];
                                    $cartQuantity = isset($productQuantities[$row['id']]) ? $productQuantities[$row['id']] : 1;
                                    $price += $row['sell_price_brutto']* $cartQuantity;
                                    echo '<li class="flex space-x-6 py-6">
                                    <img src="img/products_images/'.$row['img'].'" alt="Model wearing men&#039;s charcoal basic tee in large." class="h-24 w-24 flex-none rounded-md bg-gray-100 object-cover object-center">
                                    <div class="flex-auto space-y-1">
                                      <h3 class="text-gray-900">
                                        <a href="#">'.$row['name'].'</a>
                                      </h3>
                                      <p class="font-normal">'.$row['description'].'</p>
                                      <p class="uppercase">'.$row['sku'].'</p>
                                    </div>
                                    <p class="flex-none font-medium text-gray-900 flex flex-col items-end">'.str_replace(".", ",", $row['sell_price_brutto']).' PLN
                                    <span>'.$productQuantities[$row['id']].' szt.</span>
                                    </p>
                                    
                                    </li>';
                                }
                                echo '<p class="text-center font-normal text-sm text-gray-400 py-1">Liczba produktów w koszyku: '.$products_2.' ('.$products.' szt.)</p>';
                                
                            }
                            $vat = $price*0.23;
                            $price_netto = $price-$vat;

        ?>
        </ul>
        <dl class="space-y-6 border-t border-gray-200 pt-6 text-sm font-medium text-gray-500">
          <div class="flex justify-between">
            <dt>Kwota netto</dt>
            <dd class="text-gray-900"><?=number_format($price_netto, 2, ',', '')?> PLN</dd>
          </div>

          <div class="flex justify-between">
            <dt>Dostawa</dt>
            <dd class="text-gray-900">--</dd>
          </div>

          <div class="flex justify-between">
            <dt>Podatek Vat</dt>
            <dd class="text-gray-900"><?=number_format($vat, 2, ',', '')?> PLN</dd>
          </div>

          <div class="flex items-center justify-between border-t border-gray-200 pt-6 text-gray-900">
            <dt class="text-base">Suma brutto</dt>
            <dd class="text-base"><?=str_replace(".", ",", $price)?> PLN</dd>
          </div>
        </dl>
        tutaj takie ładne faktura img nazwa border t i b 
        poniżej przyciski do tworzenia arachunków i faktur
      </div>
      <div id="time_line_body">
        <ul role="list" class="space-y-6 mt-16">
            <?php
            $id = $_GET['id'];
            $type = 'orders';
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
                            <div class="flex-auto rounded-xl p-3 ring-1 ring-inset ring-gray-200">
                                <div class="flex justify-between gap-x-4">
                                    <div class="py-0.5 text-xs leading-5 text-gray-500"><span class="font-medium text-gray-900">'. $row['user'] .'</span> skomentował</div>
                                    <time datetime="2023-01-23T15:56" class="flex-none py-0.5 text-xs leading-5 text-gray-500 flex gap-1 items-center">
                                    <span class="hover:text-violet-600 duration-150 hover:scale-110 active:scale-95 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                    </span>
                                     <span>'. $date .'</span></time>
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
    </div>
  </div>
</main>