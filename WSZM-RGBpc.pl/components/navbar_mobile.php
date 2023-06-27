<section id="mobile_nav_fixed" class="sm:hidden flex bg-[#f8f9fa] shadow-xl z-10 justify-between items-center px-4 py-2 transition-all duration-300">
    <div class=" w-[30px] h-8"></div>
    <img src="public/img/logo2.png" alt="logo" class="w-[120px]">
    <div id="hamburger" class="bg-[#3d3d3d] before:translate-y-[10px] after:translate-y-[-10px] block before:bg-[#3d3d3d]  after:bg-[#3d3d3d]"></div> 
</section>
<section class="sm:hidden bg-[#f8f9fa]">
    <section id="mobile_nav" style="height: 0vh;" class="w-full overflow-y-auto transition-all duration-300">
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
                    <span id="text_btn" class="lg:block text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>';
                next($buttons);
            }
            ?>
            <span id="text_btn" class="text-xs font-medium text-gray-500 lg:py-5 py-1 px-3">
                FINANSE
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
                    <span id="text_btn" class="text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>';
                next($buttons);
            }
            ?>
            <span id="text_btn" class="text-xs font-medium text-gray-500 lg:py-5 py-1 px-3">
                ZARZĄDZANIE
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
                    <span id="text_btn" class="text-gray-700 text-sm">'.ucfirst($button).'</span>
                </a>';
                next($buttons);
            }
            ?>
        <span id="text_btn" class="text-xs font-medium text-gray-500 lg:py-4 mt-2 py-1 px-3">
            KONTO
        </span>
        <a href="scripts/logout.php" class="flex items-center gap-3 py-2 px-3 w-full font-light hover:bg-white hover:shadow-xl rounded-xl transition-all duration-300">
            <div class="bg-white p-3 rounded-xl shadow-xl">
                <?php include 'public/img/svg/logout.php'; ?>
            </div>
            <span id="text_btn" class="text-gray-700 text-sm">Wyloguj</span>
        </a>
        </section>
    </section>
</section>
<script>
    const mobile_btn = document.getElementById('hamburger');
    const mobile_nav = document.getElementById('mobile_nav');
    const mobile_nav_fixed = document.getElementById('mobile_nav_fixed');
    const hamburger = document.getElementById('hamburger');
    mobile_btn.addEventListener('click', () => {
        //zmiana wysokości elementu

        if(mobile_nav.style.height == '100vh')
            mobile_nav.style.height = '0vh';
        else
            mobile_nav.style.height = '100vh';
        //usunięcie lub dodanie clasy shadow-xl dla elementu mobile_nav_fixed
        mobile_nav_fixed.classList.toggle('shadow-xl');
    });
    //nadanie lub zabranie klass: bg-[#fff0] before:rotate-45 before:translate-y-[0px] after:rotate-[-45deg] after:translate-y-[0px] fixed dla elementu o id huamburger
    mobile_btn.addEventListener('click', () => {
        hamburger.classList.toggle('bg-[#fff0]');
        hamburger.classList.toggle('before:rotate-45');
        hamburger.classList.toggle('before:translate-y-[0px]');
        hamburger.classList.toggle('after:rotate-[-45deg]');
        hamburger.classList.toggle('after:translate-y-[0px]');
    });
    //transformacja svg o id mobile_btn do krzyżyka z hamburgera używając animacji
    // const mobile_btn_svg = document.getElementById('mobile_btn').children[0];
    // mobile_btn.addEventListener('click', () => {
    //     if(mobile_btn_svg.getAttribute('d') == 'M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5')
    //         mobile_btn_svg.setAttribute('d', 'M6.75 6.75L17.25 17.25M6.75 17.25L17.25 6.75');
    //     else
    //         mobile_btn_svg.setAttribute('d', 'M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5');
    // });

    
    
    
</script>