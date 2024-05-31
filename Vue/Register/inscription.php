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
                <span id="errorEmail" class="text-danger"></span>
                
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <span id="errorPassword" class="text-danger"></span>
                
                <label for="Nom">Nom :</label>
                <input type="text" id="Nom" name="Nom" required>
                <span id="errorNom" class="text-danger"></span>
                
                <label for="Prenom">Prenom :</label>
                <input type="text" id="Prenom" name="Prenom" required>
                <span id="errorPrenom" class="text-danger"></span>
                
                <div class="boutonBas">
                    <span><?php if (isset($_GET["message"])) echo $_GET["message"]; ?></span>
                    <br>
                    <input id="envoi" type="submit" value="S'inscrire">
                </div>
            </div>
        </div>
    </form>
</body>

</html>

<script>
var form = document.querySelector('form');
var validation = document.getElementById('envoi');
var email = document.getElementById('Email');
var nom = document.getElementById('Nom');
var prenom = document.getElementById('Prenom');
var password = document.getElementById('password');
var errorEmail = document.getElementById('errorEmail');
var errorNom = document.getElementById('errorNom');
var errorPrenom = document.getElementById('errorPrenom');
var errorPassword = document.getElementById('errorPassword');

var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\\$%\\^&\\*])(?=.{8,})");
var regexMail = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

validation.addEventListener('click', function(e) {
    var isValid = true;
    
    if (!nom.value) {
        isValid = false;
        errorNom.textContent = 'Nom manquant';
    } else {
        errorNom.textContent = '';
    }

    if (!prenom.value) {
        isValid = false;
        errorPrenom.textContent = 'Prenom manquant';
    } else {
        errorPrenom.textContent = '';
    }

    if (!email.value) {
        isValid = false;
        errorEmail.textContent = 'Email manquant';
    } else if (!regexMail.test(email.value)) {
        isValid = false;
        errorEmail.textContent = 'Email invalide';
    } else {
        errorEmail.textContent = '';
    }

    if (!password.value) {
        isValid = false;
        errorPassword.textContent = 'Mot de passe manquant';
    } else if (!regex.test(password.value)) {
        isValid = false;
        errorPassword.textContent = 'Mot de passe ne respecte pas les critères de sécurité';
    } else {
        errorPassword.textContent = '';
    }

    if (!isValid) {
        e.preventDefault();
    }
});
</script>
