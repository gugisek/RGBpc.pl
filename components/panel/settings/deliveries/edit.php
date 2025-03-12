<?php
$id = $_GET['id'];
include "../../../../scripts/conn_db.php";
$sql = "SELECT id, name, img, desc_short, platform_id, price_brutto, additonal_box_machine_number from shippings where id = $id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_assoc($result);
}
?>
<section>

    <div id="delivery_loading"></div>

    <input type="hidden" name="delivery_id" id="delivery_id" value="<?=$id?>">
    <div class="-mt-4">
        <h1 class="text-md font-bold">Edytuj opcję dostawy</h1>
        <p class=" text-xs text-gray-500">Edytujesz opcję dostawy o id: <?=$id?></p>
    </div>

    <div class="mt-4 flex md:flex-row flex-col gap-2">
        <div class="w-full">
            <!-- <img id="popup_img_inptfav" src="img/products_images/default.png" alt="Favicon" class="aspect-square mr-2"> -->
            <div id="popup_img_inptfav" style="background-image: url('img/icons/delivery/<?=$row['img']?>');" class="aspect-square border border-black/30 rounded-2xl bg-center bg-no-repeat bg-contain">
                <label for="fileToUploadfav" class="w-full h-full block cursor-pointer"></label>
            </div>
        </div>
            <input onchange="imgPrev('fav')" type="file" name="profile" id="fileToUploadfav" class="hidden cursor-copy md:min-w-[400px] w-full mt-1 flex justify-center rounded-md border-2 border-dashed theme-border text-gray-300 px-6 pt-5 pb-6">
    </div>
        <p class="text-xs text-gray-500 mt-2">PNG, JPG, GIF do 5MB</p>


    <div class="mt-4 flex md:flex-row flex-col gap-2">
    <div class="w-full">
        <label for="delivery_name" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Nazwa</label>
        <div class="mt-2">
            <input name="delivery_name" id="delivery_name" type="text" value="<?=$row['name']?>" placeholder="Wpisz nazwę" class="border rounded-xl w-full py-1.5 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
        </div>
    </div>
    </div>

    <div class="mt-4 flex flex-row gap-2">
        <div class="w-full">
            <label for="delivery_desc_short" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Krótki opis</label>
            <div class="mt-2">
                <textarea name="delivery_desc_short" id="delivery_desc_short" type="text" placeholder="Nic tu nie ma..." class="border rounded-2xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required><?=$row['desc_short']?></textarea>
            </div>
        </div>
    </div>

    <div class="mt-4 flex md:flex-row flex-col gap-2">
        <div class="w-full">
        <label for="platform_id" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Platforma</label>
            <div class="mt-2">
                <select name="platform_id" id="platform_id" type="text" placeholder="Wybierz status" class=" cursor-pointer border rounded-xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
                    <option value="" class="hidden">Wybierz platformę</option>
                    <option value="0" class="" selected>Brak</option>
                    <?php
                    $sql = "SELECT id, name FROM platforms order by name asc";
                    $result = mysqli_query($conn, $sql); 
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row_2 = mysqli_fetch_assoc($result))
                        {
                            echo '<option ';
                            if ($row['platform_id'] == $row_2['id']) {
                                echo 'selected ';
                            }
                            echo ' value="'.$row_2['id'].'">'.$row_2['name'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="mt-4 flex md:flex-row flex-col gap-2">
        <div class="w-full">
            <label for="delivery_price" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Cena brutto PLN</label>
            <div class="mt-2">
                <input name="delivery_price" id="delivery_price" type="number" value="<?=$row['price_brutto']?>" placeholder="Podaj cenę" class="border rounded-xl w-full py-1.5 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
            </div>
        </div>
    </div>

    <div class="mt-4 flex flex-row gap-2">
        <div class="w-full">
            <div class="mt-2 flex px-2">
                <div class="flex h-6 items-center">
                    <input id="delivery_machine" aria-describedby="comments-description" name="delivery_machine" type="checkbox" class="cursor-pointer h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" <?php if ($row['additonal_box_machine_number'] == 1) { echo 'checked'; } ?>>
                </div>
                <div class="ml-3 text-sm leading-6">
                    <label for="delivery_machine" class=" text-gray-900 cursor-pointer">Wymagaj podania numeru punktu odbioru</label>
                </div>

            </div>
        </div>
    </div>


    <div class="mt-6 sm:mt-6 mb-2 sm:flex sm:flex-row-reverse">
        <button onclick="updateDelivery()" class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-full bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:shadow-xl hover:bg-green-500 sm:ml-2 sm:w-auto">Zapisz</button>
        <button onclick="popupDeliveriesCloseConfirm()" type="button" class="active:scale-95 mt-3 inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-medium text-gray-900 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:ring-gray-500 hover:bg-gray-500 hover:text-white hover:shadow-xl duration-150 sm:mt-0 sm:w-auto">Nie zapisuj</button>
        <button type="button" onclick="popupDeliveriesDelete()" class="active:scale-95 mt-3 sm:mr-2 inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-medium text-gray-900 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:ring-red-500 hover:bg-red-500 hover:text-white hover:shadow-xl duration-150 sm:mt-0 sm:w-auto">Usuń</button>
    </div>
</section>

<script>
    function imgPrev(type) {
        const file = document.getElementById(`fileToUpload${type}`).files[0];
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