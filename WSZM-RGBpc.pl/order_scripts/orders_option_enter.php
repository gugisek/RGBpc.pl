<script>
    var input = document.getElementById("platform");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("subm").click();
        }
    });

    var input2 = document.getElementById("date");
    input2.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("subm").click();
        }
    });    

    var input3 = document.getElementById("status");
    input3.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("subm").click();
        }
    });
</script>
