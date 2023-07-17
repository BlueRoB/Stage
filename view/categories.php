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
require_once __DIR__ . '/navbar.php';

// Database connection
$host = 'localhost';
$user = 'Ecommerce';
$password = 'Stage2023*';
$database = 'E-commerce';

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to generate subcategory link
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

// Get the category and subcategory from the URL
$category = isset($_GET['category']) ? $_GET['category'] : '';
$subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : '';

// Query to retrieve categories
$categoryQuery = "SELECT * FROM categories";
$categoryResult = mysqli_query($connection, $categoryQuery);

// Check if the category exists
if ($categoryResult && mysqli_num_rows($categoryResult) > 0) {
    // Loop through categories
    while ($row = mysqli_fetch_assoc($categoryResult)) {
        $categoryId = $row['category_id'];
        $categoryName = $row['category_name'];

        // Check if the current category matches the URL parameter
        if ($category === $categoryId) {
            // Display category title
            echo "<div class='container  vh-100'>
                <div class='row'>
                    <div class='col-md-12 text-center'>
                        <h1>$categoryName</h1>
                    </div>
                </div>
                <div class='row'>";

            // Query to retrieve subcategories for the current category
            $subcategoryQuery = "SELECT * FROM subcategories WHERE category_id = $categoryId";
            $subcategoryResult = mysqli_query($connection, $subcategoryQuery);

            // Check if subcategories exist
            if ($subcategoryResult && mysqli_num_rows($subcategoryResult) > 0) {
                // Loop through subcategories
                while ($subrow = mysqli_fetch_assoc($subcategoryResult)) {
                    $subcategoryId = $subrow['subcategory_id'];
                    $subcategoryName = $subrow['subcategory_name'];

                    // Generate and display subcategory links
                    echo generateSubcategoryLink($category, $subcategoryId, $subcategoryName);
                }
            }

            echo "</div>
                  </div>";

            break; // Exit the loop once the category is found
        }
    }
}

mysqli_close($connection);
?>

<?php
require_once __DIR__ . '/footer.php';
?>

</body>
</html>
