<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<?php
$title = "Twój RGB sklep komputerowy";
include 'components/head.php'; ?>    
</head>
<body>
    <?php include 'components/alert.php'; ?>
    <?php include 'components/hero.php'; ?>
    <?php include 'components/footer.php'; ?>
    <script>
        AOS.init();
    </script>
</body>
</html>