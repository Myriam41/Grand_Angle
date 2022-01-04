<?php
    $idExpo = (isset($_GET['id']))?$_GET['id']:'';


    if($idExpo){
        getBestArts();
    }

    /** function getBestArt
     *  @return datas for graph
     */
    /* exemple de ce qui doit être renvoyé par getBestArts
        
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

    function getBestArts(){
        global $idExpo;

        $sql = "SELECT expo.date_debut, expo.date_fin
        FROM expo
        WHERE code_expo = $idExpo";

        $res = connecMySQL($sql);
        $row = mysqli_fetch_row($res, MYSQLI_ASSOC);

        for ($date=$row['date_debut'];$date<$row['date_fin'];$date++) {
            $labels[] = $date;
        }

        $sql = "SELECT oeuvre.nombreVues, oeuvre.code_oeuvre, oeuvre.titre_oeuvre
        FROM oeuvre
        WHERE code_expo = $idExpo
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