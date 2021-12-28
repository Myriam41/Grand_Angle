<?php
    include_once('connect.php');

    function get5Artwork(){

        $sql = 'SELECT * FROM oeuvres LIMIT 5';

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