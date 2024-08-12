<?php
session_start();

require '../classes/Product.php';

$product = new Product;
$all_products = $product->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark mb-5">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Sales oop</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['full_name'] ?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Log Out</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Product List</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                            <th>Buy product</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($product = $all_products->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['product_name'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $product['quantity'] ?></td>
                                <td>
                                    <a href="edit-product.php?id=<?= $product['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="../actions/delete-product.php?id=<?= $product['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                                <td>
                                    <a href="buy-product.php?id=<?= $product['id'] ?>" class="btn btn-success"><i class="fas fa-cash-register"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="add-product.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Product</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>