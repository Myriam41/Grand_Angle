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
		<div class="container corps">
			<aside>
				<div class="top">
						<div class="logo">
							<img src="img/25623.png" alt="logo">
							<h2>Grand <span>Angle.</span></h2>
						</div>
						<div class="close" id="close-btn">
							<span class="material-icons-sharp">close</span>
						</div>
					</div>
					<div class="sidebar">
						<a href="#" class="active">
							<span class="material-icons-sharp">grid_view</span>
							<h3>Dashboard</h3>
						</a>
						<a href="#">
							<span class="material-icons-sharp">person_outline</span>
							<h3>Customers</h3>
						</a>
						<a href="#">
							<span class="material-icons-sharp">receipt_long</span>
							<h3>Orders</h3>
						</a>
						<a href="#">
							<span class="material-icons-sharp">insights</span>
							<h3>Analytics</h3>
						</a>
						<a href="#">
							<span class="material-icons-sharp">mail_outline</span>
							<h3>Messages</h3>
							<span class="message-count">26</span>
						</a>
						<a href="#">
							<span class="material-icons-sharp">inventory</span>
							<h3>Products</h3>
						</a>
						<a href="#">
							<span class="material-icons-sharp">report_gmailerrorred</span>
							<h3>Reports</h3>
						</a>
						<a href="#">
							<span class="material-icons-sharp">settings</span>
							<h3>Settings</h3>
						</a>
						<a href="#">
							<span class="material-icons-sharp">add</span>
							<h3>Add Product</h3>
						</a>
						<a href="#">
							<span class="material-icons-sharp">logout</span>
							<h3>Logout</h3>
						</a>
					</div>

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
					
			<main>
				<div id="top">
					<input type="search">
				</div>
				<?= $contentMain ?>
			</main>
			<div class="right">
				<?= $contentRight ?>
			</div>
		</div>

	
		<footer class="row">
			<div class="container">

			</div>
		</footer>

		<!-- JS -->
		<script src="private/vendor/node_modules/chart.js/dist/chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="private/assets/js/app.js"></script>

    </body>
</html>