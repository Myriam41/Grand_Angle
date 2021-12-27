<?php
    include_once('connect.php');

    function getArtworkAll(){

        $sql = 'SELECT * FROM oeuvres';

        connecMySQL($sql);

    }

    function getArtworkById(){
        $sql = 'SELECT * FROM oeuvres WHERE id=?';

        connecMySQL($sql);
        
    }