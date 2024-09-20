<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RGBpc.pl - generator protokołów napraw</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        .my_shadow {
            border-radius: 20px;
            background: #fff;
            box-shadow:  20px 20px 60px #cecece,
                        -20px -20px 60px #ffffff;
        }
    </style>
</head>
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
            } else if (a == "brak") {
                document.getElementById("protok").classList.add("px-0");
                document.getElementById("protok").classList.remove("px-4");
                document.getElementById("protok").classList.remove("px-8");
            }
        }

        function wypelnij(a) {
            surce = document.getElementById(a).value;
            placeholder = document.getElementById(a).placeholder;
            cel = document.getElementById(a+'_cel');
            
            if (surce === "") {
                cel.innerHTML = placeholder; // wyświetl placeholder
            } else {
                cel.innerHTML = surce; // wyświetl wartość z inputa
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
        <section class="flex sm:flex-row flex-col p-12">
            <section class="border-l border-t border-b rounded-2xl border-black-600 px-4 py-4">
                <h1 class="text-xl font-medium">Dane uzupełniające:</h1>


                <div>
                    <label for="zgloszenie">Zgłoszenie:</label>
                    <input type="text" id="zgloszenie" class="px-2 py-1 rounded-xl text-sm w-full" onchange="wypelnij('zgloszenie')">
                </div>

                <div class="mt-2">
                    <label for="serial">Numer seryjny:</label>
                    <input type="text" id="serial" placeholder="NONSERIALIZED" class="px-2 py-1 rounded-xl text-sm w-full" onchange="wypelnij('serial')">
                </div>

                <div class="mt-2">
                    <label for="model">Model:</label>
                    <input type="text" id="model" placeholder="Apple" class="px-2 py-1 rounded-xl text-sm w-full" onchange="wypelnij('model')">
                </div>

                <div class="mt-2">
                    <label for="czynnosci">Czynności serwisowe:</label>
                    <textarea name="" id="czynnosci" cols="30" rows="10" class="px-2 py-1 rounded-xl text-sm w-full" onchange="wypelnij('czynnosci')"></textarea>
                </div>

                <label for="price">Cena całkowita:</label>
                <input type="number" id="koszt" placeholder="Brak" class="px-2 py-1 rounded-xl text-sm w-full" onchange="wypelnij('koszt');kosztorys()">

                <h1 class="text-xl font-medium mt-4">Konfiguracja:</h1>


                <p class="">Zleceniodawca:</p>
                <div class="flex flex-row items-center">
                    <input type="radio" value="EuroNET" id="EuroNET" name="zleceniodawca" class="cursor-pointer" checked="checked">
                    <label for="EuroNET" class="pl-2 cursor-pointer">EuroNET</label>
                    <input class="ml-4 cursor-pointer" type="radio" value="Inny" id="Inny" name="zleceniodawca">
                    <label for="Inny" class="pl-2 cursor-pointer">Inny</label>
                </div>
                <p class="mt-2">Marginesy:</p>
                <div class="flex flex-row items-center">
                    <input type="radio" value="Standardowe" id="Standardowe" name="marginesy" class="cursor-pointer" checked="checked" onchange="marginesy(this.value)">
                    <label for="Standardowe" class="pl-2 cursor-pointer">Standardowe</label>
                    <input class="ml-4 cursor-pointer" type="radio" value="Zwiększone" id="Zwiększone" name="marginesy" onchange="marginesy(this.value)">
                    <label for="Zwiększone" class="pl-2 cursor-pointer">Zwiększone</label>
                    <input class="ml-4 cursor-pointer" type="radio" value="brak" id="brak" name="marginesy" onchange="marginesy(this.value)">
                    <label for="brak" class="pl-2 cursor-pointer">Brak</label>
                </div>
                <div class="flex flex-row items-center justify-center mt-4 gap-2">
                    <button class="flex items-center justify-center bg-gray-800 hover:bg-gray-600 hover:scale-110 duration-150 text-white p-2 rounded-2xl" onclick="reload()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </button>
                    <button class="bg-[#8dc63f] w-full justify-center text-white flex flex-row gap-2 font-medium hover:scale-105 hover:bg-[#8dc63f90] hover:shadow-2xl duration-150 py-2 px-8 rounded-2xl" onclick="drukujProtokol()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z" clip-rule="evenodd" />
                        </svg>
                        Drukuj
                    </button>
                </div>
            </section>
            <section>
                <div class="my_shadow">
                    <div id="protok" class="w-[80mm] flex flex-col py-4 px-4 items-center">
                        <img src="img/logo.png" alt="" class="grayscale contrast-0 w-full mb-2">
                        
                        <div class="w-full flex flex-col">
                            <h1 class="font-bold">PROTOKÓŁ NAPRAWY <span id="zgloszenie_cel"class="text-xl"></span></h1>
                            <hr class="border-black">
                            <p class="pt-2"><span class="text-xs">Wydruk:</span> <span class="font-medium text-sm" id="data_cel">Data jest automatyczna</span></p>


                            <h1 class="font-bold mt-2">ZLECENIODAWCA</h1>
                            <hr class="border-black">
                            <p class="pt-2"><span class="text-xs">Nazwa:</span> <span class="font-medium text-sm">EuroNET</span></p>
                            <p><span class="text-xs">Adres:</span> <span class="font-medium text-xs">Muszkieterów 15, 03-191 Warszawa</span></p>


                            <h1 class="font-bold mt-2">DANE SPRZĘTU</h1>
                            <hr class="border-black">
                            <p class="pt-2"><span class="text-xs">Numer seryjny:</span> <span class="font-medium uppercase text-sm" id="serial_cel">NONSERIALIZED</span></p>
                            <p><span class="text-xs">Model:</span> <span class="font-medium text-sm" id="model_cel">Apple</span></p>
                            

                            <h1 class="font-bold mt-2">CZYNNOŚCI SERWISOWE</h1>
                            <hr class="border-black">
                            <p id="czynnosci_cel" class="text-xs pt-2"></p>

                            <div id="kosztorys" class="hidden">
                                <h1 class="font-bold mt-2">KOSZTORYS</h1>
                                <hr class="border-black">
                                <p class="mt-2"><span class="text-xs">Koszt poniesiony przez zleceniodawcę:</span><br/><span class="font-medium text-sm" id="koszt_cel">0</span><span class="font-medium text-sm"> PLN</span></p>
                            </div>
                        </div>

                        <img src="img/autoryzowany.png" alt="" class="pt-4 w-full">
                    </div>
                </div>
            </section>
        </section>
    </section>
</body>
</html>