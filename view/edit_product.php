<?php
/**
 * @file edit_product.php
 * @brief Page pour modifier un produit existant dans la base de données.
 */

$host = 'localhost'; /**< Adresse du serveur de base de données. */
$user = 'Ecommerce'; /**< Nom d'utilisateur de la base de données. */
$password = 'Stage2023*'; /**< Mot de passe de la base de données. */
$database = 'E-commerce'; /**< Nom de la base de données. */

$connection = mysqli_connect($host, $user, $password, $database); /**< Connexion à la base de données. */

// Vérification de la connexion à la base de données
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$product = null; /**< Tableau pour stocker les informations du produit. */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    // Récupérer les informations du produit depuis la base de données
    $query = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($connection, $query);
    $product = mysqli_fetch_assoc($result);

    // Vérifier si le produit existe
    if (!$product) {
        echo "Product not found.";
        exit;
    }
} else {
    // Si la méthode de requête n'est pas POST, rediriger l'utilisateur vers la page de visualisation des produits
    header("Location: admin.php?tab=view_products");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/styles.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/982764073e.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Edit Product</h2>
    <form method="POST" action="update_product.php">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
        <div class="mb-3">
            <label for="editProductName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="editProductName" name="product_name" value="<?php echo $product['product_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="editProductPrice" class="form-label">Product Price</label>
            <input type="number" class="form-control" id="editProductPrice" name="product_price" value="<?php echo $product['price']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="editProductDescription" class="form-label">Product Description</label>
            <textarea class="form-control" id="editProductDescription" name="product_description" rows="3" required><?php echo $product['description']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
