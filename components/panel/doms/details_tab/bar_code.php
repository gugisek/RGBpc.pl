<?php
// include '../components/head.php';
$sku = $_GET['sku'];
$serial = $_GET['serial'];
$category = $_GET['category'];
?>

<section id="kod_kreskowy" class="flex flex-col items-center justify-center" data-aos="fade-in" data-aos-delay="100">
    <section class="flex flex-row items-center p-2 gap-5 min-w-[100px]">
        <div class="flex flex-col items-center">
            <img class="h-14" src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo $sku; ?>&code=Code128&dpi=96&dataseparator=" alt="Barcode Generator TEC-IT"/>
            <img class="h-14" src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo $serial; ?>&code=Code128&dpi=96&dataseparator=" alt="Barcode Generator TEC-IT"/>
        </div>
        <div class=" flex flex-col">
            <h1 class='font-bold text-sm uppercase'><?=$category?></h1>
            <h1 class="text-xs mb-[-5px]">Polski dystrybutor:</h1>
            <h1 class="font-medium text-lg py-0">RGBpc.pl</h1>
            <h1 class="text-center text-sm mt-2">Wyprodukowano w Chinach</h1>
        </div>
    </section>
</section>
    <div class="flex items-center gap-2" data-aos="fade-in" data-aos-delay="150">
        <input name="kopie" id="kopie" type="number" value="1" min="1" class="border rounded-xl py-2 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-violet-600 focus:shadow-xl duration-150 font-medium focus:text-white">
        <div onclick="drukuj()" class="active:scale-95 duration-150 cursor-pointer inline-flex w-full justify-center rounded-xl border border-gray-500 px-4 py-2 text-sm font-medium hover:text-white shadow-sm hover:shadow-xl hover:bg-violet-600">Drukuj</div>
    </div>
    <style>
        /* Styl, który ukrywa wszystko poza drukowanym elementem */
        @media print {
            body * {
                visibility: hidden; /* Ukrywamy wszystko */
            }
            #kod_kreskowy, #kod_kreskowy * {
                visibility: visible; /* Wyświetlamy tylko wybrany div */
            }
            #kod_kreskowy {
                position: absolute;
                top: 0;
                left: 0;
            }
        }
    </style>
    <script>
    function drukuj() {
        // Pobranie liczby kopii od użytkownika
        const liczbaKopii = parseInt(document.getElementById('kopie').value, 10);

        if (isNaN(liczbaKopii) || liczbaKopii < 1) {
            alert("Podaj poprawną liczbę kopii (minimum 1).");
            return;
        }

        // Znalezienie elementu do druku
        const elementDoDruku = document.getElementById('kod_kreskowy');
        const oryginalnaZawartosc = elementDoDruku.innerHTML; // Zachowanie oryginalnej zawartości

        // Powielenie zawartości na podstawie liczby kopii
        let nowaZawartosc = '';
        for (let i = 0; i < liczbaKopii; i++) {
            nowaZawartosc += oryginalnaZawartosc + '<hr>'; // Dodajemy separator między kopiami
        }
        elementDoDruku.innerHTML = nowaZawartosc;

        // Wywołanie okna drukowania
        window.print();

        // Przywrócenie oryginalnej zawartości po druku
        elementDoDruku.innerHTML = oryginalnaZawartosc;
    }
</script>