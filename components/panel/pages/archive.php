<section data-aos="fade-up" data-aos-delay="100">
    <h1 class="font-medium text-2xl">Archiwum zmian</h1>
    <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle">
        <section class="w-full">
            <div id="table_body">
                <?php include '../archive/table.php'; ?>
            </div>
        </section>
      </div>
    </div>
  </div>
</section>

<script>
    function openPageArchive(number) {
    var body = document.getElementById("table_body");
    body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
    const url = "components/panel/archive/table.php?page_id=" + number;
    fetch(url)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const parsedDocument = parser.parseFromString(data, "text/html");
            body.innerHTML = parsedDocument.body.innerHTML;
            executeScripts(parsedDocument);
        });
    // var removeButtons = document.querySelectorAll("#nav_button_details");
    // for (var i = 0; i < removeButtons.length; i++) {
    //   removeButtons[i].classList.remove("text-violet-600");
    // }
    // var activeButtons = document.querySelectorAll("." + site);
    // for(var i = 0; i < activeButtons.length; i++) {  
    //   activeButtons[i].classList.add("text-violet-600");
    // }
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
</script>


<?php 
$name_in_scripts = 'Logs';
$delete_path = '';
$close = 'true';
$path = 'components/panel/archive/logs_details.php';
include "../../popup.php";
?>