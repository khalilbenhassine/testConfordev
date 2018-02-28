<?php

$base= mysqli_connect('127.0.0.1', "root", "", "test1");
 
/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
$varnom = 'Comfordev'; //votre nom de societe
$varadresse1 = 'Cocody Angre 9eme Tranche Carrefour CNPS en haut'; //Votre premiere ligne d'adresse
$varadresse2 = 'Abidjan, Cote dIvoire'; //votre seconde ligne d'adresse
$vartelephone = '+225 22 49 95 01'; //votre numero de telephone
$varmail = 'info@comfordev.com'; // votre adresse e-mail
?>
