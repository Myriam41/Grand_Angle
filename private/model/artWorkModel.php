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

    function getArtworkExpoView($idExpo){

        $sql = "SELECT oeuvre.titre_oeuvre, exposer.nombre_vues
                FROM exposer
                INNER JOIN oeuvre ON exposer.code_oeuvre = oeuvre.code_oeuvre
                WHERE exposer.code_expo = $idExpo
                ORDER BY exposer.nombre_vues DESC";
                

        $views = connecMySQL($sql);
        
        return $views;

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