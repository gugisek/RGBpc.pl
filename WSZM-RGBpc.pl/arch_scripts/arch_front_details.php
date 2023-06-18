<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
else {
    $id = "";
}
$sql = "SELECT logs.id, users.name, users.sur_name, logs.when, logs.object_id, logs.object_type, log_types.type,logs.description, logs.before, logs.after FROM `logs` join users on users.id=logs.user_id join log_types on log_types.id=logs.type where logs.id='$id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$when = $row['when'];
$objectId = $row['object_id'];
$objectType = $row['object_type'];
$before = $row['before'];
$after = $row['after'];
$type = $row['type'];
$description = $row['description'];
?>
   <section class="w-full bg-white shadow-xl rounded-3xl py-6 px-6">
        <div class="w-full flex justify-between items-center">
            <h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Szczegóły</h1>
            <a href="panel.php?page=archiwum&action=" class="flex items-center space-x-2 text-gray-500 hover:text-red-600 transition-all duration-500">
                <p class="uppercase font-medium text-xs">zamknij</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </a>
        </div>
        <div class="flex flex-col md:flex-row md:space-x-4">
            <div class="flex flex-col w-full md:w-1/2">
                <div class="flex flex-col md:flex-row md:space-x-4">
                    <div class="flex flex-col w-full md:w-1/2">
                        <div class="flex flex-col">
                            <label for="user_id" class="pb-2 pt-2 font-medium text-xs text-gray-500 font-[Lexend]">Użytkownik</label>
                            <input type="text" name="user_id" id="user_id" value="<?php echo $row['name']; echo " "; echo $row['sur_name'] ?>" class="border border-gray-300 rounded-3xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled>
                        </div>
                    </div>
                    <div class="flex flex-col w-full md:w-1/2">
                        <div class="flex flex-col">
                            <label for="when" class="pb-2 pt-2 font-medium text-xs text-gray-500 font-[Lexend]">Kiedy</label>
                            <input type="text" name="when" id="when" value="<?php echo $when; ?>" class="border border-gray-300 rounded-3xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="object_id" class="pb-2 font-medium pt-2 text-xs text-gray-500 font-[Lexend]">Id obiektu</label>
                    <input type="text" name="object_id" id="object_id" value="<?php echo $objectId; ?>" class="border border-gray-300 rounded-3xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled>
                </div>
                <div class="flex flex-col">
                    <label for="object_type" class="pb-2 pt-2 font-medium text-xs text-gray-500 font-[Lexend]">Typ obiektu</label>
                    <input type="text" name="object_type" id="object_type" value="<?php echo $objectType; ?>" class="border border-gray-300 rounded-3xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all
                    duration-500" disabled>
                </div>
                <div class="flex flex-col">
                    <label for="before" class="pb-2 pt-2 font-medium text-xs text-gray-500 font-[Lexend]">Przed</label>
                    <textarea name="before" id="before" cols="30" rows="5" class="border border-gray-300 rounded-3xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled><?php echo $before; ?></textarea>
                </div>
                <div class="flex flex-col">
                    <label for="after" class="pb-2 pt-2 font-medium text-xs text-gray-500 font-[Lexend]">Po</label>
                    <textarea name="after" id="after" cols="30" rows="5" class="border border-gray-300 rounded-3xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled><?php echo $after; ?></textarea>
                </div>
            </div>
            <div class="flex flex-col w-full md:w-1/2">
                <div class="flex flex-col">
                    <label for="type" class="pb-2 font-medium text-xs pt-2 text-gray-500 font-[Lexend]">Nazwa obiektu</label>
                    <input type="text" name="type" id="type" value="<?php 
                    if ($objectType == "users") {$sql = "SELECT name, sur_name FROM `users` where id='$objectId';"; 
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['name'];
                        echo " ";
                        echo $row['sur_name'];
                    } elseif ($objectType == "products") {$sql = "SELECT name FROM `products` where id='$objectId';"; 
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['name'];
                    }


                    ?>" class="border border-gray-300 rounded-3xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled>
                </div>
                <div class="flex flex-col">
                    <label for="type" class="pb-2 text-xs pt-2 font-medium text-gray-600 font-[Lexend]">Typ operacji</label>
                    <input type="text" name="type" id="type" value="<?php echo $type; ?>" class="
                    <?php if ($type == "create") {echo "bg-green-200";} elseif ($type == "delete") {echo "bg-red-200";} elseif ($type == "modify") {echo "bg-indigo-200";} ?>
                    border border-gray-300 rounded-3xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled>
                </div>
                <div class="flex flex-col">
                    <label for="description" class="pb-2 text-xs pt-2 font-medium text-gray-600 font-[Lexend]">Opis</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="border border-gray-300 rounded-3xl px-4 py-2 focus:outline-none focus:border-indigo-500 transition-all duration-500" disabled><?php echo $description; ?></textarea>
                </div>
            </div>
        </div>
    </section>


            <?php
// $sql = "SELECT logs.id, users.name, users.sur_name, logs.when, logs.object_id, logs.object_type, log_types.type,logs.description FROM `logs` join users on users.id=logs.user_id join log_types on log_types.id=logs.type where logs.id=".$id.";";
// $result = mysqli_query($conn, $sql);
// if(mysqli_num_rows($result) > 0)
// {
//     while($row = mysqli_fetch_assoc($result))
//     {
//         echo "<section class='w-full bg-white shadow-xl rounded-3xl py-6 px-6'>";
//             echo "<h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Szczegóły</h1>";
//             echo "<div class='flex flex-col md:flex-row md:space-x-4'>";
//                 echo "<div class='flex flex-col w-full md:w-1/2'>";
//                     echo "<div class='flex flex-col md:flex-row md:space-x-4'>";
//                         echo "<div class='flex flex-col w-full md:w-1/2'>";
//                             echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>ID</label>";
//                             echo "<input type='text' class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300' value='".$row['id']."' disabled>";
//                         echo "</div>";
//                         echo "<div class='flex flex-col w-full md:w-1/2'>";
//                             echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>Data</label>";
//                             echo "<input type='text' class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300' value='".$row['when']."' disabled>";
//                         echo "</div>";
//                     echo "</div>";
//                     echo "<div class='flex flex-col'>";
//                         echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>Opis</label>";
//                         echo "<textarea class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300 resize-none h-24' disabled>".$row['description']."</textarea>";
//                     echo "</div>";
//                 echo "</div>";
//                 echo "<div class='flex flex-col w-full md:w-1/2'>";
//                     echo "<div class='flex flex-col md:flex-row md:space-x-4'>";
//                         echo "<div class='flex flex-col w-full md:w-1/2'>";
//                             echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>Użytkownik</label>";
//                             echo "<input type='text' class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300' value='".$row['name']." ".$row['sur_name']."' disabled>";
//                         echo "</div>";
//                         echo "<div class='flex flex-col w-full md:w-1/2'>";
//                             echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>Typ</label>";
//                             echo "<input type='text' class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300' value='".$row['type']."' disabled>";
//                         echo "</div>";
//                     echo "</div>";
//                     echo "<div class='flex flex-col'>";
//                         echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>Obiekt</label>";
//                         echo "<input type='text' class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300' value='".$row['object_type']." ".$row['object_id']."' disabled>";
//                     echo "</div>";
//                 echo "</div>";
//             echo "</div>";
//         echo "</section>";
//     }
// }
// else
// {
//     echo "<section class='w-full bg-white shadow-xl rounded-3xl py-6 px-6'>";
//         echo "<h1 class='pb-2 font-medium text-gray-600 font-[Lexend]'>Szczegóły</h1>";
//         echo "<div class='flex flex-col md:flex-row md:space-x-4'>";
//             echo "<div class='flex flex-col w-full md:w-1/2'>";
//                 echo "<div class='flex flex-col md:flex-row md:space-x-4'>";
//                     echo "<div class='flex flex-col w-full md:w-1/2'>";
//                         echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>ID</label>";
//                         echo "<input type='text' class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300' disabled>";
//                     echo "</div>";
//                     echo "<div class='flex flex-col w-full md:w-1/2'>";
//                         echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>Data</label>";
//                         echo "<input type='text' class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300' disabled>";
//                     echo "</div>";
//                 echo "</div>";
//                 echo "<div class='flex flex-col'>";
//                     echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>Opis</label>";
//                     echo "<textarea class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300 resize-none h-24' disabled></textarea>";
//                 echo "</div>";
//             echo "</div>";
//             echo "<div class='flex flex-col w-full md:w-1/2'>";
//                 echo "<div class='flex flex-col md:flex-row md:space-x-4'>";
//                     echo "<div class='flex flex-col w-full md:w-1/2'>";
//                         echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>Użytkownik</label>";
//                         echo "<input type='text' class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300' disabled>";
//                     echo "</div>";
//                     echo "<div class='flex flex-col w-full md:w-1/2'>";
//                         echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>Typ</label>";
//                         echo "<input type='text' class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300' disabled>";
//                     echo "</div>";
//                 echo "</div>";
//                 echo "<div class='flex flex-col'>";
//                     echo "<label class='pb-2 font-medium text-gray-600 font-[Lexend]'>Obiekt</label>";
//                     echo "<input type='text' class='border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all duration-300' disabled>";
//                 echo "</div>";
//             echo "</div>";
//         echo "</div>";
//     echo "</section>";
// }

// ?>