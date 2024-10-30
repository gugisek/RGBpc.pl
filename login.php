<?php 
session_start();
if(isset($_SESSION['logged'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<?php
$title = "logowanie do konta";
include 'components/head.php'; ?>    
</head>
<body>
    <?php include 'components/alert.php'; ?>
    <?php include 'components/nav/navbar.php'; ?>
    <?php include 'components/login/login_form.php'; ?>
    <?php include 'components/footer.php'; ?>
    <script>
        AOS.init();
    </script>
</body>
</html>