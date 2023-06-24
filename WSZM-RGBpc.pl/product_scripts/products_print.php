<?php
include '../components/head.php';
$sku = $_GET['sku'];
$category = $_GET['category'];
$page = $_GET['page'];
$action = $_GET['action'];
$id = $_GET['id'];
?>

<section class="flex flex-col items-center">
    <img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo $sku; ?>&code=Code128&dpi=96&dataseparator=" alt="Barcode Generator TEC-IT"/>
    <div class='flex flex-col gap-2 md:w-1/2'>
        <h1 class='text-center w-full rounded-lg uppercase text-gray-700 outline-none focus:text-gray-800 transition-all duration-300'><?=$category?></h1>
    </div>
</section>
<script>
    window.print();
</script>
<?php
header("Refresh:0; url=../panel.php?page=$page&action=$action&id=$id#edit");