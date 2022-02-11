// pour permettre l'ouverture de la modale, 
// la récupération des données doit se réaliser 
// sans rafraichissement de la page

  function getArt(){
 
  }
  
  function getArtist(){
 
  }
  
  function getExpo(elet){
    id = elet.name;
    alert(id);

    $.ajax({
      url: 'controller/getController.php',
      data: {
            open: getExpo,
            id: id
      },
      success: function(ret){
          try {
              JSON.parse(ret);
          }
          catch (error) {
              console.log('Error parsing JSON:', error, data);
          }
          var data = jQuery.parseJSON(ret);
          alert(data);
      }

  });
  }
  
  function getUser(elet){
    var idUser = elet.id;

  }
