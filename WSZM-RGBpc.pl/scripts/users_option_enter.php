<script>
    var input = document.getElementById("role");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("subm").click();
        }
    });

    var input2 = document.getElementById("status");
    input2.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("subm").click();
        }
    });    
</script>
