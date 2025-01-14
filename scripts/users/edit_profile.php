<?php

include '../security.php';


$name = $_POST['name'];
$sur_name = $_POST['sur_name'];
$email = $_POST['email'];

$description = $_POST['description'];

$id = $_POST['id'];

$password = $_POST['pswd'];
$reapet_password = $_POST['repeat_pswd'];


if ($name != "" && $sur_name != "" && $email != "" && $id != "") {
    
    include "../conn_db.php";
    $sql_old = "SELECT users.id, users.name, users.sur_name, users.mail, description FROM users where users.id = $id;";
    $result_old = mysqli_query($conn, $sql_old);
    $row_old = mysqli_fetch_assoc($result_old);

    if ($row_old['name'] != $name || $row_old['sur_name'] != $sur_name || $row_old['mail'] != $email || $row_old['description'] != $description) {
        $sql = "UPDATE users SET name='$name', sur_name='$sur_name', mail='$email', description='$description' WHERE id=$id;";
        echo $sql;
        if (mysqli_query($conn, $sql)) {

            //log
            $before = 'Imię: ' . $row_old['name'] . ' ' . $row_old['sur_name'] . ' <br/> Email: ' . $row_old['mail'] . '<br/> Opis: ' . $row_old['description'];
            $after = 'Imię: ' . $name . ' ' . $sur_name . '<br/> Email: ' . $email . '<br/> Opis: ' . $description;
            $object_id = $id;
            $object_type="users";
            $action_type = '1';
            $desc = 'Edytowano profil użytkownika';
            include "../../scripts/log.php";
            //log

            $_SESSION['alert'] = 'Profil został zaktualizowany';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Błąd aktualizacji danych';
            $_SESSION['alert_type'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'Nie wprowadzono nowych danych';
        $_SESSION['alert_type'] = 'warning';

        if($password != "" && $reapet_password != ""){
            if($password == $reapet_password){
                $sha_password = hash('sha256', $password);
                $sql = "UPDATE users SET pswd='$sha_password' WHERE id=$id;";
                echo $sql;
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['alert'] = 'Profil został zaktualizowany';
                    $_SESSION['alert_type'] = 'success';

                    //log
                    $before = '';
                    $after = 'Hasło: ' . $password;
                    $object_id = $id;
                    $object_type="users";
                    $action_type = '1';
                    $desc = 'Edytowano hasło użytkownika (profil)';
                    include "../../scripts/log.php";
                    //log

                } else {
                    $_SESSION['alert'] = 'Błąd aktualizacji danych';
                    $_SESSION['alert_type'] = 'error';
                }
            } else {
                $_SESSION['alert'] = 'Podane hasła różnią się od siebie';
                $_SESSION['alert_type'] = 'error';
            }
        }
    }
    //przyrównanie czy nowe dane faktycznie są nowe

} else {
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
if(($_FILES['photo_img']['name'] != "")){
    $target_dir = "../../img/users_images/";
    $target_file = $target_dir . basename($_FILES["photo_img"]["name"]);

    $img_ext = pathinfo($target_file, PATHINFO_EXTENSION);

    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $checkimg = getimagesize($_FILES["photo_img"]["tmp_name"]);
    if($checkimg !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check file size
    if ($_FILES["photo_img"]["size"] > 5000000) {
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
        
    if (move_uploaded_file($_FILES["photo_img"]["tmp_name"], $target_file)) {
        rename($target_file, $target_dir ."pp-" . $id . "_". time() ."." . $img_ext);
        $file_name = "pp-".$id. "_". time() ."." . $img_ext;
        $image = $file_name;
        $_SESSION['alert'] = 'Profil został zaktualizowany';
        $_SESSION['alert_type'] = 'success';
        $sql = "UPDATE users SET profile_picture = '$image' WHERE id = $id";
        if($id = $_SESSION['login_id']){
            $_SESSION['profile_picture'] = $image;
        }
        $result = $conn->query($sql);
        
        //log
        $before = '';
        $after = $image;
        $object_id = $id;
        $object_type="users";
        $action_type = '1';
        $desc = 'Zmieniono zdjęcie profilowe (profil)';
        include "../../scripts/log.php";
        //log


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
header("Location: ../../panel.php");
?>