<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FumoPlaza</title>
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/footer.css">
</head>

<body>
<header>
        <div class="header">
        <div class="Title">
                <img src="./Vue/img/Logo/LogoMain.jpg" alt="logo">
                <a href="../.."><h1>FumoPlaza</h1></a>
            </div>
            <div class="buttonHeader">
                <nav>
                    <ul>
                        <li><a href="./Vue/Produits/Produits?id=1">Été</a></li>
                        <li><a href="./Vue/Produits/Produits?id=4">Printemps</a></li>
                        <li><a href="./Vue/Produits/Produits?id=3">Automne</a></li>
                        <li><a href="./Vue/Produits/Produits?id=2">Hiver</a></li>
                    </ul>
                </nav>
            </div>

            <div class="buttons">
            <div class="Panier">
                <button>Panier</button>
            </div>
            <div class="button">
            <Button>
                <?php if(!isset($_SESSION['User'])) {
                    echo '<a href="./Vue/Login/Connexion">Se connecter</a>';
                } else{
                    echo '<a href="./Vue/Compte/Profil">Mon profil</a>';
                
                } ?>
                
            </Button>
            </div>
           
            </div>
            
        </div>
    </header>


    <div class="mainCateg">
        <img id="Miku" src="./Vue/img/Printemps/Miku.jpg" alt="Miku">
        <img id="Masuko" src="./Vue/img/Printemps/Masuko.jpg" alt="Masuko">
        <a href="./Vue/Produits/Produits?id=4">Nouveauté printemps </a>
    </div>
    <div id="Text">
        <h1>Nos autres categories :</h1>
        <h2>Une autre saison vous interesse ? Ne vous inquietez pas, nous avons tous !</h2>
    </div>

    <div class="secondCateg ">
        <div class="BoutonCateg">
            <img src="./Vue/img/Ete/Mona.jpg" alt="Mona">
            <button><li><a href="./Vue/Produits/Produits?id=1">Été</a></li></button>
        </div>
        <div class="BoutonCateg">
            <img src="./Vue/img/Hiver/Yuki.jpg" alt="Yuki">
            <button><li><a href="./Vue/Produits/Produits?id=2">Hiver</a></li></button>
        </div>
        <div class="BoutonCateg">
            <img src="./Vue/img/Automne/Chika.jpg" alt="Chika">
            <button><li><a href="./Vue/Produits/Produits?id=3">Automne</a></li></button>
        </div>


    </div>

    <footer>
    <div class="Footer">
        <img src="./Vue/img/Logo/LogoMain.jpg" alt="logo">
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