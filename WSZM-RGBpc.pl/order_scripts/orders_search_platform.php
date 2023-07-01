<div class="flex flex-col">
    <label for="platform" class="text-xs text-gray-500">Platforma</label>
    <select name="platform" id="platform" class="font-light outline-none capitalize">
        <?php
            include 'scripts/conn_db.php';
            $sql = "SELECT * FROM order_platforms;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                echo "<option value=''>Wszystkie</option>";
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option class='capitalize'";
                    if (isset($_POST['platform']) && $_POST['platform']==$row['id']) { echo "selected"; }
                    echo " value='".$row['id']."'>".$row['platform']."</option>";
                }
            }
        ?>
    </select>
</div>