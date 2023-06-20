<table class="w-full">
    <tr class="uppercase text-left text-xs text-gray-400 ">
        <th class="">Status</th>
        <th class="text-right">Uprawnienia</th>
    </tr>
    <?php
        include 'scripts/conn_db.php';
        $sql = "SELECT user_status.id, user_status.status, user_status.privileges, status_privileges.description from user_status join status_privileges on user_status.privileges=status_privileges.id;";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
            echo "<tr class='hover:bg-gray-100 transition-all duration-300 border-t-[0.5px] border-b-[0.5px]' style='cursor: pointer; cursor: hand;' onclick='window.location=`?page=ustawienia&action=edit&setting=user_status&id_sett=".$row['id']."`'>";
                echo "<td class='py-3 text-gray-600 text-sm'>".$row['status']."</td>";
                echo "<td class='py-3 text-gray-600 text-sm text-right'>".$row['description']."</td>";
            echo "</tr>";
            }
        } else {
            echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                echo "<td class='py-3 text-gray-800 leading-4 text-sm'>Brak wyników</td>";
            echo "</tr>";
        }
    ?>
</table>