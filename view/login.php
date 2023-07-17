<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit;
}

$host = 'localhost';
$user = 'Ecommerce';
$password = 'Stage2023*';
$database = 'E-commerce';

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

function verifyPassword($password, $hashedPassword)
{
    return password_verify($password, $hashedPassword);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && verifyPassword($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['user_name'];

        $tokenValidity = ($_POST['rememberMe']) ? 86400 : 7200; // 24 hours : 2 hours

        $_SESSION['expire'] = time() + $tokenValidity;

        header("Location: home.php");
        exit;
    } else {
        $error = "Invalid email or password.";
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
            <button type="submit" class="btn btn-primary">Login</button>
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
