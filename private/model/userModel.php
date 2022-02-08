<?php
include_once 'class/DbPostgre.php';
include_once 'class/User.php';

class UserModel extends User{

    function getUserAll(){

        $sql = 'SELECT code_user, identifiant, mot_pass, admin 
        FROM utilisateur';

        $lk = new Postgre();
        $res = $lk->connect($sql);
        
        return $res;

    }

    function getUserById($id){
        $sql = "SELECT code_user, identifiant, mot_pass, admin
                FROM utilisateur
                WHERE code_user = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);

        return $res;
    }

    function setUserById($id){
        $sql = "UPDATE utilisateur
                SET identifiant = '',
                    mot_pass = '',
                    admin = ''
                WHERE code_user = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);

        return $res;
    }

    function delUser($id){
        $sql = "DELETE FROM utilisateur
                WHERE code_user = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }

    function addUser($id){
        $sql = "INSERT INTO utilisateur
                    (nom, prenom, 
                    nom_usuel, tel, mail, adresse, 
                    cp, ville, pays, photo, 
                    biographiefr, biographieen, biographieru, 
                    biographiech, biographiede )
                VALUES ('valeur 1', 'valeur 2', ...)";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }
    function editUser($id){
        $sql = "UPDATE utilisateur
                SET nom_colonne_1 = 'nouvelle valeur'
                WHERE code_user = $id";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }
}
