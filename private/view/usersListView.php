<?php
    @session_start();
    // include_once '../class/DbPostgre.php';
    // si la session existe pas soit si l'on est pas connecté on redirige
     if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
     }
    
    $title = "";
    $titlePage = "";

    ob_start();
    // require '../class/DbPostgre.php';
?>
    <h2>Liste des expositions</h2> 
    <table id="example" class="display" style="width:100%">
     <thead>
         <th></th>
         <th>Id</th>
         <th>Identifiant</th>
         <th>Mot de passe</th>
         <th>Admin</th>
         <th></th>
     </thead>
     <tbody>
         <?php
         $exposView = new UserModel();
         $expo = $exposView -> getUserAll();

         while( $row = $expo->fetch()){ ?>
            <tr>
                <td>
                    <button class="btn_action"><i class="fas fa-pencil-alt"></i></button>
                </td>
                <td  id="<?= $row['code_user'] ?>" onclick="openUser(this)"><?= $row['code_user'] ?></td>
                <td><?= $row['identifiant'] ?></td>
                <td><?= $row['mot_pass'] ?></td>
                <td><?= $row['admin'] ?></td>
                <td>
                    <button class="btn_sup"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
    <?php } ?>
     </tbody>
    </table>
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>

<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Ajouter un utilisateur</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form method="post" action="index.php?add=addUser&page=usersList">
        <label for="user">Utilisateur</label>
        <input type="text" id="user" name="user" for="user">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" for="password">
        <label for="admin">Admin :</label>
        <select name="admin" id="admin">
            <optgroup label="Admin">
                <option value="1">Oui</option>
                <option value="0" selected>Non</option>
            </optgroup>
        </select>
        <input id="addUser" type="submit" value="Ok">
    </form>

    <?php
    if(isset($_POST['addUser'])){ // Je récupère mon input validation
        $user = isset($_POST['user']);
        $password = isset($_POST['password']);
        $admin = isset($_POST['admin']);

        if(!empty($user) && !empty($password) && isset($admin)){ // Je vérifie que mes champs ne soient pas vide

          $usersView = new UserModel();
          $user = $usersView->addUser();
        }
    }

    ?>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<?php
    $content = ob_get_clean();

    require('view/template/base.php');
?>