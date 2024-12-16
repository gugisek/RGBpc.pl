<div data-aos="fade-in" data-aos-delay="100">
    <table>
        <div class="grid grid-cols-4 text-sm shadow-xl text-gray-800 font-[poppins] rounded-2xl active:scale-95 duration-150">
                        <div class=" font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center">
                            Numer seryjny
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center">
                            Data zakupu
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                            Cena zakupu brutto
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 text-center">
                            Źródło
                        </div>

        </div>
        
        <?php
        $id = $_GET['id'];
        include '../../../../scripts/conn_db.php';
        $sql = "select product_doms.id, product_doms.dom_code, product_doms.bought_price_brutto, product_doms.bought_date, product_doms.bought_source_id from product_doms where product_doms.product_id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    $short_date = substr($row['bought_date'], 0, 10);
                    echo '
                    <div onclick="openPopupDoms('.$row['id'].')" class="grid grid-cols-4 text-sm text-gray-600 font-[poppins] rounded-2xl hover:bg-gray-200 cursor-pointer active:scale-95 duration-150">
                        <div class=" font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center gap-4">
                            <span>'. $row['dom_code'] .'</span>
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center uppercase">
                            '. $short_date .'
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 flex items-center justify-center">
                            '. number_format(round($row['bought_price_brutto'],2),2,',','') .' PLN
                        </div>
                        <div class="font-medium py-5 pl-4 pr-3 sm:pl-6 text-center">
                            '. $row['bought_source_id'] .'
                        </div>

                    </div>
                    ';
                }
            }else{
                echo '<span class="text-xs text-gray-600 text-center w-full flex items-center justify-center py-12">Brak w magazynie</span>';
            }
        ?>
    </table>
</div>