<?php
// Check if a session has not already been started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar">
    <a href="home.php" class="logo">Logo</a>
    <div class="search-bar">
        <input type="text" class="form-control rounded-5" placeholder="Search...">
    </div>

    <?php
    // Check if the user is logged in and the session variable is set
    if (!isset($_SESSION['user_id'])) {
        // User is not logged in
        echo '
        <div class="btn-group">
            <a href="login.php" class="btn btn-icon">
                <i class="fas fa-light fa-user fa-xs"></i>
            </a>
            <button type="button" class="btn btn-icon">
                <i class="fas fa-heart"></i>
            </button>
            <a href="panier.php" class="btn btn-icon">
                <i class="fas fa-basket-shopping"></i>
            </a>
        </div>
        ';
    } else {
        // User is logged in
        $user_name = $_SESSION['user_name'];
        echo '
        <div class="btn-group">
            <span class="navbar-text">Welcome, ' . $user_name . '</span>
            <button type="button" class="btn btn-icon">
                <i class="fas fa-heart"></i>
            </button>
            <a href="panier.php" class="btn btn-icon">
                <i class="fas fa-basket-shopping"></i>
            </a>
            <a href="logout.php" class="btn btn-icon">
                <i class="fas fa-light fa-sign-out-alt fa-xs"></i>
            </a>
        </div>
        ';
    }
    ?>
</nav>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./categories.php?category=informatique">Tous les Catégories</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="categories.php?category=informatique" id="navbarInformatique" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informatique
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarInformatique">
                        <li><a class="dropdown-item" href="categories.php?category=informatique&subcategory=ordinateur">Ordinateurs</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=informatique&subcategory=pc-portables">PC portables</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=informatique&subcategory=peripherique">Périphérique</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=informatique&subcategory=pieces">Pièces</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=informatique&subcategory=reseaux">Réseaux</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="categories.php?category=image-son" id="navbarDropdownImageSon" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Image & Son
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownImageSon">
                        <li><a class="dropdown-item" href="categories.php?category=image-son&subcategory=appareil-photo">Appareil photo</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=image-son&subcategory=television">Télévision</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=image-son&subcategory=son-numerique">Son numérique</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="categories.php?category=jeux-loisirs" id="navbarDropdownJeuxLoisirs" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jeux & Loisirs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownJeuxLoisirs">
                        <li><a class="dropdown-item" href="categories.php?category=jeux-loisirs&subcategory=console">Console</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=jeux-loisirs&subcategory=accessoires-console">Accessoires console</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=jeux-loisirs&subcategory=jeux-video">Jeux Vidéo</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
