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
<body>
    <h2>Liste des expositions</h2> 
    <table id="example" class="display" style="width:100%">
     <thead>
         <th></th>
         <th>Id</th>
         <th>Date de début</th>
         <th>Date de fin</th>
         <th>Image</th>
         <th></th>
     </thead>
     <tbody>
         <?php
         $exposView = new ExpoModel();
         $expo = $exposView -> getExpoAll();

         while( $row = $expo->fetch()){ ?>
            <tr>
                <td>
                    <button class="btn_action"><i class="fas fa-pencil-alt"></i></button>
                </td>
                <td  id="<?= $row['code_expo'] ?>" onclick="openExpo(this)"><?= $row['code_expo'] ?></td>
                <td><?= $row['date_debut'] ?></td>
                <td><?= $row['date_fin'] ?></td>
                <td><?= $row['titre_expo'] ?></td>
                <td><?= $row['image'] ?></td>
                <td>
                    <button class="btn_sup"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
    <?php } ?>
     </tbody>
    </table>
</body>


<?php
    $content = ob_get_clean();

    require('view/template/base.php');

