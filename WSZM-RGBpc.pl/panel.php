<?php
    session_start();
    if(!isset($_SESSION['logged']))
    {
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl" class="h-full overflow-y-hidden">
<?php include 'components/head.php'; ?>
<body class="h-full w-full flex sm:flex-row flex-col ">
    <?php include 'components/navbar_mobile.php'; ?>
    <?php include 'components/navbar.php'; 
    $page = $_GET['page'];
    $action = $_GET['action'];
    ?>
    <div class="sm:hidden h-[60px]"></div>
    <section id="<?php if($page == 'archiwum' or ($page == 'produkty' and $action == '') or ($page == 'zamówienia' and $action == '') or ($page == 'zamówienia' and $action == 'create_cart')){echo 'scrolled_div';}else{echo 'div';}?>" style="height: 100%;" class="lg:w-5/6 w-full flex flex-col items-center justify-between bg-[#f8f9fa] overflow-y-auto">
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

        <?php
       if ( $_SESSION['alert'] != '') {
        if ($_SESSION['alert_type'] == 'ok') {
            echo '
            <div id="alert_popup" class="transition-all duration-300 absolute shadow-md bottom-0 right-0 rounded-md bg-green-50 p-4 m-2">
                <div class="flex min-w-[350px]">
                    <div class="flex-shrink-0">
                    <!-- Heroicon name: mini/check-circle -->
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                    </div>
                    <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">
                        '.$_SESSION['alert'].'
                    </p>
                    </div>
                    <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" onclick="" class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: mini/x-mark -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                        </svg>
                        </button>
                    </div>
                    </div>
                </div>
            </div>
            ';
        }elseif($_SESSION['alert_type']=='warn') {
            echo '
            <div id="alert_popup" class="transition-all duration-300 absolute shadow-md bottom-0 right-0 rounded-md bg-yellow-50 p-4 m-2">
                <div class="flex min-w-[350px]">
                    <div class="flex-shrink-0">
                    <!-- Heroicon name: mini/check-circle -->
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8.485 3.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 3.495zM10 6a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 6zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    </div>
                    <div class="ml-3">
                    <p class="text-sm font-medium text-yelloow-700">
                        '.$_SESSION['alert'].'
                    </p>
                    </div>
                    <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" onclick="" class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: mini/x-mark -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                        </svg>
                        </button>
                    </div>
                    </div>
                </div>
            </div>
            ';
        }
        
        
       }
        ?>

    </section>
    <script>
    var alertPopup = document.getElementById("alert_popup");
    function closeAlert() {
        alertPopup.style.scale = "0";
    }
</script>
</body>
</html>