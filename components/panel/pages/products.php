<section data-aos="fade-up" data-aos-delay="100">
    
        <div class="flex itesm-center justify-between">
            <h1 class="font-medium text-2xl">Produkty</h1>
            <div class="flex items-center gap-2">
               <div onclick="openPopupUsersAdd()"  class="hover:text-white hover:bg-violet-500 hover:shadow-xl shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 cursor-pointer">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                   </svg>
               </div>
            <div class="mx-auto max-w-xl transform overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-black ring-opacity-5 transition-all">
                    <div class="relative">
                        <svg class="pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                        <input type="text" class="h-12 w-full border-0 rounded-xl bg-transparent outline-violet-500 pl-11 pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm" placeholder="Wyszukaj..." role="combobox" aria-expanded="false" aria-controls="options">
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
        <div id="table_body" class="divide-y divide-gray-200">
            <?php
            include "../../../scripts/conn_db.php";
            $sql = "SELECT products.id, products.name, products.sku, products.img, products.source, product_categories.category, products.description, products.sell_price_brutto, products.status_id, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.id LEFT JOIN product_doms on product_doms.product_id=products.id LEFT JOIN product_status on product_status.id=products.status_id group by products.id order by sku desc;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div onclick="openPopupProducts('.$row['id'].')" class="grid grid-cols-8 text-sm text-gray-600 font-[poppins] rounded-2xl hover:bg-gray-200 cursor-pointer active:scale-95 duration-150">
                        <div class="col-span-2 font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center gap-4">
                            <img src="img/products_images/'.$row['img'].'" alt="" class="size-10 rounded-xl border border-gray-300">
                            <span>'. $row['name'] .'</span>
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center uppercase">
                            '. $row['sku'] .'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center text-gray-400">
                            '. $row['category'] .'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                            '. $row['quantity'] .'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                            '. round($row['sell_price_brutto'] - (0.23*$row['sell_price_brutto']), 2) .' PLN
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                            '. $row['sell_price_brutto'] .' PLN
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center capitalize ';
                        if($row['status'] == 'dostępne'){
                            echo 'text-green-500';
                        }elseif($row['status'] == 'niedostępne'){
                            echo 'text-red-600';
                        }elseif($row['status'] == 'brak'){
                            echo 'text-orange-600';
                        }elseif($row['status'] == 'wycofane'){
                            echo 'text-gray-600';
                        }
                        
                        echo '">
                            '. $row['status'] .'
                        </div>
                    </div>
                    ';
                }
            }
            ?>               
        </div>
    </section>
</section>

<?php 
$name_in_scripts = 'Products';
$delete_path = 'scripts/products/delete.php';
$path = 'components/panel/products/edit.php';
$close= 'true';
include "../../popup.php";
?>
<?php 
$name_in_scripts = 'UsersAdd';
$delete_path = '';
$path = 'components/panel/users/users_add.php';
include "../../popup.php";
?>