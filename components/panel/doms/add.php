<form action="scripts/doms/add.php" method="POST">
    <input type="hidden" name="id" value="">
    <div class="-mt-4">
        <h1 class="text-md font-[poppins] font-semibold -mt-8">Dodaj przedmiot <span class="text-sm font-medium text-gray-600"></span></h1>
    </div>
    <div class="mt-2 flex flex-row gap-2">
        <div class="w-full">
            <label for="product_id" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Produkt</label>
            <div class="">
                <select name="product_id" id="product_id" type="text" placeholder="" class="mt-2 cursor-pointer border rounded-xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
                    <option value="" class="hidden">Wybierz produkt</option>
                    <?php
                    include '../../../scripts/conn_db.php';
                    $sql = "SELECT products.name, product_categories.category FROM `products` left join product_categories on product_categories.id=products.category_id ORDER BY product_categories.category asc, products.name asc;";
                    $result = mysqli_query($conn, $sql); 
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo '<option value="'.$row['id'].'">'.$row['category'].' - '.$row['name'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="mt-4 grid grid-cols-2 gap-2">
        <div class="w-full">
            <label for="price" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Cena zakupu brutto (PLN)</label>
            <div class="mt-2">
                <input name="price" id="price" type="number" value="" placeholder="Wpisz cenę" class="border rounded-xl w-full py-1.5 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white">
            </div>
        </div>
        <div class="w-full">
            <label for="source_id" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Źródło zakupu</label>
            <div class="">
                <select name="source_id" id="source_id" type="text" placeholder="" class="mt-2 cursor-pointer border rounded-xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
                    <option value="" class="hidden">Wybierz źródło</option>
                    <?php
                    include '../../../scripts/conn_db.php';
                    $sql = "SELECT id, name, description FROM supplayers";
                    $result = mysqli_query($conn, $sql); 
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        if($row['description'] == '') {
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        } else
                        {
                            echo '<option value="'.$row['id'].'">'.$row['name'].' - '.$row['description'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="mt-2 grid grid-cols-2 flex-row gap-2">
        <div class="w-full">
            <label for="quantity" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Ilość sztuk</label>
            <div class="mt-2">
                <input name="quantity" id="quantity" type="number" value="1" min="1" max="99" placeholder="Wpisz ilość sztuk" class="border rounded-xl w-full py-1.5 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
            </div>
        </div>
        <div class="w-full">
            <label for="status_id" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Status</label>
            <div class="">
                <select name="status_id" id="status_id" type="text" placeholder="" class="mt-2 cursor-pointer border rounded-xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
                    <option value="" class="hidden">Wybierz status</option>
                    <?php
                    include '../../../scripts/conn_db.php';
                    $sql = "SELECT id, name from dom_status";
                    $result = mysqli_query($conn, $sql); 
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>


    <div class="mt-6 sm:mt-6 mb-2 sm:flex sm:flex-row-reverse">
        <button class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-full bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:shadow-xl hover:bg-green-500 sm:ml-2 sm:w-auto">Zapisz</button>
        <button onclick="popupDomsAddCloseConfirm()" type="button" class="active:scale-95 mt-3 inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-medium text-gray-900 shadow-sm ring-inset ring-1 ring-[#3d3d3d] hover:ring-gray-500 hover:bg-gray-500 hover:text-white hover:shadow-xl duration-150 sm:mt-0 sm:w-auto">Nie zapisuj</button>
    </div>
</form>