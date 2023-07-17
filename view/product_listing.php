<?php
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

$host = 'localhost';
$user = 'Ecommerce';
$password = 'Stage2023*';
$database = 'E-commerce';

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
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

    <div class="content container-fluid custom-container">
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
                                            <img src="../assets/uploads/<?php echo $productImage; ?>" class="card-img-top" alt="Product Image">
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
                            echo '<p>Category and subcategory parameters are missing.</p>';
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
