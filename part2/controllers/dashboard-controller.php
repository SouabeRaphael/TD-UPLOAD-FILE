<?php 
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\my-config.php");
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\\views\dashboard.php");
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\controllers\index-controller.php");


if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
    $tmp = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $filesize= $_FILES['file']['size'];
    $filesize = $filesize/1000000;

    $ArrayTypeFile = explode('/', $filetype);
    $type = $ArrayTypeFile[1];
    $type = strtolower($ArrayTypeFile[1]);

    $filename = uniqid().'.'.$type;

    $dest = root.'img/';

    if($type == "png" || $type == "jpg" || $type == "jpeg") {
        if($filesize <= 5){
            move_uploaded_file($tmp, $dest . $filename);
            echo 'Votre fichier '.$filename.' à bien été uploadé';
        }
        else{
            echo 'votre image est suppérieur à 5 MO, Votre fichier n\'a pas été uploadé';
        }
        
    }
    else{
        echo 'Le type de votre image n\'est pas correct';
    }
}

// echo $_SESSION['username'];

?>