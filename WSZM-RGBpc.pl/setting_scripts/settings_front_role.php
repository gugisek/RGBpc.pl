                <table class="w-full">
                    <tr class="uppercase text-left text-xs text-gray-400 ">
                        <th class="w-1/6">Rola</th>
                        <th class="w-[35%]">Opis</th>
                    </tr>
                    <?php
                        include 'scripts/conn_db.php';
                        $sql = "SELECT * from user_roles";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {

                                echo "<tr class='hover:bg-gray-100 transition-all duration-300 border-t-[0.5px] border-b-[0.5px]' style='cursor: pointer; cursor: hand;' onclick='window.location=`?page=ustawienia&action=edit&setting=user_role&id_sett=".$row['id']."`'>";
                                    echo "<td class='capitalize py-3 text-gray-600 text-sm'>".$row['role']."</td>";
                                    $description = $row['description'];
                                    if (strlen($description) > 50) {
                                        $description = substr($description, 0, 50)."...";
                                    }
                                    echo "<td class='text-sm text-gray-600'>".$description."</td>";
                                echo "</tr>";
                                ;
                            }
                        } else {
                            echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                                echo "<td class='py-3 text-gray-800 leading-4 text-sm'>Brak wyników</td>";
                                echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                            echo "</tr>";
                        }
                    ?>
                </table>