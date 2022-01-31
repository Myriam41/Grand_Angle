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
    <div class='multiPart'>
        <div class='leftMain'>
            <h1><?= $titlePage ?></h1>

            <div class="recent-orders">
                <h2>Les 5 oeuvres les plus vues</h2>
                <div id="artGraph">
                    <canvas id="graph" width="400" height="200"></canvas>
                </div>
            </div>

            <div class="recent-orders">
                <h2>Oeuvres non livrées</h2>
<?php /*
                <table>
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
                        <!--  -->
                </table>
  */ ?>      
            </div>
            <div>
                <!-- ESSAIS tableau -->  
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
<?php                   while($art = $noLivre ->fetch()){ ?>
                        <tr id="<?= $art['code_oeuvre'] ?>" onclick="openArt(this.id)">
                            <td><?= $art['titre_oeuvre'] ?></td>
                            <td><?= $art['nom_usuel'] ?></td>
                            <td><?= $art['date_livraison'] ?></td>
                            <td><?= $art['titre_expo'] ?></td>   
                            <td><?= $art['date_debut'] ?></td>
                        </tr>
<?php               } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Titre</th>
                            <th>Artiste</th>
                            <th>Date livraison</th>
                            <th>Exposition</th>
                            <th>Date exposition</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>
    
    <!-- Partie droite -->
    <div class="right">
        <?php include('template/rightTop.php') ?>
        
        <!-- Partie droite -->
        <div class="right">
            <div class="recent-orders">
                <h2>Dernière exposition</h2>

                <table id="example">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Vues</th>
                        </tr>
                    </thead>
<?php
                    $artsView = new ArtModel();
                    $arts = $artsView -> getViewsArtsExpo(1);
?>
                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Vues</th>
                        </tr>
                    </thead>
<?php


                    while($row = $arts ->fetch()){
?>
                        <tr>      

                            <td><?= $row ['titre_oeuvre'] ?></td>
                            <td><?= $row ['nombre_vues'] ?></td>
            
                        </tr>
<?php               }               
?>              </table>
            </div>
        </div>
    </div>

<?php
    $content = ob_get_clean();

    require('view/template/base.php');

    // JS pour affichage du graph
?> 
    <script src="assets/js/stats.js"></script>
