<?php
$host = 'localhost';
$user = 'Ecommerce';
$password = 'Stage2023*';
$database = 'E-commerce';

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    // Retrieve the product information from the database
    $query = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($connection, $query);
    $product = mysqli_fetch_assoc($result);

    // Check if the product exists
    if (!$product) {
        echo "Product not found.";
        exit;
    }
} else {
    // If the request method is not POST, redirect the user back to the view products page
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
