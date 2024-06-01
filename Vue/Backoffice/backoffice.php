<?php
session_start();
include '../../Model/UserClasse.php';
include '../../Model/PanierClasse.php';
include '../../Model/ProduitClasse.php';
include '../../Model/bdd-pdo.php';


if(!isset($_SESSION['User'])){
    header("Location: ../Login/Connexion.php");
}
$Compte = unserialize($_SESSION['User']);

if($Compte->getRole() != 1){
    header("Location: ../..");
}
$Panier = Panier::GetCommandeByClient($Compte->getIdCompte());

$produits = [];
$produits = Produit::GetAllProduits();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FumoPlaza</title>
    <link rel="stylesheet" href="../../styles/header.css">
    <link rel="stylesheet" href="../../styles/index.css">
    <link rel="stylesheet" href="../../styles/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</head>


<body>
    <?php include '../Header/header.php'; ?>


    <div class="PageBackOffice">
        <div class="RecapPanier">
            <div class="ListeProduits">
                <h1>Liste des produits</h1>
                <?php foreach ($produits as $produit): ?>
                    <h3>
                        <li><?php echo htmlspecialchars($produit->getLibelle()); ?> -
                            <?php echo htmlspecialchars($produit->getQteStock()) ?> en stock
                            <?php echo htmlspecialchars($produit->getPrix()); ?> euro
                        </li>
                        <div class="BoutonAchat">

                        <button><a href="../../Controller/SuppProduit.php?idProduit=<?php echo htmlspecialchars($produit->getIdProduit());?>" >Supprimer</a></button>
                        </div>
                        
                    </h3>
                <?php endforeach; ?>
            </div>
            <div class="AjoutProduit">
                <h1>Ajouter un produit</h1>

                <form method="POST" action="AddProduit.php">

                    <div class="Login">
                        <label for="Ref_interne">Réference interne :</label>
                        <input type="text" id="Ref_interne" name="Ref_interne" required>

                        <label for="Libelle">Libelle :</label>
                        <input type="text" id="Libelle" name="Libelle" required> 

                        <label for="Resume_court">Résumé court:</label>
                        <input type="text" id="Resume_court" name="Resume_court" required>

                        <label for="Description">Description :</label>
                        <input type="text" id="Description" name="Description" required> 

                        <label for="Path_photo">Nom de l'image :</label>
                        <input type="text" id="Path_photo" name="Path_photo" required> 

                        <label for="Prix">Prix :</label>
                        <input type="text" id="Prix" name="Prix" required> 

                        <label for="Qte">Quantité actuel :</label>
                        <input type="text" id="Qte" name="Qte" required>

                        <label for="idCateg">Identifiant de la categorie :</label>
                        <input type="text" id="idCateg" name="idCateg" required> 
                        
                        
                        <br>
                        <input type="submit" value="Ajouter">

                    </div>

                </form>

                <div class="text-success"><?php if (isset($_GET["message"])) {
                    echo $_GET["message"];
                } ?></div>

            </div>
        </div>

    </div>
</body>

</html>