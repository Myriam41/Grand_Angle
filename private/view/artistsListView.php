<?php
    @session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
     if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
     }
     $title = "artists";
     $titlePage = "Liste des artistes";
     $lang = 1;
     ob_start();
?>
<div class="cadres">
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
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Mail</th>
                <th>Pays</th>
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
                    <td><?= $row['pays'] ?></td>
                    <td><?= $row['photo'] ?></td>
                    <td>
                        <button class="btn_sup" name="<?= $row['code_artiste'] ?>" onclick="delArtist(this)" id="del"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
    <?php   } ?>
        </tbody>
    </table>
</div>
    <!-- Modal pour nouvel enregistrement boutton add-->
    <!-- The Modal -->
    <div id="modalAdd" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="MAC" class="close">&times;</span>
            <form action='index.php?add=addArtist&page=artistsList' method="post">
                <div class="form-group row">
                    <div class="col">

                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nom">
        
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Prénom">

                        <label for="surname">Nom Usuel</label>
                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Nom Usuel">

                        <label for="tel">Téléphone</label>
                        <input type="text" id="tel" name="tel" class="form-control" placeholder="Téléphone">

                        <label for="mail">Mail</label>
                        <input type="mail" id="mail" name="mail" class="form-control" placeholder="Mail">
                        <label for="adress">Adresse</label>
                        <input type="text" id="adress" name="adress" class="form-control" placeholder="Adresse">
                        <div class="row">
                            <div class="col">
                            <label for="cp">Code Postal</label>
                            <input type="text" id="cp" name="cp" class="form-control" placeholder="Code Postal">
                            </div>
                            <div class="col">
                            <label for="city">Ville</label>
                            <input type="text" id="city" name="city" class="form-control" placeholder="Ville">
                            </div>
                            <div class="col">
                            <label for="country">Pays</label>
                            <input type="text" id="country" name="country" class="form-control" placeholder="Pays">
                            </div>
                            <label class="form-label" for="customFile1">Photo</label>
                            <input type="file" class="form-control" id="customFile1">
                        </div>
                    </div>
                    <div class="col">
                        <label id="lang1" for="desc"><?= include('template/langs.php') ?></label>
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                <button type="button" class="btn btn-primary" id="MAC">Annuler</button>
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
            <form action='index.php?add=addArtist&page=artistsList' method="post">
                <div class="form-group row">
                    <div class="col">
                        <input id="code1" hidden>

                        <label for="name1">Nom</label>
                        <input type="text" id="name1" name="name1" class="form-control" placeholder="Nom">

                        <label for="firstname1">Prénom</label>
                        <input type="text" id="firstname1" name="firstname1" class="form-control" placeholder="Prénom">

                        <label for="surname1">Nom Usuel</label>
                        <input type="text" id="surname1" name="surname1" class="form-control" placeholder="Nom Usuel">

                        <label for="tel1">Téléphone</label>
                        <input type="text" id="tel1" name="tel1" class="form-control" placeholder="Téléphone">

                        <label for="mail1">Mail</label>
                        <input type="mail" id="mail1" name="mail1" class="form-control" placeholder="Mail">

                        <label for="adress1">Adresse</label>
                        <input type="text" id="adress1" name="adress1" class="form-control" placeholder="Adresse">
                        <div class="row">
                            <div class="col">
                            <label for="cp1">Code Postal</label>
                            <input type="text" id="cp1" name="cp1" class="form-control" placeholder="Code Postal">
                            </div>
                            <div class="col">
                            <label for="city1">Ville</label>
                            <input type="text" id="city1" name="city1" class="form-control" placeholder="Ville">
                            </div>
                            <div class="col">
                            <label for="country1">Pays</label>
                            <input type="text" id="country1" name="country1" class="form-control" placeholder="Pays">
                            </div>
                            <label class="form-label" for="customFile1">Photo</label>
                            <input type="file" class="form-control" id="customFile1">
                        </div>
                    </div>
                    <div class="col">
                        <label id="lang1" for="desc"><?= include('template/langs.php') ?></label>
                        <textarea class="form-control" name="bio<?php ?>1" id="bio" cols="30" rows="10" placeholder="Biographie"></textarea>
                    </div>
                </div>
                <div class="form-group">
                <button type="button" class="btn btn-primary" id="MEC">Annuler</button>
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
            <form action='index.php?add=addArtist&page=artistsList' method="post">
                <div class="form-group row">
                    <div class="col">
                        <input readonly id="code2" hidden>

                        <label for="name2">Nom</label>
                        <input readonly type="text" id="name2" name="name2" class="form-control" placeholder="Nom">

                        <label for="firstname2">Prénom</label>
                        <input readonly type="text" id="firstname2" name="firstname2" class="form-control" placeholder="Prénom">

                        <label for="surname2">Nom Usuel</label>
                        <input readonly type="text" id="surname2" name="surname2" class="form-control" placeholder="Nom Usuel">

                        <label for="tel2">Téléphone</label>
                        <input readonly type="text" id="tel2" name="tel2" class="form-control" placeholder="Téléphone">

                        <label for="mail2">Mail</label>
                        <input readonly type="mail" id="mail2" name="mail2" class="form-control" placeholder="Mail">

                        <label for="adress2">Adresse</label>
                        <input readonly type="text" id="adress2" name="adress2" class="form-control" placeholder="Adresse">
                        <div class="row">
                            <div class="col">
                            <label for="cp2">Code Postal</label>
                            <input readonly type="text" id="cp2" name="cp2" class="form-control" placeholder="Code Postal">
                            </div>
                            <div class="col">
                            <label for="city2">Ville</label>
                            <input readonly type="text" id="city2" name="city2" class="form-control" placeholder="Ville">
                            </div>
                            <div class="col">
                            <label for="country2">Pays</label>
                            <input readonly type="text" id="country2" name="country2" class="form-control" placeholder="Pays">
                            </div>
                            <label class="form-label" for="customFile2">Photo</label>
                            <input readonly type="file" class="form-control" id="customFile2">
                        </div>
                    </div>
                    <div class="col">
                        <label id="lang1" for="desc"><?= include('template/langs.php') ?></label>
                        <textarea readonly class="form-control" name="bio<?php ?>1" id="bio" cols="30" rows="10" placeholder="Biographie"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php 
    $content = ob_get_clean();
    require('view/template/base.php');
?>
