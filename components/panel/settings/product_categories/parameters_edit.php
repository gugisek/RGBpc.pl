<?php
$id = $_GET['id'];
include '../../../../scripts/conn_db.php';
$sql = "SELECT * FROM product_parameters WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}
?>
<form action="scripts/settings/products/parameters/edit.php" method="POST">
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="-mt-4">
        <h1 class="text-md font-bold">Edytujesz parametr</h1>
        <p class="text-xs text-gray-600">Nazwa: <?=$row['value']?></p>
    </div>

    <div class="mt-4 flex md:flex-row flex-col gap-2">
        <div class="w-full">
            <label for="name" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Nazwa</label>
            <div class="mt-2">
                <input name="name" id="name" type="text" value="<?=$row['value']?>" placeholder="Wpisz nazwę" class="border rounded-xl w-full py-1.5 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
            </div>
        </div>
    </div>
    <div class="mt-4 flex md:flex-row flex-col gap-2">
        <div class="w-full">
            <label for="priority" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Priorytet</label>
            <p class="pl-2 text-xs text-gray-600">1-10 / wyświetlane w skróconych specyfikacjach oraz głównej <br/> 10+ / wyświetlane tylko w głównej specyfikacji <br/> puste / brak</p>
            <div class="mt-2">
                <input name="priority" id="priority" type="number" value="<?=$row['priority']?>" placeholder="Wpisz priorytet" class="border rounded-xl w-full py-1.5 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white">
            </div>
        </div>
    </div>

    <div class="mt-6 sm:mt-6 mb-2 sm:flex sm:flex-row-reverse">
        <button class="active:scale-95 inline-flex w-full justify-center rounded-full bg-gray-900 duration-150 px-4 py-2 text-sm font-medium text-white shadow-sm hover:shadow-xl hover:bg-green-500 sm:ml-2 sm:w-auto">Zapisz</button>
        <button onclick="popupParameterCloseConfirm()" type="button" class="active:scale-95 mt-3 inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-medium text-gray-900 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:ring-gray-500 hover:bg-gray-500 hover:text-white hover:shadow-xl duration-150 sm:mt-0 sm:w-auto">Nie zapisuj</button>
        <button type="button" onclick="popupParameterDelete()" class="active:scale-95 mt-3 sm:mr-2 inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-medium text-gray-900 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:ring-red-500 hover:bg-red-500 hover:text-white hover:shadow-xl duration-150 sm:mt-0 sm:w-auto">Usuń</button>
    </div>
</form>