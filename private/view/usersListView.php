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
         <th>
            <button type="button" id="add" class="btn_action">
                <i class="fas fa-plus"></i>
            </button>
         </th>
         <th>Ouvrir</th>
         <th>Identifiant</th>
         <th>Mot de passe</th>
         <th>Admin</th>
         <th></th>
     </thead>
     <tbody>
         <?php
         $usersView = new UserModel();
         $user = $usersView -> getUserAll();

         while( $row = $user->fetch()){ ?>
            <tr>
                <td>
                    <button class="btn_action" id="edit" name="<?= $row['code_user'] ?>" onclick="editUser(this)">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                </td>
                <td>
                  <button class="btn_action" id="view" name="<?= $row['code_user'] ?>" onclick="getUser(this)">
                  <i class="fas fa-eye"></i>
                </button>
                </td>
                <td><?= $row['identifiant'] ?></td>
                <td><?= $row['mot_pass'] ?></td>
                <td><?= $row['admin'] ?></td>
                <td>
                    <button class="btn_sup"><i class="fas fa-trash-alt" onclick="delUser(this)" name="<?= $row['code_user'] ?>" id="del"></i></button>
                </td>
            </tr>
    <?php } ?>
     </tbody>
    </table>

    <!-- Modal pour nouvel enregistrement boutton add-->
    <!-- The Modal -->
    <div id="modalAdd" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="MAC" class="close">&times;</span>
            <form action='index.php?add=addUser&page=UsersList' method="post">
                <div class="form-group">
                    <label for="user">Identifiant</label>
                    <input type="text" id="user" name="user" class="form-control" placeholder="Identifiant">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="AAAA-MM-JJ">
                    <label for="admin">Admin</label>
                    <select name="admin" id="admin">
                      <option value="0">Non</option>
                      <option value="1">Oui</option>
                    </select>
                    <button type="button" class="btn btn-primary">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Trigger/Open The Modal -->
    <!-- Modal pour modifier enregistrement -->
    <!-- The Modal -->
    <div id="modalEdit" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="MEC" class="close">&times;</span>
            <form action='index.php?action=edit&page=UsersList' method="post">
                <div class="form-group">
                    <label for="user">Identifiant</label>
                    <input type="text" id="user" name="user" class="form-control" placeholder="Identifiant">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="AAAA-MM-JJ">
                    <label for="admin">Admin</label>
                    <select name="admin" id="admin">
                      <option value="0">Non</option>
                      <option value="1">Oui</option>
                    </select>
                    <button type="button" class="btn btn-primary">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Trigger/Open The Modal -->
    <!-- Modal pour visualiser enregistrement -->

    <!-- The Modal -->
    <div id="modalView" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="MVC" class="close">&times;</span>
            <form action='index.php?action=view&page=UsersList' method="post">
                <div class="form-group">
                    <label for="user">Identifiant</label>
                    <input type="text" id="user" name="user" class="form-control" placeholder="Identifiant">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="AAAA-MM-JJ">
                    <label for="admin">Admin</label>
                    <select name="admin" id="admin">
                      <option value="0">Non</option>
                      <option value="1">Oui</option>
                    </select>
                    <button type="button" class="btn btn-primary">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
<?php
    $content = ob_get_clean();

    require('view/template/base.php');
?>