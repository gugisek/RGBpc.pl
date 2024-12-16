<?php
$id = $_GET['id'];
include "../../../scripts/conn_db.php";
$sql = "SELECT products.id, products.name, products.sku, products.img, products.img2, products.img3, products.img4, products.type, products.source, products.our_allegro, products.our_olx, products.sell_price_brutto, product_categories.category, products.category_id, products.description, products.full_description, products.status_id, products.sell_price_brutto, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.category_id LEFT JOIN product_doms on product_doms.product_id=products.id LEFT JOIN product_status on product_status.id=products.status_id where products.id=$id group by products.id;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
//jeżeli nie ma wyniku to przekierowanie do strony z błędem
$row = mysqli_fetch_assoc($result);
if($row['name'] == null)
{
    echo "
        <script>
            openPanelSite('products');
        </script>
        ";
}

if($row['img2'] == ""){
    $row['img2'] = "default.png";
}

if($row['img3'] == ""){
    $row['img3'] = "default.png";
}

if($row['img4'] == ""){
    $row['img4'] = "default.png";
}

$price = $row['sell_price_brutto'];

$price_2 = $price * 0.02;

$price_23 = $price * 0.23;

$price_n = $price - $price_2 - $price_23;

$name = $row['name'];
$name = str_replace(' ', '-', $name);
$name = str_replace('ą', 'a', $name);
$name = str_replace('ć', 'c', $name);
$name = str_replace('ę', 'e', $name);
$name = str_replace('ł', 'l', $name);
$name = str_replace('ń', 'n', $name);
$name = str_replace('ó', 'o', $name);
$name = str_replace('ś', 's', $name);
$name = str_replace('ż', 'z', $name);
$name = str_replace('ź', 'z', $name);
$name = strtolower($name);



?>
<form action="scripts/products/edit.php" method="POST" enctype="multipart/form-data">
<section>
    <input type="hidden" id="id_product" value="<?=$id?>" name="id_product">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <h1 onclick="openPanelSite('products')" class="cursor-pointer hover:text-gray-400 duration-150 font-medium text-2xl">Produkty</h1>
                <h1 data-aos="fade-right" data-aos-delay="100" class="font-medium text-2xl px-2 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </h1>
                <a href="/sklep/p/view.php?p=<?=$row['sku']?>&n=<?=$name?>" target="_blank" data-aos="fade-right" data-aos-delay="100">
                    <h1 class="hover:text-gray-400 transition-all duration-150 font-medium text-2xl text-gray-600"><?=$row['name']?></h1>
                </a>
            </div>
            <div class="flex items-center gap-2 flex-row-reverse">
                <button type="submit" id="" class="cursor-pointer text-gray-800 hover:text-white hover:bg-green-500 hover:shadow-xl border border-black/10 shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 text-sm leading-6 font-semibold ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                    </svg>
                </button>
                <a onclick="openPanelSite('products')" class="cursor-pointer text-gray-800 hover:text-white hover:bg-red-500 hover:shadow-xl border border-black/10 shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 text-sm leading-6 font-semibold ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>
                </a>
                <select type="text" id="status_id" value="" name="status_id" placeholder="" class="minimal border border-black/10 w-full px-6 py-3 rounded-2xl focus:ring-0 focus:outline-1 focus:outline-violet-500 cursor-pointer active:scale-95 hover:shadow-xl duration-150 text-sm">
                    <?php
                    $sql = "SELECT * from product_status";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row2 = mysqli_fetch_assoc($result))
                        {
                            echo '<option ';
                            if ($row['status_id'] == $row2['id']) {
                                echo 'selected ';
                            }
                            echo ' value="'.$row2['id'].'">'.$row2['status'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
</section>
<section data-aos="fade-right" data-aos-delay="100">
    
    <div class=" mt-[2vh] rounded-2xl">
    <div class="pt-6">
        <nav aria-label="Breadcrumb">
        <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <li>
            <div class="flex items-center">
                <a class="mr-2 text-sm font-medium text-gray-900">RGBpc.pl</a>
                <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                </svg>
            </div>
            </li>
            <li>
            <div class="flex items-center">
                <a class="mr-2 text-sm font-medium text-gray-900">Sklep</a>
                <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                </svg>
            </div>
            </li>

            <li class="text-sm">
            <select name="category_id" class="text-gray-800 active:scale-95 font-normal focus:outline-1 hover:shadow-xl focus:outline-violet-500 cursor-pointer border border-black/10 rounded-xl py-2 px-4 duration-150">
                <?php
                    $sql = "SELECT * from product_categories";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row3 = mysqli_fetch_assoc($result))
                        {
                            echo '<option ';
                            if ($row['category_id'] == $row3['id']) {
                                echo 'selected ';
                            }
                            echo ' value="'.$row3['id'].'">'.$row3['category'].'</option>';
                        }
                    }
                ?>
            </select>
            </li>
        </ol>
        </nav>

        <!-- Image gallery -->
        <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
        <label for="photo_1" class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-xl lg:block hover:scale-105 hover:shadow-xl duration-150 active:scale-95 cursor-pointer border border-black/10">
            <img id="popup_img_inpt_photo_1" src="img/products_images/<?=$row['img2']?>" alt="Two each of gray, white, and black shirts laying flat." class="pointer-events-none h-full w-full object-cover object-center">
        </label>
        <input onchange="imgPrevProduct('photo_1')" type="file" name="photo_1" id="photo_1" class="hidden">
        <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
            <label for="photo_2" class="aspect-h-2 aspect-w-3 overflow-hidden rounded-xl hover:scale-105 hover:shadow-xl duration-150 active:scale-95 cursor-pointer border border-black/10">
                <img id="popup_img_inpt_photo_2" src="img/products_images/<?=$row['img']?>" alt="" class="h-full w-full object-cover object-center">
            </label>
            <input onchange="imgPrevProduct('photo_2')" type="file" name="photo_2" id="photo_2" class="hidden">
            <label for="photo_3" class="aspect-h-2 aspect-w-3 overflow-hidden rounded-xl hover:scale-105 hover:shadow-xl duration-150 active:scale-95 cursor-pointer border border-black/10">
                <img id="popup_img_inpt_photo_3" src="img/products_images/<?=$row['img3']?>" alt="" class="h-full w-full object-cover object-center">
            </label>
            <input onchange="imgPrevProduct('photo_3')" type="file" name="photo_3" id="photo_3" class="hidden">
        </div>
        <label for="photo_4" class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden rounded-xl hover:scale-105 hover:shadow-xl duration-150 active:scale-95 cursor-pointer border border-black/10">
            <img id="popup_img_inpt_photo_4" src="img/products_images/<?=$row['img4']?>" alt="" class="h-full w-full object-cover object-center">
        </label>
        <input onchange="imgPrevProduct('photo_4')" type="file" name="photo_4" id="photo_4" class="hidden">
        </div>

        <!-- Product info -->
        <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 ">
            <h1 onclick="openPopupEdit('<?=$row['name']?>&for=edit_name&quill=false')" id="edit_name_demo" class=" active:scale-95 hover:outline-dashed hover:outline-violet-600 cursor-pointer rounded-lg duration-150 text-2xl font-medium tracking-tight text-gray-900 sm:text-3xl"><?=$row['name']?></h1>
            <input type="hidden" id="edit_name" name="name" value="<?=$row['name']?>">
        </div>

        <!-- Options -->
        <div class="mt-4 lg:row-span-3 lg:mt-0" >
            <h2 class="sr-only">Product information</h2>
            <input type="hidden" id="edit_price" name="sell_price_brutto" value="<?=$row['sell_price_brutto']?>">
            <div onclick="openPopupEdit('<?=$row['sell_price_brutto']?>&for=edit_price&quill=false')" class="active:scale-95 hover:outline-dashed hover:outline-violet-600 cursor-pointer rounded-lg duration-150 flex items-center justify-between">
                <div>
                    <span id="edit_price_demo" class=" text-3xl tracking-tight text-gray-900"><?=$row['sell_price_brutto']?> </span> <span> PLN</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
            <div class="mt-4 text-gray-800 flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <span class="text-sm">Produkt (netto) w tym marża</span>
                    <span id="price_n"><?=round($price_n, 2)?> PLN</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm">Prowizja pośrednika</span>
                    <span id="price_2"><?=round($price_2, 3)?> PLN</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm">Podatek VAT (23%)</span>
                    <span id="price_23"><?=round($price_23, 2)?> PLN</span>
                </div>
                <div class="border-t border-black/30 mt-1 pt-1 flex items-center justify-between">
                    <span class="flex gap-2 items-center">Razem 
                        <span onclick="updatePrice()" class="hover:text-violet-600 duration-150 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                            </svg>
                        </span>
                    </span>
                    <span id="price"><?=$row['sell_price_brutto']?> PLN</span>
                </div>
            </div>

            <!-- Colors -->
            <label class="inline-flex justify-between items-center cursor-pointer w-full mt-10">
                <input id="variants" name="variants" onchange="showVariants()" type="checkbox" value="" class="sr-only peer hidden" <?php if($row['type'] != 'main_single') {echo 'checked';}  ?>>
                <span class="font-medium text-gray-900">Warianty produktu</span>
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-violet-600 rounded-full peer dark:bg-gray-300 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-violet-600"></div>
            </label>
            <section id="variants_body_" class="mt-10">
            <div>
                <h3 class="text-sm font-medium text-gray-900">Color</h3>

                <fieldset aria-label="Choose a color" class="mt-4">
                <div class="flex items-center space-x-3">
                    <!-- Active and Checked: "ring ring-offset-1" -->
                    <label aria-label="White" class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-400 focus:outline-none">
                    <input type="radio" name="color-choice" value="White" class="sr-only">
                    <span aria-hidden="true" class="h-8 w-8 rounded-full border border-black border-opacity-10 bg-white"></span>
                    </label>
                    <!-- Active and Checked: "ring ring-offset-1" -->
                    <label aria-label="Gray" class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-400 focus:outline-none">
                    <input type="radio" name="color-choice" value="Gray" class="sr-only">
                    <span aria-hidden="true" class="h-8 w-8 rounded-full border border-black border-opacity-10 bg-gray-200"></span>
                    </label>
                    <!-- Active and Checked: "ring ring-offset-1" -->
                    <label aria-label="Black" class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-900 focus:outline-none">
                    <input type="radio" name="color-choice" value="Black" class="sr-only">
                    <span aria-hidden="true" class="h-8 w-8 rounded-full border border-black border-opacity-10 bg-gray-900"></span>
                    </label>
                </div>
                </fieldset>
            </div>

            <!-- Sizes -->
            <!-- <div class="mt-10">
                <div class="flex items-center justify-between">
                <h3 class="text-sm font-medium text-gray-900">Size</h3>
                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>
                </div>

                <fieldset aria-label="Choose a size" class="mt-4">
                <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                    
                    <label class="group relative flex cursor-not-allowed items-center justify-center rounded-md border bg-gray-50 px-4 py-3 text-sm font-medium uppercase text-gray-200 hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="XXS" disabled class="sr-only">
                    <span>XXS</span>
                    <span aria-hidden="true" class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                        <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                        </svg>
                    </span>
                    </label>
                    
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="XS" class="sr-only">
                    <span>XS</span>
                   
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="S" class="sr-only">
                    <span>S</span>
                   
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="M" class="sr-only">
                    <span>M</span>
                    
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="L" class="sr-only">
                    <span>L</span>
                    
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="XL" class="sr-only">
                    <span>XL</span>
                    
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="2XL" class="sr-only">
                    <span>2XL</span>
                    
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="3XL" class="sr-only">
                    <span>3XL</span>
                    
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                </div>
                </fieldset>
            </div> -->

            <!-- <a class="cursor-pointer duration-150 mt-10 flex w-full items-center justify-center rounded-xl border border-transparent bg-orange-500 px-8 py-3 text-base font-medium text-white hover:bg-orange-400 hover:scale-105 hover:shadow-xl active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Zakup z Allegro</a>
            <a class="cursor-pointer duration-150 mt-5 flex w-full items-center justify-center rounded-xl border border-transparent bg-[#22e4db] px-8 py-3 text-base font-medium text-[#012e34]  hover:scale-105 hover:shadow-xl active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Zakup z Olx</a> -->
        </section>
        <a class="duration-150 mt-10 flex w-full rounded-xl border border-transparent bg-orange-200 text-base font-medium text-[#012e34]  active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <img src="img/icons/allegro_icon.png" alt="" class="size-12 rounded-s-xl">
            <input type="text" name="our_allegro" class="w-full rounded-e-xl px-4 active:outline-none focus:outline-none text-gray-600 font-normal text-sm" value="<?=$row['our_allegro']?>" placeholder="Link do Allegro">
        </a>
        <a class="duration-150 mt-5 flex w-full rounded-xl border border-transparent bg-[#22e4db] text-base font-medium text-[#012e34]  active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <img src="img/icons/olx.jpg" alt="" class="size-12 rounded-s-xl">
            <input type="text" name="our_olx" class="w-full rounded-e-xl px-4 active:outline-none focus:outline-none text-gray-600 font-normal text-sm" value="<?=$row['our_olx']?>" placeholder="Link do Olx">
        </a>
        <a class="duration-150 mt-5 border-t flex w-full rounded-xl border border-transparent bg-red-500 text-base font-medium text-[#012e34]  active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <img src="img/icons/alie.png" alt="" class="size-12 rounded-s-xl">
            <input type="text" name="source" class="w-full rounded-e-xl px-4 active:outline-none focus:outline-none text-gray-600 font-normal text-sm" value="<?=$row['source']?>" placeholder="Link do Aliexpress (źródło)">
        </a>
        </div>
        
        <input type="hidden" id="edit_desc" name="description" value="<?=$row['description']?>">
        <div class="active:scale-95 hover:outline-dashed hover:outline-violet-600 cursor-pointer rounded-lg duration-150 py-2 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pr-8 lg:pt-6" id="edit_desc_demo" onclick="openPopupEdit('<?=$row['name']?>&for=edit_desc&quill=true')">
            <!-- Description and details -->
            <?=$row['description']?>
        </div>
        <input type="hidden" id="edit_desc_full" name="full_description" value="<?=$row['full_description']?>">
        <div class="lg:col-span-2">
            <div class="active:scale-95 hover:outline-dashed h-full hover:outline-violet-600 cursor-pointer rounded-lg duration-150 py-2 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-8 lg:pr-8 lg:pt-6" id="edit_desc_full_demo" onclick="openPopupEdit('&for=edit_desc_full&quill=true')">
                <!-- Description and details -->
                <?=$row['full_description']?>
                <!-- <div>
                <h3 class="sr-only">Description</h3>

                <div class="space-y-6">
                    <p class="text-base text-gray-900">The Basic Tee 6-Pack allows you to fully express your vibrant personality with three grayscale options. Feeling adventurous? Put on a heather gray tee. Want to be a trendsetter? Try our exclusive colorway: &quot;Black&quot;. Need to add an extra pop of color to your outfit? Our white tee has you covered.</p>
                </div>
                </div>

                <div class="mt-10">
                <h3 class="text-sm font-medium text-gray-900">Highlights</h3>

                <div class="mt-4">
                    <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                    <li class="text-gray-400"><span class="text-gray-600">Hand cut and sewn locally</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Dyed with our proprietary colors</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Pre-washed &amp; pre-shrunk</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Ultra-soft 100% cotton</span></li>
                    </ul>
                </div>
                </div>

                <div class="mt-10">
                <h2 class="text-sm font-medium text-gray-900">Details</h2>

                <div class="mt-4 space-y-6">
                    <p class="text-sm text-gray-600">The 6-Pack includes two black, two white, and two heather gray Basic Tees. Sign up for our subscription service and be the first to get new, exciting colors, like our upcoming &quot;Charcoal Gray&quot; limited release.</p>
                </div>
                </div> -->
            </div>
        </div>
        <div class="w-full col-span-3 mt-8 pt-8 border-t border-gray-200">
            <h1 class="text-xl font-medium font-[poppins] py-0 my-0 mb-4">Specyfikacja</h1>
            <div class="divide-y divide-gray-200">
                <?php
                $category = $row['category_id'];
                $sql = "SELECT product_parameters.id, product_parameters.value AS parameter_value, product_specs.value AS specs_value, product_specs.id as 'specs_id' FROM product_parameters LEFT JOIN product_specs ON product_specs.parameter_id = product_parameters.id AND product_specs.product_id = $id WHERE product_parameters.filter_category_id = $category ORDER BY CASE WHEN priority IS NULL THEN 1 ELSE 0 END, priority ASC, parameter_value ASC;";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row4 = mysqli_fetch_assoc($result))
                    {
                        if(is_null($row4['specs_id'])){
                            $specs_id = '`new`';
                        }else{
                            $specs_id = $row4['specs_id'];
                        }
                        echo '<div class="grid grid-cols-4 py-2 even:bg-gray-100 odd:bg-white hover:bg-gray-200 duration-100">
                        <span></span>
                        <div class="font-medium">
                            '.$row4['parameter_value'].'
                        </div>
                        <div class="pl-4 col-span-2 flex items-center gap-2 pr-2 border-l border-bray-200">
                            <input oninput="handleInputChange(`'. $row4['id'] .'`)" id="input-'.$row4['id'].'" type="text" value="'.$row4['specs_value'].'" class="w-full px-2 focus:outline-violet-600">
                            <a id="button-'. $row4['id'] .'" class="hidden hover:text-green-500 duration-150 text-gray-900"
                             onclick="handleButtonClick('. $row4['id'] .', document.getElementById(`input-'. $row4['id'] .'`).value, '. $id .', '. $specs_id .')"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </a>
                        </div>
                    </div>';
                    }
                }
                ?>
            <div class="divide-y divide-gray-200">
                <?php
                $sql = "SELECT product_parameters.id, product_parameters.value AS parameter_value, product_specs.value AS specs_value, product_specs.id as 'specs_id' FROM product_parameters LEFT JOIN product_specs ON product_specs.parameter_id = product_parameters.id AND product_specs.product_id = $id WHERE product_parameters.filter_category_id = 0";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row4 = mysqli_fetch_assoc($result))
                    {
                        if(is_null($row4['specs_id'])){
                            $specs_id = '`new`';
                        }else{
                            $specs_id = $row4['specs_id'];
                        }
                        echo '<div class="grid grid-cols-4 py-2 even:bg-gray-100 odd:bg-white hover:bg-gray-200 duration-100">
                        <span></span>
                        <div class="font-medium">
                            '.$row4['parameter_value'].'
                        </div>
                        <a class="pl-4 col-span-2 flex items-center gap-2 pr-2 border-l border-gray-200">
                            <input oninput="handleInputChange(`'. $row4['id'] .'`)" id="input-'.$row4['id'].'" type="text" value="'.$row4['specs_value'].'" class="w-full px-2 focus:outline-violet-600">
                            <button id="button-'. $row4['id'] .'" class="hidden hover:text-green-500 duration-150 text-gray-900"
                             onclick="handleButtonClick('. $row4['id'] .', document.getElementById(`input-'. $row4['id'] .'`).value, '. $id .', '. $specs_id .')"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </button>
                        </a>
                    </div>';
                    }
                }
                ?>
                <div class="grid grid-cols-4 divide-x divide-gray-200 py-2 even:bg-gray-100 odd:bg-white hover:bg-gray-200 duration-100">
                    <span></span>
                    <div class="font-medium">
                        Kod RGBpc.pl
                    </div>
                    <div class="pl-4 col-span-2 uppercase">
                        <?=$row['sku']?>
                    </div>
                    <input type="hidden" id="sku" name="sku" value="<?=$row['sku']?>">
                </div>
            </div>
        </div>
    </div>

    </div>
    
    </div>
    
<div class="w-full flex gap-2 items-center justify-center">
    <span onclick="popupproductsDelete()" class="text-xs flex gap-2 items-center justify-center text-red-600 hover:text-red-300 duration-150 cursor-pointer mb-8 -mt-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>
        <span>
            Usuń produkt
        </span>
    </span>
</div>
</section>

<?php
$name_in_scripts = "products";
?>


  </form>
  <section id="popup<?=$name_in_scripts?>DeleteBg" class="fixed z-[65] backdrop-blur-md	h-0 opacity-0 top-0 left-0 w-full h-full bg-[#0000009e] transition-opacity duration-300"></section>
  <section id="popup<?=$name_in_scripts?>Delete" onclick="popup<?=$name_in_scripts?>Delete()" class="z-[70] fixed scale-0 top-0 left-0 w-full h-full">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" id="pupupFaqDeleteOutput">
        <div class="relative transform overflow-hidden rounded-[25px] bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
          <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
            <button onclick="popup<?=$name_in_scripts?>Delete()" type="button" class="rounded-md text-gray-800 hover:text-gray-600 hover:rotate-90 duration-150 focus:outline-none focus:ring-2 ring-violet-600 focus:ring-offset-2">
              <span class="sr-only">Zamknij</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-gray-200 sm:mx-0 sm:h-10 sm:w-10">
              <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
              <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Usuń rekord z bazy danych</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-700">Czy na pewno chcesz usunąć ten rekord z bazy danych? Nie ma możliwości przywrócenia tych danych.</p>
              </div>
            </div>
          </div>
          <form action="scripts/products/delete.php" method="POST" class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
              <input type="hidden" name="id" id="id_for_delete_<?=$name_in_scripts?>" value="<?=$id?>">
              <button class="active:scale-95 mt-3 inline-flex w-full justify-center rounded-full px-4 py-2 text-sm font-medium text-gray-900 shadow-sm sm:ml-3 ring-inset ring-1 ring-[#3d3d3d] hover:ring-red-500 hover:bg-red-500 hover:text-white hover:shadow-xl duration-150 sm:mt-0 sm:w-auto">Usuń</button>
              <button onclick="popup<?=$name_in_scripts?>Delete()" type="button" class="sm:mt-0 mt-3 active:scale-95 inline-flex w-full justify-center rounded-full bg-gray-900 duration-150 px-4 py-2 text-sm font-medium text-white shadow-sm hover:shadow-xl hover:bg-gray-500 sm:ml-3 sm:w-auto">Anuluj</button>
          </form>
        </div>
      </div>
    </div>
  </section>
<script>
    function popup<?=$name_in_scripts?>Delete() {
        var popup = document.getElementById("popup<?=$name_in_scripts?>Delete")
        var popupBg = document.getElementById("popup<?=$name_in_scripts?>DeleteBg")
        popupBg.classList.toggle("opacity-0")
        popupBg.classList.toggle("h-0")
        popup.classList.toggle("scale-0")
        popup.classList.add("duration-200")
    }
</script>


<script>
    function imgPrevProduct(type) {
        const file = document.getElementById(`${type}`).files[0];
        const reader = new FileReader();
        reader.onloadend = function() {
            //ustawienie dla wszystkich img o id popup_img_inpt src
            document.getElementById(`popup_img_inpt_${type}`).src = reader.result;
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById(`popup_img_inpt_${type}`).src = "";
        }
    }
</script>


<script>
    // Pokaż przycisk, gdy wartość w polu input się zmieni
    function handleInputChange(id) {
        const input = document.getElementById(`input-${id}`);
        const button = document.getElementById(`button-${id}`);

        // Sprawdzenie, czy wartość input różni się od pierwotnej
        const originalValue = input.defaultValue; // Zawiera wartość początkową
        if (input.value !== originalValue) {
            button.classList.remove('hidden'); // Pokaż przycisk
        } else {
            button.classList.add('hidden'); // Ukryj przycisk
        }
    }

    // Ukryj przycisk po kliknięciu
    function handleButtonClick(id, newValue, productId, specsId) {
        const button = document.getElementById(`button-${id}`);
        const input = document.getElementById(`input-${id}`);

        // Zaktualizuj wartość defaultValue na nową wartość
        input.defaultValue = newValue;

        // Wywołaj funkcję aktualizacji (np. AJAX)
        updateSpecs(id, newValue, productId, specsId);

        // Ukryj przycisk po kliknięciu
        button.classList.add('hidden');
    }
</script>

<script>
    function updateSpecs(parameterId, value, productId, specsId) {
        console.log(parameterId, value, productId);
    // Dane do wysłania w żądaniu
    const postData = new FormData();
    postData.append('parameter_id', parameterId);
    postData.append('value', value);
    postData.append('product_id', productId);
    postData.append('specs_id', specsId);

    // Wysyłanie żądania POST do skryptu PHP
    fetch('scripts/products/update_specs.php', {
        method: 'POST',
        body: postData,
    })
    .then(response => response.json()) // Oczekiwanie na odpowiedź JSON
    .then(data => {
        // Jeśli odpowiedź zawiera sukces lub błąd
        switch (data.status) {
            case 'success':
                showAlert('success', data.message); // Wyświetl sukces
                break;
            case 'error':
                showAlert('error', data.message); // Wyświetl błąd
                break;
            case 'warning':
                showAlert('warning', data.message); // Wyświetl ostrzeżenie
                break;
            default:
                showAlert('error', 'Nieznany status odpowiedzi');
        }
    })
    .catch(error => {
        // Wyświetlenie alertu błędu w przypadku problemów z żądaniem
        showAlert('error', 'Wystąpił problem połączenia z serwerem');
        console.error('Błąd:', error);
    });
}

</script>

<script>
    function updatePrice() {
        var price = document.getElementById('edit_price').value;
        var price_2 = price * 0.02;
        var price_23 = price * 0.23;
        var price_n = price - price_2 - price_23;
        document.getElementById('price_n').innerHTML = price_n.toFixed(2) + ' PLN';
        document.getElementById('price_2').innerHTML = price_2.toFixed(2) + ' PLN';
        document.getElementById('price_23').innerHTML = price_23.toFixed(2) + ' PLN';
        document.getElementById('price').innerHTML = price + ' PLN';
    }
                    
</script>

<script>
    function showVariants() {
        var checkbox = document.getElementById('variants');
        var variants_body = document.getElementById('variants_body_');
        if(!checkbox.checked) {
            variants_body.style.display = 'none';
        }else {
            variants_body.style.display = 'block';
        }
    }
    showVariants();
</script>

<?php 
$name_in_scripts = 'Edit';
$delete_path = '';
$close= 'false';
$path = 'components/panel/edit_popup.php';
include "../../popup.php";
?>
