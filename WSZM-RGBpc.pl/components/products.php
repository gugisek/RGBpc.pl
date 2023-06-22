<section class="w-full flex flex-col items-center px-5 pt-5 gap-4">
    <section class="w-full flex gap-4">
        <section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6 flex">
            <!-- search -->
            <?php include 'product_scripts/products_search.php'; ?>
            <!-- script for working enter to submit on select -->
            <?php include 'product_scripts/products_option_enter.php'; ?>
        </section>
        <a href="?page=produkty&action=add" class="flex items-center justify-center px-8 bg-indigo-400 hover:shadow-indigo-500 transition-all duration rounded-3xl hover:shadow-[0px_8px_19px_0px] hover:scale-105 shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </a>
    </section>
    <?php
        $action = $_GET['action'];
        if ($action == 'edit') {
            include 'product_scripts/products_front_edit.php';
        } elseif ($action == 'add') {
            include 'product_scripts/products_front_add.php';
        }elseif($action=='edited') {
            echo "<section id='added' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Pomyślnie edytowano produkt.</h1>";
                echo '<a href="?page=produkty&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
        }elseif($action=='edit_empty') {
            echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>W wyniku modyfikacji pewne pola zostały puste. Nie dokonano zmian.</h1>";
                echo '<a href="?page=produkty&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
        }elseif($action=='error') {
            echo "<section id='edited' class='flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6'>";
            echo "<h1>Błąd bazy danych. Spróbuj ponownie lub skontaktuj się z administratorem.</h1>";
            echo '<a href="?page=produkty&action=" class="hover:rotate-90 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                 </svg></a>';
            echo "</section>";
        }elseif($action=='img_error') {
            echo "<section id='edited' class='flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6'>";
            echo "<h1>Błąd przesyłania pliku. Skontaktuj się z administratorem.</h1>";
            echo '<a href="?page=produkty&action=" class="hover:rotate-90 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                 </svg></a>';
            echo "</section>";
        }elseif($action=='added') {
            echo "<section id='added' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Pomyślnie dodano nowy produkt.</h1>";
                echo '<a href="?page=produkty&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
        }elseif($action=='add_same') {
            echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Taki produkt już istnieje.</h1>";
                echo '<a href="?page=produkty&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
        }elseif($action=='too_large') {
            echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Wybrane zdjęcie jest za duże.</h1>";
                echo '<a href="?page=produkty&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
        }elseif($action=='wrong_ext') {
            echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Wybrane zdjęcie posiada nieprawidłowe rozszerzenie.</h1>";
                echo '<a href="?page=produkty&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
        }elseif($action=='add_empty') {
            echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Nie podano wszystkich informacji potrzebnych do utworzenia nowego produktu.</h1>";
                echo '<a href="?page=produkty&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
        }
        include 'product_scripts/products_front_table.php';
    ?>
</section>