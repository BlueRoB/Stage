<nav class="navbar">
    <a href="home.php" class="logo">Logo</a>
    <div class="search-bar">
        <input type="text" class="form-control rounded-5" placeholder="Search...">
    </div>
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
</nav>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./categories.php">Tous les Catégories</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="category.php?category=informatique" id="navbarInformatique" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informatique
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarInformatique">
                        <li><a class="dropdown-item" href="categories.php?category=informatique">Ordinateurs</a></li>
                        <li><a class="dropdown-item" href="#">PC portables</a></li>
                        <li><a class="dropdown-item" href="#">Périphérique</a></li>
                        <li><a class="dropdown-item" href="#">Pièces</a></li>
                        <li><a class="dropdown-item" href="#">Réseaux</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="category.php?category=image-son" id="navbarDropdownImageSon" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Image & Son
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownImageSon">
                        <li><a class="dropdown-item" href="#">Appareil photo</a></li>
                        <li><a class="dropdown-item" href="#">Télévision</a></li>
                        <li><a class="dropdown-item" href="#">Son numérique</a></li>
                        <li><a class="dropdown-item" href="#">Hi-fi et enceintes</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="category.php?category=jeux-loisirs" id="navbarDropdownJeuxLoisirs" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jeux & Loisirs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownJeuxLoisirs">
                        <li><a class="dropdown-item" href="#">Console</a></li>
                        <li><a class="dropdown-item" href="#">Accessoires console</a></li>
                        <li><a class="dropdown-item" href="#">Jeux Vidéo</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>