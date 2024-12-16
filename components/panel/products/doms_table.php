<div data-aos="fade-in" data-aos-delay="50" class="divide-y divide-gray-200">
<?php
            
            if(isset($_GET['arg'])){
                $arg = $arg = $_GET['arg'];
            }else{
                $arg = "";
            }
            include "../../../scripts/conn_db.php";
            if($arg != ""){
                $sql = "SELECT products.id, products.name, products.sku, products.img, products.source, product_categories.category, products.description, products.sell_price_brutto, products.status_id, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.category_id LEFT JOIN product_doms on product_doms.product_id=products.id LEFT JOIN product_status on product_status.id=products.status_id WHERE products.name like'%$arg%' or products.sku like'%$arg%' or product_status.status like'%$arg%' group by products.id order by id desc;";
            }else{
            $sql = "select product_doms.id, product_doms.dom_code, product_doms.bought_price_brutto, product_categories.category, product_doms.sell_date, product_doms.status_id, products.name, products.img, products.sell_price_brutto, dom_status.name as 'status' from product_doms left join products on products.id=product_doms.product_id left JOIN dom_status on dom_status.id=product_doms.status_id left JOIN product_categories on product_categories.id=products.category_id;";
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    
                    if($row['sell_price_brutto'] == 0){
                        $price_brutto = '<span class="text-gray-400">Brak ceny</span>';
                        $price_netto = '<span class="text-gray-400">Brak ceny</span>';
                    }else{
                        $row['sell_price_brutto'] = round($row['sell_price_brutto'], 2);
                        $price_brutto = round($row['sell_price_brutto'], 2);
                        $price_netto = round($row['sell_price_brutto'] - (0.23*$row['sell_price_brutto']), 2);
                    }
                    echo '
                    <div onclick="openPopupDoms('.$row['id'].')" class="grid grid-cols-8 text-sm text-gray-600 font-[poppins] rounded-2xl hover:bg-gray-200 cursor-pointer active:scale-95 duration-150">
                        <div class="col-span-2 font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center gap-4">
                            <img src="img/products_images/'.$row['img'].'" alt="" class="size-10 rounded-xl border border-gray-300 object-cover">
                            <span>'. $row['name'] .'</span>
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center uppercase">
                            '. $row['dom_code'] .'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center text-gray-600">
                            '. $row['category'] .'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                            '. number_format(round($row['bought_price_brutto'],2),2,',','') .' PLN
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                            '. number_format($price_netto,2,',','') .' PLN
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                            '. number_format($price_brutto,2,',','') .' PLN
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center ';
                        if($row['status'] == 'W magazynie'){
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
            }else{
                echo '<span class="text-xs text-gray-600 text-center w-full flex items-center justify-center py-12">Brak wyników dla "' .$arg. '"</span>';
            }
            ?>
</div>
<?php 
$name_in_scripts = 'Doms';
$delete_path = 'scripts/products/delete.php';
$path = 'components/panel/products/edit.php';
$close= 'true';
include "../../popup.php";
?>