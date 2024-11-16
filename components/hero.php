<div class="w-full min-h-screen ">
    <?php include 'components/nav/navbar.php'; ?>
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
      <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-violet-800 to-red-800 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="w-full min-h-screen flex flex-col gap-8 items-center justify-center">
      <!-- <div class="w-2/3 shadow-xl h-[400px] bg-white rounded-2xl flex items-center justify-center">
        img
      </div>
      <div class="rounded-2xl border border-gray-200 bg-gray-50 w-1/3 flex flex-row px-4 divide-x">
            <a href="" class="py-2 w-full text-center text-xs">Promocja</a>
            <a href="" class="py-2 w-full text-center text-xs">Zniżki</a>
            <a href="" class="py-2 w-full text-center text-xs">Usługi</a>
            <a href="" class="py-2 w-full text-center text-xs">Wysyłka</a>
      </div> -->
        <div class="flex md:flex-row flex-col items-center gap-4">
            <img class="sm:h-18 h-12 w-auto" src="img/logo2.png" alt="">
            <div class="border-l border-gray-600 pl-4">
                <p class="font-bold text-lg font-[poppins]">Twój ulubiony</p>
                <div class="text-2xl typing-text h-[30px] -mt-2"></div>
            </div>
        </div>      

  </div>
</div>

<div class="absolute inset-x-0 bottom-0 z-10">
    <nav class="flex items-center justify-center p-6 lg:px-8 animate-bounce	" aria-label="Global">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
        </svg>

    </nav>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const texts = ["Sklep komputerowy", "WEB developer", "Serwis PC/laptopów"];
    let index = 0;
    const typingText = document.querySelector('.typing-text');

    function typeText() {
        const currentText = texts[index];
        let charIndex = 0;

        const typeInterval = setInterval(() => {
            if (charIndex < currentText.length) {
                typingText.textContent += currentText[charIndex];
                charIndex++;
            } else {
                clearInterval(typeInterval);
                setTimeout(deleteText, 2000); // Czeka 2 sekundy, a potem zaczyna usuwać
            }
        }, 100);
    }

    function deleteText() {
        let charIndex = typingText.textContent.length;

        const deleteInterval = setInterval(() => {
            if (charIndex > 0) {
                typingText.textContent = typingText.textContent.slice(0, charIndex - 1);
                charIndex--;
            } else {
                clearInterval(deleteInterval);
                index = (index + 1) % texts.length; // Przejdź do następnego tekstu
                setTimeout(typeText, 500); // Czeka 500 ms, a potem zaczyna pisać nowy tekst
            }
        }, 50);
    }

    typeText();
});

</script>