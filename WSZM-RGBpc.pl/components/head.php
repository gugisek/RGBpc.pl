<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f8f9fa" />
    <?php if(isset($_GET['page'])){$page = $_GET['page'];};?>
    <title><?php if(isset($page)) {echo ucfirst($page);} else {echo 'Zarządzanie magazynem';}?>
     - RGBpc.pl</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="public/css/global.css">
    <link rel="icon" type="image/x-icon" href="public/img/favicon2.png">
</head>