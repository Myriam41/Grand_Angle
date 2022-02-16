<?php

include_once ('class/DbPostgre.php');
include_once ('class/Art.php');

class ArtModel extends Art{

    function getArtsNoLivre(){

        $sql = 'SELECT o.code_oeuvre, o.titre_oeuvre, o.date_livraison, a.nom, exposition.titre_expo, exposition.date_debut
                FROM oeuvre o
                LEFT JOIN artiste a ON o.code_artiste = a.code_artiste
                LEFT JOIN exposer e ON o.code_oeuvre = e.code_oeuvre
                LEFT JOIN exposition ON e.code_expo = exposition.code_expo
                ORDER BY date_debut';
        
        $lk = new Postgre();
        $res = $lk->connect($sql);
        
        return $res;

    }
// Fonction utilisée sur le home pour la liste des oeuvres et les vues
// et pour l'ouverture de la vue expo.
    function getViewsArtsExpo($idExpo){

        $sql = "SELECT o.titre_oeuvre, exposer.nombre_vues, o.code_oeuvre, o.titre_oeuvre, o.date_livraison, a.nom
                FROM exposer
                INNER JOIN oeuvre o ON exposer.code_oeuvre = o.code_oeuvre
                LEFT JOIN artiste a ON o.code_artiste = a.code_artiste
                WHERE exposer.code_expo = $idExpo
                ORDER BY exposer.nombre_vues DESC";

       $lk = new Postgre();
       $res = $lk->connect($sql);
    
       return $res;
    }

    function getExpoViewById($id){

        $sql = "SELECT  o.code_oeuvre, o.titre_oeuvre, O.date_livraison
                FROM oeuvre o
                INNER JOIN exposer ON o.code_oeuvre = exposer.code_oeuvre
                INNER JOIN exposition ON exposition.code_expo = exposer.code_expo
                WHERE exposition.code_expo = $id
                ORDER BY titre_oeuvre";

        $lk = new Postgre();
        $res2 = $lk->connect($sql);

        while($row = $res2->fetch()){
            $code = isset($row['code_oeuvre'])?$row['code_oeuvre']:'';
            $titre = isset($row['titre_oeuvre'])?$row['titre_oeuvre']:'';
     
        }
    }

    function getArtsAll(){

        $sql = 'SELECT * FROM oeuvre';

        $lk = new Postgre();
        $res = $lk->connect($sql);
        
        return $res;

    }

    function getArtById($id){
        $sql = "SELECT o.code_oeuvre, o.titre_oeuvre, o.date_livraison, a.nom_usuel, exposition.titre_expo, exposition.date_debut 
                FROM oeuvre o
                LEFT JOIN artiste a ON a.code_artiste = o.code_artiste
                LEFT JOIN exposer ON exposer.code_oeuvre = o.code_oeuvre
                LEFT JOIN exposition ON exposition.code_expo = exposer.code_expo
                WHERE o.code_oeuvre = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);

        return $res;
    }

    function setArtById($id){
        $sql = "UPDATE oeuvre
                SET code_oeuvre = '',
                    titre_oeuvre = '', 
                    date_livraison = '' 
                WHERE code_oeuvre = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);

        return $res;
    }

    function delArt($id){
        $sql = "DELETE FROM oeuvre
                WHERE code_oeuvre = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }

    function addArt($id){
        // $sql = "INSERT INTO oeuvre
        //             (nom, prenom, 
        //             nom_usuel, tel, mail, adresse, 
        //             cp, ville, pays, photo, 
        //             biographiefr, biographieen, biographieru, 
        //             biographiech, biographiede )
        //         VALUES ('valeur 1', 'valeur 2', ...)";

        // $lk = new Postgre();
        // $res = $lk->connect($sql);
    }
    function editArt($id){
        $sql = "UPDATE oeuvre
                SET nom_colonne_1 = 'nouvelle valeur'
                WHERE code_oeuvre = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }

}


   