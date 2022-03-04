
<?php
// appel de page necessaire pour executer le code 
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\my-config.php");
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\my-config.php");
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\\views\gallery.php");

// @@@
// fonction qui verifie si l'utilisateur est bien connecter
// @@@
function is_logged(array $users){
    session_start();
    if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'];
        if(isset($users[$user_id])){
            return true;
        }
    }
    return false;
}

// @@@
// fonction qui redirige sur la page gallerie si l'utilisateur est bien connecter
// @@@
function render_dashboard(array $users){
    if(is_logged($users)){
        require_once(root. 'views/gallery.php');
    }
    else{
        header("Location: http://php.test/TP-upload-file/part2/views/dashboard.php");
    }
}
render_dashboard($users);

// @@@
// fonction qui va chercher toute les image uploaders dans le dossier pour pouvoir les affichés par la suite
// @@@
function read_img(){
    $removePoint = ['.', '..'];
    $ArrayImg = scandir(root. 'imgUpload/');
    $ArrayImg = array_diff($ArrayImg, $removePoint);
    return $ArrayImg;
}
?>
