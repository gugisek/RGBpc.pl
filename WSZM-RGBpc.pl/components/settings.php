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
                        $action_desc = 'Nie wprowadzono żadnych zmian';
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
                    <a href="" class="flex items-center justify-center text-xs text-gray-500 hover:text-green-500">Dodaj status
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>
                    </a>
                </div>
                <table class="w-full">
                    <tr class="uppercase text-left text-xs text-gray-400 ">
                        <th class="">Status</th>
                    </tr>
                    <?php
                        include 'scripts/conn_db.php';
                        $sql = "SELECT * from user_status";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {

                                echo "<tr class='hover:bg-gray-100 transition-all duration-300 border-t-[0.5px] border-b-[0.5px]' style='cursor: pointer; cursor: hand;' onclick='window.location=`?page=ustawienia&action=details&setting=user_logs&id_sett=".$row['id']."`'>";
                                    echo "<td class='py-3 text-gray-600 text-sm'>".$row['status']."</td>";
                                echo "</tr>";
                                ;
                            }
                        } else {
                            echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                                echo "<td class='py-3 text-gray-800 leading-4 text-sm'>Brak wyników</td>";
                                echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                                echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                                echo "<td class='text-center text-sm text-gray-500'></td>";
                                echo "<td class='text-center text-sm'></td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
</section>