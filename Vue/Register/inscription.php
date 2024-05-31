<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
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
    <form method="POST" action="register.php">
        <div class="headerInsco">
            <h1>Inscription</h1>
        </div>
        <div class="Register">

            <img src="../../Vue/img/Logo/welcome" height="400" width="400" alt="">
            <div>
                <label for="Email">Email :</label>
                <input type="text" id="Email" name="Email" required>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <label for="Nom">Nom :</label>
                <input type="text" id="Nom" name="Nom" required>
                <label for="Prenom">Prenom :</label>
                <input type="text" id="Prenom" name="Prenom" required>
                <div class="boutonBas">
                    <span><?php if (isset($_GET["message"]))
                        echo $_GET["message"] ?></span>
                        <br>
                        <input type="submit" value="S'inscrire">
                    </div>

                </div>
            </div>

        </form>
    </body>

    </html>