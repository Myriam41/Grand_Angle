<?php

include_once 'class/DbPostgre.php';

class ArtModel {
    private $titre;
    private $flash;

        // Getters
    public function getTitre() {
        return $this->titre;
    }
    public function getflash() {
        return $this->flash;
    }

    // Setters
    public function setTitre($titre) {
        $this-> titre = $titre;
    }
    public function setFlash($flash) {
        $this-> flash = $flash;
    }

    function get5Art(){

        $sql = 'SELECT oeuvre.titre_oeuvre, exposer.nombre_vues
                FROM exposer
                INNER JOIN oeuvre
                WHERE exposer.code_events = 1
                ORDER BY exposer.nombre_vues
                LIMIT 5';
        
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
        $sql = "SELECT * FROM oeuvre WHERE code_oeuvre = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);

        while($art = $res->fetch()){
            $this->setTitre(['titre_oeuvre']);
            $this->setFlash(['flashcode']);
        }

       return $art;
    }

    function displayArtsAll($res){
        if($res){

            echo "<table>";

            // corps du tableau
            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                echo "<tr>";
                
                foreach($row as $k=>$v){

                        echo "<td>$v</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
}


   