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
<h2>Liste des oeuvres</h2>
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>
                    <button type="boutton" id="add" class="btn_action">
                        <i class="fas fa-plus"></i>
                    </button>
                </th>
                <th>Ouvrir</th>
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
                    <button class="btn_action" id="edit" name="<?= $row['code_oeuvre'] ?>" onclick="getArt(this)"><i class="fas fa-pencil-alt"></i></button>
                </td>
                <td>
                    <button class="btn_action" id="view" name="<?= $row['code_oeuvre'] ?>" onclick="getArt(this)"><i class="fas fa-eye"></i></button>
                    <td><?= $row['titre_oeuvre'] ?></td>
                    <td><?= $row['hauteur'] ?></td>
                    <td><?= $row['epaisseur'] ?></td>
                    <td><?= $row['largeur'] ?></td>
                    <td><a href="#">Voir description</a></td>
                    <td><?= $row['image'] ?></td>
                    <td><?= $row['code_typeoeuvre'] ?></td>
                    <td><?= $row['code_artiste'] ?></td>
                    <td>
                    <button class="btn_sup"><i class="fas fa-trash-alt" onclick="delArt(this)" name="<?= $row['code_oeuvre'] ?>" id="del"></i></button>
                </td>  
                </tr>
        <?php    } ?>
        </tbody>
        </table>
    <!-- Modal pour nouvel enregistrement boutton add-->
    <!-- The Modal -->
    <div id="modalAdd" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="MAC" class="close">&times;</span>
            <form class="form-group" action='index.php?add=addArt&page=artsList' method="post">
                <div class="form-group row">
                    <div class="col">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Titre">
                        <div class="row">
                            <div class="col">
                                <label for="height">Hauteur</label>
                                <input type="text" id="height" name="height" class="form-control" placeholder="Prénom">
                            </div>
                            <div class="col">
                                <label for="height">Hauteur</label>
                                <input type="text" id="height" name="height" class="form-control" placeholder="Prénom">
                            </div>
                            <div class="col">
                                <label for="height">Hauteur</label>
                                <input type="text" id="height" name="height" class="form-control" placeholder="Prénom">
                            </div>
                        </div>
                        <label class="form-label" for="image">Image</label>
                        <input type="file" class="form-control" id="image" />
                        <div class="row">
                            <div class="col">
                                <select name="typeArt" id="typeArt" class="form-select">
                                    <option selected>Type d'oeuvre</option>
                                    <option value="1">Tableau</option>
                                    <option value="2">Sculpture</option>
                                    <option value="3">Oeuvre Immatérielle</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="artist" id="artist" class="form-select">
                                    <option selected>Artistes</option>
                                    <?php
                                    $artistView = new ArtistsModel();
                                    $artists = $artistView -> getArtistsAll();
                                    
                                    while($row = $artists->fetch()){ ?>
                                    <option value="<?= $row['code_artiste'] ?>"><?= isset($row['nom'])? $row['nom']: "";  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label id="lang1" for="desc"><?= include('template/langs.php') ?></label>
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>
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
            <form class="form-group" action='index.php?action=edit&page=artsList' method="post">
                <div class="form-group row">
                    <div class="col">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Titre">
                        <div class="row">
                            <div class="col">
                                <label for="height">Hauteur</label>
                                <input type="text" id="height" name="height" class="form-control" placeholder="Prénom">
                            </div>
                            <div class="col">
                                <label for="height">Hauteur</label>
                                <input type="text" id="height" name="height" class="form-control" placeholder="Prénom">
                            </div>
                            <div class="col">
                                <label for="height">Hauteur</label>
                                <input type="text" id="height" name="height" class="form-control" placeholder="Prénom">
                            </div>
                        </div>
                        <label class="form-label" for="image">Image</label>
                        <input type="file" class="form-control" id="image" />
                        <div class="row">
                            <div class="col">
                                <select name="typeArt" id="typeArt" class="form-select">
                                    <option selected>Type d'oeuvre</option>
                                    <option value="1">Tableau</option>
                                    <option value="2">Sculpture</option>
                                    <option value="3">Oeuvre Immatérielle</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="artist" id="artist" class="form-select">
                                    <option selected>Artistes</option>
                                    <?php
                                    $artistView = new ArtistsModel();
                                    $artists = $artistView -> getArtistsAll();
                                    
                                    while($row = $artists->fetch()){ ?>
                                    <option value="<?= $row['code_artiste'] ?>"><?= isset($row['nom'])? $row['nom']: "";  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label id="lang1" for="desc"><?= include('template/langs.php') ?></label>
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>
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
            <form class="form-group" action='index.php?action=view&page=artsList' method="post">
                <div class="form-group row">
                    <div class="col">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Titre">
                        <div class="row">
                            <div class="col">
                                <label for="height">Hauteur</label>
                                <input type="text" id="height" name="height" class="form-control" placeholder="Prénom">
                            </div>
                            <div class="col">
                                <label for="height">Hauteur</label>
                                <input type="text" id="height" name="height" class="form-control" placeholder="Prénom">
                            </div>
                            <div class="col">
                                <label for="height">Hauteur</label>
                                <input type="text" id="height" name="height" class="form-control" placeholder="Prénom">
                            </div>
                        </div>
                        <label class="form-label" for="image">Image</label>
                        <input type="file" class="form-control" id="image" />
                        <div class="row">
                            <div class="col">
                                <select name="typeArt" id="typeArt" class="form-select">
                                    <option selected>Type d'oeuvre</option>
                                    <option value="1">Tableau</option>
                                    <option value="2">Sculpture</option>
                                    <option value="3">Oeuvre Immatérielle</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="artist" id="artist" class="form-select">
                                    <option selected>Artistes</option>
                                    <?php
                                    $artistView = new ArtistsModel();
                                    $artists = $artistView -> getArtistsAll();
                                    
                                    while($row = $artists->fetch()){ ?>
                                    <option value="<?= $row['code_artiste'] ?>"><?= isset($row['nom'])? $row['nom']: "";  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label id="lang1" for="desc"><?= include('template/langs.php') ?></label>
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>
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