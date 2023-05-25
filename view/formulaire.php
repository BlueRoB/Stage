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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form>
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" required>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
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

