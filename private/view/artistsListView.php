<?php
    @session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
     if(!isset($_SESSION['user'])){
         header('Location: ../index.php');
         die();
     }
     $title = "";
     $titlePage = "";
 
     ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CDN FONT-AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        
        <!-- CDN Material icons-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
        
        <!-- STYLESHEET -->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!-- TITLE -->
        <title>Artistes - Grand Angle</title>
    </head>
    
    <body>
        <div class="container">
            <main>
                <h1>Artistes</h1>
                <div class="date">
                    <input type="date">
                </div>
                <div class="all-artists">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Nom usuel</th>
                                <th>Téléphone</th>
                                <th>Mail</th>
                                <th>Décédé</th>
                                <th>Adresse</th>
                                <th>CP</th>
                                <th>Ville</th>
                                <th>Pays</th>
                                <th>Biographie</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="new-artists"><a href="#"><span class="material-icons-sharp">edit</span></a></td>
                                <td class="view-artists"><a href="#"><span class="material-icons-sharp">visibility</span></a></td>
                                <td>Mérad</td>
                                <td>Kad</td>
                                <td>Kadou</td>
                                <td></td>
                                <td>kadmérad@kadou.fr</td>
                                <td>Non</td>
                                <td>18 rue des chtis</td>
                                <td>75789</td>
                                <td>Chnord</td>
                                <td>France</td>
                                <td>.........</td>
                                <td class="delete-artists"><a href="#"><span class="material-icons-sharp">delete</span></a></td>
                            </tr>
                            <tr>
                                <td class="new-artists"><a href="#"><span class="material-icons-sharp">edit</span></a></td>
                                <td class="view-artists"><a href="#"><span class="material-icons-sharp">visibility</span></a></td>
                                <td>Mérad</td>
                                <td>Kad</td>
                                <td>Kadou</td>
                                <td></td>
                                <td>kadmérad@kadou.fr</td>
                                <td>Non</td>
                                <td>18 rue des chtis</td>
                                <td>75789</td>
                                <td>Chnord</td>
                                <td>France</td>
                                <td>.........</td>
                                <td class="delete-artists"><a href="#"><span class="material-icons-sharp">delete</span></a></td>
                            </tr>
                            <tr>
                                <td class="new-artists"><a href="#"><span class="material-icons-sharp">edit</span></a></td>
                                <td class="view-artists"><a href="#"><span class="material-icons-sharp">visibility</span></a></td>
                                <td>Mérad</td>
                                <td>Kad</td>
                                <td>Kadou</td>
                                <td></td>
                                <td>kadmérad@kadou.fr</td>
                                <td>Non</td>
                                <td>18 rue des chtis</td>
                                <td>75789</td>
                                <td>Chnord</td>
                                <td>France</td>
                                <td>.........</td>
                                <td class="delete-artists"><a href="#"><span class="material-icons-sharp">delete</span></a></td>
                            </tr>
                            <tr>
                               <td class="new-artists"><a href="#"><span class="material-icons-sharp">edit</span></a></td>
                                <td class="view-artists"><a href="#"><span class="material-icons-sharp">visibility</span></a></td>
                                <td>Mérad</td>
                                <td>Kad</td>
                                <td>Kadou</td>
                                <td></td>
                                <td>kadmérad@kadou.fr</td>
                                <td>Non</td>
                                <td>18 rue des chtis</td>
                                <td>75789</td>
                                <td>Chnord</td>
                                <td>France</td>
                                <td>.........</td>
                                <td class="delete-artists"><a href="#"><span class="material-icons-sharp">delete</span></a></td>
                            </tr>
                            <tr>
                                <td class="new-artists"><a href="#"><span class="material-icons-sharp">edit</span></a></td>
                                <td class="view-artists"><a href="#"><span class="material-icons-sharp">visibility</span></a></td>
                                <td>Mérad</td>
                                <td>Kad</td>
                                <td>Kadou</td>
                                <td></td>
                                <td>kadmérad@kadou.fr</td>
                                <td>Non</td>
                                <td>18 rue des chtis</td>
                                <td>75789</td>
                                <td>Chnord</td>
                                <td>France</td>
                                <td>.........</td>
                                <td class="delete-artists"><a href="#"><span class="material-icons-sharp">delete</span></a></td>
                            </tr>
                            <tr>
                                <td class="new-artists"><a href="#"><span class="material-icons-sharp">edit</span></a></td>
                                <td class="view-artists"><a href="#"><span class="material-icons-sharp">visibility</span></a></td>
                                <td>Mérad</td>
                                <td>Kad</td>
                                <td>Kadou</td>
                                <td></td>
                                <td>kadmérad@kadou.fr</td>
                                <td>Non</td>
                                <td>18 rue des chtis</td>
                                <td>75789</td>
                                <td>Chnord</td>
                                <td>France</td>
                                <td>.........</td>
                                <td class="delete-artists"><a href="#"><span class="material-icons-sharp">delete</span></a></td>
                            </tr>
                    </table>
                    <!-- <a href="#">Show All</a> -->
                </div>
            </main>
            <!-- FIN DU MAIN -->
            <div class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>
                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Bonjour, <b>Mathieu</b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="../img/261746878_453672526326290_2022088434576343659_n.jpg" alt="user_picture">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- <script src="js/orders.js"></script> -->
        <script src="assets/js/app.js"></script>
        <?php 
            $content = ob_get_clean();
            require('view/template/base.php');
        ?>
    </body>
</html>