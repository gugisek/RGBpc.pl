<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<?php include 'dashboard_scripts/orders_summary.php'; ?>
<section class="w-full">
    <?php
    $action = $_GET['action'];
    if ($action == 'succes') {
        echo '
        <section class="w-full flex md:flex-row flex-col-reverse items-center px-5 pt-5 gap-4">
            <section id="edited" class="flex justify-between w-full bg-green-500 text-white shadow-green-300 shadow-xl rounded-3xl py-6 px-6">
                <h1>Pomyślnie wykonano operację.</h1>
                <a href="?page=dashboard&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </section>
        </section>';
    }elseif ($action == 'error') {
        echo '
        <section class="w-full flex md:flex-row flex-col-reverse items-center px-5 pt-5 gap-4">
            <section id="edited" class="flex justify-between w-full bg-red-500 text-white shadow-red-300 shadow-xl rounded-3xl py-6 px-6">
                <h1>Wystąpił błąd podczas wykonywania operacji.</h1>
                <a href="?page=dashboard&action=" class="hover:rotate-90 active:scale-75 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </section>
        </section>';
    }
    ?>
        
    <!-- first 3-segment bar -->
    <section class="w-full flex md:flex-row flex-col-reverse items-center px-5 pt-5 gap-4">
        <section class="overflow-x-auto w-full flex flex-row items-center justify-between bg-white shadow-xl rounded-3xl py-6 px-6">
            <div class="z-0 sm:scale-100 scale-110">
                <h1 class="font-medium lg:text-sm text-xs text-gray-500 font-[Lexend]">Zamówienia w realizacji</h1>
                <p class="flex items-center lg:text-lg text-md gap-1 font-bold text-gray-600 mt-[-5px]"><?=$orders_realizacja_wychodzace?><span class="font-medium text-green-500 lg:text-sm text-xs">+<?=$orders_realizacja_przychodzace?> przychodzące</span></p>
            </div>
            <div class="bg-indigo-400 text-white p-3 rounded-xl shadow-xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </section>
        <section class="overflow-x-auto w-full flex flex-row items-center justify-between bg-white shadow-xl rounded-3xl py-6 px-6">
            <div class="sm:scale-100 scale-110">
                <h1 class="font-medium lg:text-sm text-xs text-gray-500 font-[Lexend]">Zakończone zamówienia</h1>
                <p class="flex items-center gap-1 lg:text-lg text-md font-bold text-gray-600 mt-[-5px]"><?=$orders_zakonczone_wychodzace?> <span class="font-medium text-green-500 lg:text-sm text-xs">+<?=$orders_zakonczone_przychodzace?> przychodzące</span></p>
            </div>
            <div class="bg-indigo-400 text-white p-3 rounded-xl shadow-xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                </svg>
            </div>
        </section>
        <section class="overflow-x-auto w-full flex flex-row items-center justify-between bg-white shadow-xl rounded-3xl py-6 px-6">
            <div class="sm:scale-100 scale-110">
                <h1 class="font-medium lg:text-sm text-xs text-gray-500 font-[Lexend]">Przychody w miesiącu</h1>
                <p class="flex items-center gap-1 lg:text-lg text-md font-bold text-gray-600 mt-[-5px]"><?=$orders_current_month_wychodzace?> PLN <span class="font-medium text-green-500 lg:text-sm text-xs"></span></p>
            </div>
            <div class="bg-indigo-400 text-white p-3 rounded-xl shadow-xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                </svg>
            </div>
        </section>
    </section>
    <!-- second 3-segment bar with orders widget -->
    <section class="w-full flex lg:flex-row flex-col px-5 pt-5 gap-4">
        <section class="overflow-x-auto lg:w-1/2 w-full bg-white shadow-xl rounded-3xl py-6 px-6">
            <h1 class="font-medium text-gray-600 font-[Lexend]">Zamówienia</h1>
            <?php include 'dashboard_scripts/orders_chart.php'; ?>           
        </section>
        <div class="lg:w-1/2 w-full flex md:flex-row flex-col gap-4">
            <section class="overflow-x-auto w-full bg-white shadow-xl rounded-3xl py-6 px-6">
                <h1 class="font-medium text-gray-600 mb-2 font-[Lexend]">Oczekujące zamówienia</h1>
                <div class="w-full max-h-[300px] overflow-y-auto">
                    <table class="w-full">
                        <?php include 'dashboard_scripts/orders_table.php'; ?>
                    </table>
                </div>
            </section>
            <!-- popup -->
            <section id="popupBg" class="fixed h-0 opacity-0 top-0 left-0 w-full h-full bg-[#00000020] transition-opacity duration-1000"></section>
            <section id="popup" onclick="popupOpenClose()" class="fixed scale-0 top-0 left-0 w-full h-full transition-all duration-500">
                <div class="flex items-center justify-center w-full h-full px-2">
                    <div onclick="event.cancelBubble=true;" class="bg-white md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex md:flex-row flex-col gap-4 rounded-2xl py-6 px-6 shadow-xl">
                        <div class="min-w-[150px] flex justify-center">
                            <img src="" id="popupImg" alt="" class="w-[150px] h-[150px] rounded-lg"/>
                        </div>
                        <div id="popupItself" class="flex h-auto w-full justify-between flex-col">                        
                        </div>
                    </div>
                </div>
            </section>
            <script>
                function popupDelete() {
                    var popupItself = document.getElementById("popupItself")
                    popupItself.innerHTML = `
                        <form method="POST" action="dashboard_scripts/links_back_delete.php" class="flex flex-col justify-between">
                            <h1 id="popupDeleteName"></h1>
                            <input id="popupDeleteId" type="hidden" name="id" value="undefined">
                            <input type="hidden" name="action" value="delete">
                            <div class="py-2 w-full flex flex-row md:gap-2 gap-3 md:pt-0 md:pt-5 pt-3">
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 transition-all duration-300 text-white text-center text-sm rounded-xl px-3 py-1">
                                    Usuń
                                </button>
                                <a onclick="popupOpenClose();" style="cursor: pointer; cursor: hand;" class="w-full bg-gray-500 hover:bg-gray-600 transition-all duration-300 text-white text-center text-sm rounded-xl px-3 py-1">
                                    Anuluj
                                </a>    
                            </div>
                        </form>`
                }

                function popupEdit() {
                    var popupImg = document.getElementById("popupImg")
                    popupImg.src = "public/img/icons/default.png"
                    var popupItself = document.getElementById("popupItself")
                    popupItself.innerHTML = `
                            <form method="POST" action="dashboard_scripts/links_back_edit.php" class="w-full h-full">
                                <div class="w-full flex gap-[5px] md:flex-row flex-col-reverse items-center justify-between">
                                    <input type"hidden" name="id" value="undefined" id="popup_id" class="hidden"></input>
                                    <input type="text" name="name" required id="popup_name" placeholder="Nazwa" class='w-full py-2 px-4 mr-3 rounded-lg shadow-sm focus:outline-none outline-none text-gray-700 focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'></input>
                                    <div class="flex flex-row wrap gap-3">
                                        <?php
                                        echo '
                                        <span id="popupOuterEdit">
                                            <div class="flex flex-row items-center gap-3">
                                                <button style="cursor: pointer; cursor: hand;" class="flex items-center gap-1 flex-row text-sm text-gray-500 hover:text-green-600 transition-all duration-300">
                                                    Zapisz
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </button>
                                                <a id="popupEditBtn" onclick="popupOpenClose()" style="cursor: pointer; cursor: hand;" class="flex items-center gap-1 flex-row text-sm text-gray-500 hover:text-red-600 transition-all duration-300">
                                                    Anuluj
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </span>
                                        '
                                        ?>
                                    </div>
                                </div>
                                <textarea name="description" rows="10" placeholder="Opis" id="popupDescription" class='w-full py-2 px-4 my-2 mb-[0px] rounded-lg shadow-sm focus:outline-none outline-none text-gray-600 text-sm focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'></textarea>
                                <div class='flex flex-row gap-2'>
                                    <input type='text' name='link' id='popupLink' value='' placeholder='Link' class='w-full py-2 px-4 rounded-lg shadow-sm focus:outline-none outline-none text-gray-600 text-sm focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent'>
                                    <div id="popupOuterSelect" class="w-full">
                                        <select name="icon_id" required class="capitalize w-full py-2 px-4 rounded-lg shadow-sm focus:outline-none outline-none text-gray-600 text-sm focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent">
                                    <?php
                                    $sql_icons = "SELECT * FROM `icons` order by name asc";
                                    $result_icons = mysqli_query($conn, $sql_icons);
                                    while($row_icons = mysqli_fetch_assoc($result_icons)){
                                        echo '<option';
                                        if ($row_icons['id']==1) {
                                            echo ' selected';
                                        }
                                        echo ' class="capitalize" value="'.$row_icons['id'].'">'.$row_icons['name'].'</option>';
                                    }
                                    echo '</select>';
                                    ?>
                                    </div>
                                </div>
                            </form>
                            `
                }
                function popupView() {
                    var popupItself = document.getElementById("popupItself")
                    popupItself.innerHTML = `
                            <div class="w-full flex gap-[5px] md:flex-row flex-col-reverse items-baseline justify-between">
                                <h1 id="popup_name"></h1>
                                <div class="flex flex-row items-center md:w-auto w-full justify-center wrap gap-3">
                                    <?php
                                    echo '
                                    <span id="popupOuterEdit"></span>
                                    '
                                    ?>
                                    <span id="popupOuterClose">
                                        <a onclick="popupOpenClose();" style="cursor: pointer; cursor: hand;" class="uppercase flex flex-row text-xs items-center text-gray-500 hover:text-red-600 transition-all duration-300">
                                            Zamknij
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <p id="popupDescription" class="text-gray-600 text-sm py-5"></p>
                            <div class="flex pb-2 flex-row justify-between items-center gap-2">
                                <span id="popupUserDate" class="text-xs text-gray-500"></span>
                                <a id="popupLink" class="bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg hover:shadow-indigo-400 transition-all duration-300 text-white text-center text-sm rounded-xl px-3 py-1" href="" target="_blank">
                                    Przejdź do strony
                                </a>
                            </div>
                            `
                }
                function popupOpenClose() {
                    var popup = document.getElementById("popup")
                    var popupBg = document.getElementById("popupBg")
                    popupBg.classList.toggle("opacity-0")
                    popupBg.classList.toggle("h-0")
                    popup.classList.toggle("scale-0")
                }
            </script>    
            <section class="overflow-x-auto w-full bg-white shadow-xl rounded-3xl py-6 px-6">
                <div class="flex items-center justify-between w-full mb-2">
                    <h1 class="font-medium text-gray-600 font-[Lexend]">Przydatne linki</h1>
                    <a style="cursor: pointer; cursor: hand;" onclick="popupOpenClose();popupEdit();" class="text-gray-600 hover:text-green-600 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </a>
                </div>
                <div class="w-full max-h-[300px] overflow-y-auto">
                    <table class="w-full">
                        <?php
                        include 'scripts/conn_db.php';
                        $sql='SELECT links.id, links.nazwa, links.icon_id, links.opis, concat(users.name, " ", users.sur_name) as user_name, links.create_date, links.link, icons.path as img FROM `links` left join icons on links.icon_id=icons.id join users on users.id=links.user_id order by create_date desc;';
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $create_date = $row['create_date'];
                            $nazwa_skrot = $row['nazwa'];
                            if(strlen($nazwa_skrot)>19){
                                $nazwa_skrot = substr($nazwa_skrot, 0, 19)."...";
                            }
                            //wyświetlanie tabeli z linkami
                            echo "<tr class='border-t-[0.5px] border-b-[0.5px] hover:bg-gray-100 transition-all duration-300'>";
                                echo '<td style="cursor: pointer; cursor: hand;" onclick="popupOpenClose();popupView();popup'.$row['id'].'()" class="py-5 lg:w-auto w-9 min-w-[50px] lg:px-1"><img src="public/img/icons/'.$row['img'].'" alt="icon" class="w-9 h-9 rounded-lg"/></td>';
                                echo '<td style="cursor: pointer; cursor: hand;" onclick="popupOpenClose();popupView();popup'.$row['id'].'()" class="py-5 text-center text-xs text-gray-500">'.$nazwa_skrot.'</td>';
                                echo '<td class="py-5 text-center text-xs text-gray-400">';
                                if ($row['link']==''){
                                }else{
                                    echo '<a href="'.$row['link'].'" target="_blank" class="hover:text-indigo-500 trensition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </a>';
                                }
                                echo '</td>';
                            echo '</tr>';
                            // skrypt odpowiadający za usunięcie popupa
                            echo '<script>
                            function popupDelete'.$row['id'].'() {
                                var popupDeleteName = document.getElementById("popupDeleteName");
                                var popupDeleteId = document.getElementById("popupDeleteId");

                                popupDeleteName.innerHTML = ` Czy na pewno chcesz usunąć link <b>'.$row['nazwa'].'</b>?`;
                                popupDeleteId.value = `'.$row['id'].'`;
                                
                            }
                            </script>';
                            // skrypt odpowiadający za edytowanie popupa
                            echo '<script>
                            function popupEdit'.$row['id'].'() {
                                var popupName = document.getElementById("popup_name");
                                var popupDesc = document.getElementById("popupDescription");
                                var popupLink = document.getElementById("popupLink");
                                var popup_id = document.getElementById("popup_id");
                                var popupImg = document.getElementById("popupImg");

                                popupImg.src = "public/img/icons/'.$row['img'].'";
                                popupName.value = "'.$row['nazwa'].'";
                                popupDesc.value = `'.$row['opis'].'`;
                                popupLink.value = `'.$row['link'].'`;
                                popup_id.value = `'.$row['id'].'`;

                                var popupOuterEdit = document.getElementById("popupOuterEdit");
                                var popupOuterSelect = document.getElementById("popupOuterSelect");

                                popupOuterSelect.innerHTML = `<select name="icon_id" required class="capitalize w-full py-2 px-4 rounded-lg shadow-sm focus:outline-none outline-none text-gray-600 text-sm focus:text-gray-800 transition-all duration-300 focus:ring-2 focus:ring-indigo-300 focus:border-transparent">';
                                $sql_icons = "SELECT * FROM `icons` order by name asc";
                                $result_icons = mysqli_query($conn, $sql_icons);
                                while($row_icons = mysqli_fetch_assoc($result_icons)){
                                    echo '<option ';
                                    if($row['icon_id']==$row_icons['id']){
                                        echo "selected ";
                                    }
                                    echo 'class="capitalize" value="'.$row_icons['id'].'">'.$row_icons['name'].'</option>';
                                }
                                echo '</select>`


                                popupOuterEdit.innerHTML = `
                                <div class="flex flex-row items-center gap-3">
                                    <a id="popupEditBtn" onclick="popupDelete();popupDelete'.$row['id'].'()" style="cursor: pointer; cursor: hand;" class="flex items-center gap-1 flex-row text-sm text-gray-500 hover:text-red-600 transition-all duration-300">
                                        Usuń
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>

                                    </a>
                                    <button style="cursor: pointer; cursor: hand;" class="flex items-center gap-1 flex-row text-sm text-gray-500 hover:text-green-600 transition-all duration-300">
                                        Zapisz
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                    <a id="popupEditBtn" onclick="popupView();popup'.$row['id'].'()" style="cursor: pointer; cursor: hand;" class="flex items-center gap-1 flex-row text-sm text-gray-500 hover:text-red-600 transition-all duration-300">
                                        Anuluj
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </a>
                                </div>`

                            }
                            </script>';                      
                            // skrypt odpowiadający za wyświetlanie popupa z szczegółami linku
                            $opis = nl2br($row['opis']);
                            echo '<script>
                            function popup'.$row['id'].'() {
                                //var popup = document.getElementById("myPopup'.$row['id'].'");
                                //var popupBg = document.getElementById("myPopupBg'.$row['id'].'");
                                var popup = document.getElementById("popup");
                                var popupBg = document.getElementById("popupBg");
                                var popupName = document.getElementById("popup_name");
                                var popupImg = document.getElementById("popupImg");
                                var popupDesc = document.getElementById("popupDescription");
                                var popupUserDate = document.getElementById("popupUserDate");
                                var popupLink = document.getElementById("popupLink");

                                var popupOuterEdit = document.getElementById("popupOuterEdit");

                                popupOuterEdit.innerHTML = `
                                <a id="popupEditBtn" onclick="popupEdit();popupEdit'.$row['id'].'()" style="cursor: pointer; cursor: hand;" class="flex gap-1 flex-row text-xs uppercase text-gray-500 hover:text-indigo-600 transition-all duration-300">
                                    Edytuj
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                </a>`

                                popupName.innerHTML = "'.$row['nazwa'].'";
                                popupImg.src = "public/img/icons/'.$row['img'].'";
                                popupDesc.innerHTML = `'.$opis.'`;
                                popupUserDate.innerHTML = `'.$row['user_name'].' - '.substr($create_date, 0, strrpos($create_date, ' ', 0)).'`;
                                popupLink.href = `'.$row['link'].'`;';
                                if ($row['link']==""){
                                    echo 'popupLink.classList.add("hidden")';
                                } else {
                                    echo 'popupLink.classList.remove("hidden")';
                                }
                            echo '
                            }
                            </script>';
                        }
                        ?>
                    </table>
                </div>
            </section>
        </div>
        
    </section>
    <!-- third 3-segment bar with income/outcome widget-->
    <section class="w-full flex md:flex-row flex-col-reverse px-5 pt-5 gap-4">
        <div class="md:w-1/2 w-full flex md:flex-row flex-col gap-4">
            <section class="overflow-x-auto w-full bg-white shadow-xl rounded-3xl py-6 px-6">
                <h1 class="font-medium text-gray-600 font-[Lexend]">Przychody</h1>
                <div class="">
                    treść
                    <script>
                        document.write('<h1>Siemano</h1>')
                    </script>
                </div>
            </section>
            <section class="overflow-x-auto w-full bg-white shadow-xl rounded-3xl py-6 px-6">
                <h1 class="font-medium text-gray-600 font-[Lexend]">Wydatki</h1>
            </section>
        </div>
        <section class="overflow-x-auto md:w-1/2 w-full bg-white shadow-xl rounded-3xl py-6 px-6">
            <h1 class="font-medium text-gray-600 font-[Lexend]">Finanse</h1>
            <?php include 'dashboard_scripts/finance_chart.php'; ?>            
        </section>
    </section>
</section>
