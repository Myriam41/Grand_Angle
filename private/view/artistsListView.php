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

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Start date</th>
            </tr>
        </thead>
        <tbody>
        
            <?php 
            $artistsView = new ArtistsModel();
            $artists = $artistsView -> getArtistsAll();

            while( $row = $artists->fetch()){ ?>
                <tr id="<? $row['code_artiste'] ?>">
                    <td><?= $row['nom'] ?></td>
                    <td><?= $row['prenom'] ?></td>
                    <td><?= $row['nom_usuel'] ?></td>
                    <td><?= $row['tel'] ?></td>
                    <td><?= $row['mail'] ?></td>
                    <td><?= $row['photo'] ?></td>
                </tr>
    <?php   } ?>

        </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
    </table>
</body>
<?php 
    $content = ob_get_clean();
    require('view/template/base.php');
?>
