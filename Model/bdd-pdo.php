<?php 

/*
 * /bdd-pdo/bdd-pdo.php
 * code de connexion à la base de données 
 * 
 * @auteur: Dany :)
 * @date:03/2023
 */

 // définition des constante de connexion 

 const HOST = '127.0.0.1'; // adresse ip de l'hote 
 const PORT = '3307'; //port de connexion 
 const DBNAME = 'db_peluche';
 const CHARSET = 'utf8';
 const LOGIN = 'root';
 const MDP = '';

 function getBddConnexion(){
    $dsn = 'mysql:host='.HOST.';port='.PORT.';dbname='.DBNAME.';charset='.CHARSET;
   
    // se connecter a la base de données 
    $cnx = new PDO($dsn,LOGIN,MDP);
   

    return $cnx;
   }

?>
