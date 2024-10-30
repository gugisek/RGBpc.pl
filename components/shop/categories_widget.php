<div class="py-16 sm:py-24 xl:mx-auto xl:max-w-7xl xl:px-8">
    <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
      <h2 class="text-2xl font-bold tracking-tight text-gray-900">Przeglądaj kategorie</h2>
      <a href="#" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
        Wszystkie kategorie
        <span aria-hidden="true"> &rarr;</span>
      </a>
    </div>

    <div class="mt-4 flow-root">
      <div class="-my-2">
        <div class="relative box-content h-80 overflow-x-auto py-2 xl:overflow-visible">
          <div class="min-w-screen-xl absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-x-8 xl:space-x-0 xl:px-0">
            <?php
            $a = [
              'Procesory',
              'Karty graficzne',
              'Pamięci RAM',
              'Dyski twarde',
              'Zasilacze',
            ];
            for ($i = 0; $i < count($a); $i++) {
              echo '
              <a style="background-image: url(\'img/categories/' . $a[$i] . '.png\');" href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 xl:w-auto active:scale-95 bg-zoom cursor-pointer hover:scale-105 duration-150 hover:shadow-[0px_15px_20px_#3d3d3d] bg-center">
                <span aria-hidden="true" class="absolute inset-0">
                </span>
                <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                <span class="relative mt-auto text-center text-xl font-bold text-white">' . $a[$i] . '</span>
              </a>
              ';
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 px-4 sm:hidden">
      <a href="#" class="block text-sm font-semibold text-indigo-600 hover:text-indigo-500">
        Wszystkie kategorie
        <span aria-hidden="true"> &rarr;</span>
      </a>
    </div>
  </div>