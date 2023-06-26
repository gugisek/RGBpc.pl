<?php 
    session_start();
    if(isset($_SESSION['logged']))
    {
        header('Location: panel.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<?php include 'components/head.php'; ?>
<body class="min-h-screen flex justify-between">
    
    <section class="w-full flex flex-col items-center justify-between font-[Lexend]">
        <section class="w-full h-full flex items-center justify-center">
            <section class="items-center justify-center neo-shadow min-h-1/3 w-1/6 max-w-[500px] py-10 px-5 flex flex-col">
                <img src="public/img/logo2.png" alt="logo" class="w-3/5">
                <span class=" font-[Lexend] py-5 text-xs text-gray-600">Zaloguj się, aby kontynuować</span>
                <?php
                    if(isset($_SESSION['error']))
                    {
                        echo '<span class="text-red-500 text-center text-sm pb-6">'.$_SESSION['error'].'</span>';
                    }
                ?>
                <form action="scripts/login_script.php" method="POST" class="flex-col flex gap-4">
                    <input type="text" id="login" name="login" placeholder="Login" class="input" required>
                    <input type="password" id="pswd" name="password" placeholder="Hasło" class="input" required>
                    <input type="submit" value="Zaloguj się" class="hover:bg-indigo-300 hover:text-white hover:shadow-xl text-[#3d3d3d] focus:bg-indigo-500 transition-all duration-200 focus:text-white px-5 py-3 bg-gray-200 rounded-xl text-sm cursor-pointer">
                </form>
                <?php
                    if(isset($_SESSION['error']))
                    {
                        echo '<script> document.getElementById("login").classList.add("animate-pulse", "bg-red-100"); document.getElementById("pswd").classList.add("animate-pulse", "bg-red-100"); </script>';
                        unset($_SESSION['error']);
                    }
                ?>
            </section>
            
        </section>
        

<?php include 'components/footer.php'; ?>
    </section>
</body>
</html>