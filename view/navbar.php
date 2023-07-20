<?php
/**
 * @file navbar.php
 * @brief Barre de navigation du site.
 */

// Vérifier si une session n'a pas encore été démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar">
    <!-- Logo du site -->
    <a href="home.php" class="logo">Logo</a>
    <div class="search-bar">
        <input type="text" class="form-control rounded-5" placeholder="Rechercher...">
    </div>

    <?php
    // Vérifier si l'utilisateur est connecté et que la variable de session est définie
    if (!isset($_SESSION['user_id'])) {
        // L'utilisateur n'est pas connecté
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
        // L'utilisateur est connecté
        $user_name = $_SESSION['user_name'];
        echo '
        <div class="btn-group">
            <span class="navbar-text">Bienvenue, ' . $user_name . '</span>
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
        <!-- Liens vers les catégories principales -->
        <a class="navbar-brand" href="./categories.php?category=1">Tous les Catégories</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- Catégorie Informatique -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="categories.php?category=1" id="navbarInformatique" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informatique
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarInformatique">
                        <li><a class="dropdown-item" href="categories.php?category=1&subcategory=1">Ordinateurs</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=1&subcategory=2">PC portables</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=1&subcategory=3">Périphérique</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=1&subcategory=4">Pièces</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=1&subcategory=5">Réseaux</a></li>
                    </ul>
                </li>
                <!-- Catégorie Image & Son -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="categories.php?category=2" id="navbarDropdownImageSon" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Image & Son
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownImageSon">
                        <li><a class="dropdown-item" href="categories.php?category=2&subcategory=6">Appareil photo</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=2&subcategory=7">Télévision</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=2&subcategory=8">Son numérique</a></li>
                    </ul>
                </li>
                <!-- Catégorie Jeux & Loisirs -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="categories.php?category=3" id="navbarDropdownJeuxLoisirs" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jeux & Loisirs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownJeuxLoisirs">
                        <li><a class="dropdown-item" href="categories.php?category=3&subcategory=9">Console</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=3&subcategory=10">Accessoires console</a></li>
                        <li><a class="dropdown-item" href="categories.php?category=3&subcategory=11">Jeux Vidéo</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
