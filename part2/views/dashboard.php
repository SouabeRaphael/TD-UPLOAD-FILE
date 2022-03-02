<?php include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\\views\header.php");?>  
<?php include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\controllers\dashboard-controller.php");?>  

<?php 
date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
$weeks = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

$day = ucfirst(strftime('%A'));
$today = date('d/m/Y');
$hour = date('H:i:s');

?>

<main class="content-dashboard">
    <div class="wrapper-dashboard">
        <h3>Bonjours, admin</h3>
        <p>Nous somme le <?php echo $day.' '.$today.' '.'et il est '.$hour?></p>
        <div class="info-file">
            <ul>
                <li><b>Quota:</b>7.1 / 50 Mo</li>
                <li><b>Total image:</b>14</li>
            </ul>
        </div>
        <img id="imgPreview">
        <form action="" method="POST" class="form-dashboard" enctype="multipart/form-data">
            <div class="section-upload">
                <input type="file" class="file" name="file">
                <button class="btn-upload" type="submit">upload</button>
            </div>
        </form>
        <p>Vos message ici:</p>
        <ul>
            <li>upload ok</li>
            <li>upload nok</li>
        </ul>

    </div>
</main>

</body>
</html>