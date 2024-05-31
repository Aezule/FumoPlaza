<?php


class Commande
{
    private $idCommande;

    private $idCompte;

    // Constructeur
    public function __construct($idCommande, $idCompte)
    {
        $this->idCommande = $idCommande;
        $this->idCompte = $idCompte;

    }

        public static function SetToCommande($idCompte, $produits) {
            $cnx = getBddConnexion();
            $messageResultat = "";
            
            try {
                // Commencer une transaction
                $cnx->beginTransaction();
    
                // Insérer la commande dans la table `commande`
                $sql = 'INSERT INTO commande (idCompte) VALUES (:critere);';
                $result = $cnx->prepare($sql);
                $result->bindParam('critere', $idCompte, PDO::PARAM_STR);
                $result->execute();
    
                // Récupérer l'ID de la commande nouvellement créée
                $idCmd = $cnx->lastInsertId();
    
                // Insérer les produits dans la table `concerner`
                $sql = 'INSERT INTO concerner (idCmd, idProduit) VALUES (:idCmd, :idProduit);';
                $result = $cnx->prepare($sql);
    
                foreach ($produits as $produit) {
                    $result->bindParam('idCmd', $idCmd, PDO::PARAM_INT);
                    $result->bindParam('idProduit', $produit['idProduit'], PDO::PARAM_INT);
                    $result->execute();
                }
    
                // Supprimer les articles du panier de la table `memoriser_panier`
                $sql = 'DELETE FROM memoriser_panier WHERE idCompte = :idCompte AND idProduit = :idProduit';
                $deleteStmt = $cnx->prepare($sql);
    
                foreach ($produits as $produit) {
                    $deleteStmt->bindParam('idCompte', $idCompte, PDO::PARAM_INT);
                    $deleteStmt->bindParam('idProduit', $produit['idProduit'], PDO::PARAM_INT);
                    $deleteStmt->execute();
                }
    
                // Commit de la transaction
                $cnx->commit();
    
                $messageResultat = "Commande et produits ajoutés avec succès";
            } catch (Exception $e) {
                // Rollback de la transaction en cas d'erreur
                $cnx->rollBack();
                $messageResultat = "Erreur lors de l'ajout de la commande : " . $e->getMessage();
            }
    
            return $messageResultat;
        }
    
    
}


?>