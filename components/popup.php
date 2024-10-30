
<section id="popup<?=$name_in_scripts?>Bg" class="fixed backdrop-blur-sm z-[50] h-0 opacity-0 top-0 left-0 w-full h-full bg-[#00000051] transition-opacity duration-300"></section>
  <section id="popup<?=$name_in_scripts?>" onclick="popup<?=$name_in_scripts?>CloseConfirm()" class="z-[60] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" class="bg-white shadow-xl md:min-w-[400px] md:w-auto w-full max-w-[800px] max-h-[80vh] min-h-[20vh] overflow-y-auto flex flex-col items-center py-4 px-4 gap-4 rounded-[25px] sm:px-6  -xl">
        <div class="w-full flex flex-row justify-end">
            <button onclick="popup<?=$name_in_scripts?>CloseConfirm()" type="button" class="rounded-md text-gray-800 hover:text-gray-400 flex flex-row gap-2 text-sm items-center duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
                <span class="sr-only">Zamknij</span>Zamknij
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div id="popupItself" class="flex h-auto w-full justify-between flex-col">
            <div id="pupup<?=$name_in_scripts?>Output"></div>
        </div>
      </div>
    </div>
</section>

<section id="popup<?=$name_in_scripts?>CloseBg" class="fixed z-[65] backdrop-blur-md h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popup<?=$name_in_scripts?>Close" onclick="popup<?=$name_in_scripts?>CloseConfirm()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
        <div class="relative transform overflow-hidden rounded-[25px] bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
            <button onclick="popup<?=$name_in_scripts?>CloseConfirm()" type="button" class="rounded-md text-gray-800 hover:text-gray-600 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-gray-200 sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
              <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Masz niezapisane zmiany</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-700">Czy na pewno chcesz wyjść mając niezapisane zmiany? Nie ma możliwości przywrócenia tych zmian.</p>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
            <button onclick="popup<?=$name_in_scripts?>CloseConfirm()" type="button" class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-full bg-gray-900 duration-150 px-4 py-2 text-sm font-medium text-white shadow-sm hover:shadow-xl hover:bg-gray-500 sm:ml-3 sm:w-auto">Zostań</button>
            <button onclick="popup<?=$name_in_scripts?>OpenClose();popup<?=$name_in_scripts?>CloseConfirm()" type="button" class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-medium text-gray-900 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:ring-gray-500 hover:bg-gray-500 hover:text-white hover:shadow-xl duration-150 sm:mt-0 sm:w-auto">Nie zapisuj</button>
          </div>
        </div>
      </div>
    </div>
  </section>

<section id="popup<?=$name_in_scripts?>DeleteBg" class="fixed z-[65] backdrop-blur-md	h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popup<?=$name_in_scripts?>Delete" onclick="popup<?=$name_in_scripts?>Delete()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
        <div class="relative transform overflow-hidden rounded-[25px] bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
            <button onclick="popup<?=$name_in_scripts?>Delete()" type="button" class="rounded-md text-gray-800 hover:text-gray-600 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 theme-ring-focus focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-gray-200 sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
              <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Usuń rekord z bazy danych</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-700">Czy na pewno chcesz usunąć ten rekord z bazy danych? Nie ma możliwości przywrócenia tych danych.</p>
              </div>
            </div>
          </div>
          <form action="<?=$delete_path?>" method="POST" class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
              <input type="hidden" name="id" id="id_for_delete" value="<?=$id?>">
              <button class="active:scale-95 duration-150 mt-3 inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-medium text-gray-900 shadow-sm sm:ml-3 ring-inset ring-1 ring-[#3d3d3d] hover:ring-red-500 hover:bg-red-500 hover:text-white hover:shadow-xl duration-150 sm:mt-0 sm:w-auto">Usuń</button>
              <button onclick="popup<?=$name_in_scripts?>Delete()" type="button" class="sm:mt-0 mt-3 active:scale-95 duration-150 inline-flex w-full justify-center rounded-full bg-gray-900 duration-150 px-4 py-2 text-sm font-medium text-white shadow-sm hover:shadow-xl hover:bg-gray-500 sm:ml-3 sm:w-auto">Anuluj</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  

 <script>
    function popup<?=$name_in_scripts?>OpenClose() {
       var popup = document.getElementById("popup<?=$name_in_scripts?>")
       var popupBg = document.getElementById("popup<?=$name_in_scripts?>Bg")
       popupBg.classList.toggle("opacity-0")
       popupBg.classList.toggle("h-0")
       popup.classList.toggle("scale-0")
       popup.classList.add("duration-200")

    }
    function openPopup<?=$name_in_scripts?>(id) {
        //wstawienie wartośći id do id_for_delete
        var id_for_delete = document.getElementById("id_for_delete");
        id_for_delete.value = id;

        var popupOutput = document.getElementById("pupup<?=$name_in_scripts?>Output");
        popupOutput.innerHTML = "<div class='w-full flex items-center justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-xl'><div class='lds-dual-ring'></div></div></div>";
        popup<?=$name_in_scripts?>OpenClose();
        const url = "<?=$path?>?id="+id;
        fetch(url)
            .then(response => response.text())
            .then(data => {
            const parser = new DOMParser();
            const parsedDocument = parser.parseFromString(data, "text/html");

            // Wstaw zawartość strony (bez skryptów) do "panel_body"
            popupOutput.innerHTML = parsedDocument.body.innerHTML;

            // Przechodź przez znalezione skrypty i wykonuj je
            const scripts = parsedDocument.querySelectorAll("script");
            scripts.forEach(script => {
                const scriptElement = document.createElement("script");
                scriptElement.textContent = script.textContent;
                document.body.appendChild(scriptElement);
            });
            });
            
    }
</script>
<script>
    function popup<?=$name_in_scripts?>CloseConfirm() {
        var popup = document.getElementById("popup<?=$name_in_scripts?>Close")
        var popupBg = document.getElementById("popup<?=$name_in_scripts?>CloseBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
</script>

<script>
    function popup<?=$name_in_scripts?>Delete() {
        var popup = document.getElementById("popup<?=$name_in_scripts?>Delete")
        var popupBg = document.getElementById("popup<?=$name_in_scripts?>DeleteBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
</script>