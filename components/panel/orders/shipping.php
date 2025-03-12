        <?php
        $platform_id = $_GET['platform'];
        include '../../../scripts/conn_db.php';
        $sql = "SELECT * FROM shippings WHERE platform_id = '$platform_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<label onclick="';
                if($row['additonal_box_machine_number'] == 1){
                    echo 'showBoxMachineNumber()';
                }else{
                    echo 'hideBoxMachineNumber()';
                }
                echo'" class="active:scale-95 hover:scale-105 duration-150 option relative block cursor-pointer rounded-lg border bg-white px-6 py-4 shadow-sm focus:outline-none sm:flex sm:justify-between">
                <input id="shipping_'.$row['id'].'" type="radio" name="shipping" value="'.$row['id'].'" class="sr-only">
                <span class="flex items-center ">
                <img src="img/icons/delivery/'.$row['img'].'" alt="" class="size-16 p-1 rounded-xl border border-black/10 object-contain mr-4">
                    <span class="flex flex-col text-sm">
                    <span class="font-medium text-gray-900">'.$row['name'].'</span>
                    <span class="text-gray-500">'.$row['desc_short'].'</span>
                    </span>
                </span>
                <span class="mt-2 flex text-sm sm:ml-4 sm:mt-0 sm:flex-col sm:text-right">
                    <span class="font-medium text-gray-900">'.str_replace(".", ",", $row['price_brutto']).' PLN</span>
                    <span class="ml-1 text-gray-500 sm:ml-0">brutto</span>
                </span>
                <span class="indicator pointer-events-none absolute -inset-px rounded-lg border-2 border-transparent" aria-hidden="true"></span>
            </label>';
            }
        }else{
                echo '<span class="text-sm px-6 text-gray-500">Brak dostaw dla tej platformy, wróć do punktu pierwszego.</span>';
            }
        
        ?>
        <div id="box_machine_number_outer" class="hidden flex flex-col gap-2 mt-2">
                <label for="box_machine_number" class="text-xs text-gray-500">Numer paczkomatu</label>
                <input type="text" name="box_machine_number" id="box_machine_number" class="font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent cursor-pointer" required>
        </div>
        <script>
            document.querySelectorAll('.option').forEach(label => {
                label.addEventListener('click', () => {
                document.querySelectorAll('.option').forEach(el => {
                    el.classList.remove('border-indigo-600', 'ring-0', 'ring-violet-600');
                    el.querySelector('.indicator').classList.remove('border-violet-600');
                });
                label.classList.add('border-indigo-600', 'ring-0', 'ring-violet-600');
                label.querySelector('.indicator').classList.add('border-violet-600');
                label.querySelector('input').checked = true;
                });
            });

            document.querySelectorAll('.option_2').forEach(label => {
                label.addEventListener('click', () => {
                document.querySelectorAll('.option_2').forEach(el => {
                    el.classList.remove('border-indigo-600', 'ring-0', 'ring-violet-600');
                    el.querySelector('.indicator_2').classList.remove('border-violet-600');
                });
                label.classList.add('border-indigo-600', 'ring-0', 'ring-violet-600');
                label.querySelector('.indicator_2').classList.add('border-violet-600');
                label.querySelector('input').checked = true;
                });
            });

            dataFourth = JSON.parse(localStorage.getItem("OrderFourth"));

            if(dataFourth[1] != null && dataFourth[1] != ""){
                document.getElementById('box_machine_number').value = dataFourth[1];
                showBoxMachineNumber();
            }

            console.log(dataFourth[0]);
            if (dataFourth != null){
                console.log('shipping_'+dataFourth[0]);
                document.getElementById('shipping_'+dataFourth[0]).checked = true;
                //USTAWIENIE ZAZNACZENIA
                document.getElementById('shipping_'+dataFourth[0]).parentElement.classList.add('border-indigo-600', 'ring-0', 'ring-violet-600');
                document.getElementById('shipping_'+dataFourth[0]).parentElement.querySelector('.indicator').classList.add('border-violet-600');
                
            }
        </script>