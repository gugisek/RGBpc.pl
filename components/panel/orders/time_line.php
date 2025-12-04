<?php session_start(); ?>
<ul role="list" class="space-y-6 mt-6">
            <?php
            $id = $_GET['id'];
            $type = 'orders';
            include '../../../scripts/conn_db.php';
            $sql = "SELECT time_lines.object_type, time_lines.create_date, time_lines.type_id, time_lines.message, concat(users.name, ' ', users.sur_name) as 'user', users.profile_picture FROM `time_lines` left join users on users.id=time_lines.user_id where object_id = $id and object_type = '$type' order by time_lines.create_date desc;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    $date = substr($row['create_date'], 0, 10);
                    $time = substr($row['create_date'], 11, 5);
                    //calculate date, if orlder than 7 days, show date else calculate days from now or hours or minutes or seconds
                    $date_now = date("Y-m-d H:i:s");
                    $date_now = strtotime($date_now);
                    $date = strtotime($row['create_date']);
                    $diff = $date_now - $date;
                    $days = floor($diff / (60 * 60 * 24));
                    $hours = floor($diff / (60 * 60));
                    $minutes = floor($diff / 60);
                    $seconds = $diff;
                    if($days > 7){
                        $date = substr($row['create_date'], 0, 10);
                    }elseif($days > 0){
                        $date = $days . 'd ago';
                    }elseif($hours > 0){
                        $date = $hours . 'h ago';
                    }elseif($minutes > 0){
                        $date = $minutes . 'm ago';
                    }elseif($seconds > 0){
                        $date = $seconds . 's ago';
                    }else{
                        $date = 'teraz';
                    }

                    if($row['profile_picture'] == NULL){
                        $row['profile_picture'] = 'default.png';
                    }

                    if($row['type_id']=='3'){
                        echo '
                        <li class="relative flex gap-x-4">
                            <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                                <div class="w-px bg-gray-200"></div>
                            </div>
                            <img src="img/users_images/'.$row['profile_picture'].'" alt="" class="relative mt-3 h-6 w-6 flex-none rounded-full bg-gray-50 object-cover border border-black/10">
                            <div class="flex-auto rounded-md p-3 ring-1 ring-inset ring-gray-200">
                                <div class="flex justify-between gap-x-4">
                                    <div class="py-0.5 text-xs leading-5 text-gray-500"><span class="font-medium text-gray-900">'. $row['user'] .'</span> skomentował</div>
                                    <time datetime="2023-01-23T15:56" class="flex-none py-0.5 text-xs leading-5 text-gray-500">'. $date .'</time>
                                </div>
                                <p class="text-sm leading-6 text-gray-500">'. $row['message'] .'</p>
                            </div>
                        </li>
                        ';
                    }else{
                    echo '
                    <li class="relative flex gap-x-4">
                        <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                            <div class="w-px bg-gray-200"></div>
                        </div>';
                            if($row['type_id'] == '4'){
                                echo '
                                <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                                    <svg class="h-6 w-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                </div>';
                            }elseif($row['type_id'] == '1'){
                                echo '
                                <div class="relative flex h-6 w-6 flex-none items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5 text-white bg-indigo-600 rounded-full p-1">
                                        <path d="M1.75 1.002a.75.75 0 1 0 0 1.5h1.835l1.24 5.113A3.752 3.752 0 0 0 2 11.25c0 .414.336.75.75.75h10.5a.75.75 0 0 0 0-1.5H3.628A2.25 2.25 0 0 1 5.75 9h6.5a.75.75 0 0 0 .73-.578l.846-3.595a.75.75 0 0 0-.578-.906 44.118 44.118 0 0 0-7.996-.91l-.348-1.436a.75.75 0 0 0-.73-.573H1.75ZM5 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM13 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                                    </svg>

                                </div>';
                            }else{
                                echo '
                                    <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                                        <div class="h-1.5 w-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                                    </div>';
                            }
                        echo '
                        <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500">'. $row['message'] .' przez <span class="font-medium text-gray-900">'. $row['user'] .'</span></p>
                        <time datetime="2023-01-23T11:03" class="flex-none py-0.5 text-xs leading-5 text-gray-500" title="'. $row['create_date'] .'">'. $date .'</time>

                    </li>
                    ';
                        }
                }
            }
            ?>

        </ul>

            <!-- New comment form -->
            <div class="mt-6 flex gap-x-3">
                <img src="img/users_images/<?=$_SESSION['profile_picture']?>" alt="" class="h-6 w-6 flex-none rounded-full bg-gray-50">
                <form class="relative flex-auto">
                    <div class="overflow-hidden rounded-lg pb-12 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-violet-600">
                        <label for="comment" class="sr-only">Dodaj komentarz</label>
                        <textarea rows="2" name="comment" id="message" class="block w-full resize-none border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 focus:outline-none sm:text-sm sm:leading-6" placeholder="Dodaj notatkę..."></textarea>
                        
                    </div>
                    
                    <div class="absolute inset-x-0 bottom-0 flex justify-between py-2 pl-3 pr-2">
                        <div class="flex items-center space-x-5">
                            
                            
                            </div>
                            <div class="flex flex-row gap-2 ">

                                <div id="messageLoading" class='hidden z-[30] bg-black/40 rounded-3xl size-8 flex items-center justify-center'><div class='lds-dual-ring scale-[.3]'></div></div>
                                <button onclick="addComment('<?=$id?>')" type="button" class="rounded-2xl bg-violet-600 px-4 py-1.5 text-sm font-medium hover:scale-105 active:scale-95 hover:shadow-xl duration-150 text-white shadow-sm">Dodaj</button>
                            </div>
                    </div>
                </form>
            </div>
