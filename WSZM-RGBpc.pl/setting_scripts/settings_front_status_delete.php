<?php
$edit_id = $_GET['id_sett'];
include 'scripts/conn_db.php';
$sql = "SELECT * from user_status WHERE id = '$edit_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$status = $row['status'];
$privileges = $row['privileges'];
?>
<section id='delete' class='w-full py-1 px-2'>
    <h1 class='pb-2 font-medium text-xs text-gray-600 font-[Lexend]'>Usuwasz: <?=$status?> - <?=$privileges?></h1>
    <h1 class="py-5 mb-2">Czy na pewno chcesz usunąć status: <span class="text-red-600"><?=$status?></span>?</h1>
    <form action='setting_scripts/settings_back_status_delete.php' method='post' class='flex flex-col gap-4'>
        <input type='hidden' name='id' value='<?=$id?>'>
        <input type='hidden' name='delete' value='true'>
        <input type='hidden' name='status' value='<?=$status?>'>
        <input type='hidden' name='privileges' value='<?=$privileges?>'>
        <div class='flex flex-row gap-2'>
            <button type="submit" class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Usuń</button>
            <a href='?page=ustawienia&action=' class='w-full py-2 px-4 bg-gray-500 text-center hover:bg-gray-600 hover:shadow-gray-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>
        </div>
    </form>
</section>