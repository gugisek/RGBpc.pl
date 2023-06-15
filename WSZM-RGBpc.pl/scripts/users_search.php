<form action="panel.php?page=użytkownicy&action=" method="POST" class="w-full flex gap-6">
    <button type="submit" id="subm">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
    </button>
    <input type="text" placeholder="<?php if (isset($_POST['search']) && $_POST['search']!="") { echo $_POST['search']; } else { echo "Wyszukaj"; } ?>" name="search" id="search" class="w-full outline-none font-light">
    <?php include 'scripts/users_search_role.php'; ?>
    <?php include 'scripts/users_search_state.php'; ?>
    <div class="flex gap-2">
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6 text-gray-500 hover:text-green-500 trnasition-all duration-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6 text-gray-500 hover:text-red-500 trnasition-all duration-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
    </div>
</form>