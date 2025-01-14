<div data-aos="fade-in" data-aos-delay="50" class="divide-y divide-gray-200">
<?php
            include "../../../scripts/conn_db.php";
            $sql_settings = "select name, value from settings where name='quantity_warn_red' or name='quantity_warn_yellow'";
            $result_settings = $conn->query($sql_settings);
            while ($row_settings = $result_settings->fetch_assoc()) {
                if($row_settings['name'] == 'quantity_warn_red'){
                    $quantity_warn_red = $row_settings['value'];
                }elseif($row_settings['name'] == 'quantity_warn_yellow'){
                    $quantity_warn_yellow = $row_settings['value'];
                }
            }
            if(isset($_GET['arg'])){
                $arg = $arg = $_GET['arg'];
            }else{
                $arg = "";
            }
            if($arg != ""){
                $sql = "SELECT products.id, products.name, products.sku, products.img, products.source, product_categories.category, products.description, products.sell_price_brutto, products.status_id, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.category_id LEFT JOIN product_doms on product_doms.product_id=products.id LEFT JOIN product_status on product_status.id=products.status_id WHERE products.name like'%$arg%' or products.sku like'%$arg%' or product_status.status like'%$arg%' group by products.id order by id desc;";
            }else{
            $sql = "SELECT products.id, products.name, products.sku, products.img, products.source, product_categories.category, products.description, products.sell_price_brutto, products.status_id, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.category_id LEFT JOIN product_doms on product_doms.product_id=products.id and product_doms.status_id = 2 LEFT JOIN product_status on product_status.id=products.status_id group by products.id order by id desc;";
            }
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
                    <div onclick="openPopupProducts('.$row['id'].')" class="grid grid-cols-8 text-sm text-gray-600 font-[poppins] rounded-2xl hover:bg-gray-200 cursor-pointer active:scale-95 transition-all duration-150">
                        <div class="col-span-2 font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center gap-4">
                            <img src="img/products_images/'.$row['img'].'" alt="" class="size-10 rounded-xl border border-gray-300 object-cover">
                            <span>'. $row['name'] .'</span>
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center uppercase">
                            '. $row['sku'] .'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center text-gray-600">
                            '. $row['category'] .'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">';
                            if($row['quantity'] <= $quantity_warn_red and $row['quantity'] != 0){
                                echo '<span class="text-red-600">'. $row['quantity'] .'</span>';
                            }elseif($row['quantity'] <= $quantity_warn_yellow and $row['quantity'] !=0){
                                echo '<span class="text-yellow-600">'. $row['quantity'] .'</span>';
                            }elseif($row['quantity'] == 0 and $row['status_id']==1){
                                echo '<span class="text-yellow-600">☠️ 0</span>';
                            }elseif($row['quantity'] > $quantity_warn_yellow){
                                echo '<span class="text-green-600">'.$row['quantity'].'</span>';
                            }else{
                                echo $row['quantity'];
                            }
                        echo '</div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                            '. $price_netto .'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                            '. $price_brutto .'
                        </div>
                        <div id="status_'.$row['id'].'" class="flex items-center">
                            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center ';
                            if($row['status'] == 'Dostępne' and $row['quantity'] > 0){
                                echo 'text-green-500';
                            }elseif($row['status'] == 'Niedostępne'){
                                echo 'text-red-600';
                            }elseif($row['status'] == 'Brak'){
                                echo 'text-orange-600';
                            }elseif($row['status'] == 'Wycofane'){
                                echo 'text-gray-600';
                            }elseif($row['status'] == 'Szkic'){
                                echo 'text-violet-600';
                            }

                            if($row['status'] == 'Dostępne' and $row['quantity'] == 0){
                                echo 'text-yellow-600';
                                $row['status'] = 'Brak w magazynie';
                            }
                            echo '">
                                '. $row['status'] .'
                            </div>
                        </div>
                    </div>
                    ';
                }
            }else{
                echo '<span class="text-xs text-gray-600 text-center w-full flex items-center justify-center py-12">Brak wyników dla "' .$arg. '"</span>';
            }
            ?>
</div>