<?php
    include_once('config.php');

    function connecMySQL($sql){
        global $lk;
        
        $res = mysqli_query($lk, $sql);
    
        return $res;
    }

    function connecPg($sql){
        global $pg;
        
        $res = pg_query($pg, $sql);
    
        return $res;
    }

