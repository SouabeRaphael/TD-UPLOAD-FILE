<!-- appel des page necessaire pour le fonctionnement du code -->
<?php include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\\views\header.php");?>  
<?php include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\controllers\dashboard-controller.php");?>  


<main class="content-dashboard">
    <div class="wrapper-dashboard">
        <h3 class="title-dashboard">Bonjours, admin</h3>
        <!-- appel de la fonction pour afficher la date -->
        <p class="date">Nous somme le <?php echo get_date()?></p>
        <div class="info-file">
            <ul class="liste-dashboard">
                <li class="item-liste"><b>Quota :</b> 7.1 / 50 Mo</li>
                <li class="item-liste"><b>Total image: </b>14</li>
            </ul>
        </div>
        <img id="imgPreview">
        <form action="http://php.test/TP-upload-file/part2/controllers/dashboard-controller.php" method="POST" class="form-dashboard" enctype="multipart/form-data">
            <div class="section-upload">
                <input type="file" class="file" name="file">
                <button class="btn-upload" type="submit" name="btnUpload">UPLOAD</button>
            </div>
        </form>
        <!-- condition pour afficher les message d'erreur -->
        <?php   
        if(isset($_GET['messageErrorUpload'])){
            if($_GET['messageErrorUpload'] == 1){
                echo "<p style='color:green'>Votre fichier à bien été upload</p>";
            }
            if($_GET['messageErrorUpload'] == -1){
                echo "<p style='color:red'>Votre fichier est trop gros, il n'a pas pu etre upload</p>";
            }
            if($_GET['messageErrorUpload'] == 0){
                echo "<p style='color:red'>Le type du fichier n'est pas conforme</p>";
            }
            if($_GET['messageErrorUpload'] == 2) {
                echo "<p style='color:red'>Vous n'avez pas selectionné de fichier</p>";
            }
        }
        ?>
        <!-- Fin condition -->
        
        <button class="btn_gallery"><a class="text-upload" href="http://php.test/TP-upload-file/part2/controllers/gallery-controller.php">Gallery</a></button>
        
        <!-- appel page deconnection -->
        <?php include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\\views\deconnection.php");?>  
    </div>
</main>

</body>
</html>
