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




<div class="container-fluid container-md">
    <div class="carousel-wrapper">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div  class="carousel-item active align-content-center">
                    <img href="./product.php" src="../assets/test1.webp" class="d-block mx-auto max-height-100 " alt="">
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


<?php
require_once __DIR__ . '/footer.php'; ?>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>

