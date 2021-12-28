$(document).ready( function(){
  
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
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
        },
        options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
            }
        },
    });

});


