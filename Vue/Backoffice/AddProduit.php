<?php
session_start();
include '../../Model/bdd-pdo.php';
include '../../Model/ProduitClasse.php';


$Ref_interne = $_POST['Ref_interne'];
$Libelle = $_POST['Libelle'];
$Resume_court = $_POST['Resume_court'];
$Description = $_POST['Description'];
$Path_photo = $_POST['Path_photo'];
$Prix = $_POST['Prix'];
$Qte = $_POST['Qte'];
$idCateg = $_POST['idCateg'];

$Resultat = Produit::AjouterProduit($Ref_interne, $Libelle, $Resume_court, $Description, $Path_photo, $Prix, $Qte, $idCateg);

header("Location: ./backoffice.php?message=$Resultat");


?>