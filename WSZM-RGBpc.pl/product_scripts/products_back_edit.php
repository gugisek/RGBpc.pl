<?php
include "../scripts/conn_db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$sku = $_POST['sku'];
$bought = $_POST['bought'];
$sold = $_POST['sold'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$status = $_POST['status'];
$description = $_POST['description'];
$image = $_POST['image'];
$source = $_POST['source'];
$our_olx = $_POST['our_olx'];
$our_allegro = $_POST['our_allegro'];
include "products_back_upload.php";
$img_ext = pathinfo($target_file, PATHINFO_EXTENSION);
$image_without_ext = pathinfo($image, PATHINFO_FILENAME);

//log
$sql_old = "SELECT * FROM products WHERE id='$id'";
$result_old = mysqli_query($conn, $sql_old);
$row_old = $result_old->fetch_assoc();
//log

if (!empty($name) && !empty($sku) && !empty($bought) && !empty($sold) && !empty($category) && !empty($status) && !empty($source)) {
    $sql = "SELECT name FROM products WHERE name='$name'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    if($_FILES['upload']['error'] == '4'){
        if($image){
            $image = $image;
        } else{
            $image = '';
        }
        if($status == '3' or $status == '4'){
            $sql = "UPDATE `products` SET name = '$name', sku = '$sku', bought = '$bought', sold='$sold', quantity='0', img='$image', source='$source', our_olx='$our_olx', our_allegro='$our_allegro', category_id='$category', description='$description', status_id='$status' WHERE products.id = '$id';";
            if ($conn->query($sql) === TRUE) {
                //log
                $object_id = $id;
                $object_type = 'products';
                $before="Nazwa: $row_old[name], <br>SKU: $row_old[sku], <br>Cena zakupu: $row_old[bought], <br>Cena: $row_old[sold], <br>Ilość: $row_old[quantity], <br>$row_old[img], <br>źródło: $row_old[source], <br>olx: $row_old[our_olx], <br>allegro: $row_old[our_allegro], <br>ID kategorii: $row_old[category_id], <br>Opis: $row_old[description], <br>ID statusu: $row_old[status_id]";
                $after = "Name: $name, <br>SKU: $sku, <br>Cena zakupu: $bought, <br>Cena: $sold, <br>Ilość: $quantity, <br>$image, <br>źródło: $source, <br>olx: $our_olx, <br>allegro: $our_allegro, <br>ID kategorii: $category, <br>Opis: $description, <br>ID statusu: $status";
                $action_type = '1';
                $desc = 'Edycja produktu';
                include "../scripts/log.php";
                //log
                if($_FILES["upload"]["error"] == '4'){
                    header('Location: ../panel.php?page=produkty&action=edited');
                }else if($_FILES["upload"]["size"] > 500000){
                    header('Location: ../panel.php?page=produkty&action=too_large');
                }else if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)){
                    shell_exec("rm -f ".$target_dir . $sku.".*");
                    rename($target_file, $target_dir.$sku.".".$img_ext);
                    header('Location: ../panel.php?page=produkty&action=edited');
                } else {
                    header('Location: ../panel.php?page=produkty&action=img_error');
                }
            } else {
                header('Location: ../panel.php?page=produkty&action=error');
            }
        }else if($status == '1' or $status == '2'){
            if($image){
                $image = $image;
            } else{
                $image = '';
            }
            $sql = "UPDATE `products` SET name = '$name', sku = '$sku', bought = '$bought', sold='$sold', quantity='$quantity', img='$image', source='$source', our_olx='$our_olx', our_allegro='$our_allegro', category_id='$category', description='$description', status_id= case when quantity = 0 then 2 when quantity > 0 then $status end WHERE products.id = '$id';";
            if ($conn->query($sql) === TRUE) {
                //log
                $object_id = $id;
                $object_type = 'products';
                $before="Nazwa: $row_old[name], <br>SKU: $row_old[sku], <br>Cena zakupu: $row_old[bought], <br>Cena: $row_old[sold], <br>Ilość: $row_old[quantity], <br>$row_old[img], <br>źródło: $row_old[source], <br>olx: $row_old[our_olx], <br>allegro: $row_old[our_allegro], <br>ID kategorii: $row_old[category_id], <br>Opis: $row_old[description], <br>ID statusu: $row_old[status_id]";
                $after = "Name: $name, <br>SKU: $sku, <br>Cena zakupu: $bought, <br>Cena: $sold, <br>Ilość: $quantity, <br>$image, <br>źródło: $source, <br>olx: $our_olx, <br>allegro: $our_allegro, <br>ID kategorii: $category, <br>Opis: $description, <br>ID statusu: $status";
                $action_type = '1';
                $desc = 'Edycja produktu';
                include "../scripts/log.php";
                //log
                if($_FILES["upload"]["error"] == '4'){
                    header('Location: ../panel.php?page=produkty&action=edited');
                }else if($_FILES["upload"]["size"] > 500000){
                    header('Location: ../panel.php?page=produkty&action=too_large');
                }else if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)){
                    shell_exec("rm -f ".$target_dir . $sku.".*");
                    rename($target_file, $target_dir.$sku.".".$img_ext);
                    header('Location: ../panel.php?page=produkty&action=edited');
                } else {
                    header('Location: ../panel.php?page=produkty&action=img_error');
                }
            } else {
                header('Location: ../panel.php?page=produkty&action=error');
                print_r($sql);
            }
        }
    }else {
        if($imageFileType !== 'jpg' && $imageFileType !== 'jpeg' && $imageFileType !== 'png'){
            header('Location: ../panel.php?page=produkty&action=wrong_ext');
        } else{
            if($status == '3' or $status == '4'){
                $sql = "UPDATE `products` SET name = '$name', sku = '$sku', bought = '$bought', sold='$sold', quantity='0', img='$sku.$img_ext', source='$source', our_olx='$our_olx', our_allegro='$our_allegro', category_id='$category', description='$description', status_id='$status' WHERE products.id = '$id';";
                if ($conn->query($sql) === TRUE) {
                    //log
                    $object_id = $id;
                    $object_type = 'products';
                    $before="Nazwa: $row_old[name], <br>SKU: $row_old[sku], <br>Cena zakupu: $row_old[bought], <br>Cena: $row_old[sold], <br>Ilość: $row_old[quantity], <br>$row_old[img], <br>źródło: $row_old[source], <br>olx: $row_old[our_olx], <br>allegro: $row_old[our_allegro], <br>ID kategorii: $row_old[category_id], <br>Opis: $row_old[description], <br>ID statusu: $row_old[status_id]";
                    $after = "Name: $name, <br>SKU: $sku, <br>Cena zakupu: $bought, <br>Cena: $sold, <br>Ilość: $quantity, <br>$image, <br>źródło: $source, <br>olx: $our_olx, <br>allegro: $our_allegro, <br>ID kategorii: $category, <br>Opis: $description, <br>ID statusu: $status";
                    $action_type = '1';
                    $desc = 'Edycja produktu';
                    include "../scripts/log.php";
                    //log
                    if($_FILES["upload"]["error"] == '4'){
                        header('Location: ../panel.php?page=produkty&action=edited');
                    }else if($_FILES["upload"]["size"] > 500000){
                        header('Location: ../panel.php?page=produkty&action=too_large');
                    }else if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)){
                        shell_exec("rm -f ".$target_dir . $sku.".*");
                        rename($target_file, $target_dir.$sku.".".$img_ext);
                        header('Location: ../panel.php?page=produkty&action=edited');
                    } else {
                        header('Location: ../panel.php?page=produkty&action=img_error');
                    }
                } else {
                    header('Location: ../panel.php?page=produkty&action=error');
                }
            }else if($status == '1' or $status == '2'){
                $sql = "UPDATE `products` SET name = '$name', sku = '$sku', bought = '$bought', sold='$sold', quantity='$quantity', img='$sku.$img_ext', source='$source', our_olx='$our_olx', our_allegro='$our_allegro', category_id='$category', description='$description', status_id= case when quantity = 0 then 2 when quantity > 0 then $status end WHERE products.id = '$id';";
                if ($conn->query($sql) === TRUE) {
                    //log
                    $object_id = $id;
                    $object_type = 'products';
                    $before="Nazwa: $row_old[name], <br>SKU: $row_old[sku], <br>Cena zakupu: $row_old[bought], <br>Cena: $row_old[sold], <br>Ilość: $row_old[quantity], <br>$row_old[img], <br>źródło: $row_old[source], <br>olx: $row_old[our_olx], <br>allegro: $row_old[our_allegro], <br>ID kategorii: $row_old[category_id], <br>Opis: $row_old[description], <br>ID statusu: $row_old[status_id]";
                    $after = "Name: $name, <br>SKU: $sku, <br>Cena zakupu: $bought, <br>Cena: $sold, <br>Ilość: $quantity, <br>$image, <br>źródło: $source, <br>olx: $our_olx, <br>allegro: $our_allegro, <br>ID kategorii: $category, <br>Opis: $description, <br>ID statusu: $status";
                    $action_type = '1';
                    $desc = 'Edycja produktu';
                    include "../scripts/log.php";
                    //log
                    if($_FILES["upload"]["error"] == '4'){
                        header('Location: ../panel.php?page=produkty&action=edited');
                    }else if($_FILES["upload"]["size"] > 500000){
                        header('Location: ../panel.php?page=produkty&action=too_large');
                    }else if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)){
                        shell_exec("rm -f ".$target_dir . $sku.".*");
                        rename($target_file, $target_dir.$sku.".".$img_ext);
                        header('Location: ../panel.php?page=produkty&action=edited');
                    } else {
                        header('Location: ../panel.php?page=produkty&action=img_error');
                    }
                } else {
                    header('Location: ../panel.php?page=produkty&action=error');
                }
            }
        }
    }
} elseif (empty($name) or empty($sku) or empty($bought) or empty($sold) or empty($category) or empty($status) or empty($source)) {
            header('Location: ../panel.php?page=produkty&action=edit_empty');
}
?>