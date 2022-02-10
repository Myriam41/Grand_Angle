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

    <!-- Trigger/Open The Modal -->
    <!-- Modal pour nouvel enregistrement -->
    <button id="myBtn">Open Modal</button>

    <!-- The Modal -->
    <div id="modalAdd" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Modal pour nouvel enregistrement..</p>
    </div>

    </div>

    <!-- Trigger/Open The Modal -->
    <!-- Modal pourmodifier enregistrement -->
    <button id="myBtn">Open Modal</button>

    <!-- The Modal -->
    <div id="modalEdit" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Modal pour modifier enregistrement..</p>
    </div>

    </div>

    <!-- Trigger/Open The Modal -->
    <!-- Modal pour visualiser enregistrement -->
    <button id="myBtn">Open Modal</button>

    <!-- The Modal -->
    <div id="modalView" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Modal pour voir enregistrement..</p>
    </div>

    </div>




<?php
    $content = ob_get_clean();

    require('view/template/base.php');

