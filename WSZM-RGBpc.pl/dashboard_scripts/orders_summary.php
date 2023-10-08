<?php
    include 'scripts/conn_db.php';
    $sql='SELECT * FROM orders where status_id=1 and seller = "RGBPC.PL"';
    $result = mysqli_query($conn, $sql);
    $orders_realizacja_wychodzace = mysqli_num_rows($result);
    $sql='SELECT * FROM orders where status_id=1 and client = "RGBPC.PL"';
    $result = mysqli_query($conn, $sql);
    $orders_realizacja_przychodzace = mysqli_num_rows($result);
    $sql='SELECT * FROM orders where status_id=2 and seller = "RGBPC.PL"';
    $result = mysqli_query($conn, $sql);
    $orders_zakonczone_wychodzace = mysqli_num_rows($result);
    $sql='SELECT * FROM orders where status_id=2 and client = "RGBPC.PL"';
    $result = mysqli_query($conn, $sql);
    $orders_zakonczone_przychodzace = mysqli_num_rows($result);

    $current_month = date("m");
    $current_year = date("Y");
    $sql='SELECT sum(value) FROM orders where MONTH(date) = '.$current_month.' and YEAR(date) = '.$current_year.' and seller = "RGBPC.PL"';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['sum(value)'] == NULL) {
        $orders_current_month_wychodzace = 0;
    } else {
        $orders_current_month_wychodzace = $row['sum(value)'];
    }

    // $recent_month = date("m")-1;
    // $sql='SELECT sum(value) FROM orders where MONTH(date) = '.$recent_month.' and YEAR(date) = '.$current_year.' and seller = "RGBPC.PL"';
    // $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $orders_recent_month_wychodzace = $row['sum(value)'];
    // //wyliczenie o ile więcej procent przychodów jest w aktualnym miesiący względem poprzedniego
    // $procent = ($orders_current_month_wychodzace/$orders_recent_month_wychodzace)*100;
    
?>