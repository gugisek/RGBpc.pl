<script>
  function popupOpenClose() {
    var popup = document.getElementById("popup")
    var popupBg = document.getElementById("popupBg")
    popupBg.classList.toggle("opacity-0")
    popupBg.classList.toggle("h-0")
    popup.classList.toggle("scale-0")
  }
</script>
   <!-- popup -->
  <section id="popupBg" class="fixed h-0 opacity-0 top-0 left-0 w-full h-full bg-[#00000020] transition-opacity duration-500"></section>
  <section id="popup" onclick="popupOpenClose()" class="fixed scale-0 top-0 left-0 w-full h-full transition-all duration-300">
    <div class="flex items-center justify-center w-full h-full px-2">
      <div onclick="event.cancelBubble=true;" class="bg-white md:min-w-[800px] md:w-auto w-full max-w-[800px] max-h-[80vh] overflow-y-auto flex md:flex-row flex-col gap-4 rounded-2xl py-6 px-6 shadow-xl">
        <div id="popupItself" class="flex h-auto w-full justify-between flex-col">
          <div class="w-full flex justify-between items-center sm:hidden">
            <span>  </span>
              <a onclick="popupOpenClose()" class="-mt-2 pb-3 flex items-center space-x-2 text-gray-500 hover:text-red-600 transition-all duration-500">
                  <p class="uppercase font-medium text-xs">zamknij</p>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>

              </a>
          </div>                        
                    <!-- This example requires Tailwind CSS v2.0+ -->
          <div>
            <div>
              <img class="h-32 w-full object-cover lg:h-48" src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="">
            </div>
            <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 pb-4">
              <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                <div class="flex">
                  <img id="popup_img" class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32 object-cover" src="" alt="">
                </div>
                <div class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                  <div class="mt-6 min-w-0 flex-1 sm:hidden md:block">
                    <h1 id="popup_name" class="truncate text-2xl font-bold text-gray-900"></h1>
                  </div>
                  <div class="justify-stretch mt-6 flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <span id="popup_status" class="inline-flex items-center rounded-full px-4 py-2 text-xs font-medium text-gray-800 capitalize"></span>
                    <span id="popup_role" class="inline-flex items-center rounded-full bg-gray-100 px-4 py-2 text-xs font-medium text-gray-800 capitalize"></span>
                  </div>
                </div>
              </div>
              <div class="mt-6 hidden min-w-0 flex-1 sm:block md:hidden">
                <h1 id="popup_name_2" class="truncate text-2xl font-bold text-gray-900"></h1>
              </div>
              <!-- detail section -->
              <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                  <h3 class="text-lg font-medium leading-6 text-gray-900">Informacje osobowe</h3>
                  <p class="mt-1 max-w-2xl text-sm text-gray-500">Dane personalne oraz szczegóły.</p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                  <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">Pełne imię</dt>
                      <dd id="popup_full_name_det" class="mt-1 text-sm text-gray-900"></dd>
                    </div>
                    <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">Stanowisko</dt>
                      <dd id="popup_title_det" class="mt-1 text-sm text-gray-900 capitalize"></dd>
                    </div>
                    <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">Adres email</dt>
                      <dd id="popup_email_det" class="mt-1 text-sm text-gray-900"></dd>
                    </div>
                    <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">Departament</dt>
                      <dd id="popup_department_det" class="mt-1 text-sm text-gray-900 capitalize"></dd>
                    </div>
                    <div class="sm:col-span-2">
                      <dt class="text-sm font-medium text-gray-500">O mnie</dt>
                      <dd id="popup_about_det" class="mt-1 text-sm text-gray-900"></dd>
                    </div>
                  </dl>
                </div>
              </div>
              <!-- edit section -->
              <div class="<?php if ($_SESSION['privilage_users']==1) {echo "hidden";}?>">
                <div class="hidden sm:block" aria-hidden="true">
                  <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                  </div>
                </div>
                <!-- personal info -->
                <div  class="mt-10 sm:mt-0">
                  <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                      <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Informacje osobowe</h3>
                        <p class="mt-1 text-sm text-gray-600">Zmień tutaj dane personalne oraz publiczne użytkownika.</p>
                      </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                      <form action="user_scripts/users_back_personal.php" method="POST">
                        <input type="hidden" name="popup_personal_id" id="popup_personal_id" value="">
                        <div class="overflow-hidden shadow sm:rounded-md">
                          <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600 transition-all duration-300">
                                        <label for="popup_name_input" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Imię</label>
                                        <input required type="text" name="popup_name_input" id="popup_name_inpt" class="px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm transition-all duration-300" placeholder="">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600 transition-all duration-300">
                                        <label for="popup_surname" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Nazwisko</label>
                                        <input required type="text" name="popup_surname" id="popup_surname" class="px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600 transition-all duration-300">
                                        <label for="popup_email" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Email</label>
                                        <input required type="text" name="popup_email" id="popup_email" autocomplete="email" class="px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600 transition-all duration-300">
                                        <label for="popup_sec_name" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Drugie imię</label>
                                        <input type="text" name="popup_sec_name" id="popup_sec_name" class="px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                    </div>
                                </div>

                              <div class="col-span-6">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600 transition-all duration-300">
                                        <label for="popup_addres" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Adres zamieszkania</label>
                                        <input type="text" name="popup_addres" id="popup_addres" class="px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600 transition-all duration-300">
                                        <label for="popup_desc" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">O mnie</label>
                                        <textarea type="text" name="popup_desc" id="popup_desc" class="px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder=""></textarea>
                                    </div>
                                </div>
                              
                            </div>
                          </div>
                          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Zapisz</button>
                          </div>
                        
                      </form>
                    </div>
                  </div>
                </div>
                <div class="hidden sm:block" aria-hidden="true">
                  <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                  </div>
                </div>
                <!-- role -->
                <div class="mt-10 sm:mt-0">
                  <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                      <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Rola w firmie</h3>
                        <p class="mt-1 text-sm text-gray-600">Uprawnienia jako rola, wydział oraz stanowisko.</p>
                      </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                      <form action="user_scripts/users_back_role.php" method="POST">
                        <input type="hidden" name="popup_role_id" id="popup_role_id" value="">
                        <div class="overflow-hidden shadow sm:rounded-md">
                          <div class="bg-white px-4 py-5 sm:p-6">
                            
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                        <label for="popup_role" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Uprawnienia</label>
                                        <select type="text" name="popup_role" id="popup_role" class="capitalize px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                            <?php
                                                $sql2 = "SELECT * FROM `user_roles`;";
                                                $result2 = mysqli_query($conn, $sql2);
                                                if(mysqli_num_rows($result2) > 0)
                                                {
                                                    while($row2 = mysqli_fetch_assoc($result2))
                                                    {
                                                        echo "<option id='popup_role_option' class='capitalize' value='".$row2['role']."'>".$row2['role']."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                        <label for="popup_department" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Wydział</label>
                                        <select type="text" name="popup_department" id="popup_department" class="capitalize px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                            <?php
                                                $sql2 = "SELECT * FROM `user_departments`;";
                                                $result2 = mysqli_query($conn, $sql2);
                                                if(mysqli_num_rows($result2) > 0)
                                                {
                                                    while($row2 = mysqli_fetch_assoc($result2))
                                                    {
                                                        echo "<option id='popup_department_option' class='capitalize' value='".$row2['name']."'>".$row2['name']."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                        <label for="popup_name_input" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Tytuł</label>
                                        <select type="text" name="popup_title_input" id="popup_title_inpt" class="capitalize px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                            <?php
                                                $sql2 = "SELECT * FROM `user_titles`;";
                                                $result2 = mysqli_query($conn, $sql2);
                                                if(mysqli_num_rows($result2) > 0)
                                                {
                                                    while($row2 = mysqli_fetch_assoc($result2))
                                                    {
                                                        echo "<option id='popup_title_option' class='capitalize' value='".$row2['name']."'>".$row2['name']."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                              <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Zapisz</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="hidden sm:block" aria-hidden="true">
                  <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                  </div>
                </div>
                <!-- personalisation -->
                <div class="mt-10 sm:mt-0">
                  <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                      <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Personalizacja</h3>
                        <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
                      </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                      <form action="#" method="POST">
                        <div class="overflow-hidden shadow sm:rounded-md">
                          <div class="bg-white px-4 py-5 sm:p-6">
                            <div>
                              <label class="block text-sm font-medium text-gray-700">Photo</label>
                              <div class="mt-1 flex items-center">
                                <span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                                  <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                  </svg>
                                </span>
                                <button type="button" class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Change</button>
                              </div>
                            </div>

                            <div>
                              <label class="block text-sm font-medium text-gray-700">Cover photo</label>
                              <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                <div class="space-y-1 text-center">
                                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  </svg>
                                  <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                      <span>Upload a file</span>
                                      <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                  </div>
                                  <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Zapisz</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="hidden sm:block" aria-hidden="true">
                  <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                  </div>
                </div>
                <!-- account -->
                <div class="mt-10 sm:mt-0">
                  <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                      <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Konto</h3>
                        <p class="mt-1 text-sm text-gray-600">Login i hasło są szyfrowane, można je jedynie zresetować.</p>
                      </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                      <form action="user_scripts/users_back_account.php" method="POST">
                        <input type="hidden" name="popup_account_id" id="popup_account_id" value="">
                        <div class="overflow-hidden shadow sm:rounded-md">
                          <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                        <label for="popup_login" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Login</label>
                                        <input type="text" name="popup_login" id="popup_login" class="px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                        <label for="popup_login_2" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Powtórz login</label>
                                        <input type="text" name="popup_login_2" id="popup_login_2" class="px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                    </div>
                                </div>

                              <div class="col-span-6 sm:col-span-6">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                      <label for="popup_status_inpt" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Status</label>
                                        <select type="text" name="popup_status_inpt" id="popup_status_inpt" class="capitalize px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                            <?php
                                                $sql2 = "SELECT * FROM `user_status`;";
                                                $result2 = mysqli_query($conn, $sql2);
                                                if(mysqli_num_rows($result2) > 0)
                                                {
                                                    while($row2 = mysqli_fetch_assoc($result2))
                                                    {
                                                        echo "<option id='popup_status_option' class='capitalize' value='".$row2['status']."'>".$row2['status']."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                      </div>
                                </div>    
                                <div class="col-span-6 sm:col-span-3">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                        <label for="popup_pswd" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Hasło</label>
                                        <input type="text" name="popup_pswd" id="popup_pswd" class="px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <div class="relative rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                        <label for="popup_pswd_2" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Powtórz hasło</label>
                                        <input type="text" name="popup_pswd_2" id="popup_pswd_2" class="px-3 py-2 rounded-md block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-0 sm:text-sm" placeholder="">
                                    </div>
                                </div>          
                            </div>
                          </div>
                          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Zapisz</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>