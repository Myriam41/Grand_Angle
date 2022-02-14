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

        while( $row = $res->fetch()){
            $this->setCode(isset($row['code_expo'])?$row['code_expo']:'');
            $this->setTitre(isset($row['titre_expo'])?$row['titre_expo']:'');
            $this->setDateDebut(isset($row['date_debut'])?$row['date_debut']:'');
            $this->setDateFin(isset($row['date_fin'])?$row['date_fin']:'');
        }
    }

    function getExpoViewById($id){
        $this ->getExpoById($id);

        $sql = "SELECT  o.code_oeuvre, o.titre_oeuvre, o.date_livraison, 
                FROM oeuvre o
                INNER JOIN exposer ON o.code_oeuvre = exposer.code_oeuvre
                INNER JOIN exposition ON exposition.code_exposition = exposer.code_oeuvre
                WHERE code_expo = $id
                ORDER BY o.titre_oeuvre";

        $lk = new Postgre();
        $res2 = $lk->connect($sql);

        while($row = $res2->fetch()){
            $code = isset($row['code_oeuvre'])?$row['code_oeuvre']:'';
            $titre = isset($row['titre_oeuvre'])?$row['titre_oeuvre']:'';
     
        }
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

    function addExpo(){
        $titre = $this->getTitre();
        $debut = $this->getDateDebut();
        $fin = $this->getDateFin();
        //$image = isset($_POST['image'])?$_POST['image']:"";
        $sql = "INSERT INTO exposition
                    (titre_expo, date_debut, date_fin) 
                VALUES ('$titre', '$debut', '$fin')";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }

    function editExpo(){
        $titre = $this->getTitre();
        $debut = $this->getDateDebut();
        $fin = $this->getDateFin();
        $id = $this->getCode();

        $sql = "UPDATE exposition
                SET titre_expo = '$titre',
                    date_debut = '$debut',
                    date_fin = '$fin'
                WHERE code_expo = '$id'";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }
}
