<!-- Appel du header -->
<?php include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\\views\header.php");?>

    <main class="content-site">
        <div class="wrapper-content">
            <form action="http://php.test/TP-upload-file/part2/controllers/index-controller.php" method="POST" class="form <?php if(($_GET['error'] == -1) || ($_GET['error'] == 0)){echo 'erreur';} ?>">
                
                <div class="login">
                    <label class="label-form" for="login">Login</label>
                    <input type="text" class="item-form" name="login">
                </div>
                
                <div class="password">
                    <label class="label-form" for="password">Password</label>
                    <input type="password" class="item-form" name="password">
                </div>
                <!-- Condition pour afficher le bon message d'erreur -->
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 0){
                            echo "<p style='color:red'>Veuillez remplir les champs</p>";
                        }
                        if($_GET['error'] == -1){
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                        }
                    }
                ?>
                <!-- Fin condition -->

                <div class="btn-form">
                    <button type="submit" name="id" class="btn">Connexion</button>
                </div>
            </form>
        </div>
    </main>

</body>

</html>