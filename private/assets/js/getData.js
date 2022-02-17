function getAjax(){
  $.ajax({
    url: 'controller/getController.php',
    method: "POST",
    dataType : "json",
    data: data,
    async : false,

    success: function(response){
        let ret = response;

        write(ret);

        if(action == 'edit'){
          modalEdit.style.display = "block";
        }
        if(action == 'view'){
          modalView.style.display = "block";
        }
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

  if(data['open'] == 'getUser'){
    document.getElementById("code" + n).value = ret['code_user'];
    document.getElementById("user" + n).value = ret['identifiant'];
    document.getElementById("password" + n).value = ret['mot_pass'];
    document.getElementById("admin" + n).value = ret['admin'];
  }

  if(data['open'] == 'getArt'){
    document.getElementById("code" + n).value = ret['code'];
    document.getElementById("title" + n).value = ret['titre'];
    document.getElementById("hauteur" + n).value = ret['hauteur'];
    document.getElementById("epaisseur" + n).value = ret['epaisseur'];
    document.getElementById("largeur" + n).value = ret['largeur'];
    //document.getElementById("typeArt" + n).value = ret['code'];
    document.getElementById("artist" + n).value = ret['nom'];
    document.getElementById("descFR" + n).value = ret['descriptionfr'];
    document.getElementById("descEN" + n).value = ret['descriptionen'];
    document.getElementById("descCH" + n).value = ret['descriptionch'];
    document.getElementById("descDE" + n).value = ret['descriptionde'];
    document.getElementById("descRU" + n).value = ret['descriptionru'];

    document.getElementById('qrcode' + n).innerHTML='';
    
    var href = '';
    href = "http://172.16.20.75/Grand_Angle/Grand_Angle/index.php?v="+ ret['code'];
    const size = 900;

    new QRCode(document.querySelector("#qrcode" + n), {
    text: href,
    width: size,
    height: size,

    colorDark: "#ffffff",
    colorLight: "#000000"
    });
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
