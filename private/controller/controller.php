<?php
    include_once('connect.php');

    require('private/model/artWorkModel.php');
    require('private/model/expoModel.php');

    function home(){

        require('private/view/homeView.php');
    }

    function artsList(){

        
    }

    function artistsList(){

        require('private/view/artistsListView.php');
    }

    function connect(){

        require('private/view/connectView.php');
    }