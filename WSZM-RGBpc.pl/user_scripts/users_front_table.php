<section class="overflow-x-auto w-full bg-white shadow-xl rounded-3xl">
    <!-- <h1 class="px-6 pt-4 font-medium w-full text-left text-gray-600 font-[Lexend]">Użytkownicy</h1> -->
    <table class="w-full">
        <tr class="uppercase text-left text-xs text-gray-400 border-b-[1px]">
            <th class="py-5 pl-4 pr-3 sm:pl-6">Pracownik</th>
            <th class="px-3 py-3.5 sm:table-cell hidden">Tytuł</th>
            <th class="px-3 py-3.5 sm:table-cell hidden">Status</th>
            <th class="px-3 py-3.5 sm:table-cell hidden">Rola</th>
            <th class="px-3 py-3.5 sm:table-cell hidden">Zatrudniony</th>
        </tr>
        <script>
            //details
            var popupEmailDet = document.getElementById("popup_email_det");
            var popupTitleDet = document.getElementById("popup_title_det");
            var popupDepartmentDet = document.getElementById("popup_department_det");
            var popupFullNameDet = document.getElementById("popup_full_name_det");
            var popupAboutDet = document.getElementById("popup_about_det");
            //information public
            var popupName = document.getElementById("popup_name");
            var popupName2 = document.getElementById("popup_name_2");
            var popupImg = document.getElementById("popup_img");
            var popupStatus = document.getElementById("popup_status");
            var popupRole = document.getElementById("popup_role");
            var popupRoleOption = document.querySelectorAll("#popup_role_option");
            var popupDepartmentOption = document.querySelectorAll("#popup_department_option");
            var popupTitleOption = document.querySelectorAll("#popup_title_option");
            var popupId = null;
            //information private
            var popupIdPersonalInpt = document.querySelector("#popup_personal_id");
            var popupNameInpt = document.getElementById("popup_name_inpt");
            var popupSurname = document.getElementById("popup_surname");
            var popupEmail = document.getElementById("popup_email");
            var popupSecName = document.getElementById("popup_sec_name");
            var popupAddres = document.getElementById("popup_addres");
            var popupDesc = document.getElementById("popup_desc");
        </script>
        <?php
            include 'scripts/conn_db.php';
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $role = $_POST['role'];
                $status = $_POST['status'];
            }
            else {
                $search = "";
                $role = "";
                $status = "";
            }
            $sql = "SELECT users.id, users.name, users.sec_name, users.description, users.addres, users.mail, users.profile_picture, users.sur_name, user_roles.role, users.create_date, user_status.status, colors.name as status_color, user_departments.name as department, user_titles.name as title FROM `users` join user_roles on users.role_id=user_roles.id join user_status on user_status.id=users.status_id join colors on colors.id=user_status.color_id join user_titles on user_titles.id=users.title_id join user_departments on user_departments.id=users.department_id where (users.name like '%$search%' and role_id like '%$role%' and status_id like '%$status%') or (sur_name like '%$search%' and role_id like '%$role%' and status_id like '%$status%') or (mail like '%$search%' and role_id like '%$role%' and status_id like '%$status%') order by users.id asc;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                //window.location=`?page=użytkownicy&action=edit&id='.$row['id'].'#edit`;
                while($row = mysqli_fetch_assoc($result))
                {
                    $create_date = $row['create_date'];
                    if ($row['profile_picture'] == NULL) {
                        $row['profile_picture'] = 'default.png';
                    }
                    if ($row['description'] == NULL) {
                        $desc = 'Nic tu nie ma ciekawego...';
                    }else {
                        $desc = $row['description'];
                    }
                    echo '
                    <script>
                    function detailsPopup'.$row['id'].'() {

                        popupEmailDet.innerHTML = "'.$row['mail'].'";
                        popupTitleDet.innerHTML = "'.$row['title'].'";
                        popupDepartmentDet.innerHTML = "'.$row['department'].'";
                        popupFullNameDet.innerHTML = "'.$row['name'].' '.$row['sec_name'].' '.$row['sur_name'].'";
                        popupAboutDet.innerHTML = "'.$desc.'";

                        popupId = '.$row['id'].';
                        popupName.innerHTML = "'.$row['name'].' '.$row['sur_name'].'";
                        popupName2.innerHTML = "'.$row['name'].' '.$row['sur_name'].'";
                        popupStatus.innerHTML = "'.$row['status'].'";
                        popupStatus.classList.add("bg-'.$row['status_color'].'-100");
                        popupRole.innerHTML = "'.$row['role'].'";
                        popupImg.src = "public/img/users_images/'.$row['profile_picture'].'";
                    ';
                    //information private
                    if ($_SESSION['privilage_users']!=1) {
                        echo '
                        popupIdPersonalInpt.value = '.$row['id'].';
                        popupNameInpt.value = "'.$row['name'].'";
                        popupSurname.value = "'.$row['sur_name'].'";
                        popupEmail.value = "'.$row['mail'].'";
                        popupSecName.value = "'.$row['sec_name'].'";
                        popupAddres.value = "'.$row['addres'].'";
                        popupDesc.value = "'.$row['description'].'";
                        ';
                    }
                    //selected options logic
                    echo '
                        for (var i = 0; i < popupRoleOption.length; i++) {
                            if (popupRoleOption[i].value == "'.$row['role'].'") {
                                popupRoleOption[i].setAttribute("selected", "");
                            }
                            else {
                                popupRoleOption[i].removeAttribute("selected");
                            }
                        }
                        for (var i = 0; i < popupDepartmentOption.length; i++) {
                            if (popupDepartmentOption[i].value == "'.$row['department'].'") {
                                popupDepartmentOption[i].setAttribute("selected", "");
                            }
                            else {
                                popupDepartmentOption[i].removeAttribute("selected");
                            }
                        }
                        for (var i = 0; i < popupTitleOption.length; i++) {
                            if (popupTitleOption[i].value == "'.$row['title'].'") {
                                popupTitleOption[i].setAttribute("selected", "");
                            }
                            else {
                                popupTitleOption[i].removeAttribute("selected");
                            }
                        }
                        popupOpenClose();
                        
                    }
                    </script>
                    <tr class="hover:bg-gray-100 transition-all duration-150" style="cursor: pointer; cursor: hand;" onclick="detailsPopup'.$row['id'].'()">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-full object-cover" src="public/img/users_images/'.$row['profile_picture'].'" alt="">
                                </div>
                                <div class="ml-4">
                                <div class="font-medium text-gray-900">'.$row['name'].' '.$row['sur_name'].'</div>
                                <div class="text-gray-500">'.$row['mail'].'</div>
                                </div>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell hidden">
                            <div class="text-gray-900 capitalize">'.$row['title'].'</div>
                            <div class="text-gray-500 capitalize">'.$row['department'].'</div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell hidden">
                            <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 capitalize text-'.$row['status_color'].'-800 bg-'.$row['status_color'].'-100">'.$row['status'].'</span>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 capitalize sm:table-cell hidden">'.$row['role'].'</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 capitalize sm:table-cell hidden">'.substr($create_date, 0, strrpos($create_date, ' ', 0)).'</td>
                    </tr>
                    ';
                }
            } else {
                echo "<tr class='border-t-[0.5px] border-b-[0.5px]'>";
                    echo "<td class='py-3 text-gray-800 leading-4 text-sm'>Brak wyników</td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center capitalize text-sm text-gray-500'></td>";
                    echo "<td class='text-center text-sm text-gray-500'></td>";
                    echo "<td class='text-center text-sm'></td>";
                echo "</tr>";
            }
        ?>
    </table>
</section>