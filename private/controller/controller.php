<?php
    //include_once('connect.php');

<<<<<<< HEAD
    //require('model/artModel.php');
    //require('model/expoModel.php');
=======
    //require('private/model/artWorkModel.php');
    //require('private/model/expoModel.php');
>>>>>>> parent of 46b0291 (edit home about data)

    function home(){

        require('view/homeView.php');
    }

    function artsList(){

        
    }

    function artistsList(){

        require('view/artistsListView.php');
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
            if(isset($log) && $log > 0) // nom d'utilisateur et mot de passe correctes
            {
                    $_SESSION['connect'] = 1;  
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

