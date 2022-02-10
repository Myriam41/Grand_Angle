<?php
    @session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
    }
     
    $title = "";
    $titlePage = "expo";

    ob_start();  
?>
    <h2>Liste des expositions</h2> 
    <table id="example" class="display" style="width:100%">
        <thead>
            <th>
                <button type='button' id="add" class='btn_action' name="<?=$code?>">
                    <i class="fas fa-plus"></i>
                </button>
            </th>
            <th>Ouvrir</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Image</th>
            <th></th>
        </thead>
        <tbody>
<?php       while( $row = $expo->fetch()){ ?>
                <tr>
                    <td>
                        <button id="edit" class="btn_action" name="<?= $row['code_expo'] ?>" onclick="openExpo(this)">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </td>
                    <td  id="open" name="<?= $row['code_expo'] ?>">
                        <button class="btn_action">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                    <td><?= $row['date_debut'] ?></td>
                    <td><?= $row['date_fin'] ?></td>
                    <td><?= $row['titre_expo'] ?></td>
                    <td><?= $row['image'] ?></td>
                    <td>
                        <button class="btn_sup"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
<?php       } ?>
        </tbody>
    </table>

    <!-- The Modal -->
    <div id="form" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>

        </div>
    </div>

<?php
    $content = ob_get_clean();

    require('view/template/base.php');