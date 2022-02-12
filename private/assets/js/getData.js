function getAjax(){
  $.ajax({
    url: 'controller/getController.php',
    method: "POST",
    dataType : "json",
    data: data,

    success: function(response){
        let data = JSON.stringify(response);
        console.log(data);

        if(action == 'edit'){
          modalEdit.style.display = "block";
        }
        if(action == 'view'){
          modalView.style.display = "block";
        }

    }
  });
}

function getArt(){
  action = elet.id
  id = elet.name;
  data = {
    'open': 'getArt',
    'id': id
  };
    getAjax();
}

function getArtist(){
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
  id = elet.name;
  data = {
    'open': 'getUser',
    'id': id
  };
    getAjax();
}
