<?php
    @session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
     if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
     }
     $title = "";
     $titlePage = "";
     $lang = 1;
     ob_start();
?>
<body>
    <a href="index.php?page=artist&amp;id=1">
        <i class="fas fa-palette"></i>Vers un artiste
    </a>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Nom usuel</th>
                <th>Téléphone</th>
                <th>Mail</th>
                <th>Photo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        
            <?php 
            $artistView = new ArtistsModel();
            $artists = $artistView -> getArtistsAll();

            while( $row = $artists->fetch()){ ?>
                <tr>
                    <td id="<?= $row['code_artiste'] ?>" onclick="openArtist(this)"><button class="btn_action"><i class="fas fa-eye"></i></button></td>
                    <td><?= $row['nom'] ?></td>
                    <td><?= $row['prenom'] ?></td>
                    <td><?= $row['nom_usuel'] ?></td>
                    <td><?= $row['tel'] ?></td>
                    <td><?= $row['mail'] ?></td>
                    <td><?= $row['photo'] ?></td>
                    <td>
                        <button class="btn_sup"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
    <?php   } ?>

        </tbody>
    </table>
</body>
<?php 
    $content = ob_get_clean();
    require('view/template/base.php');
?>
