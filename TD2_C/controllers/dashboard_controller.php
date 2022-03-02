<?php
    require_once($_SERVER['DOCUMENT_ROOT']."\LAMANU\TD2_C\\my-config.php");

    /**
     * Vérifie si l'utilisateur est connecté
     * @param array $users list de tous les utilisateurs
     * @return boolean return true si il est connecté
     */
    function is_logged(array $users){
        session_start();
        if (isset($_SESSION['id'])){
            $user_id = $_SESSION['id'];
            if(isset($users[$user_id])){
                return true;
            }
        }
        return false;
    }
    /**
     * Redirige vers la vue de la dashboard
     * @param array $users list de tous les utilisateurs
     * @return void
     */
    function render_dashboard(array $users){
        if(is_logged($users))
            require_once(root.'views/dashboard.php');
        else 
            header("Location: http://localhost/LAMANU/TD2/part_2/index.php");
        // sinon rajouter une page d'erreur
    }

    render_dashboard($users);

?>