<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrolledDiv = document.getElementById("scrolled_div");
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) {
            scrolledDiv.scrollTop = scrollpos;
        }

        var scrolledNav = document.getElementById("scrolled_nav");
        var scrollposNav = localStorage.getItem('scrollposNav');
        if (scrollposNav) {
            scrolledNav.scrollTop = scrollposNav;
        }
    });

    window.onbeforeunload = function(e) {
        var scrolledDiv = document.getElementById("scrolled_div");
        localStorage.setItem('scrollpos', scrolledDiv.scrollTop);

        var scrolledNav = document.getElementById("scrolled_nav");
        localStorage.setItem('scrollposNav', scrolledNav.scrollTop);
    };
</script>