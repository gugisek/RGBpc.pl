<?php
                include '../../../../scripts/conn_db.php';
                $sql = "SELECT id, name, img FROM `platforms`";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div onclick="openPopupPlatforms('.$row['id'].')" class="py-5 px-4 flex items-center hover:bg-gray-200 duration-150 cursor-pointer rounded-2xl active:scale-[98%]">
                        <dt class="font-medium text-gray-900 sm:w-64 flex gap-2 items-center sm:pr-6">
                          <img class="size-9 border border-black/10 rounded-lg object-contain" src="img/icons/platforms/'.$row['img'].'">
                          <span>'.$row["name"].'</span>
                        </dt>
                        <dd class="mt-1 flex items-center justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                           </dd>
                      </div>';
                    }
                } else {
                    echo "Brak wyników";
                }
            ?>