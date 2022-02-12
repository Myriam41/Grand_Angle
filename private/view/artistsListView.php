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
<h2>Liste des artistes</h2>
    <table id="example" class="display" style="width:100%">
        <thead>
                <th>
                    <button type="button" id="add" class="btn_action">
                        <i class="fas fa-plus"></i>
                    </button>
                </th>
                <th>Ouvrir</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Nom usuel</th>
                <th>Téléphone</th>
                <th>Mail</th>
                <th>Photo</th>
                <th></th>
        </thead>
        <tbody>
            <?php 
            $artistView = new ArtistsModel();
            $artists = $artistView -> getArtistsAll();

            while( $row = $artists->fetch()){ ?>
                <tr>
                    <td>
                    <button class="btn_action" id="edit" name="<?= $row['code_artiste'] ?>" onclick="getArtist(this)">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    </td>
                    <td>
                        <button class="btn_action" id="view" name="<?= $row['code_artiste'] ?>" onclick="getArtist(this)">
                        <i class="fas fa-eye"></i>
                        </button>
                    </td>
                    <td><?= $row['nom'] ?></td>
                    <td><?= $row['prenom'] ?></td>
                    <td><?= $row['nom_usuel'] ?></td>
                    <td><?= $row['tel'] ?></td>
                    <td><?= $row['mail'] ?></td>
                    <td><?= $row['photo'] ?></td>
                    <td>
                        <button class="btn_sup" name="<?= $row['code_artiste'] ?>" id="del"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
    <?php   } ?>
        </tbody>
    </table>
    <!-- Modal pour nouvel enregistrement boutton add-->
    <!-- The Modal -->
    <div id="modalAdd" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="MAC" class="close">&times;</span>
            <form action='index.php?add=addArtist&page=artistsList' method="post">
                <div class="form-group">

                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nom">
    
                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Prénom">

                    <label for="firstname">Nom Usuel</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Nom Usuel">

                    <label for="tel">Téléphone</label>
                    <input type="text" id="tel" name="tel" class="form-control" placeholder="Téléphone">

                    <label for="tel">Mail</label>
                    <input type="mail" id="tel" name="tel" class="form-control" placeholder="Mail">

                    <label class="form-label" for="customFile">Photo</label>
                    <input type="file" class="form-control" id="customFile">
                </div>
                <div class="form-group">
                <button type="button" class="btn btn-primary">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Trigger/Open The Modal -->
    <!-- Modal pour modifier enregistrement -->
    <!-- The Modal -->
    <div id="modalEdit" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="MEC" class="close">&times;</span>
            <form action='index.php?action=edit&page=artistsList' method="post">
                <div class="form-group">

                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nom">
    
                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Prénom">

                    <label for="firstname">Nom Usuel</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Nom Usuel">

                    <label for="tel">Téléphone</label>
                    <input type="text" id="tel" name="tel" class="form-control" placeholder="Téléphone">

                    <label for="tel">Mail</label>
                    <input type="mail" id="tel" name="tel" class="form-control" placeholder="Mail">

                    <label class="form-label" for="customFile">Photo</label>
                    <input type="file" class="form-control" id="customFile">
                </div>
                <div class="form-group">
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
            <span id="MVC" class="close">&times;</span>
            <form action='index.php?action=view&page=artistsList' method="post">
                <div class="form-group">

                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nom">
    
                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Prénom">

                    <label for="firstname">Nom Usuel</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Nom Usuel">

                    <label for="tel">Téléphone</label>
                    <input type="text" id="tel" name="tel" class="form-control" placeholder="Téléphone">

                    <label for="tel">Mail</label>
                    <input type="mail" id="tel" name="tel" class="form-control" placeholder="Mail">

                    <label class="form-label" for="customFile">Photo</label>
                    <input type="file" class="form-control" id="customFile">
                </div>
                <div class="form-group">
                <button type="button" class="btn btn-primary">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
<?php 
    $content = ob_get_clean();
    require('view/template/base.php');
?>
