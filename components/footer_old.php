    <section class="bg-blue-50 flex flex-col items-center justify-center h-screen w-full">
        <img src="img/logo2.png" alt="" class="mb-14        ">
        <footer class="">
            <div class="mx-auto max-w-7xl overflow-hidden">
                <nav class="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">
                    <?php
                    $a = ["Strona główna", "WSZM-rgbpc.pl", "Jabłkowy protokół", "O nas", "Kontakt", "Polityka prywatności", "Regulamin serwisu"];
                    $a_link = ["https://rgbpc.pl", "https://wszm.rgbpc.pl", "https://rgbpc.pl/home-rgbpc.pl/protokol/", "#", "#", "#", "#"];
                    for ($i = 0; $i < count($a); $i++) {
                        echo "<div class='pb-6'>";
                        echo "<a href='" . $a_link[$i] . "' class='theme-text-hover duration-150 text-sm leading-6 text-gray-600 hover:text-blue-600'>" . $a[$i] . "</a>";
                        echo "</div>";
                    }
                    ?>
                </nav>

                <p class="mt-10 text-center text-xs leading-5 text-gray-500">2024 RGBpc.pl - designed and build by <a href="https://github.com/gugisek" target="_blank" class="text-gray-800 hover:text-blue-600 duration-150">gugisek</a> <br/>
                powered by <a href="https://rgbpc.pl/" target="_blank" class="theme-text-hover duration-300"><span class="text-red-600">R</span><span class="text-green-600">G</span><span class="text-blue-600">B</span>pc.pl
                </p>
            </div>
        </footer>
    </section>