<?php
    @session_start();

    function home(){
        //require('model/artModel.php');
        include_once('model/ArtModel.php');
        $arts = new ArtModel();
        require('view/homeView.php');
    }

    function art(){
        require('model/ArtModel.php');
        require('view/artView.php');
    }

    function artsList(){
        require('view/artsListView.php');
        
    }

    function exposList(){

        require('view/exposListView.php');
    }

    function artistsList(){

        require('view/artistsListView.php');
    }

    function usersList(){

        require('view/usersListView.php');
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

