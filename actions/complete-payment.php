<?php
session_start();
include '../classes/Product.php';

$product = new Product;
$current_product = $product->getProduct($_GET['id']);
$payment = $_POST['payment'];
$total_price = $_POST['total_price'];
$buy_quantity = $_POST['buy_quantity'];

if ($payment >= $total_price) {
    $new_quantity = $current_product['quantity'] - $buy_quantity;
    $product->update2($_GET['id'], $new_quantity);
    echo "<p>Payment successful! Thank you for your purchase.</p>";
} else {
    echo "<p>Payment failed! Insufficient amount.</p>";
}
?>
