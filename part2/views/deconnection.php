<!-- appel de la page deconnection-controler pour avoir le code de vérification et d'execution -->
<?php include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\controllers\deconnection-controller.php");?>  

<!-- btn de deconnection -->
<form action="http://php.test/TP-upload-file/part2/controllers/deconnection-controller.php" method="POST" class="form-deconnection">
    <button class="btn-deconection" type="submit" name="kill" value="kill">Déconnection</button>
</form>