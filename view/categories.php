<?php
$category = $_GET['category'] ?? '';
$subcategory = $_GET['subcategory'] ?? '';

// Function to generate HTML for subcategory links
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

// Switch case to generate HTML based on the category and subcategory
switch ($category) {
    case 'informatique':
        // Generate HTML for Informatique category and its subcategories
        echo "<h1>Informatique</h1>";

        if (empty($subcategory)) {
            echo generateSubcategoryLink('informatique', 'ordinateurs', 'Ordinateurs');
            echo generateSubcategoryLink('informatique', 'pc-portables', 'PC portables');
            echo generateSubcategoryLink('informatique', 'peripherique', 'Périphérique');
            echo generateSubcategoryLink('informatique', 'pieces', 'Pièces');
            echo generateSubcategoryLink('informatique', 'reseaux', 'Réseaux');
        } else {
            // Handle individual subcategories here
            switch ($subcategory) {
                case 'ordinateurs':
                    // Generate HTML for Ordinateurs subcategory
                    break;
                case 'pc-portables':
                    // Generate HTML for PC portables subcategory
                    break;
                case 'peripherique':
                    // Generate HTML for Périphérique subcategory
                    break;
                case 'pieces':
                    // Generate HTML for Pièces subcategory
                    break;
                case 'reseaux':
                    // Generate HTML for Réseaux subcategory
                    break;
                default:
                    // Redirect to notfound.php or display an error message
                    header('Location: notfound.php');
                    exit();
            }
        }
        break;

    case 'image-son':
        // Generate HTML for Image & Son category and its subcategories
        echo "<h1>Image & Son</h1>";

        if (empty($subcategory)) {
            echo generateSubcategoryLink('image-son', 'appareil-photo', 'Appareil photo');
            echo generateSubcategoryLink('image-son', 'television', 'Télévision');
            echo generateSubcategoryLink('image-son', 'son-numerique', 'Son numérique');
            echo generateSubcategoryLink('image-son', 'hi-fi-enceintes', 'Hi-fi et enceintes');
        } else {
            // Handle individual subcategories here
            switch ($subcategory) {
                case 'appareil-photo':
                    // Generate HTML for Appareil photo subcategory
                    break;
                case 'television':
                    // Generate HTML for Télévision subcategory
                    break;
                case 'son-numerique':
                    // Generate HTML for Son numérique subcategory
                    break;
                case 'hi-fi-enceintes':
                    // Generate HTML for Hi-fi et enceintes subcategory
                    break;
                default:
                    // Redirect to notfound.php or display an error message
                    header('Location: notfound.php');
                    exit();
            }
        }
        break;

    case 'jeux-loisirs':
        // Generate HTML for Jeux & Loisirs category and its subcategories
        echo "<h1>Jeux & Loisirs</h1>";

        if (empty($subcategory)) {
            echo generateSubcategoryLink('jeux-loisirs', 'console', 'Console');
            echo generateSubcategoryLink('jeux-loisirs', 'accessoires-console', 'Accessoires console');
            echo generateSubcategoryLink('jeux-loisirs', 'jeux-video', 'Jeux Vidéo');
        } else {
            // Handle individual subcategories here
            switch ($subcategory) {
                case 'console':
                    // Generate HTML for Console subcategory
                    break;
                case 'accessoires-console':
                    // Generate HTML for Accessoires console subcategory
                    break;
                case 'jeux-video':
                    // Generate HTML for Jeux Vidéo subcategory
                    break;
                default:
                    // Redirect to notfound.php or display an error message
                    header('Location: notfound.php');
                    exit();
            }
        }
        break;

    case 'all':
        // Generate HTML for all categories
        echo "<h1>Tous les Catégories</h1>";
        // Generate HTML for all categories here
        break;

    default:
        // Redirect to notfound.php or display an error message
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
            <?php foreach ($subcategories as $subcategory) { ?>
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
            <?php foreach ($subcategories as $subcategory) { ?>
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
            <?php foreach ($subcategories as $subcategory) { ?>
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

