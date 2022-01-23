<?php
    @session_start();

    function home(){
        //require('model/artModel.php');
        include_once('class/ArtModel.php');
        $arts = new ArtModel();
        require('view/homeView.php');
    }

    function art(){
        require('model/artModel.php');
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

    function connect(){

        require('private/view/connectView.php');
    }

    function connectAgain(){

        require('view/connectView.php');
    }

    function logVerif(){
        //require('model/connectModel.php');
        require('class/ConnectModel.php');

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

