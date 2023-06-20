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
<section id='edit' class='w-full py-1 px-2'>
    <h1 class='pb-2 font-medium text-xs text-gray-600 font-[Lexend]'>Edytujesz: <?=$id?> - <?=$status?></h1>
    <form action='setting_scripts/settings_back_status_edit.php' method='post' class='flex flex-col gap-4'>
        <input type='hidden' name='id' value='<?=$id?>'>
        <div class='flex flex-col gap-2'>
            <label for='status' class='text-xs text-gray-500'>Nazwa statusu</label>
            <input type='text' name='status' id='status' class='w-full py-2 px-4 rounded-lg text-sm shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent' value='<?=$status?>'>
        </div>
        <div class='flex flex-col gap-2'>
            <label for='status' class='text-xs text-gray-500'>Uprawnienia</label>
            <select name='privileges' id='privileges' class='w-full py-2 px-4 rounded-lg text-sm shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                <?php
                $sql = "SELECT * from status_privileges";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $option_id = $row['id'];
                    $description = $row['description'];
                    echo "<option ";
                    if ($privileges == $option_id) {
                        echo "selected";
                    }
                    echo " value='$option_id'>$description</option>";
                }
                ?>
            </select>
        </div>
        <div class='flex flex-row gap-2'>
            <button type='submit' class='w-full py-2 px-4 bg-green-500 hover:bg-green-600 hover:shadow-green-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Zapisz</button>
            <a href='?page=ustawienia&action=delete&setting=user_status&id_sett=<?=$id?>' class='w-full py-2 px-4 bg-red-500 text-center hover:bg-red-600 hover:shadow-red-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Usuń</a>
            <a href='?page=ustawienia&action=' class='w-full py-2 px-4 bg-gray-500 text-center hover:bg-gray-600 hover:shadow-gray-500 shadow-xl rounded-lg text-white font-medium transition-all duration-300'>Anuluj</a>
        </div>
    </form>
</section>