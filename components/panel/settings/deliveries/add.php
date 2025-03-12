<section>

    <div id="add_delivery_loading"></div>
    <div class="-mt-4">
        <h1 class="text-md font-bold">Dodaj opcję dostawy</h1>
        <p class=" text-xs text-gray-500">Dodajesz nową opcje dostawy dla zamówień.</p>
    </div>

    <div class="mt-4 flex md:flex-row flex-col gap-2">
        <div class="w-full">
            <!-- <img id="popup_img_inptfav" src="img/products_images/default.png" alt="Favicon" class="aspect-square mr-2"> -->
            <div id="popup_img_inptfav" style="background-image: url('img/icons/delivery/default_2.png');" class="aspect-square border border-black/30 rounded-2xl bg-center bg-no-repeat bg-contain">
                <label for="add_fileToUploadfav" class="w-full h-full block cursor-pointer"></label>
            </div>
        </div>
            <input onchange="imgPrevadd_('fav')" type="file" name="profile" id="add_fileToUploadfav" class="hidden cursor-copy md:min-w-[400px] w-full mt-1 flex justify-center rounded-md border-2 border-dashed theme-border text-gray-300 px-6 pt-5 pb-6">
    </div>
        <p class="text-xs text-gray-500 mt-2">PNG, JPG, GIF do 5MB</p>


    <div class="mt-4 flex md:flex-row flex-col gap-2">
    <div class="w-full">
        <label for="add_delivery_name" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Nazwa</label>
        <div class="mt-2">
            <input name="add_delivery_name" id="add_delivery_name" type="text" value="" placeholder="Wpisz nazwę" class="border rounded-xl w-full py-1.5 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
        </div>
    </div>
    </div>

    <div class="mt-4 flex flex-row gap-2">
        <div class="w-full">
            <label for="add_delivery_desc_short" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Krótki opis</label>
            <div class="mt-2">
                <textarea name="add_delivery_desc_short" id="add_delivery_desc_short" type="text" placeholder="Nic tu nie ma..." class="border rounded-2xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required></textarea>
            </div>
        </div>
    </div>

    <div class="mt-4 flex md:flex-row flex-col gap-2">
        <div class="w-full">
        <label for="add_platform_id" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Platforma</label>
            <div class="mt-2">
                <select name="add_platform_id" id="add_platform_id" type="text" placeholder="Wybierz status" class=" cursor-pointer border rounded-xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
                    <option value="" class="hidden">Wybierz platformę</option>
                    <option value="0" class="" selected>Brak</option>
                    <?php
                    include "../../../../scripts/conn_db.php";
                    $sql = "SELECT id, name FROM platforms";
                    $result = mysqli_query($conn, $sql); 
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row_2 = mysqli_fetch_assoc($result))
                        {
                            echo '<option value="'.$row_2['id'].'">'.$row_2['name'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="mt-4 flex md:flex-row flex-col gap-2">
        <div class="w-full">
            <label for="add_delivery_price" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Cena brutto PLN</label>
            <div class="mt-2">
                <input name="add_delivery_price" id="add_delivery_price" type="number" value="" placeholder="Podaj cenę" class="border rounded-xl w-full py-1.5 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
            </div>
        </div>
    </div>

    <div class="mt-4 flex flex-row gap-2">
        <div class="w-full">
            <div class="mt-2 flex px-2">
                <div class="flex h-6 items-center">
                    <input id="add_delivery_machine" aria-describedby="comments-description" name="add_delivery_machine" type="checkbox" class="cursor-pointer h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                </div>
                <div class="ml-3 text-sm leading-6">
                    <label for="add_delivery_machine" class=" text-gray-900 cursor-pointer">Wymagaj podania numeru punktu odbioru</label>
                </div>

            </div>
        </div>
    </div>


    <div class="mt-6 sm:mt-6 mb-2 sm:flex sm:flex-row-reverse">
        <button onclick="addDelivery()" class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-full bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:shadow-xl hover:bg-green-500 sm:ml-2 sm:w-auto">Zapisz</button>
        <button onclick="popupDeliveriesAddCloseConfirm()" type="button" class="active:scale-95 mt-3 inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-medium text-gray-900 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:ring-gray-500 hover:bg-gray-500 hover:text-white hover:shadow-xl duration-150 sm:mt-0 sm:w-auto">Nie zapisuj</button>
    </div>
</section>

<script>
    function imgPrevadd_(type) {
        const file = document.getElementById(`add_fileToUpload${type}`).files[0];
        const reader = new FileReader();
        reader.onloadend = function() {
            //ustawienie dla wszystkich img o id popup_img_inpt src
            for (let i = 0; i < document.querySelectorAll(`#popup_img_inpt${type}`).length; i++) {
                document.querySelectorAll(`#popup_img_inpt${type}`)[i].style.backgroundImage = "url('" + reader.result + "')";
            }
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById(`popup_img_inpt${type}`).src = "";
        }
    }
</script>