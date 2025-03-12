<?php
                include '../../../../scripts/conn_db.php';
                $sql = "SELECT shippings.id, shippings.name, shippings.img, shippings.desc_short, platforms.img as 'img_p', platforms.name as 'name_p' FROM `shippings` left join platforms on platforms.id=shippings.platform_id order by platforms.name asc";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div onclick="openPopupDeliveries('.$row['id'].')" class="py-5 px-4 flex items-center hover:bg-gray-200 duration-150 cursor-pointer rounded-2xl active:scale-[98%]">
                        <dt class="font-medium text-gray-900 sm:w-64 flex gap-2 items-center sm:pr-6">
                          <img class="size-9 border border-black/10 rounded-lg object-contain" src="img/icons/delivery/'.$row['img'].'">
                          <span>'.$row["name"].'</span>
                        </dt>
                        <dd class="mt-1 flex items-center justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                          <div class="text-gray-900">'.$row["desc_short"].'</div>
                          <div class="text-gray-600"><img class="size-9 border border-black/10 rounded-lg object-contain" src="img/icons/platforms/'.$row['img_p'].'" alt="'.$row['name_p'].'"></div>
                        </dd>
                      </div>';
                    }
                } else {
                    echo "Brak wyników";
                }
            ?>
          <div class="flex border-t border-gray-100 pt-6">
            <button type="button" onclick="openPopupDeliveriesAdd()" class="text-sm px-4 font-semibold leading-6 text-violet-500 hover:text-violet-300 duration-150"><span aria-hidden="true">+</span> Dodaj nową opcje dostawy</button>
          </div>