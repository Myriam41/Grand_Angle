$(document).ready( function(){

    //données pour le graph : tableau json

    const ctx = document.getElementById('artGraph');
    getData();
    console.log(retour);
    //alert(typeof(retour));
    mesdata = JSON.parse(retour);
    console.log(mesdata);
    const conf = {
        type: 'line',
        data: mesdata,
        options: {
            responsive: true,
            plugins: {
                legend: {
                position: 'top',
                },
            }
        }
    };

    const artGraph = new Chart(ctx, conf);

  
    // récupération de l'id de l'expo en cours d'affichage
    // récupération grâce à $_SESSION['expoAff']
    var $expo = 1 ;

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

                   retour = this.responseText;
                   //console.log(retour);
                } else{
                    // Cas où une erreur apparait this.status <> 200
                    document.getElementById("artGraph").innerHTML = 'erreur : impossibilité d\'afficher le graphique' + this.responseText;
                }
            } else{
                document.getElementById("artGraph").innerHTML =  this.readyState;
            }
        };

        // Appel en synchrone pour attendre d'avoir la réponse
        xhttpExpo.open("GET", "http://localhost/Grand_Angle/private/model/statsModel.php?id=" + $expo, false);
        xhttpExpo.send();
    }
});


