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
         <th>
            <button type="boutton" id="add" class="btn_action">
                <i class="fas fa-plus"></i>
            </button>
        </th>
         <th>Ouvrir</th>
         <th>Date de début</th>
         <th>Date de fin</th>
         <th>Titre</th>
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
                    <button class="btn_action" id="edit" name="<?= $row['code_expo']?>" onclick="getExpo(this)">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </td>
                <td>
                    <button class="btn_action" id="view" name="<?= $row['code_expo']?>" onclick="getExpo(this)">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
                <td><?= $row['date_debut'] ?></td>
                <td><?= $row['date_fin'] ?></td>
                <td><?= $row['titre_expo'] ?></td>
                <td><?= $row['image'] ?></td>
                <td>
                    <button class="btn_sup"  name="<?= $row['code_expo']?>" onclick="delExpo(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
    <?php } ?>
     </tbody>
    </table>


    <!-- Modal pour nouvel enregistrement boutton add-->
    <!-- The Modal -->
    <div id="modalAdd" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="MAC" class="close">&times;</span>
            <form action='index.php?add=addExpo&page=exposList' method="post">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" class="form-control" placeholder="titre de l'exposition">
                </div>
                <div class="form-group">
                    <label for="debut">Date de début</label>
                    <input type="date" id="debut" name="debut" class="form-control" placeholder="AAAA-MM-JJ">

                    <label for="fin">Date de Fin</label>
                    <input type="date" id="fin" name="fin" class="form-control" placeholder="AAAA-MM-JJ">

                    <label class="form-label" for="image">Image</label>
                    <input type="file" class="form-control" id="image" />
                    
                    <button type="button" class="btn btn-primary">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal pour modifier enregistrement -->
    <!-- The Modal -->
    <div id="modalEdit" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span  id="MEC" class="close">&times;</span>
            <form action='index.php?action=edit&page=expoList' method="POST">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" class="form-control" value= "<?= isset($expoGet)?$expoGet->getTitre():'';?>" placeholder="titre de l'exposition">
                </div>
                <div class="form-group">
                    <label for="debut">Date de début</label>
                    <input type="date" id="debut" class="form-control"  value= "<?= isset($expoGet)?$expoGet->getDateDebut():''; ?>">
                    <label for="fin">Date de Fin</label>
                    <input type="date" id="fin" class="form-control"  value= "<?= isset($expoGet)?$expoGet->getDateFin():''; ?>">
                    <button type='boutton' class='btn_action'>
                        <i class="fas fa-plus"></i>
                        Ajouter une image
                    </button>
                    <button type="button" class="btn btn-primary">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Trigger/Open The Modal -->
    <!-- Modal pour visualiser enregistrement -->

    <!-- The Modal -->
    <div id="modalView" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span  id="MVC" class="close">&times;</span>
            <form action='index.php?action=view&page=expoList' method="POST">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" class="form-control" placeholder="titre de l'exposition">
                </div>
                <div class="form-group">
                    <label for="debut">Date de début</label>
                    <input type="date" id="debut" class="form-control" placeholder="00/00/0000">
                    <label for="fin">Date de Fin</label>
                    <input type="date" id="fin" class="form-control" placeholder="00/00/0000">
                    <button type='boutton' class='btn_action'>
                        <i class="fas fa-plus"></i>
                        Ajouter une image
                    </button>
                    <button type="submit" class="btn btn-primary">Fermer</button>
                </div>
            </form>
        </div>
    </div>
<?php
    $content = ob_get_clean();

    require('view/template/base.php');

