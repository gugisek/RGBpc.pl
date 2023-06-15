<section class="w-full flex flex-col items-center px-5 pt-5 gap-4">
    <section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6 flex">      
        <form action="panel.php?page=użytkownicy&action=" method="POST" class="w-full flex gap-6">
            <button type="submit" id="subm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
            <input type="text" placeholder="<?php if (isset($_POST['search']) && $_POST['search']!="") { echo $_POST['search']; } else { echo "Wyszukaj"; } ?>
            " name="search" id="search" class="w-full outline-none font-light">
            <div class="flex flex-col">
                <label for="role" class="text-xs text-gray-500">Rola</label>
                <select name="role" id="role" class="font-light outline-none capitalize">
                    <?php
                    include 'scripts/conn_db.php';
                    $sql = "SELECT * FROM `user_roles`;";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        echo "<option value=''>Wszyscy</option>";
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<option class='capitalize'";
                            if (isset($_POST['role']) && $_POST['role']==$row['id']) { echo "selected"; }
                            echo " value='".$row['id']."'>".$row['role']."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="status" class="text-xs text-gray-500">Status</label>
                <select name="status" id="status" class="font-light outline-none capitalize">
                    <?php
                    include 'scripts/conn_db.php';
                    $sql = "SELECT * FROM `user_status`;";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        echo "<option value=''>Wszyscy</option>";
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<option class='capitalize'";
                            if (isset($_POST['status']) && $_POST['status']==$row['id']) { echo "selected"; }
                            echo " value='".$row['id']."'>".$row['status']."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="flex gap-2">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6 text-gray-500 hover:text-green-500 trnasition-all duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </button>
                <button class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6 text-gray-500 hover:text-red-500 trnasition-all duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
        </form>
        <script>
            var input = document.getElementById("role");
            input.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("subm").click();
            }
            });

            var input2 = document.getElementById("status");
            input2.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("subm").click();
            }
            });
        </script>
    </section>
    <?php
$action = $_GET['action'];
if ($action=="edit") {
    $id = $_GET['id'];
    $sql = "SELECT users.id, users.name, users.mail, users.sur_name, user_roles.role, users.create_date, user_status.status FROM `users` join user_roles on users.role_id=user_roles.id join user_status on user_status.id=users.status_id where users.id=$id;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $create_date = $row['create_date'];
            echo "<section id='edit' class='w-full bg-white shadow-xl rounded-3xl py-6 px-6'>";
            echo "<h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Edytuj użytkownika</h1>";
            echo "<form action='scripts/edit_user.php' method='post' class='flex flex-col gap-4'>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "<div class='flex flex-col gap-2'>";
            echo "<label for='name' class='text-xs text-gray-500'>Imię</label>";
            echo "<input type='text' name='name' id='name' class='w-full py-2 px-4 rounded-lg shadow-sm focus:outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-green-500 focus:border-transparent' value='".$row['name']."'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
            echo "<label for='sur_name' class='text-xs text-gray-500'>Nazwisko</label>";
            echo "<input type='text' name='sur_name' id='sur_name' class='w-full py-2 px-4 rounded-lg text-gray-700 focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent' value='".$row['sur_name']."'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
            echo "<label for='mail' class='text-xs text-gray-500'>E-mail</label>";
            echo "<input type='text' name='mail' id='mail' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent' value='".$row['mail']."'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
            echo "<label for='role' class='text-xs text-gray-500'>Rola</label>";
            echo "<select name='role' id='role' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent'>";
            $sql2 = "SELECT * FROM `user_roles`;";
            $result2 = mysqli_query($conn, $sql2);
            if(mysqli_num_rows($result2) > 0)
            {
                while($row2 = mysqli_fetch_assoc($result2))
                {
                    echo "<option value='".$row2['id']."'";
                    if ($row2['role']==$row['role']) {
                        echo " selected";
                    }
                    echo ">".$row2['role']."</option>";
                }
            }
            echo "</select>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
            echo "<label for='status' class='text-xs text-gray-500'>Status</label>";
            echo "<select name='status' id='status' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent'>";
            $sql3 = "SELECT * FROM `user_status`;";
            $result3 = mysqli_query($conn, $sql3);
            if(mysqli_num_rows($result3) > 0)
            {
                while($row3 = mysqli_fetch_assoc($result3))
                {
                    echo "<option value='".$row3['id']."'";
                    if ($row3['status']==$row['status']) {
                        echo " selected";
                    }
                    echo ">".$row3['status']."</option>";
                }
            }
            echo "</select>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
            echo "<label for='create_date' class='text-xs text-gray-500'>Data utworzenia</label>";
            echo "<input type='text' name='create_date' id='create_date' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent' value='".substr($create_date, 0, strrpos($create_date, ' ', 0))."' disabled>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
            echo "<label for='password' class='text-xs text-gray-500'>Hasło</label>";
            echo "<input type='password' name='password' id='password' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
            echo "<label for='password2' class='text-xs text-gray-500'>Powtórz hasło</label>";
            echo "<input type='password' name='password2' id='password2' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-row gap-2'>";
            echo "<button type='submit' class='w-full py-2 px-4 bg-green-500 hover:bg-green-600 hover:shadow-green-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Zapisz</button>";
            echo "<a href='?page=użytkownicy&action=' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>";
            echo "</div>";
            echo "</form>";
            echo "</section>";
        }
    }
    else
    {
        echo "<section class='w-full bg-white shadow-xl rounded-3xl py-6 px-6 mt-6'>";
        echo "<h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Edytuj użytkownika</h1>";
        echo "<p class='text-sm text-gray-500'>Nie znaleziono użytkownika o podanym ID.</p>";
        echo "</section>";
    }
    // notification for output of edit user
}elseif($action=='edited') {
    echo "<section id='edited' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6 mt-6'>";
    echo "<h1>Pomyślnie edytowano użytkownika.</h1>";
    echo '<a href="?page=użytkownicy&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
  </svg></a>
  ';
    echo "</section>";
}elseif($action=='error_pswd') {
    echo "<section id='edited' class='flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6 mt-6'>";
    echo "<h1>Podane hasła są różne!</h1>";
    echo '<a href="?page=użytkownicy&action=" class="hover:rotate-90 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
  </svg></a>
  ';
    echo "</section>";
}elseif($action=='error') {
    echo "<section id='edited' class='flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6 mt-6'>";
    echo "<h1>Błąd bazy danych. Spróbuj ponownie lub skontaktuj się z administratorem.</h1>";
    echo '<a href="?page=użytkownicy&action=" class="hover:rotate-90 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
  </svg></a>
  ';
    echo "</section>";
}elseif($action=='edited_pswd') {
    echo "<section id='edited' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6 mt-6'>";
    echo "<h1>Pomyślnie edytowano użytkownika oraz jego hasło.</h1>";
    echo '<a href="?page=użytkownicy&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
  </svg></a>
  ';
    echo "</section>";
}elseif($action=='edited_same') {
    echo "<section id='edited' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6 mt-6'>";
    echo "<h1>Podane hasło nie różni się od poprzedniego.</h1>";
    echo '<a href="?page=użytkownicy&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
  </svg></a>
  ';
    echo "</section>";
}
?>
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
</section>