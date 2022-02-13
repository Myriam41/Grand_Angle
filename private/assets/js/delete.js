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
    location = 'index.php?delete=delArt&page=artList&id='+idArt;
  }
}

function delArtist(elet){
  var idArtist = elet.name;
  if(delConfirm()){
    location = 'index.php?delete=delArtist&page=artistList&id='+idArtist;
  }
}

function delExpo(elet){
  var idExpo = elet.name;
  if(delConfirm()){
    location = 'index.php?delete=delExpo&page=exposList&id='+idExpo;
  }
}

function delUser(elet){
  var idUser = elet.name;
  if(delConfirm()){
    location = 'index.php?delete=delUser&usersList&id='+idUser;
  }
}

