<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> <?= $title ?> </title>
        
        <!-- CDN BOOTSTRAP -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css">  -->
        
        <!-- CDN FONT-AWESOME (icônes) 	-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- CDN GOOGLE FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
		<link href="'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap'" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    	<script>
        	$(document).ready( function () {
            	$('#example').DataTable();
        	} );
    	</script>
		<!-- CDN Material icons        -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

        <!-- CSS PERSO -->
        <link rel="stylesheet" href="assets/css/style.css">

		<!-- SCRIPT -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
		<script>
        	$(document).ready( function () {
            	$('#example').DataTable();
        	} );
    	</script>

		<!-- TITLE -->
		<title><?= $title ?> - Grand Angle</title>
</head>
                
    </head>
    
    <body>
		<header class="right">
				<?php include('header.php') ?>
		</header>

		<div class="container">
			<aside>
				<?php include('aside.php') ?>
			</aside>

			<?= $content ?>
		</div>

		<!-- JS -->
		<script src="vendor/node_modules/chart.js/dist/chart.js"></script>
		<script src="assets/js/app.js"></script>
    </body>
</html>