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

    $imageQuery = "SELECT image FROM products WHERE product_id = '$product_id'";
    $imageResult = mysqli_query($connection, $imageQuery);

    if ($imageResult && mysqli_num_rows($imageResult) > 0) {
        $row = mysqli_fetch_assoc($imageResult);
        $imageName = $row['image'];

        $imagePath = "../assets/uploads/" . $imageName;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $query = "DELETE FROM products WHERE product_id = '$product_id'";

    if (mysqli_query($connection, $query)) {
        header("Location: admin.php?tab=view_products");
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
