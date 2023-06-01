<?php
$category = isset($_GET['category']) ? $_GET['category'] : '';
$subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : '';

function generateSubcategoryLink($category, $subcategory, $subcategoryName)
{
    $subcategoryLink = "category.php?category=$category&subcategory=$subcategory";
    return "<a class='toggle-list' href='$subcategoryLink'>
        <div class='pic'>
            <img src='https://example.com/$subcategory.jpg' alt='$subcategoryName'>
        </div>
        <h2 class='txt'><em>$subcategoryName</em></h2>
        <span class='icon icon-arrow-bottom-bold'></span>
    </a>";
}

switch ($category) {
    case 'informatique':
        echo "<h1>Informatique</h1>";

        if (empty($subcategory)) {
            echo generateSubcategoryLink('informatique', 'ordinateurs', 'Ordinateurs');
            echo generateSubcategoryLink('informatique', 'pc-portables', 'PC portables');
            echo generateSubcategoryLink('informatique', 'peripherique', 'Périphérique');
            echo generateSubcategoryLink('informatique', 'pieces', 'Pièces');
            echo generateSubcategoryLink('informatique', 'reseaux', 'Réseaux');
        } else {
            switch ($subcategory) {
                case 'ordinateurs':
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





<div class="container vh-100">
    <h1>Categories</h1>
    <div class="row">
        <div class="col-md-4">
            <h2>Informatique</h2>
            <?php foreach ($subcategory as $subcategory) { ?>
                <a class="sub-category" href="#">
                    <div class="pic">
                        <img src="https://example.com/informatique/<?php echo strtolower(str_replace(' ', '-', $subcategory)); ?>/thumbnail.jpg" alt="<?php echo $subcategory; ?>">
                    </div>
                    <h2 class="txt"><em><?php echo $subcategory; ?></em></h2>
                    <span class="icon icon-arrow-bottom-bold"></span>
                </a>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <h2>Image & Son</h2>
            <?php foreach ($subcategory as $subcategory) { ?>
                <a class="sub-category" href="#">
                    <div class="pic">
                        <img src="https://example.com/image-son/<?php echo strtolower(str_replace(' ', '-', $subcategory)); ?>/thumbnail.jpg" alt="<?php echo $subcategory; ?>">
                    </div>
                    <h2 class="txt"><em><?php echo $subcategory; ?></em></h2>
                    <span class="icon icon-arrow-bottom-bold"></span>
                </a>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <h2>Jeux & Loisirs</h2>
            <?php foreach ($subcategory as $subcategory) { ?>
                <a class="sub-category" href="#">
                    <div class="pic">
                        <img src="https://example.com/jeux-loisirs/<?php echo strtolower(str_replace(' ', '-', $subcategory)); ?>/thumbnail.jpg" alt="<?php echo $subcategory; ?>">
                    </div>
                    <h2 class="txt"><em><?php echo $subcategory; ?></em></h2>
                    <span class="icon icon-arrow-bottom-bold"></span>
                </a>
            <?php } ?>
        </div>
    </div>
</div>



<?php
require_once __DIR__ . '/footer.php'; ?>



</body>
</html>

