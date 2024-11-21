<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protokół Jabłkowy - RGBpc.pl</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        .my_shadow {
            border-radius: 20px;
            background: #fff;
            box-shadow:  20px 20px 60px #cecece,
                        -20px -20px 60px #ffffff;
        }
        .input {    
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            padding-left: 1.25rem;
            padding-right: 1.25rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            --tw-bg-opacity: 1;
            background-color: #f3f3f3;
            border-radius: 0.75rem;
        }

        .input:focus {
            outline: 1px solid #4b8ebb;
            /* border: 1px solid #a84bbb; */
        }

    </style>
</head>
<body>
    <?php 
        //sprawdzenie czy coockie z kluczem równa się kluczowi
        if(isset($_COOKIE['key']) && $_COOKIE['key'] == 'Jablko1'){
            //jeśli tak to wyświetl zawartość
            include 'secured_website.php';
        }else{
            //jeśli nie to wyświetl formularz logowania
            include 'login_form.php';
        }
    ?>
</body>
</html>