<?php
include 'scripts/conn_db.php';
?>
<section id='add' class='w-full py-1 px-2'>
    <h1 class='pb-2 font-medium text-xs text-gray-600 font-[Lexend]'>Dodajesz nowy rekord</h1>
    <form action='setting_scripts/settings_back_status_add.php' method='post' class='flex flex-col gap-4'>
        <div class='flex flex-col gap-2'>
            <label for='status' class='text-xs text-gray-500'>Nazwa statusu</label>
            <input type='text' name='status' id='status' class='w-full py-2 px-4 rounded-lg text-sm shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent' value=''>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='status' class='text-xs text-gray-500'>Uprawnienia</label>
            <select name='privileges' id='privileges' class='w-full py-2 px-4 rounded-lg text-sm shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                <?php
                $sql = "SELECT * from status_privileges";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $description = $row['description'];
                    echo "<option value='$id'>$description</option>";
                }
                ?>
            </select>
        </div>
        <div class='flex flex-row gap-2'>
            <button type='submit' class='w-full py-2 px-4 bg-green-500 hover:bg-green-600 hover:shadow-green-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Dodaj</button>
            <a href='?page=ustawienia&action=' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>
        </div>
    </form>
</section>