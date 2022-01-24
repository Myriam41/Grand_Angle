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
    $art = new ArtModel();
    $oeuvre = $art -> getArtById(1);
 
    while($row = $oeuvre ->fetch()){
        
        echo 'titre :' . $row['titre_oeuvre'] . '<br>';
        echo 'flash :' . $row['flashcode'] . '<br>';
   }
    
?>
    <div id="qrcode"></div>

<?php
    $content = ob_get_clean();

    require('view/template/base.php');

?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="assets/js/qrcode.js"></script>

