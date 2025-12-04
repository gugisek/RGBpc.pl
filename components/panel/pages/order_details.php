<?php
session_start();
$id = $_GET['id'];
include "../../../scripts/conn_db.php";
$sql = "SELECT * FROM orders WHERE id = $id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

?>
<section>
        <div class="flex items-center justify-between">
            <div class="flex items-center -mt-2">
                <h1 onclick="openPanelSite('orders')" class="cursor-pointer hover:text-gray-400 duration-150 font-medium text-2xl">Zamówienia</h1>
                <h1 data-aos="fade-right" data-aos-delay="100" class="font-medium text-2xl px-2 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </h1>
                <div data-aos="fade-right" data-aos-delay="200" class="flex items-center">
                <a>
                    <h1 onclick="" class="font-medium text-2xl text-gray-600"><?=$row['order_number']?></h1>
                </a>
                
                </div>
            </div>
        </div>

</section>

<main data-aos="fade-up" data-aos-delay="100">
  <header class="relative isolate pt-16">
    <div class="absolute inset-0 -z-10 overflow-hidden" aria-hidden="true">
      <div class="absolute left-16 top-full -mt-16 transform-gpu opacity-50 blur-3xl xl:left-1/2 xl:-ml-80">
        <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)"></div>
      </div>
      <div class="absolute inset-x-0 bottom-0 h-px bg-gray-900/5"></div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
      <div class="mx-auto flex max-w-2xl items-center justify-between gap-x-8 lg:mx-0 lg:max-w-none">
        <div class="flex items-center gap-x-6">
                <?php
                $platform_id = $row['platform_id'];
                $sql = "select img, name from platforms where id=$platform_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row2 = $result->fetch_assoc();
                }
                ?>
          <img src="img/icons/platforms/<?=$row2['img']?>" alt="" class="h-16 w-16 flex-none rounded-full ring-1 ring-gray-900/10">
          <h1>
            <div class="text-sm leading-6 text-gray-500">Zamówienie <span class="text-gray-700"><?=$row['order_number']?></span></div>
            <div class="mt-1 text-base font-semibold leading-6 text-gray-900"><?=$row2['name']?> <?php if($row['external_number'] != ''){ echo '#'.$row['external_number']; }?></div>
          </h1>
        </div>
        <div class="flex items-center gap-x-4 sm:gap-x-6">
        <div>
            <!-- <dt class="font-medium text-gray-900">Status zamówienia</dt> -->
            <dd class="mt-2">
                <div id="orderStatusLoading" class='hidden z-[30] bg-black/40 rounded-3xl size-8 flex items-center justify-center'><div class='lds-dual-ring scale-[.3]'></div></div>
                <select onchange="openPopupOrderConfirm(this.value+'&old_id=<?=$row['status_id']?>&order_id=<?=$row['id']?>')" name="" id="" class="minimal border border-black/10 w-full px-6 py-2 rounded-2xl focus:ring-0 focus:outline-1 focus:outline-violet-500 cursor-pointer active:scale-95 hover:shadow-xl duration-150 text-sm">
                    <?php
                    $status_id = $row['status_id'];
                    $sql = "select * from orders_status";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row3 = $result->fetch_assoc()) {
                        echo '<option ';
                        if ($row3['id'] == $status_id){
                            echo ' selected ';
                        }
                        echo 'value="'.$row3['id'].'">'.$row3['description'].'</option>';
                    }
                    }
                    ?>
                </select>
            </dd>
          </div>
          <button type="button" class="hidden text-sm font-semibold leading-6 text-gray-900 sm:block">Copy URL</button>
          <a href="#" class="hidden text-sm font-semibold leading-6 text-gray-900 sm:block">Edit</a>
          <a href="#" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send</a>

          <div class="relative sm:hidden">
            <button type="button" class="-m-3 block p-3" id="more-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">More</span>
              <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
              </svg>
            </button>

            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div class="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="more-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-50", Not Active: "" -->
              <button type="button" class="block w-full px-3 py-1 text-left text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="more-menu-item-0">Copy URL</button>
              <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="more-menu-item-1">Edit</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto grid max-w-2xl grid-cols-1 grid-rows-1 items-start gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
      <!-- Invoice summary -->
      <div class="lg:col-start-3 lg:row-end-1">
        <h2 class="sr-only">Summary</h2>
        <div class="rounded-lg bg-gray-50 shadow-sm ring-1 ring-gray-900/5">
          <dl class="flex flex-wrap">
            <div class="flex-auto pl-6 pt-6">
              <dt class="text-sm font-semibold leading-6 text-gray-900"><?php if($row['invoice_vat'] == 'personal'){echo 'Rachunek';} else {echo 'Faktura';}?></dt>
              <dd id="price" class="mt-1 text-base font-semibold leading-6 text-gray-900"></dd>
            </div>
            <div class="flex-none self-end px-6 pt-4">
              <dt class="sr-only">Status</dt>
              <dd class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-600/20">Zapłacono</dd>
            </div>
            <div class="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 px-6 pt-6">
              <dt class="flex-none">
                <span class="sr-only">Client</span>
                <svg class="h-6 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z" clip-rule="evenodd" />
                </svg>
              </dt>
              <dd class="text-sm font-medium leading-6 text-gray-900">Alex Curren</dd>
            </div>
            <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
              <dt class="flex-none">
                <span class="sr-only">Due date</span>
                <svg class="h-6 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path d="M5.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H6a.75.75 0 01-.75-.75V12zM6 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H6zM7.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H8a.75.75 0 01-.75-.75V12zM8 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H8zM9.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V10zM10 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H10zM9.25 14a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V14zM12 9.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V10a.75.75 0 00-.75-.75H12zM11.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H12a.75.75 0 01-.75-.75V12zM12 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H12zM13.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H14a.75.75 0 01-.75-.75V10zM14 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H14z" />
                  <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                </svg>
              </dt>
              <dd class="text-sm leading-6 text-gray-500">
                <time datetime="2023-01-31">January 31, 2023</time>
              </dd>
            </div>
            <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
              <dt class="flex-none">
                <span class="sr-only">Status</span>
                <svg class="h-6 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M2.5 4A1.5 1.5 0 001 5.5V6h18v-.5A1.5 1.5 0 0017.5 4h-15zM19 8.5H1v6A1.5 1.5 0 002.5 16h15a1.5 1.5 0 001.5-1.5v-6zM3 13.25a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zm4.75-.75a.75.75 0 000 1.5h3.5a.75.75 0 000-1.5h-3.5z" clip-rule="evenodd" />
                </svg>
              </dt>
              <dd class="text-sm leading-6 text-gray-500">Paid with MasterCard</dd>
            </div>
          </dl>
          <div class="mt-6 border-t border-gray-900/5 px-6 py-6">
            <!-- tutaj zrobić aby można było wygenerować lub aby załączyć pdf i png i jpg i mieć podgląd w popupie tego -->
            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Download receipt <span aria-hidden="true">&rarr;</span></a>
          </div>
        </div>

        <!-- dostawa summary -->
        <div class="rounded-lg bg-gray-50 shadow-sm ring-1 mt-8 ring-gray-900/5">
          <dl class="flex flex-wrap">
            <div class="flex-auto pl-6 pt-6">
              <dt class="text-sm font-semibold leading-6 text-gray-900">Sposób dostawy</dt>
              <dd id="" class="mt-4 text-base font-semibold leading-6 text-gray-900">
              <?php
                $delivery_id = $row['shipping_method'];
                $sql = "select img, name, desc_short, additonal_box_machine_number from shippings where id=$delivery_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row5 = $result->fetch_assoc();
                    echo '
                        <div class="flex items-center">
                            <img class="size-9 border border-black/10 rounded-lg object-contain" src="img/icons/delivery/'.$row5['img'].'">
                            <div class="ml-4">
                                <p class="text-gray-900 text-xs">'.$row5['name'].'</p>
                            </div>
                        </div>
                    ';
                }
                ?>
              </dd>
            </div>
            <div class="flex-none self-end px-6">
              <dt class="sr-only">Status</dt>
              <dd class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-600/20">Zapłacono</dd>
            </div>

            <?php
            if($row5['additonal_box_machine_number'] == 1) {
                echo '
                <div class="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 px-6 pt-6">
                    <dt class="flex-none">
         
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>

                    </dt>
                    <dd class="text-sm font-medium leading-6 text-gray-900 uppercase">'.$row['paczkomat'].'</dd>
                </div>
                ';
            }
            ?>
            <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
              <dt class="flex-none">
                <span class="sr-only">Status</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-5 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>

              </dt>
              <dd class="text-sm leading-6 text-gray-500"><?=$row['client_phone_number']?></dd>
            </div>

            <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
              <dt class="flex-none">
                <span class="sr-only">Status</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-5 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                </svg>
              </dt>
              <dd class="text-sm leading-6 text-gray-500"><?=$row['client_email']?></dd>
            </div>

            <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
              <dt class="flex-none">
                <span class="sr-only">Status</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-5 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                </svg>

              </dt>
              <dd class="text-sm leading-6 text-gray-500">640302375656304928</dd>
            </div>
          </dl>
          <div class="mt-6 border-t border-gray-900/5 px-6 py-6">
            <!-- tutaj zrobić aby można było wygenerować lub aby załączyć pdf i png i jpg i mieć podgląd w popupie tego -->
            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Percel tracking <span aria-hidden="true">&rarr;</span></a>
          </div>
        </div>
      </div>

      

      <!-- Invoice -->
      <div class="-mx-4 px-4 py-8 shadow-sm ring-1 ring-gray-900/5 sm:mx-0 sm:rounded-lg sm:px-8 sm:pb-14 lg:col-span-2 lg:row-span-2 lg:row-end-2 xl:px-16 xl:pb-20 xl:pt-16">
        <h2 class="text-base font-semibold leading-6 text-gray-900">Zamówienie</h2>
        <dl class="mt-6 grid grid-cols-1 text-sm leading-6 sm:grid-cols-2">
          <div class="sm:pr-4">
            <dt class="inline text-gray-500">Złożone</dt>
            <dd class="inline text-gray-700"><time datetime="2023-23-01"><?=date_format(date_create($row['create_date']), "d.m.Y H:i")?></time></dd>
          </div>
          <div class="mt-2 sm:mt-0 sm:pl-4">
            <dt class="inline text-gray-500">Ostatnia aktualizacja</dt>
            <dd class="inline text-gray-700"><time datetime="2023-31-01"><?=date_format(date_create($row['last_update']), "d.m.Y H:i")?></time></dd>
          </div>
          <div class="mt-6 border-t border-gray-900/5 pt-6 sm:pr-4">
            <dt class="font-semibold text-gray-900">Sprzedający</dt>
            <?php
                $seller_id = $row['seller_id'];
                $sql = "select * from sellers where id=$seller_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row4 = $result->fetch_assoc();
                    echo '
                    <dd class="mt-2 text-gray-500"><span class="font-medium text-gray-900">'.$row4['name'].'</span><br>'.$row4['phone_number'].', '.$row4['email'].'<br>'.$row4['street'].' '.$row4['building'].' '.$row4['city'].', '.$row4['country'].' '.$row4['post_code'].'</dd>
                    ';
                }
                ?>
          </div>
          <div class="mt-8 sm:mt-6 sm:border-t sm:border-gray-900/5 sm:pl-4 sm:pt-6">
            <dt class="font-semibold text-gray-900">Kupujący</dt>
            <dd class="mt-2 text-gray-500"><span class="font-medium text-gray-900"><?=$row['client']?></span><br><?=$row['client_phone_number']?>, <?=$row['client_email']?><br><?=$row['client_addres']?> <?=$row['client_city']?>, PL <?=$row['client_post_number']?></dd>
          </div>
        </dl>
        <table class="mt-16 w-full whitespace-nowrap text-left text-sm leading-6">
          <colgroup>
            <col class="w-full">
            <col>
            <col>
            <col>
          </colgroup>
          <thead class="border-b border-gray-200 text-gray-900">
            <tr>
              <th scope="col" class="px-0 py-3 font-semibold">Produkt</th>
              <th scope="col" class="hidden py-3 pl-8 pr-0 text-right font-semibold sm:table-cell">Ilość</th>
              <th scope="col" class="hidden py-3 pl-8 pr-0 text-right font-semibold sm:table-cell">Cena szt.</th>
              <th scope="col" class="py-3 pl-8 pr-0 text-right font-semibold">Cena sum.</th>
            </tr>
          </thead>
          <tbody>
          <?php
                           
                           $cart = $row['products'];
                           // Dekodujemy JSON na tablicę asocjacyjną
                           
                           $cart = json_decode($cart, true);

                       if (!is_array($cart)) {
                           $cart = []; // Jeśli nie jest tablicą, ustaw pustą tablicę
                       }

                       // Tworzymy tablicę ilości na podstawie $cart
                       $productQuantities = [];
                       foreach ($cart as $item) {
                           $productQuantities[$item['id']] = $item['quantity'];
                       }

                       // Pobranie tylko identyfikatorów produktów
                       $productIds = array_column($cart, 'id');

                       if (empty($productIds)) {
                           $cartString = "''"; // Jeśli koszyk pusty, zapobiega błędowi SQL
                       } else {
                           // Zamiana na liczby całkowite i tworzenie stringa SQL
                           $productIds = array_map('intval', $productIds);
                           $cartString = "'" . implode("','", $productIds) . "'";
                       }
                       $sql = "SELECT products.id, name, description, img, products.sell_price_brutto, sku, 
                       count(product_doms.id) as 'quantity', products.status_id
                       FROM products 
                       LEFT JOIN product_doms ON product_doms.product_id = products.id AND product_doms.status_id = 2
                       WHERE products.id IN ($cartString) 
                       GROUP BY products.id
                       ORDER BY FIELD(products.id, $cartString) DESC;";
                           $result = $conn->query($sql);
                           $price = 0;
                           $products = 0;
                           $products_2 = 0;
                           if ($result->num_rows > 0) {
                              
                               while($row = $result->fetch_assoc()) {
                                   $products_2++;
                                   $products = $products + 1* $productQuantities[$row['id']];
                                   $cartQuantity = isset($productQuantities[$row['id']]) ? $productQuantities[$row['id']] : 1;
                                   $price += $row['sell_price_brutto']* $cartQuantity;
                                   echo '
                                   <tr class="border-b border-gray-100">
                                        <td class="max-w-0 px-0 py-5">
                                            <div class="flex gap-4">
                                                <img src="img/products_images/'.$row['img'].'" class="h-14 w-14 rounded-xl bg-gray-100 object-cover object-center">
                                                <div>
                                                    <div class="flex-wrap text-wrap font-medium text-gray-900">'.$row['name'].'</div>
                                                    <div class="truncate text-gray-500 uppercase">'.$row['sku'].'</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700 sm:table-cell">'.$productQuantities[$row['id']].'</td>
                                        <td class="hidden py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700 sm:table-cell">'.number_format($row['sell_price_brutto'], 2, ',', '').' zł</td>
                                        <td class="py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700">'.number_format($productQuantities[$row['id']]*$row['sell_price_brutto'], 2, ',', '').' zł</td>
                                    </tr>
                                   ';
                               }
                               echo '<!--<p class="text-center font-normal text-sm text-gray-400 py-1">Liczba produktów w koszyku: '.$products_2.' ('.$products.' szt.)</p>--!>';
                               
                           }
                           $vat = $price*0.23;
                           $price_netto = $price-$vat;

       ?>
          </tbody>
          <tfoot>
            <tr>
              <th scope="row" class="px-0 pb-0 pt-6 font-normal text-gray-700 sm:hidden">Cena netto</th>
              <th scope="row" colspan="3" class="hidden px-0 pb-0 pt-6 text-right font-normal text-gray-700 sm:table-cell">Cena netto</th>
              <td class="pb-0 pl-8 pr-0 pt-6 text-right tabular-nums text-gray-900"><?=number_format($price_netto, 2, ',', '')?> zł</td>
            </tr>
            <tr>
              <th scope="row" class="pt-4 font-normal text-gray-700 sm:hidden">Podatek Vat</th>
              <th scope="row" colspan="3" class="hidden pt-4 text-right font-normal text-gray-700 sm:table-cell">Podatek Vat</th>
              <td class="pb-0 pl-8 pr-0 pt-4 text-right tabular-nums text-gray-900"><?=number_format($vat, 2, ',', '')?> zł</td>
            </tr>
            <tr>
              <th scope="row" class="pt-4 font-normal text-gray-700 sm:hidden">Dostawa</th>
              <th scope="row" colspan="3" class="hidden pt-4 text-right font-normal text-gray-700 sm:table-cell">Dostawa</th>
            <!-- tutaj to trzeba aby można było robić custom cene do dostawy oraz aby była ona zapisywana w rekordzie zamówienia i dopiero z tąd pobierać informacje potrzebne tutaj -->

              <td class="pb-0 pl-8 pr-0 pt-4 text-right tabular-nums text-gray-900">- zł</td>
            </tr>
            <tr>
              <th scope="row" class="pt-4 font-semibold text-gray-900 sm:hidden">Suma końcowa</th>
              <th scope="row" colspan="3" class="hidden pt-4 text-right font-semibold text-gray-900 sm:table-cell">Suma końcowa</th>
              <td class="pb-0 pl-8 pr-0 pt-4 text-right font-semibold tabular-nums text-gray-900"><?=str_replace(".", ",", $price)?> zł</td>
            </tr>
          </tfoot>
        </table>
      </div>

      <div class="lg:col-start-3">
        <!-- Activity feed -->
        <h2 class="text-sm font-semibold leading-6 text-gray-900">Aktywność</h2>
        <div id="time_line_body">
        <ul role="list" class="space-y-6 mt-6">
            <?php
            $id = $_GET['id'];
            $type = 'orders';
            include '../../../scripts/conn_db.php';
            $sql = "SELECT time_lines.object_type, time_lines.create_date, time_lines.type_id, time_lines.message, concat(users.name, ' ', users.sur_name) as 'user', users.profile_picture FROM `time_lines` left join users on users.id=time_lines.user_id where object_id = $id and object_type = '$type' order by time_lines.create_date desc;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    $date = substr($row['create_date'], 0, 10);
                    $time = substr($row['create_date'], 11, 5);
                    //calculate date, if orlder than 7 days, show date else calculate days from now or hours or minutes or seconds
                    $date_now = date("Y-m-d H:i:s");
                    $date_now = strtotime($date_now);
                    $date = strtotime($row['create_date']);
                    $diff = $date_now - $date;
                    $days = floor($diff / (60 * 60 * 24));
                    $hours = floor($diff / (60 * 60));
                    $minutes = floor($diff / 60);
                    $seconds = $diff;
                    if($days > 7){
                        $date = substr($row['create_date'], 0, 10);
                    }elseif($days > 0){
                        $date = $days . 'd ago';
                    }elseif($hours > 0){
                        $date = $hours . 'h ago';
                    }elseif($minutes > 0){
                        $date = $minutes . 'm ago';
                    }elseif($seconds > 0){
                        $date = $seconds . 's ago';
                    }else{
                        $date = 'teraz';
                    }

                    if($row['profile_picture'] == NULL){
                        $row['profile_picture'] = 'default.png';
                    }

                    if($row['type_id']=='3'){
                        echo '
                        <li class="relative flex gap-x-4">
                            <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                                <div class="w-px bg-gray-200"></div>
                            </div>
                            <img src="img/users_images/'.$row['profile_picture'].'" alt="" class="relative mt-3 h-6 w-6 flex-none rounded-full bg-gray-50 object-cover border border-black/10">
                            <div class="flex-auto rounded-xl p-3 ring-1 ring-inset ring-gray-200">
                                <div class="flex justify-between gap-x-4">
                                    <div class="py-0.5 text-xs leading-5 text-gray-500"><span class="font-medium text-gray-900">'. $row['user'] .'</span> skomentował</div>
                                    <time datetime="2023-01-23T15:56" class="flex-none py-0.5 text-xs leading-5 text-gray-500 flex gap-1 items-center">
                                    <span class="hover:text-violet-600 duration-150 hover:scale-110 active:scale-95 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                    </span>
                                     <span>'. $date .'</span></time>
                                </div>
                                <p class="text-sm leading-6 text-gray-500">'. $row['message'] .'</p>
                            </div>
                        </li>
                        ';
                    }else{
                    echo '
                    <li class="relative flex gap-x-4">
                        <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                            <div class="w-px bg-gray-200"></div>
                        </div>';
                            if($row['type_id'] == '4'){
                                echo '
                                <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                                    <svg class="h-6 w-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                </div>';
                            }elseif($row['type_id'] == '1'){
                                echo '
                                <div class="relative flex h-6 w-6 flex-none items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5 text-white bg-indigo-600 rounded-full p-1">
                                        <path d="M1.75 1.002a.75.75 0 1 0 0 1.5h1.835l1.24 5.113A3.752 3.752 0 0 0 2 11.25c0 .414.336.75.75.75h10.5a.75.75 0 0 0 0-1.5H3.628A2.25 2.25 0 0 1 5.75 9h6.5a.75.75 0 0 0 .73-.578l.846-3.595a.75.75 0 0 0-.578-.906 44.118 44.118 0 0 0-7.996-.91l-.348-1.436a.75.75 0 0 0-.73-.573H1.75ZM5 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM13 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                                    </svg>

                                </div>';
                            }else{
                                echo '
                                    <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                                        <div class="h-1.5 w-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                                    </div>';
                            }
                        echo '
                        <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500">'. $row['message'] .' przez <span class="font-medium text-gray-900">'. $row['user'] .'</span></p>
                        <time datetime="2023-01-23T11:03" class="flex-none py-0.5 text-xs leading-5 text-gray-500" title="'.date_format(date_create($row['create_date']), "d.m.Y H:i:s").'">'. $date .'</time>

                    </li>
                    ';
                        }
                }
            }
            ?>

        </ul>

            <!-- New comment form -->
            <div class="mt-6 flex gap-x-3">
                <img src="img/users_images/<?=$_SESSION['profile_picture']?>" alt="" class="h-6 w-6 flex-none rounded-full bg-gray-50">
                <form class="relative flex-auto">
                    <div class="overflow-hidden rounded-lg pb-12 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-violet-600">
                        <label for="comment" class="sr-only">Dodaj komentarz</label>
                        <textarea rows="2" name="comment" id="message" class="block w-full resize-none border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 focus:outline-none sm:text-sm sm:leading-6" placeholder="Dodaj notatkę..."></textarea>
                        
                    </div>
                    
                    <div class="absolute inset-x-0 bottom-0 flex justify-between py-2 pl-3 pr-2">
                        <div class="flex items-center space-x-5">
                            
                            
                            </div>
                            <div class="flex flex-row gap-2 ">

                                <div id="messageLoading" class='hidden z-[30] bg-black/40 rounded-3xl size-8 flex items-center justify-center'><div class='lds-dual-ring scale-[.3]'></div></div>
                                <button onclick="addComment('<?=$id?>')" type="button" class="rounded-2xl bg-violet-600 px-4 py-1.5 text-sm font-medium hover:scale-105 active:scale-95 hover:shadow-xl duration-150 text-white shadow-sm">Dodaj</button>
                            </div>
                    </div>
                </form>
            </div>

      </div>

      </div>
    </div>
  </div>
</main>


<script>

            document.getElementById('price').innerHTML = '<?=number_format($price, 2, ',', '')?> zł';

        function reloadTimeLine() {

        var body = document.getElementById("time_line_body");
        //  body.innerHTML = "<div data-aos='fade-up' data-aos-delay='100' class='w-full duartion-150 flex items-center mt-[20vh] justify-center z-[999]'><div class='z-[30] bg-black/90 p-4 rounded-2xl'><div class='lds-dual-ring'></div></div></div>";
        const url = "components/panel/orders/time_line.php?id=<?=$id?>";
        fetch(url)
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const parsedDocument = parser.parseFromString(data, "text/html");
                body.innerHTML = parsedDocument.body.innerHTML;
                executeScripts(parsedDocument);
            });
        }

    function addComment(orderId) {
        // Dane do wysłania w żądaniu
        const postData = new FormData();
        var message = document.getElementById("message").value

        console.log(orderId, message);

        postData.append('message', message);
        postData.append('product_id', orderId);
    
        //ustawienie selecta na disabled oraz animacji ładowania kółka na nim na czas wysyłania żądania
        var loading = document.getElementById("messageLoading");
        loading.classList.remove("hidden");
    // Wysyłanie żądania POST do skryptu PHP
    fetch('scripts/orders/add_comment.php', {
        method: 'POST',
        body: postData,
    })
    .then(response => response.json()) // Oczekiwanie na odpowiedź JSON
    .then(data => {
        // Jeśli odpowiedź zawiera sukces lub błąd
        switch (data.status) {
            case 'success':
                showAlert('success', data.message); // Wyświetl sukces
                reloadTimeLine();
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

    //odwołanie selecta z powrotem do stanu aktywnego
    loading.classList.add("hidden");
    

}

function updateOrderStatus(old_id, new_id, order_id){
    const postData = new FormData();
        postData.append('old_id', old_id);
        postData.append('new_id', new_id);
        postData.append('order_id', order_id);
        //ustawienie selecta na disabled oraz animacji ładowania kółka na nim na czas wysyłania żądania
        var loading = document.getElementById("orderStatusLoading");
        loading.classList.remove("hidden");
    // Wysyłanie żądania POST do skryptu PHP
    fetch('scripts/orders/update_status.php', {
        method: 'POST',
        body: postData,
    })
    .then(response => response.json()) // Oczekiwanie na odpowiedź JSON
    .then(data => {
        // Jeśli odpowiedź zawiera sukces lub błąd
        switch (data.status) {
            case 'success':
                showAlert('success', data.message); // Wyświetl sukces
                reloadTimeLine();
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

    //odwołanie selecta z powrotem do stanu aktywnego
    loading.classList.add("hidden");
    

}

</script>

<?php
$name_in_scripts = 'OrderConfirm';
$delete_path = '';
$close = 'true';
$path = 'components/panel/orders/status_confirm.php';
include "../../popup.php";
?>