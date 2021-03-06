<?php
include 'class/Dbconfig.php';
include 'private/class/Dbconfig.php';
include 'DbConfig.php';

class DbMySQL extends DbConfig {

    public function connect(){
        $dbParam = new DbConfig();
        $dbParam->dbMySQL();
        //On essaie de se connecter
        try{
            $conn = new PDO("mysql:host=$dbParam->servername;dbname=$dbParam->basename", $dbParam->username, $dbParam->password);
            //On définit le mode d'erreur de PDO sur Exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'Connexion réussie';
        }
    
        catch(PDOException $e)
        {
        echo "Erreur : " . $e->getMessage();
        }
    
        return $conn;
    }


    public function disconnect(){
        //On ferme la connexion
        unset($dbParam);
    }
}