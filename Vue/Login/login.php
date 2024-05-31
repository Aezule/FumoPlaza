<?php
session_start();

include '../../Model/bdd-pdo.php';

include '../../Model/UserClasse.php';

if(isset($_POST['Email']) && !empty($_POST['Email']) && isset($_POST['password']) && !empty($_POST['password'])){
    $email = $_POST['Email'];
    $mdp = $_POST['password'];

    $User = User::GetConnexion($email, $mdp);

    if($User != null){
        header("Location: ../..");
    }else{
        header("Location: ./Connexion.php");
    }
}


?>