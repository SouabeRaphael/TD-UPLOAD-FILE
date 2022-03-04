
<?php
// Appel de my-config.php
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\my-config.php");

// @@@
// fonction qui verifie sur le btn à été appuyer et si les champ son declaré
// @@@
function verify_post(){
    return isset($_POST['id']) && isset($_POST['login']) && isset($_POST['password']);
}

// @@@
// fonction qui verifie sur le btn à été appuyer et si les champ son vide
// @@@
function verify_empty_post(){
    return isset($_POST['id']) && empty($_POST['login']) && empty($_POST['password']);
}

// @@@
// fontion qui crée un url avec en parametre les erreur
// @@@
function redirect_error($result){
    header("Location: http://php.test/TP-upload-file/part2/index.php?error=$result"); 
}

// @@@
// fonction qui envoie l'utilisatieur sur le dashboard si la connection est bonne
// @@@
function redirect_dashboard_controller(){
    header("Location: http://php.test/TP-upload-file/part2/controllers/dashboard-controller.php"); 
}

// @@@
// fontion qui crée une session quand l'utilisateur se connecte
// @@@
function createSession(string $username, int $id, int $quota) {
    session_start();
    $_SESSION['username']= $username;
    $_SESSION['quota'] = $quota;
    $_SESSION['id'] = $id;
}

// @@@
// fonction qui hash le mot de passe
// @@@
function verify_hashed_password(string $password, string $arrayPassword) {
    $passwordHashed = hash('md5', $password);
    return hash_equals($arrayPassword, $passwordHashed);
}

// @@@
// fonction qui verifi si c'est un bonne utilisateur enregister dans le dossier my config avec le password et le username
// @@@
function verify_credentials($users){
    $username = $_POST['login'];
    $password = $_POST['password'];
    foreach($users as $value){
        if($username == $value['username'] && verify_hashed_password($password, $value['password'])){
            $result =  true;
            break;
        }
        else {
            $result = false;
        }
    }
    return $result;
    
}

// @@@
// function qui retour le quota
// @@@
function return_quota($users){
    $username = $_POST['login'];
    foreach($users as $value){
        if($username == $value['username']){
            $result = $value['quota'];
        }
    }
    return $result;
}

// @@@
// fonction qui crée un ID 
// @@@
function returnId($users){
    return rand(1, sizeof($users));
}

// @@@
// grande fonction qui regroupe toute les autres
// Elle verif l'entré des input pour la connection
// si elle est pas bonne, message d'erreur
// sinon il est envoyer sur la page dashboard
// @@@
function getVerify($users){
    $username = '';
    $quota = 0;

    $result = -1;
    if(verify_post()){
        if((verify_credentials($users))){
            $username = $_POST['login'];
            $quota = return_quota($users);
            $id = returnId($users);
            createSession($username, $id, $quota);
            $result =  1;
            redirect_dashboard_controller();
        }
        else{
            $result = -1;
            redirect_error($result);
        }
    }
    if(verify_empty_post()){
        $result = 0;
        redirect_error($result);
    }

    return $result;
}
// Appel de la fonction global
getVerify($users);

// ---------------------------------------------------------------------------------------------------------

// @@@
// autre version disponible
// @@@

// ---------------------------------------------------------------------------------------------------------

// include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\my-config.php");


// function verify_post(){
//     return isset($_POST['id']) && isset($_POST['login']) && isset($_POST['password']);
// }
// function verify_empty_post(){
//     return isset($_POST['id']) && empty($_POST['login']) && empty($_POST['password']);
// }

// function redirect($result){
//     header("Location: http://php.test/TP-upload-file/part2/index.php?error=$result"); 
// }

// function redredirect_dashboard(){
//     header("Location: http://php.test/TP-upload-file/part2/views/dashboard.php"); 
// }

// function getUserNameIndex(string $username, array $users) {
//     $result = -1;
//     for ($i=0; $i < sizeof($users); $i++) { 
//         if($users[$i]['username'] == $username) {
//             $result = $i;
//             break;
//         }
//     }
//     return $result;
// }

// function verifyPassword(string $client_password, string $known_password) {
//     $client_hashed_password = hash('md5', $client_password);
//     return hash_equals($known_password, $client_hashed_password);
// }


// function getUser(int $userId, array $users) {
//     return $users[$userId];
// }


// function createSession(string $username, int $id, int $quota) {
//     session_start();
//     $_SESSION['username']= $username;
//     $_SESSION['quota'] = $quota;
//     $_SESSION['id']= $id;
// }

// function verifyCredentials(array $users){
//     $is_credentials_correct = false;
//     $username = '';
//     $quota = 0;
//     $index_of_user = -1;
//     if (verify_post()) {
//         $username = $_POST['login'];
//         $client_password = $_POST['password'];
//         $index_of_user = getUserNameIndex($username, $users);
//         if ($index_of_user > -1) {
//             if(verifyPassword($client_password, $users[$index_of_user]['password'])) {
//                 $is_credentials_correct = true;
//                 $quota = getUser($index_of_user, $users)['quota'];
//             }
//         }
//         if ($is_credentials_correct) {
//             createSession($username, $index_of_user, $quota);
//             $result =  1;
//             redredirect_dashboard();
//         }
//         else {
//             if(verify_empty_post()){
//                 $result = 0;
//                 redirect($result);
//             }
//             else{
//                 $result = -1;
//                 redirect($result);
//             }
//         }
//     }
// }

// verifyCredentials($users);

?>
