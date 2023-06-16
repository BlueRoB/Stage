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
    $activeTab = isset($_GET['tab']) ? $_GET['tab'] : '';

    function getProducts() {
        $productsData = file_get_contents('../assets/products.json');
        return json_decode($productsData, true)['products'];
    }

    function getUsers() {
        $usersData = file_get_contents('../assets/users.json');
        return json_decode($usersData, true)['users'];
    }

    function displayAddProductForm() {
        ?>
        <h2>Add Product</h2>
        <form method="POST" action="add_product.php">
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
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
        <?php
    }

    function displayViewProductsTable() {
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
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['description']; ?></td>
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activeTab === 'add_product') ? 'active' : ''; ?>" href="?tab=add_product">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activeTab === 'view_products') ? 'active' : ''; ?>" href="?tab=view_products">View Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activeTab === 'user_management') ? 'active' : ''; ?>" href="?tab=user_management">User Management</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php
        // Display the appropriate section based on the active tab
        if ($activeTab === 'add_product') {
            displayAddProductForm();
        } elseif ($activeTab === 'view_products') {
            displayViewProductsTable();
        } elseif ($activeTab === 'user_management') {
            displayUserManagementTable();
        }
        ?>
    </div>

<?php require_once __DIR__ . '/footer.php'; ?>
</div>
</body>
</html>


