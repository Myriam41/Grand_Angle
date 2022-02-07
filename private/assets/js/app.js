$(document).ready( function(){
  // DASHBOARD
  const sideMenu = document.querySelector('aside');
  const menuBtn = document.querySelector('#menu-btn');
  const closeBtn = document.querySelector('#close-btn');
  // Toggle
  const themeToggler = document.querySelector('.theme-toggler');

  // Ouverture menu
  menuBtn.addEventListener('click', () => {
      sideMenu.style.display = 'block';
  })

  // Fermeture menu
  closeBtn.addEventListener('click', () => {
      sideMenu.style.display = 'none';
  })

  // Changement de thème
  themeToggler.addEventListener('click', () =>{
      document.body.classList.toggle('dark-theme-variables');

      themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
      themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
  })


  // Tableaux
  $('#example').DataTable();

  // GRAPH
 /*
    const ctx2 = document.getElementById('myChart');
    const myChart = new Chart(ctx2, {
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
*/
});


