<section class="w-1/5 lg:1/6 h-screen flex flex-col items-center justify-between bg-[#f8f9fa] py-5 pl-8 pr-4 font-[Lexend]">
    <section class="hover:bg-white hover:shadow-lg w-full font-medium text-gray-600 flex gap-4 items-center justify-center py-4 px-5 text-sm rounded-xl transition-all duration-300">
        <img src="public/img/logo2.png" alt="logo" class="w-1/2 max-w-[150px] min-w-[80px]">
        <div>
            <h1 class="text-xs mb-[-5px]">Witaj</h1><h1 class="text-lg"><?=$_SESSION['user']?></h1>
        </div>
    </section>
    
    <div class="border-b-[1px] w-full my-2"></div> <!-- border -->
    <section class="w-full overflow-y-auto">
        <!-- LOGO + text -->
        <!-- MENU -->
        <section class="w-full my-4 py-1 px-1 flex flex-col gap-1">
            <?php
            $buttons=["dashboard", "produkty", "zamówienia"];
            while($button = current($buttons)) {
                echo '
                <a href="?page='.$button.'&action=" class="flex items-center gap-3 py-2 px-3 w-full font-light hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300">
                    <div class="bg-white p-3 rounded-xl shadow-xl">';
                    include 'public/img/svg/'.$button.'.php';
            echo   '</div>
                    <span class="text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>';
                next($buttons);
            }
            ?>
            <span class="text-xs font-medium text-gray-500 py-5 px-3">
                FINANSE
            </span>
            <?php
            $buttons=["wydatki", "przychody", "księgowość"];
            while($button = current($buttons)) {
                echo '
                <a href="?page='.$button.'&action=" class="flex items-center gap-3 py-2 px-3 w-full font-light hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300">
                    <div class="bg-white p-3 rounded-xl shadow-xl">';
                    include 'public/img/svg/'.$button.'.php';
            echo   '</div>
                    <span class="text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>';
                next($buttons);
            }
            ?>
            <span class="text-xs font-medium text-gray-500 py-5 px-3">
                ZARZĄDZANIE
            </span>
            <?php
            $buttons=["użytkownicy", "archiwum", "ustawienia"];
            while($button = current($buttons)) {
                echo '
                <a href="?page='.$button.'&action=" class="flex items-center gap-3 py-2 px-3 w-full font-light hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300">
                    <div class="bg-white p-3 rounded-xl shadow-xl">';
                    include 'public/img/svg/'.$button.'.php';
            echo   '</div>
                    <span class="text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>';
                next($buttons);
            }
            ?>
        </section>
    </section>
    <!-- mini footer w navie z nazwą i logoutem -->
    <section class="w-full my-4 py-1 px-1 flex flex-col gap-1">
        <span class="text-xs font-medium text-gray-500 py-5 px-3">
            KONTO
        </span>
        <a href="scripts/logout.php" class="flex items-center gap-3 py-2 px-3 w-full font-light hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300">
            <div class="bg-white p-3 rounded-xl shadow-xl">
                <?php include 'public/img/svg/logout.php'; ?>
            </div>
            <span class="text-gray-700 text-sm">Wyloguj się</span>
        </a>
    </section>
    
</section>