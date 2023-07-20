<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/styles.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/982764073e.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
/**
 * @file categories.php
 * @brief Page affichant les catégories et sous-catégories des produits.
 */

require_once __DIR__ . '/navbar.php';

// Connexion à la base de données
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
 * @brief Fonction pour générer le lien de la sous-catégorie.
 * @param int $categoryId Identifiant de la catégorie.
 * @param string $subcategoryName Nom de la sous-catégorie.
 * @return string Lien de la sous-catégorie.
 */
function generateSubcategoryLink($categoryId, $subcategoryName)
{
    $subcategoryLink = "categories.php?category=$categoryId&subcategory=" . urlencode($subcategoryName);

    return "
    <div class='col-md-4 mb-4'>
        <div class='card'>
            <a class='toggle-list card-link' href='$subcategoryLink'>
                <img src='../assets/$subcategoryName.jpeg' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                <div class='card-body'>
                    <h5 class='card-title'>$subcategoryName</h5>
                </div>
            </a>
        </div>
    </div>";
}

// Récupération de la catégorie et de la sous-catégorie depuis l'URL
$category = isset($_GET['category']) ? $_GET['category'] : '';
$subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : '';

// Vérification si la catégorie est spécifiée
if (!empty($category)) {
    // Requête pour récupérer la catégorie par ID
    $categoryQuery = "SELECT * FROM categories WHERE category_id = '$category'";
    $categoryResult = mysqli_query($connection, $categoryQuery);

    // Vérification si la catégorie existe
    if ($categoryResult && mysqli_num_rows($categoryResult) > 0) {
        $categoryRow = mysqli_fetch_assoc($categoryResult);
        $categoryName = $categoryRow['category_name'];

        // Affichage du titre de la catégorie
        echo "<div class='container vh-100'>
                <div class='row'>
                    <div class='col-md-12 text-center'>
                        <h1>$categoryName</h1>
                    </div>
                </div>
                <div class='row'>";

        // Requête pour récupérer les sous-catégories pour la catégorie actuelle
        $subcategoryQuery = "SELECT * FROM subcategories WHERE category_id = '$category'";
        $subcategoryResult = mysqli_query($connection, $subcategoryQuery);

        // Vérification si des sous-catégories existent
        if ($subcategoryResult && mysqli_num_rows($subcategoryResult) > 0) {
            // Boucle à travers les sous-catégories
            while ($subrow = mysqli_fetch_assoc($subcategoryResult)) {
                $subcategoryId = $subrow['subcategory_id'];
                $subcategoryName = $subrow['subcategory_name'];

                // Génération et affichage des liens de sous-catégories
                echo generateSubcategoryLink($category, $subcategoryName);
            }
        }

        echo "</div>
              </div>";
    } else {
        //header('Location: notfound.php');
        exit();
    }
} else {
    // Requête pour récupérer toutes les catégories
    $categoryQuery = "SELECT * FROM categories";
    $categoryResult = mysqli_query($connection, $categoryQuery);

    // Vérification si des catégories existent
    if ($categoryResult && mysqli_num_rows($categoryResult) > 0) {
        echo "<div class='container vh-100'>
                <div class='row'>
                    <div class='col-md-12 text-center'>
                        <h1>Tous les Catégories</h1>
                    </div>
                </div>
                <div class='row'>";

        // Boucle à travers les catégories
        while ($row = mysqli_fetch_assoc($categoryResult)) {
            $categoryId = $row['category_id'];
            $categoryName = $row['category_name'];

            // Génération et affichage des liens de catégories
            echo generateSubcategoryLink($categoryId, $categoryName);
        }

        echo "</div>
              </div>";
    }
}

mysqli_close($connection); /**< Fermeture de la connexion à la base de données. */
?>

<?php
require_once __DIR__ . '/footer.php';
?>

</body>
</html>
