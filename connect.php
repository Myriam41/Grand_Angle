<?php
    @session_start();

    if(isset($_SESSION['connect']) && $_SESSION['connect'] == 1){
        include_once('../config.php');
    }else{
        include_once('config.php');
    }

    //On essaie de se connecter
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$basename", $username, $password);
        //On définit le mode d'erreur de PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connexion réussie';
    }

    /*On capture les exceptions si une exception est lancée et on affiche
    *les informations relatives à celle-ci*/
    catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    }

    //On ferme la connexion
    $conn = null;


    function connecMySQL($sql){
        global $lk;
        
        $res = mysqli_query($lk, $sql);
    
        return $res;
    }
/*
    function connecPg($sql){
        global $pg;
        
        $res = pg_query($pg, $sql);
    
        return $res;
    }
*/
