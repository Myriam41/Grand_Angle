<?php
    @session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
     if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
     }
     
    $title = "Accueil";
    $titlePage = "Accueil";

    //$_SESSION['expoID'] = getLastExpo();

    ob_start();
    
?>
    <div class='container'>
        <div class=row>
            <!-- partie de gauche -->
            <div class="col-8">
                <!-- Graph des vues -->
                <div class="recent-orders">
                    <h2>Les 5 oeuvres les plus vues</h2>
                    <div id="artGraph">
                        <canvas id="graph" width="400" height="200"></canvas>
                    </div>
                </div>

                <!-- Oeuvres non livrées -->
                <div class="recent-orders">
                    <h2>Oeuvres non livrées</h2> 

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Artiste</th>
                                <th>Date livraison</th>
                                <th>Exposition</th>
                                <th>Date exposition</th>
                            </tr>
                        </thead>
                        <tbody>
<?php                       while($art = $noLivre ->fetch()){ ?>
                            <tr id="<?= $art['code_oeuvre'] ?>" onclick="openArt(this)">
                                <td><?= $art['titre_oeuvre'] ?></td>
                                <td><?= $art['nom'] ?></td>
                                <td><?= $art['date_livraison'] ?></td>
                                <td><?= $art['titre_expo'] ?></td>   
                                <td><?= $art['date_debut'] ?></td>
                            </tr>
<?php                       } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- partie de droite -->
            <div class="col-4">
                <div class="recent-orders">
                    <h2>Dernière exposition</h2>

                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Vues</th>
                            </tr>
                        </thead>
                        <tbody>
<?php                       while($row = $arts ->fetch()){?>
                                <tr>      
                                    <td><?= $row ['titre_oeuvre'] ?></td>
                                    <td><?= $row ['nombre_vues'] ?></td>      
                                </tr>
<?php                       }?>     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
    $content = ob_get_clean();

    require('view/template/base.php');

    // JS pour affichage du graph
?> 
    <script src="assets/js/stats.js"></script>
    <script src="assets/js/open.js"></script>
