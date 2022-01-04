<?php
    @session_start();
    $title = "Accueil";
    $titlePage = "accueil";

    $_SESSION['expoID'] = getLastExpo();

    ob_start();
?>
    <div class="container">
        <div class="row">
        <h2>Les 5 oeuvres les plus vues</h2>

        <canvas id="mychart" width="400" height="200"></canvas>

        </div>

        <div class="row">
            <div class="col-6">
                <h2>Autres oeuvres de l'exposition</h2>
<?php           displayAllArtwork(getArtworkExpoAll(1)); 
?>
            </div>
            <div class="col-6">

                <h2>Oeuvres non livrées</h2>

                <h2>Oeuvres livrées ces 7 derniers jours</h2>

                <h2>à faire</h2>

            </div>
        </div>
    </div>

<?php
    $content = ob_get_clean();

    require('private/view/base.php');

    // JS pour affichage du grap
?> 
    <script src="private/assets/js/stats.js"></script>
