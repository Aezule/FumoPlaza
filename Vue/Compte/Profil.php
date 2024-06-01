<?php
session_start();
include '../../Model/UserClasse.php';
include '../../Model/PanierClasse.php';
include '../../Model/ProduitClasse.php';
include '../../Model/bdd-pdo.php';

$Compte = unserialize($_SESSION['User']);
$Panier = Panier::GetCommandeByClient($Compte->getIdCompte());

$produitsPanier = [];

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

<div class="CompteStyle">
    <div class="PanierStyle">
        <h1>Panier</h1>
        <?php if (!empty($produitsPanier)): ?>
            <ul>
                <?php foreach ($produitsPanier as $produit): ?>
                    <li><?php echo htmlspecialchars($produit->getLibelle()); ?></li>
                <?php endforeach; ?>
            </ul>
            <div class="BoutonAchat">
                <button>
                    <a href="../Payement/Achat.php">Passer à l'achat</a>
                </button>
            </div>
        <?php else: ?>
            <p>Votre panier est vide.</p>
        <?php endif; ?>
    </div>

    <div class="DataProfil">
        <h1>Information du compte</h1>

        <h2>Email :</h2>
        <input type="text" id="mail" value="<?php echo $Compte->getLogin(); ?>">
        <span id="errorMail" class="text-danger"></span>
        <button id="modifierMail">Modifier</button>

        <h2>Nom :</h2>
        <input type="text" id="nom" value="<?php echo $Compte->getNom(); ?>">
        <button id="modifierNom">Modifier</button>

        <h2>Prenom :</h2>
        <input type="text" id="prenom" value="<?php echo $Compte->getPrenom(); ?>">
        <button id="modifierPrenom">Modifier</button>

        <br>

        <a href="../../Controller/deconnexion">Déconnexion</a>
        <?php if ($Compte->getRole() == 1): ?>
            <a href="../Backoffice/backoffice.php">Backoffice</a>

        <?php endif; ?>
    </div>
</div>

<script>
    // Récupérer les éléments input et les boutons de modification
    var mailInput = document.getElementById('mail');
    var nomInput = document.getElementById('nom');
    var prenomInput = document.getElementById('prenom');
    var modifierMailButton = document.getElementById('modifierMail');
    var modifierNomButton = document.getElementById('modifierNom');
    var modifierPrenomButton = document.getElementById('modifierPrenom');
    var errorMail = document.getElementById('errorMail');

    // Regex for email validation
    var emailRegex = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

    // Ajouter un écouteur d'événement au clic sur le bouton de modification de l'email
    modifierMailButton.addEventListener('click', function(e) {
        if (!emailRegex.test(mailInput.value)) {
            e.preventDefault();
            errorMail.textContent = 'Email invalide';
        } else {
            errorMail.textContent = '';
            window.location.href = "../../Controller/Modifier.php?modif=login&new=" + encodeURIComponent(mailInput.value);
        }
    });

    // Ajouter des écouteurs d'événement au clic sur les autres boutons de modification
    modifierNomButton.addEventListener('click', function() {
        window.location.href = "../../Controller/Modifier.php?modif=nom&new=" + encodeURIComponent(nomInput.value);
    });

    modifierPrenomButton.addEventListener('click', function() {
        window.location.href = "../../Controller/Modifier.php?modif=prenom&new=" + encodeURIComponent(prenomInput.value);
    });
</script>

</body>
</html>
