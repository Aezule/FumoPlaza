<?php

include 'bdd-pdo.php';

class Categorie {
    private $libelle;

    // Constructeur
    public function __construct( $libelle) {
        $this->libelle = $libelle;
    }

    public function GetCategorieById($idCateg) {
        $cnx = getBddConnexion();
        // écrire la requête sql de sélection des catégories
        $sql = 'select libelle';
        $sql .= ' from produit';
        $sql .= ' where idCateg = :critere;';
        $critere = $idCateg;
    
        $result = $cnx->prepare($sql);
        // lie le paramètre et la variable contenant la valeur
        $result->bindParam('critere', $critere, PDO::PARAM_STR);
        // exécute la requête
        $result->execute();
    
        // nb lignes résultat
        $nb_lignes = $result->rowCount();   
        // définit le format de lecture "tableau associatif"
        $result->setFetchMode(PDO::FETCH_ASSOC);

;
        while($uneLigne = $result->fetch()){
            $produit = new Categorie($uneLigne['libelle']);
        }
        
        return $produit;
    }    
    // Getters et setters
    public function getLibelle() {
        return $this->libelle;
    }   

    

}