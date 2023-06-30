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
    // Get the form data
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['subcategory_id'];

    $query = "INSERT INTO products (product_name, price, description, category_id, subcategory_id)
              VALUES ('$product_name', '$product_price', '$product_description', '$category_id', '$subcategory_id')";

    if (mysqli_query($connection, $query)) {
        mysqli_close($connection);
        header("Location: admin.php?tab=add_product"); // Redirect to the admin page
        exit();
    } else {
        echo "Error adding product: " . mysqli_error($connection);
    }
}

mysqli_close($connection);


