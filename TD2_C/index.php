<?php 
    $title='Quaunexion';
    include_once($_SERVER['DOCUMENT_ROOT']."\LAMANU\TD2_C\\views\components\header.php");
?>
    <body>
    <div id="container">
        <ul class="crumb1">
            <li><a href="#Connexion">Connexion</a></li>
        </ul>
        <form action="http://php.test/TP-upload-file/part2/controllers/index_controller.php" method="POST">
            <div class="center">
                <ul>
                    <li class="no_type_list">
                        <label>
                            <b>Nom d'utilisateur</b>
                        </label>
                        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                    </li>
                    <li class="no_type_list">
                        <label>
                            <b>Mot de passe</b>
                        </label>
                        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                    </li>
                    <li class="no_type_list">
                        <button class="button-7" type="submit" id='submit' name="login" value='LOGIN'>Login</button>
                    </li>
                </ul>
                    <?php
                        if(isset($feedback_error)){
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>