<div class="min-h-screen flex items-center justify-center">
    <section class="w-full flex flex-col items-center justify-between font-[poppins]">
            <section class="w-full h-full flex flex-col items-center justify-center">
                <section class="flex items-center flex-col justify-center">
                    <img src="img/logo2.png" alt="logo" class="w-3/5">
                    <span class=" font-[poppins] py-5 text-xs text-gray-600">Autoryzuj ten komputer</span>
                    
                </section>
                <section class="items-center justify-center neo-shadow min-h-1/3 w-1/6 min-w-[250px] max-w-[500px] py-10 px-5 flex flex-col">
                    
                    <form action="authorize.php" method="POST" class="flex-col flex gap-4">
                        <input type="password" id="key" name="key" placeholder="Klucz dostępu" class="input" required>
                        <input type="submit" value="Autoryzuj" class="hover:bg-indigo-300 hover:text-white hover:shadow-xl text-[#3d3d3d] focus:bg-indigo-500 transition-all duration-200 focus:text-white px-5 py-3 bg-gray-200 rounded-xl text-sm cursor-pointer">
                    </form>
                    <?php
                        session_start();
                        if(isset($_SESSION['error']))
                        {
                            echo '<span class="text-red-500 text-center text-xs mt-6">'.$_SESSION['error'].'</span>';
                        }
                        ?>
                    <?php
                        if(isset($_SESSION['error']))
                        {
                            echo '<script> document.getElementById("key").classList.add("animate-pulse", "bg-red-100");</script>';
                            unset($_SESSION['error']);
                        }
                        ?>
                </section>
    </section>
</div>