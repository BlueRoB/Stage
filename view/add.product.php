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
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['subcategory_id'];

    $targetDir = "../assets/uploads/";

    $fileType = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
    $fileName = $product_name . "_" . $subcategory_id . "_" . uniqid() . "." . $fileType;
    $targetFilePath = $targetDir . $fileName;

    if (!empty($_FILES['product_image']['name'])) {
        $allowedTypes = array('jpg', 'jpeg', 'png');
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['product_image']['tmp_name'], $targetFilePath)) {
                $query = "INSERT INTO products (product_name, price, description, category_id, subcategory_id, image)
                          VALUES ('$product_name', '$product_price', '$product_description', '$category_id', '$subcategory_id', '$fileName')";

                if (mysqli_query($connection, $query)) {
                    mysqli_close($connection);
                    header("Location: admin.php?tab=add_product");
                    exit();
                } else {
                    echo "Error adding product: " . mysqli_error($connection);
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file format. Only JPG, JPEG, and PNG files are allowed.";
        }
    } else {
        echo "Please select an image file.";
    }
}

mysqli_close($connection);
