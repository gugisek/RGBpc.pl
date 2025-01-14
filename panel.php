<?php 
include 'scripts/security.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<?php
$title = "panel WSZM";
include 'components/head.php'; ?>    
</head>
<body>
    <?php include 'components/alert.php'; ?>
    <?php include 'components/alert_js.php'; ?>
    <?php include 'components/panel/panel_body.php'; ?>
    <script>
        AOS.init();
    </script>
    <script>
        function highlightChanges() {
        const beforeDiv = document.getElementById("before");
        const afterDiv = document.getElementById("after");

        // Pobierz zawartość HTML, aby zachować znaczniki <br/>
        const beforeHTML = beforeDiv.innerHTML;
        const afterHTML = afterDiv.innerHTML;

        // Podziel tekst na fragmenty, zachowując <br/>
        const beforeParts = beforeHTML.split(/(<br\s*\/?>)/gi); // Dzielimy z zachowaniem <br/>
        const afterParts = afterHTML.split(/(<br\s*\/?>)/gi);

        // Funkcja czyszcząca znaczniki HTML z tekstu
        const stripHTML = str => str.replace(/<[^>]*>/g, '').trim();

        // Tworzymy zestaw dla szybkiego porównania
        const beforeTextSet = new Set(beforeParts.map(stripHTML));
        const afterTextSet = new Set(afterParts.map(stripHTML));

        // Szukamy nowych i usuniętych fragmentów
        const addedParts = afterParts.filter(part => !beforeTextSet.has(stripHTML(part)) && !/<br\s*\/?>/.test(part));
        const removedParts = beforeParts.filter(part => !afterTextSet.has(stripHTML(part)) && !/<br\s*\/?>/.test(part));

        // Zastępujemy odpowiednie fragmenty kolorami
        const highlightedBefore = beforeParts.map(part => {
            if (removedParts.includes(part)) {
                return `<span style="color: red;">${stripHTML(part)}</span>${part.includes('<br') ? '<br/>' : ''}`;
            }
            return part;
        }).join('');

        const highlightedAfter = afterParts.map(part => {
            if (addedParts.includes(part)) {
                return `<span style="color: green;">${stripHTML(part)}</span>${part.includes('<br') ? '<br/>' : ''}`;
            }
            return part;
        }).join('');

        // Zaktualizuj zawartość divów
        beforeDiv.innerHTML = highlightedBefore;
        afterDiv.innerHTML = highlightedAfter;
    }
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script> -->
</body>
</html>