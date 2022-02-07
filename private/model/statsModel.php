<?php
    $conn = pg_connect('host=localhost port=5432 user=postgres password=mathieu dbname=Grand_Angle')or die('connection failed');

    $idExpo = isset($_GET['id'])?$_GET['id']:'';
    $colors = ['#ff6384','#36a2eb','#36a2eb','#cc65fe','#ffce56'];

    $idExpo =1;

    if($idExpo){
        // Recover dates exposition
        $getDates = "SELECT exposition.date_debut, exposition.date_fin
        FROM exposition
        WHERE code_expo = $idExpo";
    
        $dates = pg_query($conn, $getDates);

        $expo = pg_fetch_array($dates,NULL,PGSQL_ASSOC);

        $nbJours = (strtotime($expo['date_fin']) - strtotime($expo['date_debut']))/(60*60*24);

        // create graph labels
        for ($i = 0; $i<= $nbJours ;$i++) {
            // var_dump(date('Y-m-d',strtotime($expo['date_debut'] . '+' . $i . 'day')).'<br>');
           // $date = date('Y-m-d', strtotime($expo['date_debut'] . '+' . $i . 'day'));
            $labels[] = date('Y-m-d', strtotime($expo['date_debut'] . '+' . $i . 'day'));
        }
    
        // Recover 5 arts more see
        $getArts = "SELECT exposer.nombre_vues, oeuvre.code_oeuvre, oeuvre.titre_oeuvre
        FROM oeuvre
        INNER JOIN exposer ON oeuvre.code_oeuvre = exposer.code_oeuvre
        WHERE code_expo = 1
        ORDER BY exposer.nombre_vues DESC
        LIMIT 5";

        // View by art by date
        $code = "";
        $datasets = [];

        $arts = pg_query($conn, $getArts);

        while($oeuvre = pg_fetch_Assoc($arts)){

            $code = $oeuvre['code_oeuvre'];  
            $array =[];

            foreach ($labels as $date) {
                $getVues = "SELECT COUNT(vue.code_vue) as nbvues
                            FROM vue
                            WHERE vue.code_oeuvre = $code and vue.date_vue = date('$date')";

                $nbVues = pg_query($conn, $getVues);

                $tbl =[];
                $tbl["label"] = $oeuvre['titre_oeuvre'];

                $array[$date] = 0;
                while( $vues = pg_fetch_Assoc($nbVues)){
                    $array[$date] = $vues['nbvues'];
                }
            }
            $i = 0;
            foreach($array as $d){
                $tbl["data"][] = $d;
                $tbl['backgroundColor'][]= $colors[$i];
                $tbl['borderColor'][]= $colors[$i];              

                $i++;
            }
            $datasets[] = $tbl;
            
        }
        
        $data = [];
        $data['labels']= $labels;
        $data['datasets']= $datasets;

        echo $art_graph = json_encode($data) ;
    }

