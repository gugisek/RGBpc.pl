<section id="menu"class="hover:w-[400px] lg:hover:w-1/5 w-[130px] lg:w-1/5 xl:hover:w-1/6 xl:w-1/6 h-screen sm:flex hidden flex-col items-center justify-between bg-[#f8f9fa] py-5 pl-8 pr-4 font-[Lexend]  transition-all duration-300">
    <a class="flex hover:bg-white hover:shadow-lg w-full font-medium text-gray-600 gap-4 items-center justify-center py-4 px-5 text-sm rounded-xl transition-all duration-300">
        <img src="public/img/logo2.png" alt="logo" class="hidden lg:block w-1/2 max-w-[150px] min-w-[80px]">
        <div class="hidden lg:block">
            <h1 class="text-xs mb-[-5px]">Witaj</h1><h1 class="text-lg"><?=$_SESSION['user']?></h1>
        </div>
        <svg id="btn" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lg:hidden block w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </a>
    
    <div class="border-b-[1px] w-full my-2"></div> <!-- border -->
    <section class="w-full overflow-y-auto">
        <!-- LOGO + text -->
        <!-- MENU -->
        <section class="w-full pb-8 pt-4 px-1 flex flex-col gap-1 overflow-x-hidden">
            <?php
            $buttons=["dashboard", "produkty", "zamówienia"];
            while($button = current($buttons)) {
                echo '
                <a href="?page='.$button.'&action=" class="';
                if($button == $_GET['page'])
                    echo 'bg-white shadow-xl rounded-xl transition-all duration-300 ';
                else
                    echo 'hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300 ';
                echo 'flex items-center gap-3 py-2 px-3 w-full font-light ">
                    <div class="';
                    if($button == $_GET['page'])
                        echo 'bg-indigo-400 text-white ';
                    else
                        echo 'bg-white ';
                    echo ' p-3 rounded-xl shadow-xl">';
                    include 'public/img/svg/'.$button.'.php';
            echo   '</div>
                    <span id="text_btn" class="text_btn hidden lg:block text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>';
                next($buttons);
            }
            ?>
            <span id="text_btn" class="hidden lg:block text-xs font-medium text-gray-500 lg:py-5 py-1 px-3">
                FINANSE
            </span>
            <span id="text_btn" class="lg:hidden block text-xs text-center font-medium text-gray-500 lg:py-5 py-1 px-3">
                -
            </span>
            
            <?php
            $buttons=["wydatki", "przychody", "księgowość"];
            while($button = current($buttons)) {
                echo '
                <a href="?page='.$button.'&action=" class="';
                if($button == $_GET['page'])
                    echo 'bg-white shadow-xl rounded-xl transition-all duration-300 ';
                else
                    echo 'hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300 ';
                echo 'flex items-center gap-3 py-2 px-3 w-full font-light ">
                    <div class="';
                    if($button == $_GET['page'])
                        echo 'bg-indigo-400 text-white ';
                    else
                        echo 'bg-white ';
                    echo ' p-3 rounded-xl shadow-xl">';
                    include 'public/img/svg/'.$button.'.php';
            echo   '</div>
                    <span id="text_btn" class="text_btn hidden lg:block text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>';
                next($buttons);
            }
            ?>
            <span id="text_btn" class="hidden lg:block text-xs font-medium text-gray-500 lg:py-5 py-1 px-3">
                ZARZĄDZANIE
            </span>
            <span id="text_btn" class="lg:hidden block text-xs text-center font-medium text-gray-500 lg:py-5 py-1 px-3">
                -
            </span>
            <?php
            $buttons=["użytkownicy", "archiwum", "ustawienia"];
            while($button = current($buttons)) {
                echo '
                <a href="?page='.$button.'&action=" class="';
                if($button == $_GET['page'])
                    echo 'bg-white shadow-xl rounded-xl transition-all duration-300 ';
                else
                    echo 'hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300 ';
                echo 'flex items-center gap-3 py-2 px-3 w-full font-light ">
                    <div class="';
                    if($button == $_GET['page'])
                        echo 'bg-indigo-400 text-white ';
                    else
                        echo 'bg-white ';
                    echo ' p-3 rounded-xl shadow-xl">';
                    include 'public/img/svg/'.$button.'.php';
            echo   '</div>
                    <span id="text_btn" class="text_btn hidden lg:block text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>';
                next($buttons);
            }
            ?>
        </section>
    </section>
    <!-- mini footer w navie z nazwą i logoutem -->
    <section class="w-full py-1 px-1 flex flex-col gap-1">
        <span id="text_btn" class="hidden lg:block text-xs font-medium text-gray-500 lg:py-4 mt-2 py-1 px-3">
            KONTO
        </span>
        <span id="text_btn" class="lg:hidden block text-xs text-center font-medium text-gray-500 lg:py-5 py-1 px-3">
                -
            </span>
        <a href="scripts/logout.php" class="flex items-center gap-3 py-2 px-3 w-full font-light hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300">
            <div class="bg-white p-3 rounded-xl shadow-xl">
                <?php include 'public/img/svg/logout.php'; ?>
            </div>
            <span id="text_btn" class="text_btn hidden lg:block text-gray-700 text-sm">Wyloguj</span>
        </a>
    </section>
    <script>
        //skrypt do rozwijania menu po kliknięciu oraz najechaniu na nie
        const menu = document.getElementById('menu');
        const btn = document.getElementById('btn');
        // wybranie wszystkich elementów z klasą text_btn
        const text_btn = document.querySelectorAll('#text_btn');
    

        //set width of menu to 100% of screen by clicking on btn
        
        //set width of menu to 100% of screen by hovering on menu
        menu.addEventListener('mouseenter', () => {
            //nadanie szerokości 100% menu bezpośrednio dla elementu menu
            //document.getElementById('menu').style.width = '100%';

            // przypisanie klasy hidden do wyszstkich elementów z klasą text_btn
            text_btn.forEach(element => {
                element.classList.toggle('hidden');
            });
        });
        menu.addEventListener('mouseleave', () => {
            // menu.classList.toggle('w-auto');
            // menu.classList.toggle('w-full');
            //document.getElementById('menu').style.width = 'auto';
            text_btn.forEach(element => {
                element.classList.toggle('hidden');
            });

        });

        
    </script>
</section>