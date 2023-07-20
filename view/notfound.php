/**
* Fichier notfound.php
*
* Cette page affiche une erreur 404 (page non trouvée) lorsque l'utilisateur
* tente d'accéder à une page qui n'existe pas.
*/

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
 * Inclure le fichier de la barre de navigation.
 */
require_once __DIR__ . '/navbar.php';
?>

<div class="vh-100">
    <div class="row">
        <div class="col-md-12 centered">
            <div class="text-center">
                <!-- Afficher le message d'erreur 404 Not Found -->
                <h1 class="display-4">404 Not Found</h1>
                <p class="lead">La page demandée est introuvable.</p>
                <!-- Bouton pour retourner à la page d'accueil -->
                <a class="btn btn-primary" href="/WEB/Stage/view/home.php">Retour à l'accueil</a>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * Inclure le fichier du footer.
 */
require_once __DIR__ . '/footer.php';
?>

</body>
</html>
