<?php

include_once 'class/DbPostgre.php';

@session_start();

class ConnectModel{

    function logConnect(){
        if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
            $user = $_SESSION['user']; 
            $pass = $_SESSION['pass'];
           
            $sql = "SELECT count(*) AS nombre
                    FROM utilisateur 
                    where identifiant = '".$user."' and mot_pass = '".$pass."' ";
             
            $lk = new Postgre();
            $res = $lk->connect($sql);
    
            while($row = $res->fetch()){
                $count = $row['nombre'];
            }
    
            return $count;
        }

    }

    // Penser à fermer la connexion
}