$(document).ready( function(){
    var $expo = 1 ;

    $.ajax({
        url: "model/statsModel.php",
        type: "get",
        data: {
            id: $expo,
        },
        success: function(art_graph){

            //$("#artGraph").html(art_graph);
            try {
                JSON.parse(art_graph);
            }
            catch (error) {
                console.log('Error parsing JSON:', error, data);
            }
            var data = jQuery.parseJSON(art_graph);
            
            console.log(data);
            var ctx = $("#graph");
            var conf ="";
            conf =  {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                      legend: {
                        position: 'top',
                      },
                    }
                },
            };

            var artGraph = new Chart(ctx, conf);
            console.log(data);
        }

    });

});


