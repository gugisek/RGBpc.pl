<?php
    session_start();
    if(!isset($_SESSION['logged']))
    {
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<?php include 'components/head.php'; ?>
<body class="h-screen flex justify-between ">
    <?php include 'components/navbar.php'; ?>
    <section class="w-5/6 flex flex-col items-center justify-between bg-[#f8f9fa] overflow-y-auto">
        <?php
        $page = $_GET['page'];
        if ($page=="") {
            include 'components/dashboard.php';
        }
        if ($page=="użytkownicy") {
            include 'components/users.php';
        }
        ?>
        <?php include 'components/footer.php'; ?>
    </section>
</body>
</html>