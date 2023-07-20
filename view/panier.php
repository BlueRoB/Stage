<?php
/**
 * Fichier panier.php
 *
 * Cette page permet à l'utilisateur d'ajouter des produits à son panier et de visualiser le contenu du panier.
 */

// Démarrer une session pour stocker les informations du panier
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si le paramètre 'product_id' est défini dans le formulaire
    if (isset($_POST['product_id'])) {
        // Récupérer l'identifiant du produit à ajouter au panier
        $product_id = $_POST['product_id'];

        // Ajouter l'identifiant du produit au tableau 'cart' de la session
        $_SESSION['cart'][] = $product_id;

        // Conserver l'URL de la page précédente dans une variable de session
        $_SESSION['last_page'] = $_SERVER['HTTP_REFERER'];

        // Rediriger l'utilisateur vers la page précédente
        header('Location: ' . $_SESSION['last_page']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/styles.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/982764073e.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="wrapper">
    <?php require_once __DIR__ . '/navbar.php'; ?>

    <div class="content container">
        <h1 class="text-center mt-5">Mon Panier</h1>
        <div class="container">
            <div class="row">
                <!-- Afficher les étapes de la commande (panier, identification, livraison, paiement) -->
                <div class="col-3 checkout-steps__item step--active">
                    <span class="checkout-steps__link">Panier</span>
                </div>
                <div class="col-3 checkout-steps__item checkout-steps__item--disabled">
                    <span class="checkout-steps__link">Identification</span>
                </div>
                <div class="col-3 checkout-steps__item checkout-steps__item--disabled">
                    <span class="checkout-steps__link">Livraison</span>
                </div>
                <div class="col-3 checkout-steps__item checkout-steps__item--disabled">
                    <span class="checkout-steps__link">Paiement</span>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8">
                <?php
                // Vérifier si le panier n'est pas vide
                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $product_id) {
                        // Récupérer les informations factices sur le produit à partir de la base de données
                        $product_name = "Nom du produit";
                        $product_description = "Description du produit";
                        $product_price = "10 €";
                        ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <!-- Afficher le nom, la description et le prix du produit dans le panier -->
                                <h5 class="card-title"><?php echo $product_name; ?><span class="float-end"><i class="fas fa-times"></i></span></h5>
                                <p class="card-text"><?php echo $product_description; ?></p>
                                <p class="card-text">Prix : <?php echo $product_price; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // Afficher un message si le panier est vide
                    echo '<p>Votre panier est vide.</p>';
                }
                ?>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Récapitulatif</h5>
                        <div class="mb-3">
                            <?php
                            // Calculer le total des prix des produits dans le panier
                            $total_price = 0;
                            if (!empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $product_id) {
                                    // Récupérer les informations factices sur le produit à partir de la base de données
                                    $product_name = "Nom du produit";
                                    $product_price = "10 €";
                                    // Convertir le prix en format numérique
                                    $product_price_numeric = floatval(preg_replace('/[^0-9\.]/', '', $product_price));
                                    $total_price += $product_price_numeric;

                                    ?>
                                    <!-- Afficher le nom et le prix du produit dans le récapitulatif -->
                                    <p><?php echo $product_name; ?><span class="float-end"><?php echo $product_price; ?></span></p>
                                    <hr>
                                    <?php
                                }
                            }
                            ?>
                            <!-- Afficher le total du prix des produits dans le récapitulatif -->
                            <p>Total : <span class="float-end"><?php echo $total_price; ?> €</span></p>
                        </div>
                        <a href="#" class="btn btn-primary">Passer la commande</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <?php require_once __DIR__ . '/footer.php'; ?>
</div>
</body>
</html>
