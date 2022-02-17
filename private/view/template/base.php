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
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
		<link href="'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap'" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

		<!-- CDN Material icons        -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

		<!--Datatable -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

        <!-- CSS PERSO -->
        <link rel="stylesheet" href="assets/css/style.css">

		<!-- TITLE -->
		<title><?= $title ?> - Grand Angle</title>
	</head>
    
    <body>
		<header>
				<?php include('header.php') ?>
		</header>

		<div class="corps">
			<aside id="nav">
				<?php include('aside.php') ?>
			</aside>
			<main>
				<?= $content ?>
			</main>
		</div>


		<!-- JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<!-- Graphs -->
		<script src="vendor/node_modules/chart.js/dist/chart.js"></script>
		<!-- Tableaux -->		
		<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d61d84b18bd3bda',m:'DibEAyWxF1uIQSCsAtEtwgvDO80Px5e.kubcBZgUWfs-1643620625-0-AaCStdCXDGxx4jAPlblOBhdO3mumKbJx/6QfpV4mG3jVB/T0ZSorJSF+tAF4QjX1Kn7By2ODpTbJMFAi0oaZMRJTu8dY4GsXhPwtACKLVhfVZNr/LminCvEczshg/QqXy1Yu9OJCrhGtrgs/VIo/jtlJkbrbS6sUdF8oumPMifRCnyzzMplAUcs27L1nB/7+8A==',s:[0xcb98f28c52,0x23fa878644],}})();</script>
		<!-- Icones -->
		<!-- <script async src='/cdn-cgi/bm/cv/669835187/api.js'></script> -->
		<script src="assets/js/getData.js"></script>
		<script src="assets/js/delete.js"></script>
		<script src="assets/js/open.js"></script>
		<script src="assets/js/app.js"></script>
		<!-- QRCode -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
		<script src="assets/js/qrcode.js"></script>
	</body>
</html>