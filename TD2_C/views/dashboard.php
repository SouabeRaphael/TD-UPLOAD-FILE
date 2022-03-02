<?php 
    if (!isset($_SESSION['id'])){
        header("Location: http://localhost/LAMANU/TD2/part_2/index.php");
    }
    $title='Dashboard';
    include_once($_SERVER['DOCUMENT_ROOT']."\LAMANU\TD2_C\\views\components\header.php");
?>

<body>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT']."\LAMANU\TD2_C\\views\components\\nav_bar.php");
    ?>
    <div class="center">
        <form method="POST" enctype="multipart/form-data" action="http://localhost/LAMANU/TD2/part_2/controllers/dashboard_controller.php/submit">
            <input type="file" class="button-7" name="fileToUpload" id="fileToUpload" />
            <button class="button-7" type="submit">Envoyer</button>
        </form>
        <img id="imgPreview">
        <?php
            if(isset($_GET['feedback'])){
                if($_GET['feedback_type'] == 0){
                    echo "<p style='color:green'>Upload réussi</p>";
                }else{  
                    echo "<p style='color:red'>".$_GET['feedback']."</p>";
                }
            }      
        ?>
    </div>
</body>
<script src="../assets/uploadPreview.js"></script>
</html>

