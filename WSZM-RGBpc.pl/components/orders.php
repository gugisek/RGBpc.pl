<section class="w-full flex flex-col items-center px-5 pt-5 gap-4">
    <section class="w-full flex gap-4">
        <section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6 flex">
            <!-- search -->
            <?php include 'order_scripts/orders_search.php'; ?>
            <!-- script for working enter to submit on select -->
            <?php include 'order_scripts/orders_option_enter.php'; ?>
        </section>
        <a href="?page=zamówienia&action=add_in" class="flex items-center justify-center px-8 bg-indigo-400 hover:shadow-indigo-500 transition-all duration rounded-3xl hover:shadow-[0px_8px_19px_0px] hover:scale-105 shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
        </a>
        <a href="?page=zamówienia&action=add_out" class="flex items-center justify-center px-8 bg-green-400 hover:shadow-green-500 transition-all duration rounded-3xl hover:shadow-[0px_8px_19px_0px] hover:scale-105 shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
            </svg>
        </a>
    </section>
    <?php
        $action = $_GET['action'];
        if ($action == 'edit') {
            include 'order_scripts/orders_front_edit.php';
        } elseif ($action == 'add_in') {
            include 'order_scripts/orders_front_add_in.php';
        } elseif ($action == 'add_out') {
            include 'order_scripts/orders_front_add_out.php';
        }elseif($action=='added') {
            echo "<section id='added' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Pomyślnie wykonano oprację.</h1>";
                echo '<a href="?page=zamówienia&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
            include 'order_scripts/orders_front_table.php';
        }elseif($action=='edited') {
            echo "<section id='edited' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Pomyślnie edytowano zamówienie.</h1>";
                echo '<a href="?page=zamówienia&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
            include 'order_scripts/orders_front_table.php';
        }elseif($action=='add_same') {
            echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Takie zamówienie już istnieje.</h1>";
                echo '<a href="?page=zamówienia&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
            include 'order_scripts/orders_front_table.php';
        }elseif($action=='error') {
            echo "<section id='edited' class='flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6'>";
            echo "<h1>Błąd bazy danych. Spróbuj ponownie lub skontaktuj się z administratorem.</h1>";
            echo '<a href="?page=zamówienia&action=" class="hover:rotate-90 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                 </svg></a>';
            echo "</section>";
            include 'order_scripts/orders_front_table.php';
        }elseif($action=='too_large') {
            echo "<section id='error' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Wybrany plik jest za duży.</h1>";
                echo '<a href="?page=zamówienia&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
            include 'order_scripts/orders_front_table.php';
        }elseif($action=='wrong_ext') {
            echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Wybrany plik posiada nieprawidłowe rozszerzenie.</h1>";
                echo '<a href="?page=zamówienia&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
            include 'order_scripts/orders_front_table.php';
        }elseif($action=='img_error') {
            echo "<section id='edited' class='flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6'>";
            echo "<h1>Błąd przesyłania pliku. Skontaktuj się z administratorem.</h1>";
            echo '<a href="?page=zamówienia&action=" class="hover:rotate-90 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                 </svg></a>';
            echo "</section>";
            include 'order_scripts/orders_front_table.php';
        }elseif($action=='create_cart'){
            include 'order_scripts/orders_front_create_cart.php';
        }elseif($action=='add_empty') {
            echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Nie podano wszystkich informacji potrzebnych do utworzenia nowego zamówienia.</h1>";
                echo '<a href="?page=zamówienia&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
            include 'order_scripts/orders_front_table.php';
        }elseif($action=='edit_empty') {
            echo "<section id='edited' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Nie podano wszystkich informacji potrzebnych do zmodyfikowania zamówienia.</h1>";
                echo '<a href="?page=zamówienia&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
            include 'order_scripts/orders_front_table.php';
        }elseif($action=='aborted') {
            echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
                echo "<h1>Zamówienie zostało usunięte.</h1>";
                echo '<a href="?page=zamówienia&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
            echo "</section>";
            include 'order_scripts/orders_front_table.php';
        }elseif($action != 'create_cart'){
            include 'order_scripts/orders_front_table.php';
        }
    ?>
</section>