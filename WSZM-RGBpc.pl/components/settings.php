<section class="w-full flex flex-col items-center px-5 pt-5 gap-4">
<?php
                if (isset($_GET['action'])){
                    $action = $_GET['action'];
                }else {
                    $action = '';
                }
                if ($action != 'edit' && $action != 'add' && $action != 'delete' && $action !='') {
                    if($action == 'edited'){
                        $action_status = 'Sukces!';
                        $action_desc = 'Pomyślnie edytowano ustawienia';
                        $action_color = 'green';
                    }elseif($action == 'error'){
                        $action_status = 'Błąd!';
                        $action_desc = 'Nie udało się dokonać zmian ustawień';
                        $action_color = 'red';
                    }elseif($action == 'added'){
                        $action_status = 'Sukces!';
                        $action_desc = 'Pomyślnie dodano ustawienia';
                        $action_color = 'green';
                    }elseif($action == 'deleted'){
                        $action_status = 'Sukces!';
                        $action_desc = 'Pomyślnie usunięto ustawienia';
                        $action_color = 'green';
                    }elseif($action == 'same'){
                        $action_status = 'Błąd!';
                        $action_desc = 'Nie wprowadzono żadnych zmian, ponieważ nie zmieniono żadnych pól lub istnieje już taki wpis w bazie danych';
                        $action_color = 'orange';
                    }elseif($action == 'delete_in_use'){
                        $action_status = 'Błąd!';
                        $action_desc = 'Dany rekord jest użyciu i nie można go usunąć, najpierw modyfikuj rekordy, które go używają, a następnie spróbuj ponownie';
                        $action_color = 'orange';
                    }
                    echo "
                    <div class='flex items-center justify-center rounded-2xl w-full bg-".$action_color."-100 border-l-4 border-".$action_color."-500 text-".$action_color."-700 p-4' role='alert'>
                        <div class='w-full'>
                            <p class='font-bold'>".$action_status."</p>
                            <p>".$action_desc.".</p>
                        </div>
                        <a href='?page=ustawienia&action='>
                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                                <path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12' />
                            </svg>
                        </a>
                    </div>";
                }
                ?>
    <section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6">
        <h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Ustawienia</h1>
        tabela
        tu bezie sie edytowało np. statusy, role zmieniało i tworzyło nowe
    </section>
    <section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6">
        <h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Użytkownicy</h1>
        <div class="w-full flex gap-4">
            <div class="w-1/2">
                <div class="flex justify-between items-center">
                    <h2 class="pb-2 font-medium text-sm text-gray-600 font-[Lexend]">Role</h2>
                    <a href="" class="flex items-center justify-center text-xs text-gray-500 hover:text-green-500">Dodaj role
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>
                    </a>
                </div>
                <?php 
                    if(isset($_GET['setting'])) {
                        $setting = $_GET['setting'];
                    }else {
                        $setting = '';
                    }
                    if ($setting == 'user_role'){
                        include 'setting_scripts/settings_front_role_edit.php';
                    }else{
                        include 'setting_scripts/settings_front_role.php';
                    }
                
                ?>
            </div>
            <div class="w-1/2">
                <div class="flex justify-between items-center">
                    <h2 class="pb-2 font-medium text-sm text-gray-600 font-[Lexend]">Statusy</h2>
                    <a href="?page=ustawienia&action=add&setting=user_status" class="flex items-center justify-center text-xs text-gray-500 hover:text-green-500">Dodaj status
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>
                    </a>
                </div>
                <?php 
                    if ($setting == 'user_status' && $action == 'edit'){
                        include 'setting_scripts/settings_front_status_edit.php';
                    }elseif ($setting == 'user_status' && $action == 'add'){
                        include 'setting_scripts/settings_front_status_add.php';
                    }elseif ($setting == 'user_status' && $action == 'delete'){
                        include 'setting_scripts/settings_front_status_delete.php';
                    }else{
                        include 'setting_scripts/settings_front_status.php';
                    }
                ?>
            </div>
        </div>
    </section>
</section>