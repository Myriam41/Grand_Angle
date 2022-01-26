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
                
            </div>
        </div>
        
        <!-- Partie droite -->
        <div class="right">
            <div class="recent-orders">
                <h2>Dernière exposition</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Vues</th>
                        </tr>
                    </thead>
<?php
                    $artsView = new ArtModel();
                    $arts = $artsView -> getViewsArtsExpo(1);

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
