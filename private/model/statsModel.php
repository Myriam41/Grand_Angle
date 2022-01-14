<?php
    $mysqli = new MySQLi('localhost', 'root','','grand_angle2');

    if($mysqli->connect_errno){
        echo "Failed to connect to MySQL: " . $mysql->connect_errno;
    }

    $idExpo = isset($_GET['id'])?$_GET['id']:'';
    $colors = ['#ff6384','#36a2eb','#36a2eb','#cc65fe','#ffce56'];

    $idExpo =1;

    if($idExpo){
        // Recover dates exposition
        $getDates = "SELECT exposition.date_debut, exposition.date_fin
        FROM exposition
        WHERE code_expo = $idExpo";
    
        $dates = $mysqli->query($getDates);

        $expo = $dates->fetch_assoc();

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

        $arts = $mysqli->query($getArts);

        while($oeuvre = $arts -> fetch_assoc()){

            $code = $oeuvre['code_oeuvre'];  
            $array =[];

            foreach ($labels as $date) {
                $getVues = "SELECT COUNT(vue.code_vue) as nbVues, vue.code_oeuvre, vue.date_vue
                FROM vue
                WHERE vue.code_oeuvre = $code
                GROUP BY vue.date_vue
                HAVING date_vue = date('$date')";

                $nbVues = $mysqli->query($getVues);

                $tbl =[];
                $tbl["label"] = $oeuvre['titre_oeuvre'];

                $array[$date] = 0;
                while( $vues = $nbVues->fetch_assoc()){
                    $array[$date] = $vues['nbVues'];
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