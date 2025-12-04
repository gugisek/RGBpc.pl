<div class="font-[poppins]">
        <div class="sm:flex sm:items-start -mt-9 ">
            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-gray-200 sm:mx-0 sm:h-10 sm:w-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-900">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                </svg>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
              <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Potwierdź zmianę statusu</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-700">Czy na pewno chcesz zmienić status? Spowoduje to wysłanie informacji do klienta.</p>
              </div>
            </div>
        </div>
        <p class="mt-4 text-center flex items-center justify-center gap-4">
            <?php
            include '../../../scripts/conn_db.php';

            $new_id = $_GET['id'];
            $old_id = $_GET['old_id'];
            $order_id = $_GET['order_id'];

            $sql_old = "SELECT description from orders_status where id='$old_id'";
            $result_old = $conn->query($sql_old);
            $row_old = $result_old->fetch_assoc();
            $old_status_name = $row_old['description'];

            $sql_new = "SELECT description from orders_status where id='$new_id'";
            $result_new = $conn->query($sql_new);
            $row_new = $result_new->fetch_assoc();
            $new_status_name = $row_new['description'];

            ?>
                    <span class="text-red-400"><?=$old_status_name?></span>
                    <span> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </span>
                    <span class="text-green-500"><?=$new_status_name?></span>
                </p>
        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
            <button onclick="popupOrderConfirmOpenClose();updateOrderStatus('<?=$old_id?>', '<?=$new_id?>', '<?=$order_id?>');" type="button" class="active:scale-95 inline-flex w-full justify-center rounded-full bg-gray-900 duration-150 px-4 py-2 text-sm font-medium text-white shadow-sm hover:shadow-xl hover:bg-gray-500 sm:ml-3 sm:w-auto">Zmień</button>
            <button onclick="popupOrderConfirmOpenClose();" type="button" class="active:scale-95 mt-3 inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-medium text-gray-900 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:ring-gray-500 hover:bg-gray-500 hover:text-white hover:shadow-xl duration-150 sm:mt-0 sm:w-auto">Nie zapisuj</button>
        </div>
</div>