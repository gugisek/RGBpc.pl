<?php
include 'flyout_menu_sklep.php'; ?>
<?php include 'flyout_menu_uslugi.php'; ?>
<header class="absolute inset-x-0 top-0 z-50">
      <div id="sidenav_mobile" class="transition-all duration-150 fixed inset-y-0 right-0 z-[101] w-full overflow-y-auto bg-violet-500 px-6 py-6 lg:hidden sm:max-w-sm sm:ring-1 sm:ring-white/10 right-[-100%]">
        <div class="flex items-center justify-between">
          <a href="/" class="-m-1.5 p-1.5 px-4">
          <img data-aos="fade-down" data-aos-delay="100" class="h-8 w-auto aos-init aos-animate" src="img/logo2.png" alt="">
        </a>
          <button onclick="openNavToggle()" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-100">
            <span class="sr-only">Close menu</span>
            <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div class="mt-20 flow-root">
          <div class="-my-6 divide-y divide-gray-500/25">
            <div class="space-y-2 py-6 font-[poppins] text-xl flex flex-col gap-4">
            <?php
                $a = ["Sklep", "Made in Poland", "Usługi", "O nas", "Kontakt"];
                $a_link = ["sklep.php", "#produkt", "#oferta", "#pytania", "kontakt.php"];
                for ($i = 0; $i < count($a); $i++) {
                  echo "<a  href='" . $a_link[$i] . "' class='w-full '><span class='text-xl font-semibold leading-6 text-white hover:bg-white/40 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all'>" . $a[$i];
                  echo "</span></a>";
                }
                ?>
            </div>
            <div class="py-6">
            <?php
              if (isset($_SESSION['logged'])) {
                echo '
                        <div class="flex flex-col gap-4 font-[poppins]" role="none">';
                            
                            if($_SESSION['dashboard']!=5){
                              echo '
                              <a href="panel.php" class="w-full py-1"><span class="text-xl font-semibold leading-6 text-white hover:bg-white/40 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">Panel WSZM</span></a>
                              ';
                            }

                            echo '
                            <a href="" class="w-full py-1"><span class="text-xl font-semibold leading-6 text-white hover:bg-white/40 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">Ustawienia konta</span></a>

                            <a href="scripts/login/logout.php" class="w-full py-1"><span class="text-xl font-semibold leading-6 text-white hover:bg-white/40 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">Wyloguj się</span></a>
                    </div>
                ';
              } else {
                echo '
                  <a href="login" class="font-[poppins] text-xl font-semibold leading-6 text-white hover:bg-white/40 px-8 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">Zaloguj się</a>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5 px-4">
          <img data-aos="fade-down" data-aos-delay="100" class="h-8 w-auto " src="img/logo2.png" alt="">
        </a>
      </div>
      <div class="flex lg:hidden">
        <button onclick="openNavToggle()" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex xl:gap-x-8 lg:gap-x-4">
        <?php
        $a = ["Sklep", "Made in Poland", "Usługi", "O nas", "Kontakt"];
        $a_link = ["sklep.php", "#produkt", "#oferta", "#pytania", "kontakt.php"];
        for ($i = 0; $i < count($a); $i++) {
          echo "<a id='" . $a[$i] . "' data-aos='fade-down' data-aos-delay='" . (100 * ($i + 1)) . "' href='" . $a_link[$i] . "' nawigacja class='flex items-center justify-center'><span class='flex flex-row items-center justify-center gap-2 text-sm font-semibold leading-6 text-black hover:bg-violet-600/30 px-8 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all'>" . $a[$i];
          if ($a[$i] == 'Sklep' or $a[$i] == 'Usługi') {
            echo '
            <svg class="h-5 w-5 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
            ';
          }
          echo "</span></a>";
        }
        ?>
      </div>
      <div data-aos="fade-down" data-aos-delay="600" class="hidden lg:flex lg:flex-1 lg:justify-end items-center">
        <a href="login" class="text-sm font-semibold leading-6 text-black hover:bg-violet-600/30 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
        </a>
          <?php
          if (isset($_SESSION['logged'])) {
            echo '
            <div class="dropdown flex gap-4">
            <a class="flex flex-row items-center gap-2 dropbtn text-sm font-semibold leading-6 text-black hover:bg-violet-600/30 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">
              <span>Hej, ' . $_SESSION['user'] . '</span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            </a>
            <div class="dropdown-content pointer-events-none duration-150">
                <div class="pointer-events-auto mt-8 w-56 rounded-2xl bg-white  divide-y divide-gray-300 shadow-lg border border-gray-200 p-2 focus:outline-none duration-150">
                    <div class="flex flex-col gap-1" role="none">
                        <a class="text-xs font-medium text-gray-400 px-4 capitalize">                        
                            ' . $_SESSION['role'] . '
                        </a>';
                        
                        if($_SESSION['dashboard']!=5){
                          echo '
                          <a id="nav_button" href="panel.php" class="my_account active:scale-95 rounded-xl text-gray-700 group cursor-pointer duration-150 hover:bg-gray-100 hover:text-violet-500 flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 h-5 w-5 text-gray-400 group-hover:text-violet-500 duration-150">
                              <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>


                            Panel WSZM
                        </a>
                          ';
                        }

                        echo '<a id="nav_button"  class="my_account active:scale-95 rounded-xl text-gray-700 group cursor-pointer duration-150 hover:bg-gray-100 hover:text-violet-500 flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 h-5 w-5 text-gray-400 group-hover:text-violet-500 duration-150">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                            Ustawienia konta
                        </a>
                        <a href="scripts/login/logout.php" class="text-gray-700 rounded-xl border-t active:scale-95 border-[0.5] border-gray-100 hover:text-violet-500 group cursor-pointer duration-150 hover:bg-gray-100 flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 h-5 w-5 text-gray-400 group-hover:text-violet-500 duration-150">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>

                            Wyloguj się
                        </a>
                </div>
            ';
          } else {
            echo '
            <a href="login.php" class="text-sm font-semibold leading-6 text-black hover:bg-violet-600/30 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">
              Zaloguj się <span aria-hidden="true">&rarr;</span>
            </a>';
          }
          ?>
      </div>
    </nav>
  </header>
  <script>

    const nawigacja = document.getElementById('Sklep');
    const menu = document.getElementById('fly_Sklep');

    nawigacja.addEventListener('mouseenter', () => {
    menu.classList.add('active');
    });

    nawigacja.addEventListener('mouseleave', () => {
    setTimeout(() => {
        if (!menu.matches(':hover')) {
        menu.classList.remove('active');
        }
    }, 100); // Delay to allow transition between nawigacja and menu
    });

    menu.addEventListener('mouseenter', () => {
    menu.classList.add('active');
    });

    menu.addEventListener('mouseleave', () => {
    menu.classList.remove('active');
    });

    const nawigacja2 = document.getElementById('Usługi');
    const menu2 = document.getElementById('fly_Uslugi');

    nawigacja2.addEventListener('mouseenter', () => {
    menu2.classList.add('active');
    });

    nawigacja2.addEventListener('mouseleave', () => {
    setTimeout(() => {
        if (!menu2.matches(':hover')) {
        menu2.classList.remove('active');
        }
    }, 100); // Delay to allow transition between nawigacja and menu
    });

    menu2.addEventListener('mouseenter', () => {
    menu2.classList.add('active');
    });

    menu2.addEventListener('mouseleave', () => {
    menu2.classList.remove('active');
    });

</script>
<script>
function openNavToggle() {
  const backdrop = document.getElementById('backdrop');
  const sidenav = document.getElementById('sidenav_mobile');
  sidenav.classList.toggle('right-[-100%]');
}
</script>