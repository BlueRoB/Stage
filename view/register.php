<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/styles.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/982764073e.js" crossorigin="anonymous"></script>
</head>
<body>


<?php
require_once __DIR__ . '/navbar.php'; ?>

<div class="container d-flex justify-content-center align-items-center vh-100">
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


</body>
<footer class="text-white footer-container mt-5">
    <div class="container d-flex justify-content-between align-items-center pt-4">
        <div class="h3 footer-font d-flex align-items-center">
            <span>Nous contacter :</span>
            <span class="ms-2"><i class="fas fa-phone" style="color: #ffffff;"></i></span>
            <span class="ms-2">0123456789</span>
        </div>
        <div class="h3 footer-font d-flex align-items-center">
            <span> <i class="fas fa-envelope" style="color: #ffffff;"></i></span>
            <span class="ms-2">email@example.com</span>
        </div>
        <div class="h3 footer-font d-flex align-items-center">
            <span>Besoin d'aide? </span>
            <a href="../view/formulaire.php" class="ms-2 btn btn-light rounded-3">Formulaire</a>
        </div>
    </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

