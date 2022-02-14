<?php
    include_once 'class/DbPostgre.php';
    include_once 'class/Artiste.php';

    class ArtistsModel extends Artiste {

        function getArtistsAll(){

            $sql = 'SELECT code_artiste, nom, prenom, nom_usuel, tel, mail, adresse, cp, ville, pays, photo, biographiefr, biographieen, biographieru, biographiech, biographiede FROM artiste
            ORDER BY code_artiste ASC';

            $lk = new Postgre();
            $res = $lk->connect($sql);
            
            return $res;

        }
        function getArtistById($id){
            $sql = "SELECT code_artiste, 
                            nom, prenom, 
                            nom_usuel, tel, mail, adresse, 
                            cp, ville, pays, photo, 
                            biographiefr, biographieen, biographieru, 
                            biographiech, biographiede 
                    FROM artiste 
                    WHERE code_artiste = $id";

            $lk = new Postgre();
            $res = $lk->connect($sql);

            return $res;
        }

        function delArtist($id){
            $sql = "DELETE FROM artiste
                    WHERE code_artiste = $id";
    
            $lk = new Postgre();
            $res = $lk->connect($sql);
        }

        function addArtist($id){
            $sql = "INSERT INTO artiste
                        (nom, prenom, 
                        nom_usuel, tel, mail, adresse, 
                        cp, ville, pays, photo, 
                        biographiefr, biographieen, biographieru, 
                        biographiech, biographiede )
                    VALUES ('valeur 1', 'valeur 2', ...)";
    
            $lk = new Postgre();
            $res = $lk->connect($sql);
        }
        function editArtist($id){
            $nom = $this->getNom();
            $prenom = $this->getPrenom();
            $nomUSuel = $this->getNomUsuel();
            $tel = $this->getTel();
            $mail = $this->getMail();
            $adresse = $this->getAdresse();
            $cp = $this->getCP();
            $ville = $this->getVille();
            $biographieFR = $this->getbiographieFR();
            $biographieEN = $this->getbiographieEN();
            $biographieCH = $this->getbiographieCH();
            $biographieRU = $this->getbiographieRU();
            $biographieDE = $this->getbiographieDE();

            $sql = "UPDATE artiste
                    SET nom = '$nom',
                    prenom = '$prenom',
                    nom_usuel = 'nomUsuel',
                    tel = '$tel',
                    mail = '$mail',
                    adresse ='$adresse',
                    cp = $cp,
                    ville = '$ville',
                    pays = '$pays',
                    photo = '$photo',
                    biographiefr = '$biographieFR', 
                    biographieen = '$biographieEN',
                    biographieru = '$biographieRU',
                    biographiech = '$biographieCH',
                    biographiede = '$biographieDE',
                    WHERE code_artiste = $id";
    
            $lk = new Postgre();
            $res = $lk->connect($sql);
        }
    }
