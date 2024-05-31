<?php 
session_start();
$id = $_GET["id"];
include '../../Model/PanierClasse.php';
include '../../Model/UserClasse.php';
include '../../Model/bdd-pdo.php';
$Compte = unserialize($_SESSION['User']);

if(isset($_GET["id"]) && !empty($_GET["id"]))
{
    $idProduit = $_GET["id"];

    $Resultat = Panier::AddToPanier($id,$Compte->getIdCompte());
    if($Resultat != "Compte créé"){
        header("Location: ./Produit.php?id=$id&message=$Resultat");
    }else{
        header("Location: ./Produit.php?id=$id&message=$Resultat");
    }
}




?>