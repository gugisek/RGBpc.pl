<section data-aos="fade-in" data-aos-delay="100">
<?php
$id = $_GET['id'];
include "../../../../scripts/conn_db.php";
$sql = "SELECT products.full_description FROM `products` where products.id=$id;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
$row = mysqli_fetch_assoc($result);
if($row['full_description'] == null){
    $row['full_description'] = "Brak opisu";
}
?>
    <div class="flex flex-col gap-4">
        <div>
            <?=$row['full_description']?>
        </div>
    </div>
</section>