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
    
?>
    <h2>Oups: problème</h2>
    <p><?= $error ?></p>

<?php
    $content = ob_get_clean();

    require('view/template/base.php');

