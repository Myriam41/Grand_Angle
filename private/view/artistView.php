<?php
    @session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
     if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
     }
     
    $title = "";
    $titlePage = "";
    $langs = 1;

    $artist = new ArtistsModel();
    $artiste = $artist -> getArtistById(1);

    while($row = $artiste->fetch()){
        $nom = isset($row['nom'])?$row['nom']:'';
        $prenom = isset($row['prenom'])?$row['prenom']:'';
        $nomUsuel = isset($row['nom_usuel'])?$row['nom_usuel']:'';
        $tel = isset($row['tel'])?$row['tel']:'';
        $mail = isset($row['mail'])?$row['mail']:'';
        $adresse = isset($row['adresse'])?$row['adresse']:'';
        $cp = isset($row['cp'])?$row['cp']:'';
        $ville = isset($row['ville'])?$row['ville']:'';
        $pays = isset($row['pays'])?$row['pays']:'';
        $photo = isset($row['photo'])?$row['photo']:'';
        $fr = isset($row['biographiefr'])?$row['biographiefr']:'';
        $ru = isset($row['biographieen'])?$row['biographieen']:'';
        $en = isset($row['biographiech'])?$row['biographiech']:'';
        $ch = isset($row['biographieru'])?$row['biographieru']:'';
        $de = isset($row['biographiede'])?$row['biographiede']:'';
   }

    ob_start(); 
?>
    <div id='topMain'>
        <button type='boutton' class='btn_action'><i class="fas fa-plus"></i></button>
        <button type='boutton' class='btn_action'><i class="fas fa-save"></i></button>
        <h2><?= $nom ?></h2>
        <button type="button" class="btn_sup"><i class="fas fa-trash-alt"></i></button>
    </div>
    <div class='infoFiche'>
        <div>
<?php       if($photo != '')        
            {
?>              <img class="mini" src="<?= $img ?>" alt="<?= $titre ?>">           
<?php       }else
            {
?>              <button type='boutton' class='btn_action'><i class="fas fa-plus"></i>Ajouter une image</button>           
<?php       }
?>      </div>          

        <div class='container'>
            <div class="row">
                <input class='col-10'>
            </div>
            <div class="row">
                <input class='col-10'>
            </div>
            <div class="row">
                <input class='col-2'>
                <input class='col-2'>
                <input class='col-2'>
                <input class='col-2'>
            </div>

        </div>
        <!-- <div id="qrcode"></div> -->

    </div>
    <textarea></textarea>

<?php
    $content = ob_get_clean();

    require('view/template/base.php');

?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

