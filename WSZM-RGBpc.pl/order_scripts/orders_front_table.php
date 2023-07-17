<section class="overflow-x-auto w-full bg-white shadow-xl rounded-3xl py-6 px-6">
    <h1 class="pb-2 font-medium text-gray-600 font-[Lexend]">Zamówienia</h1>
    <table class="w-full">
        <tr class="uppercase text-left text-xs text-gray-400 ">
            <th class="w-1/8 min-w-[100px] text-center">Zamówienie</th>
            <th class="px-1 text-center py-3 w-1/8">Sprzedawca</th>
            <th class="w-[10%] text-center">Kupujący</th>
            <th class="w-1/8 px-2 lg:table-cell hidden">Dane kontaktowe</th>
            <th class="px-1 w-[10%] text-center">Wartość</th>
            <th class="w-[7%] min-w-[100px] text-center">Data</th>
            <th class="px-1 w-[10%] text-center">Platforma</th>
            <th class="w-1/8 text-center">Status</th>
        </tr>
        <?php
            include 'scripts/conn_db.php';
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $platform = $_POST['platform'];
                $date = $_POST['date'];
                $status = $_POST['status'];
            }
            else {
                $search = "";
                $platform = "";
                $date = "";
                $status = "";
            }
            $sql = "SELECT orders.id, order_number, seller, client, (concat(contact_line_1, ' / ', contact_line_2)) as contact, value, date(date) as date, order_platforms.platform, order_status.status FROM orders left join order_platforms on order_platforms.id = orders.platform_id left join order_status on order_status.id = orders.status_id where (order_number like '%$search%' and orders.platform_id like '%$platform%' and orders.status_id like '%$status%' and date like '%$date%') or (seller like '%$search%' and orders.platform_id like '%$platform%' and orders.status_id like '%$status%' and date like '%$date%') or (client like '%$search%' and orders.platform_id like '%$platform%' and orders.status_id like '%$status%' and date like '%$date%') or (concat(contact_line_1, ' / ', contact_line_2) like '%$search%' and orders.platform_id like '%$platform%' and orders.status_id like '%$status%' and date like '%$date%') order by order_number desc;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr class='border-t-[0.5px] border-b-[0.5px] hover:bg-gray-100 transition-all duration-300' style='cursor: pointer; cursor: hand;' onclick='window.location=`?page=zamówienia&action=edit&id=".$row['id']."#edit`;'>";
                        echo "<td class='py-5 text-sm text-center text-gray-500 uppercase leading-3'>";
                        echo $row['order_number'];
                        if ($row['seller'] == 'RGBPC.PL' or $row['seller'] == 'RGBpc.pl' or $row['seller'] == 'rgbpc.pl') {echo '<br/><span class="lowercase text-red-600 text-xs"> wychodzące</span>';}else {echo '<br><span class="lowercase text-green-600 text-xs"> przychodzące</span>';}
                        echo "</td>";
                        echo "<td class='text-center text-sm text-gray-500 capitalize'>".$row['seller']."</td>";
                        echo "<td class='py-5 text-center capitalize text-sm text-gray-500'>".$row['client']."</td>";
                        echo "<td class='py-5 px-2 capitalize text-ellipsis text-sm text-gray-500 lg:table-cell hidden'>".$row['contact']."</td>";
                        echo "<td class='py-5 text-center text-sm text-gray-500'>".$row['value']."</td>";
                        echo "<td class='py-5 text-center text-xs text-gray-400'>".$row['date']."</td>";
                        echo "<td class='py-5 text-center capitalize text-sm";
                            if ($row['platform']=="olx") {
                                echo " text-green-600";
                            }
                            else if ($row['platform']=="allegro") {
                                echo " text-orange-500";
                            }
                            else if ($row['platform']=="rgbpc.pl") {
                                echo " text-teal-500";
                            }
                            else if ($row['platform']=="aliexpress") {
                                echo " text-red-500";
                            }
                            else if ($row['platform']=="inna") {
                                echo " text-gray-500";
                            }

                        echo "'>";
                            echo $row['platform'];
                        echo "</td>";
                        echo "<td class='py-5 text-center capitalize text-sm";
                            if ($row['status']=="zamówione") {
                                echo " text-indigo-500";
                            }
                            else if ($row['status']=="anulowane") {
                                echo " text-gray-500";
                            }
                            else if ($row['status']=="odebrane") {
                                echo " text-green-500";
                            }
                        echo "'>";
                            echo $row['status'];
                        echo "</td>";
                        echo "<td class='text-center text-sm'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                    echo "<td class='py-3 text-gray-800 leading-4 text-sm'>Brak wyników</td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center text-sm text-gray-500'></td>";
                    echo "<td class='text-center text-sm text-gray-500'></td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center text-sm'></td>";
                echo "</tr>";
            }
        ?>
    </table>
</section>