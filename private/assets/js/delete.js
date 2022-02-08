function delConfirm(){
  var ret = confirm("Voulez vous vraiment supprimer cet enregistrement ?");
  if( ret == true ){
    return true;
  }else{
    return false;
  }
}

function delArt(elet){
  var idArt = elet.name;
  if(delConfirm()){
    location = 'index.php?delete=delArt&id='+idArt;
  }
}

function delArtist(elet){
  var idArtist = elet.id;
  window.open('index.php?page=artist&id='+ idArtist);
}

function delExpo(elet){
  var idExpo = elet.id;
  window.open('index.php?page=expo&id='+ idExpo);
}

function delUser(elet){
  var idUser = elet.id;
  window.open('index.php?page=user&id='+ idUser);
}

