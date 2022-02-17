<?php
    @session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
     if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
     }
     
    $title = "oeuvres";
    $titlePage = "Liste des oeuvres";

    ob_start();
    
?>
<div class="cadres">
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
                    <td><?= $row['image'] ?></td>
                    <td><?= $row['code_typeoeuvre'] ?></td>
                    <td><?= $row['code_artiste'] ?></td>
                    <td>
                    <button class="btn_sup"  onclick="delArt(this)" name="<?= $row['code_oeuvre'] ?>" id="del"><i class="fas fa-trash-alt"></i></button>
                </td>  
                </tr>
        <?php    } ?>
        </tbody>
    </table>
</div>
    <!-- Modal pour nouvel enregistrement boutton add-->
    <!-- The Modal -->
    <div id="modalAdd" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="MAC" class="close">&times;</span>
            <form class="form-group" action='index.php?add=addArt&page=artsList' method="post">
                <div class="form-group row">
                    <div class="col">
                        <input id="code" name = "code" hidden>
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Titre">
                        <div class="row">
                            <div class="col">
                                <label for="height">Hauteur</label>
                                <input type="text" id="height" name="height" class="form-control" placeholder="Hauteur">
                            </div>
                            <div class="col">
                                <label for="epaisseur">Epaisseur</label>
                                <input type="text" id="epaisseur" name="epaisseur" class="form-control" placeholder="Epaisseur">
                            </div>
                            <div class="col">
                                <label for="largeur">Largeur</label>
                                <input type="text" id="largeur" name="largeur" class="form-control" placeholder="Largeur">
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
                        <input hidden class="code1">
                        <label for="title1">Titre</label>
                        <input type="text" id="title1" name="title1" class="form-control" placeholder="Titre">
                        <div class="row">
                            <div class="col">
                                <label for="height1">Hauteur</label>
                                <input type="text" id="height1" name="height1" class="form-control" placeholder="Hauteur">
                            </div>
                            <div class="col">
                                <label for="epaisseur1">Epaisseur</label>
                                <input type="text" id="epaisseur1" name="epaisseur1" class="form-control" placeholder="Epaisseur">
                            </div>
                            <div class="col">
                                <label for="width1">Largeur</label>
                                <input type="text" id="width1" name="width1" class="form-control" placeholder="Largeur">
                            </div>
                        </div>
                        <label class="form-label" for="image">Image</label>
                        <input type="file" class="form-control" id="image" />
                        <div class="row">
                            <div class="col">
                                <select name="typeArt1" id="typeArt1" class="form-select">
                                    <option selected>Type d'oeuvre</option>
                                    <option value="1">Tableau</option>
                                    <option value="2">Sculpture</option>
                                    <option value="3">Oeuvre Immatérielle</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="artist1" id="artist1" class="form-select">
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
                        <textarea class="form-control" name="desc1" id="desc1" cols="30" rows="10" placeholder="Description"></textarea>
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
                        <input id="code2" name = "code2" hidden>
                        <label for="title2">Titre</label>
                        <input type="text" id="title2" name="title2" class="form-control" placeholder="Titre">
                        <div class="row">
                            <div class="col">
                                <label for="height2">Hauteur</label>
                                <input type="text" id="height2" name="height2" class="form-control" value=0 placeholder="Hauteur">
                            </div>
                            <div class="col">
                                <label for="epaisseur2">Epaisseur</label>
                                <input type="number" id="epaisseur2" name="epaisseur2" class="form-control" placeholder="Epaisseur">
                            </div>
                            <div class="col">
                                <label for="width2">Largeur</label>
                                <input type="number" id="width2" name="width2" class="form-control" placeholder="Largeur">
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
                                <select name="artist" id="artist2" class="form-select">
                                    <option selected>Artistes</option>
                                    <?php
                                    
                                    while($row = $artists->fetch()){ ?>
                                    <option value="<?= $row['code_artiste'] ?>"><?= isset($row['nom'])? $row['nom']: "";  ?></option>
                                    <?php } ?>
                                </select>
                            </div>     
                        </div>
                        <div id="qrcode" name="" class="p-2"></div>

                    </div>
                    <div class="col">
                        <textarea class="form-control" name="descFR2" id="descFR2" cols="30" rows="10" placeholder="Description"></textarea>
                        <textarea class="form-control" name="descEN2" id="descEN2" cols="30" rows="10" placeholder="Description"></textarea>
                        <textarea class="form-control" name="descDE2" id="descDE2" cols="30" rows="10" placeholder="Description"></textarea>
                        <textarea class="form-control" name="descCH2" id="descCH2" cols="30" rows="10" placeholder="Description"></textarea>
                        <textarea class="form-control" name="descRU2" id="descRU2" cols="30" rows="10" placeholder="Description"></textarea>

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