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
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];

    // Validate the price input
    if (!is_numeric($product_price)) {
        echo "Invalid price. Please enter a numeric value.";
        exit;
    }

    $query = "UPDATE products SET product_name = '$product_name', price = '$product_price', description = '$product_description' WHERE product_id = '$product_id'";

    if (mysqli_query($connection, $query)) {
        mysqli_close($connection);
        header("Location: admin.php?tab=view_products");
        exit;
    } else {
        echo "Error updating product: " . mysqli_error($connection);
    }
} else {
    // If the request method is not POST, redirect the user back to the view products page
    header("Location: admin.php?tab=view_products");
    exit;
}
?>
