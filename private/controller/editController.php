<?php
    @session_start();

    //Controlle la supression des pages

    function editArt($id){
        include_once('model/ArtModel.php');
        $art = new ArtModel();
        $art -> editArt($id);
        artsList();
    }

    function editExpo($id){
        include_once('model/expoModel.php');
        $expo = new ExpoModel();
        $expo -> editExpo($id);
        exposList();
    }

    function editArtist($id){
        include_once('model/artistsModel.php');
        $artist = new ArtistsModel();
        $artist -> editArtist($id);
        artistsList();
    }

    function editUser($id){
        require('model/userModel.php');
        $user = new UserModel();
        $user -> editUser($id);
        usersList();
    }