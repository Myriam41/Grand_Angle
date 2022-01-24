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

            var data = jQuery.parseJSON(art_graph);

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
            console.log(art_graph);
            console.log(data);
                console.log(conf);
            var artGraph = new Chart(ctx, conf);
        }
    });
});


