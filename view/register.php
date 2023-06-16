<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/styles.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/982764073e.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">


<?php
require_once __DIR__ . '/navbar.php'; ?>

<div class="container d-flex justify-content-center align-items-center">
    <div class="w-50">
        <h1>INSCRIVEZ-VOUS :</h1>
        <form>
            <div class="mb-3">
                <label for="registerName" class="form-label">Nom</label>
                <input type="text" class="form-control" id="registerName">
            </div>
            <div class="mb-3">
                <label for="registerEmail" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="registerEmail">
            </div>
            <div class="mb-3">
                <label for="registerPassword" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="registerPassword">
                <small id="passwordHelp" class="form-text text-muted">
                    Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule et un caractère spécial.
                </small>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="confirmPassword">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>


<?php
require_once __DIR__ . '/footer.php'; ?>
</div>
</body>
</html>

