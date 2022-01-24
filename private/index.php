<?php
    require_once ('controller/controller.php');

    @session_start();
    //echo 'connect avant test' . $_SESSION['connect'] .'<br>';

    if(!isset($_SESSION['connect']) || trim($_SESSION['connect']) == ""){
        echo 'connect est vide<br>';
        $_SESSION['connect'] = isset($_GET['connect'])?$_GET['connect']:"" ;
    }

    $page = isset($_GET['page'])?$_GET['page']:"home" ;
    //echo $page . '<br>connect index =' . $_SESSION['connect'] ;

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

