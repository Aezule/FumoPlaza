<?php


class Panier {
    private $idClient;

    private $idProduit;
   
    // Constructeur
    public function __construct($idClient, $idProduit) {
        $this->idClient = $idClient;
        $this->idProduit = $idProduit;
        
    }



    
    // Méthode pour récupérer les produits par catégorie
    public static function GetCommandeByClient($idClient) {
        $cnx = getBddConnexion();
        // écrire la requête sql de sélection des produits
        $sql = 'select idCompte, idProduit';
        $sql .= ' from memoriser_panier';
        $sql .= ' where idCompte = :critere;';
        $critere = $idClient;
    
        $result = $cnx->prepare($sql);
        // lie le paramètre et la variable contenant la valeur
        $result->bindParam('critere', $critere, PDO::PARAM_STR);
        // exécute la requête
        $result->execute();
    
        // nb lignes résultat
        $nb_lignes = $result->rowCount();   
        // définit le format de lecture "tableau associatif"
        $result->setFetchMode(PDO::FETCH_ASSOC);

        
        $Panier = [];
        while($uneLigne = $result->fetch()){
            $commande = new Panier($uneLigne['idCompte'], $uneLigne['idProduit']);
            $Panier[] = $commande;
        }
        
        return $Panier;
    }


    public static function AddToPanier($idProduit,$idCompte){
        $cnx = getBddConnexion();
        $messageResultat = "";


        $sql = 'SELECT idProduit,idCompte FROM memoriser_panier WHERE idCompte = :critere and idProduit = :critere2;';
        $result = $cnx->prepare($sql);
        $result->bindParam('critere', $idCompte, PDO::PARAM_STR);
        $result->bindParam('critere2', $idProduit, PDO::PARAM_STR);
        $result->execute();
        $existe = $result->fetch(PDO::FETCH_ASSOC);

        if(!$existe){
            $sql = 'INSERT INTO memoriser_panier (idCompte, idProduit) VALUES (:idCompte, :idProduit)';
            $result = $cnx->prepare($sql);
            $result->bindParam('idCompte', $idCompte, PDO::PARAM_STR);
            $result->bindParam('idProduit', $idProduit, PDO::PARAM_STR);
            $result->execute();

            $messageResultat = "Votre commande a bien été ajoutée au panier";
        }else{
            $messageResultat = "Vous ne pouvez pas commander deux fois le même produit";
        }
       
        return $messageResultat;
    }


    public static function GetPrixPanier($idCompte){
        $cnx = getBddConnexion();
        // écrire la requête sql de sélection des produits
        $sql = 'select SUM(prix) as "PrixTotal"';
        $sql .= ' from produit';
        $sql .= ' join memoriser_panier on produit.idProduit = memoriser_panier.idProduit';
        $sql .= ' where idCompte = :critere;';
        $critere = $idCompte;
    
        $result = $cnx->prepare($sql);
        // lie le paramètre et la variable contenant la valeur
        $result->bindParam('critere', $critere, PDO::PARAM_STR);
        // exécute la requête
        $result->execute();
    
        // nb lignes résultat
        $nb_lignes = $result->rowCount();   
        // définit le format de lecture "tableau associatif"
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $prix = 0;
        if($uneLigne = $result->fetch()){
            $prix = $uneLigne['PrixTotal'];
        }
        
        return $prix;
    }

    // Getters et setters
    public function getIdClient() {
        return $this->idClient;
    }
    public function getIdProduit() {
        return $this->idProduit;
    }
 
   

}

?>