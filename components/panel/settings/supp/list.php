<?php
                include '../../../../scripts/conn_db.php';
                $sql = "SELECT id, name, description FROM supplayers";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div onclick="openPopupSupp('.$row['id'].')" class="py-5 px-4 sm:flex hover:bg-gray-200 duration-150 cursor-pointer rounded-2xl active:scale-[98%]">
                        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">'.$row["name"].'</dt>
                        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                          <div class="text-gray-900">'.$row["description"].'</div>
                        </dd>
                      </div>';
                    }
                } else {
                    echo "Brak wyników";
                }
            ?>
          <div class="flex border-t border-gray-100 pt-6">
            <button type="button" onclick="openPopupSuppAdd()" class="text-sm px-4 font-semibold leading-6 text-violet-500 hover:text-violet-300 duration-150"><span aria-hidden="true">+</span> Dodaj nowego dostawcę</button>
          </div>