<?php
include('connect.php');

?>
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

$idclient = $_POST['client'] ; 

$requete = "INSERT INTO `document`(`id`, `id_client`) VALUES (NULL,'$idclient');";
$result = mysqli_query($base , $requete);

?>



 <form method='GET' action='resultat.php'>
 <table border='1'>
  <tr>
  <td colspan='5'>
    <div class="12u$">
       <div class="select-wrapper">
 <select name="choix">
    <option value="FACTURE">DEVIS</option>
    <option value="BON DE LIVRISON">BON DE LIVRISON</option>
    <option value="AVOIRS">AVOIRS</option>

 </select>
        </div>
    </div>
  </td>
  </tr>
 <tr>
 <td>
<?php
$query = ('SELECT * FROM produit');
$reponce = mysqli_query($base,$query);
$i=1;
while($donnees = mysqli_fetch_array($reponce))
{
?>
    Produit: <input type="text" name="<?php echo 'nom'.$i ;?>" value="<?php echo $donnees['nom_produit']; ?>" readonly />
    prix en FCFA :<input type="text" name="<?php echo 'prix'.$i ;?>" value="<?php echo $donnees['prix_produit']; ?>" readonly />
    Quantité : <input type="number" name="<?php echo 'nombre'.$i ;?>">
 
<br />
<?php $i++; } ?>
 </td>
 </tr>
</table>
<input type='submit' value='Confirmer'></form>

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

