<?php
    require ('controller/controller.php');

    $page = isset($_GET['page'])?'page':"home" ;

    if($_SESSION['connect'] == 1){

        if($page == 'home'){
            home();
        }
        
        if($page == 'artsList'){
            artsList();
        }


    }else{
        connect();
    }
