$(document).ready( function(){
    var $expo = 1 ;

    $.ajax({
        url: "http://localhost/Grand_Angle/private/model/statsModel.php",
        type: "get",
        data: {
            id: $expo,
        },
        success: function(art_graph){

            //$("#artGraph").html(art_graph);
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
                console.log(conf);
            var artGraph = new Chart(ctx, conf);
        }
    });
});


