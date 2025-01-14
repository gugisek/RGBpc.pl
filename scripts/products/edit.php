<?php
include '../security.php';

$id = $_POST['id_product'];
$status_id = $_POST['status_id'];
$category_id = $_POST['category_id'];
$name = $_POST['name'];
$sell_price_brutto = $_POST['sell_price_brutto'];
$our_allegro = $_POST['our_allegro'];
$our_olx = $_POST['our_olx'];
$source = $_POST['source'];
$description = $_POST['description'];
$full_description = $_POST['full_description'];

//przeształcenie full description tak aby nie miał znaków przeszkadzających kwerendzie SQL
$full_description = str_replace("'", "''", $full_description);



$sku = $_POST['sku'];

$variants = $_POST['variants'];

if($id != "" && $status_id != "" && $category_id != "" && $name != "") {
    if(isset($_POST['variants'])) {
        $type = 'main_variants';
    }else {
        $type = 'main_single';
    }
    include '../conn_db.php';
    $sql_old = "SELECT * FROM products WHERE id = $id";
    $result_old = $conn->query($sql_old);
    $row_old = $result_old->fetch_assoc();
    if($row_old['name'] != $name || $row_old['category_id'] != $category_id || $row_old['sell_price_brutto'] != $sell_price_brutto || $row_old['our_allegro'] != $our_allegro || $row_old['our_olx'] != $our_olx || $row_old['source'] != $source || $row_old['description'] != $description || $row_old['full_description'] != $full_description || $row_old['type'] != $type || $row_old['status_id'] != $status_id) {
        $sql = "UPDATE products SET status_id = $status_id, category_id = $category_id, name = '$name', sell_price_brutto = $sell_price_brutto, our_allegro = '$our_allegro', our_olx = '$our_olx', source = '$source', description = '$description', full_description = '$full_description', type = '$type' WHERE id = $id";        if($conn->query($sql) === TRUE) {
            $_SESSION['alert'] = 'Produkt został zaktualizowany';
            $_SESSION['alert_type'] = 'success';
            //log
            $before = 'Nazwa: '.$row_old['name'].' <br/>SKU: '.$row_old['sku'].'<br/>Opis: '.$row_old['description'].'<br/>Kategoria: '.$row_old['category_id'].'<br/>Typ: '.$row_old['type'].'<br/>Status: '.$row_old['status_id'].'<br/>Cena: '.$row_old['sell_price_brutto'].'<br/>Allegro: '.$row_old['our_allegro'].'<br/>OLX: '.$row_old['our_olx'].'<br/>Źródło: '.$row_old['source'];
            $after = 'Nazwa: '.$name.' <br/>SKU: '.$row_old['sku'].'<br/>Opis: '.$description.'<br/>Kategoria: '.$category_id.'<br/>Typ: '.$type.'<br/>Status: '.$status_id.'<br/>Cena: '.$sell_price_brutto.'<br/>Allegro: '.$our_allegro.'<br/>OLX: '.$our_olx.'<br/>Źródło: '.$source; 
            $object_id = $id;
            $object_type="products";
            $action_type = '1';
            $desc = 'Edytowano produkt';
            include "../log.php";
            //log
        } else {
            $_SESSION['alert'] = 'Błąd podczas aktualizacji produktu';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'Wprowadzono takie same dane jak poprzednie';
        $_SESSION['alert_type'] = 'warning';
    }
} else {
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'warning';
}



if(($_FILES['photo_1']['name'] != "")){
    $target_dir = "../../img/products_images/";
    $target_file = $target_dir . basename($_FILES["photo_1"]["name"]);

    $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $checkimg = getimagesize($_FILES["photo_1"]["tmp_name"]);
    if($checkimg !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check file size
    if ($_FILES["photo_1"]["size"] > 5000000) {
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
        
        if (move_uploaded_file($_FILES["photo_1"]["tmp_name"], $target_file)) {
            rename($target_file, $target_dir ."".$sku."_2_" . time() . "." . $img_ext);
            $file_name = "".$sku."_2_" . time() . "." . $img_ext;
            $image = $file_name;
            $_SESSION['alert'] = 'Pomyślnie zaktualizowano dane';
            $_SESSION['alert_type'] = 'success';
            $sql = "UPDATE products SET img2 = '$image' WHERE id = $id";
            $result = $conn->query($sql);
    
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
}
}


if(($_FILES['photo_2']['name'] != "")){
    $target_dir = "../../img/products_images/";
    $target_file = $target_dir . basename($_FILES["photo_2"]["name"]);

    $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $checkimg = getimagesize($_FILES["photo_2"]["tmp_name"]);
    if($checkimg !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check file size
    if ($_FILES["photo_2"]["size"] > 5000000) {
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
        
    if (move_uploaded_file($_FILES["photo_2"]["tmp_name"], $target_file)) {
        rename($target_file, $target_dir ."".$sku."_" . time() . "." . $img_ext);
        $file_name = "".$sku."_" . time() . "." . $img_ext;
        $image = $file_name;
        $_SESSION['alert'] = 'Pomyślnie zaktualizowano dane';
        $_SESSION['alert_type'] = 'success';
        $sql = "UPDATE products SET img = '$image' WHERE id = $id";
        $result = $conn->query($sql);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}


if(($_FILES['photo_3']['name'] != "")){
    $target_dir = "../../img/products_images/";
    $target_file = $target_dir . basename($_FILES["photo_3"]["name"]);

    $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $checkimg = getimagesize($_FILES["photo_3"]["tmp_name"]);
    if($checkimg !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check file size
    if ($_FILES["photo_3"]["size"] > 5000000) {
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
        
    if (move_uploaded_file($_FILES["photo_3"]["tmp_name"], $target_file)) {
        rename($target_file, $target_dir ."".$sku."_3_" . time() . "." . $img_ext);
        $file_name = "".$sku."_3_" . time() . "." . $img_ext;
        $image = $file_name;
        $_SESSION['alert'] = 'Pomyślnie zaktualizowano dane';
        $_SESSION['alert_type'] = 'success';
        $sql = "UPDATE products SET img3 = '$image' WHERE id = $id";
        $result = $conn->query($sql);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

if(($_FILES['photo_4']['name'] != "")){
    $target_dir = "../../img/products_images/";
    $target_file = $target_dir . basename($_FILES["photo_4"]["name"]);

    $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $checkimg = getimagesize($_FILES["photo_4"]["tmp_name"]);
    if($checkimg !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check file size
    if ($_FILES["photo_4"]["size"] > 5000000) {
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
        
    if (move_uploaded_file($_FILES["photo_4"]["tmp_name"], $target_file)) {
        rename($target_file, $target_dir ."".$sku."_4_" . time() . "." . $img_ext);
        $file_name = "".$sku."_4_" . time() . "." . $img_ext;
        $image = $file_name;
        $_SESSION['alert'] = 'Pomyślnie zaktualizowano dane';
        $_SESSION['alert_type'] = 'success';
        $sql = "UPDATE products SET img4 = '$image' WHERE id = $id";
        $result = $conn->query($sql);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

header("Location: ../../panel.php");

?>