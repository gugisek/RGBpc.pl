<section data-aos="fade-up" data-aos-delay="100" class="h-full">
    <h1 class="font-medium text-2xl">Strona główna</h1>
    <!-- first 3-segment bar -->
    <section class="h-full">
        <section class="mt-4 flex md:flex-row flex-col-reverse items-center gap-4">
            <section class="bg-white w-full flex flex-row items-center justify-between bg-white shadow-xl rounded-3xl py-6 px-6">
                <div class="z-0 sm:scale-100 scale-110">
                    <h1 class="font-medium lg:text-sm text-xs text-gray-500 font-[poppins]">Zamówienia w realizacji</h1>
                    <p class="flex items-center lg:text-lg text-md gap-1 font-bold text-gray-600 mt-[-5px]">6<span class="font-medium text-green-500 lg:text-sm text-xs">+2 przychodzące</span></p>
                </div>
                <div class="bg-violet-500 text-white p-3 rounded-xl shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </section>
            <section class="bg-white w-full flex flex-row items-center justify-between bg-white shadow-xl rounded-3xl py-6 px-6">
                <div class="sm:scale-100 scale-110">
                    <h1 class="font-medium lg:text-sm text-xs text-gray-500 font-[poppins]">Zakończone zamówienia</h1>
                    <p class="flex items-center gap-1 lg:text-lg text-md font-bold text-gray-600 mt-[-5px]">10<span class="font-medium text-green-500 lg:text-sm text-xs">+3 przychodzące</span></p>
                </div>
                <div class="bg-violet-500 text-white p-3 rounded-xl shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                    </svg>
                </div>
            </section>
            <section class="bg-white w-full flex flex-row items-center justify-between bg-white shadow-xl rounded-3xl py-6 px-6">
                <div class="sm:scale-100 scale-110">
                    <h1 class="font-medium lg:text-sm text-xs text-gray-500 font-[poppins]">Przychody w miesiącu</h1>
                    <p class="flex items-center gap-1 lg:text-lg text-md font-bold text-gray-600 mt-[-5px]">2137 PLN <span class="font-medium text-green-500 lg:text-sm text-xs"></span></p>
                </div>
                <div class="bg-violet-500 text-white p-3 rounded-xl shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                    </svg>
                </div>
            </section>
        </section>
        <!-- second 3-segment bar with orders widget -->
        <section class="w-full flex lg:flex-row flex-col pt-5 gap-4">
            <section class="overflow-x-auto lg:w-1/2 w-full bg-white shadow-xl rounded-3xl py-6 px-6">
                <h1 class="font-medium text-gray-600 mb-4 font-[poppins]">Zamówienia</h1>
                <canvas class="font-[Lexend]" id="myChart" width="400" height="250"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Pażdziernik', 'Listopad', 'Grudzień'],
                            datasets: [
                                {
                                    label: 'Zamówienia wychodzące',
                                    //backgroundColor: 'rgb(255, 255, 255)',
                                    borderColor: '#818cf8',
                                    data: ['1', '2', '3', '4', '5', '6', '3', '8', '9', '1', '11', '12']
                                },
                                {
                                    label: 'Zamówienia przychodzące',
                                    //backgroundColor: 'rgb(255, 255, 255)',
                                    borderColor: '#81f88b',
                                    data: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
                                }
                            ]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 1,
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false
                                    }
                                }]
                            }
                        }
                    });
                </script>          
            </section>
            <div class="lg:w-1/2 w-full flex md:flex-row flex-col gap-4">
                <section class="overflow-x-auto w-full bg-white shadow-xl rounded-3xl py-6 px-6">
                    <h1 class="font-medium text-gray-600 mb-2 font-[poppins]">Oczekujące zamówienia</h1>
                    <div class="w-full max-h-[300px] overflow-y-auto">
                        <table class="w-full">
                            orders table
                        </table>
                    </div>
                </section>  
                <section class="overflow-x-auto w-full bg-white shadow-xl rounded-3xl py-6 px-6">
                    <div class="flex items-center justify-between w-full mb-2">
                        <h1 class="font-medium text-gray-600 font-[poppins]">Przydatne linki</h1>
                        <a style="cursor: pointer; cursor: hand;" onclick="popupOpenClose();popupEdit();" class="text-gray-600 hover:text-green-600 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </a>
                    </div>
                    <div class="w-full max-h-[300px] overflow-y-auto">
                        <table class="w-full">

                        </table>
                    </div>
                </section>
            </div>
            
        </section>
    </section>
</section>
<iframe src="https://homelist.rgbpc.pl/" frameborder="0" class="h-screen"></iframe>
