<?php
include_once 'class/Dbconfig.php';
include_once 'Dbconfig.php';

class Postgre extends DbConfig {

    static function connect($sql){
        $dbParam = new DbConfig();
        $dbParam->dbPostgre();
        $conn = new PDO("pgsql:host=$dbParam->serverName;dbname=$dbParam->dbName", $dbParam->userName, $dbParam->pass);
 /*
        //On essaie de se connecter
        try{
            $conn = new PDO("pgsql:host=$dbParam->serverName;dbname=$dbParam->dbName", $dbParam->userName, $dbParam->pass);
            //On définit le mode d'erreur de PDO sur Exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'Connexion réussie';
        }
    
        catch(PDOException $e)
        {
        echo "Erreur : " . $e->getMessage();
        }
*/
        $req = $conn->prepare($sql);
        $req->execute();

        return $req;
    }

    public function disconnect(){
        //On ferme la connexion
        unset($dbParam);
    }
}