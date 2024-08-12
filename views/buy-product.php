<?php
session_start();
include '../classes/Product.php';

$product = new Product;
$current_product = $product->getProduct($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Product</title>
    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">SALES OOP</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['full_name'] ?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Log Out</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="text-center">
                    <i class="fas fa-cash-register buy-icon"></i>
                    <h2 class="text-success">Buy Product</h2>
                </div>
                <p><strong>Product Name:</strong> <?= $current_product['product_name'] ?></p>
                <div class="row">
                    <div class="col mb-3">
                        <label for="price" class="form-label">Price</label>
                        <p class="h3">$ <?= $current_product['price'] ?></p>
                    </div>
                    <div class="col mb-3">
                        <label for="quantity" class="form-label">Stocks Left</label>
                        <p class="h3"><?= $current_product['quantity'] ?></p>
                    </div>
                </div>
                <form action="payment.php?id=<?= $current_product['id'] ?>" method="post">
                    <div class="mb-3">
                        <label for="buy_quantity" class="form-label">Buy Quantity</label>
                        <input type="number" name="buy_quantity" id="buy_quantity" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Pay</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
