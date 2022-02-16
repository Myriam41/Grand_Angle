function getAjax(){
  $.ajax({
    url: 'controller/getController.php',
    method: "POST",
    dataType : "json",
    data: data,
    async : false,

    success: function(response){
        let ret = response;

        if(action == 'edit'){
          modalEdit.style.display = "block";
        }
        if(action == 'view'){
          modalView.style.display = "block";
        }
        write(ret);
    },
    error: function(){
      alert('ouverture ne peut se faire');
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

  if(data['open'] == 'getArtist'){
    document.getElementById("code" + n).value = ret['code'];
    document.getElementById("name" + n).value = ret['nom'];
    document.getElementById("firstname" + n).value = ret['prenom'];
    document.getElementById("surname" + n).value = ret['nom_usuel'];
    document.getElementById("tel" + n).value = ret['tel'];
    document.getElementById("mail" + n).value = ret['mail'];
    document.getElementById("adress" + n).value = ret['adresse'];
    document.getElementById("cp" + n).value = ret['cp'];
    document.getElementById("city" + n).value = ret['ville'];
    document.getElementById("country" + n).value = ret['pays'];
    document.getElementById("biofr" + n).value = ret['biographiefr'];
    document.getElementById("bioen" + n).value = ret['biographieen'];
    document.getElementById("bioch" + n).value = ret['biographiech'];
    document.getElementById("bioru" + n).value = ret['biographieru'];
    document.getElementById("biode" + n).value = ret['biographiede'];
  }

  if(date['open'] == 'getUser'){
    document.getElementById("code" + n).value = ret['code_user'];
    document.getElementById("user" + n).value = ret['identifiant'];
    document.getElementById("password" + n).value = ret['mot_pass'];
    document.getElementById("admin" + n).value = ret['admin'];
  }

  if(date['open'] == 'getArt'){
    document.getElementById("code" +n).value = ret['code'];
    document.getElementById("title" +n).value = ret['code'];
    document.getElementById("height" +n).value = ret['code'];
    document.getElementById("epaisseur" +n).value = ret['code'];
    document.getElementById("width" +n).value = ret['code'];
    document.getElementById("typeArt" +n).value = ret['code'];
    document.getElementById("artist" +n).value = ret['code'];
    document.getElementById("descFR" +n).value = ret['code'];
    document.getElementById("descEN" +n).value = ret['code'];
    document.getElementById("descCH" +n).value = ret['code'];
    document.getElementById("descDE" +n).value = ret['code'];
    document.getElementById("descRU" +n).value = ret['code'];
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
  console.log(action);
  console.log(id);
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
