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
    <h1>Categories</h1>
    <div class="row">
        <div class="col-md-4">
            <h2>Main Category 1</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="#">Subcategory 1.1</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Subcategory 1.2</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Subcategory 1.3</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <h2>Main Category 2</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="#">Subcategory 2.1</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Subcategory 2.2</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Subcategory 2.3</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <h2>Main Category 3</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="#">Subcategory 3.1</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Subcategory 3.2</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Subcategory 3.3</a>
                </li>
            </ul>
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

