<section class="w-1/5 lg:1/6 h-screen flex flex-col items-center justify-between bg-[#f8f9fa] py-5 px-8 font-[Lexend]">
    <section class="hover:bg-white hover:shadow-lg w-full font-medium text-gray-600 flex gap-4 items-center justify-center py-4 px-5 text-sm rounded-xl transition-all duration-300">
        <img src="public/img/logo2.png" alt="logo" class="w-1/2">
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
            $buttons=["dashboard", "szukaj", "produkty", "zamówienia"];
            while($button = current($buttons)) {
                echo '
                <a href="'.$button.'" class="flex items-center gap-3 py-2 px-3 w-full font-light hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300">
                    <div class="bg-white p-3 rounded-xl shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3">
                            <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                            <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                        </svg>
                    </div>
                    <span class="text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>
                ';
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
                <a href="'.$button.'" class="flex items-center gap-3 py-2 px-3 w-full font-light hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300">
                    <div class="bg-white p-3 rounded-xl shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3">
                            <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                            <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                        </svg>
                    </div>
                    <span class="text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>
                ';
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
                <a href="?page='.$button.'" class="flex items-center gap-3 py-2 px-3 w-full font-light hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300">
                    <div class="bg-white p-3 rounded-xl shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3">
                            <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                            <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                        </svg>
                    </div>
                    <span class="text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>
                ';
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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3">
                    <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                    <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                </svg>
            </div>
            <span class="text-gray-700 text-sm">Wyloguj się</span>
        </a>
    </section>
    
</section>