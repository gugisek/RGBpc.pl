<?php


include '../../../security.php';

$id = $_POST['id'];
$category = $_POST['name'];
$parent_id = $_POST['parent_id'];



if ($category != "" && $parent_id != "") {
    
        //sprawdzenie czy w bazie danych jest już konto z tym adresem email
        include "../../../conn_db.php";
        $sql = "SELECT * FROM product_categories where category = '$category';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['alert'] = 'Kategoria z taką nazwą już istnieje';
            $_SESSION['alert_type'] = 'error';
        }else{
                $sql = "INSERT INTO product_categories (category, parent_id) VALUES ('$category', $parent_id);";
                if (mysqli_query($conn, $sql)) {
                    $id = mysqli_insert_id($conn);
                    //log
                    $before = '';
                    $after = 'Nazwa: ' . $category . ' <br/>Nadrzędna kategoria: ' . $parent_id;
                    $object_id = $id;
                    $object_type="settings";
                    $action_type = '2';
                    $desc = 'Dodano kategorię produktu';
                    include "../../../log.php";
                    //log

                    $_SESSION['alert'] = 'Dane zostały dodane';
                    $_SESSION['alert_type'] = 'success';
                } else {
                    $_SESSION['alert'] = 'Błąd aktualizacji danych';
                    $_SESSION['alert_type'] = 'error';
                }
        }

} else {
    $_SESSION['alert'] = 'Nie wprowadzono wszystkich danych';
    $_SESSION['alert_type'] = 'error';
}
header("Location: ../../../../panel.php");
?>