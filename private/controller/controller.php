<?php
    @session_start();

    //Controlle l'ouverture des pages

    function home(){
        include_once('model/ExpoModel.php');
        $lastExpo = new ExpoModel();
        $lastExpo -> getExpoById(1);

        include_once('model/ArtModel.php');
        $artsView = new ArtModel();
        $arts = $artsView -> getViewsArtsExpo(1);

        $livraison = new ArtModel();
        $noLivre = $livraison->getArtsNoLivre();
        require_once('view/homeView.php');
    }

    function art(){
        require_once('model/ArtModel.php');
        require_once('view/artView.php');
    }

    function artsList(){
        require_once('model/ArtModel.php');
        require_once('model/artistsModel.php');
        require_once('view/artsListView.php');
        
    }

    function expo($id){
        require_once('model/expoModel.php');
        $expoView = new ExpoModel();
        $expoView -> getExpoById($id);
        $code = $expoView->getCode();
        $titre = $expoView->getTitre();
        $debut = $expoView->getDateDebut();
        $fin = $expoView->getDateFin();

        require_once('model/artModel.php');
        $artExpo = new ArtModel();
        $arts = $artExpo -> getViewsArtsExpo($id);
        require_once('view/expoView.php');
    }

    function exposList(){
        require_once('model/expoModel.php');
        require_once('view/exposListView.php');
    }

    function artist(){
        require_once('model/artistsModel.php');
        require_once('view/artistView.php');
    }

    function artistsList(){
        include_once('model/artistsModel.php');
        $artists = new ArtistsModel();
        require_once('view/artistsListView.php');
    }

    function usersList(){
        require_once('model/userModel.php');
        require_once('view/usersListView.php');
    }

    function user(){
        require_once('model/userModel.php');
        require_once('view/userView.php');
    }

    function DeConnect(){
        session_unset(); // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
        connectAgain();
        die();
    }

    function connect(){
        require_once('private/view/connectView.php');
    }

    function connectAgain(){
        require_once('view/connectView.php');
    }

    function connectVerif(){
        require_once('model/connectModel.php');

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

