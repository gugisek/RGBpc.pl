<?php
include '../components/head.php';
$sku = $_GET['sku'];
$category = $_GET['category'];
$page = $_GET['page'];
$action = $_GET['action'];
$id = $_GET['id'];
?>

<section class="flex items-center justify-center">
    <section class="flex flex-row items-center p-2 gap-5 min-w-[100px]">
        <div class="flex flex-col items-center">
            <img src="https://barcode.tec-it.com/barcode.ashx?data=<?php echo $sku; ?>&code=Code128&dpi=96&dataseparator=" alt="Barcode Generator TEC-IT"/>
        </div>
        <div class=" flex flex-col">
            <h1 class='font-bold text-sm uppercase'><?=$category?></h1>
            <h1 class="text-xs mb-[-5px]">Polski dystrybutor:</h1>
            <h1 class="font-medium text-lg py-0">RGBpc.pl</h1>
            <h1 class="text-center text-sm mt-2">MADE IN CHINA</h1>
        </div>
    </section>
</section>
<script>
    window.print();
</script>
<?php
header("Refresh:0; url=../panel.php?page=$page&action=$action&id=$id#edit");
?>