<?php
$target_dir = "../public/img/products_images/";
$target_file = $target_dir . basename($_FILES["upload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
?>