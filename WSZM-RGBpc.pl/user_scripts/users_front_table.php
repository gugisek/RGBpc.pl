<section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6">
    <h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Użytkownicy</h1>
    <table class="w-full">
        <tr class="uppercase text-left text-xs text-gray-400 ">
            <th class="w-1/3">Pracownik</th>
            <th class="w-1/6 text-center">Rola</th>
            <th class="text-center py-3 w-1/6">Status</th>
            <th class="w-1/6 text-center">Zatrudniony</th>
            <th class="w-1/6"></th>
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
            $sql = "SELECT users.id, users.name, users.mail, users.sur_name, user_roles.role, users.create_date, user_status.status FROM `users` join user_roles on users.role_id=user_roles.id join user_status on user_status.id=users.status_id where (name like '%$search%' and role_id like '%$role%' and status_id like '%$status%') or (sur_name like '%$search%' and role_id like '%$role%' and status_id like '%$status%') or (mail like '%$search%' and role_id like '%$role%' and status_id like '%$status%') ;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $create_date = $row['create_date'];
                    echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                        echo "<td class='py-3 text-gray-800 leading-4'>".$row['name']." ".$row['sur_name']."<br><span class='text-xs font-light text-gray-600'>".$row['mail']."</span></td>";
                        echo "<td class='text-center capitalize text-sm text-gray-500'>".$row['role']."</td>";
                        echo "<td class='text-center capitalize text-sm";
                            if ($row['status']=="active") {
                                echo " text-green-500";
                            }
                            else if ($row['status']=="unactive") {
                                echo " text-gray-500";
                            }
                            else if ($row['status']=="banned") {
                                echo " text-red-500 cursor-not-allowed";
                            }
                            else if ($row['status']=="disabled") {
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