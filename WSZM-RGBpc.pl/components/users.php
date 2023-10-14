<section class="w-full flex flex-col items-center px-5 pt-5 gap-4">
    <section class="w-full flex gap-4">
        <section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6 flex">
            <!-- search -->
            <?php include 'user_scripts/users_search.php'; ?>
            <!-- script for working enter to submit on select -->
            <?php include 'user_scripts/users_option_enter.php'; ?>
        </section>
        <a href="?page=użytkownicy&action=add" class="flex items-center justify-center px-8 bg-indigo-400 hover:shadow-indigo-500 transition-all duration rounded-3xl hover:shadow-[0px_8px_19px_0px] hover:scale-105 shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="text-white w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
            </svg>
        </a>
    </section>
    <?php include 'user_scripts/popups.php'; ?>
    <?php
        $action = $_GET['action'];
        //include 'user_scripts/users_front_edit.php';
        include 'user_scripts/users_front_add.php';
        include 'user_scripts/users_front_table.php';
    ?>
</section>