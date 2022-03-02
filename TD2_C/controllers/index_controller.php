<?php
    include_once('../my-config.php');
    /**
     * Vérifie si les informations de connexions sont bonnes
     * @param array $users tous les utilsateurs de notre "bdd"
     * @return void
     */
    function check_credentials(array $users){
        $is_credentials_correct = false;
        $username='';
        $quota = 0;
        $index_of_user= -1;
        if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $client_password = $_POST['password'];
            $index_of_user = index_of_username($username, $users);
            if ($index_of_user != -1){              
                if(check_password($client_password, $users[$index_of_user]['password'])){
                    $is_credentials_correct = true;
                    $quota= get_user($index_of_user, $users)['quota'];
                }
            }
        }
        if($is_credentials_correct){
            create_session($username, $index_of_user, $quota);
            redirect_to_dashboard();
        }else{
            back_to_login_with_errors();
        }
    }

    function verify_post(){
        return isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']);
    }

    /**
     * Retourne l'index de l'utilisateur de notre "bdd"
     * @param string $username l'utilisateur à vérifier
     * @param array $users tous les utilsateurs de notre "bdd"
     * @return int $index retourn l'index de l'utilisateur ou retourne -1 si rien trouver
     */
    function index_of_username(string $username, array $users){
        $result= -1;
        for ($i = 0 ; $i < sizeof($users) ; $i++){
            if($users[$i]['username'] == $username){
                $result= $i;
                break;
            }
        }
        return $result;
    }

    /**
     * Vérifie si le mot de passe entrée en claire par l'utilisateur correspond à son hash en "bdd"
     * @param string $client_password mot de passe entrée par le client
     * @param string $known_password mot de passe hashé
     * @return boolean $bool true si il y a une correspondance
     */
    function check_password(string $client_password, string $known_password){
        $client_hashed_password = hash('md5',$client_password);
        return hash_equals($known_password, $client_hashed_password);
    }

    /**
     * Redirige l'utilisateur au dashboard 
     * @return void
     */
    function redirect_to_dashboard(){
        header("Location: http://localhost/LAMANU/TD2_C/controllers/dashboard_controller.php");
    }
    
    /**
     * Redirige l'utilisateur à la page de connexion avec un feedback d'erreur
     * @return void
     */
    function back_to_login_with_errors(){
        $feedback_error=true;
        require_once(root.'\index.php');
    }

    /**
     * Créer une variable de session stockant les données de l'utilisateur
     * @return void
     */
    function create_session(string $username, int $id, int $quota){
        session_start();
        $_SESSION['username']= $username;
        $_SESSION['quota'] = $quota;
        $_SESSION['id']= $id;
    }

    /**
     * Renvoie le tableau associatif du user concerné
     * @param int $id du user voulu
     * @param array $users 
     * @return array 
     */
    function get_user(int $id, array $users){
        return $users[$id];
    }


    check_credentials($users);
?>