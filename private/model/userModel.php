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

        while( $row = $res->fetch()){
            $this->setCode(isset($row['code_user'])?$row['code_user']:'');
            $this->setIdentifiant(isset($row['identifiant'])?$row['identifiant']:'');
            $this->setPass(isset($row['mot_pass'])?$row['mot_pass']:'');
            $this->setAdmin(isset($row['admin'])?$row['admin']:'');
        }
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

    function addUser(){
        $user = $this->getIdentifiant();
        $password = $this->getPass();
        $admin = $this->getAdmin();
        // $id = $this->getCode();

        $sql = "INSERT INTO utilisateur /* Ma requête */
        (identifiant, 
        mot_pass, admin)
        VALUES('$user', '$password', '$admin')";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }
    function editUser(){
        $user = $this->getIdentifiant();
        $password = $this->getPass();
        $admin = $this->getAdmin();
        $id = $this->getCode();

        $sql = "UPDATE utilisateur
                SET identifiant = '$user',
                    mot_pass = '$password',
                    admin = '$admin'
                WHERE code_user = '$id'";

        $lk = new Postgre();
        $res = $lk->connect($sql);
    }
}
