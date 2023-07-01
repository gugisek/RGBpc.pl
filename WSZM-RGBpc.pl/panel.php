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
<body class="h-screen w-full flex justify-between">
    <?php include 'components/navbar.php'; ?>
    <section class="lg:w-5/6 w-full flex flex-col items-center justify-between bg-[#f8f9fa] overflow-y-auto">
        <?php
        $page = $_GET['page'];
        if ($page=="dashboard" or $page=="") {
            include 'components/dashboard.php';
        }
        if ($page=="użytkownicy") {
            include 'components/users.php';
        }
        if ($page=="archiwum") {
            include 'components/arch.php';
        }
        if ($page=="ustawienia") {
            include 'components/settings.php';
        }
        if ($page=="produkty") {
            include 'components/products.php';
        }
        if ($page=="zamówienia") {
            include 'components/orders.php';
        }
        ?>
        <?php include 'components/footer.php'; ?>
    </section>
</body>
</html>