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
if(isset($_POST['requete']) && $_POST['requete'] != NULL) // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
{
 // on se connecte à MySQL. Je vous laisse remplacer les différentes informations pour adapter ce code à votre site.
$requete = htmlspecialchars($_POST['requete']); // on crée une variable $requete pour faciliter l'écriture de la requête SQL, mais aussi pour empêcher les éventuels malins qui utiliseraient du PHP ou du JS, avec la fonction htmlspecialchars().
$query = mysqli_query($base,"SELECT * FROM client WHERE prenom = '$requete' ORDER BY id DESC") or die (mysql_error()); // la requête, que vous devez maintenant comprendre ;)
$nb_resultats = mysqli_num_rows($query); // on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après
if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
{
// maintenant, on va afficher les résultats et la page qui les donne ainsi que leur nombre, avec un peu de code HTML pour faciliter la tâche.
?>
<h3>choisissez votre client.</h3>

 <?php 
if($nb_resultats > 1) 
?>
<br/>
<form method='POST' action='devis.php'>

<?php
while($donnees = mysqli_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>
<div class="4u 12u$(3)">
<input type='radio' id="<?php echo $donnees['id']; ?>" name='client'  value ='<?php echo $donnees['id']; ?>'>
    <label for="<?php echo $donnees['id']; ?>"><?php echo $donnees['nom']; ?> <?php echo $donnees['prenom']; ?></label>
    </div>
    
    <br />
    

<?php
} // fin de la boucle
?>
<input type='submit' value='Faire un devis'></form>
<br/>
<br/>
<a href="index.php">Faire une nouvelle recherche</a></p>
<?php
} // Fini d'afficher les résultats ! Maintenant, nous allons afficher l'éventuelle erreur en cas d'échec de recherche et le formulaire.
else
{ // de nouveau, un peu de HTML
?>
<h3>Pas de résultats</h3>
<p>Nous n'avons trouvé aucun résultat pour votre client "<?php echo $_POST['requete']; ?>". <a href="index.php">Réessayez</a> avec autre chose.</p>
<?php
}// Fini d'afficher l'erreur ^^
mysqli_close($base); // on ferme mysql, on n'en a plus besoin
}
else
{ // et voilà le formulaire, en HTML de nouveau !
?>
 <form action="rechercher.php" method="Post">
<input type="text" name="requete" size="10">
<input type="submit" value="Ok">
</form>
<?php
}
// et voilà, c'est fini !
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