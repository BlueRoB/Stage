<?php
/**
 * @file update_product.php
 * Page de mise à jour d'un produit.
 *
 * Cette page permet de mettre à jour les informations d'un produit dans la base de données. Les informations
 * sont récupérées via une requête POST et validées. Si les informations sont valides, le produit est mis à jour dans
 * la base de données.
 */

$host = 'localhost';
$user = 'Ecommerce';
$password = 'Stage2023*';
$database = 'E-commerce';

// Connexion à la base de données
$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des informations du produit depuis la requête POST
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];

    // Valider l'entrée de prix
    if (!is_numeric($product_price)) {
        echo "Prix invalide. Veuillez saisir une valeur numérique.";
        exit;
    }

    // Requête SQL pour mettre à jour le produit
    $query = "UPDATE products SET product_name = '$product_name', price = '$product_price', description = '$product_description' WHERE product_id = '$product_id'";

    if (mysqli_query($connection, $query)) {
        mysqli_close($connection);
        // Rediriger l'utilisateur vers la page d'administration des produits après la mise à jour réussie
        header("Location: admin.php?tab=view_products");
        exit;
    } else {
        echo "Erreur lors de la mise à jour du produit : " . mysqli_error($connection);
    }
} else {
    // Si la méthode de requête n'est pas POST, rediriger l'utilisateur vers la page d'administration des produits
    header("Location: admin.php?tab=view_products");
    exit;
}
?>
