<?php
if ($action == "add") {
    echo "<section id='edit' class='w-full bg-white shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Dodaj użytkownika</h1>";
        echo "<form action='user_scripts/users_back_add.php' method='post' class='flex flex-col gap-4'>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='name' class='text-xs text-gray-500'>Imię</label>";
                echo "<input required type='text' name='name' id='name' class='w-full py-2 px-4 rounded-lg shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='sur_name' class='text-xs text-gray-500'>Nazwisko</label>";
                echo "<input required type='text' name='sur_name' id='sur_name' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='mail' class='text-xs text-gray-500'>E-mail</label>";
                echo "<input required type='text' name='mail' id='mail' class='w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='role' class='text-xs text-gray-500'>Rola</label>";
                echo "<select name='role' id='role' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 outline-none transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                        $sql2 = "SELECT * FROM `user_roles`;";
                        $result2 = mysqli_query($conn, $sql2);
                        if(mysqli_num_rows($result2) > 0)
                            {
                                while($row2 = mysqli_fetch_assoc($result2))
                                {
                                    echo "<option class='capitalize' value='".$row2['id']."'>".$row2['role']."</option>";
                                }
                            }
                echo "</select>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='status' class='text-xs text-gray-500'>Status</label>";
                echo "<select name='status' id='status' class='capitalize w-full py-2 px-4 rounded-lg shadow-sm text-gray-700 focus:text-gray-800 transition-all outline-none duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
                        $sql3 = "SELECT * FROM `user_status`;";
                        $result3 = mysqli_query($conn, $sql3);
                        if(mysqli_num_rows($result3) > 0)
                        {
                            while($row3 = mysqli_fetch_assoc($result3))
                            {
                                echo "<option class='capitalize' value='".$row3['id']."'>".$row3['status']."</option>";
                            }
                        }
                echo "</select>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='login' class='text-xs text-gray-500'>Login</label>";
                echo "<input required type='text' name='login' id='login' class='w-full py-2 px-4 rounded-lg text-gray-700 outline-none focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='password' class='text-xs text-gray-500'>Hasło</label>";
                echo "<input required type='password' name='password' id='password' class='w-full py-2 px-4 rounded-lg shadow-sm outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-col gap-2'>";
                echo "<label for='password2' class='text-xs text-gray-500'>Powtórz hasło</label>";
                echo "<input required type='password' name='password2' id='password2' class='w-full py-2 px-4 rounded-lg shadow-sm outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent'>";
            echo "</div>";
            echo "<div class='flex flex-row gap-2'>";
                echo "<button type='submit' class='w-full py-2 px-4 bg-indigo-500 hover:bg-indigo-600 hover:shadow-indigo-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Dodaj</button>";
                echo "<a href='?page=użytkownicy&action=' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>";
            echo "</div>";
        echo "</form>";
    echo "</section>";
}elseif($action=='added') {
    echo "<section id='added' class='flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>Pomyślnie dodano nowego użytkownika.</h1>";
        echo '<a href="?page=użytkownicy&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
}elseif($action=='add_pswd') {
    echo "<section id='added' class='flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>Nie dodano użytkownika, podane hasła są różne!</h1>";
        echo '<a href="?page=użytkownicy&action=" class="hover:rotate-90 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
}elseif($action=='add_same') {
    echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>Istnieje już użytkownik o takim samym loginie, spróbuj ponownie z innym loginem.</h1>";
        echo '<a href="?page=użytkownicy&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
}elseif($action=='add_empty') {
    echo "<section id='added' class='flex justify-between w-full bg-orange-500 text-white shadow-orange-300 shadow-xl rounded-3xl py-6 px-6'>";
        echo "<h1>Nie podano wszystkich informacji potrzebnych do utworzenia konta.</h1>";
        echo '<a href="?page=użytkownicy&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></a>';
    echo "</section>";
}
?>