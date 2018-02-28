<?php
require('fpdf/fpdf.php');
include('connect.php');

//Sélection de la police
$pdf= new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetCreator('PHP');
$pdf->SetAuthor('William pour A.B.Vins\'Amour');
$pdf->SetSubject('Facture');
$str = utf8_decode(' numéro '.$id);
$pdf->SetTitle($choix);
$pdf->SetFont('Arial','','12');
//sigle de la société
$pdf->Image('images/logo-comfordev.jpg','24','20','43','40','jpg');

//Société et ses coordonnées
$pdf->Text(70,'30',$varnom);
$pdf->Text('70','36',$varadresse1);
$pdf->Text('70','42',$varadresse2);
$pdf->Text('70','48',$vartelephone);


//coordonnées du client
$pdf->Text(140,'76',utf8_decode($donnees3['nom'].' '.$donnees3['prenom']));
$pdf->Text(140,'82',utf8_decode($donnees3['adresse']));
$pdf->Text(140,'88',utf8_decode($donnees3['email']));
$pdf->Text(140,'94',utf8_decode($donnees3['gsm']));



//type de document
$pdf->Text(24,'119',$choix.':'.$id);

//date
// On calcule le timestamp correspondant à la date entrée
    $timestamp = time();
    // On récupère le numéro du jour correspondant au timestamp (0, 1, 2, 3...)
    $numero_jour = date('w', $timestamp);
    $numero_mois = date('F', $timestamp);
    
    // On crée un array pour numéroter les jours (0 => Dimanche, 1 => Lundi...) et les mois en fonctionde leur nom anglais
    $jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $mois = array('January' => "Janvier", 'February' => 'Février', 'March' => 'Mars', 'April' => 'Avril', 'May' => 'Mai', 'June' => "Juin", 'July' => "Juillet", 'August' => "Août", 'September' => 'Septembre', 'October' => 'Octobre', 'November' => "Novembre", 'December' => "Décembre");
    // On récupère le nom du jour et du mois en français grâce aux array(s) qu'on vient de créer
    $jour = $jours[$numero_jour];
    $moiss = $mois[$numero_mois];

    
    // Puis on affiche le résultat
$date = 'Le '.$jour.' '.date('d').' '.$moiss.' '.date('Y');

$str = utf8_decode($date);
$pdf->Text(140,'119',$str);

$pdf->SetXY(24,125);
$str = utf8_decode('Produit');
$pdf->SetFont('Arial','B','12');
$pdf->Cell(54,10,$str,1,0,'C');
$pdf->Cell(27,10,"Prix Unitaire",1,0,'C');
$pdf->Cell(27,10,utf8_decode("Quantité"),1,0,'C');
$pdf->Cell(27,10,utf8_decode("Prix"),1,2,'C');
$pdf->SetFont('Arial','','12');

$ret = 'SELECT * FROM devis_produit WHERE id_devis = '.$id;
$do = mysqli_query($base,$ret);

$i3 = 1;
while($don = mysqli_fetch_array($do)){

$pdf->SetXY(24,128+$i3*7);
$pdf->Cell(54,7,utf8_decode($don['nom_produit']),1,0);
$pdf->Cell(27,7,utf8_decode($don['prix_produit']. ' FCFA'),1,0);
$pdf->Cell(27,7,utf8_decode($don['quantit']),1,0);
$pdf->Cell(27,7,utf8_decode($don['prixtotale_produit'] . ' FCFA'),1,0);
    $i3++;
}


/*
for($i = $i3 ; $i <21 ; $i++)
{
$pdf->SetXY(24,78+$i*7);
$pdf->Cell(54,7,'',1,0,'C');
$pdf->Cell(27,7,"",1,0,'C');
$pdf->Cell(27,7,utf8_decode(""),1,0,'C');
$pdf->Cell(27,7,utf8_decode(""),1,0,'C');
$pdf->Cell(27,7,utf8_decode(""),1,2,'C');
}
*/


//$pdf->SetFont('Arial','B','14');

$pdf->Text(120,135+$i3*7,utf8_decode('TOTAL HTVA: '.$donnees4['totale'].' FCFA'));
$pdf->Text(120,140+$i3*7,utf8_decode('TVA: 10%'));
$pdf->Text(120,145+$i3*7,utf8_decode('TOTAL TVAC: '.$donnees4['totale_tva'].' FCFA'));
$pdf->SetFont('Arial','','12');
$pdf->Output("pdf/".$choix.$id.".pdf","F");
echo "<a href=\"pdf/".$choix.$id.".pdf\">PDF DE LA ".$choix."</a>";
?>
