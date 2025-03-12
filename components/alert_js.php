<div id="alertsContainer" class="fixed z-[99] inset-0 min-h-[300vh] flex flex-col items-center space-y-4 px-4 py-6 sm:items-end sm:p-6 pointer-events-none"></div>

<script>
    function closeAlertWithAnimation(alertDiv) {
    // Dodaj klasy animacji wyjścia
    alertDiv.classList.remove('opacity-1', 'translate-y-0', 'scale-100');
    alertDiv.classList.add('opacity-0', '-translate-y-4', 'scale-95');

    // Usuń element po zakończeniu animacji (300ms - czas z `duration-300`)
    setTimeout(() => {
        alertDiv.remove();
    }, 300); // Czas animacji wyjścia
}

   function showAlert(type, message) {
    const alertsContainer = document.getElementById('alertsContainer');

    // Tworzymy element alertu
    const alertDiv = document.createElement('div');
    alertDiv.className = `pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 opacity-0 transform -translate-y-4 scale-95 duration-300 ease-out`;
    
    let alertColor, alertIcon;
    if (type === "success") {
        alertColor = "-green-500";
        type = "sukces";
        alertIcon = `<svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
    } else if (type === "error") {
        alertColor = "-red-500";
        type = "błąd";
        alertIcon = `<svg class="h-6 w-6 text-red-400" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" /></svg>`;
    } else if (type === "warning") {
        alertColor = "-yellow-500";
        type = "ostrzeżenie";
        alertIcon = `<svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-yellow-500"><path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" /></svg>`;
    } else {
        alertColor = "-blue-500";
        alertIcon = `<svg class="h-6 w-6 text-blue-400" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM11.25 7.5h1.5v6h-1.5V7.5zm.75 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"/></svg>`;
    }

    alertDiv.innerHTML = `
        <div class="p-4 border${alertColor}">
            <div class="flex items-center">
                <div class="flex-shrink-0">${alertIcon}</div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-bold text-gray-900">${type.charAt(0).toUpperCase() + type.slice(1)}</p>
                    <p class="text-sm text-gray-800">${message}</p>
                </div>
                <div class="ml-4 flex flex-shrink-0">
                    <button type="button" class="inline-flex rounded-md bg-white text-gray-400 hover:text-white hover:bg-gray-600 duration-150 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2" onclick="closeAlertWithAnimation(this.closest('.pointer-events-auto'))">
                        <span class="sr-only">Close</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="transition-all duration-[5000ms] h-1 border${alertColor} bg-gray-200">
            <div class="h-full w-full bg${alertColor} animate-[shrink-width_5s_linear]"></div>
        </div>
    `;

    // Dodaj alert do kontenera
    alertsContainer.appendChild(alertDiv);

    // Animacja wejścia
    requestAnimationFrame(() => {
        alertDiv.classList.remove('opacity-0', '-translate-y-4', 'scale-95');
        alertDiv.classList.add('opacity-1', 'translate-y-0', 'scale-100');
    });

    // Automatyczne zamknięcie alertu po 5 sekundach
    setTimeout(() => {
        alertDiv.classList.remove('opacity-1', 'translate-y-0', 'scale-100');
        alertDiv.classList.add('opacity-0', '-translate-y-4', 'scale-95');
        setTimeout(() => alertDiv.remove(), 300); // Dodatkowy czas na zakończenie animacji
    }, 5000);
}


</script>