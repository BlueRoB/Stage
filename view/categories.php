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
require_once __DIR__ . '/navbar.php'; ?>



<?php
$category = isset($_GET['category']) ? $_GET['category'] : '';
$subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : '';


function generateSubcategoryLink($category, $subcategory, $subcategoryName)
{
    $subcategoryLink = "category.php?category=$category&subcategory=$subcategory";

    return "
    <div class='col-md-4 mb-4'>
        <div class='card'>
            <a class='toggle-list card-link' href='$subcategoryLink'>
                <img src='../assets/$subcategory.jpeg' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                <div class='card-body'>
                    <h5 class='card-title'>$subcategoryName</h5>
                </div>
            </a>
        </div>
    </div>";
}


switch ($category) {
    case 'informatique':


        if (empty($subcategory)) {?>
            <div class='container'>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Informatique</h1>
                    </div>
                </div>
                <div class='row'>
                    <?php
                    echo generateSubcategoryLink('informatique', 'ordinateurs', 'Ordinateurs');
                    echo generateSubcategoryLink('informatique', 'pc-portables', 'PC portables');
                    echo generateSubcategoryLink('informatique', 'peripherique', 'Périphérique');
                    echo generateSubcategoryLink('informatique', 'pieces', 'Pièces');
                    echo generateSubcategoryLink('informatique', 'reseaux', 'Réseaux');
                    ?>
                </div>
            </div>
<?php
        } else {
            switch ($subcategory) {
                case 'ordinateurs':
                    echo "<div class='list'>
                            <ul>
                                <li>
                                    <h3><a href='../assets/'>Boîtier PC</a></h3>
                                </li>
                                <li>
                                    <h3><a href='../assets/boitier-disque-dur/'>Boîtier disque dur</a></h3>
                                </li>
                                <li>
                                    <h3><a href='/informatique/ordinateurs/filtre-anti-poussiere/'>Filtre anti poussière</a></h3>
                                </li>
                                <li>
                                    <h3><a href='/informatique/ordinateurs/bande-led/'>Bande LED</a></h3>
                                </li>
                                <li>
                                    <h3><a href='/informatique/ordinateurs/connectique-interne/'>Connectique interne</a></h3>
                                </li>
                            </ul>
                        </div>";
                    break;
                case 'pc-portables':
                    break;
                case 'peripherique':
                    break;
                case 'pieces':
                    break;
                case 'reseaux':
                    break;
                default:
                    header('Location: notfound.php');
                    exit();
            }
        }
        break;

    case 'image-son':
        echo "<h1>Image & Son</h1>";

        if (empty($subcategory)) {

            echo generateSubcategoryLink('image-son', 'appareil-photo', 'Appareil photo');
            echo generateSubcategoryLink('image-son', 'television', 'Télévision');
            echo generateSubcategoryLink('image-son', 'son-numerique', 'Son numérique');
            echo generateSubcategoryLink('image-son', 'hi-fi-enceintes', 'Hi-fi et enceintes');
        } else {
            switch ($subcategory) {
                case 'appareil-photo':
                    break;
                case 'television':
                    break;
                case 'son-numerique':
                    break;
                case 'hi-fi-enceintes':
                    break;
                default:
                    header('Location: notfound.php');
                    exit();
            }
        }
        break;

    case 'jeux-loisirs':
        echo "<h1>Jeux & Loisirs</h1>";

        if (empty($subcategory)) {
            echo generateSubcategoryLink('jeux-loisirs', 'console', 'Console');
            echo generateSubcategoryLink('jeux-loisirs', 'accessoires-console', 'Accessoires console');
            echo generateSubcategoryLink('jeux-loisirs', 'jeux-video', 'Jeux Vidéo');
        } else {
            switch ($subcategory) {
                case 'console':
                    break;
                case 'accessoires-console':
                    break;
                case 'jeux-video':
                    break;
                default:
                    header('Location: notfound.php');
                    exit();
            }
        }
        break;

    case 'all':
        echo "<h1>Tous les Catégories</h1>";
        break;

    default:
        header('Location: notfound.php');
        exit();
}
?>


<div class='container'>
    <div class="row vh-100">
        <ul>
            <?php foreach ($subcategory as $subcategoryName => $subcategoryParam): ?>
                <li>
                    <h3><a href="/informatique/<?php echo $category; ?>/<?php echo $subcategoryParam; ?>/"><?php echo $subcategoryName; ?></a></h3>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php
require_once __DIR__ . '/footer.php'; ?>






</body>
</html>

