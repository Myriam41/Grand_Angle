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

            $expoMA = new ExpoModel();
    
            $expoMA->setTitre(isset($_POST['titre'])?$_POST['titre']:"");
            $expoMA->setDateDebut(isset($_POST['debut'])?$_POST['debut']:"");
            $expoMA->setDateFin(isset($_POST['fin'])?$_POST['fin']:"");
            //$image = isset($_POST['image'])?$_POST['image']:"";
            $expoMA->$name();
            exposList();
        }

        if($name == 'addUser'){
            include_once ('model/userModel.php');



        }

        if($name == 'addArt'){
            include_once ('model/artModel.php');



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


        }

        if($name == 'editArt'){
            include_once ('model/artModel.php');


        }

        if($name == 'editArtist'){
            include_once ('model/artistsModel.php');


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


 
