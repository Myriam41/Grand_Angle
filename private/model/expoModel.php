<?php
    include_once('config.php');

    $file = $_SERVER['PHP_SELF'];
    $IP = $_SERVER['SERVER_ADDR'];

    function expoAll(){
        $sql = 'SELECT * FROM evenements';
        return $sql;

    }
    $sql = 'SELECT * FROM evenements';
    $res = mysqli_query($lk, $sql);
