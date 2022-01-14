<?php
    $lk = mysqli_connect('localhost', 'root','','grand_angle2') or die("Erreur");

    function connecMySQL2($sql){
        global $lk;
        
        $res = mysqli_query($lk, $sql);
    
        return $res;
    }

    // :include ('../../connect.php');
    //include_once ('connect.php');

    //$idExpo = isset($_GET['id'])?$_GET['id']:'';

    $idExpo =1;
    //getBestArts();

    if($idExpo){
        getBestArts();
    }

    /** function getBestArt
     *  @return data for graph
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

        $res = connecMySQL2($sql);

        $expo = mysqli_fetch_array($res, MYSQLI_ASSOC);

        $nbJours = (strtotime($expo['date_fin']) - strtotime($expo['date_debut']))/(60*60*24);
        //$labelsS = '';
        // create graph labels
        for ($i = 0; $i<= $nbJours ;$i++) {
            // var_dump(date('Y-m-d',strtotime($expo['date_debut'] . '+' . $i . 'day')).'<br>');
           // $date = date('Y-m-d', strtotime($expo['date_debut'] . '+' . $i . 'day'));
            $labels[] = date('Y-m-d', strtotime($expo['date_debut'] . '+' . $i . 'day'));
            //$labelsS .= '"' . $date . '",';
        }

        // Recover 5 arts more see
        $sql = "SELECT exposer.nombre_vues, oeuvre.code_oeuvre, oeuvre.titre_oeuvre
                FROM oeuvre
                INNER JOIN exposer ON oeuvre.code_oeuvre = exposer.code_oeuvre
                WHERE code_expo = 1
                ORDER BY exposer.nombre_vues DESC
                LIMIT 5";

        // DEBUG : $res contient bien 5 objets
        $res = connecMySQL2($sql);

        // View by art by date
        $code = "";
        $datasets = [];


        while($oeuvre = mysqli_fetch_assoc($res)){
            //echo $oeuvre["code_oeuvre"]." <br>";

            $code = $oeuvre['code_oeuvre'];  

            $array =[];
            //$dataVues = "";

            foreach ($labels as $date) {
                $sql = "SELECT COUNT(vue.code_vue) as nbVues, vue.code_oeuvre, vue.date_vue
                FROM vue
                WHERE vue.code_oeuvre = $code
                GROUP BY vue.date_vue
                HAVING date_vue = date('$date')";
        
//echo '<br>'.$sql .'<br>';
                $result = connecMySQL2($sql);

                $tbl =[];
                $tbl["label"] = $oeuvre['titre_oeuvre'];
                //$titre = $oeuvre['titre_oeuvre'];
 
                $array[$date] = 0;
                while($vues = mysqli_fetch_assoc($result)){
               //     echo $vues['date_vue'];
                    $array[$date] = $vues['nbVues'];
                }

            }

                foreach($array as $d){
                    $tbl["data"][] = $d;
                    //$dataVues .=  '"' . $d . '",';
                }
                $datasets[] = $tbl;

                //$datasets .= '{labels:"'. $titre .'",data:['.$dataVues.']},';
        }
        $data = [];
        $data['labels']= $labels;
        $data['datasets']= $datasets;
        //$data = '{labels:['.$labelsS .'],datasets:['. $datasets.']}';
             
        //echo $data;
                        
/*
        print('<pre> ');
        print_r($datasets);
        print('</pre>');
  */
        echo json_encode($data) ;

    } 
  