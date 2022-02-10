function editArt(elet){
  var idArt = elet.name;
  location = 'index.php?edit=editArt&id='+idArt;

}

function editArtist(elet){
  var idArtist = elet.id;
  location = 'index.php?edit=editArtist&id='+idArtist;
}

function editExpo(elet){
  var idExpo = elet.id;
  location = 'index.php?edit=editExpo&id='+idExpo;
}

function editUser(elet){
  var idUser = elet.id;
  location = 'index.php?edit=editUser&id='+idUser;
}

