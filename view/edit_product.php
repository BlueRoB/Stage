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

    $query = "UPDATE products SET product_name = '$product_name', price = '$product_price', description = '$product_description' WHERE product_id = '$product_id'";

    if (mysqli_query($connection, $query)) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating product: " . mysqli_error($connection);
    }
}

mysqli_close($connection);


