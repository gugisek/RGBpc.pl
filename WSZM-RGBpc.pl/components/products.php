<section class="w-full flex flex-col items-center px-5 pt-5 gap-4">
    <section class="w-full flex gap-4">
        <section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6 flex">
            <!-- search -->
            <?php include 'product_scripts/products_search.php'; ?>
            <!-- script for working enter to submit on select -->
            <?php include 'product_scripts/products_option_enter.php'; ?>
        </section>
        <a href="?page=produkty&action=add" class="flex items-center justify-center px-8 bg-indigo-400 hover:shadow-indigo-500 transition-all duration rounded-3xl hover:shadow-[0px_8px_19px_0px] hover:scale-105 shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </a>
    </section>
    <?php
        $action = $_GET['action'];
        include 'product_scripts/products_front_edit.php';
        include 'product_scripts/products_front_add.php';
        include 'product_scripts/products_front_table.php';
    ?>
</section>