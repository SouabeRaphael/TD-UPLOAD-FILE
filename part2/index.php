<?php require_once '../part2/controllers/index-controller.php' ?>
<?php include_once './my-config.php';?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- appel dosier css -->
    <link rel="stylesheet" href="../part2/assets/style.css">
    <!-- appel dossier JavaScript -->
    <script async src="../part2/assets/script.js"></script>
</head>

<?php 



?>

<body>
    <header class="wrapper-header">
        <nav>
            <a href="#" class="title">allPIX</a>
        </nav>
    </header>
    <main class="content-site">
        <div class="wrapper-content">
            <form action="./controllers/index-controller.php" method="POST" class="form">
                
                <div class="login">
                    <label class="label-form" for="login">Login</label>
                    <input type="text" class="item-form" name="login">
                </div>
                
                <div class="password">
                    <label class="label-form" for="password">Password</label>
                    <input type="text" class="item-form" name="password">
                </div>
                <div class="btn-form">
                    <button type="submit" name="id" class="btn">Connexion</button>
                </div>
            </form>
        </div>
    </main>

</body>

</html>