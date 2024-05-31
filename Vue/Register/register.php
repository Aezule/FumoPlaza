<?php
session_start();
include '../../Model/bdd-pdo.php';


include '../../Model/UserClasse.php';

if(isset($_POST['Email']) && !empty($_POST['Email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['Nom']) && !empty($_POST['Nom']) && isset($_POST['Prenom']) && !empty($_POST['Prenom']))
{
    $email = $_POST['Email'];
    $mdp = $_POST['password'];
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];


    $Resultat = User::CreateAccount($email, $mdp, $nom, $prenom);

    if($Resultat != "Compte créé"){
        header("Location: ./inscription.php?message=$Resultat");
    }else{
        header("Location: ../Login/Connexion.php");
    }
}


?>