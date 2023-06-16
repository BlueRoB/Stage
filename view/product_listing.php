<?php
    $products = array(
        'informatique' => array(
            'boitier-pc' => array(
                array(
                    'id' => 1,
                    'name' => 'Boîtier PC 1',
                    'price' => 1000,
                    'description' => 'Description du boîtier PC 1',
                    'image' => '../assets/ordinateur1.jpeg'
                ),
                array(
                    'id' => 2,
                    'name' => 'Boîtier PC 2',
                    'price' => 1500,
                    'description' => 'Description du boîtier PC 2',
                    'image' => '../assets/ordinateur2.jpeg'
                ),
            ),
            'boitier-disque-dur' => array(
                array(
                    'id' => 3,
                    'name' => 'Boîtier Disque Dur 1',
                    'price' => 800,
                    'description' => 'Description du boîtier disque dur 1',
                    'image' => '../assets/boitier-disque-dur1.jpeg'
                ),
                array(
                    'id' => 4,
                    'name' => 'Boîtier Disque Dur 2',
                    'price' => 1200,
                    'description' => 'Description du boîtier disque dur 2',
                    'image' => '../assets/boitier-disque-dur2.jpeg'
                ),
            ),
        ),
        'image-son' => array(
            'appareil-photo' => array(
                array(
                    'id' => 5,
                    'name' => 'Appareil Photo 1',
                    'price' => 1200,
                    'description' => 'Description de l\'appareil photo 1',
                    'image' => '../assets/appareil-photo1.jpeg'
                ),
                array(
                    'id' => 6,
                    'name' => 'Appareil Photo 2',
                    'price' => 1500,
                    'description' => 'Description de l\'appareil photo 2',
                    'image' => '../assets/appareil-photo2.jpeg'
                ),
            ),
            'accessoire-photo' => array(
                array(
                    'id' => 7,
                    'name' => 'Accessoire Photo 1',
                    'price' => 50,
                    'description' => 'Description de l\'accessoire photo 1',
                    'image' => '../assets/accessoire-photo1.jpeg'
                ),
                array(
                    'id' => 8,
                    'name' => 'Accessoire Photo 2',
                    'price' => 80,
                    'description' => 'Description de l\'accessoire photo 2',
                    'image' => '../assets/accessoire-photo2.jpeg'
                ),
            ),
        ),
        'jeux-loisirs' => array(
            'console-ps5' => array(
                array(
                    'id' => 9,
                    'name' => 'Console PS5',
                    'price' => 500,
                    'description' => 'Description de la console PS5',
                    'image' => '../assets/console-ps5.jpeg'
                ),
            ),
            'console-xbox-series' => array(
                array(
                    'id' => 10,
                    'name' => 'Console Xbox Series',
                    'price' => 450,
                    'description' => 'Description de la console Xbox Series',
                    'image' => '../assets/console-xbox-series.jpeg'
                ),
            ),
        )
    );

?>

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
require_once __DIR__ . '/navbar.php'; ?>

<div class="container-fluid custom-container">
    <div class="row custom-row">
        <div class="col-md-3 col-lg-2">
            <div class="sidebar">
                <h4>Filters</h4>
                <div class="filter-section">
                    <h5>Price Range</h5>
                    <input type="text" id="min-price" placeholder="Min Price">
                    <input type="text" id="max-price" placeholder="Max Price">
                </div>

                <div class="filter-section">
                    <h5>Search</h5>
                    <input type="text" id="search-bar" placeholder="Search Product">
                </div>

                <div class="filter-section">
                    <h5>Sort By</h5>
                    <select id="sort-by">
                        <option value="low-to-high">Price: Low to High</option>
                        <option value="high-to-low">Price: High to Low</option>
                    </select>
                </div>

                <button id="apply-filters" class="btn btn-primary">Apply Filters</button>
            </div>
        </div>
        <div class="col-md-9">
            <div class="container">
                <div class="row">
                    <?php
                    if (isset($_GET['category']) && isset($_GET['subcategory'])) {
                        $category = $_GET['category'];
                        $subcategory = $_GET['subcategory'];
                        if (array_key_exists($category, $products) && array_key_exists($subcategory, $products[$category])) {
                            $subcategoryProducts = $products[$category][$subcategory];
                            if (!empty($subcategoryProducts)) {
                                foreach ($subcategoryProducts as $product) {
                                    $productId = $product['id'];
                                    $productName = $product['name'];
                                    $productPrice = $product['price'];
                                    $productDescription = $product['description'];
                                    $productImage = $product['image'];
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card mb-3">
                                            <img src="<?php echo $productImage; ?>" class="card-img-top" alt="Product Image">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $productName; ?></h5>
                                                <p class="card-text"><?php echo $productDescription; ?></p>
                                                <p class="card-text">Price: <?php echo $productPrice; ?></p>
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
                                echo '<p>No products found.</p>';
                            }
                        } else {
                            echo '<p>Invalid category or subcategory.</p>';
                        }
                    } else {
                        echo '<p>Category and subcategory parameters are missing.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
</div>
</body>
</html>
