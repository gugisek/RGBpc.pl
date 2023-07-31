<?php
    include 'scripts/conn_db.php';
    $sql='SELECT id, order_number, value, date(date) as date FROM orders where status_id=1 and seller = "RGBPC.PL"';
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr class='border-t-[0.5px] border-b-[0.5px] hover:bg-gray-100 transition-all duration-300' style='cursor: pointer; cursor: hand;' onclick='window.location=`?page=zamówienia&action=edit&id=".$row['id']."&return=dashboard#edit`;'>";
            echo '<td class="py-5 text-xs text-center text-gray-500 uppercase leading-3">'.$row['order_number'].'</td>';
            echo '<td class="py-5 text-center text-xs text-gray-500">'.$row['value'].' PLN</td>';
            echo '<td class="py-5 text-center text-xs text-gray-400">'.$row['date'].'</td>';
        echo '</tr>';
    }
?>