
 <?php
 if (!isset($_GET['page_id']) or $_GET['page_id']==""){
    $page_id = 1;
}else{
    $page_id = $_GET['page_id'];
}
if(isset($_GET['page_id'])) {
    $page_id = $_GET['page_id'];
}else {
    $page_id = 1;
} 
include '../../../scripts/conn_db.php';
$sql = "SELECT count(id) FROM logs";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$total_records = $row[0];
$total_pages = ceil($total_records / 20);
 ?>
 
 <div class="w-full flex items-center px-12 mb-4 -mt-12 justify-end">
                    <div onclick="openPageArchive('<?php if($page_id > 1) {echo $page_id - 1;}else {echo $page_id;} ?>')" class="flex items-center">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                    </div>
                    <div onclick="openPageArchive('<?php if($page_id < $total_pages) {echo $page_id + 1;}else {echo $page_id;} ?>')" class="flex items-center">

                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                    </div>
                    </div>
                <table class="w-full" data-aos="fade-in" data-aos-delay="100">
                    <tr class=" text-left text-xs text-gray-400 ">
                        <th class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 py-3.5 text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell px-3 text-center md:w-auto md:table-cell sm:pl-6 lg:pl-8">ID</th>
                        <th class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell w-1/6">Użytkownik</th>
                        <th class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell py-3 w-1/6">Data</th>
                        <th class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell w-[35%] md:table-cell">Opis</th>
                        <th class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell w-[9%] text-center">ID obiektu</th>
                        <th class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell w-[9%] text-center">Obiekt</th>
                        <th class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell w-[9%] text-center">Typ</th>
                    </tr>
                    <?php
                    
                    
                        include '../../../scripts/conn_db.php';
                        $sql = "SELECT logs.id, users.name, users.sur_name, logs.when, logs.object_id, logs.object_type, log_types.type,logs.description FROM `logs` left join users on users.id=logs.user_id join log_types on log_types.id=logs.type order by id desc limit 20 offset ".($page_id - 1) * 20;
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {

                                echo "<tr class='hover:bg-gray-100 transition-all  duration-150 border-t-[0.5px] border-b-[0.5px] border-gray-200' style='cursor: pointer; cursor: hand;' onclick='openPopupLogs(".$row['id'].")'>";
                                    echo "<td class='py-3 text-gray-500 text-center text-sm md:table-cell hidden sm:pl-6 lg:pl-8'>".$row['id']."</td>";
                                    echo "<td class='py-3 text-gray-800 text-sm capitalize sm:pl-1 lg:pl-3'>".$row['name']." ".$row['sur_name']."</td>";
                                    echo "<td class='capitalize text-sm text-gray-600'>".$row['when']."</td>";
                                    $description = $row['description'];
                                    if (strlen($description) > 50) {
                                        $description = substr($description, 0, 50)."...";
                                    }
                                    echo "<td class='text-sm md:table-cell hidden text-gray-600'>".$description."</td>";
                                    echo "<td class='text-center text-sm text-gray-500'>".$row['object_id']."</td>";
                                    echo "<td class='text-center text-sm capitalize ";
                                    if ($row['object_type'] == "users") {
                                        echo " text-yellow-500";
                                    }
                                    else if ($row['object_type'] == "products") {
                                        echo " text-purple-500";
                                    }
                                    else if ($row['object_type'] == "orders") {
                                        echo " text-yellow-500";
                                    }
                                    else if ($row['object_type'] == "finances") {
                                        echo " text-blue-500";
                                    }
                                    else if ($row['object_type'] == "user_roles") {
                                        echo " text-red-500";
                                    }
                                    else if ($row['object_type'] == "user_status") {
                                        echo " text-pink-500";
                                    }
                                    else if ($row['object_type'] == "log_types") {
                                        echo " text-gray-500";
                                    }else{
                                        echo " text-gray-800";
                                    }
                                    echo "'>".$row['object_type']."</td>";
                                    echo "<td class='text-center text-sm capitalize ";
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
                <div class="w-full flex items-center justify-between mt-2 mb-[-16px]">
                    <div class="w-1/3"></div>
                            <div class="flex items-center">
                    
                        <form onclick="openPageArchive('<?php if($page_id > 1) {echo $page_id - 1;}else {echo $page_id;} ?>')" class="flex items-center">
                            <input type="hidden" name="page" value="archiwum">
                            <input type="hidden" name="action" value="">
                            <input type="hidden" name="page_id" value="<?php if($page_id > 1) {
                                echo $page_id - 1;
                            }else {
                                echo $page_id;
                            } ?>">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                        </form>
                        <form action="panel.php?page=archiwum&action=" method="GET">
                            <input type="hidden" name="page" value="archiwum">
                            <input type="hidden" name="action" value="">
                            <input id="hide_arrows" onchange="openPageArchive(this.value)" type="number" class=" px-2 rounded-md mx-1 text-center font-light outline-none focus:drop-shadow-[0_3px_10px_rgba(100,0,255,1)] border border-black/10 transition-all duration-300" name="page_id" value="<?=$page_id?>" max="<?=$total_pages?>" min="1"> 
                        </form>
                        <form onclick="openPageArchive('<?php if($page_id < $total_pages) {echo $page_id + 1;}else {echo $page_id;} ?>')" class="flex items-center">
                            <input type="hidden" name="page" value="archiwum">
                            <input type="hidden" name="action" value="">
                            <input type="hidden" name="page_id" value="<?php if($page_id < $total_pages) {
                                echo $page_id + 1;
                            }else {
                                echo $page_id;
                            } ?>">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <span class="text-right w-1/3 text-sm text-gray-400 px-4">Strona <?=$page_id?> z <?=$total_pages?></span>   
                </div>