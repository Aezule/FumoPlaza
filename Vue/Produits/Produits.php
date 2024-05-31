<?php
include '../../Model/ProduitClasse.php';
include '../../Model/bdd-pdo.php';  
$produits = Produit::GetProduitByCateg($_GET["id"]);
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

    <div id="carouselProduit" class="carousel slide ">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner imgCenter">

            <?php foreach ($produits as $produit): ?>
                <div class="carousel-item <?php if ($first) {
                    echo 'active';
                    $first = false;
                } ?>">
                    <a href="../Produit/Produit?categ=<?php echo $_GET["id"] ?>&id=<?php echo htmlspecialchars($produit->getIdProduit()); ?>">
                        <img src="../../Vue/img/<?php echo htmlspecialchars($produit->getlibelleCateg()); ?>/<?php echo htmlspecialchars($produit->getPathPhoto()); ?>"
                            class="d-block" height="600" width="600">
                    </a>

                </div>
            <?php endforeach; ?>

        </div>
        <button class="carousel-control-prev bg-black" type="button" data-bs-target="#carouselProduit"
            data-bs-slide="prev">

            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden ">Previous</span>
        </button>
        <button class="carousel-control-next bg-black" type="button" data-bs-target="#carouselProduit"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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