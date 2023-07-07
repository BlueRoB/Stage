<?php
$host = 'localhost';
$user = 'Ecommerce';
$password = 'Stage2023*';
$database = 'E-commerce';

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}



    function getProducts() {
        global $connection;

        $query = "SELECT * FROM products";
        $result = mysqli_query($connection, $query);
        $products = [];

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
        }

        return $products;
    }

    function getUsers() {
        global $connection;

        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);
        $users = [];

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }

        return $users;
    }


    function deleteProduct($product_id)
    {
        global $connection;

        $query = "DELETE FROM products WHERE product_id = '$product_id'";

        if (mysqli_query($connection, $query)) {
            return true;
        } else {
            echo "Error deleting product: " . mysqli_error($connection);
            return false;
        }
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_product'])) {
        $product_id = $_POST['product_id'];
        $product = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM products WHERE product_id = '$product_id'"));
        ?>
        <script>
            if (confirm("Are you sure you want to delete the product?\n\nProduct ID: <?php echo $product['product_id']; ?>\nProduct Name: <?php echo $product['product_name']; ?>")) {
                document.getElementById("delete-form-<?php echo $product['product_id']; ?>").submit();
            }
        </script>
        <?php
        } elseif (isset($_POST['edit_product'])) {
        $product_id = $_POST['product_id'];
        $product = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM products WHERE product_id = '$product_id'"));

        ?>
            <script>
                if (confirm("Are you sure you want to edit the product?\n\nProduct ID: <?php echo $product['product_id']; ?>\nProduct Name: <?php echo $product['product_name']; ?>")) {
                    var editWindow = window.open("", "Edit Product", "width=500,height=500");
                    editWindow.document.write(`
                    <h2>Edit Product</h2>
                    <form method="POST" action="edit_product.php">
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                        <div class="mb-3">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" name="product_name" value="<?php echo $product['product_name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductPrice" class="form-label">Product Price</label>
                            <input type="number" class="form-control" id="editProductPrice" name="product_price" value="<?php echo $product['price']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductDescription" class="form-label">Product Description</label>
                            <textarea class="form-control" id="editProductDescription" name="product_description" rows="3" required><?php echo $product['description']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                `);
                    editWindow.document.close();
                }
            </script>
            <?php
        }
    }

    ?>

<?php
    $activeTab = isset($_GET['tab']) ? $_GET['tab'] : '';






    function displayAddProductForm() {
        ?>
        <h2>Add Product</h2>
        <form method="POST" action="add.product.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="product_name" required>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="productPrice" name="product_price" required>
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Product Description</label>
                <textarea class="form-control" id="productDescription" name="product_description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="product_image">Product Image:</label>
                <input type="file" id="image" name="product_image" accept="image/*"><br><br>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" id="category" name="category_id" required>
                    <?php
                    $host = 'localhost';
                    $user = 'Ecommerce';
                    $password = 'Stage2023*';
                    $database = 'E-commerce';

                    $connection = mysqli_connect($host, $user, $password, $database);

                    if (!$connection) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $query = "SELECT * FROM categories";
                    $result = mysqli_query($connection, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $category_id = $row['category_id'];
                            $category_name = $row['category_name'];
                            echo "<option value='$category_id'>$category_name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="subcategory" class="form-label">Subcategory</label>
                <select class="form-control" id="subcategory" name="subcategory_id" required>
                    <?php
                    // Retrieve subcategories from the database
                    $query = "SELECT * FROM subcategories";
                    $result = mysqli_query($connection, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $subcategory_id = $row['subcategory_id'];
                            $subcategory_name = $row['subcategory_name'];
                            echo "<option value='$subcategory_id'>$subcategory_name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
        <?php
    }

    function displayViewProductsTable()
    {
        $products = getProducts();
        ?>
        <h2>View Products</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td>
                        <form method="POST" id="delete-form-<?php echo $product['product_id']; ?>" action="delete_product.php">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <button type="submit" name="edit_product" class="btn btn-primary btn-sm">Edit</button>
                            <button type="submit" name="delete_product" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php
    }

    function displayUserManagementTable() {
            $users = getUsers();
            ?>
            <h2>User Management</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <a href="#">Edit</a> |
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php
        }
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="../vendor/bootstrap/css/styles.css">
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/982764073e.js" crossorigin="anonymous"></script>
    </head>
    <body>

    <?php
    $activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'view_products';
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar"
                    aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activeTab === 'add_product') ? 'active' : ''; ?>"
                           href="?tab=add_product">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activeTab === 'view_products') ? 'active' : ''; ?>"
                           href="?tab=view_products">View Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activeTab === 'user_management') ? 'active' : ''; ?>"
                           href="?tab=user_management">User Management</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">

    <div class="container mt-5">
        <?php
        if ($activeTab === 'add_product') {
            displayAddProductForm();
        } elseif ($activeTab === 'view_products') {
            displayViewProductsTable();
        } elseif ($activeTab === 'user_management') {
            displayUserManagementTable();
        }
        ?>
    </div>
    </div>
    <?php require_once __DIR__ . '/footer.php'; ?>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
