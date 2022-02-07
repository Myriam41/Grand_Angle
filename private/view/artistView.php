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
    $artistList = $artist -> getArtistById(1);
    $img ='';

    while($row = $artistsList->fetch()){
        $titre = isset($row['nom_usuel'])?$row['nom_usuel']:'';
        $long = isset($row['hauteur'])?$row['hauteur']:'';
        $larg = $row['largeur'];
        $ep = $row['epaisseur'];
      //  $arr = $row['date_arrivee'];
        $fr = $row['descriptionfr'];
        $ru = $row['descriptionru'];
        $en = $row['descriptionen'];
        $ch = $row['descriptionch'];
        $de = $row['descriptionde'];
        $img = isset($row['image'])?$row['image']:'';
   }

    ob_start(); 
?>
    <div id='topMain'>
        <button type='boutton' class='btn_action'><i class="fas fa-plus"></i></button>
        <button type='boutton' class='btn_action'><i class="fas fa-save"></i></button>
        <h2><?= $titre ?></h2>
        <button type="button" class="btn_sup"><i class="fas fa-trash-alt"></i></button>
    </div>
    <div class='infoFiche'>
        <div>
<?php       if($img != '')        
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
    <script src="assets/js/qrcode.js"></script>

