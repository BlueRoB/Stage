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

    <?php
    require_once __DIR__ . '/navbar.php';
    ?>

    <div class="content container d-flex justify-content-center align-items-center">
        <div class="w-50">
            <h1>INSCRIVEZ-VOUS :</h1>

            <?php
            /**
             * @file register.php
             * Page d'inscription des utilisateurs.
             *
             * Cette page permet aux utilisateurs de s'inscrire en remplissant un formulaire avec leur nom, adresse e-mail,
             * mot de passe et confirmation de mot de passe. Les informations sont ensuite validées et stockées dans la base de données.
             */

            // Informations de connexion à la base de données
            $host = 'localhost';
            $user = 'Ecommerce';
            $password = 'Stage2023*';
            $database = 'E-commerce';

            // Connexion à la base de données
            $connection = mysqli_connect($host, $user, $password, $database);

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            /**
             * Fonction pour hasher le mot de passe.
             *
             * @param string $password Le mot de passe à hasher.
             * @return string Le mot de passe hashé.
             */
            function hashPassword($password)
            {
                return password_hash($password, PASSWORD_DEFAULT);
            }

            /**
             * Fonction pour valider les champs du formulaire.
             *
             * @param string $name Le nom de l'utilisateur.
             * @param string $email L'adresse e-mail de l'utilisateur.
             * @param string $password Le mot de passe de l'utilisateur.
             * @param string $confirmPassword La confirmation du mot de passe de l'utilisateur.
             * @return array Un tableau contenant les erreurs de validation.
             */
            function validateForm($name, $email, $password, $confirmPassword)
            {
                $errors = [];

                // Valider le nom
                if (empty($name)) {
                    $errors[] = "Le nom est requis.";
                }

                // Valider l'e-mail
                if (empty($email)) {
                    $errors[] = "L'adresse e-mail est requise.";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Format d'e-mail invalide.";
                }

                // Valider le mot de passe
                if (empty($password)) {
                    $errors[] = "Le mot de passe est requis.";
                } elseif (strlen($password) < 8) {
                    $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
                }

                // Valider la confirmation du mot de passe
                if (empty($confirmPassword)) {
                    $errors[] = "La confirmation du mot de passe est requise.";
                } elseif ($password !== $confirmPassword) {
                    $errors[] = "Les mots de passe ne correspondent pas.";
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
                        $errors[] = "Erreur lors de l'inscription de l'utilisateur : " . mysqli_error($connection);
                    }
                }
            }

            mysqli_close($connection);
            ?>

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
                    <label for="registerEmail" class="form-label">Adresse e-mail</label>
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
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
    </div>
</div>

<div class="footer">
    <?php require_once __DIR__ . '/footer.php'; ?>
</div>
</body>
</html>
