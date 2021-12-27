<?php
    $title = "Accueil";
    $titlePage = "accueil";
    $chaine = "";

    ob_start();
?>
    <h2>Nombre de vues par oeuvres</h2>

    <canvas id="myChart" width="100" height="100"></canvas>

    <h2>Oeuvres de l'exposition</h2>
    
    <?= "<table border = 1>";

    // corps du tableau
    while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
        echo "<tr>";

        
        foreach($row as $k=>$v){
            echo "<td>" . $chaine .= $v."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";?>

<?php
    $content = ob_get_clean();

    require('private/view/base.php');
?>
