<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json'); // Nagłówek JSON

include '../../security.php';

$id = $_POST['id'];
$name = $_POST['name'];
$platform_id = $_POST['platform_id'];
$desc_short = $_POST['desc_short'];
$price = $_POST['price'];
$machine = $_POST['machine'];

if ($name != "" && $desc_short != "" && $platform_id != "" && $id != "" && $price !="" && $machine !=""){
    
    include "../../conn_db.php";
    $sql_old = "SELECT * FROM shippings WHERE id=$id;";
    $result_old = mysqli_query($conn, $sql_old);
    $row_old = mysqli_fetch_assoc($result_old);

    if(isset($_FILES['photo_img']['name'])){
        $img = 1;
        //echo '1';
    }else{
        $img = 0;
        //echo '0';
    }

    if ($row_old['name'] != $name || $row_old['desc_short'] != $desc_short || $row_old['platform_id'] != $platform_id || $img == 1 || $row_old['price_brutto'] != $price || $row_old['additonal_box_machine_number'] != $machine){
        $sql = "UPDATE shippings SET name='$name', desc_short='$desc_short', platform_id='$platform_id', price_brutto='$price', additonal_box_machine_number='$machine' WHERE id=$id;";
        if ($row_old['name'] != $name || $row_old['desc_short'] != $desc_short || $row_old['platform_id'] != $platform_id || $row_old['price_brutto'] != $price || $row_old['additonal_box_machine_number'] != $machine){
            if (mysqli_query($conn, $sql)) {

                //log
                $before = 'Nazwa: ' . $row_old['name'] . ' <br/>Krótki opis: ' . $row_old['desc_short'] . ' <br/>Platforma: ' . $row_old['platform_id'] . ' <br/>Cena: ' . $row_old['price_brutto'] . ' <br/>Maszyna: ' . $row_old['additonal_box_machine_number'];
                $after = 'Nazwa: ' . $name . ' <br/>Krótki opis: ' . $desc_short . ' <br/>Platforma: ' . $platform_id . ' <br/>Cena: ' . $price . ' <br/>Maszyna: ' . $machine;
                $object_id = $id;
                $object_type="shippings";
                $action_type = '1';
                $desc = 'Edytowano opcję dostawy';
                include "../../log_stripped_without_conn.php";
                //log

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Zaktualizowano dane opcji dostawy'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Błąd aktualizacji danych opcji dostawy'
                ]);
            }
        }
        if($img == 1){
            if(($_FILES['photo_img']['name'] != "")){
                $target_dir = "../../../img/icons/delivery/";
                $target_file = $target_dir . basename($_FILES["photo_img"]["name"]);
            
                $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);
            
                //echo $target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $checkimg = getimagesize($_FILES["photo_img"]["tmp_name"]);
                if($checkimg !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                }
                }
            
                // Check file size
                if ($_FILES["photo_img"]["size"] > 5000000) {
                //echo "Sorry, your file is too large.";
                $uploadOk = 0;
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Plik jest za duży'
                ]);
                }
                
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "svg" ) {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Dozwolone są tylko pliki JPG, JPEG, PNG & GIF'
                ]);
            
                }
            
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Wystąpił błąd podczas przesyłania pliku'
                ]);
                // if everything is ok, try to upload file
                } else {
                    
                if (move_uploaded_file($_FILES["photo_img"]["tmp_name"], $target_file)) {
                    rename($target_file, $target_dir ."delivery-" . $id . "_". time() ."." . $img_ext);
                    $file_name = "delivery-".$id. "_". time() ."." . $img_ext;
                    $image = $file_name;
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Zaktualizowano zdjęcie dostawy'
                    ]);
                    $sql = "UPDATE shippings SET img='$image' WHERE id=$id;";
                    $result = $conn->query($sql);
                    
                    // log
                    $before = '';
                    $after = $image;
                    $object_id = $id;
                    $object_type="Shippings_img";
                    $action_type = '1';
                    $desc = 'Zmieniono zdjęcie obiektu';
                    include "../../log_stripped_without_conn.php";
                    // log
            
            
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Wystąpił błąd podczas przesyłania pliku'
                    ]);
                }
            }
        }
        }
        
    } else {
        echo json_encode([
            'status' => 'warning',
            'message' => 'Wprowadzone dane są takie same jak poprzednie'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'warning',
        'message' => 'Wypełnij wszystkie pola'
    ]);
}
?>