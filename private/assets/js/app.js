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

// Gestion des modales
// Get the modal
var modalAdd = document.getElementById("modalAdd");
var modalEdit = document.getElementById("modalEdit");
var modalView = document.getElementById("modalView");

// Get the button that opens the modal
var btnAdd = document.getElementById("add");
var btnEdit = document.getElementById("edit");
var btnView = document.getElementById("view");

// Get the <span> element that closes the modal
var spanA = document.getElementById("MAC");
var spanE = document.getElementById("MEC");
var spanV= document.getElementById("MVC");

// When the user clicks on the button, open the modal
btnAdd.onclick = function() {
  modalAdd.style.display = "block";
}
btnEdit.onclick = function() {
  modalEdit.style.display = "block";
}
btnView.onclick = function() {
  modalView.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanA.onclick = function() {
  modalAdd.style.display = "none";
  console.log(spanA);
}
spanE.onclick = function() {
  modalEdit.style.display = "none";
}

spanV.onclick = function() {
  modalView.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalAdd) {
    modalAdd.style.display = "none";
  }
  if (event.target == modalEdit) {
    modalEdit.style.display = "none";
  }
  if (event.target == modalView) {
    modalView.style.display = "none";
  }
}



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


