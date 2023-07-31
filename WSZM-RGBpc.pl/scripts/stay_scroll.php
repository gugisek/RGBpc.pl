<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrolledNav = document.getElementById("scrolled_nav");
        var scrollposNav = localStorage.getItem('scrollposNav');
        if (scrollposNav) {
            scrolledNav.scrollTop = scrollposNav;
        }
        
        var scrolledDiv = document.getElementById("scrolled_div");
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) {
            scrolledDiv.scrollTop = scrollpos;
        }

    });

    window.onbeforeunload = function(e) {
        var scrolledNav = document.getElementById("scrolled_nav");
        localStorage.setItem('scrollposNav', scrolledNav.scrollTop);
        
        var scrolledDiv = document.getElementById("scrolled_div");
        localStorage.setItem('scrollpos', scrolledDiv.scrollTop);

    };
</script>