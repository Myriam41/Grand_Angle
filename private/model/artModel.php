<?php

include_once 'class/DbPostgre.php';
include_once 'class/Art.php';

class ArtModel extends Art{

    function getArtsNoLivre(){

        $sql = 'SELECT o.code_oeuvre, o.titre_oeuvre, o.date_livraison, a.nom_usuel, exposition.titre_expo, exposition.date_debut
                FROM oeuvre o
                LEFT JOIN artiste a ON o.code_artiste = a.code_artiste
                LEFT JOIN exposer e ON o.code_oeuvre = e.code_oeuvre
                LEFT JOIN exposition ON e.code_expo = exposition.code_expo
                ORDER BY date_debut';
        
        $lk = new Postgre();
        $res = $lk->connect($sql);
        
        return $res;

    }

    function getViewsArtsExpo($idExpo){

        $sql = "SELECT oeuvre.titre_oeuvre, exposer.nombre_vues
                FROM exposer
                INNER JOIN oeuvre ON exposer.code_oeuvre = oeuvre.code_oeuvre
                WHERE exposer.code_expo = $idExpo
                ORDER BY exposer.nombre_vues DESC";

       $lk = new Postgre();
       $res = $lk->connect($sql);
    
       return $res;
    }


    function getArtsAll(){

        $sql = 'SELECT * FROM oeuvres';

        $lk = new Postgre();
        $res = $lk->connect($sql);
        
        return $res;

    }

    function getArtById($id){
        $sql = "SELECT o.code_oeuvre, o.titre_oeuvre, o.date_livraison, a.nom_usuel, exposition.titre_expo, exposition.date_debut 
                FROM oeuvre o
                INNER JOIN artiste a ON a.code_artiste = o.code_artiste
                INNER JOIN exposer ON exposer.code_oeuvre = o.code_oeuvre
                INNER JOIN exposition ON exposition.code_expo = exposer.code_expo
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


}


   