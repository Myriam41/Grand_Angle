<?php
include_once 'class/DbPostgre.php';
include_once 'class/User.php';

class UserModel extends User{

    function getUserAll(){

        $sql = 'SELECT * FROM utilisateur';

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
}
