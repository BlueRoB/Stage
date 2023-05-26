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
        <h1>IDENTIFIEZ-VOUS :</h1>
        <form>
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="loginPassword">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="mt-3">
            <p>Vous n'avez pas de compte ? <a href="register.php">Inscrivez-vous maintenant</a></p>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/footer.php'; ?>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

