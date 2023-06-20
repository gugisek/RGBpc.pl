<div class="flex flex-col">
    <label for="category" class="text-xs text-gray-500">Kategoria</label>
    <select name="category" id="category" class="font-light outline-none capitalize">
        <?php
            include 'scripts/conn_db.php';
            $sql = "SELECT * FROM `product_categories`;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                echo "<option value=''>Wszystko</option>";
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option class='capitalize'";
                    if (isset($_POST['category']) && $_POST['category']==$row['id']) { echo "selected"; }
                    echo " value='".$row['id']."'>".$row['category']."</option>";
                }
            }
        ?>
    </select>
</div>