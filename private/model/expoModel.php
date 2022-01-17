<?php
    include_once('config.php');

    $file = $_SERVER['PHP_SELF'];
    $IP = $_SERVER['SERVER_ADDR'];
    $id = (isset($_GET['id']))?$_GET['id']:-1;

/*
    labels: ['03/01/2022', '04/01/2022', '05/01/2022', '06/01/2022', '07/01/2022', '08/01/2022', '09/01/2022'],
    datasets: [
        {
        label: 'taleau 1',
        data: [10, 26, 52, 46, 20],
        },
        {
        label: 'tableau 2',
        data: [50, 30, 2, 23, 50],
        }
    ]


*/

    function getExpo(){
        global $id;

        $sql = "SELECT expo.date_debut, expo.date_fin
        FROM expo
        WHERE code_expo = $id";

        $res = connecMySQL($sql);
        $row = mysqli_fetch_row($res, MYSQLI_ASSOC);

        for ($date=$row['date_debut'];$date<$row['date_fin'];$date++) {
            $labels[] = $date;
        }

        $sql = "SELECT oeuvre.nombreVues, oeuvre.code_oeuvre, oeuvre.titre_oeuvre
        FROM oeuvre
        WHERE code_expo = $id
        ORDER BY oeuvre.nombreVues DESC
        LIMIT 5";

        $res = connecMySQL($sql);
        // Tant que l'on a des lignes dans le res
        while($row = mysqli_fetch_row($res, MYSQLI_ASSOC)){
            $code = $row['code_oeuvre'];

            foreach($labels as $date){
                $sql = "SELECT COUNT(vue.code_vue)
                FROM vue
                GROUP BY DATE(vue.date_heure)
                HAVING vue.code_oeuvre = $code";
        
                $res = connecMySQL($sql);
                $row2 = mysqli_fetch_row($res, MYSQLI_NUM);

                $array['label'] = $row['titre_oeuvre'];
                $array['data'] =  $row2;

            }

            $datasets[] = $array;
        }

        $retour['labels'] = $labels;
        $retour['datasets'] = $datasets;

        return json_encode($retour);
      

    }

    function getLastExpo(){
        $date = date('d/m/y');

        $sql = 'SELECT evenements.titre, evenement.code_evenement
                FROM evenements
                WHERE date_debut <= $date
                ORDER BY date_debut DESC
                LIMIT 1';

        $res = connecMySQL($sql);
        
        return $res;


    }

    function expoAll(){
        $sql = 'SELECT * FROM evenements';
        return $sql;

    }
    $sql = 'SELECT * FROM evenements';
    $res = mysqli_query($lk, $sql);