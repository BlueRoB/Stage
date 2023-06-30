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

    $query = "DELETE FROM products WHERE product_id = '$product_id'";

    if (mysqli_query($connection, $query)) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . mysqli_error($connection);
    }
}

mysqli_close($connection);


