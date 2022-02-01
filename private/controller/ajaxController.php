<?php
    @session_start();

    $idArt = isset($_GET['idArt'])?$_GET['idArt']:'';

    if(isset($idArt)){
        require ('model/artModel.php');
        $getArt = new ArtModel();
        $getArt->getArtById($idArt);

        require ('view/artView.php');
    }