<?php
    @session_start();

    //Controlle l'ouverture des pages

    function home(){
        //require('model/artModel.php');
        include_once('model/ArtModel.php');
        $artsView = new ArtModel();
        $arts = $artsView -> getViewsArtsExpo(1);

        $livraison = new ArtModel();
        $noLivre = $livraison->getArtsNoLivre();
        require('view/homeView.php');
    }

    function art(){
        require('model/ArtModel.php');
        require('view/artView.php');
    }

    function artsList(){
        require('model/ArtModel.php');
        require('view/artsListView.php');
        
    }

    function expo(){
        require('model/expoModel.php');
        require('view/expoView.php');
    }

    function exposList(){
        require('model/expoModel.php');
        $exposView = new ExpoModel();
        $expo = $exposView -> getExpoAll();
        require('view/exposListView.php');
    }

    function artist(){
        require('model/artistsModel.php');
        require('view/artistView.php');
    }

    function artistsList(){
        include_once('model/artistsModel.php');
        $artists = new ArtistsModel();
        require('view/artistsListView.php');
    }

    function usersList(){
        require('model/userModel.php');
        require('view/usersListView.php');
    }

    function user(){
        require('model/userModel.php');
        require('view/userView.php');
    }

    function DeConnect(){
        session_unset(); // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
        connectAgain();
        die();
    }

    function connect(){
        require('private/view/connectView.php');
    }

    function connectAgain(){
        require('view/connectView.php');
    }

    function connectVerif(){
        require('model/connectModel.php');

        $log = new ConnectModel();

        // Vérificaion de la validité de user et pass
        if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
            $count = $log -> logConnect();

            // nom d'utilisateur et mot de passe correctes
            if(isset($count) && $count > 0) 
            {   
                $_SESSION['connect'] = '1';
                home();       
            }
            else{
                header('location: ?erreur=1');
                exit();
            }
        }
        else
        {
            header('location: ?erreur=1');
            exit();
        }
    }

