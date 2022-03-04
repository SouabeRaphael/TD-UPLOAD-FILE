<?php 
// appel du header et de la page gallery-controler
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\\views\header.php");
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\controllers\gallery-controller.php"); 
?>  

<main class="content-galery">
    <div class="wrapper-galery">
        <h3>Bonjour, Admin</h3>
        <div class="content-img">
            <!-- boucle qui va afficher toute les images du dosier -->
            <?php 
            foreach(read_img() as $image){
                echo '<a data-lightbox="example-set" data-title="Image upload dans votre gallerie" href="http://php.test/TP-upload-file/part2/imgUpload/'.$image.'"><img class="imgUpload" src="http://php.test/TP-upload-file/part2/imgUpload/'.$image.'"></a>';
            }
            ?>
            <!-- Fin boucle -->
        </div>
        <a class="return_dashboard" href="../views/dashboard.php">Dashboard</a>
    </div>
</main>