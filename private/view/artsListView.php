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
        <a href="index.php?page=art&amp;id=1">
            <i class="fas fa-palette"></i>Vers une Oeuvre
        </a>
    Main

<?php
    $content = ob_get_clean();

    require('view/template/base.php');

