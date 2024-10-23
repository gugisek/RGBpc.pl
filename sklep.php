<!DOCTYPE html>
<html lang="pl">
<head>
<?php 
$title = "Sklep";
include 'components/head.php'; ?>    
</head>
<body>
    <?php include 'components/nav/navbar.php'; ?>


<div class="bg-white mt-[8vh]">


  <div>
    <div class="border-b border-gray-200">
      <nav aria-label="Breadcrumb" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <ol role="list" class="flex items-center space-x-4 py-4">
          <li>
            <div class="flex items-center">
              <a href="#" class="mr-4 text-sm font-medium text-gray-900">RGBpc.pl</a>
              <svg viewBox="0 0 6 20" aria-hidden="true" class="h-5 w-auto text-gray-300">
                <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
              </svg>
            </div>
          </li>

          <li class="text-sm">
            <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">Wszystko</a>
          </li>
        </ol>
      </nav>
    </div>
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
            <a style="background-image: url('img/produkt.png');" href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 xl:w-auto active:scale-95 bg-zoom cursor-pointer hover:scale-105 duration-150 hover:shadow-[0px_15px_20px_#3d3d3d] bg-center">
              <span aria-hidden="true" class="absolute inset-0">
              </span>
              <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
              <span class="relative mt-auto text-center text-xl font-bold text-white">Akcesoria</span>
            </a>
            <a href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
              <span aria-hidden="true" class="absolute inset-0">
                <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-02.jpg" alt="" class="h-full w-full object-cover object-center">
              </span>
              <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
              <span class="relative mt-auto text-center text-xl font-bold text-white">Productivity</span>
            </a>
            <a href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
              <span aria-hidden="true" class="absolute inset-0">
                <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-04.jpg" alt="" class="h-full w-full object-cover object-center">
              </span>
              <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
              <span class="relative mt-auto text-center text-xl font-bold text-white">Workspace</span>
            </a>
            <a href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
              <span aria-hidden="true" class="absolute inset-0">
                <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-05.jpg" alt="" class="h-full w-full object-cover object-center">
              </span>
              <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
              <span class="relative mt-auto text-center text-xl font-bold text-white">Accessories</span>
            </a>
            <a href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
              <span aria-hidden="true" class="absolute inset-0">
                <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-03.jpg" alt="" class="h-full w-full object-cover object-center">
              </span>
              <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
              <span class="relative mt-auto text-center text-xl font-bold text-white">Sale</span>
            </a>
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
    <main class="mx-auto max-w-2xl px-4 lg:max-w-7xl lg:px-8">
      <div class="border-b border-gray-200 pb-10 pt-24">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900">Wszystkie produkty</h1>
        <p class="mt-4 text-base text-gray-500">Checkout out the latest release of Basic Tees, new and improved with four openings!</p>
      </div>

      <div class="pb-24 pt-12 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
        <aside>
          <h2 class="sr-only">Filters</h2>

          <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
          <button type="button" class="inline-flex items-center lg:hidden">
            <span class="text-sm font-medium text-gray-700">Filters</span>
            <svg class="ml-1 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
            </svg>
          </button>

          <div class="hidden lg:block">
            <form class="space-y-10 divide-y divide-gray-200">
              <div>
                <fieldset>
                  <legend class="block text-sm font-medium text-gray-900">Color</legend>
                  <div class="space-y-3 pt-6">
                    <div class="flex items-center">
                      <input id="color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="color-0" class="ml-3 text-sm text-gray-600">White</label>
                    </div>
                    <div class="flex items-center">
                      <input id="color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="color-1" class="ml-3 text-sm text-gray-600">Beige</label>
                    </div>
                    <div class="flex items-center">
                      <input id="color-2" name="color[]" value="blue" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="color-2" class="ml-3 text-sm text-gray-600">Blue</label>
                    </div>
                    <div class="flex items-center">
                      <input id="color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="color-3" class="ml-3 text-sm text-gray-600">Brown</label>
                    </div>
                    <div class="flex items-center">
                      <input id="color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="color-4" class="ml-3 text-sm text-gray-600">Green</label>
                    </div>
                    <div class="flex items-center">
                      <input id="color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="color-5" class="ml-3 text-sm text-gray-600">Purple</label>
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="pt-10">
                <fieldset>
                  <legend class="block text-sm font-medium text-gray-900">Category</legend>
                  <div class="space-y-3 pt-6">
                    <div class="flex items-center">
                      <input id="category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="category-0" class="ml-3 text-sm text-gray-600">All New Arrivals</label>
                    </div>
                    <div class="flex items-center">
                      <input id="category-1" name="category[]" value="tees" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="category-1" class="ml-3 text-sm text-gray-600">Tees</label>
                    </div>
                    <div class="flex items-center">
                      <input id="category-2" name="category[]" value="crewnecks" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="category-2" class="ml-3 text-sm text-gray-600">Crewnecks</label>
                    </div>
                    <div class="flex items-center">
                      <input id="category-3" name="category[]" value="sweatshirts" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="category-3" class="ml-3 text-sm text-gray-600">Sweatshirts</label>
                    </div>
                    <div class="flex items-center">
                      <input id="category-4" name="category[]" value="pants-shorts" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="category-4" class="ml-3 text-sm text-gray-600">Pants &amp; Shorts</label>
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="pt-10">
                <fieldset>
                  <legend class="block text-sm font-medium text-gray-900">Sizes</legend>
                  <div class="space-y-3 pt-6">
                    <div class="flex items-center">
                      <input id="sizes-0" name="sizes[]" value="xs" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="sizes-0" class="ml-3 text-sm text-gray-600">XS</label>
                    </div>
                    <div class="flex items-center">
                      <input id="sizes-1" name="sizes[]" value="s" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="sizes-1" class="ml-3 text-sm text-gray-600">S</label>
                    </div>
                    <div class="flex items-center">
                      <input id="sizes-2" name="sizes[]" value="m" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="sizes-2" class="ml-3 text-sm text-gray-600">M</label>
                    </div>
                    <div class="flex items-center">
                      <input id="sizes-3" name="sizes[]" value="l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="sizes-3" class="ml-3 text-sm text-gray-600">L</label>
                    </div>
                    <div class="flex items-center">
                      <input id="sizes-4" name="sizes[]" value="xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="sizes-4" class="ml-3 text-sm text-gray-600">XL</label>
                    </div>
                    <div class="flex items-center">
                      <input id="sizes-5" name="sizes[]" value="2xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="sizes-5" class="ml-3 text-sm text-gray-600">2XL</label>
                    </div>
                  </div>
                </fieldset>
              </div>
            </form>
          </div>
        </aside>

        <section aria-labelledby="product-heading" class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
          <h2 id="product-heading" class="sr-only">Products</h2>

          <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
          <div class="group relative">
        <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-white shadow-lg border border-gray-900/5 px-4 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="img/produkt.png" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-contain object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="#">
                <span aria-hidden="true" class="absolute inset-0"></span>
                Basic Tee
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Black</p>
          </div>
          <p class="text-sm font-medium text-gray-900">$35</p>
        </div>
      </div>
      <div class="group relative">
        <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="#">
                <span aria-hidden="true" class="absolute inset-0"></span>
                Basic Tee
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Black</p>
          </div>
          <p class="text-sm font-medium text-gray-900">$35</p>
        </div>
      </div>
      <div class="group relative">
        <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="#">
                <span aria-hidden="true" class="absolute inset-0"></span>
                Basic Tee
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Black</p>
          </div>
          <p class="text-sm font-medium text-gray-900">$35</p>
        </div>
      </div>
      <div class="group relative">
        <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="#">
                <span aria-hidden="true" class="absolute inset-0"></span>
                Basic Tee
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Black</p>
          </div>
          <p class="text-sm font-medium text-gray-900">$35</p>
        </div>
      </div>
            <!-- More products... -->
          </div>
        </section>
      </div>
    </main>
  </div>
</div>
<script>
        AOS.init();
    </script>

<?php include 'components/footer.php'; ?>
</body>
</html>