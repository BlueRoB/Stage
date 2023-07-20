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
     * Fichier product_listing.php
     *
     * Cette page affiche une liste de produits en fonction des catégories et sous-catégories sélectionnées.
     * Elle permet également d'appliquer des filtres tels que le prix, la recherche et le tri des produits.
     */

    // Fonction pour obtenir les produits par catégorie et sous-catégorie depuis la base de données
    function getProductsByCategoryAndSubcategory($category, $subcategory, $connection) {
        $category = mysqli_real_escape_string($connection, $category);
        $subcategory = mysqli_real_escape_string($connection, $subcategory);

        $query = "SELECT * FROM products 
              WHERE category_id = (SELECT category_id FROM categories WHERE category_name = '$category')
              AND subcategory_id = (SELECT subcategory_id FROM subcategories WHERE subcategory_name = '$subcategory')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Error: " . mysqli_error($connection));
        }

        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    }

    // Informations de connexion à la base de données
    $host = 'localhost';
    $user = 'Ecommerce';
    $password = 'Stage2023*';
    $database = 'E-commerce';

    // Connexion à la base de données
    $connection = mysqli_connect($host, $user, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <?php
    require_once __DIR__ . '/navbar.php'; ?>

    <div class="content container-fluid custom-container">
        <div class="row custom-row">
            <div class="col-md-3 col-lg-2">
                <div class="sidebar">
                    <h4>Filtres</h4>
                    <div class="filter-section">
                        <h5>Plage de prix</h5>
                        <input type="text" id="min-price" placeholder="Prix min">
                        <input type="text" id="max-price" placeholder="Prix max">
                    </div>

                    <div class="filter-section">
                        <h5>Recherche</h5>
                        <input type="text" id="search-bar" placeholder="Rechercher un produit">
                    </div>

                    <div class="filter-section">
                        <h5>Trier par</h5>
                        <select id="sort-by">
                            <option value="low-to-high">Prix : du plus bas au plus élevé</option>
                            <option value="high-to-low">Prix : du plus élevé au plus bas</option>
                        </select>
                    </div>

                    <button id="apply-filters" class="btn btn-primary">Appliquer les filtres</button>
                </div>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="row">
                        <?php
                        // Vérifier si les paramètres de catégorie et de sous-catégorie sont définis
                        if (isset($_GET['category']) && isset($_GET['subcategory'])) {
                            $category = $_GET['category'];
                            $subcategory = $_GET['subcategory'];

                            // Obtenir les produits par catégorie et sous-catégorie
                            $products = getProductsByCategoryAndSubcategory($category, $subcategory, $connection);

                            if (!empty($products)) {
                                foreach ($products as $product) {
                                    $productId = $product['product_id'];
                                    $productName = $product['product_name'];
                                    $productPrice = $product['price'];
                                    $productDescription = $product['description'];
                                    $productImage = $product['image'];
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card mb-3">
                                            <img src="../assets/uploads/<?php echo $productImage; ?>" class="card-img-top" alt="Image du produit">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $productName; ?></h5>
                                                <p class="card-text"><?php echo $productDescription; ?></p>
                                                <p class="card-text">Prix : <?php echo $productPrice; ?></p>
                                                <form method="post" action="panier.php">
                                                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<p>Aucun produit trouvé.</p>';
                            }
                        } else {
                            echo '<p>Les paramètres de catégorie et de sous-catégorie sont manquants.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="footer">
    <?php require_once __DIR__ . '/footer.php'; ?>
</div>
</body>
</html>
