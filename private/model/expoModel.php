<?php
include_once 'class/DbPostgre.php';
include_once 'class/Expo.php';

class ExpoModel extends Expo{

    function getExpoAll(){

        $sql = 'SELECT code_expo, titre_expo, date_debut, date_fin, image  
                FROM exposition';

        $lk = new Postgre();
        $res = $lk->connect($sql);
        
        return $res;

    }

    function getExpoById($id){
        $sql = "SELECT code_expo, titre_expo, date_debut, date_fin, image 
                FROM exposition
                WHERE code_expo = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);

        return $res;
    }

    function setExpoById($id){
        $sql = "UPDATE exposition
                SET titre_expo = '', 
                    date_debut = '',
                    date_fin = '',
                    image= ''
                WHERE code_expo = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);

        return $res;
    }

    function delExpo($id){
        $sql = "DELETE FROM exposition
                WHERE code_expo = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }

    function addExpo($id){
        $sql = "INSERT INTO exposition
                    (nom, prenom, 
                    nom_usuel, tel, mail, adresse, 
                    cp, ville, pays, photo, 
                    biographiefr, biographieen, biographieru, 
                    biographiech, biographiede )
                VALUES ('valeur 1', 'valeur 2', ...)";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }

    function editExpo($id){
        $sql = "UPDATE exposition
                SET nom_colonne_1 = 'nouvelle valeur'
                WHERE code_artiste = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }
}
