<?php
    @session_start();

    $idArt = isset($_GET['idArt'])?$_GET['idArt']:'';


    if(isset($idArt)){
        echo 'idArt';

        require ('model/artModel.php');
        $getArt = new ArtModel();
        $getArt->getArtById($idArt);


        echo $result = json_encode($idArt) ;
        
    }