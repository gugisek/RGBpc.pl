<section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6">
    <h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Archiwum</h1>
    <table class="w-full">
        <tr class="uppercase text-left text-xs text-gray-400 ">
            <th class="w-[10%] text-center">ID</th>
            <th class="w-1/3 text-center">Użytkownik</th>
            <th class="text-center py-3 w-1/6">Data</th>
            <th class="w-1/6 text-center">Opis</th>
            <th class="w-1/6">ID objektu</th>
            <th class="w-1/6">Typ objektu</th>
            <th class="w-1/6">Typ rekordu</th>
        </tr>
        <?php
            include 'scripts/conn_db.php';
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $role = $_POST['role'];
                $status = $_POST['status'];
            }
            else {
                $search = "";
                $role = "";
                $status = "";
            }
            // SELECT users.id, users.name, users.mail, users.sur_name, user_roles.role, users.create_date, user_status.status FROM `users` join user_roles on users.role_id=user_roles.id join user_status on user_status.id=users.status_id where (name like '%$search%' and role_id like '%$role%' and status_id like '%$status%') or (sur_name like '%$search%' and role_id like '%$role%' and status_id like '%$status%') or (mail like '%$search%' and role_id like '%$role%' and status_id like '%$status%') 
            $sql = "SELECT logs.id, users.name, users.sur_name, logs.when, logs.object_id, logs.object_type, logs.type, logs.description FROM `logs` join users on users.id=logs.user_id;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {

                    echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                        echo "<td class='py-3 text-gray-800 text-center'>".$row['id']."</td>";
                        echo "<td class='py-3 text-gray-800'>".$row['name']." ".$row['sur_name']."</td>";
                        echo "<td class='text-center capitalize text-sm text-gray-500'>".$row['role']."</td>";
                        echo "<td class='text-center capitalize text-sm";
                            if ($row['status']=="aktywne") {
                                echo " text-green-500";
                            }
                            else if ($row['status']=="nieaktywne") {
                                echo " text-gray-500";
                            }
                            else if ($row['status']=="zbanowane") {
                                echo " text-red-500 cursor-not-allowed";
                            }
                            else if ($row['status']=="wyłączone") {
                                echo " text-yellow-500";
                            }
                        echo "'>";
                            echo $row['status'];
                        echo "</td>";
                        echo "<td class='text-center text-sm text-gray-500'>".substr($create_date, 0, strrpos($create_date, ' ', 0))."</td>";
                        echo "<td class='text-center text-sm'><a href='?page=użytkownicy&action=edit&id=".$row['id']."#edit' class='text-indigo-500 hover:text-[1rem] transition-all duration-300 '>Edytuj</a></td>";
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
</section>