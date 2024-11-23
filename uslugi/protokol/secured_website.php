<body>
    <script>
        function marginesy(a) {
            if (a == "Standardowe") {
                document.getElementById("protok").classList.add("px-4");
                document.getElementById("protok").classList.remove("px-8");
                document.getElementById("protok").classList.remove("px-0");
            } else if (a == "Zwiększone") {
                document.getElementById("protok").classList.add("px-8");
                document.getElementById("protok").classList.remove("px-4");
                document.getElementById("protok").classList.remove("px-0");
            } else if (a == "none") {
                document.getElementById("protok").classList.add("px-0");
                document.getElementById("protok").classList.remove("px-4");
                document.getElementById("protok").classList.remove("px-8");
            }
            localStorage.setItem('marginesy', a);
        }

        function szerokosc(a) {
            document.getElementById("protok").style.width = a + 'mm';
            localStorage.setItem('szerokosc', a);
        }

        function wypelnij(a) {
            surce = document.getElementById(a).value;
            placeholder = document.getElementById(a).placeholder;
            cel = document.getElementById(a+'_cel');
            
            if (surce === "") {
                cel.innerHTML = placeholder; // wyświetl placeholder
            } else {
                cel.innerHTML = surce.replace(/\n/g, '<br>');
            }
        }

        function wypelnijCP(a) {
            surce = document.getElementById(a).value;
            cel = document.getElementById('czynn_preset_cel');
            
            if (surce === "brak") {
                cel.innerHTML = ""; // wyświetl placeholder
            } else {
                cel.innerHTML = surce.replace(/\n/g, '<br>') + '<br/>';
            }
        }

        // funckja pokazuąca i howająca sekcję kosztorys gdby wartość była wpisana
        function kosztorys() {
            var koszt = document.getElementById("koszt").value;
            var kosztorys = document.getElementById("kosztorys");
            if (koszt === "") {
                kosztorys.style.display = "none";
            } else {
                kosztorys.style.display = "block";
            }
        }

        function new_serial() {
            var koszt = document.getElementById("new_serial").value;
            var new_serial = document.getElementById("new_serial_body");
            if (koszt === "") {
                new_serial.style.display = "none";
            } else {
                new_serial.style.display = "block";
            }
        }

        function date() {
            //dodaj aktualną date do id data_cel
            var data = new Date();
            var dzien = data.getDate();
            //doadaj 0 przed liczbami jednocyfrowymi
            if (dzien < 10) {
                dzien = '0' + dzien;
            }
            var miesiac = data.getMonth() + 1;
            //doadaj 0 przed liczbami jednocyfrowymi
            if (miesiac < 10) {
                miesiac = '0' + miesiac;
            }
            var rok = data.getFullYear();
            var godzina = data.getHours();
            //doadaj 0 przed liczbami jednocyfrowymi
            if (godzina < 10) {
                godzina = '0' + godzina;
            }
            var minuta = data.getMinutes();
            //doadaj 0 przed liczbami jednocyfrowymi
            if (minuta < 10) {
                minuta = '0' + minuta;
            }
            var czas = dzien + '.' + miesiac + '.' + rok + ' ' + godzina + ':' + minuta + ' ';
            document.getElementById("data_cel").innerHTML = czas;
            
        }

        function reload() {
            location.reload();
        }
    </script>
    <style>
        /* Styl, który ukrywa wszystko poza drukowanym elementem */
        @media print {
            body * {
                visibility: hidden; /* Ukrywamy wszystko */
            }
            #protok, #protok * {
                visibility: visible; /* Wyświetlamy tylko wybrany div */
            }
            #protok {
                position: absolute;
                top: 0;
                left: 0;
            }
        }
    </style>
    <script>
        function drukujProtokol() {
            date(); // Dodaj aktualną datę
            window.print(); // Wywołanie okna drukowania
        }
    </script>
    <section class="font-[poppins] flex flex-row w-full min-h-screen items-center justify-center bg-green-50">
        <section class="flex sm:flex-row flex-col sm:p-12">
            <section class="border-l border-t border-b border-r sm:mr-4 rounded-2xl border-black-600 px-4 py-4">
                <h1 class="text-xl font-medium mb-2">Dane uzupełniające:</h1>


                <div>
                    <label for="zgloszenie">Zgłoszenie:</label>
                    <input type="text" id="zgloszenie" class="px-2 py-1 rounded-xl text-sm w-full" oninput="wypelnij('zgloszenie')">
                </div>

                <div class="mt-2">
                    <label for="serial">Numer seryjny:</label>
                    <input type="text" id="serial" placeholder="NONSERIALIZED" class="px-2 py-1 rounded-xl text-sm w-full" oninput="wypelnij('serial')">
                </div>

                <div class="mt-2">
                    <label for="model">Model:</label>
                    <input type="text" id="model" placeholder="Apple" class="px-2 py-1 rounded-xl text-sm w-full" oninput="wypelnij('model')">
                </div>

                <div class="mt-2">
                    <label for="czynnosci">Czynności serwisowe:</label>
                    <p class="mt-2 text-xs text-gray-600">Presety:</p>
                    <div class="flex flex-row gap-4 items-center mb-2 flex-wrap">
                        <div class="flex items-center">
                            <input type="radio" value="brak" id="brak2" name="czynn_preset" class="cursor-pointer" checked="checked" onchange="wypelnijCP(this.id)">
                            <label for="brak2" class="pl-2 cursor-pointer text-xs">brak</label>
                        </div>

                        <div class="flex items-center">
                            <input class=" cursor-pointer" type="radio" value="Wymieniliśmy prawą i lewą słuchawkę AirPods." id="pl" name="czynn_preset" onchange="wypelnijCP(this.id)">
                            <label for="pl" class="pl-2 cursor-pointer text-xs">pl</label>
                        </div>
                        <div class="flex items-center">
                            <input class=" cursor-pointer" type="radio" value="Wymieniliśmy etui ładujące (case)." id="case" name="czynn_preset" onchange="wypelnijCP(this.id)">
                            <label for="case" class="pl-2 cursor-pointer text-xs">case</label>
                        </div>
                        <div class="flex items-center">
                            <input class=" cursor-pointer" type="radio" value="W Centrum Serwisowym Apple technicy wymienili urządzenie na nowe." id="csuw" name="czynn_preset" onchange="wypelnijCP(this.id)">
                            <label for="csuw" class="pl-2 cursor-pointer text-xs">csuw</label>
                        </div>
                        <div class="flex items-center">
                            <input class="cursor-pointer" type="radio" value="W Centrum Serwisowym Apple technicy dokonali naprawy urządzenia poprzez: " id="csn" name="czynn_preset" onchange="wypelnijCP(this.id)">
                            <label for="csn" class="pl-2 cursor-pointer text-xs">csn</label>
                        </div>
                        <div class="flex items-center">
                            <input class=" cursor-pointer" type="radio" value="Technicy w Centrum Serwisowym Apple zdiagnozowali urządzenie, potwierdzają oni usterkę.<br/><br/> Odmawiają jej gwarancyjnej naprawy ponieważ wykryli uszkodzenie mechaniczne lub nieautoryzowane modyfikacje. <br/><br/> Po więcej informacji prosimy kontaktować się z infolinią AppleCare: 00800-4411875." id="csd" name="czynn_preset" onchange="wypelnijCP(this.id)">
                            <label for="csd" class="pl-2 cursor-pointer text-xs">csd</label>
                        </div>
                        <div class="flex items-center">
                            <input class="cursor-pointer" type="radio" value="Akcesorium zostało wymienione na nowe." id="aw" name="czynn_preset" onchange="wypelnijCP(this.id)">
                            <label for="aw" class="pl-2 cursor-pointer text-xs">aw</label>
                        </div>
                        <div class="flex items-center">
                            <input class=" cursor-pointer" type="radio" value="Urządzenie zostało wymienione na nowe." id="uw" name="czynn_preset" onchange="wypelnijCP(this.id)">
                            <label for="uw" class="pl-2 cursor-pointer text-xs">uw</label>
                        </div>
                    </div>
                    <textarea name="" id="czynnosci" cols="30" rows="8" class="px-2 py-1 rounded-xl text-sm w-full" oninput="wypelnij('czynnosci')"></textarea>
                </div>

                <div>
                    <label for="new_serial">Nowy numer seryjny:</label>
                    <input type="text" id="new_serial" placeholder="Nie dotyczy" class="px-2 py-1 rounded-xl text-sm w-full" oninput="wypelnij('new_serial');new_serial()">
                </div>

                <label for="price">Cena całkowita:</label>
                <input type="number" id="koszt" placeholder="Brak" class="px-2 py-1 rounded-xl text-sm w-full" oninput="wypelnij('koszt');kosztorys()">

                <h1 class="text-xl font-medium mt-4 mb-2">Konfiguracja:</h1>


                <p class="">Zleceniodawca:</p>
                <div class="flex flex-row items-center">
                    <input type="radio" value="EuroNET" id="EuroNET" name="zleceniodawca" class="cursor-pointer" checked="checked">
                    <label for="EuroNET" class="pl-2 cursor-pointer text-sm">EuroNET</label>
                    <input class="ml-4 cursor-pointer" type="radio" value="Inny" id="Inny" name="zleceniodawca">
                    <label for="Inny" class="pl-2 cursor-pointer text-sm">Inny</label>
                </div>
                <p class="mt-2">Marginesy:</p>
                <div class="flex flex-row items-center">
                    <input type="radio" value="Standardowe" id="Standardowe" name="marginesy" class="cursor-pointer" checked="checked" onchange="marginesy(this.value)">
                    <label for="Standardowe" class="pl-2 cursor-pointer text-sm">Standardowe</label>
                    <input class="ml-4 cursor-pointer" type="radio" value="Zwiększone" id="Zwiększone" name="marginesy" onchange="marginesy(this.value)">
                    <label for="Zwiększone" class="pl-2 cursor-pointer text-sm">Zwiększone</label>
                    <input class="ml-4 cursor-pointer" type="radio" value="none" id="none" name="marginesy" onchange="marginesy(this.value)">
                    <label for="none" class="pl-2 cursor-pointer text-sm">Brak</label>
                </div>
                <p class="mt-2">Szerokość:</p>
                <div class="flex flex-row items-center flex-wrap gap-4">
                    <div>
                        <input type="radio" value="80" id="80" name="szerokosc" class="cursor-pointer" checked="checked" onchange="szerokosc(this.value)">
                        <label for="80" class="pl-2 cursor-pointer text-sm">80mm</label>
                    </div>
                    <div>
                        <input class="cursor-pointer" type="radio" value="85" id="85" name="szerokosc" onchange="szerokosc(this.value)">
                        <label for="85" class="pl-2 cursor-pointer text-sm">85mm</label>
                    </div>
                    <div>
                        <input class="cursor-pointer" type="radio" value="90" id="90" name="szerokosc" onchange="szerokosc(this.value)">
                        <label for="90" class="pl-2 cursor-pointer text-sm">90mm</label>
                    </div>
                    <div>
                        <input class=" cursor-pointer" type="radio" value="95" id="95" name="szerokosc" onchange="szerokosc(this.value)">
                        <label for="95" class="pl-2 cursor-pointer text-sm">95mm</label>
                    </div>

                </div>
                <div class="flex flex-row items-center justify-center mt-4 gap-2">
                    <button class="flex items-center justify-center bg-gray-800 hover:bg-gray-600 hover:scale-110 duration-150 text-white p-2 rounded-2xl" onclick="reload()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </button>
                    <button class="bg-[#8dc63f] w-full justify-center text-white flex flex-row gap-2 font-medium hover:scale-105 hover:bg-[#8dc63f90] hover:shadow-2xl duration-150 py-2 px-8 rounded-2xl active:scale-95" onclick="drukujProtokol()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z" clip-rule="evenodd" />
                        </svg>
                        Drukuj
                    </button>
                </div>
            </section>
            <section class="flex h-full sm:items-center sm:justify-center">
                <div class="my_shadow sm:mt-0 mt-8">
                    <div id="protok" style="width: 80mm;" class="flex flex-col py-4 px-4 items-center">
                        <img src="img/jablkowy.jpg" alt="" class="w-full mb-2">
                        
                        <div class="w-full flex flex-col">
                            <h1 class="font-bold">PROTOKÓŁ NAPRAWY <span id="zgloszenie_cel"class="text-xl"></span></h1>
                            <hr class="border-black">
                            <p class="pt-2"><span class="text-xs">Wydruk:</span> <span class="font-medium text-sm" id="data_cel">Data jest automatyczna</span></p>


                            <h1 class="font-bold mt-2">ZLECENIODAWCA</h1>
                            <hr class="border-black">
                            <p class="pt-2"><span class="text-xs">Nazwa:</span> <span class="font-medium text-sm">Euro-net Sp. z o.o.</span></p>
                            <p><span class="text-xs">Adres:</span> <span class="font-medium text-xs">ul. Muszkieterów 15, 02-273 Warszawa</span></p>


                            <h1 class="font-bold mt-2">DANE SPRZĘTU</h1>
                            <hr class="border-black">
                            <p class="pt-2"><span class="text-xs">Numer seryjny:</span> <span class="font-medium uppercase text-sm" id="serial_cel">NONSERIALIZED</span></p>
                            <p><span class="text-xs">Model:</span> <span class="font-medium text-sm" id="model_cel">Apple</span></p>
                            

                            <h1 class="font-bold mt-2">CZYNNOŚCI SERWISOWE</h1>
                            <hr class="border-black">
                            <p class="text-xs pt-2 text-justify">
                                <span id="czynn_preset_cel"></span>
                                <span id="czynnosci_cel"></span>
                            </p>
                                
                            <p id="new_serial_body" class="hidden text-xs text-justify"><br/> W związku z wykonanymi czynnościami serwisowymi numer seryjny urządzenia uległ zmianie. <br/><br/>Nowy numer seryjny: <span class="font-medium text-sm uppercase" id="new_serial_cel"></span></p>

                            <div id="kosztorys" class="hidden">
                                <h1 class="font-bold mt-2">KOSZTORYS</h1>
                                <hr class="border-black">
                                <p class="mt-2"><span class="text-xs">Koszt poniesiony przez zleceniodawcę:</span><br/><span class="font-medium text-sm" id="koszt_cel">0</span><span class="font-medium text-sm"> PLN</span></p>
                            </div>
                        </div>

                        <img src="img/autoryzowany.jpg" alt="" class="pt-4 w-full mb-4">
                    </div>
                </div>
            </section>
        </section>
    </section>
    <script>
        if (!localStorage.getItem('marginesy')) {
            localStorage.setItem('marginesy', 'Standardowe');
        }else{
            marginesy(localStorage.getItem('marginesy'));
            // zaznacz radio
            document.getElementById(localStorage.getItem('marginesy')).checked = true;
        }

        if (isNaN(localStorage.getItem('szerokosc'))) {
            localStorage.setItem('szerokosc', '80');
        }else{
            szerokosc(localStorage.getItem('szerokosc'));
            // zaznacz radio
            document.getElementById(localStorage.getItem('szerokosc')).checked = true;
        }
    </script>
</body>