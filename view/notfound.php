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

<div class="vh-100">
        <div class="row">
            <div class="col-md-12 centered">
                <div class="text-center">
                    <h1 class="display-4">404 Not Found</h1>
                    <p class="lead">The requested page could not be found.</p>
                    <a class="btn btn-primary" href="/WEB/Stage/view/home.php">Return Home</a>
                </div>
            </div>
        </div>
</div>

<?php
require_once __DIR__ . '/footer.php'; ?>






</body>
</html>
