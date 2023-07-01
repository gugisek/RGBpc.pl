<?php
$target_dir = "../public/invoices/";
$target_file = $target_dir . basename($_FILES["upload"]["name"]);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
?>