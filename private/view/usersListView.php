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
    <h2>Liste des expositions</h2> 
    <table id="example" class="display" style="width:100%">
     <thead>
         <th></th>
         <th>Id</th>
         <th>Identifiant</th>
         <th>Mot de pass</th>
         <th>Admin</th>
         <th></th>
     </thead>
     <tbody>
         <?php
         $exposView = new UserModel();
         $expo = $exposView -> getUserAll();

         while( $row = $expo->fetch()){ ?>
            <tr>
                <td>
                    <button class="btn_action"><i class="fas fa-pencil-alt"></i></button>
                </td>
                <td  id="<?= $row['code_user'] ?>" onclick="openUser(this)"><?= $row['code_user'] ?></td>
                <td><?= $row['identifiant'] ?></td>
                <td><?= $row['mot_pass'] ?></td>
                <td><?= $row['admin'] ?></td>
                <td>
                    <button class="btn_sup"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
    <?php } ?>
     </tbody>
    </table>


<?php
    $content = ob_get_clean();

    require('view/template/base.php');
?>