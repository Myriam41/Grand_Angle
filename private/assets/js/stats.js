$(document).ready( function(){

    //données pour le graph : tableau json
    $data = getData();

    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        
        data: $data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                position: 'top',
                },
            }
        },
    });
  
    // récupération de l'id de l'expo en cours d'affichage
    // récupération grâce à $_SESSION['expoAff']
    $expo = 1 ;

    /**
     * Requete AJAX pour récupérer les données du graph
     */
    function getData(){
        // Appel AJAX pour récupérer les dates expo
        var xhttpExpo = new XMLHttpRequest();
        xhttpExpo.onreadystatechange = function() {
            if (this.readyState == 4) {
                // Si réponse alors récupération des dates expo
                if(this.status == 200){
                    return JSON.parse(this.responseText);
                    
                } else{
                    // Cas où une erreur apparait this.status <> 200
                    document.getElementById("mychart").innerHTML = 'erreur : impossibilité d\'afficher le graphique' + this.responseText;
                }
            } else{
                document.getElementById("mychart").innerHTML = 'En attente de réponse';
            }
        };

        // Appel en synchrone pour attendre d'avoir la réponse
        xhttpExpo.open("GET", "http://localhost/Grand_Angle/private/model/statsModel.php?id=" + $expo, false);
        xhttpExpo.send();
    }
});


