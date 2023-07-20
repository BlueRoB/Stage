<?php
/**
 * @file delete_product.php
 * @brief Script pour supprimer un produit de la base de données.
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

/**
 * @brief Supprime l'image associée au produit de la base de données.
 * @param int $product_id Identifiant du produit.
 */
function deleteProductImage($product_id)
{
    global $connection;

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
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    // Suppression de l'image associée au produit
    deleteProductImage($product_id);

    $query = "DELETE FROM products WHERE product_id = '$product_id'";

    if (mysqli_query($connection, $query)) {
        // Redirection vers la page d'administration des produits
        header("Location: admin.php?tab=view_products");
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($connection);
    }
}

mysqli_close($connection); /**< Fermeture de la connexion à la base de données. */
?>
