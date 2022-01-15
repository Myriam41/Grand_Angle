<?php
    session_start();

    $_SESSION['visitor'] = isset($_GET['v'])?1:"";


    if($_SESSION['visitor']){
       
        require('visitor/index.php');

    }else{

        require('private/index.php');

    }