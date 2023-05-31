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
    <div class="container">
        <div class="row">
            <div class="col-3 checkout-steps__item step--active">
                <span class="checkout-steps__link">Panier</span>
            </div>
            <div class="col-3 checkout-steps__item checkout-steps__item--disabled">
                <span class="checkout-steps__link">Identification</span>
            </div>
            <div class="col-3 checkout-steps__item checkout-steps__item--disabled">
                <span class="checkout-steps__link">Livraison</span>
            </div>
            <div class="col-3 checkout-steps__item checkout-steps__item--disabled">
                <span class="checkout-steps__link">Paiement</span>
            </div>
        </div>
    </div>




    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body ">
                    <h5 class="card-title">Produit 1 <span class="float-end"><i class="fas fa-times"></i></span></h5>
                    <p class="card-text">Description du produit 1...</p>
                    <p class="card-text">Prix : 10 €</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body ">
                    <h5 class="card-title">Produit 2 <span class="float-end"><i class="fas fa-times"></i></span></h5>
                    <p class="card-text">Description du produit 1...</p>
                    <p class="card-text">Prix : 10 €</p>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Récapitulatif</h5>
                    <div class="mb-3">
                        <p>Produit 1 <span class="float-end">10 €</span></p>
                        <hr>
                        <p>Produit 2 <span class="float-end">10 €</span></p>
                        <hr>
                        <p>Total : <span class="float-end">20 €</span></p>
                    </div>
                    <a href="#" class="btn btn-primary">Passer la commande</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once __DIR__ . '/footer.php'; ?>



</body>
</html>

