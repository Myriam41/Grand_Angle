<?php
    @session_start();
    //Controlle l'appel des données à pour 1 enregistrement

    if(isset($_GET['open'])){
        $name = $_GET['open'];
        $id = $_GET['id'];
        $name($id);
        echo $name;
    }

    function getArt($id){
        include_once('model/ArtModel.php');
        $art = new ArtModel();
        $art -> getArtById($id);
    }

    function getExpo($id){
        include_once('model/expoModel.php');
        $expoGet = new ExpoModel();
        $ret = $expoGet -> getExpoById($id);
        echo $ret;
    }

    function getArtist($id){
        include_once('model/artistsModel.php');
        $artist = new ArtistsModel();
        $artist -> getArtistById($id);

    }

    function getUser($id){
        require('model/userModel.php');
        $user = new UserModel();
        $user -> getUserById($id);

    }