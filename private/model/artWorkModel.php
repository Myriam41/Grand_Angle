<?php
    include_once('connect.php');

    function get5Artwork(){

        $sql = 'SELECT oeuvres.Nom, exposer.nombre_vues
                FROM exposer
                INNER JOIN oeuvres
                WHERE exposer.code_events = 1
                ORDER BY exposer.nombre_vues
                LIMIT 5';

        $res = connecMySQL($sql);
        
        return $res;

    }

    function getArtworkExpoAll($idExpo){

        $sql = 'SELECT oeuvres.Nom, exposer.nombre_vues
                FROM exposer
                INNER JOIN oeuvres ON exposer.code_oeuvre = oeuvres.code_oeuvre
                WHERE exposer.code_events = "'. $idExpo .'"';

        $res = connecMySQL($sql);
        
        return $res;

    }


    function getArtworkAll(){

        $sql = 'SELECT * FROM oeuvres';

        $res = connecMySQL($sql);
        
        return $res;

    }

    function getArtworkById(){
        $sql = 'SELECT * FROM oeuvres WHERE id=?';

        connecMySQL($sql);
        
    }

    function displayAllArtwork($res){
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