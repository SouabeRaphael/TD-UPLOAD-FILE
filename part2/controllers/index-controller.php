
<?php

use LDAP\Result;

// require_once '../index.php';

function verify_post(){
    return isset($_POST['id']) && isset($_POST['login']) && isset($_POST['password']);
}

function redirect(){
    require_once '../index.php';
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
    $result = -1;
    if(verify_post()){
        if(verify_credentials()){
            $result =  'true';
        }
        else{
            $result = 'error';
        }
    }
    // if ($result < 0) {
    //     redirect();
    // }
    return $result;
}
echo getVerify();




?>

