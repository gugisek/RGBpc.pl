<canvas class="font-[Lexend]" id="wydatki" width="400" height="250"></canvas>
    <?php
        $current_year = date("Y");
        include 'scripts/conn_db.php';
        $m_i=0;
        while($m_i<=12){
            $sql = "SELECT sum(value) as income FROM orders where MONTH(date) = $m_i and YEAR(date) = $current_year and seller = 'RGBPC.PL';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $tmp_income = $row['income'];
            if($tmp_income==NULL){
                $tmp_income = 0;
            }
            if($m_i==0){
                $orders_income = $tmp_income;
            }else{
                $orders_income = $orders_income.$tmp_income.", ";
            }
            $m_i++;
        }
        $m_o=0;
        while($m_o<=12){
            $sql = "SELECT sum(value) as outcome FROM orders where MONTH(date) = $m_o and YEAR(date) = $current_year and client = 'RGBPC.PL';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $tmp_outcome = $row['outcome'];
            if($tmp_outcome==NULL){
                $tmp_outcome = 0;
            }
            if($m_o==0){
                $orders_outcome = $tmp_outcome;
            }else{
                $orders_outcome = $orders_outcome.$tmp_outcome.", ";
            }
            $m_o++;
        }
    ?>
    <script>
        var ctx = document.getElementById('wydatki').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Pażdziernik', 'Listopad', 'Grudzień'],
                datasets: [
                    {
                        label: 'Wydatki',
                        backgroundColor: '#e7808073',
                        borderColor: '#f88181',
                        data: [<?php echo $orders_outcome ?>]
                    }, {
                        label: 'Przychody',
                        backgroundColor: '#80e78973',
                        borderColor: '#81f88b',
                        data: [<?php echo $orders_income ?>]
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
                            stepSize: 500,
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