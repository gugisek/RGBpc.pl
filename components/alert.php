<?php
if(isset($_SESSION['alert'])){
  if($_SESSION['alert_type'] == "success"){
    $alert_name = "Sukces!";
  }elseif($_SESSION['alert_type'] == "error"){
    $alert_name = "Błąd!";
  }elseif($_SESSION['alert_type'] == "warning"){
    $alert_name = "Ostrzeżenie!";
  }elseif($_SESSION['alert_type'] == "info"){
    $alert_name = "Informacja!";
  }else{
    $alert_name = "none";
  }
  echo '
  <div id="alert" aria-live="assertive" class="opacity-1 duration-300 pointer-events-none fixed z-[60] inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
      <div data-aos="fade-down" data-aos-anchor-placement="top-bottom" class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
        <div class="p-4">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div id="alert_icon" class="px-1"></div>
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
              <p id="alert_title" class="text-sm font-bold text-gray-900 font-[poppins]">'.$alert_name.'</p>
              <p id="aler_desc" class="text-sm text-gray-800">'.$_SESSION['alert'].'</p>
            </div>
            <div class="ml-4 flex flex-shrink-0">
              <button type="button" onclick="alertClose()" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <span class="sr-only">Close</span>
                  <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                  </svg>
              </button>
            </div>
          </div>
        </div>
        <div id="alert_time" class="transition-all duration-100 w-full border-2"></div>
      </div>
    </div>
  </div>
  ';
  echo '
  <script>
    var alertTitle = document.getElementById("alert_title");
    var alertDesc = document.getElementById("aler_desc");
    var alertBorder = document.getElementById("alert_time");
    var alertIcon = document.getElementById("alert_icon");
  ';
    if($_SESSION['alert_type'] == "success"){
      echo '
      alertBorder.classList.add("border-green-500");
      alertIcon.innerHTML = `<svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
      ';
    }elseif($_SESSION['alert_type'] == "error"){
      echo '
      alertBorder.classList.add("border-red-500");
      alertIcon.innerHTML = `<svg class="h-6 w-6 text-red-400" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" /></svg>`;
      ';
      
    }elseif($_SESSION['alert_type'] == "warning"){
      echo '
      alertBorder.classList.add("border-yellow-500");
      alertIcon.innerHTML = `<svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-yellow-500"><path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" /></svg>`;
      ';
    }
  echo '
    function alertClose() {
      document.querySelector(".pointer-events-none").classList.add("opacity-0","-mt-24");
    }
    function alert_time() {
      var alert_time = document.getElementById("alert_time");
      var width = 100;
      var id = setInterval(frame, 50);
      function frame() {
        if (width <= 0) {
          clearInterval(id);
        } else {
          width--;
          alert_time.style.width = width + "%";
        }
      }
    }
    alert_time();
    setTimeout(function() {
    alertClose();
    }, 5300);
  </script>
  ';
}
unset($_SESSION['alert']);
unset($_SESSION['alert_type']);
?>