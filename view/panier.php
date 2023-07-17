<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        $_SESSION['cart'][] = $product_id;

        // Store the referring URL in a session variable
        $_SESSION['last_page'] = $_SERVER['HTTP_REFERER'];

        header('Location: ' . $_SESSION['last_page']);
        exit;
    }
}
?>

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
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $product_id) {
                    $product_name = "Product Name";
                    $product_description = "Product Description";
                    $product_price = "10 €";
                    ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product_name; ?><span class="float-end"><i class="fas fa-times"></i></span></h5>
                            <p class="card-text"><?php echo $product_description; ?></p>
                            <p class="card-text">Prix : <?php echo $product_price; ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
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
                        $total_price = 0;
                        if (!empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $product_id) {
                                $product_name = "Product Name";
                                $product_price = "10 €";
                                $product_price_numeric = floatval(preg_replace('/[^0-9\.]/', '', $product_price));
                                $total_price += $product_price_numeric;

                                ?>
                                <p><?php echo $product_name; ?><span class="float-end"><?php echo $product_price; ?></span></p>
                                <hr>
                                <?php
                            }
                        }
                        ?>
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
