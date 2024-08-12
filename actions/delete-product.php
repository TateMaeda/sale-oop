<?php
include "../classes/Product.php";

$id = $_GET['id'];

$product = new Product;

$product->delete($id);
