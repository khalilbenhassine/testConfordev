<?php
include('connect.php');


?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>COMFORDEV</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>
<header id="header">
				<h1><a href="index.php">DEVISDEV</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="viewfacture.php">Historique</a></li>
		
					</ul>
				</nav>
			</header>

<form action="rechercher.php" method="Post">
    <div class="6u 12u$(4)">
        <input type="text" name="requete" size="5"> </div>  <br />
<input type="submit" class="button alt small" value="recherche">
</form>
<h2 align="center">choisissez votre client</h2>
<form method='POST' action='devis.php'>

<?php
$query = ('SELECT * FROM client');
$reponce = mysqli_query($base,$query);

while($donnees = mysqli_fetch_array($reponce))
{
?>

<div class="4u 12u$(3)">
<input type='radio' id="<?php echo $donnees['id']; ?>" name='client'  value ='<?php echo $donnees['id']; ?>'>
    <label for="<?php echo $donnees['id']; ?>"><?php echo $donnees['nom']; ?> <?php echo $donnees['prenom']; ?></label>
    </div>
    
    <br />
<?php } ?>
       <br />   <br />   <br />   <br />   <br />
<div align="center">
 <input  type='submit' value='Envoyer'> 
</div>
</form>
         <br />   <br />   <br />   <br />   <br />   <br />   <br />   <br />   <br />   <br />   <br />   <br />  
        <!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>DEVISDEV</h3>
								<ul class="unstyled">
									<li>Moteur de recherche sur les clients</li>
									<li>Création de devis</li>
									<li>Création de factures automatisée à partir des devis</li>
									<li>Création de bons de livraison et avoirs</li>
									
								</ul>
							</section>
							
						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Khalil Ben Hassine. All rights reserved.</li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

    </body>
</html>