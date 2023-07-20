<?php
/**
 * @file
 * Ce fichier contient le code pour insérer un nouveau produit dans la base de données.
 */

/**
 * @var string $host
 * Adresse de l'hôte MySQL pour la connexion à la base de données.
 */
$host = 'localhost';

/**
 * @var string $user
 * Nom d'utilisateur pour la connexion à la base de données.
 */
$user = 'Ecommerce';

/**
 * @var string $password
 * Mot de passe pour la connexion à la base de données.
 */
$password = 'Stage2023*';

/**
 * @var string $database
 * Nom de la base de données à laquelle se connecter.
 */
$database = 'E-commerce';

/**
 * @var mysqli $connection
 * Objet de connexion à la base de données MySQL.
 */
$connection = mysqli_connect($host, $user, $password, $database);

/**
 * Vérifie si la connexion à la base de données a échoué.
 * Si la connexion échoue, affiche un message d'erreur et arrête l'exécution du script.
 */
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

/**
 * Vérifie si la requête HTTP est de type POST.
 * Si c'est le cas, traite les données du formulaire pour ajouter un nouveau produit à la base de données.
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /**
     * @var string $product_name
     * Nom du produit à ajouter, extrait des données du formulaire.
     */
    $product_name = $_POST['product_name'];

    /**
     * @var float $product_price
     * Prix du produit à ajouter, extrait des données du formulaire.
     */
    $product_price = $_POST['product_price'];

    /**
     * @var string $product_description
     * Description du produit à ajouter, extraite des données du formulaire.
     */
    $product_description = $_POST['product_description'];

    /**
     * @var int $category_id
     * ID de la catégorie du produit à ajouter, extrait des données du formulaire.
     */
    $category_id = $_POST['category_id'];

    /**
     * @var int $subcategory_id
     * ID de la sous-catégorie du produit à ajouter, extrait des données du formulaire.
     */
    $subcategory_id = $_POST['subcategory_id'];

    /**
     * @var string $targetDir
     * Répertoire cible où le fichier image du produit sera stocké.
     */
    $targetDir = "../assets/uploads/";

    /**
     * @var string $fileType
     * Type du fichier image du produit (extension), extrait des données du formulaire.
     */
    $fileType = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));

    /**
     * @var string $fileName
     * Nom du fichier image du produit généré à partir du nom du produit, de l'ID de la sous-catégorie et d'un identifiant unique.
     */
    $fileName = $product_name . "_" . $subcategory_id . "_" . uniqid() . "." . $fileType;

    /**
     * @var string $targetFilePath
     * Chemin complet vers le fichier image du produit.
     */
    $targetFilePath = $targetDir . $fileName;

    /**
     * Vérifie si un fichier image a été sélectionné pour le produit.
     * Si oui, traite et enregistre le fichier, puis insère les données du produit dans la base de données.
     */
    if (!empty($_FILES['product_image']['name'])) {
        /**
         * @var array $allowedTypes
         * Tableau contenant les types de fichiers image autorisés (extensions).
         */
        $allowedTypes = array('jpg', 'jpeg', 'png');

        /**
         * Vérifie si le type du fichier image est autorisé.
         * Si c'est le cas, déplace le fichier téléchargé vers le répertoire cible et effectue l'insertion dans la base de données.
         */
        if (in_array($fileType, $allowedTypes)) {
            /**
             * Déplace le fichier téléchargé vers le répertoire cible.
             * Si le déplacement réussit, insère les données du produit dans la base de données.
             * Sinon, affiche un message d'erreur.
             */
            if (move_uploaded_file($_FILES['product_image']['tmp_name'], $targetFilePath)) {
                /**
                 * @var string $query
                 * Requête SQL pour insérer les données du produit dans la table "products".
                 * Utilise les valeurs des variables précédemment extraites du formulaire.
                 */
                $query = "INSERT INTO products (product_name, price, description, category_id, subcategory_id, image)
                          VALUES ('$product_name', '$product_price', '$product_description', '$category_id', '$subcategory_id', '$fileName')";

                /**
                 * Exécute la requête d'insertion dans la base de données.
                 * Si l'insertion réussit, ferme la connexion à la base de données, redirige vers la page d'administration et arrête l'exécution du script.
                 * Sinon, affiche un message d'erreur SQL.
                 */
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

/**
 * Ferme la connexion à la base de données après avoir traité la requête HTTP (si applicable).
 */
mysqli_close($connection);
