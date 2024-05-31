<?php
session_start();
include '../../Model/bdd-pdo.php';
include '../../Model/UserClasse.php';
$NouvelleValeur = $_GET["new"];
$ValeurAChanger = $_GET["modif"];

$Compte = unserialize($_SESSION['User']);

$Resultat = User::ModifierAccount($NouvelleValeur,$Compte->getIdCompte(),$ValeurAChanger);
session_destroy();
header("Location: ../..")

?>