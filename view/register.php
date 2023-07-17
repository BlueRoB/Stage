<?php
$host = 'localhost';
$user = 'Ecommerce';
$password = 'Stage2023*';
$database = 'E-commerce';

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to hash the password
function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to validate the form fields
function validateForm($name, $email, $password, $confirmPassword)
{
    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    // Validate confirm password
    if (empty($confirmPassword)) {
        $errors[] = "Confirm password is required.";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['registerName'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    $errors = validateForm($name, $email, $password, $confirmPassword);

    if (empty($errors)) {
        $hashedPassword = hashPassword($password);

        $query = "INSERT INTO users (user_name, email, password_hash) VALUES ('$name', '$email', '$hashedPassword')";

        if (mysqli_query($connection, $query)) {
            header("Location: login.php");
            exit;
        } else {
            $errors[] = "Error registering user: " . mysqli_error($connection);
        }
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
<div class="wrapper">
    <?php require_once __DIR__ . '/navbar.php'; ?>

    <div class="content container d-flex justify-content-center align-items-center">
        <div class="w-50">
            <h1>INSCRIVEZ-VOUS :</h1>
            <?php if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error) { ?>
                            <li><?php echo $error; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="registerName" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="registerName" name="registerName"
                           value="<?php echo isset($name) ? $name : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="registerEmail" name="registerEmail"
                           value="<?php echo isset($email) ? $email : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="registerPassword" name="registerPassword">
                    <small id="passwordHelp" class="form-text text-muted">
                        Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule et un caractère spécial.
                    </small>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

<div class="footer">
    <?php require_once __DIR__ . '/footer.php'; ?>
</div>
</body>
</html>