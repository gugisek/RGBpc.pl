<div data-aos="fade-up" data-aos-delay="100" class="max-w-[25vw] min-w-[20vw] flex flex-col gap-2">
    <div class="flex flex-col gap-4">
        <div class='flex flex-col gap-2'>
            <label for='name' class='text-xs text-gray-500'>Imię i nazwisko</label>
            <input required type='text' name='name' id='name' class='font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='phone' class='text-xs text-gray-500'>Numer telefonu</label>
            <input required type='text' name='phone' id='phone' class='font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='email' class='text-xs text-gray-500'>Email</label>
            <input required type='email' name='email' id='email' class='font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>

        <div class='flex flex-col gap-2'>
            <label for='addres' class='text-xs text-gray-500'>Adres zamieszkania</label>
            <input required type='text' name='addres' id='addres' class='font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
        <div class='flex flex-row items-center gap-4'>
            <div class='flex flex-col gap-2 w-2/3'>
                <label for='city' class='text-xs text-gray-500'>Miasto</label>
                <input required type='text' name='city' id='city' class='font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
            </div>
            <div class='flex flex-col gap-2 w-1/3'>
                <label for='post_code' class='text-xs text-gray-500'>Kod pocztowy</label>
                <input required type='text' name='post_code' id='post_code' 
                        pattern="\d{2}-\d{3}" 
                        title="Kod pocztowy w formacie xx-xxx" 
                        maxlength="6"
                        oninput="formatPostalCode(this)" 
                        placeholder="00-000"
                        class='font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>

                <script>
                function formatPostalCode(input) {
                    let value = input.value.replace(/\D/g, ''); // Usuwa wszystko poza cyframi
                    if (value.length > 2) {
                        value = value.slice(0, 2) + '-' + value.slice(2, 5); // Dodaje myślnik
                    }
                    input.value = value;
                }
                </script>

            </div>

        </div>
        <div id="checkbox" class="flex flex-row items-center gap-2 px-4 rounded-xl">
            <div class="flex items-center" onclick="personal()">
                <input type="radio" placeholder="" value="personal" name="type_client" id="personal" class="rounded-2xl border border-black/60 focus:border-violet-600 ring-0 outline-none duration-150" required>
                <label for="personal" class="text-sm text-gray-600 px-4 cursor-pointer hover:text-violet-600 duration-150">Osoba prywatna</label>
            </div>
            <div class="flex items-center" onclick="company()">
                <input type="radio" placeholder="" value="company" name="type_client" id="company" class="rounded-2xl border border-black/60 focus:border-violet-600 ring-0 outline-none duration-150" required>
                <label for="company" class="text-sm text-gray-600 px-4 cursor-pointer hover:text-violet-600 duration-150">Firma</label>
            </div>
        </div>
        <div id="nip_outer" class='hidden flex flex-col gap-2'>
            <label for='nip' class='text-xs text-gray-500'>Numer NIP</label>
            <input required type='text' name='nip' id='nip' value="" class='font-medium w-full py-2 px-4 rounded-xl shadow-md text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
        </div>
    </div>
    <button onclick="checkSecond()" class="mt-4 bg-violet-500 border-2 border-violet-500 text-white w-full py-2 font-medium rounded-2xl hover:shadow-xl hover:scale-105 active:scale-95 duration-150">Dalej</button>
    <button onclick="openOrderAddSite('first')" class="border-2 border-black/60 text-gray-600 hover:bg-black/60 hover:border-black/0 hover:text-white w-full py-2 font-medium rounded-2xl hover:shadow-xl hover:scale-105 active:scale-95 duration-150">Wróć</button>
</div>

<script>

    dataSecond = JSON.parse(localStorage.getItem("OrderSecond"));
    
    if (dataSecond != null){
        document.getElementById('name').value = dataSecond[0];
        document.getElementById('phone').value = dataSecond[1];
        document.getElementById('email').value = dataSecond[2];
        document.getElementById('addres').value = dataSecond[3];
        document.getElementById('city').value = dataSecond[6];
        document.getElementById('post_code').value = dataSecond[7];
        document.getElementById(dataSecond[4]).checked = true;

        if(dataSecond[4] == 'company'){
            document.getElementById('nip_outer').classList.remove('hidden');
            document.getElementById('nip').value = dataSecond[5];
        }
    }

    function company() {
        document.getElementById('nip_outer').classList.remove('hidden');
    }

    function personal() {
        document.getElementById('nip_outer').classList.add('hidden');
    }

    function checkSecond() {
        name = document.getElementById('name').value;
        phone = document.getElementById('phone').value;
        email = document.getElementById('email').value;
        addres = document.getElementById('addres').value;
        city = document.getElementById('city').value;
        post_code = document.getElementById('post_code').value;

        if (document.querySelector('input[name="type_client"]:checked')){
            type = document.querySelector('input[name="type_client"]:checked').value;
        }else{
            type="";
        }
        if(name != "" && phone != "" && email != "" && addres != "" && type != "" && city != "" && post_code != ""){
            let supOrder = JSON.parse(localStorage.getItem("supOrder"));

            // Zmiana konkretnej wartości
            supOrder.second = "ok";

            // Zapisanie zaktualizowanego obiektu z powrotem do localStorage
            localStorage.setItem("supOrder", JSON.stringify(supOrder));

            supCheck('second');
            saveSecond()
            openOrderAddSite('third')
        }else{

            <?php
            $data = ["name", "phone", "email", "addres", "city", "post_code"];
            for ($i = 0; $i < count($data); $i++) {
                echo "if({$data[$i]} == ''){";
                echo "document.getElementById('{$data[$i]}').classList.add('ring-red-300', 'ring-1');";
                echo "document.getElementById('{$data[$i]}').placeholder = 'Wymagane';";
                echo "}else{
                        document.getElementById('{$data[$i]}').classList.remove('ring-red-300', 'ring-1')
                    }";
            }
            ?>

            if(type == ''){
                document.getElementById('checkbox').classList.add('ring-red-300', 'ring-1');
            }else{
                document.getElementById('checkbox').classList.remove('ring-red-300', 'ring-1');
            }
            let supOrder = JSON.parse(localStorage.getItem("supOrder"));

            // Zmiana konkretnej wartości
            supOrder.second = "warning";

            // Zapisanie zaktualizowanego obiektu z powrotem do localStorage
            localStorage.setItem("supOrder", JSON.stringify(supOrder));

            supCheck('second');
            showAlert('warning', 'Brakuje wszystkich danych!');
        }
    }

    function saveSecond() {
        name = document.getElementById('name').value;
        phone = document.getElementById('phone').value;
        email = document.getElementById('email').value;
        addres = document.getElementById('addres').value;
        type = document.querySelector('input[name="type_client"]:checked').value;
        nip = document.getElementById('nip').value;
        city = document.getElementById('city').value;
        post_code = document.getElementById('post_code').value;

        data = [name, phone, email, addres, type, nip, city, post_code];
        localStorage.setItem("OrderSecond", JSON.stringify(data));

    }

    <?php
    include '../../../../scripts/conn_db.php';
    $sql = "select * from sellers where id = 1;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $conn->close();
    ?>

    dataFirst = JSON.parse(localStorage.getItem("OrderFirst"));
    if (dataFirst[1] == "in"){
        console.log('es');
        document.getElementById('name').value = '<?=$row['name']?>';
        document.getElementById('phone').value = '<?=$row['phone_number']?>';
        document.getElementById('email').value = '<?=$row['email']?>';
        document.getElementById('addres').value = '<?=$row['street']?>';
        document.getElementById('company').checked = true;
        document.getElementById('nip_outer').classList.remove('hidden');
        document.getElementById('nip').value = '<?=$row['nip']?>';
        document.getElementById('city').value = '<?=$row['city']?>';
        document.getElementById('post_code').value = '<?=$row['post_code']?>';
    }
</script>