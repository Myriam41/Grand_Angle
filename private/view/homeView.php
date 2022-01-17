<?php
    $title = "Accueil";
    $titlePage = "Accueil";

    //$_SESSION['expoID'] = getLastExpo();

    ob_start();
    
?>
    <main>
        <h1><?= $titlePage ?></h1>

        <div class="recent-orders">
            <h2>Oeuvres non livrées             <a href="#"><i class="">Tout voir</i></a></span></h2>

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

        <div class="recent-orders">
            <h2>Les 5 oeuvres les plus vues</h2>
            <div id="artGraph">
                <canvas id="graph" width="400" height="200"></canvas>
            </div>
        </div>

    </main>
    
    <!-- Partie droite -->
    <div class="right">
        <div class="top">
            <button id="menu-btn">
                <span class="material-icons-sharp">menu</span>
            </button>
            <div class="theme-toggler">
                <span class="material-icons-sharp active">light_mode</span>
                <span class="material-icons-sharp">dark_mode</span>
            </div>
            <div class="profile">
                <div class="info">
                    <p>Bonjour, <b>Mathieu</b></p>
                    <small class="text-muted">Admin</small>
                </div>
                <div class="profile-photo">
                    <img src="assets/img/261746878_453672526326290_2022088434576343659_n.jpg" alt="user_picture">
                </div>
            </div>
        </div>
        <!-- FIN DU TOP -->
        <div class="recent-updates">
            <h2>Recent Updates</h2>
            <div class="updates">
                <div class="update">
                    <div class="profile-photo">
                        <img src="#" alt="#">
                    </div>
                    <div class="message">
                        <p><b>Myriam Stampers</b> a bien reçu sa commande</p>
                        <small class="text-muted">Il y a 2 minutes</small>
                    </div>
                </div>
                <div class="update">
                    <div class="profile-photo">
                        <img src="#" alt="#">
                    </div>
                    <div class="message">
                        <p><b>Myriam Stampers</b> a bien reçu sa commande</p>
                        <small class="text-muted">Il y a 2 minutes</small>
                    </div>
                </div>
                <div class="update">
                    <div class="profile-photo">
                        <img src="#" alt="#">
                    </div>
                    <div class="message">
                        <p><b>Myriam Stampers</b> a bien reçu sa commande</p>
                        <small class="text-muted">Il y a 2 minutes</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- FIN MAJ RECENTES -->
        <div class="recent-orders">
            <h2>Sales Analytics</h2>
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Nb vues</th>
                    </tr>
                </thead>
                <tbody>
                    <!--  -->
            </table>
        </div>
    </div>

<?php
    $content = ob_get_clean();

    require('view/template/base.php');

    // JS pour affichage du graph
?> 
    <script src="assets/js/stats.js"></script>
