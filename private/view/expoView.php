<?php
    @session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
     if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
     }
     
    $title = $titre;
    $titlePage = $titre;

    ob_start(); 
?>
    <div class='cadres'>
        
<h2>Liste des oeuvres</h2> 
    <table id="example" class="display" style="width:100%">
     <thead>
         <th>
            <button type="button" id="add" class="btn_action">
                <i class="fas fa-plus"></i>
            </button>
        </th>
         <th>Ouvrir</th>
         <th>Titre</th>
         <th>Date de livraison</th>
         <th>Artiste</th>
         <th>QRCode</th>
         <th></th>
     </thead>
     <tbody>
         <?php
         while( $row = $arts->fetch()){ ?>
            <tr>
                <td>
                    <button class="btn_action" id="edit" name="<?= $row['code_oeuvre']?>" onclick="getArt(this)">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </td>
                <td>
                    <button class="btn_action" id="view" name="<?= $row['code_oeuvre']?>" onclick="getArt(this)">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
                <td><?= $row['titre_oeuvre'] ?></td>
                <td><?= $row['date_livraison'] ?></td>
                <td><?= $row['nom'] ?></td>
                <td>QR</td>
                <td>
                    <button class="btn_sup"  name="<?= $row['code_oeuvre']?>" onclick="delExpo(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
    <?php } ?>
     </tbody>
    </table>
</div>

<?php
    $content = ob_get_clean();

    require('view/template/base.php');

?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="assets/js/qrcode.js"></script>

