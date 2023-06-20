<?php
$edit_id = $_GET['id_sett'];
include 'scripts/conn_db.php';
$sql = "SELECT * from user_roles WHERE id = '$edit_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$role = $row['role'];
$description = $row['description'];
?>
<section id='edit' class='w-full py-1 px-2'>
    <h1 class='pb-2 font-medium text-xs text-gray-600 font-[Lexend]'>Edytujesz: <?=$role?> - <?=$description?></h1>
    <form action='setting_scripts/settings_back_role_edit.php' method='post' class='flex flex-col gap-4'>
        <input type='hidden' name='id' value='<?=$id?>'>
        <div class='flex flex-col gap-2'>
            <label for='role' class='text-xs text-gray-500'>Rola</label>
            <input type='text' name='role' id='role' class='w-full py-2 px-4 rounded-lg text-sm shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent' value='<?=$role?>'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='desc' class='text-xs text-gray-500'>Opis</label>
            <input type='text' name='desc' id='desc' class='w-full py-2 px-4 rounded-lg text-sm text-gray-700 focus:text-gray-800 transition-all duration-300 shadow-sm focus:outline-none  focus:ring-2 outline-none focus:ring-indigo-300 focus:border-transparent' value='<?=$description?>'>
        </div>
        <div class='flex flex-row gap-2'>
            <button type='submit' class='w-full py-2 px-4 bg-green-500 hover:bg-green-600 hover:shadow-green-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Zapisz</button>
            <a href='?page=ustawienia&action=delete&setting=user_role&id_sett=<?=$id?>' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Usuń</a>
            <a href='?page=ustawienia&action=' class='w-full py-2 px-4 bg-gray-500 text-center hover:bg-gray-600 hover:shadow-gray-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>
        </div>
    </form>
</section>