<?php
include '../../../../scripts/security.php';
$category_id = $_GET['id'];
include '../../../../scripts/conn_db.php';
$sql = "SELECT * 
FROM product_parameters 
WHERE filter_category_id='$category_id' 
ORDER BY 
  CASE 
    WHEN priority IS NULL THEN 1 
    ELSE 0 
  END, 
  priority ASC, 
  value ASC;
";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '
        <button onclick="openPopupParameter('.$row['id'].')" class="py-2 w-full pl-4 flex justify-between items-center hover:bg-gray-200 duration-150 cursor-pointer rounded-2xl active:scale-[98%]" aria-controls="ks-'.$row['id'].'" aria-expanded="false">
            <dt class="text-left text-gray-600 text-sm sm:w-64 sm:flex-none sm:pr-6">'.$row["value"].'</dt>
                <dd class="mr-4 mt-1 flex justify-end gap-x-6 sm:mt-0 sm:flex-auto">
                    '.$row["priority"].'
                </dd>
        </button>
        ';
    }
}
?>
