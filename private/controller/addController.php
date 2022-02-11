<?php
    @session_start();

    //Controlle la supression des pages

    function addArt($id){
        include_once('model/ArtModel.php');
        $art = new ArtModel();
        $art -> addArt($id);
        artsList();
    }

    function addExpo(){
        include_once('model/expoModel.php');
        $expoM = new ExpoModel();
        $expoM -> addExpo();
        exposList();
    }

    function addArtist($id){
        include_once('model/artistsModel.php');
        $artist = new ArtistsModel();
        $artist -> addArtist($id);
        artistsList();
    }

    function addUser($id){
        require('model/userModel.php');
        $user = new UserModel();
        $user -> addUser($id);
        usersList();
    }