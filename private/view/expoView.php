<?php
    @session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
     if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
     }
     
    $title = $titre;
    $titlePage = $titre;
    $_SESSION['idExpo']=$code;

    ob_start(); 
?>
    <div class='cadres'>
        
<h2>Liste des oeuvres</h2> 
    <table id="example" class="display" style="width:100%">
     <thead>
         <th>
            <button type="button" id="add" class="btn_action">
                <i class="fas fa-plus"></i>
            </button>
        </th>
         <th>Ouvrir</th>
         <th>Titre</th>
         <th>Date de livraison</th>
         <th>Livrée</th>
         <th>Artiste</th>
         <th></th>
     </thead>
     <tbody>
         <?php
         while( $row = $arts->fetch()){ ?>
            <tr>
                <td>
                    <button class="btn_action" id="edit" name="<?= $row['code_oeuvre']?>" onclick="getArt(this)">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </td>
                <td>
                    <button class="btn_action" id="view" name="<?= $row['code_oeuvre']?>" onclick="getArt(this)">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
                <td><?= $row['titre_oeuvre'] ?></td>
                <td><?= $row['date_livraison'] ?></td>
                <td>
<?php               if($row['livree']== 1){?>
                        Livrée
<?php               }?>
                </td>
                <td><?= $row['nom'] ?></td>
                <td>
                    <button class="btn_sup"  name="<?= $row['code_oeuvre']?>" onclick="delExpo(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
    <?php } ?>
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
                                <label for="hauteur">Hauteur</label>
                                <input type="text" id="hauteur" name="hauteur" class="form-control" placeholder="Hauteur">
                            </div>
                            <div class="col">
                                <label for="epaisseur">Epaisseur</label>
                                <input type="text" id="epaisseur" name="epaisseur" class="form-control" placeholder="Epaisseur">
                            </div>
                            <div class="col">
                                <label for="largeur">Largeur</label>
                                <input type="text" id="largeur" name="largeur" class="form-control" placeholder="Largeur">
                            </div>
                            <div class="col">
                                <label for="livree">Livrée</label>
                                <input type="checkbox" id="livree" name="livree" class="form-control">
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
                        Français
                        <textarea class="form-control" name="descFR" id="descFR" cols="30" rows="10" placeholder="Description"></textarea>
                        Anglais
                        <textarea class="form-control" name="descEN" id="descEN" cols="30" rows="10" placeholder="Description"></textarea>
                        Allemand
                        <textarea class="form-control" name="descDE" id="descDE" cols="30" rows="10" placeholder="Description"></textarea>
                        Chinois
                        <textarea class="form-control" name="descCH" id="descCH" cols="30" rows="10" placeholder="Description"></textarea>
                        Russes
                        <textarea class="form-control" name="descRU" id="descRU" cols="30" rows="10" placeholder="Description"></textarea>
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
            <form class="form-group" name ="formEdit" action='index.php?edit=edit&page=expo&Art&id=' method="post">
                <div class="form-group row">
                    <div class="col">
                        <input id="code1" name = "code1" hidden>
                        <label for="title1">Titre</label>
                        <input type="text" id="title1" name="title1" class="form-control" placeholder="Titre">
                        <div class="row mt-3">
                            <div class="col">
                                <label for="hauteur1">Hauteur</label>
                                <input type="text" id="hauteur1" name="hauteur1" class="form-control" placeholder="Hauteur">
                            </div>
                            <div class="col">
                                <label for="epaisseur1">Epaisseur</label>
                                <input type="text" id="epaisseur1" name="epaisseur1" class="form-control" placeholder="Epaisseur">
                            </div>
                            <div class="col">
                                <label for="largeur1">Largeur</label>
                                <input type="text" id="largeur1" name="largeur1" class="form-control" placeholder="Largeur">
                            </div>
                            <div class="col">
                                <label for="livree1">Livrée</label>
                                <input type="checkbox" id="livree1" name="livree1" class="form-check-input">
                            </div>
                        </div>
                        <label class="form-label mt-3" for="image">Image</label>
                        <input type="file" class="form-control" id="image" />
                        <div class="row mt-3">
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
                        <div id="qrcode1" name="" class="p-2 mt-3"></div>
                    </div>
                    <!-- Descriptions par langues - Edit -->
                    <div class="col">
                        Français
                        <textarea class="form-control" name="descFR1" id="descFR1" cols="30" rows="10" placeholder="Description"></textarea>
                        Anglais
                        <textarea class="form-control" name="descEN1" id="descEN1" cols="30" rows="10" placeholder="Description"></textarea>
                        Allemand
                        <textarea class="form-control" name="descDE1" id="descDE1" cols="30" rows="10" placeholder="Description"></textarea>
                        Chinois
                        <textarea class="form-control" name="descCH1" id="descCH1" cols="30" rows="10" placeholder="Description"></textarea>
                        Russes
                        <textarea class="form-control" name="descRU1" id="descRU1" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary">Annuler</button>
                    <button type="submit" class="btn btn-primary" onclick="envoiForm()">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal pour visualiser enregistrement -->
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
                        <div class="row mt-3">
                            <div class="col">
                                <label for="height2">Hauteur</label>
                                <input type="text" id="hauteur2" name="hauteur2" class="form-control" value=0 placeholder="Hauteur">
                            </div>
                            <div class="col">
                                <label for="epaisseur2">Epaisseur</label>
                                <input type="number" id="epaisseur2" name="epaisseur2" class="form-control" placeholder="Epaisseur">
                            </div>
                            <div class="col">
                                <label for="width2">Largeur</label>
                                <input type="number" id="largeur2" name="largeur2" class="form-control" placeholder="Largeur">
                            </div>
                            <div class="col">
                                <label for="livree2">Livrée</label>  
                                <input type="checkbox" id="livree2" name="livree2" class="form-check-input">
                            </div>
                        </div>
                        <label class="form-label mt-3" for="image">Image</label>
                        <input type="file" class="form-control" id="image" />
                        <div class="row mt-3">
                            <div class="col">
                                <select name="typeArt" id="typeArt" class="form-select">
                                    <option selected>Type d'oeuvre</option>
                                    <option value="1">Tableau</option>
                                    <option value="2">Sculpture</option>
                                    <option value="3">Oeuvre Immatérielle</option>
                                </select>
                            </div>
                            
                            <div class="col">
                                <select name="artist2" id="artist2" class="form-select">
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
                        <div id="qrcode2" name="" class="p-2 mt-3"></div>

                    </div>
                    <!-- Descriptions par langues - View -->
                    <div class="col">
                        Français
                        <textarea class="form-control" name="descFR2" id="descFR2" cols="30" rows="10" placeholder="Description"></textarea>
                        Anglais
                        <textarea class="form-control" name="descEN2" id="descEN2" cols="30" rows="10" placeholder="Description"></textarea>
                        Allemand
                        <textarea class="form-control" name="descDE2" id="descDE2" cols="30" rows="10" placeholder="Description"></textarea>
                        Chinois
                        <textarea class="form-control" name="descCH2" id="descCH2" cols="30" rows="10" placeholder="Description"></textarea>
                        Russes
                        <textarea class="form-control" name="descRU2" id="descRU2" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php

    $content = ob_get_clean();

    require('view/template/base.php');

?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="assets/js/qrcode.js"></script>

