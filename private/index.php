<?php
    require_once ('controller/controller.php');

    @session_start();

    // Création de $_SESSION['Connect']
    if(!isset($_SESSION['connect']) || trim($_SESSION['connect']) == ""){
        //echo 'connect est vide<br>';
        $_SESSION['connect'] = isset($_GET['connect'])?$_GET['connect']:"" ;
    }

    // Définition de la page home par défaut
    $page = isset($_GET['page'])?$_GET['page']:"home" ;

    // Si déconnexion demandée
    if(isset($_GET['deconnect']) && $_GET['deconnect']=='1'){
        DeConnect();
    }

    // Si delete demandé
    if(isset($_GET['delete'])){
        $name = $_GET['delete'];
        $id = $_GET['id'];

        include_once('controller/delController.php');
        $name($id);
    }

    // Si add demandé
    if(isset($_GET['add'])){
        $name = $_GET['add'];

        if($name == 'addExpo'){
            include_once ('model/expoModel.php');

            $expoM = new ExpoModel();
    
            $expoM->setTitre(isset($_POST['titre'])?$_POST['titre']:"");
            $expoM->setDateDebut(isset($_POST['debut'])?$_POST['debut']:"");
            $expoM->setDateFin(isset($_POST['fin'])?$_POST['fin']:"");
            //$image = isset($_POST['image'])?$_POST['image']:"";
            $expoM->$name();
            exposList();
        }

        if($name == 'addUser'){
            include_once ('model/userModel.php');
            
            $userM = new UserModel();

            $userM->setIdentifiant(isset($_POST['user'])?$_POST['user']:"");
            $userM->setPass(isset($_POST['password'])?$_POST['password']:"");
            $userM->setAdmin(isset($_POST['admin'])?$_POST['admin']:'');

            $userM->$name();
            usersList();

        }

        if($name == 'addArt'){
            include_once ('model/artModel.php');

            $artM = new ArtModel();

            $artM->setTitre(isset($_POST['title'])?$_POST['title']:"");
            $artM->setHauteur(isset($_POST['height'])?$_POST['height']:"");
            $artM->setLargeur(isset($_POST['width'])?$_POST['width']:"");
            $artM->setEpaisseur(isset($_POST['epaisseur'])?$_POST['epaisseur']:"");
            $artM->setCodeType(isset($_POST['typeArt'])?$_POST['typeArt']:"");
            $artM->setCodeArtiste(isset($_POST['artist'])?$_POST['artist']:"");
            $artM->setDescriptionFR(isset($_POST['desc'])?$_POST['desc']:"");
            $artM->setDescriptionEN(isset($_POST['desc'])?$_POST['desc']:"");
            $artM->setDescriptionCH(isset($_POST['desc'])?$_POST['desc']:"");
            $artM->setDescriptionRU(isset($_POST['desc'])?$_POST['desc']:"");
            $artM->setDescriptionDE(isset($_POST['desc'])?$_POST['desc']:"");

            $artM->$name();
            artsList();

        }

        if($name == 'addArtist'){
            include_once ('model/artistsModel.php');



        }
    }

    // Si edit demandé
    if(isset($_GET['edit'])){
        $name = $_GET['edit'];
        $id = $_GET['id'];

        if($name == 'editExpo'){
            include_once ('model/expoModel.php');

            $expoM = new ExpoModel();
            $expoM->setCode(isset($_POST['code1'])?$_POST['code1']:"");
            $expoM->setTitre(isset($_POST['title1'])?$_POST['title1']:"");
            $expoM->setDateDebut(isset($_POST['debut1'])?$_POST['debut1']:"");
            $expoM->setDateFin(isset($_POST['fin1'])?$_POST['fin1']:"");
            //$image = isset($_POST['image'])?$_POST['image']:"";
            $expoM->$name($id);
            exposList();
        }

        if($name == 'editUser'){
            include_once ('model/userModel.php');
            
            $userM = new UserModel();
            $userM->setCode(isset($_POST['code1'])?$_POST['code1']:"");
            $userM->setIdentifiant(isset($_POST['user1'])?$_POST['user1']:"");
            $userM->setPass(isset($_POST['password1'])?$_POST['password1']:"");
            $userM->setAdmin(isset($_POST['admin1'])?$_POST['admin1']:"");

            $user->$name($id);
            usersList();
        }

        if($name == 'editArt'){
            include_once ('model/artModel.php');


        }

        if($name == 'editArtist'){
            include_once ('model/artistsModel.php');

            $artistM = new ArtistsModel();


        }
    }

    if(isset($_GET['open'])){
        require_once ('controller/getController.php');
        $name = $_GET['open'];
        $id = $_GET['id'];

        $ret = $name($id);
        echo($ret);
    }

    if($_SESSION['connect'] === '1' && !isset($_GET['open'])){

        if($page == 'home'){
            home();
        }
        
        if($page == 'artsList'){
            artsList();
        }

        if($page == 'artistsList'){
            artistsList();
        }

        if($page == 'exposList'){
            exposList();
        }

        if($page == 'usersList'){
            usersList();
        }

        if($page == 'art'){
            $id = $_GET['id'];
            art($id);
        }

        if($page == 'artist'){
            $id = $_GET['id'];
            artist($id);
        }
        
        if($page == 'expo'){
            $id = $_GET['id'];
            expo($id);
        }

        if($page == 'user'){
            $id = $_GET['id'];
            user($id);
        }
    }

        // Si essaie de connexion.
        else if(isset($_POST['username'])){
        
            $_SESSION['user'] = htmlspecialChars($_POST['username']); 
            $_SESSION['pass'] = htmlspecialChars($_POST['password']);
            connectVerif();
        }

        else if(isset($_GET['erreur'])){
            connectAgain();
        }

        // Si pas connecté vers page de connexion
        else if(!$_SESSION['connect']){
            connect();
        }

    /*    }

    catch(Exception $e){
        $error = $e->getMessage();
        require('view/errorView.php');
    }*/


 
