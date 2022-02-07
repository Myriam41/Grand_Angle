<?php
    include_once 'class/DbPostgre.php';
    include_once 'class/Artiste.php';

    class ArtistsModel extends Artiste {

    function getArtistsAll(){

        $sql = 'SELECT code_artiste, nom, prenom, nom_usuel, tel, mail, adresse, cp, ville, pays, photo, biographiefr, biographieen, biographieru, biographiech, biographiede FROM artiste
        ORDER BY code_artiste ASC';

        $lk = new Postgre();
        $res = $lk->connect($sql);
        
        return $res;

    }
    function getArtistById($id){
        $sql = "SELECT code_artiste, 
                        nom, prenom, 
                        nom_usuel, tel, mail, adresse, 
                        cp, ville, pays, photo, 
                        biographiefr, biographieen, biographieru, 
                        biographiech, biographiede 
                FROM artiste 
                WHERE code_artiste = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);

        return $res;
    }
    }
?>