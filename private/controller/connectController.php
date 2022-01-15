<?php


// To Deconnect
if($_SESSION['connect']== 1){
    session_unset(); // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
    header('Location:index.php'); // On redirige
    die();
}
