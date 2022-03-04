<?php 
    if (!isset($_SESSION['id'])){
        header("Location: http://localhost/LAMANU/TD2_C/index.php");
    }
    $title='Dashboard';
    $time = time();
    $date= date('m/d/Y H:i:s ',$time);
    $day = date('w', $time); 
    $array_date = [
        'lundi',
        'mardi',
        'mercredi',
        'jeudi',
        'vendredi',
        'samedi',
        'dimanche'
    ];
    $date= $array_date[$day]." ".$date;

    include_once($_SERVER['DOCUMENT_ROOT']."\LAMANU\TD2_C\\views\components\header.php");
?>

<body>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT']."\LAMANU\TD2_C\\views\components\\nav_bar.php");

    ?>
    <div class="center">
        <p><?= $date ?></p>
        <form method="POST" enctype="multipart/form-data" action="http://localhost/LAMANU/TD2_C/controllers/dashboard_controller.php">
            <input type="file" class="button-7" name="fileToUpload" id="fileToUpload" />
            <button class="button-7" type="submit">Envoyer</button>
        </form>
        <img id="imgPreview">
        <?php
            if(isset($feedback)){
                if($feedback[0] < 0){
                    echo "<p style='color:red'>".$feedback[1]."</p>";
                }else{  
                    echo "<p style='color:green'>Upload réussi</p>";
                }
            }      
        ?>
    </div>
</body>
<script src="../assets/uploadPreview.js"></script>
</html>

