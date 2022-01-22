<?php
    @session_start();

class ConnectModel{


    function logConnect(){
        // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'grand_angle2';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');
        
        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $username = mysqli_real_escape_string($db,htmlspecialchars($_SESSION['user'])); 
        $password = mysqli_real_escape_string($db,htmlspecialchars($_SESSION['pass']));
    
        
        if($username !== "" && $password !== "")
        {
            $requete = "SELECT count(*) FROM utilisateur where 
                  identifiant = '".$username."' and Mot_pass = '".$password."' ";
            $exec_requete = mysqli_query($db,$requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
    
            return $count;
        }
    
    mysqli_close($db); // fermer la connexion
    
    
    
    
    }

}