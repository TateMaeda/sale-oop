<?php
session_start();
include '../classes/Product.php';

$product = new Product;
$current_product = $product->getProduct($_GET['id']);
$buy_quantity = $_POST['buy_quantity'];
$total_price = $buy_quantity * $current_product['price'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Sales OOP</h1>
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
                    <h2 class="text-success">Payment</h2>
                </div>
                <p><strong>Product Name:</strong> <?= $current_product['product_name'] ?></p>
                <p><strong>Total Price:</strong> $ <?= number_format($total_price, 2) ?></p>
                <form action="../actions/complete-payment.php?id=<?= $current_product['id'] ?>" method="post">
                    <div class="mb-3">
                        <label for="payment" class="form-label ">Enter Payment</label>
                        <input type="number" step="0.01" name="payment" id="payment" class="form-control" min="<?= $total_price ?>" required>
                    </div>
                    <input type="hidden" name="total_price" value="<?= $total_price ?>">
                    <input type="hidden" name="buy_quantity" value="<?= $buy_quantity ?>">
                    <button type="submit" class="btn btn-success w-100">Submit Payment</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>