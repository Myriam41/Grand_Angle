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

    function deConnect(){

        if($_SESSION['connect']== 1){
            session_unset(); // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
            header('Location:index.php'); // On redirige
            die();
        }
        
    }

    function connect(){

        require('private/view/connectView.php');
    }

    function connectAgain(){

        require('view/connectView.php');
    }

    function logVerif(){
        //require('model/connectModel.php');
        require('model/ConnectModel.php');

        $log = new ConnectModel();

        if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
            $count = $log -> logConnect();
            echo $count;

            if(isset($count) && $count > 0) // nom d'utilisateur et mot de passe correctes
            {
                    $_SESSION['connect'] = '1'; 
                    home();         
            }
            else{
                $_SESSION['connect'] = 'no';
            }
        }
        else
        {
        connectAgain();
        }
    }

