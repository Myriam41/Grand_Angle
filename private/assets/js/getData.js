function getAjax(){
  $.ajax({
    url: 'controller/getController.php',
    method: "POST",
    dataType : "json",
    data: data,

    success: function(response){
        let ret = response;

        if(action == 'edit'){
          modalEdit.style.display = "block";
        }
        if(action == 'view'){
          modalView.style.display = "block";
        }
        write(ret);
    }
  });
}

function write(ret){
  var n = '';
   if(action == 'edit'){
    n = 1;
   }
   if(action == 'view'){
    n = 2;
   }
   
  if(data['open'] == 'getExpo'){
    document.getElementById("code" + n).value = ret['code'];
    document.getElementById("title" + n).value = ret['titre'];
    document.getElementById("debut" + n).value = ret['debut'];
    document.getElementById("fin" + n).value = ret['fin'];

  }
}


function getArt(elet){
  action = elet.id
  id = elet.name;
  data = {
    'open': 'getArt',
    'id': id
  };
    getAjax();
}

function getArtist(elet){
  action = elet.id
  id = elet.name;
  data = {
    'open': 'getArtist',
    'id': id
  };
    getAjax();
}

function getExpo(elet){
  action = elet.id
  id = elet.name;
  data = {
    'open': 'getExpo',
    'id': id
  };
  getAjax();
}

function getUser(elet){
  action = elet.id
  id = elet.name;
  data = {
    'open': 'getUser',
    'id': id
  };
    getAjax();
}
