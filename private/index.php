<?php
    require_once ('controller/controller.php');

    $page = isset($_GET['page'])?'page':"home" ;

    if($_SESSION['connect'] == 1){

        if($page == 'home'){
            echo 'home';
            home();
        }
        
        if($page == 'artsList'){
            artsList();
        }


    }else{
        connect();
    }
