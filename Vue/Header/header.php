<header>
        <div class="header">
        <div class="Title">
                <img src="../../Vue/img/Logo/LogoMain.jpg" alt="logo">
                <a href="../.."><h1>FumoPlaza</h1></a>
            </div>
            <div class="buttonHeader">
                <nav>
                    <ul>
                        <li><a href="../Produits/Produits?id=1">Été</a></li>
                        <li><a href="../Produits/Produits?id=4">Printemps</a></li>
                        <li><a href="../Produits/Produits?id=3">Automne</a></li>
                        <li><a href="../Produits/Produits?id=2">Hiver</a></li>
                    </ul>
                </nav>
            </div>

            <div class="buttons">
      
            <div class="button">
            <Button>
                <?php if(!isset($_SESSION['User'])) {
                    echo '<a href="../Login/Connexion">Se connecter</a>';
                } else{
                    echo '<a href="../Compte/Profil">Mon profil</a>';
                
                } ?>
                
            </Button>
            </div>
           
            </div>
            
        </div>
    </header>