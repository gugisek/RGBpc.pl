<section data-aos="fade-up" data-aos-delay="100">
    <h1 class="font-medium text-2xl">Ustawienia</h1>

    <div class="mx-auto lg:flex lg:gap-x-16 mt-2">
  <aside class=" overflow-x-auto border-b border-gray-900/5 py-4 lg:block lg:w-64 lg:flex-none lg:border-0">
    <nav class="px-4 sm:px-6 lg:px-0">
      <ul role="list" class="flex gap-x-3 gap-y-1 whitespace-nowrap lg:flex-col">
        <li>
          <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-indigo-600 hover:bg-gray-50" -->
          <a href="#ur" class="text-gray-700 hover:text-violet-500 duration-150 hover:bg-gray-50 group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold">
            <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-violet-500 duration-150" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Użytkownicy - role
          </a>
        </li>
        <li>
          <a href="#us" class="text-gray-700 hover:text-violet-500 hover:bg-gray-50 group duration-150 flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-violet-500 duration-150">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
            </svg>

            Użytkownicy - statusy
          </a>
        </li>
        <li>
          <a href="#pk" class="text-gray-700 hover:text-violet-500 hover:bg-gray-50 group duration-150 flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-violet-500 duration-150">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
          </svg>


            Produkty - kategorie
          </a>
        </li>
      </ul>
    </nav>
  </aside>

  <main class="px-4 sm:px-6 lg:flex-auto lg:px-0">
    <div class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 pb-16 lg:max-w-none">
      <div id="ur">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Użytkownicy - role</h2>
        <p class="mt-1 text-sm leading-6 text-gray-500">Role jakie możesz przypisać dla kont. Lepiej nie edytować domyślnej roli user.</p>

        <dl class="mt-6 divide-y divide-gray-100 border-t border-gray-150 text-sm leading-6">
            <?php
                include '../../../scripts/conn_db.php';
                $sql = "SELECT id, role, description FROM user_roles";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div onclick="openPopupUserRoles('.$row['id'].')" class="py-5 px-4 sm:flex hover:bg-gray-200 duration-150 cursor-pointer rounded-2xl active:scale-[98%]">
                        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">'.$row["role"].'</dt>
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
            <button type="button" onclick="openPopupUserRolesAdd()" class="text-sm px-4 font-semibold leading-6 text-violet-500 hover:text-violet-300 duration-150"><span aria-hidden="true">+</span> Dodaj nową rolę</button>
          </div>
        </dl>
      </div>

      <div id="us">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Użytkownicy - statusy</h2>
        <p class="mt-1 text-sm leading-6 text-gray-500">Connect bank accounts to your account.</p>

        <ul role="list" class="mt-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">
          <li class="flex justify-between gap-x-6 py-6">
            <div class="font-medium text-gray-900">TD Canada Trust</div>
            <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500">Update</button>
          </li>
          <li class="flex justify-between gap-x-6 py-6">
            <div class="font-medium text-gray-900">Royal Bank of Canada</div>
            <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500">Update</button>
          </li>
        </ul>

        <div class="flex border-t border-gray-100 pt-6">
          <button type="button" class="text-sm font-semibold leading-6 text-indigo-600 hover:text-indigo-500"><span aria-hidden="true">+</span> Add another bank</button>
        </div>
      </div>

      <div id="pk">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Produkty - kategorie</h2>
        <p class="mt-1 text-sm leading-6 text-gray-500">Edytuj drzwko kategori dla produktów.</p>

        <dl class="mt-6 divide-y divide-gray-100 border-t border-gray-150 text-sm leading-6">
            <?php
                include '../../../scripts/conn_db.php';
                $sql = "SELECT id, category FROM product_categories where (parent_id is null or parent_id = 0) and (sec_parent_id is null or sec_parent_id = 0) order by id asc";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        echo '<div onclick="openPopupCategories('.$row['id'].')" class="py-2 pl-4 flex justify-between items-center hover:bg-gray-200 duration-150 cursor-pointer rounded-2xl active:scale-[98%]">
                        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">'.$row["category"].'</dt>
                        <dd class="mt-1 flex justify-end gap-x-6 sm:mt-0 sm:flex-auto">
                          <div onclick="window.event.cancelBubble = true; openPopupCategoriesAdd('.$row['id'].')"  class="mr-4 hover:text-white hover:bg-violet-500 hover:shadow-xl shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 cursor-pointer">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                              </svg>
                          </div>
                        </dd>
                      </div>';
                      $sql2 = "SELECT id, category FROM product_categories where parent_id=".$row['id']." order by id asc";
                      $result2 = $conn->query($sql2);
                      if ($result2->num_rows > 0) {
                          while($row2 = $result2->fetch_assoc()) {
                              echo '<div onclick="openPopupCategories('.$row2['id'].')" class="py-2 pl-4 ml-8 flex justify-between items-center hover:bg-gray-200 duration-150 cursor-pointer rounded-2xl active:scale-[98%]">
                              <dt class="font-medium text-gray-600 sm:w-64 sm:flex-none sm:pr-6">'.$row2["category"].'</dt>
                              <dd class="mt-1 flex justify-end gap-x-6 sm:mt-0 sm:flex-auto">
                                <div onclick="event.stopPropagation(); openPopupCategoriesAdd('.$row2['id'].')"  class="mr-4 hover:text-white hover:bg-violet-500 hover:shadow-xl shadow-violeet-300 hover:scale-105 active:scale-90 duration-150 group flex gap-x-3 rounded-xl p-3 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </div>
                              </dd>
                            </div>';
                          }
                      }
                    }
                } else {
                    echo "Brak wyników";
                }
            ?>
          <div class="flex border-t border-gray-100 pt-6">
          <button type="button" onclick="openPopupCategoriesAdd('0')" class="text-sm px-4 font-semibold leading-6 text-violet-500 hover:text-violet-300 duration-150"><span aria-hidden="true">+</span> Dodaj nową kategorię główną</button>
        </div>
        </dl>
      </div>

    </div>
  </main>
</div>
</section>
<?php 
$name_in_scripts = 'UserRoles';
$delete_path = 'scripts/settings/users/roles/delete.php';
$path = 'components/panel/settings/user_roles/edit.php';
include "../../popup.php";

$name_in_scripts = 'UserRolesAdd';
$delete_path = '';
$path = 'components/panel/settings/user_roles/add.php';
include "../../popup.php";


$name_in_scripts = 'Categories';
$delete_path = 'scripts/settings/products/categories/delete.php';
$path = 'components/panel/settings/product_categories/edit.php';
include "../../popup.php";

$name_in_scripts = 'CategoriesAdd';
$delete_path = '';
$path = 'components/panel/settings/product_categories/add.php';
include "../../popup.php";

?>