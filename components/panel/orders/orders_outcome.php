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
                $sql = "SELECT orders.id, orders.type_id, orders.order_number, orders.client, orders.client_addres, orders.client_addres_details, orders.create_date, orders.last_update, orders_status.description_short, orders.platform_id, orders.og_invoice_file, orders.og_invoice_print_date, shippings.name as 'shipping', orders.shipping_number FROM `orders` join orders_status on orders_status.id=orders.status_id JOIN shippings on shippings.id=orders.shipping_method;";
            }else{
            $sql = "SELECT orders.id, orders.priority, orders.type_id, orders.order_number, orders.client_city, orders.client_post_number, orders.client_phone_number, orders.client_email, orders.client, orders.client_addres, orders.client_addres_details, orders.products_count, orders.products_value, orders.create_date, orders.last_update, orders.status_id, orders_status.description_short, orders.platform_id, platforms.img, orders.og_invoice_file, orders.og_invoice_print_date, shippings.name as 'shipping', orders.shipping_number FROM `orders` join platforms on platforms.id=orders.platform_id join orders_status on orders_status.id=orders.status_id JOIN shippings on shippings.id=orders.shipping_method order by create_date desc;";
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    //zmiana create date na day:month:year hour:minute
                    $row['create_date'] = date("d-m-Y H:i", strtotime($row['create_date']));

                    //zmiana last update na day:month:year hour:minute
                    $row['last_update'] = date("d-m-Y H:i", strtotime($row['last_update']));

                    echo '
                    <div onclick="openPanelSite(`order_details`,`id=' . $row['id'] . '`)" class="';

                    if($row['priority'] == 1){
                        echo '!border-red-400 !border';
                    }

                    echo ' grid grid-cols-7 text-sm text-gray-600 font-[poppins] rounded-2xl hover:bg-gray-200 cursor-pointer active:scale-95 transition-all duration-150">
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center gap-4">
                            <img src="img/icons/platforms/'. $row['img'] .'" alt="" class="size-10 rounded-xl border border-gray-300 object-cover">
                            <span>'. $row['order_number'] .'</span>
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center">
                            '. $row['client'] .'
                        </div>
                        <div class="col-span-2 font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center">
                            '.$row['client_city'].' '.$row['client_post_number'].' ul. '. $row['client_addres'] .' <br/>'.$row['client_email'].' '.$row['client_phone_number'].'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center">
                            ('. $row['products_count'] .') '. $row['products_value'] .' PLN
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center">
                            '. $row['create_date'] .'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex flex-col items-center">
                            <span>'. $row['description_short'] .'</span>
                            <span class="text-xs text-gray-400"> '. $row['last_update'] .'</span> 
                        </div>
                    </div>
                    ';
                }
            }else{
                echo '<span class="text-xs text-gray-600 text-center w-full flex items-center justify-center py-12">Brak wyników dla "' .$arg. '"</span>';
            }
            ?>
</div>