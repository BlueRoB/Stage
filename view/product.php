<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/styles.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/982764073e.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">

    <?php
    /**
     * Fichier product.php
     *
     * Cette page affiche les détails d'un produit, tels que le nom, la description et le prix, et permet à l'utilisateur
     * d'ajouter le produit au panier.
     */
    require_once __DIR__ . '/navbar.php';
    ?>

    <div class="container product-page vh-100">
        <div class="row">
            <div class="col-md-4">
                <div class="product-images">
                    <!-- Afficher les images miniatures du produit avec des liens vers les images plus grandes -->
                    <img class="product-image-small" src="../assets/product1.jpeg" alt="Product Image" onclick="changeImage('../assets/product1.jpeg')">
                    <img class="product-image-small" src="../assets/product2.jpeg" alt="Product Image" onclick="changeImage('../assets/product2.jpeg')">
                    <img class="product-image-small" src="../assets/product3.jpeg" alt="Product Image" onclick="changeImage('../assets/product3.jpeg')">
                    <img class="product-image-small" src="../assets/product4.jpeg" alt="Product Image" onclick="changeImage('../assets/product4.jpeg')">
                </div>
                <!-- Afficher l'image principale du produit avec des événements pour le zoom -->
                <img id="product-image" class="product-image-large" src="../assets/product1.jpeg" alt="Product Image" onmouseover="zoomImage()" onmouseout="resetZoom()">
            </div>
            <div class="col-md-8">
                <div class="product-details">
                    <!-- Afficher le titre, la description et le prix du produit -->
                    <h1 class="product-title">Nom de produit</h1>
                    <hr>
                    <p class="product-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, tellus in sagittis
                        efficitur, justo nisl efficitur tortor, eu scelerisque lectus lectus eu dui. Nam lobortis
                        imperdiet enim, sit amet consectetur risus pulvinar at. Sed vitae gravida purus.
                    </p>
                    <hr>
                    <p class="product-price">$299.99</p>
                    <hr>
                    <div class="product-actions">
                        <!-- Formulaire pour ajouter le produit au panier -->
                        <form action="./panier.php" method="post">
                            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                            <input type="hidden" name="product_id" value="123">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once __DIR__ . '/footer.php';
    ?>
</div>
</body>
</html>
