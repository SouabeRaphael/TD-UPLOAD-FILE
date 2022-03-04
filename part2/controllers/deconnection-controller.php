<?php 
// appel page de views deconnection
include_once($_SERVER['DOCUMENT_ROOT']."\TP-upload-file\part2\\views\deconnection.php");

// @@@
// fonction qui va detrure la session et nous rediriger sur la page de connection index.php
// @@@
function kill_session(){
    session_destroy();
    header("Location: http://php.test/TP-upload-file/part2/index.php");
}

// @@@
// appel la fonction kill_section quand le btn deconnection est cliquer
// @@@
if(isset($_POST['kill'])){
    kill_session();
}

?>