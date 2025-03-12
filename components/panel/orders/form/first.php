<div data-aos="fade-up" data-aos-delay="100" class="max-w-[25vw] min-w-[20vw]">
    <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-2">
            <label for="platform" class="text-xs text-gray-600">Platforma</label>
            <select placeholder="" name="platform" id="platform" class='cursor-pointer font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent' required>
                <option value="" class="hidden">Wybierz platformę</option>
                <?php
                include '../../../../scripts/conn_db.php';

                $sql = "SELECT right(order_number,4)+1 FROM orders ORDER by right(order_number,4)+1 DESC limit 1;";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    $order = mysqli_fetch_assoc($result);
                }

                $sql = "SELECT id, name FROM platforms";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                }
                ?>
            </select>
        </div>
        
        <div class="flex flex-row items-center gap-2 px-4">
            <div class="flex items-center" onclick="selectRGBPC()">
                <input type="radio" placeholder="" value="out" name="type" id="out" class="rounded-2xl border border-black/60 focus:border-violet-600 ring-0 outline-none duration-150" required>
                <label for="out" class="text-sm text-gray-600 px-4 cursor-pointer hover:text-violet-600 duration-150">Wychodzące (sprzedaż)</label>
            </div>
            <div class="flex items-center" onclick="selectIN()">
                <input type="radio" placeholder="" value="in" name="type" id="in" class="rounded-2xl border border-black/60 focus:border-violet-600 ring-0 outline-none duration-150" required>
                <label for="in" class="text-sm text-gray-600 px-4 cursor-pointer hover:text-violet-600 duration-150">Przychodzące (kupno)</label>
            </div>
        </div>
        <label for="name" class="text-xs text-gray-600">Sprzedawca</label>
            <select placeholder="" name="seller" id="seller" class='font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent cursor-pointer' required>
                <option value="" class="hidden">Wybierz sprzedawcę</option>
                <?php
                include '../../../../scripts/conn_db.php';
                $sql = "SELECT id, name, desc_short FROM sellers";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<option value="'.$row['id'].'">'.$row['name'].' - '.$row['desc_short'].'</option>';
                    }
                }
                ?>
                <option value="other" class="">Inny</option>
            </select>
            <div class='flex flex-col gap-2'>
                <label for='order_number' class='text-xs text-gray-500'>Numer zamówienia</label>
                <input disabled type='order_number' name='order_number' value="ON-<?=$order['right(order_number,4)+1']?>" id='order_number' class='font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
            </div>
            <div class='flex flex-col gap-2'>
                <label for='external_number' class='text-xs text-gray-500'>Zewnętrzny numer zamówienia</label>
                <input type='external_number' name='external_number' id='external_number' class='font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
            </div>
    </div>
    <button onclick="checkFirst()" class="mt-4 bg-violet-500 border-2 border-violet-500 text-white w-full py-2 font-medium rounded-2xl hover:shadow-xl hover:scale-105 active:scale-95 duration-150">Dalej</button>
    <!-- <button class="border-2 border-black/60 text-gray-600 hover:bg-black/60 hover:border-black/0 hover:text-white w-full py-2 font-medium rounded-2xl hover:shadow-xl hover:scale-105 active:scale-95 duration-150">Wróć</button> -->
</div>

<script>
    //let data2 = JSON.parse(localStorage.getItem("OrdersFirst"));
    data = JSON.parse(localStorage.getItem("OrderFirst"));

    if (data != null){
        document.getElementById('platform').value = data[0];
        document.getElementById(data[1]).checked = true;
        document.getElementById('seller').value = data[2];
        document.getElementById('order_number').value = data[3];
        document.getElementById('external_number').value = data[4];

        changeOrderNumber(data[3], " / " + data[4]);
    }

    function selectRGBPC() {
        select = document.getElementById('seller');
        select.value=1;
        //zmiana liter ON w numerze zamówienia na OU
        document.getElementById('order_number').value = "OU-<?=$order['right(order_number,4)+1']?>";
    }

    function selectIN() {
        document.getElementById('order_number').value = "OI-<?=$order['right(order_number,4)+1']?>";
    }

    function checkFirst() {
        platform = document.getElementById('platform').value;
        if (document.querySelector('input[name="type"]:checked')){
            type = document.querySelector('input[name="type"]:checked').value;
        }else{
            type="";
        }
        seller = document.getElementById('seller').value;
        if(platform !="" && type !="" && seller !=""){
            //ustawienie localstorage dla supOrder json first na ok
            // Pobranie obecnych danych z localStorage
            let supOrder = JSON.parse(localStorage.getItem("supOrder"));

            // Zmiana konkretnej wartości
            supOrder.first = "ok";

            // Zapisanie zaktualizowanego obiektu z powrotem do localStorage
            localStorage.setItem("supOrder", JSON.stringify(supOrder));

            saveFirst();
            supCheck('first');
            changeOrderNumber(document.getElementById('order_number').value, " / " + document.getElementById('external_number').value);
            openOrderAddSite('second')
        }else{
            let supOrder = JSON.parse(localStorage.getItem("supOrder"));

            // Zmiana konkretnej wartości
            supOrder.first = "warning";

            // Zapisanie zaktualizowanego obiektu z powrotem do localStorage
            localStorage.setItem("supOrder", JSON.stringify(supOrder));

            supCheck('first');
            showAlert('warning', 'Brakuje wszystkich danych!');
        }
    }
    function saveFirst() {
        platform = document.getElementById('platform').value;
        type = document.querySelector('input[name="type"]:checked').value;
        seller = document.getElementById('seller').value;
        order_number = document.getElementById('order_number').value;
        external_number = document.getElementById('external_number').value;

        data = [platform, type, seller, order_number, external_number];
        localStorage.setItem("OrderFirst", JSON.stringify(data));

    }
</script>