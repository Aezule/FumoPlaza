<?php
session_start();
include '../../Model/UserClasse.php';
include '../../Model/PanierClasse.php';
include '../../Model/ProduitClasse.php';
include '../../Model/bdd-pdo.php';

$Compte = unserialize($_SESSION['User']);
$Panier = Panier::GetCommandeByClient($Compte->getIdCompte());

$produitsPanier = [];

$PrixTotal = Panier::GetPrixPanier($Compte->getIdCompte());

foreach ($Panier as $panierItem) {
    $idProduit = $panierItem->getIdProduit();
    $produit = Produit::getProduitById($idProduit);
    if ($produit !== null) {
        $produitsPanier[] = $produit;
    }
}

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



    <div class="PageAchat">
        <div class="RecapPanier">
            <div class="ProduitPanier">
            <h1>Commande</h1>
                <?php foreach ($produitsPanier as $produit): ?>
                    <h3><li><?php echo htmlspecialchars($produit->getLibelle()); ?></li></h3>
                <?php endforeach; ?>
            </div>
            <div class="PrixPanier">
                <h1>Prix</h1>

                <?php foreach ($produitsPanier as $produit): ?>
                    <h3><li><?php echo htmlspecialchars($produit->getPrix()); ?> euro </li></h3>
                <?php endforeach; ?>
                <p>Prix Total : <?php echo $PrixTotal; ?> euro</p>

                <div class="BoutonAchat">
                <button><a href="./ConfirmationAchat.php">Acheter</a></button>
                </div>
           <div class="text-success"><?php if(isset($_GET["message"])){echo $_GET["message"]; }  ?></div>
                
            </div>
        </div>

    </div>


</body>

</html>