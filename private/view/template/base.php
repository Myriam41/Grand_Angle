<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> <?= $title ?> </title>
        
        <!-- CDN BOOTSTRAP -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css"> 
        
        <!-- CDN FONT-AWESOME (icônes) 	-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- CDN GOOGLE FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
		<link href="'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap'" rel="stylesheet">

		<!-- CDN Material icons-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
        
        <!-- CSS PERSO -->
        <link rel="stylesheet" href="private/assets/css/style.css">
                
    </head>
    
    <body>	
		<div class="container">
			<aside>
				<?php include('aside.php') ?>
				<!--
				<h2 ><?= $titlePage ?> </h2>
				<nav>
					<ul>
						<li><a href="#"><i class="fas fa-home"></i>Accueil</a></li>
						<li><a href="#"><i class="fas fa-theater-masks"></i>Expositions</a></li>
						<li><a href="#"><i class="fas fa-user-edit"></i>Artistes</a></li>
						<li><a href="#"><i class="fas fa-palette"></i>Oeuvres</a></li>
						<li><a href="#"><i class="fas fa-users"></i>Utilisateurs</a></li>
						<li><a href="#"><i class="fas fa-wifi"></i>Déconnection</a></li>
					</ul>
				</nav>
			-->
			</aside>
			<!--	
			<div id="top">
				<input type="search">
			</div>
-->
			<?= $content ?>
		</div>
	
		<footer class="row">
			<div class="container">

			</div>
		</footer>

		<!-- JS -->
		<script src="private/vendor/node_modules/chart.js/dist/chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="private/assets/js/app.js"></script>
		<script src="private/assets/js/orders.js"></script>

    </body>
</html>