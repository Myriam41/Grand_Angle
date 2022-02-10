function openArt(elet){
  var idArt = elet.name;
  window.open('index.php?page=artsList&id='+idArt);
  modal.style.display = "block";
}

function openArtist(elet){
  var idArtist = elet.name;
  window.open('index.php?page=artistsList&id='+ idArtist);

}

function openExpo(elet){
  modal.style.display = "block";
  var idExpo = elet.name;
  location = 'index.php?action=open&page=exposList&id='+idExpo;
}

function openUser(elet){
  var idUser = elet.name;
  window.open('index.php?page=usersList&id='+ idUser);
  modal.style.display = "block";
}

