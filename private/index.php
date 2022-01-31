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

   /* try{*/
        
        // Si connexion alors redirection sur une page
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
            /*
            else{
                throw new Exception('Cette page n\'existe pas ou a été supprimée');
            }*/
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


 
