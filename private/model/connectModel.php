<?php
// cette ligne utile seulement pour les débugage. Permet de remettre à zero la connexion.
$_SESSION['connect'] = 0;

if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'grand_angle2';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
              identifiant = '".$username."' and Mot_pass = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           $_SESSION['connect'] = 1;
           echo $_SESSION['connect'];
           //header('Location: ../index.php?page=home');
           require('../index.php');

        }
        else
        {
           header('Location: ../view/connectView.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: ../view/connectView.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: ../view/connectView.php');
}
mysqli_close($db); // fermer la connexion
?>