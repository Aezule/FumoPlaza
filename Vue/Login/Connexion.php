<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
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
    <form method="POST" action="login.php">

        <div class="Login">
     
                <img src="../../Vue/img/Logo/LogoMain" height="400" width="400" alt="">
                <label for="Email">Email:</label>
                <input type="text" id="Email" name="Email"  required>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password"  required> <br>
                <div class="boutonBas">
                <input type="submit" value="Login">
                <a href="../../Vue/Register/inscription.php">Inscription</a>
                </div>
              
       
        </div>

    </form>
</body>

</html>