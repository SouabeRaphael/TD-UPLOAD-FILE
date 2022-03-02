
<?php

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

// function createSession(string $username, int $id, int $quota) {
//     session_start();
//     $_SESSION['username']= $username;
//     $_SESSION['quota'] = $quota;
//     $_SESSION['id']= $id;
// }

// function verify_credentials(){
//     $username = $_POST['login'];
//     $password = $_POST['password'];
//     require_once('../my-config.php');
//     foreach($users as $value){
//         if($username == $value['username'] && $password == $value['password']){
//             $result =  $username == $value['username'] && $password == $value['password'];
//             break;
//         }
//     }
//     return $result;
    
// }

// function getVerify(){
    // $is_credentials_correct = false;
//     $result = -1;
//     if(verify_post()){
//         if(verify_credentials()){
//             $result =  1;
//             redredirect_dashboard();
//         }
//         else{
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
//     return $result;
// }
// getVerify();


include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\my-config.php");


function verify_post(){
    return isset($_POST['id']) && isset($_POST['login']) && isset($_POST['password']);
}
function verify_empty_post(){
    return isset($_POST['id']) && empty($_POST['login']) && empty($_POST['password']);
}

function redirect($result){
    header("Location: http://php.test/TP-upload-file/part2/index.php?error=$result"); 
}

function redredirect_dashboard(){
    header("Location: http://php.test/TP-upload-file/part2/views/dashboard.php"); 
}

function getUserNameIndex(string $username, array $users) {
    $result = -1;
    for ($i=0; $i < sizeof($users); $i++) { 
        if($users[$i]['username'] == $username) {
            $result = $i;
            break;
        }
    }
    return $result;
}

function verifyPassword(string $client_password, string $known_password) {
    $client_hashed_password = hash('md5', $client_password);
    return hash_equals($known_password, $client_hashed_password);
}


function getUser(int $userId, array $users) {
    return $users[$userId];
}


function createSession(string $username, int $id, int $quota) {
    session_start();
    $_SESSION['username']= $username;
    $_SESSION['quota'] = $quota;
    $_SESSION['id']= $id;
}

function verifyCredentials(array $users){
    $is_credentials_correct = false;
    $username = '';
    $quota = 0;
    $index_of_user = -1;
    if (verify_post()) {
        $username = $_POST['login'];
        $client_password = $_POST['password'];
        $index_of_user = getUserNameIndex($username, $users);
        if ($index_of_user > -1) {
            if(verifyPassword($client_password, $users[$index_of_user]['password'])) {
                $is_credentials_correct = true;
                $quota = getUser($index_of_user, $users)['quota'];
            }
        }
        if ($is_credentials_correct) {
            createSession($username, $index_of_user, $quota);
            $result =  1;
            redredirect_dashboard();
        }
        else {
            if(verify_empty_post()){
                $result = 0;
                redirect($result);
            }
            else{
                $result = -1;
                redirect($result);
            }
        }
    }
}

verifyCredentials($users);

?>
