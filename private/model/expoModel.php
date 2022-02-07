<?php
include_once 'class/DbPostgre.php';
include_once 'class/Expo.php';

class ExpoModel extends Expo{

    function getExpoAll(){

        $sql = 'SELECT * FROM expo';

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
        $sql = "UPDATEexposition
                SET titre_expo = '', 
                    date_debut = '',
                    date_fin = '',
                    image= ''
                WHERE code_expo = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);

        return $res;
    }
}
