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

    // Si ouverture sur Modale
    if(isset($_Get['action']) && $_Get['action']=='open'){
        $id = $_GET['id'];
        if($page=='exposList'){
            editExpo($id);
        }
    }

    // Si delete demandé
    if(isset($_GET['delete'])){
        $name = $_GET['delete'];
        $id = $_GET['id'];

        include_once('controller/delController.php');
        $name($id);
    }

    if($_SESSION['connect'] === '1'){

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
        else if(isset($_POST['username']) && isset($_POST['password'])){
        
            $_SESSION['user'] = htmlspecialChars($_POST['username']); 
            $_SESSION['pass'] = htmlspecialChars($_POST['password']);
            connectVerif();
        }

        else if(isset($_GET['erreur'])){
            connectAgain();
        }

        // Si pas connecté vers page de connexion
        else{
            connect();
        }

    /*    }

    catch(Exception $e){
        $error = $e->getMessage();
        require('view/errorView.php');
    }*/


 
