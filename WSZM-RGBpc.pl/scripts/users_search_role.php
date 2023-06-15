<div class="flex flex-col">
    <label for="role" class="text-xs text-gray-500">Rola</label>
    <select name="role" id="role" class="font-light outline-none capitalize">
        <?php
            include 'scripts/conn_db.php';
            $sql = "SELECT * FROM `user_roles`;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                echo "<option value=''>Wszyscy</option>";
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option class='capitalize'";
                    if (isset($_POST['role']) && $_POST['role']==$row['id']) { echo "selected"; }
                    echo " value='".$row['id']."'>".$row['role']."</option>";
                }
            }
        ?>
    </select>
</div>