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





<div class="container vh-100">
    <h1 class="text-center mt-5">Mon Panier</h1>
    <div class="table-responsive mt-4">
        <table class="table">
            <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Produit 1</td>
                <td>10 €</td>
                <td>2</td>
                <td>20 €</td>
            </tr>
            <tr>
                <td>Produit 2</td>
                <td>15 €</td>
                <td>1</td>
                <td>15 €</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>35 €</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>


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

