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

if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0){
    $tmp = $_FILES['fileToUpload']['tmp_name'];
    $filename = $_FILES['fileToUpload']['name'];

    $dest = 'part1/img/';

    move_uploaded_file($tmp, $dest . $filename);

}

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