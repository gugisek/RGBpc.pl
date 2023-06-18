<section class="w-full flex flex-col items-center px-5 pt-5 gap-4">
    <section class="w-full flex gap-4">
            <section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6 flex">
                <!-- search -->
                <?php include 'user_scripts/users_search.php'; ?>
                <!-- script for working enter to submit on select -->
                <?php include 'user_scripts/users_option_enter.php'; ?>
            </section>
    </section>
    <?php
        $action = $_GET['action'];
        if($action == '') {
            include 'arch_scripts/arch_front_table.php';
        }elseif($action == 'details') {
            include 'arch_scripts/arch_front_details.php';
        }
    ?>
</section>