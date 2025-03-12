<div data-aos="fade-up" data-aos-delay="100" class="max-w-[25vw] min-w-[20vw]">
    <fieldset>
    <legend class="sr-only">Server size</legend>
    <!-- <h1 class="font-semibold text-xl text-gray-600 mb-2 pb-2 border-b border-black/50">Dostawa</h1> -->
    <div id="statusLoading" class='hidden fixed z-[30] bg-black/40 p-2 rounded-3xl scale-50 flex items-center justify-center'><div class='lds-dual-ring'></div></div>

    <div id="shipping_body" class="space-y-4">
        

        
        
    </div>
    <h1 class="font-semibold text-xl text-gray-600 mb-6 mt-4 pb-2 border-b border-black/50"></h1>
    <div id="paynament_body" class="space-y-4">
        <?php
        include '../../../../scripts/conn_db.php';
        $sql = "SELECT * FROM `paynament`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '
                    <label class="active:scale-95 hover:scale-105 duration-150 option_2 relative block cursor-pointer rounded-lg border bg-white px-6 py-4 shadow-sm focus:outline-none sm:flex sm:justify-between">
                <input id="paynament_'.$row['id'].'" type="radio" name="paynament" value="'.$row['id'].'" class="sr-only">
                <span class="flex items-center ">
                <img src="img/icons/'.$row['img'].'" alt="" class="size-16 p-1 rounded-xl border border-black/10 object-contain mr-4">
                    <span class="flex flex-col text-sm">
                    <span class="font-medium text-gray-900">'.$row['name'].'</span>
                    <span class="text-gray-500">'.$row['desc_short'].'</span>
                    </span>
                </span>
                <span class="mt-2 flex text-sm sm:ml-4 sm:mt-0 sm:flex-col sm:text-right">
                    
                </span>
                <span class="indicator_2 pointer-events-none absolute -inset-px rounded-lg border-2 border-transparent" aria-hidden="true"></span>
            </label>
                ';
            }
        }else{
            echo '<span class="text-sm px-6 text-gray-500">Brak dostępnych metod płatności, skontaktuj się z administratorem.</span>';
        }
        ?>
    </div>
    </fieldset>

    <button onclick="checkFourth()" class="mb-2 mt-4 bg-violet-500 border-2 border-violet-500 text-white w-full py-2 font-medium rounded-2xl hover:shadow-xl hover:scale-105 active:scale-95 duration-150">Dalej</button>
    <button onclick="openOrderAddSite('third')" class="border-2 border-black/60 text-gray-600 hover:bg-black/60 hover:border-black/0 hover:text-white w-full py-2 font-medium rounded-2xl hover:shadow-xl hover:scale-105 active:scale-95 duration-150">Wróć</button>
</div>

<script>

    function showBoxMachineNumber() {
        document.getElementById('box_machine_number_outer').classList.remove('hidden');
    }

    function hideBoxMachineNumber() {
        document.getElementById('box_machine_number_outer').classList.add('hidden');
    }

    shippingShow();

function shippingShow(){
        document.getElementById('statusLoading').classList.remove('hidden');
        var body = document.getElementById("shipping_body");
        //body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
        let platform = JSON.parse(localStorage.getItem('OrderFirst')) || [];
        const url = "components/panel/orders/shipping.php?platform=" + platform[0];
        fetch(url)
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const parsedDocument = parser.parseFromString(data, "text/html");
                body.innerHTML = parsedDocument.body.innerHTML;
                executeScripts(parsedDocument);
        });
        document.getElementById('statusLoading').classList.add('hidden');
    }


  function checkFourth() {
        if (document.querySelector('input[name="shipping"]:checked')){
            shipping = document.querySelector('input[name="shipping"]:checked').value;
        }else{
            shipping="";
        }

        if(!document.getElementById('box_machine_number_outer').classList.contains('hidden')){
            if(document.getElementById('box_machine_number').value == ""){
                document.getElementById('box_machine_number').classList.add('ring-red-300', 'ring-1');
                var box_machine_number = "";
                console.log(box_machine_number);

            }else{
                document.getElementById('box_machine_number').classList.remove('ring-red-300', 'ring-1');
                var box_machine_number = document.getElementById('box_machine_number').value;
            }
        }else{
            var box_machine_number = "not in use";
        }

        if(shipping != "" && box_machine_number != ""){
            let supOrder = JSON.parse(localStorage.getItem("supOrder"));

            // Zmiana konkretnej wartości
            supOrder.fourth = "ok";

            // Zapisanie zaktualizowanego obiektu z powrotem do localStorage
            localStorage.setItem("supOrder", JSON.stringify(supOrder));

            supCheck('fourth');
            saveFourth()
            openOrderAddSite('fifth')
        }else{
            
            let supOrder = JSON.parse(localStorage.getItem("supOrder"));

            // Zmiana konkretnej wartości
            supOrder.fourth = "warning";

            // Zapisanie zaktualizowanego obiektu z powrotem do localStorage
            localStorage.setItem("supOrder", JSON.stringify(supOrder));

            supCheck('fourth');
            if(shipping == ''){
                document.getElementById('shipping_body').classList.add('ring-red-300', 'ring-1');
            }else{
                document.getElementById('shipping_body').classList.remove('ring-red-300', 'ring-1');
            }
            showAlert('warning', 'Nie podano wszystkich informacji o dostawie!');
        }
    }

    function saveFourth() {

        if(document.getElementById('box_machine_number_outer').classList.contains('hidden')){
            var box_machine_number = "";
        }else{
            var box_machine_number = document.getElementById('box_machine_number').value;
        }

        var paynament = document.querySelector('input[name="paynament"]:checked').value;

        localStorage.setItem("OrderFourth", JSON.stringify([shipping, box_machine_number, paynament]));
    }

    dataFourth = JSON.parse(localStorage.getItem("OrderFourth"));

    if (dataFourth != null){
                console.log('paynament_'+dataFourth[0]);
                document.getElementById('paynament_'+dataFourth[2]).checked = true;
                //USTAWIENIE ZAZNACZENIA
                document.getElementById('paynament_'+dataFourth[2]).parentElement.classList.add('border-indigo-600', 'ring-0', 'ring-violet-600');
                document.getElementById('paynament_'+dataFourth[2]).parentElement.querySelector('.indicator_2').classList.add('border-violet-600');
                
    }

   
</script>