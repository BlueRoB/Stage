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
    $subcategoryLink = "categories.php?category=$category&subcategory=$subcategory";

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
            <div class='container  vh-100'>
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
                    $subcategories = [
                        ['name' => 'Boîtier PC', 'image' => '../assets/boitier-pc.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=boitier-pc"],
                        ['name' => 'Boîtier disque dur', 'image' => '../assets/boitier-disque-dur.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=boitier-disque-dur"],
                        ['name' => 'Filtre anti poussière', 'image' => '', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=filtre-anti-poussiere"],
                        ['name' => 'Bande LED', 'image' => '', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=bande-led"],
                        ['name' => 'Connectique interne', 'image' => '', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=connectique-interne"]
                    ];

                    echo "<div class='container  vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Ordinateurs</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                    <div class='card'>
                        <a class='toggle-list card-link' href='$subcategoryLink'>
                            <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                            <div class='card-body'>
                                <h5 class='card-title'>$subcategoryName</h5>
                            </div>
                        </a>
                    </div>
                </div>";
                    }

                    echo "</div>
                           </div>";
                    break;
                case 'pc-portables':
                    $subcategories = [
                        ['name' => 'Pc Windows', 'image' => '../assets/pc-windows.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=pc-portables"],
                        ['name' => 'MacBook', 'image' => '../assets/macbook.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=pc-portables"],
                        ['name' => 'Sac, housse', 'image' => '', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=pc-portables"],
                        ['name' => 'Accessoires Pc portable', 'image' => '', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=pc-portables"],
                        ['name' => 'Périphérique pc portable', 'image' => '', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=pc-portables"]
                    ];

                    echo "<div class='container  vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Pc portables</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <a class='toggle-list card-link' href='$subcategoryLink'>
                                        <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$subcategoryName</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                    }
                    echo "</div>
                         </div>";
                    break;
                case 'peripherique':
                    $subcategories = [
                        ['name' => 'Ecran Ordinateur', 'image' => '../assets/ecran-ordinateur.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=ecran-ordinateur"],
                        ['name' => 'Imprimante', 'image' => '../assets/imprimante.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=imprimante"],
                        ['name' => 'Stockage Externe', 'image' => '', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=stockage-externe"],
                        ['name' => 'Clavier et Souris', 'image' => '', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=clavier-souris"],
                        ['name' => 'Casque et micro', 'image' => '', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=casque-micro"]
                    ];

                    echo "<div class='container  vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Peripherique</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <a class='toggle-list card-link' href='$subcategoryLink'>
                                        <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$subcategoryName</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                    }
                    echo "</div>
                         </div>";
                    break;
                case 'pieces':
                    $subcategories = [
                        ['name' => 'Processeur', 'image' => '../assets/processeur.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=processeur"],
                        ['name' => 'Carte mère', 'image' => '../assets/carte-mère.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=carte-mère"],
                        ['name' => 'Cartes graphiques', 'image' => '../assets/cartes-graphiques.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=cartes-graphiques"],
                        ['name' => 'Boîtier', 'image' => '../assets/boitier.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=boitier"],
                        ['name' => 'Alimentation PC', 'image' => '../assets/alimentation-pc.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=alimentation-pc"]
                    ];

                    echo "<div class='container  vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Pieces</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <a class='toggle-list card-link' href='$subcategoryLink'>
                                        <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$subcategoryName</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                    }
                    echo "</div>
                         </div>";
                    break;
                case 'reseaux':
                    $subcategories = [
                        ['name' => 'Répéteur Wi-Fi', 'image' => '../assets/repeteur-wifi.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=repeteur-wifi"],
                        ['name' => 'Modem & routeur', 'image' => '../assets/modem-routeur.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=modem-routeur"],
                        ['name' => 'Point accès WiFi', 'image' => '../assets/cartes-graphiques.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=cartes-graphiques"],
                        ['name' => 'Boîtier', 'image' => '../assets/boitier.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=boitier"],
                        ['name' => 'Alimentation PC', 'image' => '../assets/alimentation-pc.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=alimentation-pc"]
                    ];

                    echo "<div class='container  vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Reseaux</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <a class='toggle-list card-link' href='$subcategoryLink'>
                                        <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$subcategoryName</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                    }
                    echo "</div>
                         </div>";
                    break;
                default:
                    header('Location: notfound.php');
                    exit();
            }
        }
        break;

    case 'image-son':
        echo "<h1>Image & Son</h1>";

        if (empty($subcategory)) { ?>
            <div class='container vh-100'>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Image & Son</h1>
                    </div>
                </div>
                <div class='row'>
                    <?php
                    echo generateSubcategoryLink('image-son', 'appareil-photo', 'Appareil photo');
                    echo generateSubcategoryLink('image-son', 'television', 'Télévision');
                    echo generateSubcategoryLink('image-son', 'son-numerique', 'Son Numerique');
                    echo generateSubcategoryLink('image-son', 'hi-fi-enceintes', 'Hi-fi et enceintes');
                    ?>
                </div>
            </div>
            <?php
        } else {
            switch ($subcategory) {
                case 'appareil-photo':
                    $subcategories = [
                        ['name' => 'Appareil Photo', 'image' => '../assets/apparaeil-photo.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=apparaeil-photo"],
                        ['name' => 'Accessoire Photo', 'image' => '../assets/accessoire-photo.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=accessoire-photo"],
                        ['name' => 'Carte mémoire', 'image' => '../assets/carte-memoire.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=carte-memoire"],
                        ['name' => 'Objectif appareil photo', 'image' => '../assets/objectif-appareil-photo.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=objectif-appareil-photo"]
                    ];

                    echo "<div class='container vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Appareil Photo</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <a class='toggle-list card-link' href='$subcategoryLink'>
                                        <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$subcategoryName</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                    }
                    echo "</div>
                         </div>";
                    break;
                case 'television':
                    $subcategories = [
                        ['name' => 'TV', 'image' => '../assets/tv.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=tv"],
                        ['name' => 'Adaptateur TNT & Sat', 'image' => '../assets/adaptateur-tnt-sat.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=adaptateur-tnt-sat"],
                        ['name' => 'Télécommande', 'image' => '../assets/telecommande.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=telecommande"]
                    ];

                    echo "<div class='container  vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Télévision</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <a class='toggle-list card-link' href='$subcategoryLink'>
                                        <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$subcategoryName</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                    }
                    echo "</div>
                         </div>";
                    break;
                case 'son-numerique':
                    $subcategories = [
                        ['name' => 'Casque', 'image' => '../assets/casque.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=casque"],
                        ['name' => 'Enceinte Bluetooth', 'image' => '../assets/enceinte-bluetooth.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=enceinte-bluetooth"],
                        ['name' => 'Auto Radio', 'image' => '../assets/auto-radio.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=auto-radio"]
                    ];

                    echo "<div class='container  vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Son numerique</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <a class='toggle-list card-link' href='$subcategoryLink'>
                                        <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$subcategoryName</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                    }
                    echo "</div>
                         </div>";
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
                    $subcategories = [
                        ['name' => 'Console PS5', 'image' => '../assets/console-ps5.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=console-ps5"],
                        ['name' => 'Console Xbox Series', 'image' => '../assets/console-xbox-series.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=console-xbox-series"],
                        ['name' => 'Console Nintendo Switch', 'image' => '../assets/console-nintendo-switch.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=console-nintendo-switch"]
                    ];

                    echo "<div class='container  vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Console</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <a class='toggle-list card-link' href='$subcategoryLink'>
                                        <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$subcategoryName</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                    }
                    echo "</div>
                         </div>";
                    break;
                case 'accessoires-console':
                    $subcategories = [
                        ['name' => 'Accessoires PS5', 'image' => '../assets/accessoires-ps5.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=accessoires-ps5"],
                        ['name' => 'Accessoires Xbox Series', 'image' => '../assets/accessoires-xbox-series.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=accessoires-xbox-series"],
                        ['name' => 'Accessoires Nintendo Switch', 'image' => '../assets/accessoires-nintendo-switch.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=accessoires-nintendo-switch"]
                    ];

                    echo "<div class='container  vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Console</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <a class='toggle-list card-link' href='$subcategoryLink'>
                                        <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$subcategoryName</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                    }
                    echo "</div>
                         </div>";
                    break;
                case 'jeux-video':
                    $subcategories = [
                        ['name' => 'Jeux PS5', 'image' => '../assets/jeux-ps5.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=jeux-ps5"],
                        ['name' => 'Jeux Xbox Series', 'image' => '../assets/jeux-xbox-series.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=jeux-xbox-series"],
                        ['name' => 'Jeux Nintendo Switch', 'image' => '../assets/jeux-nintendo-switch.jpeg', 'subcategoryLink' => "product_listing.php?category=informatique&subcategory=jeux-nintendo-switch"]
                    ];

                    echo "<div class='container  vh-100'>
                            <div class='row'>
                                <div class='col-md-12 text-center'>
                                    <h1>Console</h1>
                                </div>
                            </div>
                            <div class='row'>";

                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $subcategoryImage = $subcategory['image'];
                        $subcategoryLink = $subcategory['subcategoryLink'];

                        echo "<div class='col-md-4 mb-4'>
                                <div class='card'>
                                    <a class='toggle-list card-link' href='$subcategoryLink'>
                                        <img src='$subcategoryImage' alt='$subcategoryName' class='card-img-top' style='max-width: 200px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$subcategoryName</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                    }
                    echo "</div>
                         </div>";
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


<?php
require_once __DIR__ . '/footer.php'; ?>






</body>
</html>

