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
  console.log(ret);
  console.log(data['open']);
  console.log(ret['titre']);
  if(data['open'] == 'getExpo'){

    document.getElementById("title").value = ret['titre'];
    document.getElementById("debut1").value = ret['debut'];
    document.getElementById("fin").value = ret['fin'];
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
