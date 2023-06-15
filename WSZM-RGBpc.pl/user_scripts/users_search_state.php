<div class="flex flex-col">
    <label for="status" class="text-xs text-gray-500">Status</label>
    <select name="status" id="status" class="font-light outline-none capitalize">
        <?php
            include 'scripts/conn_db.php';
            $sql = "SELECT * FROM `user_status`;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                echo "<option value=''>Wszyscy</option>";
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option class='capitalize'";
                    if (isset($_POST['status']) && $_POST['status']==$row['id']) { echo "selected"; }
                    echo " value='".$row['id']."'>".$row['status']."</option>";
                }
            }
        ?>
    </select>
</div>