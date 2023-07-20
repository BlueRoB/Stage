<?php
/**
 * @file login.php
 * @brief Page de connexion utilisateur.
 */

session_start();

/**
 * @brief Redirige l'utilisateur vers la page d'accueil s'il est déjà connecté.
 */
if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit;
}

$host = 'localhost';
$user = 'Ecommerce';
$password = 'Stage2023*';
$database = 'E-commerce';

$connection = mysqli_connect($host, $user, $password, $database);

/**
 * @brief Vérifie si la connexion à la base de données a échoué.
 */
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

/**
 * @brief Vérifie si le mot de passe est correct en le comparant avec le mot de passe haché stocké en base de données.
 * @param string $password Le mot de passe saisi par l'utilisateur.
 * @param string $hashedPassword Le mot de passe haché stocké en base de données.
 * @return bool Retourne true si le mot de passe est correct, sinon false.
 */
function verifyPassword($password, $hashedPassword)
{
    return password_verify($password, $hashedPassword);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    // Récupérer l'utilisateur depuis la base de données en fonction de l'adresse email fournie
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && verifyPassword($password, $user['password_hash'])) {
        // Initialiser la session pour l'utilisateur authentifié
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['user_name'];

        // Définir la durée de validité du jeton d'authentification en fonction de la case "Se souvenir de moi"
        $tokenValidity = ($_POST['rememberMe']) ? 86400 : 7200; // 24 heures : 2 heures

        $_SESSION['expire'] = time() + $tokenValidity;

        // Rediriger l'utilisateur vers la page d'accueil après une connexion réussie
        header("Location: home.php");
        exit;
    } else {
        $error = "Adresse email ou mot de passe incorrect.";
    }
}

mysqli_close($connection);
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
<?php require_once __DIR__ . '/navbar.php'; ?>
<div class="wrapper">
    <div class="content container d-flex justify-content-center align-items-center vh-100">
        <div class="w-50">
            <h1>IDENTIFIEZ-VOUS :</h1>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php } ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                    <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
            <div class="mt-3">
                <p>Vous n'avez pas de compte ? <a href="register.php">Inscrivez-vous maintenant</a></p>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <?php require_once __DIR__ . '/footer.php'; ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
