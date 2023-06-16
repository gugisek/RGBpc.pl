<div class="flex flex-col">
    <label for="quantity" class="text-xs text-gray-500">Ilość</label>
    <select name="quantity" id="quantity" class="font-light outline-none capitalize">
        <?php
            include 'scripts/conn_db.php';
            $sql = "SELECT * FROM `quantity_ranges`;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option class='capitalize'";
                    if (isset($_POST['quantity']) && $_POST['quantity']==$row['range']) { echo "selected"; }
                    echo " value='".$row['range']."'>".$row['name']."</option>";
                }
            }
        ?>
    </select>
</div>