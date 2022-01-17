<?php
    require_once ('controller/controller.php');

    $_SESSION['connect'] = isset($_GET['connect'])?$_GET['connect']:"" ;

    $page = isset($_GET['page'])?$_GET['page']:"home" ;

    if($_SESSION['connect'] == 1){

        if($page == 'home'){
            echo 'home';
            home();
        }
        
        if($page == 'artsList'){
            artsList();
        }


    }else if($_SESSION['connect'] == 'log'){
    
        $_SESSION['user'] = $_POST['username']; 
        $_SESSION['pass'] = $_POST['password'];
        logVerif();

        if($_SESSION['connect'] == 'no'){
            connectAgain();
        }
    }
    else{
        connect();
    }

