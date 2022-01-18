<?php
    @session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
     if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
     }
     
    $title = "";
    $titlePage = "";

    ob_start();
    $art = getArtById(1);

    echo $art['titre_oeuvre'] . '<br>';
    echo $art['flashcode'] . '<br>';
    
?>

    Main



<?php
    $content = ob_get_clean();

    require('view/template/base.php');

