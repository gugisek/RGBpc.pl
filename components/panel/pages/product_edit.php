<?php
$id = $_GET['id'];
include "../../../scripts/conn_db.php";
$sql = "SELECT products.id, products.name, products.sku, products.img, products.type, products.source, products.our_allegro, products.our_olx, products.sell_price_brutto, product_categories.category, products.description, products.full_description, products.status_id, products.sell_price_brutto, count(product_doms.id) as 'quantity', product_status.status FROM `products` left JOIN product_categories on product_categories.id=products.category_id LEFT JOIN product_doms on product_doms.product_id=products.id LEFT JOIN product_status on product_status.id=products.status_id where products.id=$id group by products.id;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
$row = mysqli_fetch_assoc($result);

$price = $row['sell_price_brutto'];

$price_2 = $price * 0.02;

$price_23 = $price * 0.23;

$price_n = $price - $price_2 - $price_23;


?>
<section>
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <h1 onclick="openPanelSite('products')" class="cursor-pointer hover:text-gray-400 duration-150 font-medium text-2xl">Produkty</h1>
                <h1 data-aos="fade-right" data-aos-delay="100" class="font-medium text-2xl px-2 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </h1>
                <h1 data-aos="fade-right" data-aos-delay="100" class="font-medium text-2xl text-gray-600"><?=$row['name']?></h1>
            </div>
            <div class="flex items-center gap-2 flex-row-reverse">
                <a id="" class="cursor-pointer text-gray-800 hover:text-white hover:bg-green-500 hover:shadow-xl border border-black/10 shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 text-sm leading-6 font-semibold ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a id="" class="cursor-pointer text-gray-800 hover:text-white hover:bg-red-500 hover:shadow-xl border border-black/10 shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 text-sm leading-6 font-semibold ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>
                </a>
                <select type="text" id="" value="" placeholder="" class="minimal border border-black/10 w-full px-6 py-3 rounded-2xl focus:ring-0 focus:outline-1 focus:outline-violet-500 cursor-pointer active:scale-95 hover:shadow-xl duration-150 text-sm">
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
            <select class="text-gray-800 active:scale-95 font-normal focus:outline-1 hover:shadow-xl focus:outline-violet-500 cursor-pointer border border-black/10 rounded-xl py-2 px-4 duration-150">
                <?php
                    $sql = "SELECT * from product_categories";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row3 = mysqli_fetch_assoc($result))
                        {
                            echo '<option ';
                            if ($row['category'] == $row3['id']) {
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
        <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
            <img src="img/products_images/<?=$row['img']?>" alt="Two each of gray, white, and black shirts laying flat." class="h-full w-full object-cover object-center">
        </div>
        <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
            <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
            <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg" alt="Model wearing plain black basic tee." class="h-full w-full object-cover object-center">
            </div>
            <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
            <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg" alt="Model wearing plain gray basic tee." class="h-full w-full object-cover object-center">
            </div>
        </div>
        <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
            <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-featured-product-shot.jpg" alt="Model wearing plain white basic tee." class="h-full w-full object-cover object-center">
        </div>
        </div>

        <!-- Product info -->
        <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 ">
            <h1 onclick="openPopupEdit('<?=$row['name']?>&for=edit_name&quill=false')" id="edit_name_demo" class="active:scale-95 hover:outline-dashed hover:outline-violet-600 cursor-pointer rounded-lg duration-150 text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl"><?=$row['name']?></h1>
            <input type="hidden" id="edit_name" value="<?=$row['name']?>">
        </div>

        <!-- Options -->
        <div class="mt-4 lg:row-span-3 lg:mt-0" >
            <h2 class="sr-only">Product information</h2>
            <input type="hidden" id="edit_price" value="<?=$row['sell_price_brutto']?>">
            <div onclick="openPopupEdit('<?=$row['sell_price_brutto']?>&for=edit_price&quill=false')" class="active:scale-95 hover:outline-dashed hover:outline-violet-600 cursor-pointer rounded-lg duration-150 flex items-center justify-between">
                <div>
                    <span id="edit_price_demo" class=" text-3xl tracking-tight text-gray-900"><?=$row['sell_price_brutto']?> </span> <span> PLN (brutto)</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
            <div class="mt-4 text-gray-600 flex flex-col gap-2 font-[poppins]">
                <div class="flex items-center justify-between">
                    <span class="text-sm">Produkt (netto) w tym marża</span>
                    <span><?=round($price_n, 2)?> PLN</span>
                </div>
                <!-- <div class="flex items-center justify-between">
                    <span class="text-sm">Opakowanie</span>
                    <span>2 PLN</span>
                </div> -->
                <div class="flex items-center justify-between">
                    <span class="text-sm">Prowizja pośrednika</span>
                    <span><?=round($price_2, 3)?> PLN</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm">Podatek VAT (23%)</span>
                    <span><?=round($price_23, 2)?> PLN</span>
                </div>
                <div class="border-t border-black/30 mt-1 pt-1 flex items-center justify-between">
                    <span class="">Razem</span>
                    <span><?=$row['sell_price_brutto']?> PLN</span>
                </div>
            </div>

            <!-- Colors -->
            <label class="inline-flex justify-between items-center cursor-pointer w-full mt-10">
                <input id="variants" onchange="showVariants()" type="checkbox" value="" class="sr-only peer hidden" <?php if($row['type'] != 'main_single') {echo 'checked';}  ?>>
                <span class="font-medium text-gray-900">Warianty produktu</span>
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-violet-600 rounded-full peer dark:bg-gray-300 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-violet-600"></div>
            </label>
            <form id="variants_body" class="mt-10">
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
            <div class="mt-10">
                <div class="flex items-center justify-between">
                <h3 class="text-sm font-medium text-gray-900">Size</h3>
                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>
                </div>

                <fieldset aria-label="Choose a size" class="mt-4">
                <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                    <!-- Active: "ring-2 ring-indigo-500" -->
                    <label class="group relative flex cursor-not-allowed items-center justify-center rounded-md border bg-gray-50 px-4 py-3 text-sm font-medium uppercase text-gray-200 hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="XXS" disabled class="sr-only">
                    <span>XXS</span>
                    <span aria-hidden="true" class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                        <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                        </svg>
                    </span>
                    </label>
                    <!-- Active: "ring-2 ring-indigo-500" -->
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="XS" class="sr-only">
                    <span>XS</span>
                    <!--
                        Active: "border", Not Active: "border-2"
                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    <!-- Active: "ring-2 ring-indigo-500" -->
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="S" class="sr-only">
                    <span>S</span>
                    <!--
                        Active: "border", Not Active: "border-2"
                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    <!-- Active: "ring-2 ring-indigo-500" -->
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="M" class="sr-only">
                    <span>M</span>
                    <!--
                        Active: "border", Not Active: "border-2"
                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    <!-- Active: "ring-2 ring-indigo-500" -->
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="L" class="sr-only">
                    <span>L</span>
                    <!--
                        Active: "border", Not Active: "border-2"
                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    <!-- Active: "ring-2 ring-indigo-500" -->
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="XL" class="sr-only">
                    <span>XL</span>
                    <!--
                        Active: "border", Not Active: "border-2"
                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    <!-- Active: "ring-2 ring-indigo-500" -->
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="2XL" class="sr-only">
                    <span>2XL</span>
                    <!--
                        Active: "border", Not Active: "border-2"
                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                    <!-- Active: "ring-2 ring-indigo-500" -->
                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                    <input type="radio" name="size-choice" value="3XL" class="sr-only">
                    <span>3XL</span>
                    <!--
                        Active: "border", Not Active: "border-2"
                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                </div>
                </fieldset>
            </div>

            <!-- <a class="cursor-pointer duration-150 mt-10 flex w-full items-center justify-center rounded-xl border border-transparent bg-orange-500 px-8 py-3 text-base font-medium text-white hover:bg-orange-400 hover:scale-105 hover:shadow-xl active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Zakup z Allegro</a>
            <a class="cursor-pointer duration-150 mt-5 flex w-full items-center justify-center rounded-xl border border-transparent bg-[#22e4db] px-8 py-3 text-base font-medium text-[#012e34]  hover:scale-105 hover:shadow-xl active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Zakup z Olx</a> -->
        </form>
        <a class="cursor-pointer duration-150 mt-10 flex w-full rounded-xl border border-transparent bg-orange-200 text-base font-medium text-[#012e34]  active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <img src="img/icons/allegro_icon.png" alt="" class="size-12 rounded-s-xl">
            <input type="text" class="w-full rounded-e-xl px-4 active:outline-none focus:outline-none text-gray-600 font-normal text-sm" value="<?=$row['our_allegro']?>" placeholder="Link do Allegro">
        </a>
        <a class="cursor-pointer duration-150 mt-5 flex w-full rounded-xl border border-transparent bg-[#22e4db] text-base font-medium text-[#012e34]  active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <img src="img/icons/olx.jpg" alt="" class="size-12 rounded-s-xl">
            <input type="text" class="w-full rounded-e-xl px-4 active:outline-none focus:outline-none text-gray-600 font-normal text-sm" value="<?=$row['our_olx']?>" placeholder="Link do Olx">
        </a>
        <a class="cursor-pointer duration-150 mt-5 border-t flex w-full rounded-xl border border-transparent bg-red-500 text-base font-medium text-[#012e34]  active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <img src="img/icons/alie.png" alt="" class="size-12 rounded-s-xl">
            <input type="text" class="w-full rounded-e-xl px-4 active:outline-none focus:outline-none text-gray-600 font-normal text-sm" value="<?=$row['source']?>" placeholder="Link do Aliexpress (źródło)">
        </a>
        </div>
        
        <input type="hidden" id="edit_desc" value="<?=$row['description']?>">
        <div class="active:scale-95 hover:outline-dashed hover:outline-violet-600 cursor-pointer rounded-lg duration-150 py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-8 lg:pr-8 lg:pt-6" id="edit_desc_demo" onclick="openPopupEdit('<?=$row['name']?>&for=edit_desc&quill=true')">
            <!-- Description and details -->
            <?=$row['description']?>
        </div>
        <input type="hidden" id="edit_desc_full" value="<?=$row['full_description']?>">
        <div class="active:scale-95 hover:outline-dashed h-full hover:outline-violet-600 cursor-pointer rounded-lg duration-150 py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-8 lg:pr-8 lg:pt-6" id="edit_desc_full_demo" onclick="openPopupEdit('&for=edit_desc_full&quill=true')">
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
    </div>
    </div>

</section>

<script>
    function showVariants() {
        var checkbox = document.getElementById('variants');
        var variants_body = document.getElementById('variants_body');
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