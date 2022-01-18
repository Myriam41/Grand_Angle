<?php
    @session_start();
    //include_once('connect.php');


    //require('model/expoModel.php');

    function home(){
        require('model/artModel.php');
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
        require('model/connectModel.php');

        if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
            $log = logConnect();
            //echo $log;
            if(isset($log) && $log > 0) // nom d'utilisateur et mot de passe correctes
            {
                    $_SESSION['connect'] = '1'; 
                    //echo '<br> connect dans log verif =' . $_SESSION['connect'];
                    home();         
            }
            else{
                $_SESSION['connect'] = 'no';
            }
        }
        else
        {
        connect();
        }
    }

