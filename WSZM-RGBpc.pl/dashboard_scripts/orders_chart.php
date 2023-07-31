<canvas class="font-[Lexend]" id="myChart" width="400" height="250"></canvas>
    <?php
        $current_year = date("Y");
        include 'scripts/conn_db.php';
        $m=0;
        while($m<=12){
            $sql = "SELECT count(id) as orders FROM orders where MONTH(date) = $m and YEAR(date) = $current_year and seller = 'RGBPC.PL'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if($m==0){
                $orders_months_outcome = $row['orders'];
            }else{
                $orders_months_outcome = $orders_months_outcome.$row['orders'].", ";
            }
            $m++;
        }
        $m=0;
        while($m<=12){
            $sql = "SELECT count(id) as orders FROM orders where MONTH(date) = $m and YEAR(date) = $current_year and client = 'RGBPC.PL'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if($m==0){
                $orders_months_income = $row['orders'];
            }else{
                $orders_months_income = $orders_months_income.$row['orders'].", ";
            }
            $m++;
        }
    ?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Pażdziernik', 'Listopad', 'Grudzień'],
            datasets: [
                {
                    label: 'Zamówienia wychodzące',
                    //backgroundColor: 'rgb(255, 255, 255)',
                    borderColor: '#818cf8',
                    data: [<?php echo $orders_months_outcome ?>]
                },
                {
                    label: 'Zamówienia przychodzące',
                    //backgroundColor: 'rgb(255, 255, 255)',
                    borderColor: '#81f88b',
                    data: [<?php echo $orders_months_income ?>]
                }
            ]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            }
        }
    });
</script>