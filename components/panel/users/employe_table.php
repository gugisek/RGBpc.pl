<div data-aos="fade-in" data-aos-delay="100">
<?php
                include '../../../scripts/conn_db.php';
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
                $sql = "SELECT users.id, users.name, users.sec_name, users.description, users.addres, users.mail, users.profile_picture, users.sur_name, user_roles.role, users.create_date, user_status.status, colors.name as status_color, last_log FROM `users` join user_roles on users.role_id=user_roles.id join user_status on user_status.id=users.status_id join colors on colors.id=user_status.color_id where role_id != 1 order by users.id asc;";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    //window.location=`?page=użytkownicy&action=edit&id='.$row['id'].'#edit`;
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $create_date = $row['create_date'];
                        $login_date = $row['last_log'];
                        if ($row['profile_picture'] == NULL) {
                            $row['profile_picture'] = 'default.png';
                        }
                        if ($row['description'] == NULL) {
                            $desc = 'Nic tu nie ma ciekawego...';
                        }else {
                            $desc = $row['description'];
                        }
                        echo '
                        <div onclick="openPopupUsers('.$row['id'].')" class="grid grid-cols-7 rounded-2xl hover:bg-gray-200 duration-150 cursor-pointer">
                            <div class="font-medium py-2 pl-4 pr-3 sm:pl-6">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full object-cover" src="public/img/users_images/'.$row['profile_picture'].'" alt="">
                                    </div>
                                    <div class="ml-4">
                                    <div class="font-medium text-gray-900">'.$row['name'].' '.$row['sur_name'].'</div>
                                    <div class="text-gray-500 -mt-2 text-sm font-regular">'.$row['mail'].'</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 font-medium py-2 pl-4 pr-3 sm:pl-6 text-sm text-gray-500 flex items-center">
                                '.$row['description'].'
                            </div>
                            <div class="font-medium py-2 pl-4 pr-3 sm:pl-6 flex items-center">
                                <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 capitalize text-'.$row['status_color'].'-800 bg-'.$row['status_color'].'-100">'.$row['status'].'</span>
                            </div>
                            <div class="font-medium py-2 pl-4 pr-3 sm:pl-6 text-sm text-gray-500 flex items-center">
                                '.$row['role'].'
                            </div>
                            <div class="font-medium py-2 pl-4 pr-3 sm:pl-6 text-sm text-gray-500 flex items-center">
                                '.substr($create_date, 0, strrpos($create_date, ' ', 0)).'
                            </div>
                            <div class="font-medium py-2 pl-4 pr-3 sm:pl-6 text-sm text-gray-500 flex items-center">
                                '.substr($login_date, 0).'
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo "Brak wyników";
                }
            ?>
</div>