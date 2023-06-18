<section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6">
    <h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Archiwum</h1>
    <table class="w-full">
        <tr class="uppercase text-left text-xs text-gray-400 ">
            <th class="px-3 text-center md:w-auto md:table-cell hidden">ID</th>
            <th class="w-1/6">Użytkownik</th>
            <th class="text-center py-3 w-1/6">Data</th>
            <th class="w-[35%] md:table-cell hidden">Opis</th>
            <th class="w-[9%] text-center">ID obiektu</th>
            <th class="w-[9%] text-center">Typ obiektu</th>
            <th class="w-[9%] text-center">Typ rekordu</th>
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
            $sql = "SELECT logs.id, users.name, users.sur_name, logs.when, logs.object_id, logs.object_type, log_types.type,logs.description FROM `logs` join users on users.id=logs.user_id join log_types on log_types.id=logs.type order by id desc;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {

                    echo "<tr class='hover:bg-gray-100 transition-all duration-300 border-t-[0.5px] border-b-[0.5px]' style='cursor: pointer; cursor: hand;' onclick='window.location=`?page=archiwum&action=details&id=".$row['id']."`;'>";
                        echo "<td class='py-3 text-gray-800 text-center md:table-cell hidden'>".$row['id']."</td>";
                        echo "<td class='py-3 text-gray-800'>".$row['name']." ".$row['sur_name']."</td>";
                        echo "<td class='text-center capitalize text-sm text-gray-500'>".$row['when']."</td>";
                        $description = $row['description'];
                        if (strlen($description) > 50) {
                            $description = substr($description, 0, 50)."...";
                        }
                        echo "<td class='text-sm md:table-cell hidden text-gray-600'>".$description."</td>";
                        echo "<td class='text-center text-sm text-gray-500'>".$row['object_id']."</td>";
                        echo "<td class='text-center text-sm capitalize ";
                        if ($row['object_type'] == "users") {
                            echo " text-green-500";
                        }
                        else if ($row['object_type'] == "products") {
                            echo " text-blue-500";
                        }
                        else if ($row['object_type'] == "orders") {
                            echo " text-yellow-500";
                        }
                        else if ($row['object_type'] == "finances") {
                            echo " text-red-500";
                        }
                        else if ($row['object_type'] == "user_roles") {
                            echo " text-purple-500";
                        }
                        else if ($row['object_type'] == "user_status") {
                            echo " text-pink-500";
                        }
                        else if ($row['object_type'] == "log_types") {
                            echo " text-gray-500";
                        }
                        echo "'>".$row['object_type']."</td>";
                        echo "<td class='text-center text-sm text-gray-500 capitalize ";
                        if ($row['type'] == "create") {
                            echo " text-green-500";
                        }
                        else if ($row['type'] == "modify") {
                            echo " text-blue-500";
                        }
                        else if ($row['type'] == "delete") {
                            echo " text-red-500";
                        }
                        echo "'>".$row['type']."</td>";
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