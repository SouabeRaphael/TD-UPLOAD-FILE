<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file</title>
    <link rel="stylesheet" href="./part1/uploadPreview/uploadPreview.css">
    <script async src="./part1/uploadPreview/uploadPreview.js"></script>
</head>
<?php

// @@@
// Version on je change le nom de image en unique quand je les télécharge
// @@@
if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0){
    $tmp = $_FILES['fileToUpload']['tmp_name'];
    $filename = $_FILES['fileToUpload']['name'];
    $filetype = $_FILES['fileToUpload']['type'];
    $filesize= $_FILES['fileToUpload']['size'];
    $filesize = $filesize/1000000;

    $ArrayTypeFile = explode('/', $filetype);
    $type = $ArrayTypeFile[1];
    $type = strtolower($ArrayTypeFile[1]);

    $filename = uniqid().'.'.$type;

    $dest = 'part1/img/';

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

// @@@
// Version on je garde le nom des image quand je les télécharge
// @@@
// if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0){
//     $tmp = $_FILES['fileToUpload']['tmp_name'];
//     $filename = $_FILES['fileToUpload']['name'];
//     $filetype = $_FILES['fileToUpload']['type'];
//     $filesize= $_FILES['fileToUpload']['size'];
//     $filesize = $filesize/1000000;

//     $dest = 'part1/img/';

//     if($filetype == "image/png" || $filetype == "image/jpg" || $filetype == "image/jpeg") {
//         if($filesize <= 5){
//             move_uploaded_file($tmp, $dest . $filename);
//             echo 'Votre fichier '.$filename.' à bien été uploadé';
//         }
//         else{
//             echo 'votre image est suppérieur à 5 MO, Votre fichier n\'a pas été uploadé';
//         }
        
//     }
//     else{
//         echo 'Le type de votre image n\'est pas correct';
//     }
// }

// var_dump($_FILES);

?>
<body>
    <main class="content-wrapper">
        <h1>Veuillez choisir une image:</h1>
        <img id="imgPreview">
        <form action="" method="POST" enctype="multipart/form-data" class="form">
            <input type="file" name="fileToUpload" class="fileToUpload">
            <button class="btn-submit" type="submit">UPLOAD</button>  
        </form>
    </main>
    
</body>
</html>