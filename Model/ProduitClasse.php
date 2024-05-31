<?php


class Produit {
    private $idProduit;
    private $ref_interne;
    private $libelle;
    private $resume_court;
    private $description_long;
    private $path_photo;
    private $qte_stock;
    private $prix;
    private $libelleCateg;

    // Constructeur
    public function __construct($idProduit,$ref_interne, $libelle, $resume_court, $description_long, $path_photo, $qte_stock, $prix, $libelleCateg) {
        $this->idProduit = $idProduit;
        $this->ref_interne = $ref_interne;
        $this->libelle = $libelle;
        $this->resume_court = $resume_court;
        $this->description_long = $description_long;
        $this->path_photo = $path_photo;
        $this->qte_stock = $qte_stock;
        $this->prix = $prix;
        $this->libelleCateg = $libelleCateg;
        
    }


    

    public static function GetProduitByRef($idProduit){
        $cnx = getBddConnexion();
        // écrire la requête sql de sélection des produits
        $sql = 'select idProduit,ref_interne,produit.libelle,resume_court ,description_long, path_photo,qte_stock,prix,categorie.libelle as "libelleCateg"';
        $sql .= ' from produit';
        $sql .= ' join categorie on produit.idCateg = categorie.idCateg';
        $sql .= ' where idProduit = :critere;';
        $critere = $idProduit;
    
        $result = $cnx->prepare($sql);
        // lie le paramètre et la variable contenant la valeur
        $result->bindParam('critere', $critere, PDO::PARAM_STR);
        // exécute la requête
        $result->execute();
    
        // nb lignes résultat
        $nb_lignes = $result->rowCount();   
        // définit le format de lecture "tableau associatif"
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $produit = null;
        if($uneLigne = $result->fetch()){
            $produit = new Produit($uneLigne['idProduit'],$uneLigne['ref_interne'], $uneLigne['libelle'], $uneLigne['resume_court'], $uneLigne['description_long'], $uneLigne['path_photo'], $uneLigne['qte_stock'], $uneLigne['prix'], $uneLigne['libelleCateg']);
        }
        
        return $produit;
    }

    public static function getProduitById($idProduit){
        $cnx = getBddConnexion();
        // écrire la requête sql de sélection des produits
        $sql = 'select idProduit,ref_interne,produit.libelle,resume_court ,description_long, path_photo,qte_stock,prix,categorie.libelle as "libelleCateg"';
        $sql .= ' from produit';
        $sql .= ' join categorie on produit.idCateg = categorie.idCateg';
        $sql .= ' where idProduit = :critere;';
        $critere = $idProduit;
    
        $result = $cnx->prepare($sql);
        // lie le paramètre et la variable contenant la valeur
        $result->bindParam('critere', $critere, PDO::PARAM_STR);
        // exécute la requête
        $result->execute();
    
        // nb lignes résultat
        $nb_lignes = $result->rowCount();   
        // définit le format de lecture "tableau associatif"
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $produit = null;
        if($uneLigne = $result->fetch()){
            $produit = new Produit($uneLigne['idProduit'],$uneLigne['ref_interne'], $uneLigne['libelle'], $uneLigne['resume_court'], $uneLigne['description_long'], $uneLigne['path_photo'], $uneLigne['qte_stock'], $uneLigne['prix'], $uneLigne['libelleCateg']);
        }
        
        return $produit;
    }

    public static function AjouterProduit($ref_interne, $libelle, $resume_court, $description_long, $path_photo, $prix,$qte_stock,  $idCateg){
        $cnx = getBddConnexion();
        // écrire la requête sql d'insertion
        $sql = 'insert into produit(ref_interne, libelle, resume_court, description_long, path_photo, qte_stock, prix, idCateg)';
        $sql .= ' values(:ref_interne, :libelle, :resume_court, :description_long, :path_photo, :qte_stock, :prix, :idCateg);';
    
        $result = $cnx->prepare($sql);
        // lie les paramètres et les variables contenant les valeurs
        $result->bindParam('ref_interne', $ref_interne, PDO::PARAM_STR);
        $result->bindParam('libelle', $libelle, PDO::PARAM_STR);
        $result->bindParam('resume_court', $resume_court, PDO::PARAM_STR);
        $result->bindParam('description_long', $description_long, PDO::PARAM_STR);
        $result->bindParam('path_photo', $path_photo, PDO::PARAM_STR);
        $result->bindParam('qte_stock', $qte_stock, PDO::PARAM_INT);
        $result->bindParam('prix', $prix, PDO::PARAM_INT);
        $result->bindParam('idCateg', $idCateg, PDO::PARAM_INT);
        // exécute la requête
        $result->execute();
    
        // nb lignes résultat
        $nb_lignes = $result->rowCount();   
        return $nb_lignes;

    }

    public static function SupprimerProduit($idProduit){
        $cnx = getBddConnexion();
        // écrire la requête sql de suppression
        $sql = 'delete from produit where idProduit = :critere;';
 
        $result = $cnx->prepare($sql);
        // lie le paramètre et la variable contenant la valeur
        $result->bindParam('critere', $idProduit, PDO::PARAM_STR);
        // exécute la requête
        $result->execute();
    
        // nb lignes résultat
        $nb_lignes = $result->rowCount();   
        return $nb_lignes;
    }

    public static function GetAllProduits(){
        $cnx = getBddConnexion();
        // écrire la requête sql de sélection des produits
        $sql = 'select idProduit,ref_interne,produit.libelle,resume_court ,description_long, path_photo,qte_stock,prix,categorie.libelle as "libelleCateg"';
        $sql .= ' from produit';
        $sql .= ' join categorie on produit.idCateg = categorie.idCateg';
        $sql .= ' order by produit.libelle;';
    
        $result = $cnx->prepare($sql);
        // exécute la requête
        $result->execute();
    
        // nb lignes résultat
        $nb_lignes = $result->rowCount();   
        // définit le format de lecture "tableau associatif"
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $produits = [];
        while($uneLigne = $result->fetch()){
            $produit = new Produit($uneLigne['idProduit'],$uneLigne['ref_interne'], $uneLigne['libelle'], $uneLigne['resume_court'], $uneLigne['description_long'], $uneLigne['path_photo'], $uneLigne['qte_stock'], $uneLigne['prix'], $uneLigne['libelleCateg']);
            $produits[] = $produit;
        }
        
        return $produits;
    }

    
    // Méthode pour récupérer les produits par catégorie
    public static function GetProduitByCateg($idCateg) {
        $cnx = getBddConnexion();
        // écrire la requête sql de sélection des produits
        $sql = "select idProduit,ref_interne,produit.libelle,resume_court ,description_long, path_photo,qte_stock,prix,categorie.libelle as 'libelleCateg'";
        $sql .= ' from produit';
        $sql .= ' join categorie on produit.idCateg = categorie.idCateg';
        $sql .= ' where produit.idCateg = :critere;';
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
        

        $produits = [];
        while($uneLigne = $result->fetch()){
            $produit = new Produit($uneLigne['idProduit'],$uneLigne['ref_interne'], $uneLigne['libelle'], $uneLigne['resume_court'], $uneLigne['description_long'], $uneLigne['path_photo'], $uneLigne['qte_stock'], $uneLigne['prix'], $uneLigne['libelleCateg']);
            $produits[] = $produit;
        }
        
        return $produits;
    }
    // Getters et setters
    public function getIdProduit() {
        return $this->idProduit;
    }
    public function getRefInterne() {
        return $this->ref_interne;
    }

    public function setRefInterne($ref_interne) {
        $this->ref_interne = $ref_interne;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function getResumeCourt() {
        return $this->resume_court;
    }

    public function setResumeCourt($resume_court) {
        $this->resume_court = $resume_court;
    }

    public function getDescriptionLong() {
        return $this->description_long;
    }

    public function setDescriptionLong($description_long) {
        $this->description_long = $description_long;
    }

    public function getPathPhoto() {
        return $this->path_photo;
    }


    public function getQteStock() {
        return $this->qte_stock;
    }

    public function setQteStock($qte_stock) {
        $this->qte_stock = $qte_stock;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }
    public function getlibelleCateg() {
        return $this->libelleCateg;
    }

    public function setlibelleCateg($libelleCateg) {
        $this->libelleCateg = $libelleCateg;
    }


}

?>