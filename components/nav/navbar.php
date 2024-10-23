<?php include 'flyout_menu_sklep.php'; ?>
<?php include 'flyout_menu_uslugi.php'; ?>
<header class="absolute inset-x-0 top-0 z-50">
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
      <div class="hidden lg:flex lg:gap-x-8">
        <?php
        $a = ["Sklep", "Made in Poland", "Usługi", "O nas", "Kontakt"];
        $a_link = ["sklep.php", "#produkt", "#oferta", "#pytania", "#kontakt"];
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
      <div data-aos="fade-down" data-aos-delay="600" class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="login" class="text-sm font-semibold leading-6 text-black hover:bg-violet-600/30 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
        </a>
        <a href="login" class="text-sm font-semibold leading-6 text-black hover:bg-violet-600/30 px-4 py-1 rounded-lg hover:text-violet-500 druation-150 active:scale-95 transition-all">Zaloguj się <span aria-hidden="true">&rarr;</span></a>
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
