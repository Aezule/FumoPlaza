<?php
session_start();
include '../../Model/bdd-pdo.php';
include '../../Model/ProduitClasse.php';

$IdProduit = $_GET['idProduit'];

$Resultat = Produit::SupprimerProduit($IdProduit);

header("Location: ./backoffice.php?message=$Resultat");


?>