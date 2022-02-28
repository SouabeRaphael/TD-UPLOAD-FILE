
<?php
function verify_post(){
    return isset($_POST['id']) && isset($_POST['login']) && isset($_POST['password']);
}


function verify_credentials(){
    $username = $_POST['login'];
    $password = $_POST['password'];
    require_once('../my-config.php');
    foreach($users as $value){
        $result =  $username == $value['username'] && $password == $value['password'];
    }
    return $result;
}


function getVerify(){
    if(verify_post()){
        if(verify_credentials()){
            echo 'true';
        }
        else{
            echo 'error';
        }
    }
}
getVerify();




?>

