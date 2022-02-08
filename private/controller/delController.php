<?php
    @session_start();

    //Controlle la supression des pages

    function delArt($id){
        include_once('model/ArtModel.php');
        $art = new ArtModel();
        $art -> delArt($id);
        artsList();
    }

    function delExpo($id){
        include_once('model/expoModel.php');
        $expo = new ExpoModel();
        $expo -> delExpo($id);
        exposList();
    }

    function delArtist($id){
        include_once('model/artistsModel.php');
        $artist = new ArtistsModel();
        $artist -> delArtist($id);
        artistsList();
    }

    function delUser($id){
        require('model/userModel.php');
        $user = new UserModel();
        $user -> delUser($id);
        usersList();
    }