<?php
include '../../Model/ProduitClasse.php';
include '../../Model/bdd-pdo.php';
$produit = Produit::GetProduitByRef($_GET["id"]);
$first = true;
session_start();

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



    <div>
        <div class="GeneralProduct">
            <div class="col-6 imgProduct">
                <img src="../../Vue/img/<?php echo htmlspecialchars($produit->getlibelleCateg()); ?>/<?php echo $produit->getPathPhoto(); ?>" class="d-block w-100"
                    alt="...">
            </div>
            <div class="col-6 InformationProduct">
                <h1><?php echo $produit->getLibelle(); ?></h1>
                <h2><?php echo $produit->getPrix(); ?> euro</h2>
                <div class="BoutonAchat">
                    <button><a href="./AddPanier.php?&id=<?php echo $_GET["id"] ?>">Acheter</a></button>
                </div>
                <p><?php echo $produit->getDescriptionLong(); ?></p>
                <p> Quantité restant en stock : <?php echo $produit->getQteStock(); ?></p>

                <p class="text-danger"> <?php if(isset($_GET["message"])){echo $_GET["message"]; }  ?></p>
            </div>

        </div>
    </div>



    <footer>
        <div class="Footer">
            <img src="../../Vue/img/Logo/LogoMain.jpg" alt="logo">
            <nav>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">A propos de moi</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

</html>
