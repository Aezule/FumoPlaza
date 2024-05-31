<?php
session_start();
include '../Model/UserClasse.php';
include '../Model/PanierClasse.php';
include '../Model/ProduitClasse.php';
include '../Model/bdd-pdo.php';
include '../Model/CommandeClasse.php';

$Compte = unserialize($_SESSION['User']);
$Panier = Panier::GetCommandeByClient($Compte->getIdCompte());
$produitsPanier = [];
foreach ($Panier as $panierItem) {
    $idProduit = $panierItem->getIdProduit();
    $produit = Produit::getProduitById($idProduit);
    if ($produit !== null) {
        $produitsPanier[] = ['idProduit' => $idProduit];
    }
}
if ($produit !== null) {
$Resultat = Commande::SetToCommande($Compte->getIdCompte(),$produitsPanier);
}
header("Location: ../Vue/Payement/Achat.php?message=$Resultat");

