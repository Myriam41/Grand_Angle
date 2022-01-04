<?php
    //include ('../../connect.php');

    $idExpo = isset($_GET['id'])?$_GET['id']:'';

    //$idExpo =1;
    //getBestArts();

    if($idExpo){
        getBestArts();
    }

    /** function getBestArt
     *  @return datas for graph
     */
    /* exemple return by getBestArts
        
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

        // Recover dates exposition
        $sql = "SELECT exposition.date_debut, exposition.date_fin
        FROM exposition
        WHERE code_expo = $idExpo";

        $res = connecMySQL($sql);

        $expo = mysqli_fetch_array($res, MYSQLI_ASSOC);

        var_dump ($expo['date_debut']);

        $nbJours = (strtotime($expo['date_fin']) - strtotime($expo['date_debut']))/(60*60*24);
        echo $nbJours;

        // create graph labels
        for ($i = 0; $i<= $nbJours ;$i++) {
            $labels[] = date('Y-m-d',strtotime($expo['date_debut'] . '+' . $i . 'day'));
        }


        // Recover 5 arts more see
        $sql = "SELECT exposer.nombre_vues, oeuvre.code_oeuvre, oeuvre.titre_oeuvre
                FROM oeuvre
                INNER JOIN exposer ON oeuvre.code_oeuvre = exposer.code_oeuvre
                WHERE code_expo = 1
                ORDER BY exposer.nombre_vues DESC
                LIMIT 5";

        $res = connecMySQL($sql);

        // Tant que l'on a des lignes dans le res
        while($oeuvres = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $code = $oeuvres['code_oeuvre'];

            foreach($labels as $date){
                $sql = "SELECT COUNT(vue.code_vue), vue.code_oeuvre, vue.date_vue
                FROM vue
                WHERE vue.code_oeuvre = $code
                GROUP BY vue.date_vue
                HAVING date_vue = $date";
        
                $res = connecMySQL($sql);
                $vues = mysqli_fetch_array($res, MYSQLI_NUM);

                $array['label'] = $oeuvres['titre_oeuvre'];
                $array['data'] =  $vues;

            }

            $datasets[] = $array;
        }

        $retour['labels'] = $labels;
        $retour['datasets'] = $datasets;

        return json_encode($retour);
    

    }