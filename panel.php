<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<?php
$title = "panel WSZM";
include 'components/head.php'; ?>    
</head>
<body>
    <?php include 'components/alert.php'; ?>
    <?php include 'components/panel/panel_body.php'; ?>
    <script>
        AOS.init();
    </script>
</body>
</html>