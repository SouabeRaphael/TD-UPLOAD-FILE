
<?php 
// appel des page necessaire pour le fonctionnement du code
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\my-config.php");
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\\views\dashboard.php");
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\controllers\index-controller.php");

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
// fonction qui renvoie à la bonne page si on est connecter
// @@@
function render_dashboard(array $users){
    if(is_logged($users)){
        require_once(root. 'views/dashboard.php');
    }
    else{
        header("Location: http://php.test/TP-upload-file/part2/index.php");
    }
}
render_dashboard($users);

// @@@
// Fonction qui va crée un url pour pouvoir crée par la suite les message d'erreur
// @@@
function redirect_error_upload($messageError){
    header("Location: http://php.test/TP-upload-file/part2/views/dashboard.php?messageErrorUpload=$messageError"); 
}

// @@@
// fonction qui va crée la date du jours et l'heure
// @@@
function get_date(){
    date_default_timezone_set('Europe/Paris');
    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');

    $day = ucfirst(strftime('%A'));
    $today = date('d/m/Y');
    $hour = date('H:i:s');

    return $day.' '.$today.' '.'et il est '.$hour;
}

// @@@
// fonction qui vérifie si la première partie de l'upload fonctionne
// @@@
function is_upload(){
    return isset($_FILES['file']) && $_FILES['file']['error'] == 0;
}

// @@@
// fonction qui retourne le chemin temporaire de l'image
// @@@
function get_file_tmp_name(){
    $result = $_FILES['file']['tmp_name'];
    return $result;
}

// @@@
// fonction qui retourne la taille de l'image
// @@@
function get_file_size(){
    $result= $_FILES['file']['size'];
    return $result;
}

// @@@
// fonction qui retourne le nom de l'image
// @@@
function get_file_name(){
    $result = $_FILES['file']['name'];
    return $result;
}

// @@@
// fonction qui retourne le type de l'image
// @@@
function get_file_type(){
    $result = $_FILES['file']['type'];
    return $result;
}

// @@@
// fonction qui va gérer l'upload
// et qui va retourner des message d'erreur si cela n'est pas bon
// @@@
function upload(){
    
    $tmp = get_file_tmp_name();
    $filename = get_file_name();
    $filesize = get_file_size();
    $filetype = get_file_type();
    
    $filesize = $filesize/1000000;

    $ArrayTypeFile = explode('/', $filetype);
    $type = $ArrayTypeFile[1];
    $type = strtolower($ArrayTypeFile[1]);

    $filename = uniqid().'.'.$type;

    $dest = root.'imgUpload/';

    $messageError = -1;

    if($type == "png" || $type == "jpg" || $type == "jpeg") {
        if($filesize <= 5){
            move_uploaded_file($tmp, $dest . $filename);
            $messageError = 1;
            redirect_error_upload($messageError);
        }
        else{
            $messageError = -1;
            redirect_error_upload($messageError);
        }
        
    }
    else{
        $messageError = 0;
        redirect_error_upload($messageError);
    }
}

// @@@
// verifie que le btn upload est cliquer pour uploader
// @@@
if(isset($_POST['btnUpload'])){
    if(is_upload()){
        upload();
    }
    else{
        $messageError = 2;
        redirect_error_upload($messageError);
    }
}


?>