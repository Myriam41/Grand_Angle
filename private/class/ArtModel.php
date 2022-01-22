<?php

include_once 'class/DbPostgre.php';

class ArtModel {

    function get5Art(){

        $sql = 'SELECT oeuvres.Nom, exposer.nombre_vues
                FROM exposer
                INNER JOIN oeuvres
                WHERE exposer.code_events = ?
                ORDER BY exposer.nombre_vues
                LIMIT 5';
        
        $param = ['exposer.code_events' => 1];

        $lk = new Postgre();
        $res = $lk->connect($sql, $param);
        
        return $res;

    }

    function getViewsArtsExpo($idExpo){

        $sql = "SELECT oeuvre.titre_oeuvre, exposer.nombre_vues
                FROM exposer
                INNER JOIN oeuvre ON exposer.code_oeuvre = oeuvre.code_oeuvre
                WHERE exposer.code_expo = $idExpo
                ORDER BY exposer.nombre_vues DESC";
                
        //$param = ['exposer.code_expo' => $idExpo];

       $lk = new Postgre();
       $res = $lk->connect($sql);

        echo "<table>";
        echo "<thead>";
                echo "<tr>";
                    echo "<th>Titre</th>";
                    echo "<th>Vues</th>";
                echo "</tr>";
        echo "</thead>";

        // corps du tableau
        while($row = $res->fetch){
            echo "<tr>";
            
            foreach($row as $k=>$v){

                    echo "<td>$v</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

    }


    function getArtsAll(){

        $sql = 'SELECT * FROM oeuvres';

        $res = connecMySQL($sql);
        
        return $res;

    }

    function getArtById($id){
        $sql = "SELECT * FROM oeuvre WHERE code_oeuvre = $id";

        $lk = mysqli_connect("localhost", "root", "","grand_angle2");
        $res = mysqli_query($lk, $sql);
        //connecMySQL($sql);
        $art = mysqli_fetch_array($res, MYSQLI_ASSOC);
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


   