<html>
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





<?php
include('connect.php');
if(isset($_POST['requete']) && $_POST['requete'] != NULL) 
{
 
$requete = htmlspecialchars($_POST['requete']); 
$query = mysqli_query($base,"SELECT * FROM client WHERE nom = '$requete' ORDER BY id DESC") or die (mysql_error()); 
$nb_resultats = mysqli_num_rows($query); 
if($nb_resultats != 0) 
{

?>
<h3>choisissez votre client.</h3>

 <?php 
if($nb_resultats > 1) 
?>
<br/>
<form method='POST' action='devis.php'>

<?php
while($donnees = mysqli_fetch_array($query)) 
{
?>
<div class="4u 12u$(3)">
<input type='radio' id="<?php echo $donnees['id']; ?>" name='client'  value ='<?php echo $donnees['id']; ?>'>
    <label for="<?php echo $donnees['id']; ?>"><?php echo $donnees['nom']; ?> <?php echo $donnees['prenom']; ?></label>
    </div>
    
    <br />
    

<?php
} 
?>
<input type='submit' value='Envoyer'></form>
<br/>
<br/>
<a href="index.php">Faire une nouvelle recherche</a></p>
<?php
} 
else
{ 
?>
<h3>Pas de résultats</h3>
<p>Nous n'avons trouvé aucun résultat pour votre client "<?php echo $_POST['requete']; ?>". <a href="index.php">Réessayez</a> avec autre chose.</p>
<?php
}
mysqli_close($base); 
}

?>
    
       <br />
       <br />
       <br />
       <br />
       <br />
    
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