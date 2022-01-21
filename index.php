<?php
    @session_start();

    $_SESSION['visitor'] = isset($_GET['v'])?1:"";
    $_SESSION['connect'] = "";
    var_dump($_SESSION['visitor']);

    if($_SESSION['visitor']){
       
        require('visitor/index.html');

    }else{

        require('private/index.php');

    }