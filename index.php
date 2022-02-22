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
<body>
    <main class="content-wrapper">
        <h1>Veuillez choisir une image:</h1>
        <img id="imgPreview" src="./part1/img/capture01.PNG">
        <form action="" method="GET" enctype="multipart/form-data" class="form">
            <input type="file" name="photo" class="btn-file">
            <button class="btn-submit" type="submit">UPLOAD</button>  
        </form>
    </main>
    
</body>
</html>