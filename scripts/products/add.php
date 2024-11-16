<?php


include '../security.php';

$name = $_POST['name'];
$sku = $_POST['sku'];
$description = $_POST['description'];
$category = $_POST['category_id'];

if ($name != "" && $sku != "" && $description != "" && $category != "") {
        if (isset($_POST['variants'])) {
            $viariants = 'main_variants';
        } else {
            $viariants = 'main_single';
        }

        if(($_FILES['profile']['name'] != "")){
                $target_dir = "../../img/products_images/";
                $target_file = $target_dir . basename($_FILES["profile"]["name"]);

                $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

                echo $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $checkimg = getimagesize($_FILES["profile"]["tmp_name"]);
                if($checkimg !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                }

                // Check file size
                if ($_FILES["profile"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
                $_SESSION['alert'] = 'Plik jest za duży';
                $_SESSION['alert_type'] = 'error';
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                $_SESSION['alert'] = 'Nieprawidłowy format pliku';
                $_SESSION['alert_type'] = 'error';

                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    
                if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
                    rename($target_file, $target_dir ."".$sku."." . $img_ext);
                    $file_name = "".$sku."." . $img_ext;
                    $image = $file_name;
                    $_SESSION['alert'] = 'Pomyślnie zmieniono zdjęcie profilowe';
                    $_SESSION['alert_type'] = 'success';
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }else{
            $image = 'default.png';
        }
        

        include "../conn_db.php";
                $sql = "INSERT INTO products (name, sku, img, description, category_id, type, status_id) VALUES ('$name', '$sku', '$image', '$description', '$category', '$viariants', 5)";
                if (mysqli_query($conn, $sql)) {
                    $id = mysqli_insert_id($conn);
                    //log
                    $before = '';
                    $after = 'Nazwa: '.$name.', SKU: '.$sku.', Opis: '.$description.', Kategoria: '.$category.', Warianty: '.$viariants;
                    $object_id = $id;
                    $object_type="products";
                    $action_type = '2';
                    $desc = 'Dodano produkt';
                    include "../log.php";
                    //log

                    $_SESSION['alert'] = 'Nowy produkt został dodany';
                    $_SESSION['alert_type'] = 'success';
                } else {
                    $_SESSION['alert'] = 'Błąd aktualizacji danych';
                    $_SESSION['alert_type'] = 'error';
                }
} else {
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../panel.php");
?>