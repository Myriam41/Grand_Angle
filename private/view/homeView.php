<?php
    $title = "Accueil";
    $titlePage = "accueil";

    ob_start();
?>
    <div class="container">
        <div class="row">
        <h2>Les 5 oeuvres les plus vues</h2>

        <canvas id="myChart" width="400" height="200"></canvas>
        </div>

        <div class="row">
            <div class="col-6">
                <h2>Autres oeuvres de l'exposition</h2>
<?php           displayAllArtwork(getArtworkAll()); 
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
?>
