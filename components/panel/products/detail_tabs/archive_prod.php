<section data-aos="fade-in" data-aos-delay="100">
    <?php $product_id = $_GET['id']; ?>
    <div id="product_detail_archive_table_body">
        <?php include 'archive_table.php'; ?>
    </div>
</section>
<script>
    function openPageArchive(number) {
    var body = document.getElementById("product_detail_archive_table_body");
    body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
    const url = "components/panel/products/detail_tabs/archive_table.php?page_id=" + number + "&product_id=" + <?=$product_id?>;
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


</script>