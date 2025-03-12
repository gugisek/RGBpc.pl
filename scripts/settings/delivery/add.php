<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json'); // Nagłówek JSON

include '../../security.php';

$name = $_POST['name'];
$platform_id = $_POST['platform_id'];
$desc_short = $_POST['desc_short'];
$price = $_POST['price'];
$machine = $_POST['machine'];

if ($name != "" && $desc_short != "" && $platform_id != "" && $price !="" && $machine !=""){
    
    include "../../conn_db.php";
    if(isset($_FILES['photo_img']['name'])){
        $img = 1;
        //echo '1';
        $img_scr = $_FILES['photo_img']['name'];
    }else{
        $img = 0;
        //echo '0';

        $img_scr= 'default.png';
    }

        $sql = "INSERT INTO shippings (name, desc_short, platform_id, img, price_brutto, additonal_box_machine_number) VALUES ('$name', '$desc_short', '$platform_id', '$img_scr', '$price', '$machine');";
        if (mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
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
            //log
            $before = '';
            $after = 'name:'.$name.', desc_short:'.$desc_short.', platform_id:'.$platform_id.', img:'.$img_scr.', price_brutto:'.$price.', additonal_box_machine_number:'.$machine;
            $object_id = $id;
            $object_type="shippings";
            $action_type = '2';
            $desc = 'Dodano opcję dostawy';
            include "../../log_stripped_without_conn.php";
            //log
            echo json_encode([
                'status' => 'success',
                'message' => 'Dodano opcję dostawy'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Błąd dodawania opcji dostawy'
            ]);
        }      
        
} else {
    echo json_encode([
        'status' => 'warning',
        'message' => 'Wypełnij wszystkie pola'
    ]);
}
?>