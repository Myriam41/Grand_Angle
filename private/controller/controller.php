<?php

    require('private/model/artWorkModel.php');
    require('private/model/connectModel.php');
    require('private/model/expoModel.php');

    function home(){

        require('view/homeView.php');
    }

    function artsList(){

        
    }

    function artistsList(){

        require('private/view/artistsListView.php');
    }

    function connect(){

        require('private/view/connectView.php');
    }