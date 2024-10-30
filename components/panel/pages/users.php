<section data-aos="fade-up" data-aos-delay="100">
    <div class="flex items-center justify-between">
        <div class="text-gray-400">
        <span id="nav_button_users" onclick="openUsersSite('users_table')" class="users_table font-medium text-2xl hover:text-violet-500 duration-150 cursor-pointer">Użytkownicy </span><span id="nav_button_users" onclick="openUsersSite('employe_table')" class="employe_table font-medium text-2xl hover:text-violet-500 duration-150 cursor-pointer">i pracownicy</span>
        </div>
        <div class="hover:text-white hover:bg-violet-500 hover:shadow-xl shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </div>
    </div>

    <section class="flex flex-col gap-4">
        <div class="grid grid-cols-7 text-sm text-gray-400 font-[poppins] bg-white rounded-2xl shadow-xl mt-4">
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Pracownik
            </div>
            <div class="col-span-2 font-medium py-5 pl-4 pr-3 sm:pl-6">
                Opis
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Status
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Rola
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Zatrudniony
            </div>
            <div class="font-medium py-5 pl-4 pr-3 sm:pl-6">
                Ostatnio widziany
            </div>
        </div>
        <div id="table_body"></div>
    </section>
</section>
<script>
    function openUsersSite(site) {
    var body = document.getElementById("table_body");
     body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
    const url = "components/panel/users/" + site + ".php";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const parsedDocument = parser.parseFromString(data, "text/html");
            body.innerHTML = parsedDocument.body.innerHTML;

            // Wywołaj funkcję do wykonania skryptów
            executeScripts(parsedDocument);

            // Dodaj nowy wpis do historii przeglądarki
            //const newUrl = window.location.origin + window.location.pathname + "?" + site;
            //history.pushState({ path: newUrl }, "", newUrl);
        });
    // Zapisz URL w localStorage
    //przetłumaczenie site na tekst normalny

    localStorage.setItem("UsersPanelSite", site);
    var removeButtons = document.querySelectorAll("#nav_button_users");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].classList.remove("text-black");
    }

    var activeButtons = document.querySelectorAll("." + site);
    for(var i = 0; i < activeButtons.length; i++) {  
      activeButtons[i].classList.add("text-black");
    }
}

function executeScripts(parsedDocument) {
    // Przechodź przez znalezione skrypty i wykonuj je
    const scripts = parsedDocument.querySelectorAll("script");
    scripts.forEach(script => {
        const scriptElement = document.createElement("script");
        scriptElement.textContent = script.textContent;
        document.body.appendChild(scriptElement);
    });
}

var userspanelSite = localStorage.getItem("UsersPanelSite");
if (userspanelSite == null) {
    openUsersSite('users_table');
} else {
    openUsersSite(userspanelSite);
    var removeButtons = document.querySelectorAll("#nav_button_users");
    for (var i = 0; i < removeButtons.length; i++) {
      removeButtons[i].classList.remove("text-black");
    }

    var activeButtons = document.querySelectorAll("." + userspanelSite);
    for(var i = 0; i < activeButtons.length; i++) {  
      activeButtons[i].classList.add("text-black");
    }
}
</script>
<?php 
$name_in_scripts = 'Users';
$delete_path = 'scripts/users/delete.php';
$path = 'components/panel/users/users_edit.php';
include "../../popup.php";
?>
<?php 
$name_in_scripts = 'UsersAdd';
$delete_path = '';
$path = '../users/users_add.php';
include "../../popup.php";
?>