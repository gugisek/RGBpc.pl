<div class="flex flex-col">
    <label for="date" class="text-xs text-gray-500">Data</label>
    <select name="date" id="date" class="font-light outline-none capitalize">
        <?php
            include 'scripts/conn_db.php';
            $sql = "SELECT DISTINCT date(date) as date FROM orders;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                echo "<option value=''>Wszystkie</option>";
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option class='capitalize'";
                    if (isset($_POST['date']) && $_POST['date']==$row['date']) { echo "selected"; }
                    echo " value='".$row['date']."'>".$row['date']."</option>";
                }
            }
        ?>
    </select>
</div>