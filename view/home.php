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


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tous les Catégories</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Informatique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Image & Son</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Jeux & Loisirs</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid container-md">
    <div class="carousel-wrapper">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active align-content-center">
                    <img src="../assets/test1.webp" class="d-block mx-auto max-height-100 " alt="">
                </div>
                <div class="carousel-item">
                    <img src="../assets/test2.jpeg" class="d-block mx-auto max-height-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/test3.jpeg" class="d-block mx-auto max-height-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="display-5 text-center pb-4">Découvrez les catégories populaires</h1>
            <div class="row mt-4">
                <div class="col-2">
                    <a href="#" class="category-link d-flex flex-column align-items-center">
                        <img src="../assets/test4.webp" alt="Category 1" class="img-fluid category-image pb-2">
                        <span class="category-label">Pc portables</span>
                    </a>
                </div>
                <div class="col-2">
                    <a href="#" class="category-link d-flex flex-column align-items-center">
                        <img src="../assets/test5.webp" alt="Category 2" class="img-fluid category-image pb-2">
                        <span class="category-label">Smartphones</span>
                    </a>
                </div>
                <div class="col-2">
                    <a href="#" class="category-link d-flex flex-column align-items-center">
                        <img src="../assets/test6.webp" alt="Category 3" class="img-fluid category-image pb-2">
                        <span class="category-label">Telévisions</span>
                    </a>
                </div>
                <div class="col-2">
                    <a href="#" class="category-link d-flex flex-column align-items-center">
                        <img src="../assets/test7.webp" alt="Category 4" class="img-fluid category-image pb-2">
                        <span class="category-label">Montre connectée</span>
                    </a>
                </div>
                <div class="col-2">
                    <a href="#" class="category-link d-flex flex-column align-items-center">
                        <img src="../assets/test8.webp" alt="Category 5" class="img-fluid category-image pb-2">
                        <span class="category-label">Appareil photo </span>
                    </a>
                </div>
                <div class="col-2">
                    <a href="#" class="category-link d-flex flex-column align-items-center">
                        <img src="../assets/test9.webp" alt="Category 6" class="img-fluid category-image pb-2">
                        <span class="category-label">Consoles jeux</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-white footer-container mt-5">
    <div class="container d-flex justify-content-between align-items-center pt-4">
        <div class="h3 footer-font d-flex align-items-center">
            <span>Nous contacter :</span>
            <span class="ms-2"><i class="fas fa-phone" style="color: #ffffff;"></i></span>
            <span>0123456789</span>
        </div>
        <div class="h3 footer-font d-flex align-items-center">
            <span> <i class="fas fa-envelope" style="color: #ffffff;"></i></span>
            <span class="ms-2">email@example.com</span>
        </div>
        <div class="h3 footer-font d-flex align-items-center">
            <span>Besoin d'aide? </span>
            <a href="form.html" class="ms-2 btn btn-light rounded-3">Formulaire</a>
        </div>
    </div>
</footer>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
