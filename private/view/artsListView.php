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
<a href="index.php?page=art&amp;id=1">
            <i class="fas fa-palette"></i>Vers une Oeuvre
        </a>
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Id</th>
                <th>Titre</th>
                <th>Hauteur</th>
                <th>Epaisseur</th>
                <th>Largeur</th>
                <th>Description</th>
                <th>Image</th>
                <th>Type d'oeuvre</th>
                <th>Artistes</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $artsView = new ArtModel();
            $art = $artsView -> getArtsAll();

            while( $row = $art->fetch()){ ?>
                <tr>
                <td>
                    <button class="btn_action"><i class="fas fa-pencil-alt"></i></button>
                </td>
                    <td id="<?= $row['code_oeuvre'] ?>" onclick="openArt(this)"><?= $row['code_oeuvre'] ?></td>
                    <td><?= $row['titre_oeuvre'] ?></td>
                    <td><?= $row['hauteur'] ?></td>
                    <td><?= $row['epaisseur'] ?></td>
                    <td><?= $row['largeur'] ?></td>
                    <td><a href="#">Voir description</a></td>
                    <td><?= $row['image'] ?></td>
                    <td><?= $row['code_typeoeuvre'] ?></td>
                    <td><?= $row['code_artiste'] ?></td>
                    <td>
                        <button class="btn_sup" name="<?= $row['code_oeuvre'] ?>" onclick="delArt(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>    
                </tr>
        <?php    } ?>
        </tbody>
        </table>
</body>

<?php
    $content = ob_get_clean();

    require('view/template/base.php');
?>