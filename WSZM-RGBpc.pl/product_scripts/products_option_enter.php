<script>
    var input = document.getElementById("category");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("subm").click();
        }
    });

    var input2 = document.getElementById("quantity");
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
