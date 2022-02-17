<?php
    @session_start();
    //$conn = pg_connect('host=localhost port=5432 user=postgres password=mathieu dbname=Grand_Angle')or die('connection failed');
    $conn = pg_connect('host=localhost port=5432 user=postgres password=PJRV0tel!S:121 dbname=grand_angle3')or die('connection failed');

    //Controlle l'appel des données à pour 1 enregistrement
    if(isset($_POST['open'])){
        $name = $_POST['open'];
        $id = $_POST['id'];
        $data = $name($id);
    }

    echo json_encode($data);

    function getExpo($id){
        global $conn;

        $sql = "SELECT code_expo, titre_expo, date_debut, date_fin, image 
        FROM exposition
        WHERE code_expo = $id";

        $ret = pg_query($conn, $sql);
        $retour =[];

        while($row = pg_fetch_Assoc($ret)){
            $retour['code'] = isset($row['code_expo'])?$row['code_expo']:'';
            $retour['titre'] = isset($row['titre_expo'])?$row['titre_expo']:'';
            $retour['debut'] = isset($row['date_debut'])?date($row['date_debut']):'';
            $retour['fin'] = isset($row['date_fin'])?date($row['date_fin']):'';
          
        }
        return $retour;
    }

    function getArt($id){
        global $conn;

        $sql = "SELECT o.code_oeuvre, o.titre_oeuvre, o.date_livraison, o.hauteur, 
                o.epaisseur, o.largeur, o.descriptionfr, o.descriptionen, 
                o.descriptionru, o.descriptionch, o.descriptionde, a.nom,
                exposition.titre_expo, exposition.date_debut
                    
                FROM oeuvre o
                LEFT JOIN artiste a ON a.code_artiste = o.code_artiste
                LEFT JOIN exposer ON exposer.code_oeuvre = o.code_oeuvre
                LEFT JOIN exposition ON exposition.code_expo = exposer.code_expo
                WHERE o.code_oeuvre = $id";

        $ret = pg_query($conn, $sql);

        $retour =[];

        while($row = pg_fetch_Assoc($ret)){
            $retour['code'] = isset($row['code_oeuvre'])?$row['code_oeuvre']:'';
            $retour['titre'] = isset($row['titre_oeuvre'])?$row['titre_oeuvre']:'';
            $retour['livraison'] = isset($row['date_livraison'])?$row['date_livraison']:'';
            $retour['nom'] = isset($row['nom'])?$row['nom']:'';
            $retour['titre_expo'] = isset($row['titre_expo'])?$row['titre_expo']:'';
            $retour['debut'] = isset($row['date_debut'])?$row['date_debut']:'';
            $retour['epaisseur'] = isset($row['epaisseur'])?$row['epaisseur']:'';
            $retour['hauteur'] = isset($row['hauteur'])?$row['hauteur']:'';
            $retour['largeur'] = isset($row['largeur'])?$row['largeur']:'';
            $retour['descriptionfr'] = isset($row['descriptionfr'])?$row['descriptionfr']:'';
            $retour['descriptionen'] = isset($row['descriptionen'])?$row['descriptionen']:'';
            $retour['descriptionru'] = isset($row['descriptionru'])?$row['descriptionru']:'';
            $retour['descriptionch'] = isset($row['descriptionch'])?$row['descriptionch']:'';
            $retour['descriptionde'] = isset($row['descriptionde'])?$row['descriptionde']:'';
        }

        return $retour;
    }

    function getArtist($id){
        global $conn;

        $sql = "SELECT code_artiste, 
                        nom, prenom, 
                        nom_usuel, tel, mail, adresse, 
                        cp, ville, pays, photo, 
                        biographiefr, biographieen, biographieru, 
                        biographiech, biographiede 
                FROM artiste 
                WHERE code_artiste = $id";

        $ret = pg_query($conn, $sql);
        $retour =[];

        while($row = pg_fetch_Assoc($ret)){
            $retour['code'] = isset($row['code_artiste'])?$row['code_artiste']:'';
            $retour['nom'] = isset($row['nom'])?$row['nom']:'';
            $retour['prenom'] = isset($row['prenom'])?$row['prenom']:'';
            $retour['nom_usuel'] = isset($row['nom_usuel'])?$row['nom_usuel']:'';
            $retour['tel'] = isset($row['tel'])?$row['tel']:'';
            $retour['mail'] = isset($row['mail'])?$row['mail']:'';
            $retour['adresse'] = isset($row['adresse'])?$row['adresse']:'';
            $retour['cp'] = isset($row['cp'])?$row['cp']:'';
            $retour['ville'] = isset($row['ville'])?$row['ville']:'';
            $retour['pays'] = isset($row['pays'])?$row['pays']:'';
            $retour['photo'] = isset($row['photo'])?$row['photo']:'';
            $retour['biographiefr'] = isset($row['biographiefr'])?$row['biographiefr']:'';
            $retour['biographieen'] = isset($row['biographieen'])?$row['biographieen']:'';
            $retour['biographieru'] = isset($row['biographieru'])?$row['biographieru']:'';
            $retour['biographiech'] = isset($row['biographiech'])?$row['biographiech']:'';
            $retour['biographiede'] = isset($row['biographiede'])?$row['biographiede']:'';
        }
        return $retour;

    }

    function getUser($id){
        global $conn;

        $sql = "SELECT code_user, identifiant, mot_pass, admin
                FROM utilisateur
                WHERE code_user = $id";

        $ret = pg_query($conn, $sql);
        $retour =[];

        while($row = pg_fetch_Assoc($ret)){
            $retour['code_user'] = isset($row['code_user'])?$row['code_user']:'';
            $retour['identifiant'] = isset($row['identifiant'])?$row['identifiant']:'';
            $retour['mot_pass'] = isset($row['mot_pass'])?$row['mot_pass']:'';
            $retour['admin'] = isset($row['admin'])?$row['admin']:'';
          
        }
        return $retour;

    }
    