    <dt class="font-medium text-gray-900">Dostawa</dt>
    <dd class="-ml-4 -mt-1 flex flex-wrap">
        <?php
        $delivery = $_GET['delivery_id'];
        $box_machine_number = $_GET['box_machine_number'];
        include '../../../scripts/conn_db.php';
        $sql = "SELECT * FROM `shippings` where id = $delivery";
        $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="ml-4 mt-4 flex-shrink-0">
                                <img class="size-9 border border-black/10 rounded-lg object-contain" src="img/icons/delivery/'.$row['img'].'">
                                <p class="sr-only">'.$row['name'].'</p>
                            </div>
                            <div class="ml-4 mt-4">
                                <p class="text-gray-900">'.$row['name'].'</p>
                                <p class="text-gray-600">';
                                if ($row['additonal_box_machine_number'] == 1){
                                    echo $box_machine_number;
                                }
                                echo '</p>
                            </div>
                        ';
                    }
                }else{
                    echo 'Błąd dostawy';
                }
        ?>
    </dd>
    <dt class="font-medium text-gray-900 mt-2">Płatność</dt>
    <dd class="-ml-4 -mt-1 flex flex-wrap">
    <?php
        $paynament = $_GET['paynament_id'];
        include '../../../scripts/conn_db.php';
        $sql = "SELECT * FROM `paynament` where id = $paynament";
        $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="ml-4 mt-4 flex-shrink-0">
                                <img class="size-9 border border-black/10 rounded-lg object-contain" src="img/icons/'.$row['img'].'">
                                <p class="sr-only">'.$row['name'].'</p>
                            </div>
                            <div class="ml-4 mt-4">
                                <p class="text-gray-900">'.$row['name'].'</p>
                                <p class="text-gray-600">'.$row['desc_short'].'</p>
                            </div>
                        ';
                    }
                }else{
                    echo 'Błąd metody płatności';
                }
        ?>         
    </dd>
